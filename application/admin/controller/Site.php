<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/15
 * Time: 16:16
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;

class Site extends Controller
{
    //每日刷新投票状态
    public function isEnd()
    {
        $date = date('Y-m-d H:i:s', time());
        $need = config('app.need');
        Db::name('vote')->where('add_time', '<', $date)->where('end_time', '>', $date)->where('status', 0)->setField('status', 2);
        //获取已经结束的id
        $data = Db::name('vote')
            ->where('status', 2)
            ->where('end_time', '<', $date)
            ->column('id');
        try {
            foreach ($data as $id) {
                $result = Db::name('vote')->where('id', $id)->field('total,need,user_id,type')->find();

                //消耗uzf的投票
                    if ($result['type'] == 1) {
                    //如果总票数大于等于需要资金，则判定为投票通过，把参与用户的冻结金额转移到发起者的余额中
                    if ($result['total'] > $result['need'] || $result['total'] == $result['need']) {
                        $canyu = Db::name('voting')->where('v_id', $id)->column('user_id');
                        foreach ($canyu as $item) {
                            Db::name('money')->where('user_id', $item)->setDec('lock_money', $need);
                            $insertData = ['us_id'=>$item,'wa_num'=>$need,'wa_type'=>1,'wa_note'=>'投票消耗','add_time'=>date('Y-m-d H:i:s')];
                            Db::name('wallet')->insert($insertData);
                        }
                        Db::name('money')->where('user_id', $result['user_id'])->setInc('money', $result['total']);
                        Db::name('wallet')->data(['us_id'=>$result['user_id'],'wa_num'=>$result['total'],'wa_type'=>1,'wa_note'=>'投票所获收益','add_time'=>date('Y-m-d H:i:s')])->insert();
                        Db::name('vote')->where('id', $id)->setField('status', 1);
                        unset($canyu);
                    } elseif ($result['total'] < $result['need']) {
                        //如果总票数小于需要资金，则把参与用户的冻结金额释放到自己的余额
                        $canyu = Db::name('voting')->where('v_id', $id)->column('user_id');
                        foreach ($canyu as $item) {
                            Db::name('money')->where('user_id', $item)->setDec('lock_money', $need);
                            Db::name('money')->where('user_id', $item)->setInc('money', $need);
                        }
                        Db::name('vote')->where('id', $id)->setField('status', -1);
                        unset($canyu);
                    }
                    //这是判断有两个选项的投票结果
                } elseif ($result['type'] == 2) {
                    //total为赞成票数   need为反对票数
                    if ($result['total'] > $result['need']) {
                        Db::name('vote')->where('id', $id)->setField('status', 1);
                    } else {
                        Db::name('vote')->where('id', $id)->setField('status', -1);
                    }
                } elseif ($result['type'] == 3) {
                    //获取网站所配置的  成为超级节点所需要的票数
                    $need_votes = cache('setting')['need_votes'];
                    //查询参与此次选举的所有系统服务商票数
                    $election = Db::name('election')->where('v_id', $id)->where('votes', '>=', $need_votes)->field('user_id,votes')->order('votes', 'desc')->limit(3)->select();
                    if (empty($election)) {
                        Db::name('vote')->where('id', $id)->setField('status', -1);
                        return '没有人当选超级节点';
                    } else {
                        //待替换的超级节点
                        $superNode = Db::name('user')->where('us_type', 4)->order('us_add_time', 'desc')->field('id')->limit(count($election))->select();
                        for ($i = 0; $i < count($election); $i++) {
                            $superId = $superNode[$i]['id'];
                            $electionId = $election[$i]['user_id'];
                            $team = Db::name('user')->where('us_pid', $superId)->where('id', $electionId)->find();
                            //属于一个团队
                            if (!empty($team)) {
                                //交换下面用户中us_path中的超级节点和系统服务商的顺序
                                $list = Db::name('user')->whereRaw("find_in_set($electionId,us_path)")->field('id,us_path')->select();
                                $result = Db::name('user')->whereRaw("find_in_set($superId,us_path)")->whereRaw("!find_in_set($electionId,us_path)")->field('id,us_path')->select();
                                foreach ($list as $k => $v) {
                                    $path = $v['us_path'];
                                    $tempPath = str_replace_limit(',' . "$superId" . ',' . $electionId, ',' . "$electionId" . ',' . $superId, $path, 1);
                                    Db::name('user')->where('id', $v['id'])->update(['us_path' => $tempPath]);
                                }
                                foreach ($result as $k => $v) {
                                    $path = $v['us_path'];
                                    $tempPath = str_replace_limit(',' . "$superId", ',' . "$electionId" , $path, 1);
                                    Db::name('user')->where('id', $v['id'])->update(['us_path' => $tempPath]);
                                }

                                //查询以前超级节点下面的其他服务商，以便替换us_path
                                $tempyh = Db::name('user')->where('us_pid', $electionId)->field('id')->select();
                                Db::name('user')->where('us_pid', $superId)->update(['us_pid' => $electionId]);
                                foreach ($tempyh as $k => $v) {
                                    Db::name('user')->where('id', $v['id'])->setField('us_pid', $superId);
                                }

                                unset($tempyh);
                                //改变两者的身份以及隶属关系
                                Db::name('user')->where('id', $superId)->update(['us_type' => 3, 'us_add_time' => date('Y-m-d H:i:s'), 'us_path' => '0,' . $electionId, 'us_pid' => $electionId]);
                                Db::name('user')->where('id', $electionId)->update(['us_type' => 4, 'us_add_time' => date('Y-m-d H:i:s'), 'us_path' => '0', 'us_pid' => 0]);
                            } else {//不属于同一团队
                                //xtList是需要把us_path中的系统服务商id，改为被换下的超级节点id的用户列表
                                $xtList = Db::name('user')->whereRaw("find_in_set($electionId,us_path)")->field('id,us_path')->select();
                                //cjList是需要把us_path中的超级节点id改为当选超级节点的系统服务商的id的用户列表
                                $cjList = Db::name('user')->whereRaw("find_in_set($superId,us_path)")->field('id,us_path')->select();
                                foreach ($cjList as $k => $v) {
                                    $us_path = str_replace_limit(',' . "$superId", ',' . $electionId, $v['us_path'], 1);
                                    Db::name('user')->where('id', $v['id'])->setField('us_path', $us_path);
                                }
                                foreach ($xtList as $k => $v) {
                                    $us_path = str_replace_limit(',' . "$electionId", ',' . $superId, $v['us_path'], 1);
                                    Db::name('user')->where('id', $v['id'])->setField('us_path', $us_path);
                                }
                                $tempyh = Db::name('user')->where('us_pid', $electionId)->field('id')->select();
                                Db::name('user')->where('us_pid', $superId)->update(['us_pid' => $electionId]);
                                foreach ($tempyh as $k => $v) {
                                    Db::name('user')->where('id', $v['id'])->setField('us_pid', $superId);
                                }
                                //tempId是成为超级节点的系统服务商所属的超级节点ID
                                $tempId = Db::name('user')->where('id', $electionId)->field('us_pid')->find();
                                Db::name('user')->where('id', $superId)->update(['us_type' => 3, 'us_add_time' => date('Y-m-d H:i:s'), 'us_path' => '0,' . $tempId['us_pid'], 'us_pid' => $tempId['us_pid']]);
                                Db::name('user')->where('id', $electionId)->update(['us_type' => 4, 'us_add_time' => date('Y-m-d H:i:s'), 'us_path' => '0', 'us_pid' => 0]);
                            }
                        }
                        Db::name('vote')->where('id', $id)->setField('status', 1);
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return '操作成功';
    }

}
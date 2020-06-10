<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/14
 * Time: 11:41
 */

namespace app\index\controller;

use app\admin\controller\Site;
use app\common\logic\VoteLogic;
use app\common\logic\UserLogic;
use think\Db;
use app\common\validate\Verify;

class Vote extends Basis
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 投票列表
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:43:59
     * @author: wcg
     */
    public function voteList()
    {
        $us_id = $this->user['id'];
        $type = UserLogic::gettype($us_id);
        $data = Db::name('vote')->where("find_in_set($type,user_levels)")->select();
        if (count($data) == 0) {
            return $this->e_msg('暂时没有投票');
        }
        return $this->s_msg(null, $data);
    }

    /**
     * 投票操作
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:44:41
     * @author: wcg
     */
    public function vote()
    {
        $us_id = $this->user['id'];
        //前端传过来的投票id
        $vote_id = input('vote_id');
        $now = date('Y-m-d H:i:s');
        $time = Db::name('vote')->where('id', $vote_id)->field('add_time,end_time,type')->find();
        $result = Db::name('voting')->where('v_id', $vote_id)->where('user_id', $us_id)->find();
        $insertData = ['user_id' => $us_id, 'v_id' => $vote_id, 'add_time' => date('Y-m-d H:i:s')];
        Db::startTrans();
        //如果投票类型为消耗uzf的，
        if ($time['type'] == 1) {
            $need = 1;
            $data = Db::name('money')->where('user_id', $us_id)->where('coin_id',2)->find();
            if ($now < $time['add_time'])
                return $this->e_msg('投票还未开始');
            elseif ($now > $time['end_time'])
                return $this->e_msg('投票已经结束');
            if ($data['money'] < $need)
                return $this->e_msg('余额不足，不能参与投票');

            try {
                //扣除投票人的余额加到其冻结余额
                Db::name('money')
                    ->where('user_id', $us_id)
                    ->where('coin_id',2)
                    ->data([
                        'money' => $data['money'] - $need,
                        'lock_money' => $data['lock_money'] + $need
                    ])
                    ->update();
                //更新投票的数据
                Db::name('vote')->where('id', $vote_id)->setInc('total', $need);
                //插入到投票过程表
                Db::name('voting')->data($insertData)->insert();
                //查询是否投过票，方便操作投票人数
                if (empty($result))
                    Db::name('vote')->where('id', $vote_id)->setInc('person_num', 1);
                Db::commit();
            } catch (\Exception $e) {
                Db::rollback();
                return $this->e_msg('投票失败', $e->getMessage());
            }
            return $this->s_msg('投票成功', 1);
        } elseif ($time['type'] == 2) {
            //接受前台传过来的参数：反对还是赞成  1是赞成  -1是反对
            $value = input('value');
            if (empty($result)) {

                //投的是赞成则把total加1，即赞成票数加1
                if ($value == 1) {
                    Db::name('vote')->where('id', $vote_id)->setInc('total', 1);
                } elseif ($value == -1) {
                    //投的若是反对，则把need+1，即反对票数加1
                    Db::name('vote')->where('id', $vote_id)->setInc('need', 1);
                } else {
                    return $this->e_msg('参数类型错误');
                }
                Db::name('vote')->where('id', $vote_id)->setInc('person_num', 1);
                Db::name('voting')->data($insertData)->insert();
                Db::commit();
                return $this->s_msg('投票成功');
            } else {
                return $this->e_msg('您已经参与此次投票');
            }
        } elseif ($time['type'] == 3) {
            //获取到所选系统服务商id
            $id = input('provider_id');
            if (empty($id)) {
                return $this->e_msg('请求参数错误！');
            }
            if (empty($result)) {
                Db::name('voting')->insert($insertData);
                Db::name('vote')->where('id', $vote_id)->setInc('person_num', 1);
                Db::name('election')->where('v_id', $vote_id)->where('user_id', $id)->setInc('votes', 1);
                Db::commit();
                return $this->s_msg('投票成功');
            } else {
                return $this->e_msg('您已参与投票');
            }
        } else {
            return $this->e_msg('请求参数错误');
        }
    }

    /**
     * 发起投票
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:45:08
     * @author: wcg
     */
    public function poll()
    {
        $us_id = $this->user['id'];
        $name = input('name');
        $start = input('start');
        $end = input('end');
        $type = input('type');
        if($this->user['us_type'] != 3 && $this->user['us_type'] != 4){
            $this->e_msg('你没有权限发起投票');
        }
        if ($type == 1)
            $need = input('need');
        else
            $need = 0;
        //获取到所有系统服务商的id
        if ($type != 3) {
            if (!empty(input('levels'))) {
                $levels = implode(',', input('levels'));
            } else {
                return $this->e_msg('参与范围必选');
            }
        } else {
            //查询有无正在审批的商品和商家
            $apply = Db::name('apply')->where('status', 'in', '1,2')->find();
            $product = Db::name('product')->where('st_status', 1)->find();
            if (!empty($apply) || !empty($product)) {
                return $this->e_msg('当前有正在审核的申请，无法发起选举');
            }
            $levels = 3;
        }
        $data = [
            'user_id' => $us_id,
            'name' => $name,
            'add_time' => $start,
            'end_time' => $end,
            'need' => $need,
            'user_levels' => $levels,
            'type' => $type,
        ];
        $validate = new Verify;
        $result = $validate->scene('vote')->check($data);
        if (!$result) {
            return $this->e_msg($validate->getError());
        }

        $vote_id = Db::name('vote')->insertGetId($data);
        if ($type == 3) {
            $proList = UserLogic::getProvider();
            foreach ($proList as $key => $v) {
                $data = [
                    'v_id' => $vote_id,
                    'user_id' => $v,
                    'votes' => 0,
                ];
                Db::name('election')->insert($data);
            }
        }
        Site::isEnd();
        return $this->s_msg('添加成功');
    }

    /**
     * 投票详情页面
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:45:22
     * @author: wcg
     */
    public function detail()
    {
        $v_id = input('id');
        $data = Db::name('vote')->where('id', $v_id)->field('user_levels,status', true)->find();
        if (!$data) {
            return $this->e_msg('出错了');
        }
        if ($data['type'] == 3) {
            $result['vote'] = $data;
            $result['provider'] = VoteLogic::getName($v_id);
            return $this->s_msg(null, $result);
        } else {
            return $this->s_msg(null, $data);
        }
    }
}


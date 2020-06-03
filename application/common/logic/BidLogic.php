<?php
/**
 * 竞拍逻辑
 * Created by spf
 * User: Administrator
 * Date: 2020/4/14 9:24
 *
 */

namespace app\common\logic;

use app\common\model\User;
use app\common\validate;
use think\Db;

class BidLogic
{
    /**
     * 检测服务是否可以竞拍
     * @param $pd_id 服务id
     * @return int 0：服务未在竞价状态；1：服务尚未通过审核；2：服务可以竞价
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author sunpf
     * @date 2020/4/14 10:00
     */
    public function checkProduct($pd_id){
        $res = model('product')->where('id',$pd_id)->find();
        if ($res['pd_status'] > 2){
            return 0;
        }elseif($res['st_status'] == 1 && $res['pd_status'] <= 2){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 竞标冻结总费用
     * @param $us_id ：会员id
     * @param $money ：需要冻结的数量
     * @param $coin_id ：币种
     * @param $type ：1 竞价冻结费用 2 解冻费用
     * @return int ：0 余额不足  1 冻结成功  2 冻结失败 4 该用户没有此币种 5 解冻成功 6 解冻失败
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * @author sunpf
     * @date 2020/4/15 15:52
     */
    public function changeMoney($us_id,$money,$coin_id ,$type){
        $map[] = ['user_id','=',$us_id];
        $map[] = ['coin_id','=',$coin_id];
        $info = db('money')->where($map)->find();
        if (!$info){
            return 4;
        }
        if ($type == 1){
            if ($info['money'] < $money){
                return 0;
            }else{
                $data['money'] = $info['money'] - $money;
                $data['lock_money'] = $info['lock_money'] + $money;
                $res = db('money')->where('id',$info['id'])->update($data);
                if ($res){
                    return 1;
                }else{
                    return 2;
                }
            }
        }elseif($type == 2){
            $data['money'] = $info['money'] + $money;
            $data['lock_money'] = $info['lock_money'] - $money;
            $res = db('money')->where('id',$info['id'])->update($data);
            if ($res){
                return 5;
            }else{
                return 6;
            }
        }

    }

    /**
     * 查询竞价开始费用的基数
     * @param $pd_id
     * @return int ：0 从0开始计费； 1 从1开始计费
     * @author sunpf
     * @date 2020/4/20 10:38
     */
    public function baseFee($pd_id)
    {
        $pd_sales = model('product')->where('id',$pd_id)->value('pd_sales');
        $res = model('bidding')->where('pd_id',$pd_id)
                ->where('sales',$pd_sales + 1)
                ->order('add_time asc')
                ->value('fee');
        if ($res == 1){
            return 1;
        }else{
            return 0;
        }
    }
    /**
     * @param $user_id
     * @return array
     * @author sunpf
     * @date 2020/4/17 9:28
     */
    public function getParent($user_id)
    {
        $path = model('user')->getValue($user_id,'us_path');
        $pathArray = explode(',',$path);
        return $pathArray;
    }
    /**
     * 竞价之后的分润
     * @param $pd_id 服务id
     * @param $bid_id 竞价id
     * @return int 0 未查到前一竞价者 1奖励发放成功 2 奖励发放失败
     * @author sunpf
     * @date 2020/4/16 11:05
     */
    public function award($pd_id,$bid_id){
        $pd_info = model('product')->getInfo($pd_id);
        $bid_info = model('bidding')->getInfo($bid_id); //当前竞价信息
        $money = $bid_info['fee'];  //分润基数
        $base_money = $bid_info['pd_price'];
        $total = $money + $base_money;
        $before_user_id = model('bidding')->beforeUserId($pd_id,$bid_info['sales'],$bid_info['times']); //前一个竞价者id


        $data['times'] = 0;
        $data['pd_status'] = 3;
        $data['pd_sales'] = $pd_info['pd_sales'] + 1;
        $data['deal_time'] = date('Y-m-d H:i:s');

        $st_id = $pd_info['st_id']; //商家id
        $map['coin_id'] = 2;  //UZF

        if (!$before_user_id){
                if ($bid_info['status'] == 1){
                    Db::startTrans();
                    try{
                        $res[] = DB::name('product')->where('id',$pd_id)->update($data);
                        $res[] = DB::name('money')->where('user_id',$bid_info['user_id'])->where($map)->setDec('lock_money',$total);
                        $wallet[] = [
                            'us_id'=> $bid_info['user_id'],
                            'wa_num'=> $total,
                            'wa_note'=> '中标费用',
                            'or_id'=> $bid_id,
                            'status'=> 1,   //出账
                            'lock_type'=> 2,   //冻结资金
                            'add_time'=> date('Y-m-d H:i:s')
                        ];
                    $res[] = DB::name('money')->where('user_id',$before_user_id)->where($map)->setDec('lock_money',$base_money);
                    $res[] = DB::name('wallet')->insertAll($wallet);
                    if(in_array(0,$res)){
                        throw new \Exception('失败');
                    }else{
                        Db::commit();
                        return 1;
                    }
                } catch (\Exception $e) {
                    Db::rollback();
                    return $e->getMessage();
                }
            }else{
                    $edit['start_time'] = date('Y-m-d H:i:s');
                    $time = $pd_info['bid_last_time'];
                    $edit['maybe_end_time'] = date('Y-m-d H:i:s',strtotime("+$time hour"));
                    $edit['times'] = 1;
                    $edit['pd_status'] = 2;
                    $res = model('product')->where('id',$pd_id)->update($edit);
                    if ($bid_info['fee'] == 0){
                        $res2 = model('user')->where('id',$bid_info['user_id'])->setDec('free_times',1);
                    }

                    if ($res){
                        return 1;
                    }else{
                        return '修改失败';
                    }

                }
        }else{
            $path = model('user')->getValue($st_id,'us_path');
            $path_array = explode(',',$path);
            $setting_id = $path_array[2];            //系统服务商id
            $super_id = $path_array[1];             //超级节点id
            $award1 = round($money * 0.2,8);
            $award2 = round($money * 0.5,8);
            $award3 = round($money * 0.2,8);
            $award4 = round($money * 0.1,8);
            $wallet[] = [
                'us_id'=> $before_user_id,
                'wa_num'=> $award1,
                'wa_note'=> '竞价分润',
                'or_id'=> $bid_id,
                'status'=> 2,   //入账
                'lock_type'=> 1,
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $st_id,
                'wa_num'=> $award2,
                'wa_note'=> '竞价分润',
                'or_id'=> $bid_id,
                'status'=> 2,   //入账
                'lock_type'=> 1,
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $setting_id,
                'wa_num'=> $award3,
                'wa_note'=> '竞价分润',
                'or_id'=> $bid_id,
                'status'=> 2,   //入账
                'lock_type'=> 1,
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $super_id,
                'wa_num'=> $award4,
                'wa_note'=> '竞价分润',
                'or_id'=> $bid_id,
                'status'=> 2,   //入账
                'lock_type'=> 1,
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $before_user_id,
                'wa_num'=> $base_money,
                'wa_note'=> '竞价解冻资金',
                'or_id'=> $bid_id,
                'status'=> 2,   //入账
                'lock_type'=> 1,   //冻结资金
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $before_user_id,
                'wa_num'=> $base_money,
                'wa_note'=> '解冻资金',
                'or_id'=> $bid_id,
                'status'=> 1,   //出账
                'lock_type'=> 2,   //冻结资金
                'add_time'=> date('Y-m-d H:i:s')
            ];

            Db::startTrans();
            try{
                $res[1] = DB::name('money')->where('user_id',$before_user_id)->where($map)->setInc('money',$award1+$base_money);
                $res[2] = DB::name('money')->where('user_id',$st_id)->where($map)->setInc('money',$award2);
                $res[3] = DB::name('money')->where('user_id',$setting_id)->where($map)->setInc('money',$award3);
                $res[4] = DB::name('money')->where('user_id',$super_id)->where($map)->setInc('money',$award4);
                $res[5] = DB::name('product')->where('id',$pd_id)->setInc('times',1);
                if ($bid_info['status'] == 1){
//                    $data['times'] = 0;
//                    $data['pd_status'] = 3;
//                    $data['pd_sales'] = $pd_info['pd_sales'] + 1;
//                    $data['deal_time'] = date('Y-m-d H:i:s');
                    $res[] = DB::name('product')->where('id',$pd_id)->update($data);
                    $res[] = DB::name('money')->where('user_id',$bid_info['user_id'])->where($map)->setDec('lock_money',$base_money);
                    $res[] = DB::name('money')->where('user_id',$st_id)->where($map)->setInc('money',$base_money);
                    $wallet[] = [
                        'us_id'=> $bid_info['user_id'],
                        'wa_num'=> $base_money,
                        'wa_note'=> '中标费用',
                        'or_id'=> $bid_id,
                        'status'=> 1,   //出账
                        'lock_type'=> 2,   //冻结资金
                        'add_time'=> date('Y-m-d H:i:s')
                    ];
                    $wallet[] = [
                        'us_id'=> $st_id,
                        'wa_num'=> $base_money,
                        'wa_note'=> '出售服务（中标）',
                        'or_id'=> $bid_id,
                        'status'=> 2,   //出账
                        'lock_type'=> 1,   //冻结资金
                        'add_time'=> date('Y-m-d H:i:s')
                    ];
                }
                $res[] = DB::name('money')->where('user_id',$before_user_id)->where($map)->setDec('lock_money',$base_money);
                $res[] = DB::name('wallet')->insertAll($wallet);
//                dump($res);
                if(in_array(0,$res)){
                    throw new \Exception('分润失败');
                }else{
                    Db::commit();
                    return 1;
                }
            } catch (\Exception $e) {
                Db::rollback();
//                dump ($e);
                return $e->getMessage();
            }
        }


    }

    public function taskBid($array)
    {
        $product_data['pd_status'] = 3;
        $product_data['times'] = 0;
        $product_data['deal_time'] = date('Y-m-d H:i:s');
        Db::startTrans();
        try {
            foreach ($array as $key => $value) {
                $bid_info = model('bidding')->getInfo($value);
                $pd_info = model('product')->getInfo($bid_info['pd_id']);
                $res[] = DB::name('product')->where('id',$bid_info['pd_id'])->update($product_data);
                $res[] = DB::name('bidding')->where('id',$bid_info['id'])->update(['status'=>1]);
                $res[] = DB::name('money')->where('user_id',$bid_info['user_id'])->where('coin_id',2)->setDec('lock_money',$bid_info['pd_price']);
                $res[] = DB::name('money')->where('user_id',$pd_info['st_id'])->where('coin_id',2)->setInc('money',$bid_info['pd_price']);
                $wallet[] = [
                    'us_id'=> $bid_info['user_id'],
                    'wa_num'=> $bid_info['pd_price'],
                    'wa_note'=> '中标费用',
                    'or_id'=> $bid_info['id'],
                    'status'=> 1,   //出账
                    'lock_type'=> 2,   //冻结资金
                    'add_time'=> date('Y-m-d H:i:s')
                ];
                $wallet[] = [
                    'us_id'=> $pd_info['st_id'],
                    'wa_num'=> $bid_info['pd_price'],
                    'wa_note'=> '出售服务（中标）',
                    'or_id'=> $bid_info['id'],
                    'status'=> 2,   //出账
                    'lock_type'=> 1,   //冻结资金
                    'add_time'=> date('Y-m-d H:i:s')
                ];
            }
            $res[] = DB::name('wallet')->insertAll($wallet);
            if(in_array(0,$res)){
                throw new \Exception('失败');
            }else{
                Db::commit();
                return 1;
            }
        }catch (\Exception $e){
            Db::rollback();
            return $e->getMessage();
        }


    }
}
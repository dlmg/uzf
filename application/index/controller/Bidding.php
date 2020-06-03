<?php
/**
 * 竞拍接口
 * @author sunpf
 * @date 2020/4/14 9:20
 */
namespace app\index\controller;

use app\common\logic\UserLogic;
use app\common\logic\BidLogic;
use app\common\logic\OrderLogic;
use think\Db;
class Bidding extends Basis
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 会员竞价
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * @author sunpf
     * @date 2020/4/15 16:14
     */
    public function addBid()
    {
        $bid = new BidLogic();
        $param = input('post.');
        $validate = validate('Verify');
        if (!$validate->scene('addBid')->check($param)) {
            $this->e_msg($validate->getError());
        }
        if ($this->user['us_pw2'] != md5($param['us_pw2'])){
            $this->e_msg('支付密码错误');
        }
        $res = $bid->checkProduct($param['pd_id']);
        $pd_info = model('product')->getInfo($param['pd_id']);

        if ($res != 2){
            $this->e_msg('该服务不可竞拍');
        }
        $param['pd_name'] = $pd_info['pd_name'];
        $param['user_id'] = $this->user['id'];
        $param['pd_price'] = $pd_info['pd_price'];
        $param['sales'] = $pd_info['pd_sales'] + 1;
        $param['times'] = $pd_info['times'] + 1;
        $param['add_time'] = date('Y-m-d H:i:s');
        $base = $bid->baseFee($param['pd_id']);
        if ($pd_info['times'] == 0){
           if ($this->user['free_times'] > 0){
                $param['fee'] = 0;
            }else{
                $param['fee'] = pow(2,$pd_info['times']);
            }
        }else{
           if ($base == 1){
                $param['fee'] = pow(2,$pd_info['times']);
            }else{
                $param['fee'] = pow(2,$pd_info['times']-1);
            }
        }

        if ($param['times'] == $pd_info['bidding_times']){
            $param['status'] = 1; //中标
        }else{
            $param['status'] = 0; //未中标
        }
        if ($param['style'] == 2){
            $param['fee'] = pow(2,$pd_info['bidding_times']-1); //一口价
            $param['status'] = 1; //中标
        }
        $total = $param['fee'] + $pd_info['pd_price'];  //本次竞标需要支付的总费用
        $money = Db::name('money')->where('user_id',$this->user['id'])->where('coin_id',2)->value('money');
        if ($money < $total){
            $this->e_msg('余额不足');
        }
        $rel = $bid->changeMoney($this->user['id'],$pd_info['pd_price'],2,1);


        if ($rel == 0){
            $this->e_msg('余额不足');
        }elseif ($rel == 2){
            $this->e_msg('冻结失败');
        }elseif ($rel == 4){
            $this->e_msg('未查到该币种');
        }else{
            $rel = model('bidding')->add($param); //添加竞标
            $wallet[] = [
                'us_id'=> $this->user['id'],
                'wa_num'=> $pd_info['pd_price'],
                'wa_note'=> '竞标冻结资金',
                'or_id'=> $rel,
                'status'=> 1,   //出账
                'lock_type'=> 1,   //资金
                'add_time'=> date('Y-m-d H:i:s')
            ];
            $wallet[] = [
                'us_id'=> $this->user['id'],
                'wa_num'=> $pd_info['pd_price'],
                'wa_note'=> '竞标冻结资金',
                'or_id'=> $rel,
                'status'=> 2,   //入账
                'lock_type'=> 2,   //冻结资金
                'add_time'=> date('Y-m-d H:i:s')
            ];
            if ($param['fee'] != 0){
                $wallet[] = [
                    'us_id'=> $this->user['id'],
                    'wa_num'=> $param['fee'],
                    'wa_note'=> '竞标手续费',
                    'or_id'=> $rel,
                    'status'=> 1,   //出账
                    'lock_type'=> 1,   //资金
                    'add_time'=> date('Y-m-d H:i:s')
                ];
            }
            if($rel){
                $rel2 =$bid->award($param['pd_id'],$rel);
                if ($rel2 == 1){
                    Db::name('money')->where('user_id',$this->user['id'])->where('coin_id',2)->setDec('money',$param['fee']);
                    model('wallet')->insertAll($wallet);
                    if ($param['fee'] = 0){
                        model('user')->where('id',$this->user['id'])->setDec('free_times',1);
                    }
                    if ($pd_info['times'] == 0){
                        model('product')->where('id',$param['pd_id'])->update(['start_time'=>date('Y-m-d H:i:s')]);
                    }
                    if ($param['status'] == 1){
                        $order = new OrderLogic();
                        $order->addOrder($total,$this->user['id'],$param['pd_id']);
                    }
                    $this->s_msg('竞价成功');
                }else{
                    model('bidding')->destroy($rel);//分润失败删除添加的竞标
                    $bid->changeMoney($this->user['id'],$total,2,2);//退回冻结的资金
                    dump($rel2);
                    $this->e_msg($rel2);
                }
            }else{
                $bid->changeMoney($this->user['id'],$total,2,2);
                $this->e_msg('竞价失败');
            }
        }
    }

}

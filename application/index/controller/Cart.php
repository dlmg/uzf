<?php
namespace app\index\controller;

use app\common\logic\ProductLogic;
/**
 * 购物车控制器
 */
class Cart extends Basis {

	function __construct() {
		parent::__construct();
	}
    /**
     * 加入购物车
     * @Author   fengkl
     * @DateTime 2018-08-31T10:33:16+0800
     */
	public function add()
    {
        //halt(input('post.'));
        $pd_id = input('post.pd_id');
        //$color = input('post.color');
        $pd_price = input('post.pd_price');
        $spec = input('post.spec');
        $num = input('post.num');
        $sku_id = input('post.sku_id');
        if(!$pd_id){
            $this->e_msg('请选择商品');
        }
        // if(!isset(input('post.sku_id'))){
        //     $this->e_msg('请传商品的规格的id');
        // }
        if(!$spec){
            $this->e_msg('请选择商品规格');
        }
        if(!$num){
            $this->e_msg('请选择商品数量');
        }
        // $us_id = $this->user['id'];
        $us_id = input('post.us_id');
        if (!$us_id) {
            $this->e_msg('请登录');
        }
        $map['pd_id'] = $pd_id;
        $map['us_id'] = $us_id;
        //$map['pd_color'] = $color;
        $map['pd_spec'] = $spec;
        $ca_model = model('cart');
        $rst = $ca_model->getOne($map);
        //halt($rst);
        if($rst){
            $result = $ca_model->where('id',$rst['id'])->setInc('pd_num',$num);
            if($result){
                return $this->s_msg('购物车商品数量+'.$num,$result);
            }else{
                return $this->e_msg('添加失败'); 
            }
        }
        $goods = model('Product')->where('id',$pd_id)->find();
        $carts['us_id'] = $us_id;
        $carts['pd_id'] = $pd_id;
        //$carts['pd_color'] = $color;
        $carts['st_id'] = $goods['st_id'];
        $carts['ca_pid'] = $goods['ca_id'];
        //$carts['ca_pid'] = model('cate')->where('id',$goods['ca_id'])->value('p_id');
        $carts['pd_spec'] = $spec;
        $carts['pd_num'] = $num;
        $carts['sku_id'] = $sku_id;
        $carts['pd_name'] = $goods['pd_name'];
        $carts['pd_price'] = $pd_price;
        $carts['take_fee'] = $goods['take_fee'];
        $carts['pd_pic'] = $goods['pd_pic']; 
        $carts['pd_head_pic'] = $goods['pd_head_pic'];                   
        $carts['pd_content'] = $goods['pd_content'];
        $carts['add_time'] = date('Y-m-d H:i:s');
        $rel = model("Cart")->addInfo($carts);
        //halt($rel);
        if($rel){
            return $this->s_msg('添加成功', $rel);
        }
        return $this->e_msg('添加失败');
    }
    /**
     * 购物车列表
     * @Author   fengkl
     * @DateTime 2018-09-01T15:38:16+0800
     * @return   [type]                   [description]
     */
    public function index()
    {
        //$map['us_id'] = input('post.us_id');
        $map['us_id'] = $this->user['id'];
        $info = db('cart')->where($map)->select();
        foreach ($info as $key => $value) {
            $inventory = model('Product')->where('id',$value['pd_id'])->value('pd_inventory');
            $info[$key]['inventory'] = $inventory;
        }
        // $list = array();
        // $list2 = array();
        // foreach ($info as $key => $value) {
        //     $value['max_num'] = model('Product')->where('id',$value['pd_id'])->value('pd_inventory');
        //     if (!empty($list[$value['st_id']])) {
        //         $list[$value['st_id']]['list'][] = $value;

        //     } else {
        //          $list[$value['st_id']]['st_name'] = model('User')->where('id',$value['st_id'])->value('us_apply_shopname')??'草津堂';
        //          $list[$value['st_id']]['list'][] = $value;
        //     }
        // }
        // foreach ($list as $key => $value) {
        //     # code...
        //     $list2[] = $value;
        // }
        $this->s_msg(null,$info);

    }
    /**
     * 购物车数量修改
     * @Author   sunpf
     * @DateTime 2019-04-29
     * @return   [type]                   [description]
     */
    public function changeNum()
    {
        $id = input('post.cart_id');
        //$type = input('post.type');
        // if ($type == 1 ) {
        //     $rel = model('cart')->where('id',$id)->setInc('pd_num');
        // }elseif ($type == 2) {
        //     $num = model('cart')->where('id',$id)->value('pd_num');
        //     if($num < 2){
        //         $this->e_msg('已是最小数量');
        //     }
        //     $rel = model('cart')->where('id',$id)->setDec('pd_num');
        // }elseif ($type == 3) {
        if (input('post.pd_num') <= 0 || floor(input('post.pd_num'))-input('post.pd_num') != 0) {
            $this->e_msg('输入参数错误');
        }
        $data['pd_num'] = input('post.pd_num')?input('post.pd_num'):1;
        $rel = model('cart')->where('id',$id)->update($data);
        
        
        if($rel){
            $this->s_msg('成功');
        }
        $this->e_msg('失败');
    }
    // /**
    //  * 购物车数量减一
    //  * @Author   fengkl
    //  * @DateTime 2018-09-01T17:16:13+0800
    //  * @return   [type]                   [description]
    //  */
    // public function cutnum()
    // {
    //     $id = input('post.cart_id');
    //     $num = model('cart')->where('id',$id)->value('pd_num');
    //     if($num < 2){
    //         $this->e_msg('已是最小数量');
    //     }
    //     $rel = model('cart')->where('id',$id)->setDec('pd_num');
    //     if($rel){
    //         $this->s_msg('成功');
    //     }
    //     $this->e_msg('失败');
    // }
    /**
     * 删除购物车商品
     * @Author   fengkl
     * @DateTime 2018-09-01T17:17:35+0800
     * @return   [type]                   [description]
     */
    public function delcart()
    {
        $id = input('post.cart_id');
        $rel = model('cart')->where('id',$id)->delete();
        if($rel){
            $this->s_msg('成功');
        }
        $this->e_msg('失败');
    }
    /**
     * 购物车列表结算生成订单
     * @Author   fengkl
     * @DateTime 2018-09-03T15:54:15+0800
     */
    public function addOrder()
    {
        // $map['us_id'] = $this->user['id'];
        $map['us_id'] = 1;
        $level = $this->user['us_level'];
        $map['addr_default'] = 1;
        $addr = model('UserAddr')->where($map)->value('id');
        if(!$addr){  
            $this->e_msg('请填写收货地址');
        }
        $ids = input('post.id');
        if(!$ids){
            $this->e_msg('请选择商品');
        }
        $cart_m = model('Cart');
        $carts = $cart_m->where('id','in',$ids)->select();
        //$st_id = $carts[0]['st_id'];
        $ca_pid = $carts[0]['ca_pid'];
        foreach ($carts as $k => $v) {
           if($ca_pid !== $v['ca_pid']){
                $this->e_msg('不同大类商品请分批购买');
            }                                                                                                                   
        }
        // if($level == 0 ) {
        //     if ($ca_pid != 11 ) {
        //         $this->e_msg('普通会员不能购买该类产品');
        //     }
        // }elseif ($level == 2) {
        //     if ($ca_pid == 11) {
        //         $this->e_msg('VIP会员不能购买该类产品');
        //     }
        // }
        
        //添加订单
        $order = array();
        $order['us_id'] = $map['us_id'];
        $order['or_status'] = 0;
        //$order['st_id'] = $st_id;
        $order['ca_id'] = $ca_pid;
        $order['or_add_time'] = date('Y-m-d H:i:s');
        $order['or_num'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $order['addr_id'] = $addr;
        //$order['or_remark'] = $param['or_remark'];
        $or_id = model('order')->addInfo($order);
        if(!$or_id){
            $this->error('订单添加失败');
        }
        //添加订单详情
        $pd_logic = new ProductLogic;
        $order_d = array();        
        foreach ($carts as $key => $value) {
            # code...
            $order_d['pd_color'] = $value['pd_color'];
            $order_d['pd_spec'] = $value['pd_spec']; 
            $info = $pd_logic->getOne($value['pd_id']);     
            $st_id = $info['st_id'];                               
            $order_d['or_id'] = $or_id;       
            $order_d['ca_id'] = $info['ca_id'];
            $order_d['pd_id'] = $info['id'];
            $order_d['or_pd_name'] = $info['pd_name'];
            $order_d['or_pd_pic'] = implode(',', $info['pd_pic']);
            $order_d['or_pd_price'] = $info['pd_price'];
            $order_d['or_pd_num'] = $value['pd_num'];
            $order_d['or_pd_content'] = $info['pd_content'];
            $rel = model('OrderDetail')->addInfo($order_d);
            if(!$rel){
                $this->error('详情添加失败');
            } 
            $cart_m->where('id',$value['id'])->delete();           
        }   
        // $or_id = encrypt($or_id);    
        $this->s_msg('订单提交成功',$or_id);
    }   	
}
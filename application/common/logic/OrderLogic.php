<?php
/**
 * Created by sunpf
 * User: Administrator
 * Date: 2018年5月25日 10:44:20
 * 
 */

namespace app\common\logic;

use app\common\model\Store;
use app\common\model\Order;
use app\common\validate;
use think\Db;

class OrderLogic 
{
    /**
     * 订单列表
     * author sunpf
     * time 2018年5月25日 10:44:42
     * @return mixed
     */
    public function getList($map,$order,$size)
    {
        $ormodel = new Order();
        $field = 'a.*, b.us_nickname, b.us_tel';
        $info = $ormodel->getList($map,$order,$size,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }
    public function getListNpg($map,$order,$size)
    {
        $ormodel = new Order();
        $field = 'a.*, b.us_nickname, b.us_tel';
        $info = $ormodel->getListNpg($map,$order,$size,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }

    /**
     * 商品信息
     * author sunpf
     * time 2018年5月24日18:05:42
     * @return mixed
     */
    public function getOneOrder($id)
    {
        $pdmodel = new Order();
        $map['a.id'] = $id;
        $field = 'a.id,a.addr_id,b.pd_id , a.sku_id, b.or_pd_name, b.or_pd_num, b.or_pd_price,b.or_pd_pic,b.pd_color,b.ca_id, b.pd_spec, c.province, c.city, c.area, c.addr_detail, c.addr_tel, c.addr_receiver';
        $info = $pdmodel->getOneOrder($map,$field);
        return $info;
    }
   
    /**
     * 订单一个详情商品信息
     * author sunpf
     * time 2018年6月13日 10:10:45
     * @return mixed
     */
    public function getOneDetail($id)
    {
        $ormodel = new Order();
        $map['b.id'] = $id;
        $field = 'a.id,b.pd_id , b.or_pd_name, b.or_pd_num, b.or_pd_price,b.or_pd_pic,b.or_pd_content, b.pd_color, b.pd_spec , c.province, c.city, c.area, c.addr_detail, c.addr_tel, c.addr_receiver,a.or_express,a.or_express_num';
        $info = $ormodel->getOneDetail($map,$field);
        return $info;
    }


    /**
     * 商品添加和修改
     * author sunpf
     * time 2018年5月24日 15:48:18
     * @return mixed
     * code为1为修改
     */
    public function saveOrder($data,$code = '')
    {
        //var_dump($data);exit();
        $rel = array();     
        if($code == 1){
            //修改操作              
            $map['id'] = $data['id'];   
            $rell = model('Order')->updateInfo($map,$data);
            if($rell){
                $rel['code'] = 1;
                $rel['msg'] = '修改成功！';
            }else{
                $rel['code'] = 0;
                $rel['msg'] = '您没有作出修改！';
            }
            return $rel;
        }
        $data['or_add_time'] = date('Y-m-d H:i:s');
        //添加操作      
        $rell = model('Order')->addInfo($data);
        if($rell){
            $rel['code'] = 1;
            $rel['msg'] = '添加成功！';
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '添加失败！';
        }
        return $rel;
    }

    /**
     * 分类添加
     * author sunpf
     * time 2018年5月23日 17:38:34
     * @return mixed
     * 
     */
    public function saveCate($data)
    {
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('addCate')->check($data);
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        $data['ca_add_time'] = date('Y-m-d H:i:s');
        //添加操作      
        $rell = model('Cate')->addInfo($data);
        if($rell){
            $rel['code'] = 1;
            $rel['msg'] = '添加成功！';
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '添加失败！';
        }
        return $rel;

    }

    /**
     * 下单
     * @param $us_id
     * @param $total
     * @param $pd_id
     * @return int
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author sunpf
     * @date 2020/4/20 15:04
     */
    public function addOrder($total, $us_id,$pd_id)
    {
        $goods = model('product')->getInfo($pd_id);
        $order = array();
        $order['ca_id'] = $goods['ca_id'];


        $order['us_id'] = $us_id;
        $order['or_status'] = 1;
        $order['total'] = $total;
        $order['pd_id'] = $goods['id'];
        $order['st_id'] = $goods['st_id'];
        $order['or_add_time'] = date('Y-m-d H:i:s');
        $order['or_num'] = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);


        $check_order_num = model('order')->where('or_num', $order['or_num'])->count();
        if ($check_order_num > 0) {
            $or_num = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);  //订单号
            while (model('order')->where('or_num', $or_num)->count()) {
                $or_num = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT); //订单号
            }
        } else {
            $or_num = $order['or_num'];
        }
        $or_id = model('order')->addInfo($order);
        if(!$or_id){
            return 0;
        }
        $order_d = array();
        $order_d['or_id'] = $or_id;
        $order_d['ca_id'] = $goods['ca_id'];
        $order_d['pd_id'] = $goods['id'];
        $order_d['or_pd_name'] = $goods['pd_name'];
        $order_d['or_pd_pic'] = $goods['pd_pic'];
        $order_d['or_pd_price'] = $goods['pd_price'];
        $order_d['or_pd_num'] = 1;
//        $order_d['sku_id'] = $sku_id;
        $order_d['or_pd_content'] = $goods['pd_content'];
        $rel = model('OrderDetail')->addInfo($order_d);
        if(!$rel){
            return 0;
        }else{
            return 1;
        }
    }




}
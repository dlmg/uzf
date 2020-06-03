<?php

namespace app\index\controller;

use think\Controller;
use app\common\logic\OrderLogic;
use app\common\logic\ProductLogic;
use app\common\logic\OrderDetailLogic;

use think\Db;


class Order extends Basis

{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 我的订单（会员订单）
     * $tag 'all'全部订单   'bidding'竞价中  'used'待使用  'out'出局订单  'evaluate'待评价订单  'done'已完成
     * @throws \think\exception\DbException
     * @create_time: 2020/5/21 9:45:55
     * @author: wcg
     */
    public function getOrder()
    {
        $tag = input('tag');
        $us_id = $this->user['id'];
        //全部订单
        if ($tag == 'all') {
            if (input('keywords')) {
                $keywords = input('keywords');
                $map[] = ['b.pd_name', 'LIKE', '%' . $keywords . '%'];
            }

            $subQuery = Db::table('uzf_bidding')
                ->where('user_id', $us_id)
                ->order('status', 'desc')
                ->order('fee', 'desc')
                ->order('add_time', 'desc')
                ->limit(9999)
                ->buildSql();

            $result = Db::table($subQuery . ' a')
                ->join('uzf_product b', 'a.pd_id=b.id')
                ->field('a.*,b.pd_status,b.pd_sales')
                ->where($map)
                ->group('a.pd_id,a.sales')
                ->paginate(10, false, $config = ['query' => request()->param()])
                ->each(function ($item, $key) {
                    if ($item['status'] == 1) {
                        if ($item['sales'] <= $item['pd_sales']) {
                            $item['statusText'] = '竞价成功';
                        } elseif ($item['sales'] > $item['pd_sales']) {
                            $item['statusText'] = '待使用';
                        }
                    } elseif ($item['status'] == 0) {
                        if ($item['sales'] <= $item['pd_sales']) {
                            $item['statusText'] = '已出局';
                        } elseif ($item['sales'] > $item['pd_sales']) {
                            if ($item['pd_status'] == 3) {
                                $item['statusText'] = '已出局';
                            } elseif ($item['pd_status'] == 2)
                                $item['statusText'] = '竞价中';
                        }
                    }
                    return $item;
                });
        } elseif ($tag == 'bidding') {
            $subQuery = Db::table('uzf_bidding')
                ->where('user_id', $us_id)
                ->where('status', 0)
                ->order('add_time', 'desc')
                ->limit(9999)
                ->buildSql();
            $result = Db::table($subQuery . ' a')
                ->join('uzf_product b', 'a.pd_id=b.id and a.sales=b.pd_sales+1')
                ->field('a.*,b.pd_status,b.pd_sales')
                ->where('b.pd_status', '<>', 3)
                ->group('a.pd_id,a.sales')
                ->paginate(10, false, $config = ['query' => request()->param()]);
        } elseif ($tag == 'used') {
            $result = model('Order')->where('us_id', $us_id)->where('or_status', 1)->paginate($this->size, false, $config = ['query' => request()->param()]);
        } elseif ($tag == 'out') {
            //已出局订单
            /*$sql = "select * from (select a.*,b.pd_status,b.pd_sales from (select * from  uzf_bidding where user_id=$us_id order by status desc,add_time desc limit 9999) a join uzf_product b on a.pd_id=b.id GROUP BY a.pd_id,a.sales) r where (r.status=0 and r.sales<=r.pd_sales) or (r.sales>r.pd_sales and r.pd_status=3)";
            $result = Db::query($sql);*/
            $subQuery = Db::table('uzf_bidding')
                ->where('user_id', $us_id)
                ->order('status', 'desc')
                ->order('add_time', 'desc')
                ->limit(9999)
                ->buildSql();
            $query = Db::table($subQuery . ' a')
                ->join('uzf_product b', 'a.pd_id=b.id')
                ->field('a.*,b.pd_status,b.pd_sales')
                ->group('a.pd_id,a.sales')
                ->buildSql();
            $result = Db::table($query . ' r')
                ->where('(r.status=0 and r.sales<=r.pd_sales) or (r.sales>r.pd_sales and r.pd_status=3 and r.status=0)')
                ->paginate(10, false, $config = ['query' => request()->param()]);

        } elseif ($tag == 'evaluate') {
            $result = model('Order')->where('us_id', $us_id)->where('or_status', 2)->paginate($this->size, false, $config = ['query' => request()->param()]);
        } elseif ($tag == 'done') {
            $result = model('Order')->where('us_id', $us_id)->where('or_status', 3)->paginate($this->size, false, $config = ['query' => request()->param()]);
        }
        if (!input('tag')) {
            $this->e_msg('传值错误');
        }

        if ($result->isEmpty()) {
            $this->e_msg('此分类下暂无订单');
        } else {
            $this->s_msg('null', $result);
        }
    }


    /**
     * 用户评价
     * @create_time: 2020/5/25 14:17:53
     * @author: wcg
     */
    public function evaluation()
    {
        $data = input('post.');
        $data['us_id'] = $this->user['id'];
        $data['st_id'] = Db::name('product')->where('id', $data['pd_id'])->value('st_id');
        $result = Db::name('order')->where('id', $data['or_id'])->find();
        if (!$result) {
            $this->e_msg('订单不存在');
        }
        unset($result);
        $data['add_time'] = date('Y-m-d H:i:s');
        Db::startTrans();
        try {
            $info = Db::name('comment')->insertGetId($data);
            $result = Db::name('order')->where('id', $data['or_id'])->setField('or_status', 3);
        } catch (\Exception $e) {
            Db::rollback();
            return $e->getMessage();
        }
        if ($info && $result) {
            Db::commit();
            $this->s_msg('评价成功');
        } else {
            $this->e_msg('评价失败，稍后再试');
        }
    }

    /**
     * 订单转让
     * @create_time: 2020/5/26 11:08:01
     * @author: wcg
     */
    public function transfer(){
        $or_id = input('or_id');//转让订单id
        $us_tel = input('us_tel');//转让目标账户
        $code = input('code');
        $data['us_id'] = Db::name('user')->where('us_tel',$us_tel)->value('id');
        $insertData['from_uid'] = $this->user['id'];
        $insertData['to_uid'] = $data['us_id'];
        $insertData['or_id'] = $or_id;
        $insertData['add_time'] = date('Y-m-d H:i:s');
        $code_info = cache($this->user['us_tel'] . 'code') ?: "";
        if (!$code_info) {
            $this->e_msg('请重新发送验证码');
        } elseif (trim($code) != $code_info) {
            $this->e_msg('验证码不正确');
        }
        if(!$data['us_id']){
            $this->e_msg('账户不存在');
        }
        Db::startTrans();
        try{
            $info = Db::name('order')->where('id',$or_id)->update($data);
            $result = Db::name('transfer')->insertGetId($insertData);
        }catch(\Exception $e){
            Db::rollback();
            return $e->getMessage();
        }

        if($info && $result){
            Db::commit();
            $this->s_msg('转让成功',$info);
        }else{
            $this->e_msg('转让失败');
        }
    }

    /**
     * 转让记录
     * @throws \think\exception\DbException
     * @create_time: 2020/5/27 9:35:05
     * @author: wcg
     */
    public function transferList(){
        $us_id = $this->user['id'];
        $result = Db::name('transfer')->where("(from_uid = $us_id and id=1) or to_uid = $us_id")->paginate(10);
        $this->s_msg('null',$result);
    }
    public function bandAddr()
    {
        $or_id = decrypt(input('post.or_id'));
        $addr_id = input('post.addr_id');
        if (!input('post.or_id') && !$addr_id) {
            $this->e_msg('参数错误');
        }
        $info = model('order')->where('id', $or_id)->find();
        if (!$info) {
            $this->e_msg('无法找到订单');
        }
        $data['addr_id'] = $addr_id;
        $rel = model('order')->where('id', $or_id)->update($data);
        $this->s_msg(null, 1);
    }

    public function orderDetail()
    {
        $or_id = input('post.or_id');
        if (!$or_id) {
            $this->e_msg('无法获取订单');
        }
        $Order = new OrderLogic;
        $list = $Order->getOneOrder($or_id);
        foreach ($list as $k => $v) {
            $list[$k]['pd_head_pic'] = model('Product')->where('id', $v['pd_id'])->value('pd_head_pic');
        }
        $totals = $this->orderTotalById($or_id);

        $the_order = model('Order')->find($or_id);
        $the_order['list'] = $list;
        $addr = model('UserAddr')->where('id', $the_order['addr_id'])->find();
        $the_order['take_addr'] = $addr['province'] . $addr['city'] . $addr['area'] . $addr['addr_detail'];
        $the_order['take_name'] = $addr['addr_receiver'];
        $the_order['take_tel'] = $addr['addr_tel'];
        $the_order['all_money'] = $totals[0];
        $the_order['take_fee'] = $totals[1];
        $the_order['discount'] = 0;    //优惠金额
        $this->s_msg(null, $the_order);
    }

}

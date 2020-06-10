<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/16
 * Time: 17:19
 */

namespace app\index\controller;

use app\common\logic\ToolsLogic;
use think\Db;

/**
 * 道具商城类
 * @package app\index\controller
 * @create_time 2020/4/16 17:20:20
 * @Author wcg
 */
class Tools extends Basis
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 道具商城列表
     * @create_time: 2020/4/16 17:40:39
     * @Author: wcg
     */
    public function index()
    {
        $tools = new ToolsLogic;
        if (input('keywords')) {
            $this->map[] = ['name', 'like', '%' . input('keywords') . '%'];
        }
        $list = $tools->getList($this->map, $this->order, $this->size);
        if ($list->isEmpty()) {
            return $this->e_msg('暂无道具列表');
        }
        return $this->s_msg(null, $list);
    }

    /**
     * 购买道具处理
     * @create_time: 2020/4/16 17:40:39
     * @Author: wcg
     */
    public function buy()
    {
        $tools_id = input('tools_id');
        $user_id = $this->user['id'];
        $num = input('number');
        if (!$num) {
            return $this->e_msg('请选择数量');
        }
        $price = Db::name('tools')->where('id', $tools_id)->value('price') * $num;
        $data = [
            'tools_id' => $tools_id,
            'user_id' => $user_id,
            'number' => $num,
            'price' => $price,
        ];

        $money = Db::name('money')->where('user_id', $user_id)->where('coin_id',2)->find();
        if ($price > $money['money']) {
            return $this->e_msg('您的余额不足，请充值后购买');
        }
        $tools = new ToolsLogic;
        $result = $tools->buy($data);
        return json($result);
    }

    /**
     * 添加道具
     * @return \think\response\Json
     * @create_time: 2020/5/28 17:56:23
     * @author: wcg
     */
    public function add()
    {
        if($this->user['us_type'] != 3 && $this->user['us_type'] != 4){
            $this->e_msg('你没有权限访问',403);
        }
        $data = input('post.');
        $path = base64_upload($data['url']);

        $data['picture'] = $path;
        $tools = new ToolsLogic;
        $res = $tools->saveTools($data);
        return json($res);
    }

    /**
     * 编辑道具
     * @create_time: 2020/5/28 17:56:36
     * @author: wcg
     */
    public function edit()
    {
        $data = input('post.');
        $path = base64_upload($data['url']);

        $data['picture'] = $path;
        $tools = model('Tools')->where('id',$data['tools_id'])->update($data);
        if($tools>0){
            return $this->s_msg(null,'更新成功');
        }else{
            return $this->e_msg('更新失败');
        }
    }

    /**
     * 道具背包
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:46:12
     * @author: wcg
     */
    public function backPack()
    {
        //获取升级还是降级
        $user_id = $this->user['id'];
        $result = Db::name('backpack')->alias('a')->join('tools b', 'b.id=a.tools_id')->where('a.user_id', $user_id)->paginate(10);
        /*if ($tools_name == 'up') {
            $result = Db::name('backpack')->alias('a')->join('tools b', 'b.id=a.tools_id')->where('a.user_id', $user_id)->where('b.category', 1)->paginate();
        } elseif ($tools_name == 'down') {
            $result = Db::name('backpack')->alias('a')->join('tools b', 'b.id=a.tools_id')->where('a.user_id', $user_id)->where('b.category', 2)->paginate();
        }*/
        if($result->isEmpty()){
            $this->s_msg('暂无道具');
        }
        $this->s_msg('null',$result);
    }

    /**
     * 使用道具卡
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:46:22
     * @author: wcg
     */
    public function consume()
    {
        $tools_id = input('tools_id'); //得到道具id
        $product_id = input('product_id'); //得到商品(服务)id
        $user_id = $this->user['id'];
        $product = Db::name('product')->where('id', $product_id)->find();
        $tools = Db::name('tools')->where('id', $tools_id)->find();
        $number = Db::name('backpack')->where('user_id', $user_id)->where('tools_id', $tools_id)->value('number');
        if ($number < 1) {
            return $this->e_msg('暂无此道具');
        }
        Db::startTrans();
        try {
            Db::name('backpack')->where('user_id', $user_id)->where('tools_id', $tools_id)->setDec('number');
            if ($tools['category'] == 1) {
                Db::name('product')->where('id', $product_id)->setInc('bidding_times', $tools['ability']);
            } elseif ($tools['category'] == 2) {
                if ($product['bidding_times'] < 2) {
                    exception('您的商品基数不能再降了');
                }
                if ($product['bidding_times'] > $tools['ability']) {
                    Db::name('product')->where('id', $product_id)->setDec('bidding_times', $tools['ability']);
                } else {
                    Db::name('product')->where('id', $product_id)->setField('bidding_times', 1);
                }
            }
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            return $this->e_msg($e->getMessage());
        }
        return $this->s_msg(null, '使用成功');
    }
}
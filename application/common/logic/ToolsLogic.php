<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/16
 * Time: 14:40
 */

namespace app\common\logic;

use app\common\model\Tools;
use function GuzzleHttp\Promise\each_limit;
use think\Db;

class ToolsLogic
{
    /**
     * 道具商城列表
     * @param $map
     * @param $order
     * @param $size
     * @return null|\think\Paginator
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:46:45
     * @author: wcg
     */
    public function getList($map, $order, $size)
    {
        if (!$map)
            $map = '1 = 1';
        $tools = new Tools;
        $list = $tools->where($map)->order($order)->paginate($size, false, ['query' => request()->param()]);
        foreach ($list as $key => $v) {
            $v['picture'] = explode(',', $v['picture'])[0];
        }
        return $list;
    }

    /**
     * 发布道具
     * @param $data
     * @return array
     * @create_time: 2020/5/8 15:46:57
     * @author: wcg
     */
    public function saveTools($data)
    {
        $rel = array();
        $validate = validate('Verify');
        $data['picture'] = str_replace("\\", "/", $data['picture']);
        $rst = $validate->scene('addTools')->check($data);
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        $data['add_time'] = date('Y-m-d H:i:s');

        $rell = model('Tools')->addInfo($data);
        if ($rell) {
            $rel['code'] = 1;
            $rel['msg'] = '发布成功！';
        } else {
            $rel['code'] = 0;
            $rel['msg'] = '发布失败！';
        }
        return $rel;
    }

    /**
     * 购买道具
     * @param $data
     * @return array
     * @create_time: 2020/5/8 15:47:39
     * @author: wcg
     */
    public function buy($data)
    {
        Db::startTrans();
        try {
            Db::name('money')->where('user_id', $data['user_id'])->where('coin_id',2)->setDec('money', $data['price']);
            $data['add_time'] = date('Y-m-d H:i:s');
            Db::name('tools_order')->strict(false)->insert($data);
            Db::name('wallet')->data(['us_id'=>$data['user_id'],'wa_num'=>$data['price'],'wa_type'=>2,'wa_note'=>'购买道具','add_time'=>date('Y-m-d H:i:s')])->insert();
            $back = Db::name('backpack')->where('user_id', $data['user_id'])->where('tools_id', $data['tools_id'])->find();
            if (empty($back)) {
                Db::name('backpack')->strict(false)->insert($data);
            } else {
                Db::name('backpack')->where('user_id', $data['user_id'])->where('tools_id', $data['tools_id'])->setInc('number', $data['number']);
            }
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            return ['code' => 405, 'msg' => $e->getMessage()];
        }
        return ['code' => 200, 'msg' => '购买成功'];
    }

    /**
     * 使用道具卡
     * @param $data
     * @param $tag `up`代表使用升级卡    `down`代表使用降级卡
     * @return string
     * @create_time: 2020/5/8 15:47:58
     * @author: wcg
     */
    public function consume($data, $tag)
    {
        Db::startTrans();

        try {
            Db::name('backpack')->where('user_id', $data['user_id'])->where('tools_id', $data['tools_id'])->setDec('number', 1);
            if ($tag == 'up') {
                Db::name('product')->where('id', $data['id'])->setInc('bidding_times',$data['ability']);
            }elseif($tag == 'down'){
                Db::name('product')->where('id', $data['id'])->setDec('bidding_times',$data['ability']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return '使用成功';
    }
}
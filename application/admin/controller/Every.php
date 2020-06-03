<?php

namespace app\admin\controller;

use Cache;
use think\Container;

/**
 * 公共控制器
 */
class Every extends Common
{

    public function __construct()
    {
        parent::__construct();
    }

    //所有删除
    public function allDel($data)
    {
        if ($data['id']) {
            $id = $data['id'];
        } else {
            $this->error('id不存在');
        }
        if ($data['key']) {
            $key = $data['key'];
        } else {
            $this->error('数据表不存在');
        }
        /*$array = array(
            'Admin', 'Carouse', 'Center', 'Code', 'Message', 'Msc', 'Order', 'Product', 'Wallet', 'Purchase', 'Sell', 'Tixian', 'Transfer', 'Cate', 'User',
        );
        if (!in_array($key, $array)) {
            $this->error('非法操作');
        }*/
        $info = model($key)->get($id);
        if ($info) {
            $rel = model($key)->destroy($id);
            if ($rel) {
                $this->success('删除成功');
            } else {
                $this->error('请联系网站管理员');
            }
        } else {
            $this->error('数据不存在');
        }
    }

    //清楚缓存
    public function clear()
    {
        Cache::clear();
    }

    /**
     * @param $data array ： style 操作类型：1查询 2 增加 3 更新  4 删除（必传）
     *                       note  记录信息（必传）
     *                       action_url  操作url （必传）
     *                       user_id  被操作会员id （选传）
     * @return id:成功之后记录的id
     * @author sunpf
     * @date 2020/4/10 15:03
     */
    public function logger($data)
    {
        $admininfo = session('admin');
        $data['role_id'] = $admininfo['id'];
        $data['role_name'] = $admininfo['ad_name'];
        $data['add_time'] = date("Y-m-d H:i:s");
        $res = model('log')->add($data);
        return $res;
    }
}

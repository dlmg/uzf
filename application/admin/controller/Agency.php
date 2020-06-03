<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月15日 18:36:26
 * 
 */

namespace app\admin\controller;

use think\Db;
use think\Container;
use think\Controller;
use app\common\logic\UserLogic;

class Agency extends Common
{
    public function index()
    {
        //商户申请列表
        $user = new UserLogic;
        if (is_post()) {
            $rst = model('User')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
        if (input('get.keywords')) {
            $this->map[] = ['us_tel|us_account|us_nickname', '=', input('get.keywords')];
        }
        if (is_numeric(input('get.us_status'))) {
            $this->map[] = ['us_status', '=', input('get.us_status')];
        }
        if (is_numeric(input('get.gave_status'))) {
            $this->map[] = ['gave_status', '=', input('get.gave_status')];
        }
        $this->map[] = ['us_delete_status', '=', 1];
        $this->map[] = ['merchant_status', '=', 1];
        $list = $user->getList($this->map, $this->order, $this->size);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();
    }
    //所有抢购列表
    //fkl
    //2018年7月12日 17:22:44
    public function index__()
    {
        if (input('get.keywords')) {
            $this->map[] = ['us_tel|us_account|us_nickname', '=', input('get.keywords')];
        }
        if (input('get.status')) {
            $this->map[] = ['status', '=', input('get.status')];
        }
        $list = model('agency')->getList($this->map, $this->order, $this->size);       

        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    } 
    public function change(){
        if (is_post()) {
            $rst = model('User')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '审批成功',
                    'data' => $rst,
                ];
            } 
        }
    } 
    public function change__(){
        if (is_post()) {
            $rst = model('Agency')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
    }  
}
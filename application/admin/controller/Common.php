<?php
namespace app\admin\controller;

use app\common\controller\Base;

/**
 * 基类
 */
class Common extends Base
{

    public function __construct()
    {
        parent::__construct();

        if ($this->is_login()) {
            $this->redirect('login/logout');
        }
        //$this->system();
        $this->auth();
    }
    public function is_login()
    {
        if (!session('admin')) {
            return true;
        }
        if (!session('admin')['id']) {
            return true;
        }
        if (session('admin')['id'] <= 0) {
            return true;
        }
        return false;
    }
    private function system()
    {
        if (cache('setting')['status'] == 0) {
            $this->error('网站维护中');
        }
    }
    public function auth()
    {
        $meth_name = strtoupper(explode(".", $this->request->pathinfo())[0]);
        //$meth_type = strtoupper($this->request->method());
//        var_dump($meth_name);exit();
        $result = $this->check($meth_name);
        if ($result) {
            $this->error('您没有该权限','index/welcome');
        }
    }
    /**
     * 权限验证
     * @param  字符串 $name 方法名
     * @param  字符串 $meth 请求方式
     * @return bool       bool值
     */
    public function check($name)
    {
        //dump($name);
        $info = db('rule')
            ->where('name', $name)
            ->find();
        if (!$info) {
            return false;
        }
        $rules = explode(',',session('rules'));
        if (in_array($info['id'], $rules)) {
            return false;
        }
        return true;
    }

}

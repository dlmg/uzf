<?php
namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    // ------------------------------------------------------------------------
    public function index()
    {
        if (request()->isPost()) {
            $data = input('post.');
            // if (!captcha_check($datas['verify'])) {
            //     $this->error('验证码错误');
            // };
            if (model('Admin')->where('ad_tel', $data['ad_tel'])->count()) {
                $info = model('Admin')->where(array("ad_tel" => $data["ad_tel"], 'ad_pwd' => md5($data['ad_pwd'])))->find();
                // $info = model('Admin')->where(array("ad_tel" => $data["ad_tel"]))->find();
                if (empty($info['id'])) {
                    $this->error('密码错误');
                } else {
                    if ($info['status'] == 0) {
                        //是否禁用权限
                        $this->error('账号被禁用!');
                    }
                    unset($info['ad_pwd']);
                    $rules = db('role')->where('id', $info['ro_id'])->value('ro_rules');
                    session('admin', $info);
                    session('rules', $rules);
                    $this->success('登录成功', 'index/index');
                }
            } else {
                return $this->error('查无此人');
            }
        } else {
            return $this->fetch('login');
        }
    }
    // ------------------------------------------------------------------------
    public function logout()
    {
        session('admin', null);
        session('rules', null);
        $this->redirect('login/index');
    }

}

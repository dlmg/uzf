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

class QRcode extends Common
{
    public function index(){
        return $this->fetch();
    }
    //生成二维码
    public function code(){
        $param = input('get.');
        $first = (int)($param['first']);
        $last = (int)($param['last']);
        for($i = $first; $i <= $last; $i++){
            $ii = encrypt($i);
            //$data[$i - $first]['value'] = "http://slmy.jugekeji.cn/register?qrcode=".$ii;
            //$data[$i - $first]['code'] = $i;
            $data[$i - $first] = "http://slmy.jugekeji.cn/register?qrcode=".$ii;
        }
        //halt($data);
        $lists = json_encode($data);
        $this->assign('list',$lists);
        return $this->fetch();
    }
    //二维码绑定页面
    //fkl
    //2018年7月10日 11:20:41
    public function bind(){
        $users = model('User')->where('us_line_right',1)->select();
        $cates = model('Cate')->select();
        $this->assign('cates',$cates);
        $this->assign('users',$users);
        return $this->fetch();
    }
    //二维码绑定操作
    //fkl
    //2018年7月10日 11:20:56
    public function doBind(){
        $param = input('post.');
        $validate = validate('Verify');
        $rstt = $validate->scene('bind')->check($param);
        if (!$rstt) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        $us_id = $param['us_id'];
        $ca_id = $param['ca_id'];
        $cates = model('User')->where('id',$us_id)->value('ca_list');
        $str_rel = strpos($cates, $ca_id);
        if($str_rel === false){
            return [
                'code' => 0,
                'msg' => '该代理商没有该分类代理权'
            ];
        }
        $first = $param['first'];
        $last = $param['last'];
        $qr_data['us_id'] = $us_id;
        $qr_data['ca_id'] = $ca_id;
        $qr_data['status'] = 1;
        $qr_model = model('Qrcode');
        for($i = $first; $i <= $last; $i++){
            $qr_data['code'] = $i;
            $code_exit = $qr_model->getOne($i);
            if($code_exit){
                return [
                'code' => 0,
                'msg' => '二维码不能被再次激活'
            ];
            }
            $qr_model->addInfo($qr_data);
        }
        return [
                'code' => 1,
                'msg' => '绑定激活成功'
            ];
    }
    public function test(){
        $list = model('User')->select();
        foreach ($list as $key => $value) {
            $lists[$key]['key'] = $value['id'];
            if($value['us_pid']){
                $lists[$key]['parent'] = $value['us_pid'];
            }                   
            $lists[$key]['name'] = $value['us_nickname'];   
        }
        $lists = json_encode($lists);
        //halt($lists);
        $this->assign('list',$lists);
        return $this->fetch();

    }
    //二维码绑定的列表
    //fkl
    //2018年7月17日 15:26:48
    public function list()
    {
        $qr_model = model('Qrcode');
        if (input('get.code')) {
            $this->map[] = ['code', '=', input('get.code')];
        }
        if (is_numeric(input('get.status'))) {
            $this->map[] = ['status', '=', input('get.status')];
        }
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['or_add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['or_add_time', '=<', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['or_add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        //halt(input('get.'));
        $field = 'a.* , b.us_name , c.ca_name';
        $list = $qr_model->getList($this->map, $this->order, $this->size ,$field);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();
    }
    
}
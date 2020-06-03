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
        $code = model('Qrcode')->getMax();
        $this->assign('code',$code);
        return $this->fetch();
    }
    //生成二维码
    public function code(){
        $param = input('get.');
        $first = $param['first'];
        $ii = encrypt($first);
        //$list = "http://www.slmy10000.com/register?qrcode=".$ii;
        $list = "https://dfsl.jugekeji.com/register?qrcode=".$ii;
        //二维码记录
        $qr_model = model('Qrcode');
        $qr_data['code'] = $first;
        $code_exit = $qr_model->getOne($qr_data['code']);
        if($code_exit){
            echo "<script>alert('该二维码不能被再次生成');</script>";
            //echo "<font color ='red'>该二维码不能被再次生成</font>";
            exit();
        }

        $qr_data['add_time'] = date('Y-m-d H:i:s');
        $qr_model->addInfo($qr_data);

        $this->assign('list',$list);
        $this->assign('number',$first);
        return $this->fetch();
    }
    //生成二维码
    public function code1(){
        $param = input('get.');
        $first = substr($param['first'],6);
        $last = substr($param['last'],6);
        $front = substr($param['first'],0,6);
        $qr_model = model('Qrcode');
        for($i = $first; $i <= $last; $i++){
            $ii = encrypt($front.$i);                           
            $data[$i - $first] = "http://www.slmy10000.com/register?qrcode=".$ii;
            $numbers[$i - $first] = $front.$i;
            $qr_data['code'] = $front.$i;
            $code_exit = $qr_model->getOne($qr_data['code']);  
            /*if($code_exit){
                echo "<script>alert('该二维码不能被再次生成');</script>";
                //echo "<font color ='red'>该二维码不能被再次生成</font>";
                exit();
            }*/ 
            $qr_data['add_time'] = date('Y-m-d H:i:s');
            $qr_model->addInfo($qr_data);       
        }
        $lists = json_encode($data);
        $number = json_encode($numbers);
        $this->assign('list',$lists);
        $this->assign('number',$number);
        return $this->fetch();
    }
    //二维码绑定页面
    //fkl
    //2018年7月10日 11:20:41
    public function bind(){
        $users = model('User')->where('us_line_right',1)->where('gave_msg',1)->select();
        $cates = model('Cate')->select();
        $code = model('Qrcode')->getMax();
        $this->assign('code',$code);
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
        if($param['ptel']){
            $p_where[] = ['us_name|us_nickname', '=', $param['ptel']];
            $pinfo = model("User")->where($p_where)->select();
            //dump($pinfo);
            $p_num = count($pinfo);
            //halt($p_num);
            if ($p_num == 1){
                $us_id = $pinfo[0]['id'];
            }else{
                $rel['code'] = 0;
                $rel['msg'] = '您填写的代理商无法识别或不存在';
                return $rel;
            }
        }elseif($param['us_id']){
            $us_id = $param['us_id'];
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '请选择或填写代理商';
            return $rel;
        }      
        $ca_id = $param['ca_id'];
        $cates = model('User')->where('id',$us_id)->value('ca_list');
        $str_rel = strpos($cates, $ca_id);
        if($str_rel === false){
            return [
                'code' => 0,
                'msg' => '该代理商没有该分类代理权'
            ];
        }

        $first = substr($param['first'],6);
        $last = substr($param['last'],6);
        $front = substr($param['first'],0,6);
        $qr_data['us_id'] = $us_id;
        $qr_data['ca_id'] = $ca_id;
        $qr_data['status'] = 1;
        $qr_model = model('Qrcode');
        for($i = $first; $i <= $last; $i++){
            $qr_data['code'] = $front.$i;
            $code_exit = $qr_model->getOneDetail($qr_data['code']);
            if(!$code_exit){
                return [
                'code' => 0,
                'msg' => '所选二维码列表中存在未知二维码，请检查后重新提交'
            ];
            }
            if($code_exit['status'] == 3){
                return [
                'code' => 0,
                'msg' => '所选二维码列表中存在已被注册二维码，请检查后重新提交'
            ];
            }
            if($code_exit['status'] == 1 && $param['rebind'] != 1){
                return [
                'code' => 0,
                'msg' => '所选二维码列表中存在已被激活二维码，请检查后重新提交'
            ];
            }
            $qr_data['bind_time'] = date('Y-m-d H:i:s');
            $qr_model->where('code',$qr_data['code'])->update($qr_data);
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
            //$this->map[] = ['code', '=', input('get.code')];
            $this->map[] = ['code|b.us_name|b.us_nickname', 'like','%'. input('get.code').'%'];
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
        $field = 'a.* , b.us_name , b.us_nickname , c.ca_name';
        //$list = $qr_model->paginate();
        $this->map[] = ['code','neq',''];
        // echo '<pre>';
        // print_r($this->map);
        // echo '</pre>';
        $list = $qr_model->getList($this->map, $this->order, $this->size ,$field);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        // echo '<pre>';
        // print_r($list);
        // echo '</pre>';
        return $this->fetch();
    }
    //二维码绑定操作
    //fkl
    //2018年7月10日 11:20:56
    public function doClear(){
        $param = input('post.');
        halt($param);
        $first = substr($param['first'],6);
        $last = substr($param['last'],6);
        $front = substr($param['first'],0,6);
        $qr_model = model('Qrcode');
        for($i = $first; $i <= $last; $i++){
            $qr_data['code'] = $front.$i;
            $qr_model->where('code',$qr_data['code'])->delete();
        }
        return [
                'code' => 1,
                'msg' => '删除成功'
            ];
    }
    
}
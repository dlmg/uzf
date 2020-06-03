<?php
/**
 * Created by spf
 * User: Administrator
 * Date: 2019年5月15日 18:36:26
 * 
 */

namespace app\admin\controller;

use app\common\logic\UserLogic;
use app\common\model\User as UserModel;
use http\QueryString;
use think\Db;
use think\Container;
use PHPExcel;
use PHPExcel_IOFactory;

class User extends Common
{
    /**
     * 用户列表
     * author spf
     * time 2019年5月16日 10:56:09
     * @return mixed
     */
    public function index()
    {
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
            $this->map[] = ['us_tel|us_account|us_nickname', 'like', '%'.input('get.keywords').'%'];
        }
        if (is_numeric(input('get.us_status'))) {
            $this->map[] = ['us_status', '=', input('get.us_status')];
        }
        if (is_numeric(input('get.gave_status'))) {
            $this->map[] = ['gave_status', '=', input('get.gave_status')];
        }
        $this->map[] = ['us_delete_status', '=', 1];
        $list = $user->getList($this->map, $this->order, $this->size);
//        halt($list);
//        halt($_SERVER);
//        $admininfo = session('rules');
//        halt($_SESSION);
//        halt($admininfo);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    }
    //用户界面上的状态修改
    //2019年6月11日 16:47:54
    //spf
    public function change(){
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
    }
    //审批消费商成为代理商
    //2019年6月26日 18:19:33
    //spf
    public function approve(){
        if(is_post()){
            $Umodel = model('User');
            $map['id'] = input('post.id');
            $the_us = $Umodel->where($map)->find(); 
            $ca_id = $the_us['ca_id'];
            //如果不是代理商，则审批成为代理商，如果已是代理商，则代理商等级不变
            if($the_us['gave_status'] < 2){
                $data['gave_status'] = 2;
                $data['us_vip_time'] = date('Y-m-d H:i:s');
            }
            //查询所有的代理商，超过一万，则没有权限获取二维码            
            $Ucount = $Umodel->getVipCount();
            if($Ucount >= 10000){
                $data['us_line_right'] = 2;
            }else{
                $data['us_line_right'] = 1;
            }
            //审批之后清空ca_id,方便下次使用，所有的分类id存在ca_list里面
            $data['gave_msg'] = 1;
            $data['ca_id'] = '';
            $data['ca_list'] = $the_us['ca_list'].','.$the_us['ca_id'];
            $rel = $Umodel->updateInfo($map , $data);
        }
        if($rel){
            $userlogic = new UserLogic;
            if($data['us_line_right'] != 2){
                //创建vip公排图
                //2019年7月17日 17:21:53，确定没有代理商公排
                /*$line_rel = $userlogic->createVipFirstPoint(input('post.id'),$ca_id);
                if(!$line_rel){
                    $msg['code'] = 2;
                    $msg['msg'] = '创建代理商公排失败';
                    return $msg;
                }*/
                //放入大类公排
                $ca_line = $userlogic->putToCateLine(input('post.id'),$ca_id,1);//代理商1
                /*if($ca_line['code'] == 2){
                    return $ca_line;
                }*/
            }
            $rst = $userlogic->levelUp(input('post.id'));
            if($rst){
                $msg['code'] = 1;
                $msg['msg'] = '审批成功';
                $msg['rst'] = $rst;
                return $msg;
            }     
        }else{
            $msg['code'] = 2;
            $msg['msg'] = '审批失败';
            return $msg;
        }
        
    }    
    /**
     * 会员申请商户列表
     * author spf
     * time 2020/4/12 14:14
     * @return mixed
     */
    public function apply()
    {
//        $user = new UserLogic;
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

        $this->order = 'start_time desc';
        $list = model('apply')->getList($this->map, $this->order, $this->size);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    }
    /**
     * 新进会员
     * author spf
     * time 2019年6月9日 14:51:48
     * @return mixed
     */
    public function register()
    {
        $user = new UserLogic;
        if (input('get.keywords')) {
            $this->map[] = ['us_tel|us_account|us_nickname', '=', input('get.keywords')];
        }
        $this->map[] = ['us_delete_status', '=', 1];
        $this->map[] = ['qrcode_ca_id', 'neq', ''];
        $list = $user->getList($this->map, $this->order, $this->size);
        foreach ($list as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
            $v['p_nickname'] = model("User")->where('id', $v['us_pid'])->value('us_nickname');
        }
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    }
    //审批消费商进入公排
    //2019年7月21日 16:20:08
    //spf
    public function approveLine(){
        if(is_post()){
            $Umodel = model('User');
            $map['id'] = input('post.id');
            $the_us = $Umodel->where($map)->find(); 
            $ca_id = $the_us['qrcode_ca_id'];
            //审批之后清空qrcode_ca_id,方便下次使用，所有的分类id存在qrcode_ca_list里面
            $data['gave_msg'] = 1;
            $data['qrcode_ca_id'] = '';
            $data['qrcode_ca_list'] = $the_us['qrcode_ca_list'].','.$the_us['qrcode_ca_id'];
            $rel = $Umodel->updateInfo($map , $data);
        }
        if($rel){
            $userlogic = new UserLogic;
            $rst = $userlogic->putToCateLine($map['id'],$ca_id,2);//消费商传2
            if($rst){
                $msg['code'] = 1;
                $msg['msg'] = '审批成功';
                $msg['rst'] = $rst;
                return $msg;
            }     
        }else{
            $msg['code'] = 2;
            $msg['msg'] = '审批失败';
            return $msg;
        }
        
    }    

    /**
     * 删除用户
     * author spf
     * time 2019年5月16日 17:19:00
     * @return mixed
     */
    public function delete()
    {
        if(empty(input('post.id')))
        {
            $this->error('id不存在');
        }
        $id = input('post.id');
        $user = new UserLogic;
        $every = new Every;
        $re = $user->deleteUser($id);

//        $user = model('User')->where('id',$id)->find();
//        $new_p['us_pid'] = $user['us_pid'];
//        $new_p['us_path'] = $user['us_path'];
//        $children = model('User')->where('us_pid',$id)->select();
//        foreach ($children as $k => $v) {
//            model('User')->where('id',$v['id'])->update($new_p);
//        }
//        $re = model('User')->where('id',$id)->delete();
//        $rel = array();
        if($re) {
            $rel['msg'] = '删除成功！';
            $loginfo['style'] = 4;
            $loginfo['table'] = 'user';
            $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
            $loginfo['user_id'] = $id;
            $loginfo['note'] = '删除会员';
            $every->logger($loginfo);
        } else {
            $rel['msg'] = '该用户已被删除！';
        }
        //var_dump($rel);exit();
        return $rel;
    }
    //dsadsa
    /**
     * 修改用户
     * author spf
     * time 2019年5月16日 18:31:58
     * @return mixed
     */
    public function edit()
    {
        
        if (is_post()) {
            $data = input('post.');
            $userlogic = new UserLogic;
            $every = new Every;
            $rel = $userlogic->edit($data);            
            if ($rel['code'] = 1) {
                $loginfo['style'] = 3;
                $loginfo['table'] = 'user';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $data['id'];
                $loginfo['note'] = '更改会员信息';
                $every->logger($loginfo);
                $this->success($rel['msg']);
            } else {
                $this->error($rel['msg']);
            }
            return $rel;
        }
        $usermodel = new UserModel;
        $info = $usermodel->getInfo(input('get.id'));
        // halt($info);
        $this->assign('info', $info);
        return $this->fetch();
    }
    /**
     * 修改用户
     * author spf
     * time 2019年5月16日 18:31:58
     * @return mixed
     */
    public function detail()
    {
        $usermodel = new UserModel;
        $info = $usermodel->getInfo(input('get.id'));
        //halt($info);
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 添加用户
     * author spf
     * time 2019年5月19日 11:43:19
     * @return mixed
     */
    public function add()
    {
        if (is_post()) {
            $userlogic = new UserLogic;
            $every = new Every;
            $rel = $userlogic->addUser(input('post.'));
            if ($rel['code'] = 1) {
                $loginfo['style'] = 2;
                $loginfo['table'] = 'user';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $rel['data'];
                $loginfo['note'] = '添加会员';
                $every->logger($loginfo);
            }
            return json($rel);           
        }

        $list = model('Cate')->select();
        $this->assign('catelist',$list);
        return $this->fetch();
    }
    /**
     * 用户充值
     * author spf
     * time 2019年5月7日 
     * @return mixed
     */
    public function addmoney()
    {
        if (is_get()) {
            $id = input('get.id');  
            $list = model('User')->field('id,us_nickname,us_tel')->where('id',$id)->select();   
        }
        if (is_post()) {
            $data = input('post.');
            $rel = model('user')->where('id',$data['id'])->setInc('us_all_get',$data['wa_num']);
            $wallet['us_id'] = $data['id'];
            $wallet['wa_type'] = 5;
            $wallet['wa_note'] = '后台充值';
            $wallet['add_time'] = date('Y-m-d H:i:s');
            $wallet['wa_num'] = $data['wa_num'];
            $rel1 = model('Wallet')->addInfo($wallet);
            return [
                'code' => $rel1,
                'msg' => '充值成功'
                ];
            //halt($wallet);
        }
        
        $this->assign('list',$list[0]);
        return $this->fetch();
    }
    /**
     * 地址列表
     * author spf
     * time 2019年5月19日 16:51:37
     * @return mixed
     */
    public function addr()
    {
        if (is_post()) {
            $rst = model('User_addr')->xiugai([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
            return $rst;
        }
        if (input('get.id')) {
            $this->map[] = ['us_id', '=', input('get.id')];
        } else {
            $this->error("非法操作");
        }
        $list = model('User_addr')->chaxun($this->map, $this->order, $this->size);
        $this->assign(array(
            'list' => $list,
            'name' => model('User')->where('id', input('get.id'))->value('us_account'),
        ));
        return $this->fetch();

    }

    /**
     * 代理商新增节点
     * author spf
     * time 2019年7月31日 11:53:05
     * @return mixed
     */
    public function addpoint()
    {
        if (is_post()) {
            $param = input('post.');
            if(!$param['ca_id']){
                $rel['code'] = 0;
                $rel['msg'] = '请选择分类';
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
                    if($pinfo[0]['ca_id']){
                        return [
                            'code' => 0,
                            'msg' => '上次申请正在审核，请不要重复提交',
                        ];
                    }
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
                    'msg' => '该代理商尚未拥有该分类代理权，请不要在本页面添加'
                ];
            } 
            $new_user['ca_id'] = $ca_id;
            $new_user['us_apply_time'] = date('Y-m-d H:s:i');
            $point_rel = model('User')->where('id',$us_id)->update($new_user);  
            if($point_rel){
                return [
                    'code' => 1,
                    'msg' => '操作成功'
                ];
            }else{
                return [
                    'code' => 0,
                    'msg' => '操作失败'
                ];
            }     
        }

        $users = model('User')->where('us_line_right',1)->where('gave_msg',1)->select();
        $cates = model('Cate')->select();
        $this->assign('cates',$cates);
        $this->assign('users',$users);
        return $this->fetch();
    }
    /**
     * 激活会员界面
     * @Author   spf
     * @DateTime 2019-09-17T10:55:01+0800
     * @return   [type]                   [description]
     */
    public function activate($id)
    {
        $us_level = model('User')->where('id',$id)->value('us_level');
        $this->assign('us_level',$us_level);
        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 激活会员
     * @Author   spf
     * @DateTime 2019-09-17T11:21:38+0800
     * @return   [type]                   [description]
     */
    public function doactivate()
    {
        $param = input('post.');
        $where['id'] = $param['id'];
        $this->gaveAward($param['id'],$param['us_level'],$param['us_abc'],$param['us_award_type']);
        unset($param['id']);       
        $param['activate_time'] = date('Y-m-d h:i:s');
        $rel = model('User')->where($where)->update($param);
        if($rel){
            return [
                'code' => 1,
                'msg' => '激活成功',
            ];
        }
    }
    /**
     * 三级分销奖励发放
     * @Author   spf
     * @DateTime 2019-09-20T17:22:50+0800
     * @param    [type]                   $us_id         [激活人的id]
     * @param    [type]                   $us_abc        [ABC分类]
     * @param    [type]                   $us_level      [用户等级]
     * @param    [type]                   $us_award_type [结算法]
     * @return   [type]                                  [发放奖励]
     */
    public function gaveAward($us_id,$us_level,$ca_id,$us_award_type)
    {
        if($us_level == 2){
            $allfee = 3330;
        }elseif($us_level == 4){
            $allfee = 6660;
        }elseif($us_level == 6){
            $allfee = 9990;
        }else{
            $allfee = 0;
        }       
        $u_model = model('User');
        $path = $u_model->where('id',$us_id)->value('us_path');
        $path_array = explode(',', $path);
        $path_array = array_reverse($path_array);
        //halt($path_array);
        foreach ($path_array as $k => $v) {
            $p_u_info = $u_model->where('id',$v)->find();
            if(!$p_u_info){
                $path_array[$k] = null;
            }
        }
        array_filter($path_array);
        foreach ($path_array as $k => $v) {
            if($k <= 2){
                //$k为0时，直推奖励，为1时二代奖励，为2时三代奖励
                $p_id1 = $v;
                $us_info = $u_model->where('id',$v)->find();
                $us_level1 = $us_info['us_level'];//会员星级
                //$us_award_type1 = $us_info['us_award_type'];//会员拿奖类型
                //$ca_id = $us_info['us_abc'];//会员商品分类
                $award1 = db('award')->where('us_level',$us_level1)->where('award_level',$k+1)->where('ca_level',$ca_id)->value('award');//查询出奖励
                $award1 = $award1 * $us_award_type * $allfee;
                $sb = 1 - cache('setting')['sb'];
                $rel1 = $u_model->where('id',$p_id1)->setInc('us_shop_bi',($award1*$sb));
                $rel1 = $u_model->where('id',$p_id1)->setInc('us_all_get',$award1);
                if($p_id1){
                    $wallet1['us_id'] = $p_id1;
                    $wallet1['or_id'] = 0;
                    $wallet1['wa_num'] = $award1;
                    $wallet1['get_bi'] = $award1*$sb;
                    $wallet1['wa_type'] = 3;//1是现金积分购买商品 2是打款购买商品 3推荐获得奖励
                    $wallet1['wa_note'] = ($k+1).'代奖励发放';
                    $wallet1['add_time'] = date('Y-m-d H:i:s');
                    $wa1_rel = model('Wallet')->addInfo($wallet1);
                }
                
            }
        }
    }
    /**
     * 获取推荐人姓名
     * @Author   spf
     * @DateTime 2019-09-20T10:29:12+0800
     * @return   [type]                   [description]
     */
    public function confirmP()
    {
        $ptel = input('post.ptel');
        $name = model('User')->where('us_tel',$ptel)->value('us_nickname');
        if($name){
            return [
                'code' => 1,
                'msg' =>$name,
            ];
        }else{
            return [
                'code' => 0,
                'msg' => '推荐人不存在',
            ];
        }
    }
    /**
     * 我的团队，树状图
     * @Author   spf
     * @DateTime 2019-09-26T14:29:14+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public function showMyteam($id){
        $Umodel = model('User');
        $theone = $Umodel->find($id);
//        $map[] = ['us_path','like',"%".$theone['us_path'].','.$theone['id']."%"];
//        $map[] = ['us_path','like',"%".$theone['us_path'].$theone['id'].','."%"];
        $map[] = ['','exp',Db::raw("find_in_set($id,us_path)")];
        $info = $Umodel->where($map)->select();
        $normal = $Umodel->where($map)->where('us_level',0)->count();
        $one = $Umodel->where($map)->where('us_level',2)->count();
        // $two = $Umodel->where($map)->where('us_level',4)->count();
        // $three = $Umodel->where($map)->where('us_level',6)->count();
        $lists[0]['name'] = $theone['us_nickname'];
        $lists[0]['key'] = $theone['id'];
        $lists[0]['parent'] = '';       
        foreach ($info as $k => $v) {
            $lists[0]['name'] = $theone['us_nickname'];
            $lists[0]['key'] = $theone['id'];
            $lists[0]['parent'] = '';
            $kk = $k +1;
            $lists[$kk]['key'] = $v['id'];
            $lists[$kk]['parent'] = $v['us_pid'];
            $lists[$kk]['name'] = $v['us_nickname'];
        }
        $nums = [$normal,$one];
        $lists = json_encode($lists);
        //print_r($lists);
        //halt($lists);
        $this->assign('list',$lists);
        $this->assign('nums',$nums);
        return $this->fetch();
    }
    /**
     * 会员账户明细
     * @Author   spf
     * @DateTime 2019-09-26T16:48:14+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public function myAccount($id)
    {
        $this->map = [];
        if (input('get.start') && input('get.end') == "") {
            $this->map[] = ['add_time', '>=', input('get.start')];
        }
        if (input('get.start') == "" && input('get.end')) {
            $this->map[] = ['add_time', '=<', input('get.end')];
        }
        if (input('get.start') && input('get.end')) {
            $this->map[] = ['add_time', 'between', array(input('get.start'), input('get.end'))];
        }
        $infos = model('wallet')->where('us_id',$id)->where($this->map)->paginate(10,false,$config=['query'=>request()->param()]);
        $sb = 1 - cache('setting')['sb'];
        foreach ($infos as $k => $v) {
            if(!$v['get_bi']){
                $infos[$k]['get_bi'] = number_format($v['wa_num'] * $sb , 2);
            }                
        }
        //$all_award = model('wallet')->where('us_id',$id)->where($this->map)->sum('wa_num');
        $money = model('User')->where('id',$id)->field('us_all_get,us_first_get,us_secend_get,us_share_get,us_share_bonus')->select();
        //halt($money);
        $this->assign('nums',[(string)$money[0]['us_all_get'],$money[0]['us_first_get'],$money[0]['us_secend_get'],$money[0]['us_share_get'],$money[0]['us_share_bonus']]);
        // $info['list'] = $infos;
        // $info['all'] = $this->user['us_all_get'];            
        $this->assign('list',$infos);
        return $this->fetch();
    }
    public function excel(){//导出Excel
        $xlsName  = "所有会员列表";
        $xlsCell  = array(
            array('us_account','账户名'),
            array('us_nickname','姓名'),
            array('us_tel','手机号'),
            array('us_pid','推荐人手机号'),
            // array('merchant_status','类型'),
            array('us_level','会员级别'),
            // array('us_abc','商品分类'),
            // array('us_shop_bi','现金积分'),
            // array('us_shop_quan','消费积分'),
            // array('us_award_type','结算法'),
            array('us_add_time','添加时间'),
        );
        $xlsData  = array();
        // halt($info['list']);
        $info = model('User')->field('us_account,us_nickname,us_tel,us_pid,merchant_status,us_level,us_abc,us_shop_bi,us_shop_quan,us_award_type,us_add_time')->select();
        foreach ($info as $k => $v) {
            $info[$k]['us_pid'] = model('User')->where('id',$v['us_pid'])->value('us_tel');
            // if($v['merchant_status'] == 2){
            //     $info[$k]['merchant_status'] = '商家';
            // }else{
            //     $info[$k]['merchant_status'] = '会员';
            // }
            if($v['us_level'] == 0){
                $info[$k]['us_level'] = '普通会员';
            }elseif($v['us_level'] == 2){
                $info[$k]['us_level'] = 'vip会员';
            }
            // if($v['us_abc'] == 1){
            //     $info[$k]['us_abc'] = 'A类';
            // }elseif($v['us_abc'] == 2){
            //     $info[$k]['us_abc'] = 'B类';
            // }elseif($v['us_abc'] == 3){
            //     $info[$k]['us_abc'] = 'C类';
            // }
            // if($v['us_award_type'] == 1){
            //     $info[$k]['us_award_type'] = '全额';
            // }elseif($v['us_award_type'] == 0.5){
            //     $info[$k]['us_award_type'] = '半价';
            // }elseif($v['us_award_type'] == 0){
            //     $info[$k]['us_award_type'] = '免费';
            // }
            // $xlsData[$k]['or_pd_price'] = $v['or_pd_price'];
            // $xlsData[$k]['or_pd_num'] = $v['or_pd_num'];
            // $xlsData[$k]['or_pd_content'] = $v['or_pd_content'];
            // $xlsData[$k]['pd_color'] = $v['pd_color'];
            // $xlsData[$k]['pd_spec'] = $v['pd_spec'];
        }
        // halt($xlsData);
        $this->exportExcel($xlsName,$xlsCell,$info);
    }
    function exportExcel($expTitle,$expCellName,$expTableData){
        //include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $num = $dataNum + 3;
        $objPHPExcel = new PHPExcel();//方法一
        //$objPHPExcel = new \PHPExcel();//方法二
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->mergeCells('A'.$num.':'.$cellName[$cellNum-1].$num);//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  表格生成时间:'.date('Y-m-d H:i:s'));       
        // halt($num);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, '制表人:                      ' . '会计：                      ' . '出纳：                      ' . '审核：                      ');
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        ob_end_clean();//这一步非常关键，用来清除缓冲区防止导出的excel乱码
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//"xls"参考下一条备注
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//"Excel2007"生成2007版本的xlsx，"Excel5"生成2003版本的xls
        $objWriter->save('php://output');
        exit;
    }

    //升降级
    public function rank()
    {
        $user = new UserLogic;
        $result = $user->rank();
        if ($result)
            return json(['msg' => '操作成功！']);
        else
            return json(['msg'=>'操作失败']);
    }
}
<?php
/**
 * Created by spf
 * User: Administrator
 * Date: 2019年5月16日 11:12:52
 *
 */

namespace app\common\logic;

use app\common\model\User;
use app\common\validate;
use think\Db;
use hyperjiang\BankCard;

class UserLogic
{
    /**
     * 用户列表
     * author spf
     * time 2019年5月16日 10:56:09
     * @return mixed
     */
    public function getList($map, $order, $size)
    {
        $usermodel = new User();
        $info = $usermodel->getList($map, $order, $size);
        foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
            $v['p_nickname'] = model("User")->where('id', $v['us_pid'])->value('us_nickname');
        }
        //var_dump($info);exit;
        return $info;
    }
    //完善用户信息
    //2019年6月30日 19:40:28
    //fkl
    public function complete($data)
    {
        $where['id'] = $data['id'];
        $data['us_bank_number'] = preg_replace('/[ ]/', '', $data['us_bank_number']);
        $bank_info = BankCard::info($data['us_bank_number']);
        //halt($data);
        if (empty($bank_info)) {
            $rel['code'] = 0;
            $rel['msg'] = '银行卡号非法';
            return $rel;
        }
        if ($bank_info['bankName'] != '中国工商银行' && $bank_info['bankName'] != '中国农业银行' && $bank_info['bankName'] != '中国建设银行' && $bank_info['bankName'] != '中国银行') {
            $rel['code'] = 0;
            $rel['msg'] = '银行卡号不属于四大银行';
            return $rel;
        }
        if ($data['us_bank'] != $bank_info['bankName']) {
            $rel['code'] = 0;
            $rel['msg'] = '银行卡号和银行不匹配';
            return $rel;
        }
        unset($data['id']);
        $usermodel = new User();
        $rell = $usermodel->editInfo($data, $where);
        //var_dump($rel);exit;
        if ($rell) {
            $rel['code'] = 1;
            $rel['msg'] = '修改成功！';
        } else {
            $rel['code'] = 0;
            $rel['msg'] = '您并没有作出修改！';
        }
        return $rel;


    }

    /**
     * 用户逻辑删除
     * author spf
     * time 2019年5月16日 17:37:23
     * @return mixed
     */
    public function deleteUser($id)
    {
        $map['id'] = $id;
        $data['us_delete_status'] = 0;
        $data['delete_time'] = date('Y-m-d H:i:s');
        $usermodel = new User();
        $rel = $usermodel->deleteUser($map, $data);
        //var_dump($info);exit;
        return $rel;
    }

    /**
     * 用户修改
     * author spf
     * time 2019年5月17日 09:41:03
     * @return mixed
     */
    public function edit($data)
    {
        //var_dump($data);
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('editUser')->check($data);
        //var_dump($rst);exit;
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        $data['us_head_pic'] = str_replace("\\", "/", $data['us_head_pic']);
        //验证手机号是否已存在
        $where['id'] = $data['id'];
        $tel = model("User")->where($where)->value('us_tel');
        if ($tel !== $data['us_tel']) {
            $count = model("User")->where('us_tel', $data['us_tel'])->count();
            if ($count) {
                return [
                    'code' => 0,
                    'msg' => '该手机号已存在',
                ];
            }

        }
        unset($data['id']);
        if ($data['us_pwd'] != "") {
            $data['us_pwd'] = md5($data['us_pwd']);
        } else {
            unset($data['us_pwd']);
        }

        $usermodel = new User();
        $rell = $usermodel->editInfo($data, $where);
        //var_dump($rel);exit;
        if ($rell) {
            $rel['code'] = 1;
            $rel['msg'] = '修改成功！';
        } else {
            $rel['code'] = 0;
            $rel['msg'] = '您并没有作出修改！';
        }
        return $rel;
    }

    /**
     * 用户自己修改,头像和昵称修改
     * author spf
     * time 2019年6月12日 12:54:50
     * @return mixed
     */
    public function selfedit($data)
    {
        //var_dump($data);
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('selfeditUser')->check($data);
        //var_dump($rst);exit;
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        if (empty($data['us_head_pic'])) {
            unset($data['us_head_pic']);
        }
        $data['us_head_pic'] = str_replace("\\", "/", $data['us_head_pic']);
        //验证手机号是否已存在
        $where['id'] = $data['id'];
        unset($data['id']);
        $usermodel = new User();
        $rell = $usermodel->editInfo($data, $where);
        //var_dump($rel);exit;
        if ($rell) {
            $rel['code'] = 1;
            $rel['msg'] = '修改成功！';
        } else {
            $rel['code'] = 0;
            $rel['msg'] = '您并没有作出修改！';
        }
        return $rel;
    }
    //申请成为代理商
    //2019年6月30日 11:04:31
    //spf
    public function subToVip($data)
    {
        //halt($data);
        $Umodel = model('User');
        $map['id'] = $data['id'];
        $the_us = $Umodel->where($map)->find();
        if ($the_us['ca_id']) {
            return [
                'code' => 0,
                'msg' => '上次申请正在审核，请不要重复提交',
            ];
        }
        if ($the_us['gave_status'] < 1) {
            $datas['gave_status'] = 1;
        }
        $datas['ca_id'] = $data['data']['ca_id'];
        $str_rel = strpos($the_us['ca_list'], $datas['ca_id']);
        if ($str_rel !== false) {
            //如果分类id列表包含该分类，返回
            return [
                'code' => 0,
                'msg' => '已拥有该分类的代理权，请勿再次申请'
            ];
        }
        $datas['us_addr_code'] = implode(',', $data['data']['us_addr_code']);
        $datas['us_addr_addr'] = $data['data']['province'] . $data['data']['city'] . $data['data']['area'];
        $datas['us_reason'] = $data['data']['us_reason'];
        $datas['us_apply_time'] = date('Y-m-d H:i:s');
        $rel = $Umodel->updateInfo($map, $datas);
        return [
            'code' => 1,
            'msg' => $rel,
        ];
    }

    /**
     * 用户添加
     * author spf
     * time 2019年5月19日 14:50:51
     * @return mixed
     */
    public function addUser($data)
    {
        //var_dump($data);exit();
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('register')->check($data);
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        if (array_key_exists('us_head_pic', $data) && $data['us_head_pic']) {
            $data['us_head_pic'] = str_replace("\\", "/", $data['us_head_pic']);
        } else {
            $data['us_head_pic'] = "/static/admin/img/head1.jpg";
        }


        //验证推荐人是否存在
        if ($data['ptel']) {
            $p_where[] = ['us_tel|us_account|us_nickname', '=', $data['ptel']];
            $pinfo = model("User")->where($p_where)->select();
            //dump($pinfo);
            $p_num = count($pinfo);
            //halt($p_num);
            if ($p_num == 1) {
                $data['us_pid'] = $pinfo[0]['id'];
                $data['us_path'] = $pinfo[0]['us_path'] . ',' . $pinfo[0]['id'];
//                $data['us_path'] = $pinfo[0]['us_path'].$pinfo[0]['id'].',';
            } else {
                $rel['code'] = 0;
                $rel['msg'] = '您填写的推荐人无法识别或不存在';
                return $rel;
            }
        } else {
            $data['us_pid'] = 0;
            $data['us_path'] = 0;
        }
        //验证手机号是否已存在
        $count = model("User")->where('us_tel', $data['us_tel'])->count();
        if ($count) {
            return [
                'code' => 0,
                'msg' => '该手机号已被注册',
            ];
        }
        //账号生成
        $info = model("User")->order('id desc')->field('us_account,id')->find();
        $number = $info['us_account'];
        $new_number = ++$number;
        if ($info['id'] <= 3500) {
            $data['us_level'] = 1;
        } elseif ($info['id'] > 3500 && $info['id'] <= 35000) {
            $data['us_level'] = 2;
        } elseif ($info['id'] > 35000 && $info['id'] <= 350000) {
            $data['us_level'] = 3;
        } else {
            $data['us_level'] = 4;
        }
        $data['us_account'] = $new_number;
        $data['us_add_time'] = date('Y-m-d H:i:s');
        //验证密码
        if (empty($data['us_pwd'])) {
            return [
                'code' => 0,
                'msg' => '请填写登录密码',
            ];
            // $data['us_pwd'] = '123456';
        }
        // if (empty($data['us_pw2'])) {
        //     return [
        //         'code' => 0,
        //         'msg' => '请填写二级密码',
        //     ];
        // }
        // dump($data['us_pwd']);
        $data['us_pwd'] = md5($data['us_pwd']);
        //$data['us_pw2'] = encrypt($data['us_pw2']);
        if (key_exists('us_safe_pwd', $data)) {
            $data['us_safe_pwd'] = md5($data['us_safe_pwd']);
        }

        //操作  
        unset($data['ptel']);
        //unset($data['us_pwd2']); 
        unset($data['code']);
//        halt($data);
        $rell = model('User')->addUser($data);
        if ($rell) {
            $rel['code'] = 1;
            $rel['msg'] = '添加成功！';
            $rel['data'] = $rell;
        } else {
            $rel['code'] = 0;
            $rel['msg'] = '添加失败！';
        }


        return $rel;
    }

    //获取用户角色
    public function getType($id)
    {
        $level = model('User')->where('id', $id)->value('us_type');
        return $level;
    }

    //获取所有系统服务商
    public function getProvider()
    {
        $data = model('User')->where('us_type', 3)->column('id');
        return $data;
    }

    public function rank()
    {
        $userModel = new User;
        $oneCount = $userModel->getRankCount('down', 1) * 0.1;
        $twoDownCount = $userModel->getRankCount('down', 2) * 0.1;
        $twoUpCount = $userModel->getRankCount('up', 2) * 0.01;
        $threeUpCount = $userModel->getRankCount('up', 3) * 0.01;
        if ($oneCount > 0)
            $one = $userModel->getRankId('down', 1, $oneCount);
        //查询要被降级的二级会员id
        if ($twoDownCount > 0)
            $twoDown = $userModel->getRankId('down', 2, $twoDownCount);
        //查询要升级的二级会员id
        if ($twoUpCount > 0)
            $twoUp = $userModel->getRankId('up', 2, $twoUpCount);
        //查询要升级的三级会员id
        if ($threeUpCount > 0)
            $three = $userModel->getRankId('up', 3, $threeUpCount);
        if ($oneCount > 0)
            $userModel->getRank('down', $one);
        if ($twoDownCount > 0)
            $userModel->getRank('down', $twoDown);
        if ($twoUpCount > 0)
            $userModel->getRank('up', $twoUp);
        if ($threeUpCount > 0)
            $userModel->getRank('up', $three);
        return true;
    }

    /**
     * 登录逻辑处理
     * @param $data
     * @return array|int|null|\PDOStatement|string|\think\Model
     * @create_time: 2020/5/18 9:29:37
     * @author: wcg
     */
    public function login($data)
    {
        $user = new User;
        $info = $user->detail(['us_tel' => $data['us_tel']]);
        if ($info['us_status'] == 0) {
            //账号被冻结
            return -1;
        } elseif ($info['us_status'] == 2) {
            //账号未激活
            return -2;
        }
        if(md5($data['us_pwd']) !== $info['us_pwd']){
            //密码错误
            return -3;
        }
        return $info;
    }

}
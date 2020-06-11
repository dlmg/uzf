<?php

namespace app\index\controller;

use app\common\validate\Verify;
use think\Db;

class User extends Basis
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detail()
    {
        $data = $this->user;
        $this->s_msg(null, $data);
    }

    /**
     * 修改个人资料
     * @create_time: 2020/6/8 17:09:59
     * @author: wcg
     */
    public function doedit()
    {
        $param = input('post.');
        $us_id = $this->user['id'];
        $pic = base64_upload($param['us_head_pic']);
        $rel = model('User')->where('id', $us_id)->update($param);
        if ($rel) {
            $this->s_msg(null, 1);
        }
        $this->s_msg('您没有做出修改');
    }

    public function myHead()
    {
        $data['us_head_pic'] = $this->user['us_head_pic'];
        $data['us_nickname'] = $this->user['us_nickname'];

        if ($this->user['us_level'] == 0 || $this->user['us_level'] == 1 || $this->user['us_level'] == 3) {
            $data['us_level'] = '普通会员';
        } elseif ($this->user['us_level'] == 2) {
            $data['us_level'] = 'VIP会员';
        }
        $data['merchant_status'] = $this->user['merchant_status'];
        //$data['us_apply_shopname'] = $this->user['us_apply_shopname'];
        $data['id'] = $this->user['id'];
        $this->s_msg(null, $data);
    }

    public function qrcode()
    {
        $code = $this->user['id'];
        if (!$code) {
            $this->e_msg('用户没有登录');
        }
        //$code = encrypt($id);
        $this->s_msg(null, $code);
    }

    //我的账户
    public function myAccount()
    {
        $user_id = $this->user['id'];
        $result = Db::name('money')->where('user_id', $user_id)->order('coin_id', 'asc')->select();
        $this->s_msg(null, $result);
    }

    /**
     * 商户申请
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author sunpf
     * @date 2020/4/12 14:33
     */
    public function apply()
    {
        $param = input('post.');
        $validate = validate('Verify');
        if (!$validate->scene('apply')->check($param)) {
            $this->e_msg($validate->getError());
        }
        if ($this->user['us_type'] != 1) {
            $this->e_msg('你不是会员无法申请商家');
        }
        $param['start_time'] = date('Y-m-d H:i:s');
        $param['status'] = 1;
        $map['user_id'] = $this->user['id'];
        $param['user_id'] = $this->user['id'];
        $param['us_path'] = $this->user['us_path'];
        $param['picture'] = base64_upload($param['picture']);
        $info = model('apply')->where($map)->find();
        if ($info) {
            $this->e_msg('您的申请已在审批中，请勿重复提交');
        }

        $rel = model('apply')->add($param);
        if ($rel) {
            $this->s_msg('申请成功');
        } else {
            $this->e_msg('申请失败');
        }
    }

    /**
     * 财务记录
     * @throws \think\exception\DbException
     * @create_time: 2020/5/26 16:26:01
     * @author: wcg
     */
    public function myWallet()
    {
        $type = input('wa_type');
        $data = Db::name('wallet')->where('us_id', $this->user['id'])->where('wa_type', $type)->paginate(10);
        if ($data->isEmpty()) {
            $this->e_msg('暂无记录~');
        }
        $this->s_msg('null', $data);
    }

    /**
     * 会员榜单
     * @param $level
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/26 16:42:09
     * @author: wcg
     */
    public function levelList($level = '')
    {
        if (!$level) {
            $this->e_msg('参数错误');
        }
        $data = Db::name('user')->where('us_type', 1)->where('us_level', $level)->order('us_recommend', 'desc')->order('us_add_time', 'desc')->field('us_head_pic,us_nickname,us_recommend')->select();
        if(count($data) == 0){
            $this->e_msg('暂无榜单');
        }
        $this->s_msg('null', $data);
    }


    /**
     * 我的团队
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/5/28 18:06:25
     * @author: wcg
     */
    public function myTeam()
    {
        $Umodel = model('User');
        $id = input('post.us_id') ?: $this->user['id'];
        $theone = $Umodel->find($id);
        $map[] = ['', 'exp', Db::raw("find_in_set($id,us_path)")];
        $info = $Umodel->where($map)->select();
        $lists[0]['name'] = $theone['us_nickname'];
        $lists[0]['key'] = $theone['id'];
        $lists[0]['parent'] = '';
        foreach ($info as $k => $v) {
            $lists[0]['name'] = $theone['us_nickname'];
            $lists[0]['key'] = $theone['id'];
            $lists[0]['parent'] = '';
            $kk = $k + 1;
            $lists[$kk]['key'] = $v['id'];
            $lists[$kk]['parent'] = $v['us_pid'];
            $lists[$kk]['name'] = $v['us_nickname'];
        }
        $this->s_msg(null, $lists);
    }


    /**
     * 修改密码
     * @create_time: 2020/5/18 15:49:58
     * @author: wcg
     */
    public function changePwd()
    {
        $old = input('post.old');
        $new = input('post.new');
        $con = input('post.con');//确认密码
        $data = [
            'old' => $old,
            'new' => $new,
            'con' => $con,
        ];
        $validate = new Verify;
        $info = $validate->scene('editPwd')->check($data);
        if (!$info) {
            $this->e_msg($validate->getError());
        }
        $pwd = md5($new);
        if (md5($old) != $this->user['us_pwd']) {
            $this->e_msg('原密码错误');
        }
        $rel = model('User')->where('id', $this->user['id'])->update(['us_pwd' => $pwd]);
        if ($rel) {
            $this->s_msg('密码修改成功');
        } else {
            $this->e_msg('密码并未修改');
        }
    }


    public function message()
    {
        $data = input('post.');
        $data['add_time'] = date('Y-m-d H:i:s');
        $data['us_id'] = $this->user['id'];
        $data['pic'] = base64_upload($data['pic']);
        $validate = validate('Verify');
        if (!$validate->scene('addmessage')->check($data)) {
            $this->error($validate->getError());
        }
        $rel = model('message')->addInfo($data);
        if ($rel) {
            $this->s_msg('留言成功');
        } else {
            $this->e_msg('留言失败');
        }
    }

    public function showMessage()
    {
        $data = model('message')->where('us_id', $this->user['id'])->select();
        $this->s_msg(null, $data);
    }

    /**
     * 审核列表(商户申请列表、商品审核列表)
     * @create_time: 2020/5/18 16:40:17
     * @author: wcg
     */
    public function auditList()
    {
        $tag = input('tag') ?: 'merchant';
        $us_type = $this->user['us_type'];
        $us_id = $this->user['id'];
        if ($us_type !== 3 && $us_type !== 4) {
            $this->e_msg('你没有权限访问！');
        }
        if ($tag == 'merchant') {
            unset($result);
            if ($us_type == 3) {
                $map = [['status', '=', 1], ['', 'exp', Db::raw("find_in_set($us_id,us_path)")]];
            } elseif ($us_type == 4) {
                $map = [['status', '=', 2], ['', 'exp', Db::raw("find_in_set($us_id,us_path)")]];
            }
            $result = model('Apply')->getList($map, $this->order, $this->size, 'id,merchant_name,merchant_style,start_time,picture');
            foreach ($result as $k => $v) {
                $v['merchant_style'] = $v['MerchantStyleText'];
            }
            $this->s_msg('null', $result);
        } elseif ($tag == 'product') {
            //商品
            unset($result);
            if ($us_type == 3) {
                $map = [['st_status', '=', '1'], ['', 'exp', Db::raw("find_in_set($us_id,us_path)")]];
            } elseif ($us_type == 4) {
                $map = [['st_status', '=', '2'], ['', 'exp', Db::raw("find_in_set($us_id,us_path)")]];
            }
            $result = model('Product')->where($map)->order($this->order)->field('id,pd_name,pd_price,pd_pic,ca_id')->paginate($this->size, false, $config = ['query' => request()->param()]);
            if($result->isEmpty()){
                $this->e_msg('暂无待审批');
            }
            foreach ($result as $k => $v) {
                $v['category'] = $v['Category'];
            }
            $this->s_msg('null', $result);
        }
    }

    /**
     *审核详情
     * @create_time: 2020/5/19 11:47:12
     * @author: wcg
     */
    public function applyDetail()
    {
        $tag = input('tag');
        $id = input('id');
        if ($tag == 'merchant') {
            unset($info);
            $info = model('Apply')->getInfo($id);
        } elseif ($tag == 'product') {
            unset($info);
            $info = model('Product')->getInfo($id);
        }
        if (!$info) {
            $this->e_msg('您要查看的不存在！');
        }
        $this->s_msg('null', $info);
    }

    /**
     * 驳回申请
     * @create_time: 2020/5/19 11:43:13
     * @author: wcg
     */
    public function deny()
    {
        $tag = input('tag');
        $id = input('id');
        $reason = input('reason');
        if ($tag == 'merchant') {
            unset($data);
            $data = ['status' => 4, 'reason' => $reason];
            model('Apply')->where('id', $id)->update($data);
            $this->s_msg('操作成功');
        } elseif ($tag == 'product') {
            unset($data);
            $data = ['st_status' => 4, 'reason' => $reason];
            model('Product')->where('id', $id)->update($data);
            $this->s_msg('操作成功');
        }
        $this->e_msg('传递参数错误');
    }

    /**
     * 通过申请   merchant商家申请   product服务（商品申请）
     * @create_time: 2020/5/19 11:47:41
     * @author: wcg
     */
    public function pass()
    {
        $tag = input('tag');
        $id = input('id');
        $result = Db::name('apply')->where('id',$id)->find();
        if ($tag == 'merchant') {
            $date = date('Y-m-d H:i:s');
            if($this->user['us_type'] == 3){
                model('Apply')->where('id', $id)->update(['setting_time' => $date, 'status' => $this->user['us_type'] - 1]);
            }elseif($this->user['us_type'] == 4){
                model('Apply')->where('id', $id)->update(['apply_time' => $date, 'status' => $this->user['us_type'] - 1]);
            }
            if($this->user['us_type'] == 4){
                $data = [
                    'us_apply_tel' => $result['telephone'],
                    'us_apply_addr' => $result['address'],
                    'us_vip_time' => $date,
                    'us_apply_time' => $result['start_time'],
                    'ca_id' => $result['merchant_style'],
                    'us_apply_shopname' => $result['merchant_name'],
                    'us_apply_shop_pic' => $result['picture'],
                    'merchant_status' => 2,
                    'us_type' => 2
                ];
                Db::name('user')->where('id',$result['user_id'])->update($data);
            }
            $this->s_msg('操作成功');
        } elseif ($tag == 'product') {
            model('Product')->where('id', $id)->update(['st_status' => $this->user['us_type'] - 1]);
            $this->s_msg('操作成功');
        }
        $this->e_msg('传递参数有误');
    }

    /**
     * 身份认证上传
     * @create_time: 2020/6/8 11:05:50
     * @author: wcg
     */
    public function auth()
    {
        if (request()->isPost()) {
            $list = input('post.');
            $data['us_id_card'] = $list['idCard'];
            $user_id = $this->user['id'];
            $data['us_card_front_pic'] = base64_upload($list['front']);
            $data['us_card_reverse_pic'] = base64_upload($list['reverse']);
            $data['us_handheld_pic'] = base64_upload($list['handheld']);
            $data['us_card_status'] = 1;
            $data['us_realname'] = $list['realName'];
            $validate = new Verify;
            $result = $validate->scene('auth')->check($data);
            if (!$result) {
                $this->e_msg($validate->getError());
            }

            $info = model('User')->where('id', $user_id)->update($data);
            if ($info) {
                $this->s_msg('操作成功，等待后台审核');
            } else {
                $this->e_msg('操作失败');
            }
        } else {
            $this->e_msg('请求类型错误');
        }
    }

    /**
     * 添加收款方式 支付宝/微信账号
     * @create_time: 2020/6/8 15:35:45
     * @author: wcg
     */
    public function bindAccount(){
        $user_id = $this->user['id'];
        if(request()->isGet()){
            $this->s_msg('null',$this->user['us_realname']);
        }elseif(request()->isPost()){
            $type = input('type');
            $account = input('account');
            $bankName = input('bankName');
            if($type == 'Ali'){
                $info = model('User')->where('id',$user_id)->update(['ali_account'=>$account]);
            }elseif($type == 'Wechat'){
                $info = model('User')->where('id',$user_id)->update(['we_account'=>$account]);
            }elseif($type == 'bankCard'){
                $info = model('User')->where('id',$user_id)->update(['bank_account'=>$account,'bank_branch_name'=>$bankName]);
            }
            if($info){
                $this->s_msg('添加成功');
            }else{
                $this->e_msg('添加失败');
            }
        }
    }

    /**
     * 删除收款方式
     * @create_time: 2020/6/8 15:58:49
     * @author: wcg
     */
    public function deleteAccount(){
        $type = input('type');
        $user_id = $this->user['id'];
        if($type == 'Ali'){
            $info = model('User')->where('id',$user_id)->update(['ali_account'=>'']);
        }elseif($type == 'Wechat'){
            $info = model('User')->where('id',$user_id)->update(['we_account'=>'']);
        }
        if($info){
            $this->s_msg('删除成功');
        }else{
            $this->e_msg('删除失败');
        }
    }

}


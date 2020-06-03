<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月21日 18:03:56
 * 
 */

namespace app\common\logic;

use app\common\model\Store;
use app\common\validate;
use think\Db;

class StoreLogic 
{
    /**
     * 门店列表
     * author fengkl
     * time 2018年5月21日 18:04:09
     * @return mixed
     */
    public function getList($map,$order,$size)
    {
        $storemodel = new Store();
        $field = 'a.*, b.us_tel, b.us_nickname, c.area_name';
        $info = $storemodel->getList($map,$order,$size,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }

    /**
     * 门店信息
     * author fengkl
     * time 2018年5月22日 17:22:45
     * @return mixed
     */
    public function getOne($id)
    {
        $storemodel = new Store();
        $map['a.id'] = $id;
        $field = 'a.*,b.us_tel,c.ad_tel, d.area_name as st_city, e.area_name as st_town';
        $info = $storemodel->getOne($map,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }


    /**
     * 用户添加和修改
     * author fengkl
     * time 2018年5月22日 11:43:38
     * @return mixed
     * code为1为修改
     */
    public function saveStore($data,$code = '')
    {
        $data['st_logo'] = str_replace("\\", "/", $data['st_logo']);
        //var_dump($data);exit();
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('addStore')->check($data);
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }
        //验证会员是否存在        
        $pinfo = model("User")->where('us_tel', $data['us_tel'])->find();
        if (count($pinfo)){
            if($pinfo['us_level'] == 0){
                $rel['code'] = 0;
                $rel['msg'] = '您填写的会员账号不是会员';
                return $rel;
            }
            $data['us_id'] = $pinfo['id'];
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '会员账号不存在';
            return $rel;
        }
        //验证管理员账号是否存在
        $adinfo = model("Admin")->where('ad_tel',$data['ad_tel'])->find();
        if (count($adinfo)){
            if($adinfo['ro_id'] !== 8){
                $rel['code'] = 0;
                $rel['msg'] = '您填写的登录账号不是店长';
                return $rel;
            }
            $data['ad_id'] = $adinfo['id'];
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '登录账号不存在';
            return $rel;
        }
        if($code == 1){
            //修改操作              
            $map['id'] = $data['id'];   
            $rell = model('Store')->updateInfo($map,$data);
            if($rell){
                $rel['code'] = 1;
                $rel['msg'] = '修改成功！';
            }else{
                $rel['code'] = 0;
                $rel['msg'] = '您没有作出修改！';
            }
            return $rel;
        }
        
        // 编号
        $number = model("Store")->order('id desc')->value('st_num');
        if ($number) {
            $bb = substr($number, -5);
            $cc = substr($number, 0, 2);
            $dd = $bb + 1;
            $new_number = $cc . $dd;
        } else {
            $new_number = 'md10001';
        }
        $data['st_num'] = $new_number;
        $data['add_time'] = date('Y-m-d H:i:s');
        //添加操作      
        $rell = model('Store')->addStore($data);
        if($rell){
            $rel['code'] = 1;
            $rel['msg'] = '添加成功！';
        }else{
            $rel['code'] = 0;
            $rel['msg'] = '添加失败！';
        }
        return $rel;
    }

}
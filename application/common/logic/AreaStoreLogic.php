<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月21日 09:35:30
 * 
 */

namespace app\common\logic;

use app\common\model\AreaStore;
use app\common\validate;
use think\Db;

class AreaStoreLogic 
{
    /**
     * 区域运营商列表
     * author fengkl
     * time 2018年5月21日 09:35:58
     * @return mixed
     */
    public function getList($map,$order,$size)
    {
        $areamodel = new AreaStore();
        $field = 'a.*,b.us_tel,b.us_nickname';
        $info = $areamodel->getList($map,$order,$size,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }

    /**
     * 区域运营商信息
     * author fengkl
     * time 2018年5月21日 16:32:48
     * @return mixed
     */
    public function getOne($id)
    {
        $areamodel = new AreaStore();
        $map['a.id'] = $id;
        $field = 'a.*,b.us_tel,c.ad_tel';
        $info = $areamodel->getOne($map,$field);
        /*foreach ($info as $k => $v) {
            $v['ptel'] = model("User")->where('id', $v['us_pid'])->value('us_tel');
        }*/
        //var_dump($info);exit;
        return $info;
    }


    /**
     * 用户添加和修改
     * author fengkl
     * time 2018年5月19日 14:50:51
     * @return mixed
     * code为1为修改
     */
    public function saveAreastore($data,$code = '')
    {
        //var_dump($data);exit();
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('addAreastore')->check($data);
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
            if($adinfo['ro_id'] !== 7){
                $rel['code'] = 0;
                $rel['msg'] = '您填写的登录账号不是区域运营商';
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
            $rell = model('AreaStore')->updateInfo($map,$data);
            if($rell){
                $rel['code'] = 1;
                $rel['msg'] = '修改成功！';
            }else{
                $rel['code'] = 0;
                $rel['msg'] = '您没有作出修改！';
            }
            return $rel;
        }
        
        $data['add_time'] = date('Y-m-d H:i:s');
        //添加操作      
        $rell = model('AreaStore')->addAreastore($data);
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
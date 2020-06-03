<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年6月4日 15:48:14
 * 
 */

namespace app\common\logic;

use app\common\model\UserAddr;
use app\common\validate;
use think\Db;

class AddrLogic 
{
    
    /**
     * 地址添加和修改
     * author fengkl
     * time 2018年6月4日 15:49:11
     * @return mixed
     * code为1为修改
     */
    public function saveAddr($data,$code = '')
    {
        //var_dump($data);exit();
        $validate = validate('Verify');
        $rel = array();
        $rst = $validate->scene('addAddr')->check($data);
        if (!$rst) {
            $rel['code'] = 0;
            $rel['msg'] = $validate->getError();
            return $rel;
        }       
        if($code == 1){
            //修改操作              
            $map['id'] = $data['id'];
            unset($data['id']);   
            $data['addr_code'] = implode(',', $data['addr_code']);
            $data['addr_addr'] = $data['province'].$data['city'].$data['area'];
            $rell = model('UserAddr')->updateInfo($map,$data);
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
        $data['addr_default'] = 1;
        $data['addr_addr'] = $data['province'].$data['city'].$data['area'];
        $addrmodel = model('UserAddr');
        $de_rel = $addrmodel->where('addr_default',1)->setDec('addr_default',1);
        //添加操作 
        //var_dump($data);exit();
        $data['addr_code'] = implode(',', $data['addr_code']);     
        $rell = $addrmodel->addInfo($data);
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
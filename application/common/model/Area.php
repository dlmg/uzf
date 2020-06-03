<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 购物车表
 * fkl
 * 2018年6月4日 10:47:35
 */
class Area extends Model
{

    public function getNameByid($id){
        return $this->where('area_id',$id)->value('area_name');
    }
    /**
     * 查询某人地址列表
     */
    public function getUserAddrs($id , $order = '')
    {
        /*$field = 'a.* , '
        return $this
        ->where('us_id',$id)
        ->order($order)
        ->field($field)
        ->select();*/
    }

}

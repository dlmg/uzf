<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *充值
 */
class OrderDetail extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->select();
    }
    //查询
    public function getInfo($map, $order = '', $field = "*")
    {
        return $this->where($map)->order($order)->field($field)->select();
    } 

    public function Order()
    {
        return $this->hasOne('Order', 'id', 'or_id');
    }

    /**
     * fkl
     * 2018年5月21日 14:33:11
     * 添加
     */
    public function addInfo($data) {
        return  $this->insertGetId($data);
    }

}

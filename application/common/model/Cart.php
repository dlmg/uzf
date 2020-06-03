<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 购物车表
 * fkl
 * 2018年6月4日 10:47:35
 */
class Cart extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
 
    /**
     * 查询列表
     */
    public function getList($map = [], $order = '', $field = "*")
    {
        return $this
        ->where($map)
        ->order($order)
        ->field($field)
        ->select();
    }

    /**
     * 查询一条数据
     */
    public function getOne($map = [], $order = '', $field = "*")
    {
        return $this
        ->where($map)
        ->order($order)
        ->field($field)
        ->find();
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function addInfo($data)
    {
        return $this->insertGetId($data);
        
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function saveInfo($data, $where)
    {
        return $this->save($data, $where);
    }

    public function updateInfo($data, $where)
    {
        return $this->where($where)->update($data);
    }

}

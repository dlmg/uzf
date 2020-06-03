<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class UserAddr extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';


    //查询
    public function getList($map, $order = '', $field = "*")
    {
        return $this
        ->where($map)
        ->order($order)
        ->field($field)
        ->select();
    }
    //查询
    public function getOne($map, $order = '', $field = "*")
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
        $rel = $this->insertGetId($data);
        return $rel;
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
    public function updateInfo($map,$data)
    {
        return $this->where($map)->update($data);        
    }

}

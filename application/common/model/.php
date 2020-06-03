<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 分类表
 */
class Last extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';




    //查询
    public function getlist($map = [], $order = 'ca_sort desc', $size = 10, $field = "*")
    {
        //return $this->where($map)->order($order)->field($field)->paginate($size,false,$config = ['query'=>request()->param()]);
        return $this->where($map)->order($order)->field($field)->paginate();
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
    public function edit($data, $where)
    {
        return $this->save($data, $where);
    }

}

<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 分类表
 */
class Cate extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function getStatusTextAttr($value, $data)
    {
        $array = [
            0 => '已禁用',
            1 => '使用中',
        ];
        return $array[$data['status']];
    }
    // 门店id
    public function getStIdTextAttr($value, $data)
    {
        return model('Store')->where('id', $data['st_id'])->value('real_name');
    }
    //套餐
    public function getCompoAttr($value, $data)
    {
        return model('Compo')->where('Id', $data['compo_id'])->value('name');
    }
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
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

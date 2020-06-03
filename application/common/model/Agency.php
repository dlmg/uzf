<?php
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *
 */
class Agency extends Model
{
    public function addInfo($data){
    	return $this->insert($data);
    }
    public function getUserRecord($map){
    	return $this
    			->alias('a')
    			->join('product b','a.pd_id = b.id')
    			->join('cate c', 'b.ca_id = c.id')   			
    			->field('a.*,c.ca_name,b.pd_name')
    			->where($map)
    			->select();
    }
    public function getList($map, $order, $size, $field = "*")
    {
        if(!$map)
        {
            $map='1=1';
        }
        return $this
        ->alias('a')
        ->join('product b','a.pd_id = b.id')
        ->join('cate c', 'b.ca_id = c.id')
        ->join('user d', 'd.id = a.us_id')
        ->where($map)
        ->order($order)
        ->field('a.*,c.ca_name,b.pd_name,d.us_name,d.us_nickname')
        ->paginate($size,false,$config = ['query'=>request()->param()]);
    }
    public function getStatusTextAttr($value, $data) {
        $array = [
            1 => '审批中',
            2 => '成功',
            3 => '失败',
        ];
        return $array[$data['status']];
    }
    public function editInfo($data, $where) {
        //var_dump($data);exit();
        //return $this->where($where)->update($data);
        return $this->save($data,$where);
    }
}

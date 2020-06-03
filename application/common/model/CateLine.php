<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 大分类公排
 * fkl
 * 2018年7月2日 17:31:41
 */
class CateLine extends Model
{
    //use SoftDelete;
    //protected $deleteTime = 'delete_time';
 
    public function getMaxFront($id){
        return $this->where('ca_id', '=' , $id)->where('line_num','<=',10000)->order('line_num desc')->find();
    }
    public function getMaxLast($id){
        return $this->where('ca_id', '=' , $id)->where('line_num','>',10000)->order('line_num desc')->find();
    }
    public function addInfo($data)
    {
        return $this->insertGetId($data);
        
    }
    public function getNum($x,$y,$ca_id){
        $map['x_id'] = $x;
        $map['y_id'] = $y;
        $map['ca_id'] = $ca_id;
        return $this->where($map)->value('line_num');
    }
    public function getList($map){
        return $this->where($map)->select();
    }


    public function updateInfo($data, $where)
    {
        return $this->where($where)->update($data);
    }
    public function getOneById($id){
        return $this->where('id',$id)->find();
    }
    public function getInfoByXyc($x,$y,$ca_id){
        $map['x_id'] = $x;
        $map['y_id'] = $y;
        $map['ca_id'] = $ca_id;
        return $this->where($map)->find();
    }

}

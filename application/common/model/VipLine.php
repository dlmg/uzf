<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 大分类公排
 * fkl
 * 2018年7月2日 17:31:41
 */
class VipLine extends Model
{
    //use SoftDelete;
    //protected $deleteTime = 'delete_time';
 
    public function getMax($vip_id,$ca_id){
        $where['vip_id'] = $vip_id;
        $where['ca_id'] = $ca_id;
        return $this->where($where)->order('line_num desc')->find();
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
    public function getId($x,$y,$ca_id){
        $map['x_id'] = $x;
        $map['y_id'] = $y;
        $map['ca_id'] = $ca_id;
        return $this->where($map)->value('id');
    }

    public function updateInfo($data, $where)
    {
        return $this->where($where)->update($data);
    }
    public function getOneById($id){
        return $this->where('id',$id)->find();
    }

}

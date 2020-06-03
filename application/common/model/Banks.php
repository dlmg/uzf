<?php
namespace app\common\model;

use think\Model;

/**
 *
 */
class Banks extends Model
{
	public function updateInfo($map,$data)
    {
        return $this->where($map)->update($data);        
    }
     public function addInfo($data)
    {
        $rel = $this->insertGetId($data);
        return $rel;
    }
}

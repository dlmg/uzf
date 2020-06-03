<?php
namespace app\common\model;

use think\Model;

/**
 *
 */
class Message extends Model
{
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
}

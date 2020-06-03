<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/16
 * Time: 14:40
 */

namespace app\common\model;
use think\Model;

class Tools extends Model
{
    public function addInfo($data) {
        return  $this->allowField(true)->insertGetId($data);
    }
}
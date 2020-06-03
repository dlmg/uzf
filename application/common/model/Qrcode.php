<?php
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *
 */
class Qrcode extends Model
{
    public function addInfo($data){
    	return $this->insert($data);
    }
    public function getOne($code){
    	return $this->where('code',$code)->value('id');
    }
    public function getOneDetail($code){
        return $this->where('code',$code)->find();
    }
    public function getList($map,$order,$size,$field = '*'){
    	return $this
    	->alias('a')
    	->join('user b' , 'a.us_id = b.id' , 'LEFT')
    	->join('cate c' , 'a.ca_id = c.id' , 'LEFT')
    	->field($field)
    	->where($map)
    	->paginate($size,false,$config = ['query'=>request()->param()]);
    }
    public function getStatusTextAttr($value, $data) {
		$array = [
			1 => '已激活',
			2 => '未激活',
            3 => '已注册',
		];
		return $array[$data['status']];
	}
    public function getUserRecord($map){
        return $this->where($map)->count();
    }
    public function getMax(){
        return $this->order('id desc')->find();
    }
}

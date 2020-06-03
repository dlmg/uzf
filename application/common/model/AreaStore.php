<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月21日 09:34:51
 * 
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class AreaStore extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
	/**
     * @param string $where
     * @return false|\PDOStatement|string|\think\Collection
     * fkl
     * 2018年5月16日 11:21:15
     * 查询列表
     */
    public function getList($map, $order, $size, $field = "*")
    {
        if(!$map)
        {
            $map='1=1';
        }
        //return $this->where($map)->order($order)->field($field)->paginate($size);
        return $this
            ->alias('a')
            ->join('user b','a.us_id = b.id','LEFT')
            ->field($field)
            ->where($map)
            ->paginate($size);
    }

    /**
     * fkl
     * 2018年5月21日 16:28:09
     * 关联查询一条数据
     */
    public function getOne($map,$field )
    {
        return $this
            ->alias('a')
            ->join('user b', 'a.us_id = b.id' , 'LEFT')
            ->join('admin c', 'a.ad_id = c.id', 'LEFT')
            ->field($field)
            ->where($map)
            ->find();
    }

    /**
     * fkl
     * 2018年5月16日 15:40:52
     * 获取状态
     */
    public function getAreaStatusTextAttr($value, $data) {
		$array = [
			0 => '已禁用',
			1 => '正常',
		];
		return $array[$data['area_status']];
	}

	/**
     * fkl
     * 2018年5月21日 16:07:54
     * 更新
     */
    public function updateInfo($map,$data)
    {
        return $this->where($map)->update($data);        
    }

    /**
     * fkl
     * 2018年5月17日 09:23:40
     * 根据id获取单条信息
     */
    public function getInfo($id)
    {
        return $this->get($id);        
    }


    /**
     * fkl
     * 2018年5月17日 09:57:58
     * 根据id保存
     */
    public function editInfo($data, $where) {
    	//var_dump($data);exit();
		//return $this->where($where)->update($data);
		return $this->save($data,$where);
	}

    /**
     * fkl
     * 2018年5月21日 14:33:11
     * 添加
     */
    public function addAreastore($data) {
        return  $this->insertGetId($data);
    }
}
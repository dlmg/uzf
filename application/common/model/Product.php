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

class Product extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
	/**
     * fkl
     * time 2018年5月21日 18:09:14
     * 查询列表
     */
    public function getList($map, $order, $size, $field = "*")
    {
       if(!$map)
        {
            $map='1=1';
        }
        return  $this
            ->alias('a')
            ->join('cate b','a.ca_id = b.id','LEFT')
            ->field($field)
            ->where($map)
            ->order($order)
            ->paginate($size,false,$config = ['query'=>request()->param()]);
    }
    public function getListNpg($map, $order, $size, $field = "*")
    {
        //halt($map);
        return $this
            ->alias('a')
            ->join('cate b','a.ca_id = b.id','LEFT')
            ->field($field)
            ->where($map)
            ->order($order)
            ->select();
    }

    /**
     * fkl
     * 2018年5月21日 16:28:09
     * 关联查询一条数据
     */
    public function getOne($map,$field )
    {
        //$where[] = ['pd_status','gt',1];
        return $this
            ->alias('a')
            ->join('cate b', 'a.ca_id = b.id' , 'LEFT')
            ->field($field)
            ->where($map)
            ->find();
    }

    /**
     * fkl
     * 2018年5月16日 15:40:52
     * 获取状态
     */
    public function getStatusTextAttr($value, $data) {
        $array = [
            1 => '审核中',
            2 => '系统服务商审核通过',
            3 => '审核通过',
            4 => '审核未通过',
        ];
        return $array[$data['st_status']];
    }


    /**
     * fkl
     * 2018年5月16日 15:40:52
     * 获取状态
     */
    public function getPdStatusTextAttr($value, $data) {
		$array = [
			1 => '空闲',
			2 => '预定中',
			3 => '成交',
			4 => '冷却中',
		];
		return $array[$data['pd_status']];
	}

    public function getCategoryAttr($value, $data) {
        $result = model('Cate')->getList();
        $i = 1;
        foreach($result as $k => $v){
            $array[$i] = $v['ca_name'];
            $i++;
        }

        return $array[$data['ca_id']];
    }

    public function getStNameTextAttr($value, $data)
    {
        $st_name = model('User')->where('id', $data['st_id'])->value('us_apply_shopname')?:'登封商联';
        return $st_name;
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
    public function addInfo($data) {
        return  $this->insertGetId($data);
    }
}
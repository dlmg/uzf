<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月25日 10:46:51
 * 
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Order extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $delete =  '`一往无前虎山行，拨开云雾见光明，梦里花开牡丹亭，幻想成真歌舞升平`';
	/**
     * fkl
     * time 2018年5月25日 10:47:26
     * 查询列表
     */
    public function getList($map, $order, $size, $field = "*")
    {
        return $this
            ->alias('a')
            ->join('user b','a.us_id = b.id','LEFT')
            ->field($field)
            ->where($map)
            ->order($order)
            ->paginate($size,false,$config = ['query'=>request()->param()]);
    }


    public function merList($map, $order, $size, $field = "*")
    {
        return $this
            ->alias('a')
            ->join('order_detail b','a.id = b.or_id','LEFT')
            ->field($field)
            ->where($map)
            ->order($order)
            ->paginate($size,false,$config = ['query'=>request()->param()]);
    }
    public function getListNpg($map, $order, $size, $field = "*")
    {
        return $this
            // ->fetchSql()
            ->alias('a')
            ->join('user b','a.us_id = b.id','LEFT')
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
    public function getOneDetail($map,$field )
    {
        return $this
            ->alias('a')
            ->join('order_detail b', 'a.id = b.or_id' , 'LEFT')
            ->join('user_addr c', 'a.addr_id = c.id', 'LEFT')
            ->field($field)
            ->where($map)
            ->find();
    }
    public function getOneOrder($map,$field )
    {
        return $this
            ->alias('a')
            ->join('order_detail b', 'a.id = b.or_id' , 'LEFT')
            ->join('user_addr c', 'a.addr_id = c.id', 'LEFT')
            ->field($field)
            ->where($map)
            ->select();
    }

    /**
     * fkl
     * 2018年5月16日 15:40:52
     * 获取状态
     */
    public function getStatusTextAttr($value, $data) {
		$array = [
			0 => '待支付',
			1 => '已支付',
            2 => '已完成',
		];
		return $array[$data['or_status']];
	}
    public function getPayTypeTextAttr($value, $data) {
        $array = [
            1 => '收益支付',
            2 => '微信支付',
            3 => '支付宝支付',
            4 => '线下支付',
        ];
        return $array[$data['pay_type']];
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

    /**
     * fkl
     * 2018年6月1日 17:59:41
     * id 订单id
     * 获取收货地址
     */
    public function getAddr($id) {
        $where['a.id'] = $id;
        return  $this
        ->alias('a')
        ->join('user_addr b','a.addr_id = b.id', 'LEFT')
        ->field('b.*')
        ->where($where)
        ->find();
    }
}
<?php
/**
 * Created by spf
 * User: Administrator
 * Date: 2019年5月16日 11:20:25
 * 
 */

namespace app\common\model;

use think\Model;

class User extends Model
{
	/**
     * @param string $where
     * @return false|\PDOStatement|string|\think\Collection
     * spf
     * 2019年5月16日 11:21:15
     * 查询列表
     */
    public function getList($map, $order, $size, $field = "*")
    {
        if(!$map)
        {
            $map='1=1';
        }
        return $this->where($map)->order($order)->field($field)->paginate($size,false,$config = ['query'=>request()->param()]);
        /*return $this
            ->alias('a')
            ->join('person b','a.pid = b.pid')
            ->join('person_group c','c.person_group_id = b.person_group_id')
            ->field($field)
            ->where($where)
            ->paginate($pageSize);*/
    }

    /**
     * spf
     * 2019年5月16日 15:40:52
     * 获取状态
     */
    public function getUsStatusTextAttr($value, $data) {
		$array = [
			0 => '已禁用',
			1 => '正常',
		];
		return $array[$data['us_status']];
	}

	/**
     * spf
     * 2019年5月16日 17:47:44
     * 逻辑删除
     */
    public function deleteUser($map,$data)
    {
        return $this->where($map)->update($data);        
    }

    /**
     * spf
     * 2019年5月16日 17:47:44
     * 修改
     */
    public function updateInfo($map,$data)
    {
        return $this->where($map)->update($data);        
    }

    /**
     * spf
     * 2019年5月17日 09:23:40
     * 根据id获取单条信息
     */
    public function getInfo($id)
    {
        return $this->get($id);        
    }


    /**
     * spf
     * 2019年5月17日 09:57:58
     * 根据id保存
     */
    public function editInfo($data, $where) {
    	//var_dump($data);exit();
		//return $this->where($where)->update($data);
		return $this->save($data,$where);
	}

    /**
     * spf
     * 2019年5月19日 15:23:18
     * 添加用户
     */
    public function addUser($data) {
        return  $this->insertGetId($data);
    }

    //详情
    public function detail($where, $field = "*") {
        return $this->where($where)->field($field)->find();
    }
    //获取字段值
    public function getValue($id,$key){
        return $this->where('id',$id)->value($key);
    }
    //获取总数
    public function getCount($where,$key = 'id'){
        return $this->where($where)->count($key);
    }
    public function getVipCount(){
        $where[] = ['gave_status','>',1];
        return $this->where($where)->count();
    }
    public function getUsPidTextAttr($value, $data){
        $name = model('User')->where('id',$data['us_pid'])->value('us_tel');
        return $name;
    }
    public function getUsCaNameTextAttr($value, $data){
        $name = model('Cate')->where('id',$data['ca_id'])->value('ca_name');
        return $name;
    }
    public function getApplyTypeTextAttr($value, $data) {
        $array = [
            0 => '未知的方式',
            1 => '用户申请',
            2 => '后台注册',
            3 => '后台节点新增',
        ];
        return $array[$data['apply_type']];
    }
    public function getGaveStatusTextAttr($value, $data) {
        $array = [
            0 => '会员',
            1 => '会员',
            2 => '商家',
        ];
        return $array[$data['gave_status']];
    }
    public function getUsLevelTextAttr($value, $data) {
        $array = [
            0 => '普通用户',
            1 => '申请状态',
            2 => '一星会员',
            3 => '驳回会员',
            4 => '二星会员',
            6 => '三星会员',
        ];
        return $array[$data['us_level']];
    }
    public function getMerchantStatusTextAttr($value, $data) {
        $array = [
            0 => '会员',
            1 => '会员（审批中）',
            2 => '商家',
            3 => '会员（已驳回）',
        ];
        return $array[$data['merchant_status']];
    }
    public function getUserbyTel($tel){
        return $this->where('us_tel',$tel)->find();
    }

    //获取升降级的用户个数
    public function getRankCount($tag, $us_level)
    {
        if ($tag == 'down')
            return $this->where('us_level', $us_level)->where('us_type',1)->count() * 0.1;
        else
            return $this->where('us_level', $us_level)->where('us_type',1)->count() * 0.01;
    }


    /**
     * @param $tag   up升级  down降级
     * @param $us_level   需要查询的会员等级
     * @param $limit      需要升降级的会员个数
     * @name: `getRankId`
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @create_time: 2020/4/26 9:50:38
     * @Author: MG
     */
    public function getRankId($tag,$us_level,$limit){
        if($tag == 'up'){
            return $this->where('us_level', $us_level)->where('us_type',1)->order('us_recommend', 'desc')->order('us_add_time', 'desc')->limit($limit)->field('id')->select();
        }else{
            return $this->where('us_level', $us_level)->where('us_type',1)->order('us_recommend', 'asc')->order('us_add_time', 'asc')->limit($limit)->field('id')->select();
        }
    }

    /**
     * @param $tag   升级还是降级 down是降级  up是升级
     * @param $data  需要升降级的会员id
     * @name: `getRank`
     * @throws \think\Exception
     * @create_time: 2020/4/26 9:49:43
     * @Author: MG
     */
    public function getRank($tag,$data){
        if ($tag == 'up') {
            foreach ($data as $k => $v) {
                $this->where('id', $v['id'])->setDec('us_level');
            }
        } elseif ($tag == 'down') {
            foreach ($data as $k => $v) {
                $this->where('id', $v['id'])->setInc('us_level');
            }
        }
    }
}
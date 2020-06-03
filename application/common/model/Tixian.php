<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Tixian extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map, $order, $size, $field = "*")
    {
        $list = $this
        //->alias('a')
        //->join('user b','a.us_id = b.id','LEFT')
        ->where($map)
        ->order($order)
        ->field($field)
        ->paginate($size,false,['query'=>request()->param()]);
        return $list;
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function insertInfo($data)
    {
        $rel = $this->insertGetId($data);
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function saveInfo($data, $where)
    {
        return $this->save($data, $where);
    }

    //用户账号
    public function getUsTextAttr($value, $data)
    {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_account');
        return $name;
    }
    //提现姓名
    public function getUsNicknameAttr($value, $data)
    {
        if ($data['us_id'] == "") {
            return '';
        }
        $name = model('User')->where('id', $data['us_id'])->value('us_tel');
        return $name;
    }
    //提现类型
    public function getTxTypeTextAttr($value, $data)
    {
        $array = [
            1 => '银行卡',
            2 => '微信',
            0 => '支付宝',
        ];
        return $array[$data['tx_type']];
    }
    //提现状态
    public function getTxStatusTextAttr($value, $data)
    {
        $array = [
            0 => '待审核',
            1 => '审核通过',
            2 => '已驳回',
        ];
        return $array[$data['tx_status']];
    }
}

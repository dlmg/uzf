<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *充值
 */
class Recharge extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function getStatusTextAttr($value, $data)
    {
        $array = [
            0 => '未处理',
            1 => '已通过',
            2 => '未通过',
        ];
        return $array[$data['status']];
    }
    // 充值人
    public function getAidTextAttr($value, $data)
    {
        return model('Admin')->where('Id', $data['aid'])->value('ad_name');
    }
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map = [], $order = '', $field = "*")
    {
        return $this->where($map)->order($order)->field($field)->paginate(20);
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($data)
    {
        $data['add_time'] = date('Y-m-d H:i:s');
        $rel = $this->insert($data);
        // model('Integral')->tianjia($data['aid'], $data['jine'], '店长充值', 3);
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function xiugai($data, $where)
    {
        return $this->save($data, $where);
    }

}

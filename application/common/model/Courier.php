<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Courier extends Model
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
        return $this->where($map)->order($order)->field($field)->paginate($size);
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($data)
    {
        // 编号
        $number = $this->order('id desc')->value('co_number');
        if ($number) {
            $bb = substr($number, -5);
            $cc = substr($number, 0, 3);
            $dd = $bb + 1;
            $new_number = $cc . $dd;
        } else {
            $new_number = 'psy10001';
        }
        $data['co_number'] = $new_number;
        $data['co_add_time'] = date('Y-m-d H:i:s');
        $rel = $this->insertGetId($data);
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

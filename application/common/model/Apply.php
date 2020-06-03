<?php
/**
 * @author sunpf
 * @date 2020/4/12 14:15
 */

namespace app\common\model;

use think\Model;

class Apply extends Model
{

    /**
     * @param $map
     * @param $order
     * @param $size
     * @param string $field
     * @return \think\Paginator
     * @throws \think\exception\DbException
     * @author sunpf
     * @date 2020/4/11 9:26
     */
    public function getList($map, $order, $size, $field = "*")
    {
        if(!$map)
        {
            $map='1=1';
        }
        return  $this
            ->where($map)
            ->order($order)
            ->field($field)
            ->paginate($size,false,$config = ['query'=>request()->param()]);

    }
    /**
     * @author sunpf
     * @date 2020/4/10 13:50
     */
    public function getMerchantStyleTextAttr($value, $data) {
        $array = [

            1 => '餐饮',
            2 => '娱乐',
            3 => '门票',
            4 => '休闲消费',
            5 => '其他',

        ];
        return $array[$data['merchant_style']];
    }

    /**
     * @param $value
     * @param $data
     * @return mixed
     * @author sunpf
     * @date 2020/4/13 11:20
     */
    public function getStatusTextAttr($value, $data) {
        $array = [

            1 => '审核中',
            2 => '系统服务商审核通过',
            3 => '审核通过',
            4 => '驳回',
        ];
        return $array[$data['status']];
    }
    public function getUserIdTextAttr($value, $data){
        $name = model('User')->where('id',$data['user_id'])->value('us_nickname');
        if (!$name){
            $name = '无';
        }
        return $name;
    }

    /**
     * spf
     * 2020/4/10 14:03
     * 根据id获取单条信息
     */
    public function getInfo($id)
    {
        return $this->get($id);
    }


    /**
     * spf
     * 2020/4/10 14:03
     * 添加记录
     */
    public function add($data) {
        return  $this->insertGetId($data);
    }


    //获取总数
    public function getCount($where,$key = 'id'){
        return $this->where($where)->count($key);
    }


}

<?php
/**
 * @author sunpf
 * @date 2020/4/10 13:50
 */

namespace app\common\model;

use think\Model;

class Log extends Model
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
    public function getStyleTextAttr($value, $data) {
        $array = [

            1 => '查询',
            2 => '增加',
            3 => '更新',
            4 => '删除',
        ];
        return $array[$data['style']];
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

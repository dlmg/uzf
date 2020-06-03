<?php
/**
 * @author sunpf
 * @date 2020/4/10 13:50
 */

namespace app\common\model;

use think\Model;

class Bidding extends Model
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
    public function getStatusTextAttr($value, $data) {
        $array = [

            1 => '中标',
            0 => '未中标',

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

    /**
     * 获取前一个竞价者id
     * @param $pd_id 服务id
     * @param $sales 销售次数
     * @param $times 竞拍次数
     * @return int|mixed
     * @author sunpf
     * @date 2020/4/16 9:39
     */
    public function beforeUserId($pd_id,$sales,$times){
        $map[] = ['pd_id','=',$pd_id];
        $map[] = ['sales','=',$sales];
        $map[] = ['times','=',$times - 1];
        $res = $this->where($map)->value('user_id');
        if (!$res){
            return 0;
        }else{
            return $res;
        }
    }

}

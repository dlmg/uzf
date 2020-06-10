<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/12
 * Time: 17:35
 */

namespace app\common\logic;

use app\common\model\Vote;
use think\Db;

class VoteLogic
{
    /**
     *获取投票列表
     * @param $map
     * @param $order
     * @param $size
     * @return \think\Paginator
     * @throws \think\exception\DbException
     * @create_time: 2020/5/8 15:41:34
     * @author: wcg
     */
    public function getList($map, $order, $size)
    {
        if (!$map)
            $map = '1=1';
        $vote = new Vote;
        $list = $vote->where($map)->order($order)->paginate($size, false, ['query' => request()->param()]);
        //查询发起人的user_id对应的昵称
        foreach ($list as $key => $v) {
            $v['user_name'] = model('user')->where('id', $v['user_id'])->value('us_nickname');
        }
        return $list;
    }

    public function vote($id)
    {
        $data = Vote::where('id', $id)->find();
        return $data;
    }

    //获取投票结果 已失效
    /*public function getResult($id)
    {
        $data = Db::name('vote')->where('id', $id)->find();
        $now = date('Y-m-d H:i:s', time());
        if ($now < $data['add_time'])
            //投票未开始
            return 0;
        elseif ($now > $data['end_time']) {
            if ($data['total'] >= $data['need']) {
                //投票已通过
                return 1;
            } else {
                //投票未通过
                return -1;
            }
        } else {
            //投票进行中
            return 2;
        }
    }*/

    //获取user_id对应的姓名
    public static function getName($id){
        $data = Db::name('election')->where('v_id', $id)->field('')->select();
        foreach($data as $k => $v){
            $data[$k]['nickname'] = Db::name('user')->where('id',$v['user_id'])->value('us_nickname');
        }
        return $data;
    }


}
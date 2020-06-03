<?php
/**
 * 计划任务
 * @author sunpf
 * @date 2020/4/24 10:02
 */
namespace app\index\controller;
use think\Db;
use app\common\logic\BidLogic;
class Task extends Common{
    public function __construct(){
        parent::__construct();
    }

    /**
     * 处理到期竞标（计划任务）
     * @return int|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author sunpf
     * @date 2020/4/24 15:02
     */
    public function bid()
    {
        $bid = new BidLogic;
        $map[] = ['pd_status','=',2];
        $map[] = ['maybe_end_time','<',date('Y-m-d H:i:s')];
        $array =  model('product')->where($map)->field('id,pd_sales')->select();
        foreach ($array as $key=> $value) {
            $map1[] = ['pd_id','=',$value['id']];
            $map1[] = ['sales','=',$value['pd_sales'] + 1];
            $res[] = Db::name('bidding')->where($map1)->order('id desc')->value('id');
            unset($map1);
        }
        $rel = $bid->taskBid($res);
        return $rel;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/12
 * Time: 17:21
 */

namespace app\admin\controller;

use app\common\logic\VoteLogic;
use function GuzzleHttp\Promise\each_limit;
use think\Db;
use app\common\validate\Verify;

class Vote extends Common
{
    /**
     * 投票列表
     * @create_time: 2020/4/12 17:33:09
     * @Author: MG
     */
    public function index()
    {
        $vote = new VoteLogic;
        if (input('keywords')) {
            $this->map[] = ['name', 'like', '%' . input('keywords') . '%'];
        }
        $list = $vote->getList($this->map, $this->order, $this->size);
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 发起投票
     * @return mixed|\think\response\Json
     * @create_time: 2020/4/17 13:57:46
     * @Author: MG
     */
    public function vote()
    {
        if (is_get()) {
            return $this->fetch();
        } elseif (is_post()) {
            $user_id = session('admin.id');
            $name = input('name');
            $start = input('start');
            $end = input('end');
            $type = input('type');
            if ($type == 1)
                $need = input('need');
            else
                $need = 0;
            if (!empty(input('levels')))
                $levels = implode(',', input('levels'));
            else {
                $message = [
                    'code' => 0,
                    'msg' => '参与范围必选',
                ];
                return json($message);
            }
            if ($type == 3) {
                //查询有无正在审批的商品和商家
                $apply = Db::name('apply')->where('status', 'in', '1,2')->find();
                $product = Db::name('product')->where('st_status', 1)->find();
                if (!empty($apply) || !empty($product)) {
                    $message = [
                        'code' => 0,
                        'msg' => '当前有正在审批的申请，无法发起选举',
                    ];
                    return json($message);
                }
            }
            $data = [
                'user_id' => $user_id,
                'name' => $name,
                'add_time' => $start,
                'end_time' => $end,
                'need' => $need,
                'user_levels' => $levels,
                'type' => $type,
            ];
            $validate = new Verify;
            $result = $validate->scene('vote')->check($data);
            if (!$result) {
                $message = array(
                    'code' => 0,
                    'msg' => $validate->getError(),
                );
                return json($message);
            }
            $data = Db::name('vote')->insert($data);
            if ($data) {
                $msg = array(
                    'code' => 1,
                    'msg' => '添加成功',
                );
                Site::isEnd();
                return json($msg);
            }
        }
    }
}
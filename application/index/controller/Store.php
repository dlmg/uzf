<?php

namespace app\index\controller;

use app\common\logic\ProductLogic;
use think\Db;

class Store extends Basis
{

    public function __construct()
    {
        parent::__construct();
    }

    public function label()
    {
        $label = cache('setting')['label'];
        $list = unserialize(cache('setting')['label']);
        $this->s_msg(null, $list);
    }

    public function shuffling()
    {
        $shuffling = cache('setting')['shuffling_figure'];
        $list = explode(',', $shuffling);
        $this->s_msg(null, $list);
    }

    public function index()
    {
        if (is_post()) {
            $rst = model('Store')->xiugai([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            return $rst;
        }
        if (input('get.keywords')) {
            $this->map[] = ['us_tel', 'like', '%' . input('get.keywords') . '%'];
        }
        if (is_numeric(input('get.ad_status'))) {
            $this->map[] = ['us_status', '=', input('get.us_status')];
        }
        $list = model('Store')->chaxun($this->map, $this->order, $this->size);
        $this->s_msg(null, $list);
    }


    /**
     * 商家订单
     * `all` 全部订单  `paid` 已支付  `evaluate` 待评价
     * @throws \think\exception\DbException
     * @create_time: 2020/5/21 14:43:59
     * @author: wcg
     */
    public function merOrder()
    {
        $us_id = $this->user['id'];
        $tag = input('tag');
        if ($this->user['us_type'] !== 2) {
            $this->e_msg('你还不是商家');
        }
        if ($tag == 'all') {
            $map[] = ['a.st_id', '=', $us_id];
            $result = model('Order')->merList($map, $this->order, $this->size, 'a.*,b.or_pd_name,b.or_pd_num');
        } elseif ($tag == 'paid') {
            unset($map);
            $map[] = [['a.st_id', '=', $us_id], ['a.or_status', '=', 1]];
            $result = model('Order')->merList($map, $this->order, $this->size, 'a.*,b.or_pd_name,b.or_pd_num');
        } elseif ($tag == 'evaluate') {
            unset($map);
            $map[] = [['a.st_id', '=', $us_id], ['a.or_status', '=', 2]];
            $result = model('Order')->merList($map, $this->order, $this->size, 'a.*,b.or_pd_name,b.or_pd_num');
        }
        $this->s_msg('null', $result);
    }

    /**
     * 商户入口-服务管理
     * `sell` /在售中    `audit` /审核中
     * @create_time: 2020/5/22 15:21:35
     * @author: wcg
     */
    public function pdList()
    {
        $us_id = $this->user['id'];
        $category = input('category');
        if (!$category) {
            $this->e_msg('参数错误');
        }
        if ($category == 'sell') {
            $map[] = [['st_status', '=', 3], ['st_id', '=', $us_id]];
            $product = new ProductLogic;
            $result = $product->getList($map, $this->order, $this->size);
            foreach ($result as $item) {
                $item['status'] = $item['PdStatusText'];
            }
        } elseif ($category == 'audit') {
            $map[] = [['st_status', '<>', 3], ['st_status', '<>', 4], ['st_id', '=', $us_id]];
            $product = new ProductLogic;
            $result = $product->getList($map, $this->order, $this->size);
            foreach ($result as $item) {
                $item['statusText'] = $item['StatusText'];
            }
        }
        unset($item);
        $this->s_msg('null', $result);
    }

    /**
     * 添加服务
     * @create_time: 2020/5/25 17:48:47
     * @author: wcg
     */
    public function addProduct()
    {
        $data = input('post.');
        $product = new ProductLogic;
        $path = base64_upload($data['base_64']);
        $data['st_id'] = $this->user['id'];
        $data['us_path'] = $this->user['us_path'];
        $data['pd_pic'] = $path;
        //添加的服务如果是酒店
        if($data['ca_id'] == 8){
            $result = $product->saveProduct($data);
            $data['pd_id'] = $result['data'];
            $info = model('Additional')->allowField(true)->insertGetId($data);
            if($info){
                $this->s_msg('添加成功');
            }
        }
        $result = $product->saveProduct($data);
        $this->s_msg('null', $result);
    }

    /**
     * 编辑服务
     * @create_time: 2020/5/25 17:48:38
     * @author: wcg
     */
    public function editProduct()
    {
        $product = new ProductLogic;
        if (request()->isGet()) {
            $pd_id = input('pd_id');
            $info = $product->getOne($pd_id);
            $this->s_msg('null', $info);
        }
        $data = input('post.');
        $path = base64_upload($data['base_64']);
        $data['pd_pic'] = $path;
        $result = $product->saveProduct($data, 1);
        $this->s_msg('null', $result);
    }

    /**
     * 商家所有评论列表
     * @throws \think\exception\DbException
     * @create_time: 2020/5/25 18:08:48
     * @author: wcg
     */
    public function commentList()
    {
        $user_id = $this->user['id'];
        if ($this->user['us_type'] !== 2) {
            $this->e_msg('你还不是商家');
        }
        $result = Db::name('comment')->where('st_id', $user_id)->paginate($this->size);
        if ($result->isEmpty()) {
            $this->e_msg('暂无评论');
        } else {
            $this->s_msg('null', $result);
        }
    }

    /**
     * 商家回复用户评论
     * @return string
     * @create_time: 2020/5/26 16:13:48
     * @author: wcg
     */
    public function reply()
    {
        $comment_id = input('comment_id');
        $data['back_content'] = input('back_content');
        $data['back_time'] = date('Y-m-d H:i:s');
        $data['status'] = 2;
        Db::startTrans();
        try {
            $info = Db::name('comment')->where('comment_id', $comment_id)->update($data);
        } catch (\Exception $e) {
            Db::rollback();
            return $e->getMessage();
        }
        if ($info) {
            Db::commit();
            $this->s_msg('回复成功');
        } else {
            $this->e_msg('回复失败，请稍后重试');
        }
    }
}

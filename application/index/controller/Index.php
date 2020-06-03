<?php

namespace app\index\controller;

use app\common\logic\ProductLogic;
use app\common\model\Product as ProductModel;
use think\Db;

class Index extends Basis
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function keyword()
    {
        $newest = db('search')->limit(6)->order('id desc')->select();
        $hotest = db('search')->limit(6)->order('times desc')->select();
        $list['newest'] = $newest;
        $list['hotest'] = $hotest;
        $this->s_msg(null, $list);
    }

    public function search()
    {
        $by = input('post.orderby');
        if ($by == 1) {
            $this->order = 'pd_sales desc';
        } elseif ($by == 2) {
            $this->order = 'pd_add_time desc';
        } elseif ($by == 3) {
            $this->order = 'pd_price asc';
        } elseif ($by == 4) {
            $this->order = 'pd_price desc';
        } else {
            $this->order = '';
        }
        $Product = new ProductLogic;
        if (input('post.pd_name') != "") {
            $this->map[] = ['pd_name', 'like', "%" . trim(input('post.pd_name')) . "%"];
            $keyword = $data['pd_name'] = input('post.pd_name');
            $key_info = db('search')->where('keyword', $keyword)->find();
            if ($key_info) {
                db('search')->where('keyword', $keyword)->setInc('times');
            } else {
                $add_info['keyword'] = $keyword;
                db('search')->insert($add_info);
            }
        }
        if (input('post.ca_id') != "") {
            $ca_id = input('post.ca_id');
            $ch_id = db('Cate')->where('id', $ca_id)->field('id,ca_name')->select();
            $all_id = array_column($ch_id, 'id');
            array_push($all_id, $ca_id);
            $this->map[] = ['ca_id', 'in', $all_id];
            $data['ca_name'] = $ch_id[0]['ca_name'];
        }
        $this->map[] = ['pd_status', '>', 1];
        $data = $Product->getList($this->map, $this->order, '');
        $this->s_msg(null, $data);
    }

    public function cate()
    {
        $Product = new ProductLogic;
        $cate_m = model('Cate');
        $map2[] = ['pd_status', '=', 6];
        $refers = model('Product')->where($map2)->find();

        $cates = $cate_m->where('p_id', 0)->order('ca_sort desc')->select();
        foreach ($cates as $k => $v) {
            $cates[$k]['title'] = $v['ca_name'];
            $this->map['p_id'] = $v['id'];
            $cates[$k]['child'] = $cate_m->where($this->map)->order('ca_sort desc')->select();
        }
        $list['cates'] = $cates;
        $list['refers'] = $refers;
        $this->s_msg(null, $list);
        $this->assign('ca_id', $ca_id);
        $this->assign('cates', $cates);
        $this->assign('refers', $refers);
        return $this->fetch();
    }

    public function goodsDetail()
    {
        $id = input('post.pd_id');
        $pd_logic = new ProductLogic;
        $info = $pd_logic->getOne($id);
        $skus = model('skus')->where('pd_id', '=', $id)->field('id,sku_name,sku_price')->select();
        //dump($skus);
        //$info['pd_colors'] = explode(" ", $info['pd_color']);
        //$info['pd_spec_str'] = $info['pd_spec'];
        //$info['pd_spec'] = explode(" ", $info['pd_spec']);
        $info['skus'] = $skus;
        $this->s_msg(null, $info);
    }

    public function newsList()
    {     //通告列表
        $newslist = model('Notice')->order('add_time desc')->field('id , add_time , title ,simple ')->select();
        foreach ($newslist as $key => $value) {
            $newslist[$key]['add_time'] = date('Y-m-d', strtotime($value['add_time']));
        }
        $this->s_msg(null, $newslist);
    }

    public function newsDetail()
    {    //通告详情
        $id = input('post.id');
        $detail = model('Notice')->where('id', $id)->find();
        $this->s_msg(null, $detail);
    }

    public function news()   // 文章列表
    {
        $newslist = model('News')->order('add_time desc')->field('id , add_time , title ,simple ')->select();
        foreach ($newslist as $key => $value) {
            $newslist[$key]['add_time'] = date('Y-m-d', strtotime($value['add_time']));
        }
        $this->s_msg(null, $newslist);
    }

    public function news2()   //文章详情
    {
        $id = input('post.id');
        $detail = model('Notice')->where('id', $id)->find();
        $this->s_msg(null, $detail);
    }

    public function shopList()
    {
        if (input('post.st_name')) {
            $this->map[] = ['us_apply_shopname', 'like', "%" . trim(input('post.st_name')) . "%"];
        }
        $list = model('User')->where('merchant_status', 2)->where($this->map)->field('id , us_apply_shopname , us_apply_shop_pic')->select();
        foreach ($list as $k => $v) {
            $list[$k]['us_apply_shop_pic'] = $v['us_apply_shop_pic'] ?: '/static/admin/img/head1.jpg';
        }
        $this->s_msg(null, $list);
    }

    public function shopDetail()
    {
        $shop_id = input('post.id');
        if (empty($shop_id)) {
            $this->e_msg('请选择店铺');
        } else {
            $this->map[] = ['st_id', 'eq', $shop_id];
        }
        $by = input('post.orderby');
        if ($by == 1) {
            $this->order = 'pd_sales desc';
        } elseif ($by == 2) {
            $this->order = 'pd_add_time desc';
        } elseif ($by == 3) {
            $this->order = 'pd_price asc';
        } elseif ($by == 4) {
            $this->order = 'pd_price desc';
        } else {
            $this->order = '';
        }
        $Product = new ProductLogic;
        if (input('post.ca_id') != "") {
            $ca_id = input('post.ca_id');
            $ch_id = db('Cate')->where('p_id', $ca_id)->field('id')->select();
            //halt($ch_id);
            $all_id = array_column($ch_id, 'id');
            array_push($all_id, $ca_id);
            $this->map[] = ['ca_id', 'in', $all_id];
        }
        $this->map[] = ['pd_status', '>', 1];
        $data['goods'] = $Product->getList($this->map, $this->order, '');
        $shop = model('User')->where('id', $shop_id)->field('id , us_apply_shopname')->find();
        $data['shop']['us_apply_shopname'] = $shop['us_apply_shopname'];
        $this->s_msg(null, $data);
    }

    /**
     * 测试函数
     */
    public function test()
    {
        $exp = 2;
        $moeny = pow(2, $exp);
//        echo $moeny;
        $str = 'uzf2020000999';
        $serv = base64_encode($str);
        $decrpy = base64_decode($serv);
        $str2 = ++$str;
//        echo $str2;
        echo \think\Facade\App::version();
    }

}

<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月23日 11:15:10
 * 
 */

namespace app\admin\controller;

use app\common\logic\ProductLogic;
use app\common\model\Product as ProductModel;
use think\Db;
use think\Container;

class Product extends Common
{
    /**
     * 商品列表
     * author fengkl
     * time 2018年5月23日 17:48:24
     * @return mixed
     */
    public function index()
    {
        $Product = new ProductLogic;
        if (input('get.pd_name')) {
            $this->map[] = ['pd_name', 'like', "%" . trim(input('get.pd_name')) . "%"];
        }
        $by = input('get.orderby');
        if ($by == 1) {
            $this->order = 'pd_sales desc';
        }elseif ($by == 2) {
            $this->order = 'pd_add_time desc';
        }elseif ($by == 3) {
            $this->order = 'pd_price asc';
        }elseif ($by == 4) {
            $this->order = 'pd_price desc';
        }
        if (is_numeric(input('get.pd_status'))) {
            $this->map[] = ['pd_status', '=', input('get.pd_status')];
        }
        if (is_numeric(input('get.ca_id'))) {
            $id = input('get.ca_id');
            $ch_id = db('cate')->where('p_id',$id)->field('id')->select();
            $all_id = array_column($ch_id,'id');
            array_push($all_id, $id);
            //var_dump($ch_id);
            $this->map[] = ['ca_id', 'in', $all_id];
        }

        $list = $Product->getList($this->map, $this->order, $this->size);

        $ca_list = db('cate')->where('p_id',0)->select();
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
            'ca_list' => $ca_list,
        ));
        return $this->fetch();

    }


    /**
     * 修改商品
     * author fengkl
     * time 2018年5月24日17:42:25
     * @return mixed
     */
    public function edit()
    {
        $Productlogic = new ProductLogic;
        $every = new Every;
        if (is_post()) {
            $data = input('post.');
            $rel = $Productlogic->saveProduct($data,1);            
            if ($rel['code'] = 1) {
                $loginfo['style'] = 3;
                $loginfo['table'] = 'product';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $data['pd_id'];
                $loginfo['note'] = '更新服务信息';
                $every->logger($loginfo);
                $this->success($rel['msg']);
            } else {
                $this->error($rel['msg']);
            }
            return $rel;
        }        
        $info = $Productlogic->getOne(input('get.id'));
        //$info['pd_pic'] = explode(",", $info['pd_pic']);
        //halt($info);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'info' => $info,
            'ca_list' => db('cate')->where('p_id',0)->select(),
        ));
        return $this->fetch();
    }

    /**
     * 添加商品
     * author fengkl
     * time 2018年5月24日 15:33:58
     * @return mixed
     */
    public function add()
    {
        if (is_post()) {
            //halt(input('post.'));
            $data = input('post.');
            $data['pd_now_price'] = $data['pd_price'] * 0.9;
            $Productlogic = new ProductLogic;
            $rel = $Productlogic->saveProduct($data);
            return $rel;           
        }
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'ca_list' => db('cate')->where('p_id',0)->order('ca_sort desc')->select(),
        ));
        return $this->fetch();
    }

    //上传图片
    public function upload()
    {
        //$aaaa = input('post.');
        //halt($aaaa);
        $bb = Container::get('env')->get('ROOT_PATH');
        $file = request()->file('file');
        $info = $file->validate(['size' => '4096000'])
            ->move($bb . 'public/uploads/');
        if ($info) {
            $path = '/uploads/' . $info->getsavename();
            $path = str_replace("\\", "/", $path);
            return $data = array(
                'code' => 1,
                'msg' => '上传成功',
                'data' => $path,
            );
        } else {
            return $data = array(
                'msg' => $file->getError(),
                'code' => 0,
            );
        }
    }

    //列表修改状态
    //sfp
    //2018年6月11日 17:08:23
    public function change(){
        //3 热门商品3个，4首页显示4个，5热门推荐2个 ，6热门推荐
        if (is_post()) {
            //halt(input('post.'));

            $rst = model('Product')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
    }

    //列表修改状态
    //sfp
    //2018年6月11日 17:08:23
    public function catechange(){
        if (is_post()) {
            //halt(input('post.'));
            $rst = model('Cate')->edit([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
    }
    //删除
    //2018年6月11日 17:08:23
    public function catedelete(){
        $every = new Every;
        $data = input('post.');
        $id = $data['id'];
        if($id == 1 || $id == 2 || $id == 3){
            return [
                'code' => '0',
                'msg' => 'A、B、C三大类不能被删除',
            ];
        }
        $info = model('cate')->where('p_id',$id)->select();
        if(count($info)){
            return [
                'code' => '0',
                'msg' => '该分类下有小分类，不能被删除',
            ];
        }
        //halt($data);
        $rel = $every->allDel($data);
    }

    //删除
    //sfp
    //2018年6月11日 17:08:23
    public function dodelete(){
        $every = new Every;
        $data = input('post.');
        //halt($data);
        $rel = $every->allDel($data);
    }

    //分类列表
    public function cate()
    {
        if (is_post()) {
            $rst = model('Cate')->edit([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        }
        $this->map['p_id'] = 0;
        $this->order = 'id asc';
        $list = model('Cate')->getlist($this->map, $this->order, $this->size);
        //halt($list);
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
  //分类时间段列表
    public function last()
    {
//        if (is_post()) {
//            $rst = model('Cate')->edit([input('post.key') => input('post.value')], ['id' => input('post.id')]);
//            if ($rst) {
//                $this->success('修改成功');
//            } else {
//                $this->error('修改失败');
//            }
//        }
       $ca_id = input('get.ca_id');
        $this->map['ca_id'] = $ca_id;
        $this->order = 'id asc';
        $list = model('last')->getlist($this->map, $this->order, $this->size);
        //halt($list);
        $this->assign(array(
            'list' => $list,
            'ca_id' => $ca_id,
        ));
        return $this->fetch();
    }
    //添加分类时间段
    public function last_add()
    {
        if (is_post()) {
            $Productlogic = new ProductLogic;
            $rel = $Productlogic->savelast(input('post.'));
            return $rel;
        }
        $id = input('get.ca_id');
        $where['id'] = $id;
        $ca_name = model('cate')->where($where)->value('ca_name');
//        $first_cate = model("Cate")->getList($where);
        $this->assign('ca_name', $ca_name);
        $this->assign('id', $id);
        return $this->fetch();
    }
    //选择分类 二级联动
    public function cate_select()
    {
        $caid = input('post.caid');
        if ($caid == 0 ) {
            return [];
        }
        $list = model('Cate')->where('p_id',$caid)->field('id,ca_name')->select();
        return $list;
        // return $list;
    }
    //添加分类
    public function cate_add()
    {
        $every = new Every;
        if (is_post()) {
            $data = input('post.');
            if (isset($data['son_id']) ) {
                if ($data['son_id'] != 0) {
                    $data['p_id'] = $data['son_id'];
                }

                //unset($data['son_id']);
            }
            unset($data['son_id']);
            $Productlogic = new ProductLogic;
            $rel = $Productlogic->saveCate($data);
            if ($rel['code'] == 1){
                $loginfo['style'] = 2;
                $loginfo['table'] = 'cate';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $rel['data'];
                $loginfo['note'] = '添加分类';
                $every->logger($loginfo);
            }
            return $rel;
        }
        $where['p_id'] = 0;
        $first_cate = model("Cate")->getList($where);
        $this->assign('first_cate', $first_cate);
        return $this->fetch();
    }
    public function cate_edit()
    {
        $every = new Every;
        if (is_post()) {
            $data = input('post.');
            $map['id'] = $data['id'];
            unset($data['id']);
            $rel = model('cate')->where($map)->update($data);
            if(!$rel){
                return [
                    'code' => '1',
                    'msg' => '您没有作出修改',
                ];
            }else{
                $loginfo['style'] = 3;
                $loginfo['table'] = 'cate';
                $loginfo['action_url'] = $_SERVER['QUERY_STRING'];
                $loginfo['user_id'] = $map['id'];
                $loginfo['note'] = '更改分类';
                $every->logger($loginfo);
                return [
                    'code' => '1',
                    'msg' => '修改成功',
                ];
            }

        }
        $id = input('get.id');
        $info = model('cate')->find($id);
        $this->assign('info',$info);
        return $this->fetch();
    }

    public function get_cate()
    {
        $list = model('Cate')->where('st_id', input('post.id'))->select();

        if (count($list)) {
            return $data = [
                'code' => 1,
                'data' => $list,
            ];
        } else {
            return $data = [
                'code' => 0,
            ];
        }
    }
    //大分类下公排图
    //2018年7月4日 11:25:39
    //sfp
    public function showCateLine($id){
        $Cmodel = model('CateLine');
        $map['ca_id'] = $id;
        $list = $Cmodel->getList($map);
        foreach ($list as $key => $value) {
            $lists[$key]['key'] = $value['id'];
            $x = ceil($value['x_id'] / 3);
            $y = $value['y_id'] - 1;
            $p_info = $Cmodel->getInfoByXyc($x,$y,$id);
            if($p_info){
                $lists[$key]['parent'] = $p_info['id'];
            }
            if($value['us_id']){
                $lists[$key]['name'] = model('User')->where('id',$value['us_id'])->value('us_nickname');
            }                             
            $lists[0]['name'] = model('Cate')->where('id',$id)->value('ca_name');  
        }
        $lists = json_encode($lists);
        //halt($lists);
        $this->assign('list',$lists);
        return $this->fetch();
    }



    /**
     * 竞价列表
     * @return mixed
     * @author sunpf
     * @date 2020/4/12 9:19
     */
    public function bidding()
    {

        if (is_numeric(input('get.status'))) {
            $this->map[] = ['status', '=', input('get.status')];
        }
        if (is_numeric(input('get.sales'))) {
            $this->map[] = ['sales', '=', input('get.sales')];
        }
        $id = input('get.id');
        $this->map[] = ['pd_id', '=', $id];
        $list = model('bidding')->getList($this->map, $this->order, $this->size);
//        halt($list);
//        halt($_SERVER);
//        $admininfo = session('rules');
//        halt($_SESSION);
//        halt($admininfo);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
            'id' => $id,
        ));
        return $this->fetch();
    }
}
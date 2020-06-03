<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月21日 18:03:31
 * 
 */

namespace app\admin\controller;

use app\common\logic\StoreLogic;
use app\common\model\Store as AreaStoreModel;
use think\Db;
use think\Container;

class Store extends Common
{
    /**
     * 门店列表
     * author fengkl
     * time 2018年5月21日 18:03:39
     * @return mixed
     */
    public function index()
    {
        $store = new StoreLogic;
        if (is_numeric(input('get.st_status'))) {
            $this->map[] = ['st_status', '=', input('get.st_status')];
        }
        if (is_numeric(input('get.area_id'))) {
            $this->map[] = ['area_id', '=', input('get.area_id')];
        }
        if (is_post()) {
            $rst = model('Store')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
        $list = $store->getList($this->map, $this->order, $this->size);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
            'area_list' => db('area_store')->select(),
        ));
        return $this->fetch();

    }

    //列表修改状态
    //fkl
    //2018年6月11日 17:08:23
    public function change(){
        if (is_post()) {
            $rst = model('Store')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
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
    //fkl
    //2018年6月11日 17:08:23
    public function dodelete(){
        $every = new Every;
        $data = input('post.');
        //halt($data);
        $rel = $every->allDel($data);
    }

    /**
     * @author  fkl
     * 2017年7月26日
     * mixed|string
     * @return mixed|string
     * description  获取地域
     */
    public function getArea(){
        $where['parent_id']=$_REQUEST['parent_id'];
        $list=db('area')->where($where)->select();
        echo json_encode($list);//对变量进行json编码
    }

    //门店定位
    public function positioning()
    {
        if (is_post()) {
            $data = input("post.");
            //var_dump($data);exit();
            $validate = validate('Verify');
            $rst = $validate->scene('editTude')->check($data);
            if (!$rst) {
                $this->error($validate->getError());
            }
            $rel = model('Store')->editInfo($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->success('修改成功');
            } else {
                $this->error('您未进行修改');
            }
        }
        $info = model('Store')->get(input('get.id'));
        $info['st_longitude'] = !empty($info['st_longitude']) ? $info['st_longitude'] : 113.632063;
        $info['st_latitude'] = !empty($info['st_latitude']) ? $info['st_latitude'] : 34.752787;
        $this->assign(array(
            'info' => $info,
        ));
        return $this->fetch();
    }

    public function position()
    {
        return $list = model("Store")->select();
    }


    /**
     * 修改门店
     * author fengkl
     * time 2018年5月22日 17:22:14
     * @return mixed
     */
    public function edit()
    {
        $storelogic = new StoreLogic;
        if (is_post()) {
            $data = input('post.');
            //var_dump($data);exit();
            $rel = $storelogic->saveStore($data,1);            
            if ($rel['code'] = 1) {
                $this->success($rel['msg']);
            } else {
                $this->error($rel['msg']);
            }
            return $rel;
        }  
        //获取省级地区
        $province= db('area')->where(array('parent_id'=>1))->select();
        $city= db('area')->where(array('area_type'=>2))->select();
        $town= db('area')->where(array('area_type'=>3))->select();      
        $info = $storelogic->getOne(input('get.id'));
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'info' => $info,
            'area_list' => db('area_store')->select(),
            'province' => $province,
            'city' => $city,
            'town' => $town,
        ));
        return $this->fetch();
    }

    /**
     * 添加门店
     * author fengkl
     * time 2018年5月22日 11:31:11
     * @return mixed
     */
    public function add()
    {
        if (is_post()) {
            $storelogic = new StoreLogic;
            $rel = $storelogic->saveStore(input('post.'));
            return $rel;           
        }
        //获取省级地区
        $province= db('area')->where(array('parent_id'=>1))->select();
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'area_list' => db('area_store')->select(),
            'province' => $province,
        ));
        return $this->fetch();
    }

    //上传图片
    public function upload()
    {

        $bb = Container::get('env')->get('ROOT_PATH');
        $file = request()->file('file');
        $info = $file->validate(['size' => '4096000'])
            ->move($bb . 'public/uploads/');
        if ($info) {
            $path = '/uploads/' . $info->getsavename();
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

    //分类列表
    public function cate()
    {
        if (is_post()) {
            $rst = model('Cate')->xiugai([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        }
        if (input('get.ca_name')) {
            $this->map[] = ['ca_name', '=', trim(input('get.ca_name'))];
        }
        if (is_numeric(input('get.status'))) {
            $this->map[] = ['ca_status', '=', input('get.status')];
        }
        $list = model('Cate')->chaxun($this->map, $this->order, $this->size);
        foreach ($list as $k => $v) {
            $info = model("Store")->get($v['st_id']);
            $list[$k]['st_serial_number'] = $info['st_serial_number'];
        }
        $this->assign(array(
            'list' => $list,
        ));
        return $this->fetch();
    }
    //添加分类
    public function cate_add()
    {
        if (is_post()) {
            $data = input('post.');
            $validate = validate('Verify');
            $res = $validate->scene('addCate')->check($data);
            if (!$res) {
                $this->error($validate->getError());
            }
            $rel = model('Cate')->tianjia($data);
            if ($rel) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
        return $this->fetch();
    }
    //获取店铺信息
    public function get_store()
    {
        $info = model("Store")->where('st_serial_number', input('post.st_serial_number'))->find();
        if ($info) {
            return $data = [
                'code' => 1,
                'data' => $info,
            ];
        } else {
            return $data = [
                'code' => 0,
            ];
        }
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

}
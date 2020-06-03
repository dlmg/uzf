<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月21日 09:31:52
 * 
 */

namespace app\admin\controller;

use app\common\logic\AreaStoreLogic;
use app\common\model\AreaStore as AreaStoreModel;
use think\Db;
use app\admin\controller\Every;

class AreaStore extends Common
{
    /**
     * 区域运营商列表
     * author fengkl
     * time 2018年5月21日 09:34:05
     * @return mixed
     */
    public function index()
    {
        $areastore = new AreaStoreLogic;
        /*if (input('get.keywords')) {
            $this->map[] = ['us_tel|us_account|us_nickname', '=', input('get.keywords')];
        }
        if (is_numeric(input('get.us_status'))) {
            $this->map[] = ['us_status', '=', input('get.us_status')];
        }*/
        if (is_post()) {
            $rst = model('AreaStore')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
            if ($rst) {
                return [
                    'code' => 1,
                    'msg' => '修改成功',
                    'data' => $rst,
                ];
            } 
        }
        $this->map[] = ['area_delete_status','=',1];
        $this->map[] = ['a.id','gt',1];
        $list = $areastore->getList($this->map, $this->order, $this->size);
        $this->assign(array(
            'yuming' => $_SERVER['HTTP_HOST'],
            'list' => $list,
        ));
        return $this->fetch();

    }

    //列表修改状态
    //fkl
    //2018年6月11日 17:08:23
    public function change(){
        if (is_post()) {
            $rst = model('AreaStore')->editInfo([input('post.key') => input('post.value')], ['id' => input('post.id')]);
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
    public function deletearea(){
        $every = new Every;
        $data = input('post.');
        //halt($data);
        $rel = $every->allDel($data);
    }


    /**
     * 修改用户
     * author fengkl
     * time 2018年5月16日 18:31:58
     * @return mixed
     */
    public function edit()
    {
        $areastore = new AreaStoreLogic;
        if (is_post()) {
            $data = input('post.');
            $rel = $areastore->saveAreastore($data,1);            
            if ($rel['code'] = 1) {
                $this->success($rel['msg']);
            } else {
                $this->error($rel['msg']);
            }
            return $rel;
        }        
        $info = $areastore->getOne(input('get.id'));
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 添加区域
     * author fengkl
     * time 2018年5月21日 10:53:15
     * @return mixed
     */
    public function add()
    {
        if (is_post()) {
            $arealogic = new AreaStoreLogic;
            $rel = $arealogic->saveAreastore(input('post.'));
            return $rel;           
        }
        return $this->fetch();
    }

}
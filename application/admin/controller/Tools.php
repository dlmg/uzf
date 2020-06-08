<?php
/**
 * Created by PhpStorm.
 * User: MG
 * Date: 2020/4/16
 * Time: 14:35
 */

namespace app\admin\controller;

use app\common\logic\ToolsLogic;
use think\Db;
use think\Container;
use think\Validate;

class Tools extends Common
{
    //道具列表页面
    public function index()
    {
        $tools = new ToolsLogic;
        if (is_numeric(input('status'))) {
            $this->map[] = ['status', '=', input('status')];
        }
        if (input('keywords')) {
            $this->map[] = ['name', 'like', '%' . input('keywords') . '%'];
        }
        $list = $tools->getList($this->map, $this->order, $this->size);
        if(!$list){
            return '暂无数据';
        }
        $this->assign('list', $list);
        return $this->fetch();
    }

    //更改道具的状态
    public function change()
    {
        $value = input('value');
        $id = input('id');
        $result = Db::name('tools')->where('id', $id)->setField('status', $value);
        if ($result)
            return json(['code' => 1, 'msg' => '修改成功']);
        else
            return json(['code' => 2, 'msg' => '修改失败']);
    }

    //发布道具
    public function add()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }elseif(request()->isPost()){
            $data = input('post.');
            $tools = new ToolsLogic;
            $res = $tools->saveTools($data);
            return $res;
        }
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

    public function edit(){
        if(request()->isGet()){
            $id = input('id');
            $data = Db::name('tools')->where('id',$id)->find();
            $this->assign('data',$data);
            return $this->fetch();
        }elseif(request()->isPost()){
            $data = input('post.');
            $info = model('Tools')->where('id',$data['id'])->update($data);
            if($info){
                return json(['code'=>200,'msg'=>'修改成功']);
            }else{
                return json(['code'=>201,'msg'=>'你没有做出修改']);
            }
        }
    }
}
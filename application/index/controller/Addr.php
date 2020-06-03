<?php
namespace app\index\controller;

use think\Controller;
use app\admin\logic\AddrLogic;
class Addr extends Basis
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $where['us_id'] = $this->user['id'];
        $data = model("UserAddr")->getList($where);
        $this->s_msg(null, $data);
    }public function add()
    {
        $datas = input('post.');
        $data = $datas['data'];
        $data['us_id'] = $this->user['id'];
        $addrlogic = new AddrLogic;
        $rel = $addrlogic->saveAddr($data);
        $this->msg($rel);
    }
    public function edit()
    {
        if(!input('post.id')){
            $this->e_msg('无法获取ID');
        }
        $where['id'] = input('post.id');
        $data = model("UserAddr")->getOne($where);
        $data['addr_code'] = explode(',', $data['addr_code']);
        $this->s_msg(null, $data);
    }public function doedit()
    {
        $datas = input('post.');
        $data = $datas['data'];
        if(!$data['id']){
            $this->e_msg('无法获取ID');
        }
        $addrlogic = new AddrLogic;
        $rel = $addrlogic->saveAddr($data,1);
        $this->msg($rel);
    }
}

<?php
namespace app\admin\controller;

use Cache;

/**
 * @todo 配置信息管理
 */
class Datalist extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }
    // --- ---------------------------------------------------------------------
    public function index()
    {
        $ca_list = [44,45,43,46,48];
        foreach ($ca_list as $k => $v) {
            $data[$k]['data'] = $this->getinfo($v);
        }
        $this->assign('data', $data);
        return $this->fetch();
    }
    public function getinfo($ca_id){
        $Qrmodel = model('Qrcode');
        $where['ca_id'] = $ca_id;
        $data['all'] = $Qrmodel->where($where)->count();//分类下所有二维码
        $data['todaybind'] = $Qrmodel->where($where)->whereTime('bind_time','today')->count();//分类下今日激活
        $data['bind'] = $Qrmodel->where($where)->where('status',1)->count();//分类下所有激活
        $data['todaystart'] = $Qrmodel->where($where)->whereTime('start_time','today')->count();//分类下今日扫码
        $start = $Qrmodel->where($where)->where('status',3)->count();//分类下所有扫码
        $data['remain'] = $data['bind'] - $start;//激活结余
        $data['start'] = $start;//扫码总数
        return $data;
    }
}

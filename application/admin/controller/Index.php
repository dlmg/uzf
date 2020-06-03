<?php
namespace app\admin\controller;

/**
 * @todo 首页操作
 */
class Index extends Common
{
    // ------------------------------------------------------------------------
    public function index()
    {
        return $this->fetch();
    }

    // ------------------------------------------------------------------------
    public function welcome()
    {
        // 获取平台账户详情
        $Umodel = model('User');
        //$todaymap[] = ['us_add_time', 'between', array(input('get.start'), input('get.end'))];
        $data['all'] = $Umodel->count();
        $data['pt'] = $Umodel->where('us_level','in','0,1,3')->count();
        $data['one'] = $Umodel->where('us_level',2)->count();
        $data['two'] = $Umodel->where('us_level',4)->count();
        $data['three'] = $Umodel->where('us_level',6)->count();
        $data['today'] = $Umodel->whereTime('us_add_time','today')->count();
        $data['month'] = $Umodel->whereTime('us_add_time','month')->count();
        $data['server'] = php_uname();
//        $data['server'] = php_uname('s').php_uname('r');
        $data['language'] = PHP_VERSION;
        $data['server_name'] = $_SERVER["HTTP_HOST"];
        $this->assign('data', $data);
        return $this->fetch();
    }
    // ------------------------------------------------------------------------

}

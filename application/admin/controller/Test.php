<?php
/**
 * Created by fengkl
 * User: Administrator
 * Date: 2018年5月15日 18:36:26
 * 
 */

namespace app\admin\controller;

use think\Db;
use think\Container;
use think\Controller;
use phpqrcode\phpqrcode;

//大萨达
class Test extends Controller
{
    public function lalala($n = 9){
      $aaa = 0;
       $aaa = $aaa + pow(3,$n);        //在函数开始输出参数的值
       if($n>0){                //判断参数是否大于0
         $this->lalala($n-1);            //如果参数大于0则调用自己，并将参数减1后再次传入
       }
       dump($aaa);
     }
    public function test(){
//    	$list = model('User')->select();
//    	foreach ($list as $key => $value) {
//    		$lists[$key]['key'] = $value['id'];
//    		if($value['us_pid']){
//    			$lists[$key]['parent'] = $value['us_pid'];
//    		}
//    		$lists[$key]['name'] = $value['us_nickname'];
//    	}
//    	$lists = json_encode($lists);
//    	//halt($lists);
//    	$this->assign('list',$lists);
//    	return $this->fetch();


    }
    public function qrcode($url="www.baidu.com",$level=3,$size=4)
    {
              //Vendor('phpqrcode.phpqrcode');
              $errorCorrectionLevel =intval($level) ;//容错级别 
              $matrixPointSize = intval($size);//生成图片大小 
             //生成二维码图片 
              $object = new \QRcode();
              $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);   
    }
    public function code(){
        $num = input('get.');
        $first = 100;
        $last = 200;
        for($i = $first; $i <= $last; $i++){
            $data[$i - $first] = "http://10.10.10.100:8007/admin/login?code=".$i;
        }
        //halt($data);
        $lists = json_encode($data);
        $this->assign('list',$lists);
        return $this->fetch();
    }


    

    
}
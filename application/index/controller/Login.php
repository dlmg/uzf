<?php
namespace app\index\controller;
use think\facade\Config;
use app\index\controller\Every;

class Login extends Basis {
	function __construct() {
		parent::__construct();
	}


	public function index()
	{
		$data = $this->user;
		if(session('openid')){          
			$ids['us_openid'] = session('openid');
			session('openid',null);
			model('user')->where('id',$data['id'])->update($ids);           
		}     
		$this->s_msg(null, $data);
		// $arr = ['code'=>'101',
		// 		'msg' => '登录',
		// 		];
		// return json_encode($arr);
	}

	public function gaveMsg(){
		$data = $this->user;
		if($data['gave_msg'] == 1){
			$msg['money'] = $data['us_shop_quan'];
			$msg['code'] = 1;

			$rel = model('user')->where('id',$data['id'])->setInc('gave_msg');
		}else{
			$msg['code'] = 2;
			$this->s_msg(null,$msg);
		}
		if($rel){
			$this->s_msg(null,$msg);
		}else{
			$this->e_msg('弹窗状态更改失败');
		}
	}

}

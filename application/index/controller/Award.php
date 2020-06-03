<?php
namespace app\index\controller;

use think\facade\Config;
use app\common\logic\UserLogic;
use app\index\controller\Wecpay;
use think\Container;

/**
 * 订单支付成功后处理类
 */
class Award extends Common {
	protected $wechant_numb;
	public function initialize() {
		parent::initialize();
		//$this->wechant_numb = Config::get('wechat_numb');
	}


}

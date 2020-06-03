<?php
namespace app\index\controller;
use app\common\controller\Api;
// use think\Controller;
use app\index\controller\User;


class Wecpay extends Api{
	function __construct() {
		parent::__construct();
		require_once "wecpay/lib/WxPay.Api.php";
		require_once "wecpay/lib/WxPay.Notify.php";
		require_once "wecpay/example/WxPay.JsApiPay.php";
		require_once "wecpay/example/WxPay.NativePay.php";
		require_once 'wecpay/example/log.php';
	}
	public function index($data) {
		$tools = new \JsApiPay();
		$openId = $data['openid'];
		$jine = $data['money'];
		$or_id = $data['or_id'];
		$type = $data['type'];		
		$add_pay = model("PayWechat")->tianjia($data['us_id'], $jine, $type, $or_id);
		$num = $jine * 100;
		$input = new \WxPayUnifiedOrder();
		$input->SetBody("order");
		$input->SetAttach($type);
		$input->SetOut_trade_no($or_id);
		$input->SetTotal_fee('1');
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://czh.jugekeji.com/index/wenotify/notify");
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid($openId);
		$order = \WxPayApi::unifiedOrder($input);
		$jsApiParameters = $tools->GetJsApiParameters($order);
		$this->s_msg(null, $jsApiParameters);
	}

}
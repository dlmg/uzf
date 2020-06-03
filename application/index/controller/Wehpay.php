<?php
namespace app\index\Controller;

use hyperjiang\BankCard;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use think\facade\Config;
use app\common\controller\Api;
use app\index\controller\Wenotify;

class Wehpay extends Api{
	protected $config = [
		// 'app_id' => 'wx2eedda3c6c6a5721',
		// 'mch_id' => '1507550611',
		// 'key' => 'e6063c2e8bdb927e39bee0ef020c202a',
		// 'notify_url' => 'http://czh.jugekeji.com/index/Wehpay/notify',
		'app_id' => '2016082000295641',
	    'notify_url' => 'http://yansongda.cn/notify.php',
	    'return_url' => 'http://yansongda.cn/return.php',
	    'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuWJKrQ6SWvS6niI+4vEVZiYfjkCfLQfoFI2nCp9ZLDS42QtiL4Ccyx8scgc3nhVwmVRte8f57TFvGhvJD0upT4O5O/lRxmTjechXAorirVdAODpOu0mFfQV9y/T9o9hHnU+VmO5spoVb3umqpq6D/Pt8p25Yk852/w01VTIczrXC4QlrbOEe3sr1E9auoC7rgYjjCO6lZUIDjX/oBmNXZxhRDrYx4Yf5X7y8FRBFvygIE2FgxV4Yw+SL3QAa2m5MLcbusJpxOml9YVQfP8iSurx41PvvXUMo49JG3BDVernaCYXQCoUJv9fJwbnfZd7J5YByC+5KM4sblJTq7bXZWQIDAQAB',
	    'private_key' => '',
	    'log' => [ // optional
	        'file' => './logs/alipay.log',
	        'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
	        'type' => 'single', // optional, 可选 daily.
	        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
	    ],
	    'http' => [ // optional
	        'timeout' => 5.0,
	        'connect_timeout' => 5.0,
	        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
	    ],
	    // 'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
	];

	public function index($data){
		$jine = 1;
		$or_id = time().$data['or_id'];
		$type = $data['type'];
		$order = [
			'out_trade_no' => $or_id,
			'total_fee' => $jine,
			'body' => '购买支付',
		];
		$add_pay = model("PayWechat")->tianjia($data['us_id'], $data['money'], $type, $data['or_id']);
		$wechat = Pay::wechat($this->config);
		$pay = Pay::wechat($this->config)->wap($order);
		$pay = $pay.'&redirect_url=https%3A%2F%2Fwww.58yxg.com/order';
		$this->s_msg(null, $pay);
		$aaa['value'] = $pay;
		model('zzzz')->save($aaa);
		header('Location: '.$pay);
	}
	public function alipay()
	{
		//$config = config('alipay');
		$alipay = Pay::alipay($this->config);
		$order = [
		    'out_trade_no' => time(),
		    'total_amount' => '0.01',
		    'subject'      => 'test subject-测试订单',
		    // 'http_method'  => 'GET' // 如果想在 wap 支付时使用 GET 方式提交，请加上此参数。默认使用 POST 方式提交
		];

		return $alipay->web($order)->send(); 

	}
	public function notify()
	{
		$pay = Pay::wechat($this->config);
		try{
			$data = $pay->verify();
			$or_ids = $data->out_trade_no;
			$or_id = substr($or_ids,10);
			$pay_model = model("PayWechat");
			$status['status'] = 1;
			$where['or_id'] = $or_id;
			$pay_model->where($where)->update($status);
			$this->payed($or_id);
			Log::debug('Wechat notify', $data->all());
		} catch (Exception $e) {
		}       
		return $pay->success()->send();
	}
	public function payed($or_id){       
		$or_status['or_status'] = 1;
		$or_status_rel = model('order')->where('id',$or_id)->update($or_status);
		if(!$or_status_rel){
			return '订单处理失败，请联系商家';
		}
		$us_id = model('order')->where('id',$or_id)->value('us_id');
		$wepayed = new Wenotify;
		$wepayed->payed($or_id,$us_id);
	}

}


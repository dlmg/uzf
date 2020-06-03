<?php
namespace app\index\controller;

use wechat\TPWechat;
use think\facade\Config;
use app\index\controller\User;  

class Wechat
{
	function __construct() {
		require_once "wecpay/lib/WxPay.Api.php";
		require_once "wecpay/lib/WxPay.Notify.php";
		require_once "wecpay/lib/WxPay.Data.php";

	}
	public function init()
	{

		$wechant_numb = Config::get('wechat_numb');

		$options = [
			'appid' => $wechant_numb['appid'],
			'appsecret' => $wechant_numb['appsecret'],
			'token' => $wechant_numb['token'],
			'encodingaeskey' => $wechant_numb['encodingaeskey'],
		];
		$weObj = new TPWechat($options);
		return $weObj;
	}
	public function getopenid(){
		$weObj = $this->init();
		$token = $weObj->getOauthAccessToken();
		if (!$token) {
			$str = request()->domain().url('Wechat/getopenid');

			$url = $weObj->getOauthRedirect(request()->domain() . url('Wechat/getopenid'), '');

			header("location: $url");
			return;
		}
		$wxuser = $weObj->getOauthUserinfo($token["access_token"], $token["openid"]);
		halt($wxuser);

	}

	public function index()
	{
		$weObj = $this->init();
		$weObj->valid();
		$type = $weObj->getRev()->getRevType();
		$appUrl = "http://" . input("server.HTTP_HOST");
		switch ($type) {
			case 'event':
			$weObj->text('谢谢您的👍哦！我们会做的更好的')->reply();
			break;
			case 'text':
			$weObj->text('欢迎关注！')->reply();
			break;
			case 'image':
			$weObj->text('我们会看到您给的图片！')->reply();
			break;
			case 'voice':
			$weObj->text('我们会听一下您的声音！')->reply();
			break;
			case 'video':
			$weObj->text('这是个好视频 谢谢！')->reply();
			break;
			case 'location':
			$weObj->text('这是个好地方！')->reply();
			break;
			case 'link':
			$weObj->text('这个链接可是好东西,谢谢分享！')->reply();
			break;
			case 'file':
			$weObj->text('不敢打开看！')->reply();
			break;
			case 'event':
			$eventype = $weObj->getRev()->getRevEvent();
			if ($eventype['event'] == "subscribe") {
//用户关注动作
				$weObj->text('欢迎关注！')->reply();
			}
			break;
// ... 其它消息
			default:
			$weObj->text('没明白您发的什么！')->reply();
			break;

		}
	}

	public function createMenu()
	{
		$m = db("menu");
		$menu = $m->where(array("pid" => 0))->limit(3)->select();

		$newmenu["button"] = array();
		for ($i = 0; $i < count($menu); $i++) {
			if ($menu[$i]["type"] == "view") {
				$sub = $m->where(array("pid" => $menu[$i]["id"]))->limit(5)->select();
				if ($sub) {
					$sub_button = array();

					for ($j = 0; $j < count($sub); $j++) {
						if ($sub[$j]["type"] == "view") {
							array_push($sub_button, array('type' => 'view', 'name' => $sub[$j]["name"], 'url' => $sub[$j]["url"]));
						} else {
							array_push($sub_button, array('type' => 'click', 'name' => $sub[$j]["name"], 'key' => $sub[$j]["key"]));
						}
					}
					array_push($newmenu["button"], array('name' => $menu[$i]["name"], 'sub_button' => $sub_button));
				} else {
					array_push($newmenu["button"], array('type' => 'view', 'name' => $menu[$i]["name"], 'url' => $menu[$i]["url"]));
				}
			} else {
				$sub = $m->where(array("pid" => $menu[$i]["id"]))->limit(5)->select();
				if ($sub) {
					$sub_button = array();

					for ($j = 0; $j < count($sub); $j++) {
						if ($sub[$j]["type"] == "view") {
							array_push($sub_button, array('type' => 'view', 'name' => $sub[$j]["name"], 'url' => $sub[$j]["url"]));
						} else {
							array_push($sub_button, array('type' => 'click', 'name' => $sub[$j]["name"], 'key' => $sub[$j]["key"]));
						}
					}
					array_push($newmenu["button"], array('name' => $menu[$i]["name"], 'sub_button' => $sub_button));
				} else {
					array_push($newmenu["button"], array('type' => 'click', 'name' => $menu[$i]["name"], 'key' => $menu[$i]["key"]));
				}
			}
		}
		$weObj = $this->init();

		if ($weObj->createMenu($newmenu)) {
			echo "success";
		} else {
			echo "error";
		}
	}

// 获取token值
	public function getAccessToken()
	{
		$weObj = $this->init();
		$accessToken = $weObj->checkAuth();
		return $accessToken;
	}

	public function getInfo()
	{
		$access_token = $this->getAccessToken();
		$openid = session('openid');

		$test = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $openid . "&lang=zh_CN";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $test);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$result = json_decode($response);
		curl_close($ch);
		return $result;
	}

	public function orderPay()
	{

	}


	public function getCityLocation()
	{
		$data = input('post.');
		$latitude = $data['latitude']; 
		$longitude = $data['post.longitude']; 

		$url = "http://api.map.baidu.com/geocoder/v2/?ak=IHDKmkKAofhZDlUG8Vq2iqFKgQzvDt5c&location=" . $latitude . "," . $longitude . "&output=json&coordtype=gcj02ll";

		$output = file_get_contents($url);
		$address = json_decode($output, true);
		$city_name = $address['result']['addressComponent']['city']; 
		$city_code = $address['result']['cityCode']; 
		if (!empty($city_name)) {
			return json(['city' => $city_name]);
		}
	}


	public function getTmp()
	{
		$accessToken = $this->getAccessToken();
		$serverId = input('post.serverId');
// 服务器存放地址
		$filename = date('YmdHis') . '.jpg';
		$targetName = ROOT_PATH . 'public/upload/shoptitle/' . $filename;

		$ch = curl_init("http://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$accessToken}&media_id={$serverId}");
		$fp = fopen($targetName, 'w+');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		return json(['pic' => $filename]);
	}


	public function getCity()
	{
		$pro = input('get.code');
		$list = db('cn_city')->where('provincecode', $pro)->select();
		return json(['city' => $list]);
	}

	public function notify() {

		$notify = new \WxPayNotify();
		$notify->Handle(false);

		$xml = file_get_contents('php://input');

		$data = $notify->FromXml($xml);

// $param = json_encode($para);
		\think\facade\Log::write('支付回调日志记录'.json_encode($data));
		$succeed = ($notify->GetReturn_code() == 'SUCCESS') ? true : false;
		if (!$succeed){
			\think\facade\Log::write('订单' . $data['out_trade_no'] . '支付失败');
		}

		exit();


		$data['pa_we_type'] = 11111;
		model('PayWechat')->insertGetId($data);
		$UserContr = new User;

		$succeed = ($notify->GetReturn_code() == 'SUCCESS') ? true : false;
		if ($succeed) {
			$data['pa_we_type'] = 22222;
			model('PayWechat')->insertGetId($data);

			if(2 == 1){

				$UserContr->vipUpdateStaus();
			}
//model('PayWechat')->insertGetId($data);
//model('PayWechat')->back_success($number);
		} else {
			\Log::write('订单' . $number . '支付失败');
		}
	}

}

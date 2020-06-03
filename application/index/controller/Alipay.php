<?php
namespace app\index\controller;

use think\facade\Config;
use app\common\logic\UserLogic;
use app\common\logic\OrderLogic;
use app\common\logic\ProductLogic;
use app\index\controller\Wecpay;
use think\Container;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
/**
 * 订单支付成功后处理类
 */
class Alipay extends Common {
	protected $wechant_numb;
	public function initialize() {
		parent::initialize();
		$this->alipay = config('alipay');
	}

	// public function notify()
	// {
	// 	//写入文件
	// 	$this->writelog("weixinnotify_url.txt",'走进来了'.date("Y-m-d H:i:s")."\r\n");
	// 	$config=config('alipay');
	// 	$result = Pay::alipay($config)->verify();
	// 	if($result){
	// 		//写入文件
	// 	$this-> writelog("weixinnotify_url.txt",'验签成功'.date("Y-m-d H:i:s")."\r\n");
	// 		$arr=input('post.');
	// 		$arr['out_trade_no'];
	// 		//写入文件
	// 	$this->writelog("weixinnotify_url.txt",$arr['out_trade_no'].date("Y-m-d H:i:s")."\r\n");

	// 	}else{
	// 		//写入文件
	// 	$this->writelog("weixinnotify_url.txt",'验签失败'.date("Y-m-d H:i:s")."\r\n");
	// 		echo "fail";exit;
	// 	}
		
	// }
	//支付成功后处理订单函数
	public function allpay($or_num)
	{
		$us_id = model('order')->where('or_num',$or_num)->value('us_id');
		$usinfo = model('user')->where('id',$us_id)->find();
		$or_id = model('order')->where('or_num',$or_num)->value('id');
		$Order = new OrderLogic;
		
		$totals = $this->orderTotalById($or_id);
		$total_no_fee = $totals[3];
		$total = $totals[0];
		$balance = $usinfo['us_all_get'];
		$level = $usinfo['us_level'];
		// $cat_id = model('order')->where('id',$or_id)->value('ca_id');
		

		$rel = model('User')->where('id',$us_id)->setDec('us_all_get',$balance);
		
		if ($level == 0 && $total_no_fee >= 499) {
			$changelevel['us_level'] = 2;
			$changelevel['activate_time'] = date('Y-m-d H:i:s');
			// $where['id'] =  $this->user['id'];					
			// $rel = model('user')->editInfo($changelevel, $where);
			$rel = model('user')->where('id',$this->user['id'])->updateInfo($changelevel);
			$data['add_time'] = date('Y-m-d H:i:s');
			$rel_time = model('order')->where('id',$or_id)->updateInfo($data);
			if (!$rel) {
				$this->e_msg('用户等级升级失败');
			}
		}
		$or_status_data['or_status'] = 1;
		$or_rel = model('Order')->where('id',$or_id)->update($or_status_data);
		//halt($or_id);
		$awa =$Order->gaveAward($total_no_fee,$or_id);
		return $awa;
        // if ($awa['code'] == 0) {
        // 	return $awa;
        //     //$this->e_msg($awa);
        // }elseif ($awa['code'] == 1) {
        // 	$this->s_msg('支付成功');
        // }
	}
//接受支付宝支付信息
  public function alipaynotify()
  {
  	//写入文件
		$this->writelog("weixinnotify_url.txt",'支付宝-走进来了'.date("Y-m-d H:i:s")."\r\n");
		$config=config('alipay');
		$result = Pay::alipay($config)->verify();
		if($result){
			//写入文件
		$this-> writelog("weixinnotify_url.txt",'支付宝-验签成功'.date("Y-m-d H:i:s")."\r\n");
			$arr=input('post.');
			//$arr['out_trade_no'];
			$rel = $this->allpay($arr['out_trade_no']);
			if ($rel['code'] == 0) {
				return json($rel);
			}elseif ($rel['code'] == 1) {
				$this->s_msg('支付宝支付成功');
			}
			//写入文件
		//$this->writelog("weixinnotify_url.txt",$arr['out_trade_no'].date("Y-m-d H:i:s")."\r\n");

		}else{
			//写入文件
		$this->writelog("weixinnotify_url.txt",'支付宝-验签失败'.date("Y-m-d H:i:s")."\r\n");
			echo "fail";exit;
		}
  }
	//微信支付异步接收地址
	public function cz_notify(){
		$this->writelog("weixinnotify_url.txt",'微信-进来'.date("Y-m-d H:i:s")."\r\n");
	    $config=config('wechat');
	    $result = Pay::wechat($config)->verify();
	    $this->writelog("weixinnotify_url.txt",'微信-验证'.date("Y-m-d H:i:s")."\r\n");
	    if($result){

	        $xml = post_data();
	        $arr=xmlToArray($xml);
	        if($arr['return_code']=='SUCCESS'){
	        	//$this->writelog("weixinnotify_url.txt",'成功'.$arr['out_trade_no'].date("Y-m-d H:i:s")."\r\n");
	        		$rel = $this->allpay($arr['out_trade_no']);
					if ($rel['code'] == 0) {
						return json($rel);
					}elseif ($rel['code'] == 1) {
						$this->s_msg('微信支付成功');
					}
	            // $chongzhi=db('tixian')->where('num',$arr['out_trade_no'])->find();
	            // if(!$chongzhi){
	            //     echo "fail";exit;
	            // }
	            // if($chongzhi['tx_review']==4){
	            //     $res=$this->recharge($chongzhi['us_id'],$chongzhi['tx_sum'],$chongzhi['id']);
	            //     if($res){
	            //         return Pay::wechat($config)->success()->send();
	            //     }
	            // }
	        }else{
	        	$this->writelog("weixinnotify_url.txt",'微信-失败'.date("Y-m-d H:i:s")."\r\n");
	        }
	    }
	}
	//充值微信支付异步接收地址
	// public function we_notify(){
	// 	$this->writelog("weixinnotify_url.txt",'进来'.date("Y-m-d H:i:s")."\r\n");
	//     $config=config('wechat');
	//     $result = Pay::wechat($config)->verify();
	//     $this->writelog("weixinnotify_url.txt",'验证'.date("Y-m-d H:i:s")."\r\n");
	//     if($result){

	//         $xml = post_data();
	//         $arr=xmlToArray($xml);
	//         if($arr['return_code']=='SUCCESS'){
	//         	$this->writelog("weixinnotify_url.txt",'成功'.$arr['out_trade_no'].date("Y-m-d H:i:s")."\r\n");
	//             // $chongzhi=db('tixian')->where('num',$arr['out_trade_no'])->find();
	//             // if(!$chongzhi){
	//             //     echo "fail";exit;
	//             // }
	//             // if($chongzhi['tx_review']==4){
	//             //     $res=$this->recharge($chongzhi['us_id'],$chongzhi['tx_sum'],$chongzhi['id']);
	//             //     if($res){
	//             //         return Pay::wechat($config)->success()->send();
	//             //     }
	//             // }
	//         }else{
	//         	$this->writelog("weixinnotify_url.txt",'失败'.date("Y-m-d H:i:s")."\r\n");
	//         }
	//     }else{
	//     	$this->writelog("weixinnotify_url.txt",'没有接受到信息'.date("Y-m-d H:i:s")."\r\n");
	//     }
	// }
	//根据订单id计算价格
	public function orderTotalById($or_id)
	{
		$p_model = model('product');
		$list = model('OrderDetail')->where('or_id',$or_id)->select();
		$total = 0;
		$take_fee = 0;
		$all_num = 0;
		foreach ($list as $k => $v) {
			$goods = $p_model->where('id',$v['pd_id'])->find();
			if($goods['take_fee'] > $take_fee){
				$take_fee = $goods['take_fee'];
			}
			$total += $v['or_pd_num'] * $goods['pd_price'];
			$all_num += $v['or_pd_num'];
		}
		$total_no_fee = $total;
		$total += $take_fee;
		return [$total,$take_fee,$all_num,$total_no_fee];
	}
	//写入日志
	public function writelog($file,$content)
	{
		   // $file = "log.txt";
		   //  $content = "内容标题\r\n内容第一行\r\n内容第二行";
		 
		    //打开文件$file时，使用追加模式，此时文件指针会在文件开始出
		    if(!$fp = fopen($file,'a'))
		    {
		        echo "打开文件$file失败！";
		        exit;
		    }
		 
		    if(fwrite($fp,$content) === FALSE)
		    {
		        echo "写入文件失败！";
		        exit;
		    }
		 
		    echo "写入文件成功！";
		    fclose($fp);

		
	}
// 	public function message()
// 	{
// 		$myfile = "log.txt";
// 		$txt = date('Y-m-d H:i:s')."^_^".'写入文件'."\r\n";
// 		$this->writelog($myfile,$txt);
// 	}
// 	function xmlToArray($xml)
// 	{
// 	    //禁止引用外部xml实体
// 	    libxml_disable_entity_loader(true);
// 	    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
// 	    return $values;
// 	}

// //微信异步通知获取post数据函数
// function post_data()
// {
//     //$receipt = $_REQUEST;
//     $receipt=null;
//     if($receipt==null){
//         $receipt = file_get_contents("php://input");
//         if($receipt == null){
//             $receipt = $GLOBALS['HTTP_RAW_POST_DATA'];
//         }
//     }
//     return $receipt;
// }
// 	public function pay()
// 	{
// 		$config = config('alipay');
// 		$order = [
// 		    'out_trade_no' => time(),
// 		    'total_amount' => '0.01',
// 		    'subject' => '特价药品',
// 		];

// 		$alipay = Pay::alipay($config)->web($order);
// 		$this->assign('alipay',$alipay);
// 		return $this->fetch();
// 	}
// 	public function wepay()
// 	{
// 		$wechat = config('wechat');
// 		$order = [
// 		    'out_trade_no' => time(),
// 		    'body' => '特价药品',
// 		    'total_fee' => '1',
// 		];
// 		$wepay=Pay::wechat($wechat)->wap($order);
// 		$this->assign('wepay',$wepay);
// 		return $this->fetch();
// 	}
}
<?php /*a:1:{s:63:"D:\phpStudy\WWW\szsc\application\index\view\user\take_type.html";i:1533366433;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>选择提现方式</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style type="text/css">
		.content{
			width: 80%;
			height: 1.29rem;
			box-shadow:0px 0px 0.08rem rgba(0,0,0,0.15);
			margin: 0.5rem auto 0 auto;
			display: flex;
			border-radius: 0.17rem;
		}
		.content img{
			width: 0.73rem;
			height: 0.71rem;
			margin: 0.3rem 0 0 0.3rem;
		}
		.content #ok{
			width: 0.29rem;
			height: 0.19rem;
			margin: 0.6rem 0 0 0.5rem;
			display: none;
		}
		.content ul{
			width: 60%;
			margin: 0.3rem 0 0 0.3rem;
		}
		.content ul li:nth-child(1){
			font-size: 0.24rem;
		}
		.content ul li:nth-child(2){
			font-size: 0.2rem;
			color: #535659;
		}
		.btn{
           width: 80%;
           display: block;
           position: fixed;
           bottom: 5%;
           left: 10%;
           height: 0.8rem;
           border: none;
           background:#5F6BE4 ;
           color: #ffffff;
           border-radius: 0.4rem;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('user/index'); ?>"  ><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>选择提现方式</h1>
			</div>
		<div class="tab">
			<div class="content" title="bank">
				<img src="/static/index/img/bank.png"/>
				<ul>
					<li>银行卡号</li>
					<li><?php echo htmlentities($info['bank_account']); ?></li>
				</ul>
				<img src="/static/index/img/duigou.png"/ id="ok">
			</div>
			<div class="content" title="wechat">
				<img src="/static/index/img/wechat.png"/>
				<ul>
					<li>微信账号</li>
					<li><?php echo htmlentities($info['we_account']); ?></li>
				</ul>
				<img src="/static/index/img/duigou.png"/ id="ok">
			</div>
			<div class="content" title="alipay">
				<img src="/static/index/img/alipay.png"/>
				<ul>
					<li>支付宝账号</li>
					<li><?php echo htmlentities($info['ali_account']); ?></li>
				</ul>
				<img src="/static/index/img/duigou.png"/ id="ok">
			</div>			
		</div>	
			<button class="btn" onclick="subtype()">确定</button>			
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script type="text/javascript">
			var num=0;
			$(function(){				
				var content = $('.content')
				content.eq(0).children('#ok').css('display','block');
				$.each(content, function(index,value) {
					$(this).click(function(){
						$(this).children('#ok').fadeIn(500);
						$(this).siblings().children('#ok').fadeOut(100);
						 num = index
					})
				});				
			})
			function subtype(){
				//num：0-银行卡；1-微信；2-支付宝
				location.href='<?php echo url('user/takeMoney'); ?>?type='+num;
			}			
		</script>
	</body>
</html>

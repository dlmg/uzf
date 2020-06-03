<?php /*a:1:{s:64:"D:\phpStudy\WWW\szsc\application\index\view\user\take_money.html";i:1533367978;}*/ ?>
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
		.nav{
			width: 80%;
			box-shadow:0px 0px 0.08rem rgba(0,0,0,0.15);
			margin: 0.5rem auto 0 auto;
			overflow: hidden;
			border-radius: 0.17rem;
		}
		.content img{
			width: 0.7rem;
			height: 0.7rem;
			margin: 0.3rem 0 0 0.3rem;
		}
		.content #ok{
			width: 0.14rem;
			height: 0.24rem;
			margin: 0.6rem 0 0 0.5rem;
		}
		.content ul{
			width: 50%;
			margin: 0.3rem 0 0 0.3rem;
		}
		.content ul li:nth-child(1){
			font-size: 0.24rem;
		}
		.content ul li:nth-child(2){
			font-size: 0.2rem;
			color: #535659;
		}
		.nav span{
			display: inline-block;
			width: 25%;
			padding-left: 5%;
			font-size: 0.24rem;
		}
		.nav label{
			display: block;
		
		}
		.nav input{
			height: 0.93rem;
			color: #95999e;
			font-size: 0.24rem;
			border: none;
			text-indent: 5%;
			margin-left: 5%;
			width: 65%;
		}
		.nav h1{
			margin:0.2rem 0 0 5%;
		}
		#jine{
			width: 80%;
			margin-left: -0.5rem;
			vertical-align: bottom;
		}
		.nav>.yue{
			position: relative;
		}
		.nav>.yue>a{
			position: absolute;
			color: #5F6BE4;
			right: 0.2rem;
			top: 0.19rem;
		}
		.nav>.yue p,.nav>.yue p a{
			line-height: 0.8rem;
			color: #787A7E;
		}
		button{
			position: fixed;
			width: 50%;
			height: 0.88rem;
			background: #5F6BE4;
			border: none;
			border-radius: 0.4rem;
			color: #FFFFFF;
			font-size: 0.32rem;
			bottom: 3rem;
			left:25%;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('user/takeType'); ?>"  ><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>选择提现方式</h1>
			</div>
			<form action="" method="post" id="take-money-form">
				<div class="tab">
					<div class="content">
						<img src="<?php echo htmlentities($info['type_pic']); ?>"/>
						<ul>
							<li><?php echo htmlentities($info['msg']); ?></li>
							<li><?php echo htmlentities($info['account']); ?></li>
						</ul>
					</div>
					<div class="nav">
						<label for="" style="border-bottom: 0.01rem solid rgba(230,230,230,1);"><span>姓名</span><input type="text" name="tx_name" placeholder="您的名字" /></label>
						<label for=""><span>身份证号</span><input type="text" name="tx_idcard" placeholder="有效身份证号" /></label>
					</div>			
					<div class="nav">
					    <h1>提现金额</h1>
						<label for="">
							<span style="font-size: 0.56rem;margin-top: 0.15rem;vertical-align: super;">￥</span>
						<input type="number" name="tx_num" /></label>
						<input type="hidden" name="tx_type" value="<?php echo htmlentities($info['type']); ?>">
						<input type="hidden" name="tx_account" value="<?php echo htmlentities($info['account']); ?>">
						<div class="yue"  style="border-top: 0.01rem solid rgba(230,230,230,1);">
							<p>可用余额 <a href="#"><?php echo htmlentities($info['us_shop_bi']); ?></a>元</p>
							<!-- <a href="#">全部提现</a> -->
						</div>
					</div>
				</div>
			</form>	
			 <button class="btn" onclick="return takeMoney()">确认提现</button>			
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			$(function(){
				var content = $('.content')
				content.eq(0).children('#ok').css('display','block');
				$.each(content, function(index,value) {
					$(this).click(function(){
						$(this).children('#ok').fadeIn(500);
						$(this).siblings().children('#ok').fadeOut(100);
					})
				});				
			})
			function takeMoney(){
			    $.post('<?php echo url("user/doTakeMoney"); ?>',$('#take-money-form').serialize()).success(function(data){
			    	layer.msg(data.msg);
			    	if(data.code){
			    		setTimeout(function(){
			    			location.href = '<?php echo url("user/index"); ?>';
			    		},1000);
			    	}
			    });
			    return false;
			}
			
		</script>
	</body>
</html>

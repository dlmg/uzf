<?php /*a:1:{s:81:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\login\register.html";i:1533693448;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>注册</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/pilce.css"/>
	<style>
		.border{
			width: 100%;
			box-shadow:0px 0px 0.1rem rgba(153,153,153,0.3);
			background: #FFFFFF;
			margin: 0.3rem auto;
			overflow: hidden;
			position: relative;
		}
		.border input{
			color: #666666;
			width: 80%;
			height: 0.7rem;
			display: block;
			margin: 0.3rem auto;
			background: url(/static/index/img/phone.png) no-repeat 0% 50%;
			background-size: 6% 70%;
			text-indent: 15%;
			border: none;
			border-bottom: 0.01rem solid rgba(199,199,199,1);
		}
		.border input:nth-child(1){
			background: url(/static/index/img/tb-1.png) no-repeat 0% 50%;
			background-size: 7.3% 70%;
		}
		.border input:nth-child(2){
			background: url(/static/index/img/tb-2.png) no-repeat 0% 50%;
			background-size: 6% 70%;
		}
		.border input:nth-child(4){
			background: url(/static/index/img/password.png) no-repeat 0% 50%;
			background-size: 6% 65%;
		}
		.border input:nth-child(6),.border input:nth-child(7){
			background: url(/static/index/img/tb-3.png) no-repeat 0% 50%;
			background-size: 6.3% 65%;
		}
		.border input:nth-child(8){
			background: url(/static/index/img/tb-4.png) no-repeat 0% 50%;
			background-size: 7.5% 65%;
		}
		.border input:nth-child(9){
			background: url(/static/index/img/tb-5.png) no-repeat 0% 50%;
			background-size: 7.7% 65%;
		}
		.border input:nth-child(10){
			background: url(/static/index/img/tb-6.png) no-repeat 0% 50%;
			background-size: 8% 55%;
		}
		.border input:nth-child(5){
			width: 21%;
			background:none;
			border: none;
			position: absolute;
			top: 32%;
			right: 12%;
			color: #5F6BE4;
			font-size: 0.26rem;
			text-indent: 0;
		}
		
		.btn{
			display: block;
			height: 0.88rem;
			width: 80%;
			margin: 0.7rem auto;
			background: #5F6BE4;
			border: none;
			color: #FFFFFF;
			border-radius: 0.44rem;
			font-size: 0.36rem;
			
		}
		
	</style>
	<body>
		<div>
			<div class="header">
				<h1>注册账号</h1>
				<a href="index.html">立即登陆</a>
			</div>
			<div class="border">
				<form action="" method="post" id="register-form">
					<input type="text" name="ptel" value="<?php echo htmlentities((isset($info['us_tel']) && ($info['us_tel'] !== '')?$info['us_tel']: '')); ?>" placeholder="推荐人手机号" <?php if($info != ''): ?> readonly="readonly" <?php endif; ?> >
					<input type="text" name="us_nickname" placeholder="姓名"/>
					<input type="number" name="us_tel" id="us_tel" placeholder="手机号码"/>
					<input type="text" name="code" placeholder="手机验证码"/>
					<input type="button" name="" id="codebtn" value="获取验证码" " />
					<input type="password" name="us_pwd" placeholder="登录密码"/>
					<input type="password" name="us_pwd2" placeholder="确认登录密码"/>
					<input type="number" name="ali_account" placeholder="填写支付宝账号"/>
					<input type="number" name="we_account" placeholder="填写微信账号"/>
					<input type="number" name="bank_account" placeholder="填写银行卡账号"/>
				</form>				
			</div>
			<button class="btn" onclick="return register()">提交</button>			
		</div>
		<script src="/static/index/js/base.js"></script>
		<script type="text/javascript" src="/static/index/js/jquery-1.11.0.js"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			var flag=true;
			function register(){
			    $.post('<?php echo url("login/doRegister"); ?>',$('#register-form').serialize()).success(function(data){
			    	layer.msg(data.msg);
			    	if(data.code){
			    		setTimeout(function(){
			    			location.href = '<?php echo url("login/index"); ?>';
			    		},1000);
			    	}
			    });
			    return false;
			}
			$("#codebtn").click(function(){
				if(flag){
					var _this=$(this);
					var us_tel = $("#us_tel").val();
					$.ajax({
			            type: "post",
			            url: "<?php echo url('login/getCode'); ?>",
			            data: {us_tel:us_tel},
			            success: function(data) {
			            	layer.msg(data.msg);
			             	if(data.code){
			             		let time=6;								
								var times=setInterval(function(){
									flag=false;
									time--;
									_this[0].value=time+"s";
									if(time<=-1){
										clearInterval(times);
										_this[0].value="重新发送";
										flag=true;
									}	
								},1000)
			             	}
			            }
			        });
					
				}
			})
		</script>
	</body>
</html>

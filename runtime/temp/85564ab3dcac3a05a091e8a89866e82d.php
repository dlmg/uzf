<?php /*a:1:{s:78:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\login\index.html";i:1533369996;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>登陆页面</title>
	</head>
	<link href="/static/index/css/pilce.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		
		.divbody{
			width: 3.2rem;
			height: 3.2rem;
			border-radius: 50%;
			margin: 0.5rem auto;
			
		}
		.divbody img{
			width: 100%;
			height:100%;
			overflow: hidden;
		}
		.border{
			width: 90%;
			height: 5rem;
			box-shadow:0px 0px 0.1rem rgba(153,153,153,0.3);
			background: #FFFFFF;
			margin: 0 auto;
			overflow: hidden;
		}
		.border input{
			color: #666666;
			width: 90%;
			height: 0.8rem;
			display: block;
			margin: 0.5rem auto;
			background: url(/static/index/img/phone.png) no-repeat 0% 50%;
			background-size: 6% 70%;
			text-indent: 15%;
			border: none;
			border-bottom: 0.01rem solid rgba(199,199,199,1);
		}
		.border input:nth-child(1){
			margin-top: 0.5rem;
		}
		.border input:nth-child(2){
			background: url(/static/index/img/password.png) no-repeat 0% 50%;
			background-size: 7% 65%;
		}
		.btn{
			display: block;
			height: 0.88rem;
			width: 90%;
			margin: 0 auto;
			background: #5F6BE4;
			border:0 none;
			color: #FFFFFF;
			border-radius: 0.44rem;
			font-size: 0.36rem;
			outline: none;
		}
		.border a{
			text-align: center;
			display: block;
			margin-top: 0.3rem;
			color: #666666;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>登录</h1>
				<a href="<?php echo url('login/register'); ?>">立即注册</a>
			</div>
			<div class="divbody"><img src="/static/index/img/sj9.png"></div>
			<div class="border">
				<form action="" method="post" id="login-form">
					<input type="number" name="us_tel" placeholder="请输入手机号"/>
					<input type="password" name="us_pwd" placeholder="请输入密码"/>
					<button class="btn" onclick="return login()" type="submit">登陆</button>
				</form>
				<a href="<?php echo url('login/forget'); ?>">忘记密码</a>			
			</div>			
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			function login(){
			    $.post('<?php echo url("login/doLogin"); ?>',$('#login-form').serialize()).success(function(data){
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

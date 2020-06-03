<?php /*a:1:{s:62:"D:\phpStudy\WWW\szsc\application\index\view\user\mydetail.html";i:1533549509;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>个人资料-编辑</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	
	<style>
		.header span{
			position: absolute;
			top: 0.5rem;
			right: 0.3rem;
			font-size: 0.28rem;
		}
		body{
			background: #f7f7f7;
		}
		p,span{
			color: #131414;
		}
		
		.content{
			width: 93%;
			margin: 0 auto;
			border-radius: 0.12rem;
		}
		.content label span{
			display: inline-block;
			width: 25%;
			color: #333333;
			font-size: 0.3rem;
			margin-left: 3%;
		}
		.content label:nth-child(1){
				margin-top: 0.5rem;
				height: 1.2rem;
				line-height: 1.2rem;
			}
		.content label{
				width: 100%;
				background: #FFFFFF;
				display: block;
				height: 1rem;
				line-height: 1rem;
				border-bottom: 0.01rem solid gainsboro;
				
		}
		.content label input{
			    height: 90%;
				border: none;
			}
		.content label input[type=button]{
			background: none;
			color: #5F6BE4;
			font-size: 0.26rem;
		}
		.content label .file{
			width: 0.7rem;
			height: 0.7rem;
			border-radius: 50%;
			margin: -1.25rem 0 0 85%;
			position: relative;
		}
		.content label .file input{
			width: 100%;
			height: 100%;
			position: absolute;
			right: 0.5rem;
			top: 0.4rem;
			opacity: 0;
		}
		.content label .file img{
			position: absolute;
			width: 100%;
			height: 100%;
		}
		.content label p{
			float: right;
			margin-right: 0.3rem;
		}
		.content label img{
			float: right;
			margin:0.35rem  0.3rem 0 0;
			width: 0.19rem;
			height: 0.36rem;
		}
		.content label:last-child{
			border-bottom: none;
			margin-top: 0.5rem;
			border-radius: 0.12rem;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('user/index'); ?>"><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>个人资料</h1>
				<span onclick="window.location='<?php echo url('user/edit'); ?>'">编辑</span>
			</div>
			<div class="content">
				<label for=""><span>头像</span>
					<div class="file">
						<img src="<?php echo htmlentities($info['us_head_pic']); ?>"/>
						<input type="file" name="" id="" value="" disabled="disabled"/>						
					</div>
				</label>
				<label for=""><span>会员名字</span><p><?php echo htmlentities($info['us_nickname']); ?></p></label>
				<label for=""><span>手机号</span><p><?php echo htmlentities($info['us_tel']); ?></p></label>
				<label for=""><span>银行卡</span><p><?php echo htmlentities($info['bank_account']); ?></p></label>
				<label for=""><span>支付宝账号</span><p><?php echo htmlentities($info['ali_account']); ?></p></label>
				<label for=""><span>微信账号</span><p><?php echo htmlentities($info['we_account']); ?></p></label>
				<label for="" style="border-bottom: none;" onclick="window.location.href='<?php echo url('login/logout'); ?>'"><span>退出</span><img src="/static/index/img/qianjin.png"/></label>
				<!-- <label for="" onclick="window.location.href='<?php echo url('user/changePwd'); ?>'"><span>修改密码</span><img src="/static/index/img/qianjin.png"/> -->
					<label for="" onclick="window.location.href='<?php echo url('login/forget'); ?>'"><span>修改密码</span><img src="/static/index/img/qianjin.png"/></label>
			</div>
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
	</body>
</html>

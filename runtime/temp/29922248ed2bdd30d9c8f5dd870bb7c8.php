<?php /*a:1:{s:64:"D:\phpStudy\WWW\szsc\application\index\view\user\user_mains.html";i:1533379237;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>对方概括</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style type="text/css">
		body{
			background: #f7f7f7;
		}
		.header{
	      	background: #5F6BE4;
			height: 1.29rem;
            position: relative;		
            box-shadow:0.01rem 0 0.05rem rgba(161,161,161,0.3);	
		}
		.header h1{
			color: #FFFFFF;
		}
		.jy_content{
			margin-top: 0.2rem;
			height: 7.19rem;
			background: #FFFFFF;
			overflow: hidden;
		}
		.jy_content>.img{
			width: 1.8rem;
			height: 1.8rem;
			border-radius: 50%;
			overflow: hidden;
			margin: 0.4rem auto 0.7rem auto;
		}
		.jy_content>.img img{
			width: 100%;
			height: 100%;
		}
		.jy_content>ul{
			width: 75%;
			margin: 0 auto;
		}
		.jy_content>ul li{
			height: 0.7rem;
			line-height: 0.7rem;
			display: flex;
			border-bottom: 0.01rem solid rgba(244,244,244,1);
			padding-bottom: 0.2rem;
		}
		.jy_content>ul li p {
			width: 70%;
			text-align: right;
		}
		.jy_content>ul li span {
			width: 30%;
			text-align: left;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>对方概括</h1>
				<a href="<?php echo url('user/myTeam'); ?>"><img src="/static/index/img/houtui_bai.png"/></a>
			</div>
			<div class="jy_content">
				<div class="img">
					<img src="/static/index/img/sj9.png"/>
				</div>
				 <ul>
				 	<li><span>姓名</span><p><?php echo htmlentities($info['us_nickname']); ?></p></li>
				 	<li><span>账号</span><p><?php echo htmlentities($info['us_account']); ?></p></li>
				 	<li><span>手机号</span><p><?php echo htmlentities($info['us_tel']); ?></p></li>
				 	<li><span>银行卡</span><p><?php echo htmlentities($info['bank_account']); ?></p></li>
				 	<li><span>直推时间</span><p><?php echo htmlentities($info['us_add_time']); ?></p></li>
				 </ul> 																
			</div>					
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
	</body>
</html>

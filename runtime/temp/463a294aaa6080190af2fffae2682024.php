<?php /*a:1:{s:62:"D:\phpStudy\WWW\szsc\application\index\view\user\applymsg.html";i:1533781054;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>申请状态页面</title>
	</head>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			
		}
		
		.sq{
			width: 100%;
			height: 100%;
			box-shadow:0px 0px 10px rgba(228,239,244,0.6);
			border-radius:.2rem;
			position: absolute;
			top: 0;
		}
		.sq p{
			width: 4rem;
			height: 1rem;
			border-radius: 0.2rem;
			background: rgba(0,0,0,0.6);
			font-size: 0.3rem;
			color: #FFFFFF;
			text-align: center;
			line-height: 1rem;
			position: absolute;
			top: 35%;
			left: 24%;
		}
		
	</style>
	<body>
		<?php if($code == 1): ?>
		<div class="sq">
			<p onclick="window.location=''">您的申请已在审批中</p>
		</div>
		<?php else: ?>
		<div class="sq">
			<p onclick="window.location=''">您已是商家，无需提交申请</p>
		</div>
		<?php endif; ?>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script>
			function go(){
				window.location = '<?php echo url('user/index'); ?>';
			}
			setTimeout('go()',3000);
			
			
		</script>
	</body>
</html>

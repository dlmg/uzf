<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\user\apply.html";i:1533696270;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>申请成为商家</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style>
		.content label span{
			display: inline-block;
			width: 25%;
			color: #333333;
			font-size: 0.3rem;
		}
		.content label:nth-child(1){
			margin-top: 0.5rem;
		}
		.content label{
			display: block;
			height: 1rem;
			margin-left: 0.3rem;
			border-bottom: 0.01rem solid rgba(206,206,206,1);
			line-height: 1rem;
		}
		.content label input{
			height: 90%;
			width: 70%;
			border: none;
			text-indent: 5%;
		}
		.content>div{
			margin:0.5rem 0 0 0.3rem;
		}
		.content textarea{
			display: block;
			border: none;
		}
		button{
			position: fixed;
			width: 90%;
			height: 0.88rem;
			background: #5F6BE4;
			border: none;
			border-radius: 0.15rem;
			color: #FFFFFF;
			font-size: 0.32rem;
			bottom: 0.5rem;
			left:5%;
		}		
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('user/index'); ?>"><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>申请成为商家</h1>
			</div>
			<form method="post" id="apply-form">
				<div class="content">
					<label for=""><span>身份证账号</span><input type="text" name="us_id_card" placeholder="填写身份证号" /></label>
					<label for=""><span>真实姓名</span><input type="text" name="us_name" placeholder="填写真实姓名" /></label>
					<label for=""><span>所在地区</span><input type="text" name="us_apply_addr" placeholder="请输入你所在的省/市/区" /></label>
					<label for=""><span>联系电话</span><input type="number" name="us_apply_tel" placeholder="填写联系电话" /></label>
					<div>
						<span>申请理由</span>
						<textarea name="us_reason" rows="15" cols="43"></textarea>						
					</div>
				</div>
			</form>
			<button class="btn" onclick="return apply()">提交</button>			
		</div>				
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			function apply(){
			    $.post('<?php echo url("user/doApply"); ?>',$('#apply-form').serialize()).success(function(data){
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

<?php /*a:1:{s:58:"D:\phpStudy\WWW\szsc\application\index\view\user\edit.html";i:1533976124;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>个人资料-完成</title>
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
			margin: -1.2rem 0 0 45%;
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
		.content label input{
			float: right;
			margin-right: 0.3rem;
		}
		.content label img{
			float: right;
			margin:0.3rem  0.3rem 0 0;
			width: 0.19rem;
			height: 0.36rem;
		}
		.content label:last-child{
			border-bottom: none;
			margin-top: 0.5rem;
			border-radius: 0.12rem;
		}
		
		.fgx{
			width: 100%;
			height: 100%;
			background: rgba(10,11,11,1);
			opacity: 0.3;
			position: absolute;
			top: 0;
			left: 0;
			display: none;
		}

	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('user/mydetail'); ?>"><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>个人资料</h1>
				<span onclick="return doedit()">完成</span>
			</div>
			<form method="post" id="edit-info-form">
			<div class="content">
				<label for=""><span>头像</span>
					<div class="file" >
						<img src="<?php echo htmlentities($info['us_head_pic']); ?>"/ class="us_head_pic" >
						<input type="file" name="file" onchange="eee($(this))"  >
					</div>
				</label>
				<label for=""><span>会员名字</span><input type="text" name="us_nickname" value="<?php echo htmlentities($info['us_nickname']); ?>"></label>
				<label for=""><span>手机号</span><input type="text" name="us_tel" value="<?php echo htmlentities($info['us_tel']); ?>" readonly="readonly"></label>
				<label for=""><span>银行卡</span><input type="text" name="bank_account" value="<?php echo htmlentities($info['bank_account']); ?>"></label>
				<label for=""><span>支付宝账号</span><input type="text" name="ali_account" value="<?php echo htmlentities($info['ali_account']); ?>"></label>
				<label for=""><span>微信账号</span><input type="text" name="we_account" value="<?php echo htmlentities($info['we_account']); ?>"></label>
				<label for="" style="border-bottom: none;" onclick="window.location.href='<?php echo url('login/logout'); ?>'"><span>退出</span><img src="/static/index/img/qianjin.png"/></label>
				<!-- <label for="" onclick="window.location.href='<?php echo url('user/changePwd'); ?>'"><span>修改密码</span><img src="/static/index/img/qianjin.png"/> -->
					<label for="" onclick="window.location.href='<?php echo url('login/forget'); ?>'"><span>修改密码</span><img src="/static/index/img/qianjin.png"/></label>
			</div>
			<input type="hidden" name="us_head_pic" value="">
			</form>			
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script>
			function doedit(){
			    $.post('<?php echo url("user/doedit"); ?>',$('#edit-info-form').serialize()).success(function(data){
			    	layer.msg(data.msg);
			    	if(data.code){
			    		setTimeout(function(){
			    			location.href = '<?php echo url("user/mydetail"); ?>';
			    		},1000);
			    	}
			    });
			    return false;
			}	
			function eee(dada) {
		        var data = new FormData();
		        data.append('file', dada[0].files[0]);
		        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
		        $.ajax({
		            url: '<?php echo url("upload"); ?>',
		            type: 'POST',
		            data: data,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success: function(data) {
		                layer.msg(data.msg);
		                if (data.code) {
		                    $('.us_head_pic').attr('src',data.data);
		                    $('input[name="us_head_pic"]').val(data.data);
		                }
		                layer.close(index);
		            },
		            error: function() {
		                layer.close(index);
		                layer.msg('上传出错');
		            }
		        });
		    }										
		</script>
	</body>
</html>

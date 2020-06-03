<?php /*a:1:{s:62:"D:\phpStudy\WWW\szsc\application\index\view\order\voucher.html";i:1533978855;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>上传凭证</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/flow_path.css"/>
	<style>
		.account ul{
				width: 93%;
				margin: 0.3rem auto 0 auto;
		} 
		.account ul li{
		   padding-bottom: 0.2rem;
		}
		.account ul li span{
			color: #999999;
			font-size: 0.26rem;
		}
		.account ul li span,.account ul li p{
			line-height: 0.6rem;
		}
		.file{
			width: 1.5rem;
			height: 1.5rem;
			position: relative;	
			color: #5F6BE4;
			border: 0.02rem solid #5F6BE4;
			margin-top: 0.5rem;
		}
		.file img{
			width: 100%;
			height: 100%;
			opacity: 0;
		}
		.file p{
			font-size: 1.5rem;
			text-align: center;
			position: absolute;
			top: 0.25rem;
			left: 0.25rem;
		}
		.file input{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			opacity: 0;
		}
		button{
			width: 2rem;
			height: 0.7rem;
			background: #5F6BE4;
			color: #FFFFFF;
			border-radius: 0.35rem;
			margin-top: 0.4rem;
			margin-left: 0.2rem;
			border: none;
			outline-style: none;
		}
	</style>
	<body>
	 	<div>
	 		<div class="header">
	 			<div class="header">
					<a href="javascript:void(0)" onclick='javascript:history.back(-1)'><img src="/static/index/img/houtui_bai.png"/></a>
					<h1>上传凭证</h1>
				</div>
	 		</div>
	 		<form method="post" id="voucher-form">
		 		<div class="account">
		 			<ul>
		 				<li>
		 					<h1>开户银行</h1>
		 					<span><?php echo htmlentities($data['bank_name']); ?></span>
		 				</li>
		 				<li>
		 					<h1>银行账户</h1>
		 					<span><?php echo htmlentities($data['bank_num']); ?></span>
		 				</li>
		 				<li>
		 					<h1>收款人</h1>
		 					<span><?php echo htmlentities($data['bank_person']); ?></span>
		 				</li>
		 				<li>
		 					<h1>开户行地址</h1>
		 					<span><?php echo htmlentities($data['bank_addr']); ?></span>
		 				</li>
		 				<li>
		 					<h1>上传凭证</h1>
		 					<div class="file">
		 						<div class="pic">
	                    		</div>
	                    		<img src="" class="or_voucher"><p>+</p>
		 						<input type="file" name="file" onchange="eee($(this))"  >
		 					</div>
		 					<input type="hidden" name="or_voucher" value="">
		 					<input type="hidden" name="or_id" value="<?php echo htmlentities($data['or_id']); ?>">
		 				</li>
		 			</ul>	 				 			
		 		</div>
		 	</form>	 			 			 		
	 	</div>
		<button onclick="subVoucher()">提交</button>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>

		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>


		<script type="text/javascript" src="/static/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
		<script type="text/javascript">
			function eee(dada) {
		        var data = new FormData();
		        data.append('file', dada[0].files[0]);
		        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
		        $.ajax({
		            url: '<?php echo url("user/upload"); ?>',
		            type: 'POST',
		            data: data,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success: function(data) {
		                layer.msg(data.msg);
		                if (data.code) {
		                    $('.or_voucher').attr('src',data.data);
		                    $('input[name="or_voucher"]').val(data.data);
		                    $('.file').css('border','none');
		                     $('.file img').css('opacity','1');
		                    $('.file>p').text('');
		                }
		                layer.close(index);
		            },
		            error: function() {
		                layer.close(index);
		                layer.msg('上传出错');
		            }
		        });
		    }
		    function subVoucher(){
		    	$.post('<?php echo url("order/subVoucher"); ?>',$('#voucher-form').serialize()).success(function(data){
		    		layer.msg(data.msg);
		    		if(data.code){
		    			location.href = "<?php echo url('order/orderList'); ?>?or_status="+1;
		    		}
		    	});
		    }	
		</script>
	</body>
</html>

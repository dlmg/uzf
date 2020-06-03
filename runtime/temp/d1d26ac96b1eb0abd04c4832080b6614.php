<?php /*a:1:{s:67:"D:\phpStudy\WWW\szsc\application\index\view\cart\cart_to_order.html";i:1534406800;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>确认订单</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/flow_path.css"/>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			font-size: 0.28rem;
			text-decoration: none;
			list-style: none;
			font-family: myfirstfont,"微软雅黑";
			outline-style:none ;         /* //让button框选中时没有边框*/
		}
		@font-face {
			font-family:myfirstfont;
			src: url('/static/index/img/Heavy_0.ttf');
		}
		body{
			background: #f7f7f7;
		}
		.body_header{
			position: relative;
			background: #FFFFFF;
			padding: 0.1rem 0 0.3rem 0;
		}
		.body_header ul li>img{
			width: 0.24rem;
			height: 0.26rem;
			margin: 0.65rem 0 0 0;
		}
		.body_header ul{
			width: 90%;
			height: 1rem;
			display: flex;
			margin: 0 auto;
		}
		.body_header ul li{
			width: 50%;
			display: flex;
			line-height: 1rem;
		}
		.body_header ul li:nth-child(1){
			width: 10%;
		}
		.body_header ul li:nth-child(3){
			text-align: right;
			text-indent: 35%;
		}
		.body_header>p{
			width: 70%;
			display: block;
			margin-left: 13%;
		}
		.body_header>img{
			width: 0.12rem;
			height: 0.22rem;
			position: absolute;
			top: 0.8rem;
			right: 0.4rem;
		}
		/**/
		.body_content{
			padding-bottom: 0.5rem;
		}
		.body_content h1{
			height: 0.75rem;
			line-height: 0.75rem;
			width: 100%;
			padding: 0 0 0 0.3rem;
			background: #FFFFFF;
			margin-top: 0.3rem;
			font-size: 0.28rem;
		}
		.body_content dl{
			background: rgba(247,247,247,1);
			display: flex;
		}
		.body_content dl dt{
			width: 1.38rem;
			height: 1.23rem;
			margin: 0.45rem 0 0 0.6rem;
		}
		.body_content dl dd{
			margin: 0.3rem 0 0 0.3rem;
		}
		.body_content dl dt img{
			width: 100%;
			height: 100%;
		}
		.body_content dl ul li p{
			color: #909293;
			width: 50%;
			margin-top: 0.2rem;
			line-height: 0.3rem;
			font-size: 0.24rem;
		}
		.body_content dl ul li p span{
			font-size: 0.24rem;
		}
		/*shopp*/
		.body_shopp{
		/*	margin-bottom: 0.8rem;*/
			background: #FFFFFF;
			height: 7rem;
		}
		.body_shopp label{
			display: flex;
			height: 1.1rem;
			
		}
		.body_shopp label span{
			width: 40%;
		}
		.body_shopp label p{
			width: 80%;
		}
		.body_shopp label span,
		.body_shopp label p{
			padding: 0rem 0.6rem;
			line-height: 1.1rem;
		}
		.body_shopp label p{
			text-align: right;
		}
		.body_shopp label input{
			border: none;
			width: 65%;
		}
		/**/
		.foot{
			width: 100%;
			height: 1.5rem;
			display: flex;
			background: #FFFFFF;
			position: fixed;
			bottom: 0;
			border-top: 0.01rem solid ghostwhite;
		}
		.foot p{
			width: 70%;
			font-size: 0.28rem;
			text-align: right;
			padding-right: 0.5rem;
			line-height: 1.5rem;
		}
		.foot p span{
			color: #C81616;
		}
		.foot button{
			width: 2rem;
			height: 0.7rem;
			background: #5F6BE4;
			color: #FFFFFF;
			border-radius: 0.35rem;
			margin-top: 0.4rem;
			border: none;
			outline-style: none;
		}	
		/*支付*/
		.pay{
			width: 80%;
			height: 4.22rem;
			background: #FFFFFF;
			overflow: hidden;
			border-radius: 0.1rem;
			position: fixed;
			top: 40%;
			left: 10%;
			z-index: 10;
			display: none;
		}
		.pay_header{
			width: 2.33rem;
			height: 0.34rem;
			margin: 0.3rem auto;
		}
		.pay_header>img{
			width: 100%;
			height: 100%;
		}
		/**/
		.tab{
			margin: 0.6rem 0;
			display: flex;
		}
		.radio{
			width: 50%;
			position: relative;
		}
		.radio:nth-child(1){
			text-align: right;
			padding-right: 0.3rem;
		}
		.radio:nth-child(2){
			text-align: left;
			padding-left: 0.3rem;
		}
		.radio input[type=radio]{
			position: absolute;
			width: 0.31rem;
			height: 0.31rem;
			opacity: 0;
			top: 0.05rem;
		}
		.radio input[type='radio'] + label::before{
			content: '\a0';
			display: inline-block;
			vertical-align: middle;
			font-size: 0.6rem;
			width: 0.4em;
			height: 0.4em;
			margin-right: .4em;
			border-radius: 50%;
			border: 0.01rem solid #5F6BE4;
			line-height: 1;
		}
		.radio input[type='radio']:checked +label::before{
			background:  #5F6BE4;
			  background-clip: content-box;
			  padding: .1em;
		}
		.pay_foot{
			width: 100%;
			height: 0.98rem;
			background: #5F6BE4;
			position: absolute;
			bottom: 0;
		}
		.pay_foot button{
			width: 100%;
			height: 100%;
			border: none;
			background: none;
			color: #FFFFFF;
			font-size: 0.36rem;
		}
		.pay>img{
			width: 0.48rem;
			height: 0.48rem;
			right: 0.3rem;
			top: 0.1rem;
			position: absolute;
		}
		  .fgx{
		    	width: 100%;
		    	height: 100%;
		    	background: rgba(0,0,0,0.6);
		    	position: absolute;
		    	top: 0;
		    	left: 0;
		    	display: none;
		    }
		    .text_hidden{
			-webkit-line-clamp:1;
			line-height:.4rem;
			text-overflow: ellipsis;
			overflow: hidden;
			display: -webkit-box;
			-webkit-box-orient: vertical;
			font-size:.25rem;
			}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>确认订单</h1>
				<a href="javascript:void(0)" onclick='javascript:history.back(-1)'><img src="/static/index/img/houtui_bai.png"/></a>
			</div>
			<div class="body">
				<!--收货详情-->
				<div class="body_header" onclick="window.location.href='<?php echo url('user/myaddr'); ?>?pd_id=<?php echo htmlentities($ids); ?>'">
					<ul>
						<li><img src="/static/index/img/wode-4.png"/></li>
						<li><p>收货人 ：</p> <span><?php echo htmlentities($addr['addr_receiver']); ?></span></li>
						<li><h3><?php echo htmlentities($addr['addr_tel']); ?></h3></li>
					</ul>
					<p>收货地址 ：<span><?php echo htmlentities($addr['addr_addr']); ?><?php echo htmlentities($addr['addr_detail']); ?></span></p>
					<img src="/static/index/img/qianjin.png"/>
				</div>
				<!--旗舰店-->
				<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="body_content">
					<h1><?php echo htmlentities($vo['pd_name']); ?></h1>
					<dl>
						<dt><img src="<?php echo htmlentities($vo['pd_pic']['0']); ?>"/></dt>
						<dd>
							<ul>
								<li style="font-size: 0.24rem;" class="text_hidden"><?php echo htmlentities($vo['pd_content']); ?></li>
								<li><p>颜色分类：<span><?php echo htmlentities($vo['pd_type']); ?></span></li>
								<li style="display: flex;"><p style="color: #CD1C1C;" >￥<?php echo htmlentities($vo['pd_price']); ?></p> <p style="text-align: right;">✖<?php echo htmlentities($vo['pd_num']); ?></p></li>
							</ul>
						</dd>						
					</dl>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<!--购买方式-->
				<form action="" method="post" id="login-form">
				<div class="body_shopp">					
					<label for=""><span>买家留言</span><input type="text" id="or_remark" name="or_remark" placeholder="填写备注留言或者信息"/></label>	
					<input type="hidden" name="cart_ids" value="<?php echo htmlentities($ids); ?>" >
					<input type="hidden" name="addr_id" value="<?php echo htmlentities($addr['id']); ?>" id="addr_id">
				</div>
				</form>
			</div>
						
			<div class="foot">
				<p>合计金额 :  ￥<span class="money"><?php echo htmlentities($allfee); ?></span></p>
				<!-- <button >提交订单</button> -->
				<button onclick="subOrder()">提交订单</button>
				<input type="hidden" name="or_id"  id="or_id">
			</div>
			<!--hide-->
			<div class="pay">
				<img src="/static/index/img/guanbi.png"/>
				 <div class="pay_header">
				 	 <img src="/static/index/img/pay.png"/>
				 </div>
				 <div class="tab">
				 		<div class="radio">
				 			<input type="radio" value="1" name="zhifu" checked="checked" />
				 			<label for="">积分支付</label>
				 		</div>
				 		<div class="radio">
				 			<input type="radio" value="2" name="zhifu" />
				 			<label for="">线下支付</label>
				 		</div>
				 </div>
				 <div class="pay_foot">
				 	 <button onclick="pay()">确认支付</button>
				 </div>
			</div>
			
			<div class="fgx"></div>
		</div>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script>
			$(function(){
				var btn = $('.foot>button');
				var img = $('.pay>img');
				btn.click(function(){
					$('.pay').show(500);
					$('.fgx').fadeIn(500);
				})
				img.click(function(){
					$('.pay').hide(500);
					$('.fgx').fadeOut(500);
				})
				
			})
			$("#pd_num").bind("input propertychange change",function(event){
				(function(){
					var num = $('#pd_num').val();
					var price = $('#pd_price').val();
					var fee = $('#take_fee').val();
					var allfee = accMul(num,price) ;
					var allfee = accAdd(allfee,fee);
					$(".money").html(allfee);
				})()				
			});
			/**
			 * 加法
			 * @param arg1
			 * @param arg2
			 * @returns {Number}
			 */
			function accAdd(arg1,arg2){
			    var r1,r2,m;
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
			    m=Math.pow(10,Math.max(r1,r2))
			    return (arg1*m+arg2*m)/m
			}
			/**
			 * 乘法
			 */
			function accMul(arg1,arg2) {
			    var m=0,s1=arg1.toString(),s2=arg2.toString();
			    try{m+=s1.split(".")[1].length}catch(e){}
			    try{m+=s2.split(".")[1].length}catch(e){}
			    return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
			}
			function subOrder(){
			    $.post('<?php echo url("cart/doToOrder"); ?>',$('#login-form').serialize()).success(function(data){
			    	layer.msg(data.msg);
			    	if(data.code){
			    		$('#or_id').val(data.data);
			    	}
			    });
			    return false;
			}
			function pay(){
				var or_id = $('#or_id').val();
				var paytype = $('.pay input[name = "zhifu"]:checked').val();
				if(paytype == 1){
					$.ajax({
						type: "post",
						url: "<?php echo url('order/payBybi'); ?>",
						data: {or_id:or_id},
						success:function(data){
							layer.msg(data.msg);
							if(data.code){
								setTimeout(function(){
									location.href = "<?php echo url('order/orderList'); ?>?or_status=1";
								},500);
							}
						}
					});
				}else{
					location.href = "<?php echo url('order/voucher'); ?>?or_id="+or_id;
				}
			}			
		</script>
	</body>
</html>

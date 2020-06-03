<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\cart\index.html";i:1534753334;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>购物车</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/flow_path.css"/>
	<style type="text/css">
		body{
			background: #FFFFFF;
		}
		.header a{
			font-size: 0.32rem;
			position: absolute;
			top: 0.45rem;
			z-index: 999;
			right: 0.5rem;
			color: #FFFFFF;
		}
		.content ul{
			background: #FFFFFF;
			display: block;
			position: relative;
		}
		.content ul li{
			position: relative;
			border-bottom: 0.01rem solid ghostwhite;
		}
		.content ul li>div{
			display: inline-block;
		}
		.content ul li>.li_wz{
			width: 65%;
			margin: 0.3rem 0 0 30%;
		}
		.content ul li>.li_wz p{
			font-size: 0.28rem;
		}
		.content ul li>.li_wz span{
			font-size: 0.22rem;
			color: #7E8081;
		}
		.content ul li>.li_wz #time{
			display: block;	
			color:#CE1919;
		}
		.content ul li span{
			color: #FB2424;
		}
		.li_img{
			width:1.46rem;
			height: 1.46rem;
			position: absolute;
			top: 0.8rem;
			left: 0.5rem;
		}
		img{
			width: 100%;
			height: 100%;
		}
		/**/
		.li_xuanze img{
			width: 0.28rem;
			height: 0.3rem;
			position: absolute;
			top: 0.3rem;
			left: 0.3rem;
			z-index: 10;
		}
		.li_xuanze{
			overflow: hidden;
			width: 0.48rem;
			height: 0.48rem;
			position: absolute;
			border-radius: 50%;
			bottom: 0.8rem;
			left: 0.5rem;
			/*border: 0.01rem solid #5F6BE4;*/
		}

		.li_xuanze input[type=checkbox]{
			position: absolute;
			width: 0.4rem;
			height: 0.4rem;
			opacity: 0;
			top: 0.05rem;
		}
		.li_xuanze input[type='checkbox'] + label::before{
			content: '\a0';
			display: inline-block;
			vertical-align: middle;
			font-size: 0.6rem;
			width: 0.4em;
			height: 0.4em;
			margin-right: .3em;
			border-radius: 50%;
			border: 0.01rem solid #5F6BE4;
			line-height: 1;
		}
		.li_xuanze input[type='checkbox']:checked +label::before{
			background:  #5F6BE4;
			  background-clip: content-box;
			  padding: .05em;
		}
		.li_xuanze img:nth-child(1){
			display: none;
		}
		.li_wz ul{
			width: 18%;
			display: flex;
			margin: 0.3rem 0;
		}
		.li_wz ul li{
			width: 100%;
		}
		#txt{
			width: 0.78rem;
			height: 0.48rem;
 			line-height: 0.48rem;			
			text-align: center;
		}
		.li_wz input{
			width: 0.78rem;
			height: 0.48rem;
			border: none;
			background: none;
			border: 0.01rem solid rgba(238,238,238,1);
			text-align: center;
		}
		.li_wz input[type=text]{
			
		}
		.li_wz label{
			display: flex;
			color: #CE1919;
			height: 0.8rem;
			line-height: 0.8rem;
		}
		/*底部商城*/
 		.foot{
				width: 100%;
				height: 0.98rem;
				background: #FFFFFF;
                overflow: hidden;		
                position: fixed;	
                bottom: 0;
                border-top: 0.01rem solid rgba(159,164,166,0.28);
                /*box-shadow:0px 0px 2px rgba(159,164,166,0.28);*/
			}
		.foot  ul{
				display: flex;
			}
		.foot ul li {
				width: 25%;
				text-align: center;
				color: #161515;
				font-size: 0.24rem;
				margin-top: 0.15rem;
			}
		.foot ul li>div{
				height: 0.44rem;
			}
		.foot ul li p{
				font-size: 0.24rem;
				width: 100%;
				text-align: center;
		}
		/*全选部分*/
		.all_xuan{
		    width: 100%;
			position: fixed;
			height: 0.8rem;
			bottom: 0.98rem;
		}
		 .anniu_img{
		 	width: 0.3rem;
		 	height: 0.3rem;
		 	position: relative;
		 	display: inline-block;
		 }
		 .anniu_img img{
		 	width: 100%;
		 	height: 100%;
		 	position: absolute;
		 	top: -100%;
		 	left: 100%;
		 }
		 .heji{
		 	width: 75%;
		 	display: inline-block;
		 	background: #FFFFFF;
		 	padding: 0 0.3rem;
		 }
		 .heji label{
		 	display: flex;
		 	float: right;
		 	line-height: 0.8rem;
		 }
		 .heji button{
		 	width: 1.89rem;
		 	height: 0.76rem;
		 	background: #5F6BE4;
		 	color: #FFFFFF;
		 	font-size: 0.32rem;
		 	border: none;
		 	margin-left: 30%;
		 	position: absolute;
		 	right: 0;
		 	z-index: 0;
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
			.del{
		 	height: 1rem;
		 	border-bottom: 0.01rem solid rgba(247,247,247,1);
		 }
		 .del button{
		 	width: 1.02rem;
		 	height: 0.44rem;
		 	border: 0.01rem solid #5F6BE4;
		 	background: none;
		 	color: #5F6BE4;
		 	font-size: 0.22rem;
		 	border-radius: 0.22rem;
		 	float: right;
		 	margin:0.1rem 0.3rem 0 0 ;
		 }
		 .content{
		 	padding-bottom: 1.4rem;
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
	</style>
	<body>
		<div>
			<div class="header">
				<h1>购物车</h1>
				<img src="/static/index/img/houtui_bai.png" onclick='javascript:history.back(-1)'/>
				<!-- <a href="shopptwo.html">管理</a> -->
			</div>
			<div class="content">
			<ul>
				<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li>
					<div class="li_xuanze">						
						<input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" checked="checked" name="okcart" onclick="okcart()" />
						<label for="">
						</label>						
					</div>
					<div class="li_img">
						<img src="<?php echo htmlentities($vo['pd_pic']['0']); ?>"/>
					</div>
					<div class="li_wz">
						<p><?php echo htmlentities($vo['pd_name']); ?></p>
						<span><?php echo htmlentities($vo['pd_type']); ?></span>
						<span><?php echo htmlentities($vo['pd_spec']); ?></span><br>
						<span class="text_hidden"><?php echo htmlentities($vo['pd_content']); ?></span>
						<label for="">￥<p id="time"><?php echo htmlentities($vo['pd_price']); ?></p></label>						
							<span><?php echo htmlentities($vo['pd_sales']); ?>人付款</span>&nbsp;&nbsp;	
							<span>运费：<?php echo htmlentities($vo['take_fee']); ?></span>												
						<time></time>	
						<ul>
							<li><input type="button" onclick="cutnum(<?php echo htmlentities($vo['id']); ?>,<?php echo htmlentities($vo['pd_num']); ?>)" value="-"></li>
							<li><input type="text" id="txt" class="pdnum" value="<?php echo htmlentities($vo['pd_num']); ?>"/></li>
							<li><input type="button" onclick="addnum(<?php echo htmlentities($vo['id']); ?>)" value="+" ></li>
							<!-- <div class="del">
								<button onclick="delcart(<?php echo htmlentities($vo['id']); ?>)">删除</button>
							</div> -->
						</ul>
						</label>
					</div>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>				
			</ul>
		</div>		
		<div class="all_xuan">
			<!-- <div class="anniu_img">
				<img src="/static/index/img/shouhuo-5.png"/>
				<img src="/static/index/img/shouhuo-2.png"/>
			</div> -->
			<div class="heji">
				<label for="">
					<span class="money1" style="font-size: 0.28rem;">合计：</span>
					<span class="money2" style="color: #DC2F2F;font-size: 0.22rem;">￥</span>
					<p class="money" style="color: #DC2F2F;font-size: 0.22rem;">0</p></label>
					<button onclick="subCart()">结算</button>
			</div>			
		</div>
			<div class="foot">
			<ul>
				<li onclick="window.location.href='<?php echo url('index/index'); ?>'">
					<div>
						<img src="/static/index/img/index-1.png"/ style="width: 0.45rem;height: 0.41rem;">
					</div>
					<p>首页</p>
				</li>
				<li onclick="window.location.href='<?php echo url('index/cate'); ?>'">
					<div>
						<img src="/static/index/img/index-2.png"/ style="width: 0.42rem;height: 0.3rem;">
					</div>
					<p>分类</p>
				</li>
				<li onclick="window.location.href='<?php echo url('cart/index'); ?>'">
					<div>
						<img src="/static/index/img/index-10.png"/ style="width: 0.43rem;height: 0.44rem;">
					</div>
					<p>购物车</p>
				</li>
				<li onclick="window.location.href='<?php echo url('user/index'); ?>'">
					<div>
						<img src="/static/index/img/sc8.png"/ style="width: 0.44rem;height: 0.44rem;">
					</div>
					<p class="color">我的</p>
				</li>
			</ul>
		</div>
		<!--hide-->
		<!-- <div class="pay">
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
		<div class="fgx"></div> -->					
	</div>		
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
		$(function(){
			okcart();
			var btn = $('.heji>button');
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
		function cutnum(cart_id,pdnum){
			//alert(pdnum);
			if(pdnum == 1){
				delcart(cart_id);
			}else{
				$.ajax({
					type: "post",
					url: "<?php echo url('cart/cutnum'); ?>",
					data: {cart_id:cart_id},
					success:function(data){
						layer.msg(data.msg);
						if(data.code){
							location.href = '';
						}
					}
				});
			}			
		}
		function addnum(cart_id){
			$.ajax({
				type: "post",
				url: "<?php echo url('cart/addnum'); ?>",
				data: {cart_id:cart_id},
				success:function(data){
					layer.msg(data.msg);
					if(data.code){
						location.href = '';
					}
				}
			});
		}
		function delcart(cart_id){
			layer.confirm('确定要删除吗？',{btn : ['确定','取消']},function(index,layero){
				$.ajax({
					type: "post",
					url: "<?php echo url('cart/delcart'); ?>",
					data: {cart_id:cart_id},
					success:function(data){
						layer.msg(data.msg);
						if(data.code){
							location.href = '';
						}
					}
				});
			});			
		}
		function okcart(){
			var ids = '';
			var cartvalue = $('input[name = "okcart"]:checked');
			cartvalue.each(function(){
				ids += $(this).val()+",";
			})
			//console.log(cartvalue);
			$.ajax({
				type: "post",
				url: "<?php echo url('cart/calculate'); ?>",
				data: {ids:ids},
				success:function(data){
					//layer.msg(data.msg);
					if(data.code){
						//location.href = '';
						$(".money").html(data.msg);
					}
				}
			});			
		}
		function subCart(){
			var ids = '';
			var cartvalue = $('input[name = "okcart"]:checked');
			cartvalue.each(function(){
				ids += $(this).val()+",";
			})
			location.href = "<?php echo url('Cart/cartToOrder'); ?>?ids="+ids;					
		}		
					
		</script>
	</body>
</html>

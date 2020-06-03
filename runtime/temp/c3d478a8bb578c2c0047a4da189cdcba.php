<?php /*a:2:{s:65:"D:\phpStudy\WWW\szsc\application\index\view\order\order_list.html";i:1534406850;s:63:"D:\phpStudy\WWW\szsc\application\index\view\public\_footer.html";i:1533524139;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>我的订单</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/order_whole.css"/>
	<style>
		.body{
			padding-top: 1.28rem;
		}
		.body_dd{
			
			margin-top: 1.1rem;
			background:rgba(255,255,255,1);
			padding-bottom: 0.2rem;
		}
		.body_dd .gongji{
			text-align: right;
			padding: 0.15rem 0;
			margin-right: 0.5rem;
		}
		.body_dd>button{
			width: 1.38rem;
			height: 0.43rem;
			border-radius: 0.22rem;
			font-size: 0.22rem;
			color: #5F6BE4;
			border: 0.02rem solid #5F6BE4;
			background: none;
			margin-left:79% ;
			margin-top:3% ;
		}
		
		.body_xq{
			height: 1.93rem;
			border-top: 0.01rem solid gainsboro;
			display: flex;
		}
		.body_xq img{
			margin: 0.3rem 0 0 0.3rem;
			width: 1rem;
			height: 0.87rem;
		}
		.body_xq ul{

			width: 80%;
		}
		.body_xq ul li{
		  height: 0.4rem;
		  margin-left: 5%;	
		}
		.body_xq ul li:nth-child(1){
			 margin-top: 5%;
			font-size: 0.22rem;
		}
		.body_xq ul li:nth-child(2),.body_xq ul li:nth-child(3){
			font-size: 0.2rem;
			color:#878A8C ;
		}
		.body .tab{
			width: 100%;
			position: absolute;
			
		}
		 .tishi{
			width: 2.96rem;
			height: 1.4rem;
			background:rgba(0,0,0,0.6);
			position: fixed;
			top: 50%;
			left: 30%;
			border-radius: 0.2rem;
			display: none;
		}
		.tishi img{
			width: 0.74rem;
			height: 0.49rem;
			display: block;
			margin:0.2rem auto;
		}
		.tishi p{
			text-align: center;
			color: #FFFFFF;
			font-size: 0.28rem;
			display: block;
		}
		/*//待付款*/
		.order_btn{
			display: flex;
			margin-left: 53%;
		}
		.order_btn button{
			width: 1.38rem;
			height: 0.43rem;
			border-radius: 0.22rem;
			font-size: 0.22rem;
			color: #5F6BE4;
			border: 0.02rem solid #5F6BE4;
			background: none;
			margin-left: 5%;
			margin-top:3%;
		}
		.header{
			width: 100%;
			height: 1.28rem;
			background: #5F6BE4;
            position: fixed;		
            box-shadow:0.01rem 0 0.03rem rgba(161,161,161,0.3);	
            top: 0;
            z-index: 10;
		}
		.order_sum{
			margin-left: 15px;
			margin-right: 15px;
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
		#btn_xq{
			width: 1.1rem;
			height: 0.4rem;
			background: none;
			border: 0.01rem solid #5F6BE4;
			border-radius: 0.4rem;
			float: left;
			margin-top: .72rem;
			margin-left: 3%;
			font-size: 0.24rem;
			color: #5F6BE4;
		}
		.body_dd .ddh{
			width: 100%;
			margin-top: .6rem;
		}
		.body_dd .time{
			margin-left: 0.7rem;
			display: inline-block;
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
		.tab_radio{
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
			  padding: .05em;
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
		    	position: fixed;
		    	top: 0;
		    	left: 0;
		    	display: none;
		    }
		
		
	</style>
	<body>
		<div>
			<div class="header">
				<h1>我的订单</h1>
				<img src="/static/index/img/houtui_bai.png" onclick="location.href='<?php echo url('user/index'); ?>' " />
			</div>
			<div class="body">
				<!--切换栏-->
				<div class="body_tab">
					<ul>
						<li class="aaa"><a href="#" onclick="changeMenu(this,8)" class="xuanzhong">全部</a></li>
						<li class="aaa"><a href="#" onclick="changeMenu(this,0)">待支付</a></li>
						<li class="aaa"><a href="#" onclick="changeMenu(this,1)">待发货</a></li>
						<li class="aaa"><a href="#" onclick="changeMenu(this,2)">待收货</a></li>
						<li class="aaa"><a href="#" onclick="changeMenu(this,3)">已完成</a></li>
					</ul>
				</div>				
				<div class="tab">	
					<div class="body_dd">
					<input type="hidden" name="or_type" id="or_type" value="<?php echo htmlentities($or_type); ?>">
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li data-status="<?php echo htmlentities($vo['or_status']); ?>">
							<div class="ddh">
								<p><span class="order_sum">订单号：<?php echo htmlentities($vo['or_num']); ?></span><span class="time"> 时间：<?php echo htmlentities($vo['or_add_time']); ?></span></p>
							</div>
							<?php if(is_array($vo['detail']) || $vo['detail'] instanceof \think\Collection || $vo['detail'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['detail'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
								<div class="body_xq">
									<img src="<?php echo htmlentities($voo['or_pd_pic']['0']); ?>"/>
									<ul>
										<li data-status="<?php echo htmlentities($vo['or_status']); ?>"><?php echo htmlentities($voo['or_pd_name']); ?>
											<p style="float: right;margin-right: 0.3rem;color: #5F6BE4;"><?php echo htmlentities($vo['status_text']); ?></p>
										</li>
										<li data-status="<?php echo htmlentities($vo['or_status']); ?>"><span class="text_hidden">商品描述：<?php echo htmlentities($voo['or_pd_content']); ?></span></li>
										<li data-status="<?php echo htmlentities($vo['or_status']); ?>"><span>￥<?php echo htmlentities($voo['or_pd_price']); ?></span>
										<p style="float: right;margin-right: 0.3rem;">*<?php echo htmlentities($voo['or_pd_num']); ?></p>
										</li>
									</ul>
								</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<button  id="btn_xq" ="btn" onclick="location.href='<?php echo url('order/orderDetail'); ?>?or_id=<?php echo htmlentities($vo['id']); ?>'">订单详情</button>
							<p class="gongji">合计：￥<?php echo htmlentities($vo['total_money']); ?><!-- （含运费0.00） --></p>
							<div class="order_btn">
								<?php if($vo['or_status'] == 0): ?>
										<button onclick="location.href='<?php echo url('order/voucher'); ?>?or_id=<?php echo htmlentities($vo['id']); ?>'">上传凭证</button>
					 					<button class="dopay" onclick="dopay(<?php echo htmlentities($vo['id']); ?>)">付款</button>									
								<?php elseif($vo['or_status'] == 1): ?>
								<!--待发货-->		
								<?php elseif($vo['or_status'] == 2): ?>
										<!-- <button style="color: #242627;border: 0.02rem solid #D2D2D2" onclick="window.location=''">查看物流</button> -->
					 					<button onclick="Igot('<?php echo htmlentities($vo['id']); ?>')">确认收货</button>								
								<?php elseif($vo['or_status'] == 3): endif; ?>
							</div>
						</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>													
				</div>	
				<div class="tishi">
							<img src="/static/index/img/ok.png"/>
							<p>商家已收到提醒</p>
				</div>
			</div>	
			<!--hide-->
			<div class="pay">
				<img src="/static/index/img/guanbi.png"/>
				 <div class="pay_header">
				 	 <img src="/static/index/img/pay.png"/>
				 </div>
				 <div class="tab_radio">
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
				 	 <input type="hidden" name="or_id"  id="or_id">
				 </div>
			</div>
			
			<div class="fgx"></div>		
		</div>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>


		<script type="text/javascript">
			$(function(){
				//支付弹窗
				var btn = $('.dopay');				
				var img = $('.pay>img');
				btn.click(function(){
					//console.log(btn);					
					$('.pay').show(500);
					$('.fgx').fadeIn(500);
					$('body').css('height','100vh').css('overflow','hidden');
				})
				img.click(function(){
					$('.pay').hide(500);
					$('.fgx').fadeOut(500);
					$('body').css('height','100%').css('overflow','');
				})
				//
				var or_type = $('#or_type').val()*1;//*1转化类型
				var list = or_type + 1 ;
				var val = $(".body .body_tab li").eq(list).children('a')[0];
				$(".body .body_tab li").eq(list).children('a').addClass('active').css('color','#5F6BE4');
				changeMenu(val,or_type);
			});
			function changeMenu(obj,type){
				$(obj).addClass("xuanzhong").siblings().removeClass("xuanzhong");
				var list = $('.body_dd li');
				switch(type){
					case 8:
						list.show();
						break;
					case 0:
						$.each(list,function(index,value){
							if($(this).attr('data-status') == 0){
								$(this).show();
							}else{
								$(this).hide();
							}
						});
						break;
					case 1:
						$.each(list,function(index,value){
							if($(this).attr('data-status') == 1){
								$(this).show();
							}else{
								$(this).hide();
							}
						});
						break;
					case 2:
						$.each(list,function(index,value){
							if($(this).attr('data-status') == 2){
								$(this).show();
							}else{
								$(this).hide();
							}
						});
						break;
					case 3:
						$.each(list,function(index,value){
							if($(this).attr('data-status') == 3){
								$(this).show();
							}else{
								$(this).hide();
							}
						});
						break;
					default:
						list.show();
				}
				if(type == 8){
					list.show();
				}
			}
			function dopay(ca_id){
				$('#or_id').val(ca_id);
			}	
			function Igot(id){
		        $.ajax({
		            type: "post",
		            url: "<?php echo url('order/Igot'); ?>",
		            data: {id:id},
		            success: function(data) {		            	
			            if (data.code) {
			            	layer.msg(data.msg);
			                setTimeout(function() {
			                    location.href = "<?php echo url('order/orderList'); ?>?or_status=3";
			                }, 1000);
			            }
		            }
		        });
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

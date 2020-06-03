<?php /*a:2:{s:67:"D:\phpStudy\WWW\szsc\application\index\view\order\order_detail.html";i:1534391762;s:63:"D:\phpStudy\WWW\szsc\application\index\view\public\_footer.html";i:1533524139;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="/static/index/css/order_whole.css"/>
		<style>
		.header{
					height: 1.28rem;
					background: #5F6BE4;
		            position: relative;		
		            box-shadow:0.01rem 0 0.03rem rgba(161,161,161,0.3);	
		}
		.header h1{
			color: #FFFFFF;
		}	
		.body_xq{
			width:90% ;
			display: flex;
			padding-bottom: 0.3rem;
			background: #FFFFFF;
			margin: 0 auto;
			border-radius: 0.12rem;
			margin-top: 0.35rem;
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
		.body_xq ul li span{
			color: #1E1F20;
			font-size: 0.24rem;
		}
		.body_xq ul li:nth-child(1){
			 margin-top: 8%;
			font-size: 0.22rem;
		}
		.body_xq ul li:nth-child(2),.body_xq ul li:nth-child(3){
			font-size: 0.2rem;
			color:#878A8C ;
		}
		.body_ddxx{
			width:90% ;
			padding-bottom: 0.3rem;
			background: #FFFFFF;
			margin: 0 auto;
			border-radius: 0.12rem;
			margin-top: 0.35rem;
			overflow: hidden;
		}
		.body_ddxx h1{
			margin-top: 0.3rem;
			padding-left: 0.3rem;
			font-size: 0.32rem;
		}
		.body_ddxx label{
			width: 100%;
			height: 0.5rem;
			display: flex;
			padding-left: 0.3rem;
		}	
		.body_ddxx label:nth-child(2){
			margin-top: 0.3rem;
		}
		.body_ddxx p{
			width: 20%;
		}	
		.body_ddxx span{
			color: gray;
		}
		</style>
	</head>
	<body>
		<div>
			<div class="header">
				<h1>订单详情</h1>
				<img src="/static/index/img/houtui_bai.png"/ onclick="window.location='orderList.html'">
			</div>
			<div class="body">
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="body_xq">					
					<img src="<?php echo htmlentities($vo['or_pd_pic']['0']); ?>"/>
					<ul>
						<li><?php echo htmlentities($vo['or_pd_name']); ?>								
						</li>
						<li><span><?php echo htmlentities($vo['or_pd_num']); ?> 件</span>
						  <span>￥<?php echo htmlentities($vo['or_pd_price']); ?></span>
						</li>
					</ul>					
			    </div>
			    <?php endforeach; endif; else: echo "" ;endif; ?>
			    <!--订单信息-->
			    <div class="body_ddxx">
					<h1>订单信息</h1>
					<label for=""><p>订单号</p><span><?php echo htmlentities($the_order['or_num']); ?></span></label>
					<label for=""><p>时间</p><span><?php echo htmlentities($the_order['or_add_time']); ?></span></label>
					<label for=""><p>订单状态</p><span><?php echo htmlentities($the_order['status_text']); ?></span></label>
					<label for=""><p>合计</p><span>￥<?php echo htmlentities($list['0']['all_money']); ?></span></label>	
			    </div>
			    <!--收货人信息-->
			     <div class="body_ddxx">
					<h1>收货人信息</h1>
					<label for=""><p>收货姓名</p><span><?php echo htmlentities($list['0']['addr_receiver']); ?></span></label>	
					<label for=""><p>收货电话</p><span><?php echo htmlentities($list['0']['addr_tel']); ?></span></label>
					<label for=""><p>收货地址</p><span><?php echo htmlentities($list['0']['addr_addr']); ?></span></label>
					<label for=""><p>详细地址</p><span><?php echo htmlentities($list['0']['addr_detail']); ?></span></label>
			    </div>
			    <!--快递信息-->
			     <div class="body_ddxx">
					<h1>发货信息</h1>
					<label for=""><p>快递信息</p><span><?php echo htmlentities($the_order['or_express']); ?></span></label>	
					<label for=""><p>快递单号</p><span><?php echo htmlentities($the_order['or_express_num']); ?></span></label>
					<label for=""><p>发货备注</p><span><?php echo htmlentities($the_order['or_express_content']); ?></span></label>
					<label for=""><p>发货时间</p><span><?php echo htmlentities($the_order['deliver_time']); ?></span></label>
			    </div>				
			</div>				
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>


	</body>
</html>

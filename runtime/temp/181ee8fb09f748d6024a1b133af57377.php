<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\user\index.html";i:1534405418;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>个人中心</title>
		<link rel="stylesheet" type="text/css" href="/static/index/css/order_whole.css"/>
		<style>
			.perheader{
				width: 100%;
				height: 4.05rem;
				background: url(/static/index/img/bj.png) no-repeat;
				background-size:100% 100% ;
				position: relative;
			}
			.header_content{
				width: 90%;
				height: 2rem;
				border-radius: 0.15rem;
				background: #FFFFFF;
				position: absolute;
				bottom: -0.2rem;
				left: 5%;
			}
			.img{
				width: 1.2rem;
				height: 1.2rem;
				border-radius: 50%;
				border:0.05rem solid #FFFFFF;
				margin: -0.6rem  auto 0 auto;
			}
			.img img{
				width: 100%;
				height: 100%;
			}
			.header_content h1{
				text-align: center;
				font-size: 0.36rem;
			}
			.header_content label{
				display: block;
				width: 100%;
				text-align: center;
				color: #979292;
			}
			.header_content button{
				width: 1.55rem;
				height: 0.7rem;
				background: #5F6BE4;
				color: #FFFFFF;
				border: none;
				border-radius: 0.1rem;
				box-shadow: 0rem 0.1rem 0.3rem #5F6BE4 ;
				display: block;
				margin: 0.15rem auto 0 auto;
			}
			/*// ul li 付款 发货 收货 完成部分*/
			.pernav{
				width: 90%;
				height: 1.63rem;
				margin: 1rem auto 0 auto;
				background: #FFFFFF;
                border-radius: 0.15rem;	
                overflow: hidden;			
			}
			.pernav  ul{
				display: flex;
			}
			.pernav  ul li {
				width: 25%;
				text-align: center;
				color: #161515;
				font-size: 0.24rem;
				margin-top: 0.3rem;
			}
			.pernav  ul li img{
				width: 0.7rem; 
				height: 0.7rem;
				
			}
			.perlist{
				width: 90%;
				margin: 0.3rem auto 1.2rem auto;
				background: #FFFFFF;
                border-radius: 0.15rem;	
                overflow: hidden;
                position: relative;	
			}
			.perlist ul li{
				padding: 0.3rem 0;
				border-bottom: 0.01rem solid gainsboro;
			}
			.perlist ul li img:nth-child(1){
				width: 0.27rem;
				height: 0.27rem;
				vertical-align: middle;
				margin-left: 0.3rem;
			}
			.perlist ul li span{
				margin-left: 3%;
			}
			.perlist ul li img:nth-child(3){
				width: 0.14rem;
				height: 0.24rem;
				float: right;
				margin: 0.1rem 0.3rem 0 0;
			}
			.perlist ul li:last-child{
				border-bottom: none;
			}
			/*/底部*/
			.foot{
				width: 100%;
				height: 0.98rem;
				background: #FFFFFF;
                overflow: hidden;		
                position: fixed;	
                bottom: 0;
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
		</style>
	</head>
	<body>
	<div>
		<div class="perheader">
			<div class="header_content">
				<div class="img">
					<img src="/static/index/img/per-1.png" onclick="location.href='<?php echo url('user/myDetail'); ?>'"/>
				</div>
				<h1><?php echo htmlentities($info['us_nickname']); ?></h1>
				<label for=""><span>现金积分 ： </span> <span><?php echo htmlentities($info['us_shop_bi']); ?></span></label>
				<button onclick="location.href='<?php echo url('user/takeType'); ?>'">提现</button>
			</div>
		</div>
		<div class="pernav">
			<ul>
				<li><img src="/static/index/img/per-1.png" onclick="location.href='<?php echo url('order/orderList'); ?>?or_status=0'" /><p>待支付</p></li>
				<li><img src="/static/index/img/per-2.png" onclick="location.href='<?php echo url('order/orderList'); ?>?or_status=1'" /><p>待发货</p></li>
                <li><img src="/static/index/img/per-1.png" onclick="location.href='<?php echo url('order/orderList'); ?>?or_status=2'" /><p>待收货</p></li>
                <li><img src="/static/index/img/per-4.png" onclick="location.href='<?php echo url('order/orderList'); ?>?or_status=3'" /><p>已完成</p></li>
			</ul>
		</div>	
		<div class="perlist">
			<ul>
				<!-- <li><img src="/static/index/img/wode-1.png"/><span>我的钱包</span> <img src="/static/index/img/qianjin.png"/></li> -->
				<li onclick="location.href='<?php echo url('user/myTeam'); ?>'"><img src="/static/index/img/wode-2.png"/><span>我的社群</span> <img src="/static/index/img/qianjin.png"/></li>
				<li onclick="location.href='<?php echo url('user/myAccount'); ?>'"><img src="/static/index/img/wode-4.png"/><span>账户信息</span> <img src="/static/index/img/qianjin.png"/></li>
				<li onclick="location.href='<?php echo url('user/myAddr'); ?>'"><img src="/static/index/img/wode-4.png"/><span>我的收货地址</span> <img src="/static/index/img/qianjin.png"/></li>
				<li onclick="location.href='<?php echo url('user/qrcode'); ?>'"><img src="/static/index/img/wode-5.png"/><span>分享好友</span> <img src="/static/index/img/qianjin.png"/></li>
				<li onclick="location.href='<?php echo url('user/apply'); ?>'"><img src="/static/index/img/wode-6.png"/><span>成为商家</span></li>
			</ul>
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
						<img src="/static/index/img/index-3.png"/ style="width: 0.43rem;height: 0.44rem;">
					</div>
					<p>购物车</p>
				</li>
				<li onclick="window.location.href='<?php echo url('user/index'); ?>'">
					<div>
						<img src="/static/index/img/index-4.png"/ style="width: 0.44rem;height: 0.44rem;">
					</div>
					<p class="color">我的</p>
				</li>
			</ul>						
		</div>							
	</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
	</body>
</html>

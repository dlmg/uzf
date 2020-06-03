<?php /*a:1:{s:60:"D:\phpStudy\WWW\szsc\application\index\view\index\index.html";i:1534731497;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>商城首页</title>
	</head>
	<link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			font-size: 0.3rem;
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
		.header{
			height: 1rem;
			position: relative;
		}
		.header input{
			width: 100%;
			height: 0.9rem;
			line-height: 0.9rem;
			padding-left: 3%;
			border: none;

		}
		
		.header img{
			width: 0.44rem;
			height: 0.44rem;
			position: absolute;
			top: .25rem;
			right: .3rem;
		}
		
		/*按钮*/
		.push ul{
	       padding-bottom: 0.2rem;    
		}
		.push ul li{
			width: 20%;
			float: left;
			margin-top: 0.3rem;
			text-align: center;
		}
		.push ul li img{
			width: 0.8rem;
			height: 0.8rem;
		}
		.push ul li p{
			font-size: 0.2rem;
			color: #282727;
		}
		.push ul:after{
			content: '';
			clear: both;
			display: block;
			height: 0;
		}
		/*新闻*/
		.press{
			display: flex;
			height: 0.8rem;
		}
		.press h1{
			font-size: 0.24rem;
			line-height: 0.8rem;
			padding:0 0.3rem ;
		}
		.roll{
			width: 55%;
			height: 0.8rem;
			margin-left:0.15rem ;
			overflow: hidden;
		}
		.roll ul li{
			height: 100%;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		    line-height: 0.8rem;
		    color:#8C8C8C;
		    font-size: 0.2rem;
		    text-align: center;
		}
		.gengduo{
			margin-left: 7%;
		}
		.gengduo span{
			line-height: 0.8rem;
			color: #55C4E1;
			font-size: 0.2rem;
			
		}
		.gengduo img{
			width: 0.12rem;
			height: 0.21rem;
		}
		.body_header{
			background: #FFFFFF;
		}
		.body_header ul{
			height: 0.7rem;
			display: flex;
		}
		.body_header ul li{
			width: 50%;
			padding-left:4% ;
			line-height: 0.7rem;
			font-size: 0.24rem;
		}
		.body_header ul li:nth-child(2){
			text-align: right;
			padding-right: 5%;
		}
		.body_header ul li img{
			width: 0.12rem;
			height: 0.21rem;
		}
		.body_top,{
			height: 2.4rem;
		}
		.body_top img,.body_left img{
			width: 100%;
			height: 100%;
		}
		.body_content{
			display: flex;
		}
		.body_content .content_img{
			width: 3.7rem;
			height: 3rem;
		}
		.body_content .content_img:nth-child(2){
			margin-left: 1%;
		}
		.body_content .content_img img{
			height: 100%;
			width: 100%;
		}
		/*2*/
		.contenttwo>.body_tp{
			display: flex;
		}
		.body_left{
			width: 2.91rem;
			height: 4.82rem;
		}
		.body_contenttwo{
			display: block;
			margin-left: 1%;
		}
		.body_contenttwo .content_right{
			width: 4.51rem;
			height: 2.36rem;
		}
		.body_content .content_img:nth-child(2){
		}
		.body_contenttwo .content_right img{
			height: 100%;
			width: 100%;
		}
		.body_contenttwo .content_right:nth-child(2){
			margin-top: 2%;
		}
		/*//商品简介*/
 		.wares ul{
 			width: 100%;
 			padding-bottom: 1rem;
 			padding-top: 0.1rem;
 		}	
 		.wares ul li{
 			display: inline-block;
 			width: 48%;
 			padding-bottom: 0.3rem;
 		}	
 		.wares ul li img{
 			width: 100%;
 			height: 2.94rem;
 		}	
 		.wares ul li:nth-child(2n){
 			margin-left: 2%;
 		}
 		.wares ul li p,.wares ul li span{
 			padding-left: 3%;
 			font-size: 0.24rem;
 		}
 		.wares ul li p{
 			width: 100%;
 			color: #171716;
 			overflow: hidden;
 			text-overflow: ellipsis;
 			white-space: nowrap;
 		}
 		.wares ul li span{
 			color: #5F6BE4;
 		}
 		/*底部商城*/
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
		/*nav 轮播*/
		.swiper-container{
			width: 100%;
			height: 3.12rem;
			position: relative;
			overflow: hidden;
		}
		.swiper-container ul li img{
			width: 100%;
			height: 100%;
		}
		.swiper-container ul {
			width: 700%;
			position: absolute;
			height: 3.12rem;
		}
		.swiper-container ul li{
			width: 7.5rem;
			height: 100%;
			float: left;
		}

	</style>
	<body>
		<div id="index">
			<div class="header">
				<input type="text" name="pd_name" id="pd_name" placeholder="请输入想要搜索的商品名">
				<img src="/static/index/img/sc1.png"/ onclick="indexByPdName()">
			</div>
			<div class="swiper-container">				
				<ul class="swiper-wrapper">
					<?php if(is_array($data['shuffling']) || $data['shuffling'] instanceof \think\Collection || $data['shuffling'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['shuffling'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="swiper-slide"><img src="<?php echo htmlentities($vo); ?>"/></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<li><img src="<?php echo htmlentities($data['shuffling']['0']); ?>"/></li>
				</ul>
				<div class="swiper-pagination"></div>
			</div>
			<div class="push">
				<ul>
					<?php if(is_array($data['cates']) || $data['cates'] instanceof \think\Collection || $data['cates'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['cates'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li onclick="location.href='<?php echo url('index/cate'); ?>?ca_id=<?php echo htmlentities($key); ?>'"><img src="<?php echo htmlentities($vo['ca_pic']); ?>"/><p><?php echo htmlentities($vo['ca_name']); ?></p></li>					
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>				
			</div>
			<!--新闻动态-->
			<div class="press">
				<h1>新闻动态</h1>
				<div class="roll" id="roll">
					<ul>
						<?php if(is_array($data['newslist']) || $data['newslist'] instanceof \think\Collection || $data['newslist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['newslist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li onclick="location.href='<?php echo url('index/newsDetail'); ?>?id=<?php echo htmlentities($vo['id']); ?>'"><?php echo htmlentities($vo['title']); ?></li>					
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="gengduo" onclick="location.href='<?php echo url('index/newsList'); ?>'">
					<span>更多</span>
					<img src="/static/index/img/qianjin.png"/>
				</div>
			</div>
			<!--优品推荐-->
			<div class="body">
				  <div class="content">
					  	<div class="body_header">
							<ul>
								<li>热门推荐</li>
								<!-- <li>更多 <img src="/static/index/img/qianjin.png"/></li> -->
							</ul>
						</div>
						<div class="body_top">
							<img src="<?php echo htmlentities($data['bigrefer']['0']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['bigrefer']['0']['id']); ?>'" />
						</div>
						<div class="body_content">
							<div class="content_img">
								<img src="<?php echo htmlentities($data['refers']['0']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['refers']['0']['id']); ?>'"/>
							</div>
							<div class="content_img">
								<img src="<?php echo htmlentities($data['refers']['1']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['refers']['1']['id']); ?>'"/>
							</div>
						</div>
				  </div>
				  <!--2-->
					<div class="contenttwo">
					  	<div class="body_header">
							<ul>
								<li>热销商品</li>
								<!-- <li>更多 <img src="/static/index/img/qianjin.png"/></li> -->
							</ul>
						</div>
						<div class="body_tp">
							<div class="body_left">
								<img src="<?php echo htmlentities($data['hots']['0']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['hots']['0']['id']); ?>'"/>
							</div>
							<div class="body_contenttwo">
								<div class="content_right">
									<img src="<?php echo htmlentities($data['hots']['1']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['hots']['1']['id']); ?>'"/>
								</div>
								<div class="content_right">
									<img src="<?php echo htmlentities($data['hots']['2']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($data['hots']['2']['id']); ?>'"/>
								</div>
							</div>
						</div>
				  </div>
				  <!---->
			      <div class="wares">			      	
			      	  <ul>
			      	  	<?php if(is_array($data['goods']) || $data['goods'] instanceof \think\Collection || $data['goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				      	  	<li>
				      	  		<img src="<?php echo htmlentities($vo['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($vo['id']); ?>'"/>
				      	  		<p><?php echo htmlentities($vo['pd_name']); ?></p>
				      	  		<span>￥<?php echo htmlentities($vo['pd_price']); ?></span>
				      	  	</li>
			      	  	<?php endforeach; endif; else: echo "" ;endif; ?>			      	  	
			      	  </ul>			      	
			      </div>
			      <!--END-->
			</div>
			<!--body  ___END-->
			<div class="foot">
				<ul>
					<li onclick="window.location.href='<?php echo url('index/index'); ?>'">
						<div>
							<img src="/static/index/img/sc7.png"/ style="width: 0.45rem;height: 0.41rem;">
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
							<img src="/static/index/img/sc8.png"/ style="width: 0.44rem;height: 0.44rem;">
						</div>
						<p class="color">我的</p>
					</li>
				</ul>
			</div>				
			<!--FOOT_END-->
		</div>		
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script>
			function indexByPdName()
			{				
				var pd_name = $('#pd_name').val();
				location.href = "<?php echo url('index/search'); ?>?pd_name="+pd_name;
			}
			$(function(){
				setInterval(function(){
					$('#roll').find('ul:first').animate({
						marginTop:"-.8rem"
					},500,function(){
						$(this).css({marginTop:"0rem"}).find('li:first').appendTo(this);
					})
				},2500)
				//轮播图

			var mySwiper = new Swiper('.swiper-container',{
                pagination: {
                el:'.swiper-pagination',
                bulletElement:'li',
				},
            })
				
				
			})									
		</script>
	</body>
</html>

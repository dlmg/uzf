<?php /*a:1:{s:59:"D:\phpStudy\WWW\szsc\application\index\view\index\cate.html";i:1534388232;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>分类——首页</title>
	</head>
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
		.header{
			height: 1rem;
			overflow: hidden;
		}
		.header input{
			width: 85%;
			height: 0.62rem;
			display: block;
			margin: 0.2rem auto;
			border: 0.01rem solid rgba(160,160,160,1);
			background: none;
			border-radius: 0.14rem;
			text-indent: 0.3rem;
		}
		.header img{
			width: 0.36rem;
			height: 0.36rem;
			position: absolute;
			top: 0.3rem;
			right: 0.8rem;
		}
		.body{
			display: flex;
			margin-top: 0.2rem;
			padding-bottom: 0.98rem;
		}
		.left{
			width: 30%;
			
		}
		.right{
			width: 70%;
		}
		.right ul{
			margin: 0.4rem 0;
		}
		.left ul{
			overflow-y: scroll;
		}
		.left ul li{
			height: 1.2rem;
			line-height: 1.2rem;
			text-align: center;
			
		}
		.right>ul li{
			width: 4.68rem;
			height: 2.42rem;
			margin: 0 auto;
		}
		.right ul li img{
			width: 100%;
			height: 100%;
		}
		.tab{
			position: relative;
		}
		.show{
			width: 100%;
			position: absolute;
			display: none;
		}
		.show p{
			font-size: 0.2rem;
			text-align: center;
		}
		.show ul li{
			display: inline-block;
			width: 30%;
			text-align: center;
			margin: 0.4rem 0;
		}
		.show ul li p{
			color: #1D1E21;
			font-size: 0.2rem;
			height: 0.7rem;
			 -webkit-line-clamp:2;
			overflow: hidden;
			letter-spacing: normal;
			text-overflow: ellipsis;
		}
		.show ul li img{
			width: 1.02rem;
			height: 1.02rem;
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
	<body>
		<div>
			<div class="header">
				<p><input type="text" name="pd_name" id="pd_name" placeholder="请输入想要搜索的商品名"></p>
				<img src="/static/index/img/sc1.png"/ onclick="indexByPdName()">
			</div>
			<!-- <div class="header">
				<input type="text" name="" id="" value="" />
				<img src="/static/index/img/sc1.png"/>
			</div> -->
			<!--左边-->
		<div class="body">		
			<div class="left">
				 <ul>
				 	<?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				 	<!-- <li class="<?php echo htmlentities($vo['id']); ?>" onclick="location.href='<?php echo url('index/cate'); ?>?ca_id=<?php echo htmlentities($vo['id']); ?>'"><?php echo htmlentities($vo['ca_name']); ?></li> -->		
				 	<li class="<?php echo htmlentities($vo['id']); ?>" ><?php echo htmlentities($vo['ca_name']); ?></li>		 	
				 	<?php endforeach; endif; else: echo "" ;endif; ?>
				 </ul>
			</div>
			<div class="right">
				<ul>
					<li><img src="<?php echo htmlentities($refers['0']['pd_pic']['0']); ?>" onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($refers['0']['id']); ?>'"/></li>
				</ul>
				<div class="tab">
					<?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="show">
							<p>— 服务丶品质丶精选  —</p>
					      <ul>
					      	<?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
					      	<li onclick="location.href='<?php echo url('index/goods'); ?>?ca_id=<?php echo htmlentities($ca['id']); ?>'"><img src="<?php echo htmlentities($ca['ca_pic']); ?>"/><p><?php echo htmlentities($ca['ca_name']); ?></p></li>
					      	<?php endforeach; endif; else: echo "" ;endif; ?>
					      </ul>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>											
				</div>				
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
						<img src="/static/index/img/index_7.png"/ style="width: 0.42rem;height: 0.3rem;">
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
			<input type="hidden" name="ca_id" id="ca_id" value="<?php echo htmlentities($ca_id); ?>">
		</div>	
		</div>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script>
			 $(function(){
			 	var li = $('.left ul li');
			 	var show = $('.show');
			 	var ca_id = $('#ca_id').val();
			 	//show.eq(0).css('display','block');
			 	show.eq(ca_id).css('display','block');
			 	//li.eq(0).css('fontSize','.32rem')
			 	li.eq(ca_id).css('fontSize','.32rem')
			 	.css('color','#5F6BE4');
			 	$.each(li, function(index,value) {
			 		$(this).click(function(){
			 			$(this).css({'fontSize':'0.32rem'}).siblings().css({'fontSize':'.28rem'});
			 			$(this).css({'color':'#5F6BE4'}).siblings().css({'color':'#414243'});
			 			show.eq(index).css('display','block').siblings().css('display','none');
			 		})
			 	});			 	
			 })	
			 function indexByPdName()
			{				
				var pd_name = $('#pd_name').val();
				location.href = "<?php echo url('index/search'); ?>?pd_name="+pd_name;
			}		
		</script>
	</body>
</html>

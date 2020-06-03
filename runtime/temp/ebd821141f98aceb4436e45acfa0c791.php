<?php /*a:1:{s:60:"D:\phpStudy\WWW\szsc\application\index\view\index\goods.html";i:1534390261;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>搜索小米手机</title>
	</head>
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
		.header{
			background: #f7f7f7;
		}
		.header_top{
			position: relative;
			height: 1.3rem;
			overflow: hidden;
		}
		.header_top img{
			width: 0.27rem;
			height: 0.46rem;
			position: absolute;
			top: 0.35rem;
			left: 0.3rem;
		}
		.header_top input{
			display: block;
			width: 70%;
			background: #FFFFFF;
			border: none;
			border-radius: 0.34rem;
			margin: 0.3rem auto;
			height: 0.66rem;
			text-indent: 3%;
		}
		.header ul{
			display: flex;
		}
		.header ul li{
			line-height: 0.7rem;
			width: 32%;
			text-align: center;
		}
		.header ul li:nth-child(3) img{
			width: 0.26rem;
			height: 0.25rem;
		}
		.header ul li:nth-child(1) img{
			width: 0.16rem;
			height: 0.1rem;
		}
		.active{
			color: #5F6BE4;
		}
		/*content*/
		.content ul{
			display: block;
		}
		.content ul li>div{
			display: inline-block;
		}
		.content ul li>.li_wz{
			width: 65%;
			margin: 0.3rem;
		}
		.content ul li>.li_wz p{
			font-size: 0.28rem;
		}
		.content ul li>.li_wz span{
			font-size: 0.22rem;
			color: #7E8081;
		}
		.content ul li>.li_wz time{
			display: block;	
			color:#CE1919;
		}
		.content ul li span{
			color: #FB2424;
		}
		.li_img{
			width:1.46rem;
			height: 1.46rem;
			margin-left: 0.3rem;
		}
		img{
			width: 100%;
			height: 100%;
		}
		.dixian{
			text-align: center;
			color: #767676;
			font-size: 0.26rem;
			padding: 0.5rem 0;
		}
		.text_hidden{
		-webkit-line-clamp:2;
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
			<div class="header_top">
				<a href="javascript:void(0)" onclick="javascript:history.back(-1)"><img src="/static/index/img/houtui_hei.png"/></a>
				<input type="text" name="" id="ca_name" value="<?php echo htmlentities($ca_name); ?>" readonly="readonly" />
			</div>
			<ul>
				<li onclick="goods1()">综合</li>
				<li onclick="goods2()">销量</li>
				<!-- <li><img src="/static/index/img/wode-5.png"/></li> -->
			</ul>
		</div>
		<div class="content">
			<ul>
				<?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li onclick="location.href='<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($vo['id']); ?>'">
					<div class="li_img">
						<img src="<?php echo htmlentities($vo['pd_pic']['0']); ?>"/>
					</div>
					<div class="li_wz">
						<p><?php echo htmlentities($vo['pd_name']); ?> <span class="text_hidden"><?php echo htmlentities($vo['pd_content']); ?></span></p>
						<span>型号：<?php echo htmlentities($vo['pd_spec']); ?></span>
						<time>￥<?php echo htmlentities($vo['pd_price']); ?> &nbsp;&nbsp;<span><?php echo htmlentities($vo['pd_sales']); ?>人付款</span></p></time>
					</div>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<p class="dixian">我是有底线的~</p>
		</div>		
	</div>	
	<input type="hidden" name="ca_id" value="<?php echo htmlentities($ca_id); ?>" id="ca_id">	
	<input type="hidden" name="code" value="<?php echo htmlentities($code); ?>" id="code">		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>	
		<script type="text/javascript">
			$(function(){
				var code = $('#code').val();
				if(code == 1){
					var  li = $('.header ul li');
					li.eq(1).addClass('active');
				}else{
					var  li = $('.header ul li');
					li.eq(0).addClass('active');
				}
			})
			function goods1()
			{			
				var ca_id = $('#ca_id').val();
				location.href = "<?php echo url('index/goods'); ?>?ca_id="+ca_id;
				
			}
			function goods2()
			{			
				var ca_id = $('#ca_id').val();
				location.href = "<?php echo url('index/goods'); ?>?ca_id="+ca_id+"&orderby=1";
				
			}
		</script>
	</body>
</html>

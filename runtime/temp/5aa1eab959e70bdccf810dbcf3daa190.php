<?php /*a:1:{s:61:"D:\phpStudy\WWW\szsc\application\index\view\index\search.html";i:1534241876;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>搜索<?php echo htmlentities((isset($data['pd_name']) && ($data['pd_name'] !== '')?$data['pd_name']: '')); ?></title>
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
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 0 .2rem;
		}
		.header_top a{
			width: 0.27rem;
			height: 0.46rem;
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
		.header_top .search{
			width: .44rem;
			height: .44rem;
		}
		.header ul{
			display: flex;
		}
		.header ul li{
			line-height: 0.7rem;
			width: 50%;
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

		.content ul:after{
			content: '';
			clear: both;
			display: block;
					}
		.content ul li{
			float: left;
			width: 47%;
			margin: 0 0 0 2%;
		}
		.content ul li p,.content ul li span{
			overflow: hidden;
			text-overflow: ellipsis;
		   white-space: nowrap;
		   padding-left: 0.3rem;
		}
		.content ul li span{
			color: #FB2424;
		}
		.li_img{			
			height: 2.94rem;			
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
	</style>
	<body>
	<div>			
		<div class="header">
			<div class="header_top">
				<!-- <a href="javascript:void(0)" onclick="javascript:history.back(-1)"><img src="/static/index/img/houtui_hei.png"/></a> -->
				<a onclick="window.location.href='<?php echo url('index/index'); ?>'"><img src="/static/index/img/houtui_hei.png"/></a>
				<input type="text" name="pd_name" id="pd_name" value="<?php echo htmlentities((isset($data['pd_name']) && ($data['pd_name'] !== '')?$data['pd_name']: '')); ?>" placeholder="输入搜索内容" />
				<img src="/static/index/img/sc1.png" onclick="indexByPdName()" class="search"/>
			</div>
			<ul>
				<!-- <li class="active" onclick="indexByPdName()">综合 <img src="/static/index/img/xiala.png"/></li> -->
				<li  onclick="indexByPdName()">综合 </li>
				<li  onclick="indexByPdName1()">销量 </li>
				<!-- <li><img src="/static/index/img/wode-5.png"/></li> -->
			</ul>
		</div>
		<div class="content">
			<ul>
				<?php if(is_array($data['list']) || $data['list'] instanceof \think\Collection || $data['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li onclick="window.location.href = '<?php echo url('index/goodsDetail'); ?>?id=<?php echo htmlentities($vo['id']); ?>' ">
					<div class="li_img">
						<img src="<?php echo htmlentities($vo['pd_pic']['0']); ?>"/>
					</div>
					<p><?php echo htmlentities($vo['pd_name']); ?> &nbsp; <?php echo htmlentities($vo['pd_spec']); ?></p>
					<span>￥<?php echo htmlentities($vo['pd_price']); ?></span>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>				
			</ul>
			
		</div>	
		<input type="hidden" name="code" id="code" value="<?php echo htmlentities($code); ?>">
		<p class="dixian">我是有底线的~</p>	
	</div>		
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>	
		<script src="/static/index/js/base.js" type="text/javascript"></script>
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
			function indexByPdName()
			{			
				var pd_name = $('#pd_name').val();
				location.href = "<?php echo url('index/search'); ?>?pd_name="+pd_name;
				
			}
			function indexByPdName1()
			{			
				var pd_name = $('#pd_name').val();
				location.href = "<?php echo url('index/search'); ?>?pd_name="+pd_name+"&orderby=1";
				var li = $('.header ul li');
				
			}
			
			
		</script>
	</body>
</html>

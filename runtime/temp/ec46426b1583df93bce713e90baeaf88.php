<?php /*a:1:{s:64:"D:\phpStudy\WWW\szsc\application\index\view\index\news_list.html";i:1533806887;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>新闻公告</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style>
		body{
		background: #f7f7f7;
		}
		.body_content{
			width: 100%;
			height: 1.4rem;
			margin: 0 auto;
			position: relative;
			overflow: hidden;
			border-bottom: 0.01rem solid rgba(230,230,230,1);
			padding: 0 0.3rem;
			background: #FFFFFF;
		}
		.body_content p{
			margin-top: 0.25rem;
			
		}
		.body_content span{
			color: #9E9E9E;
			font-size: 0.22rem;
			line-height:0.7rem ;
		}
		.body_content img{
			width: 0.21rem;
			height: 0.37rem;
			position: absolute;
			right: 0.5rem;
			top: 0.55rem;
		}
		.body_content:nth-child(1){
			margin-top: 0.3rem;
		}		
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('index/index'); ?>"  ><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>通知公告</h1>
			</div>
			<div class="body">
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="body_content" onclick="window.location.href='<?php echo url('index/newsDetail'); ?>?id=<?php echo htmlentities($vo['id']); ?>'">
						<p>新闻公告 &nbsp; &nbsp; <?php echo htmlentities($vo['title']); ?></p>
						<span><?php echo htmlentities(date("Y-m-d",!is_numeric($vo['add_time'])? strtotime($vo['add_time']) : $vo['add_time'])); ?></span>
						<img src="/static/index/img/qianjin.png"/>
					</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>						
			</div>						
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
	</body>
</html>

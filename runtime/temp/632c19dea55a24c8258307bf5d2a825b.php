<?php /*a:1:{s:82:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\user\my_account.html";i:1534408872;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>账户明细</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/pilce.css"/>
	<style>
		.header img{
			width: .27rem;
			height: .46rem;
			position: absolute;
			top: 0.35rem;
			left: 0.25rem;
		}		
		.jifen{
			width: 93%;
			background: url(/static/index/img/bj2.png) no-repeat;
			height: 1.6rem;
			background-size: 100% 100%;
			overflow: hidden;
			margin: 0.2rem auto;
		}
		.jifen h1,.jifen p{
			width: 93%;
			color: #FFFFFF;
			font-size: 0.36rem;
			text-align: center;
			
		}
		.body ul{
			width: 93%;
			height: 0.95rem;
			background: #FFFFFF;
			margin: 0.2rem auto;
			display: flex;
			box-shadow: .02rem 0.03rem .03rem rgba(90,92,93,0.3);
			border-radius:0.1rem ;
		}
		.body ul li{
			height: 0.95rem;
			width: 50%;
			text-align: center;
			line-height: 0.95rem;
		}
		.body ul li a{
			color: #212324;
		}
		.tab{
			width: 93%;
			margin: 0 auto;
			
		}
		.sc{
			height: 1.4rem;
			overflow: hidden;
           box-shadow: .02rem 0.03rem .03rem rgba(90,92,93,0.3);
           border-radius: 0.1rem;
           margin-bottom: 0.2rem;
           background: #FFFFFF;
		}
		.sc span,
		.sc p{
			padding-left: 0.3rem;
			color: #1B1D1E;
		}
		.sc p{
			margin-top: 0.2rem;
		}
		.sc span{
			font-size: 0.24rem;
			color: #666666;
		}
		.sc a{
			font-size: 0.36rem;
			color: #5F6BE4;
			float: right;
			margin: -0.2rem 0.3rem 0 0;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>账户明细</h1>
				<img src="/static/index/img/houtui_hei.png"/  onclick='javascript:history.back(-1)'>
			</div>
			<div class="body">
				<div class="jifen">
					<h1 style="margin-top: 0.3rem;">个人业绩</h1>
						<p>￥<?php echo htmlentities($info['1']); ?></p>
				</div>
				<ul>
					<li class="active"><a style="color:#5F6BE4">个人业绩</a></li>
					<li><a href="<?php echo url('user/myAccountTeam'); ?>">团队业绩</a></li>
				</ul>
				<div class="tab">
					<?php if(is_array($info['0']) || $info['0'] instanceof \think\Collection || $info['0'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="sc">
					  <p><?php echo htmlentities($vo['wa_note']); ?></p>
					  <span><?php echo htmlentities($vo['add_time']); ?></span>
					  <a href="javascript:void(0)"><?php echo htmlentities($vo['wa_num']); ?></a>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>										
				</div>				
			</div>						
		</div>				
		<script src="/static/index/js/base.js" type="text/javascript"></script>
	</body>
</html>

<?php /*a:1:{s:69:"D:\phpStudy\WWW\szsc\application\index\view\user\my_account_team.html";i:1534475234;}*/ ?>
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
			left: .25rem;
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
		.sc dt,.sc dd{
			display: flex;
		}
		.sc dt p{
			width: 50%;
			font-size: 0.3rem;
			margin-top: 0.2rem;
			padding: 0 0.3rem;
		}
		.sc dt span{
			width: 50%;
			font-size: 0.36rem;
			color: #5F6BE4;
			line-height: 0.82rem;
			text-align: right;
			padding: 0 0.3rem;
		}
		.sc dd span{
			width: 50%;
			font-size: 0.24rem;
			color: #666666;
			padding: 0 0.3rem;
		}
		.sc dd span:nth-child(2){
			text-align: right;
			padding: 0rem 0.3rem;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>账户明细</h1>
				<img src="/static/index/img/houtui_hei.png"/ onclick='javascript:history.back(-1)'>
			</div>
			<div class="body">
				<div class="jifen">
					<h1 style="margin-top: 0.3rem;">团队业绩</h1>
						<p>￥<?php echo htmlentities($info['1']); ?></p>
				</div>
				<ul>
					<li class="active"><a href="<?php echo url('user/myAccount'); ?>">个人业绩</a></li>
					<li><a style="color:#5F6BE4">团队业绩</a></li>
				</ul>
				<?php if(is_array($info['0']) || $info['0'] instanceof \think\Collection || $info['0'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="tab">
					<div class="sc">
						
						<dl>
							
							<dt>
								<p><?php echo htmlentities($vo['wa_note']); ?></p>
								<span><?php echo htmlentities($vo['wa_num']); ?></span>
							</dt>
							<dd>
								<span>姓名：<?php echo htmlentities($vo['us_nickname']); ?></span>
								<span><?php echo htmlentities($vo['add_time']); ?></span>
							</dd>
							
						</dl>
						
					</div>										
				</div>	
				<?php endforeach; endif; else: echo "" ;endif; ?>			
			</div>						
		</div>				
		<script src="/static/index/js/base.js" type="text/javascript"></script>
	</body>
</html>

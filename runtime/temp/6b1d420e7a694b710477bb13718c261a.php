<?php /*a:1:{s:79:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\user\my_team.html";i:1533378860;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>我的社群</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style type="text/css">
		*{
			font-size: 0.28rem;
		}
		body{
			background: #f7f7f7;
		}
		.header{
			width: 100%;
	      	background: #5F6BE4;
			height: 1.29rem;
            position: fixed;
            top: 0;		
            box-shadow:0.01rem 0 0.05rem rgba(161,161,161,0.3);	
            z-index: 10;
           
		}
		.header h1{
			color: #FFFFFF;
		}
		.jy_content{
			width: 93%;
			margin-top: 0.2rem;
			margin: 0 auto;
			position: relative;
		}
		
		.jy_content>ul{
			width: 93%;
			position: fixed;
            top: 1.3rem;	
			height:.95rem;
			margin: 0rem auto;
			display: flex;
			background: #FFFFFF;
			box-shadow:.1rem 0px 0.1rem rgba(90,92,93,0.3);
			border-radius: 0.1rem;
			z-index: 9;
		}
		.jy_content>ul li{
			width: 50%;
			text-align: center;
			line-height: 0.95rem;
			padding-bottom: 0.2rem;
		}
		.jy_content>ul li p {
			width: 70%;
			text-align: right;
		}
		.jy_content>ul li span {
			width: 30%;
			text-align: left;
		}
		.active{
			color: #5F6BE4;
		}
		.tab_body{
			
			height: 1.65rem;
			display: flex;
			background: #FFFFFF;
			box-shadow:.02rem 0px .03rem rgba(90,92,93,0.3);
			margin-top: 0.3rem;
			border-radius: 0.1rem;
		}
		.tab_body dl{
			display: block;
			width: 80%;
			margin-top: 0.15rem;
			margin-left: 4%;
		}
		.tab_body .img{
			width: 0.89rem;
			height: .89rem;
			margin: 0.3rem 0 0 0.3rem;
		}
		
		.tab_body .img img{
			width: 100%;
			height: 100%;
		}
		.tab_body dd img{
			width: .25rem;
			height: .27rem;
		}
		.tab_body dd span{
			display: inline-block;
			width: 42%;
			color: #5C5C5D;
		}
		.tab_body dl{
			color: #5C5C5D;
		}
		.tab{
			height: 100%;
			background: red;
			position: relative;
		}
		.tuandui{
			width: 100%;
			position: absolute;
			top: 0rem;
			left: 0;
			display: none;
		}
		.div{
			width: 100%;
			height: 2.34rem;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<h1>我的社群</h1>
				<a href="<?php echo url('user/index'); ?>"><img src="/static/index/img/houtui_bai.png"/></a>
			</div>
			<div class="jy_content">
				
				 <ul class="ul">
				 	<li class="active">我的团队</li>
				 	<li>我的直推</li>
				 </ul> 
				 <div class="div"> </div>
				<div class="tab">					
					<!--//我的团队-->
					 <div class="tuandui">
					 	<?php if(is_array($theall) || $theall instanceof \think\Collection || $theall instanceof \think\Paginator): $i = 0; $__LIST__ = $theall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					 	<div class="tab_body" onclick="window.location='<?php echo url('user/userMains'); ?>?us_id=<?php echo htmlentities($vo['id']); ?>'">
							<div class="img">
								<img src="<?php echo htmlentities($vo['us_head_pic']); ?>"/>
							</div>
							 <dl>
							 	<dt><?php echo htmlentities($vo['us_nickname']); ?></dt>
							 	<dd><img src="/static/index/img/xtb-1.png"/> <span><?php echo htmlentities($vo['us_account']); ?></span></dd>
							 	<dd><img src="/static/index/img/xtb-2.png"/> <span><?php echo htmlentities($vo['us_tel']); ?></span> <span style="text-align: right;"><?php echo htmlentities($vo['us_add_time']); ?></span></dd>
							 </dl>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>					
					 </div>						 
					<!--我的直推-->					
					<div class="tuandui">
						<?php if(is_array($direct) || $direct instanceof \think\Collection || $direct instanceof \think\Paginator): $i = 0; $__LIST__ = $direct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>	
					 	<div class="tab_body" onclick="window.location='<?php echo url('user/userMains'); ?>?us_id=<?php echo htmlentities($vo['id']); ?>'">
							<div class="img">
								<img src="<?php echo htmlentities($voo['us_head_pic']); ?>"/>
							</div>
							 <dl>
							 	<dt><?php echo htmlentities($voo['us_nickname']); ?></dt>
							 	<dd><img src="/static/index/img/xtb-1.png"/> <span><?php echo htmlentities($voo['us_account']); ?></span></dd>
							 	<dd><img src="/static/index/img/xtb-2.png"/> <span><?php echo htmlentities($voo['us_tel']); ?></span> <span style="text-align: right;"><?php echo htmlentities($voo['us_add_time']); ?></span></dd>
							 </dl>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>				
					 </div>					 								
				</div>												
			</div>									
		</div>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script type="text/javascript">
              $(function(){
              	 var li = $('.ul li');
              	 var tab = $('.tuandui');
              	 tab.eq(0).css('display','block');
              	$.each(li, function(index,value) {
              		$(this).click(function(){
              			$(this).addClass('active').siblings().removeClass('active');
              			tab.eq(index).css('display','block').siblings().css('display','none');
              		})
              		
              		
              	});
              	
              	
              })
		</script>
	</body>
</html>

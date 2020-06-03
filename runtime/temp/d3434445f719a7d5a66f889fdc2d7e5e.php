<?php /*a:1:{s:60:"D:\phpStudy\WWW\szsc\application\index\view\user\myaddr.html";i:1534218586;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>编辑收货地址</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	
	<style>
		.header span{
			position: absolute;
			top: 0.5rem;
			right: 0.3rem;
			font-size: 0.28rem;
		}
		body{
			background: #f7f7f7;
		}
		p,span{
			color: #131414;
			font-size: 0.24rem;
		}
		.content{
			margin: 0 auto;
			border-radius: 0.12rem;
		}
		.content label span{
			display: inline-block;
			width: 20%;
			color: #333333;
			font-size: 0.24rem;
			margin-left: 3%;
		}
		.content label:nth-child(1){
			    padding: 0.1rem 0;
				margin-top: 0.2rem;
			}
		.content label{
				width: 100%;
				background: #FFFFFF;
				display: block;

		}
		.content label input{
			    height: 90%;
				border: none;
			}
		.content label input[type=button]{
			background: none;
			color: #5F6BE4;
			font-size: 0.26rem;
		}
		
		.content label p{
			display: inline-block;
		}
		.content label img{
			float: right;
			margin:0.35rem  0.3rem 0 0;
			width: 0.19rem;
			height: 0.36rem;
		}
		.content label:last-child{
			height: 100%;
			border-bottom: none;
			border-radius: 0.12rem;
		}
		.content label:last-child p {
			font-size: 0.2rem;
		}
		button{
			width: 70%;
			height: 0.88rem;
			background: #5F6BE4;
			border: none;
			border-radius: 0.4rem;
			color: #FFFFFF;
			font-size: 0.32rem;
			display: block;
			margin: 0.3rem auto;
		}
		.nav{
			display: flex;
			height: 0.7rem;
			padding: 0 0.3rem;
			background: #FFFFFF;
		}
		.nav p{
			vertical-align: auto;
			line-height: 0.7rem;
		}
		.nav img{
			margin-top: 0.23rem;
		}
		.nav img:nth-child(2){
			width: 0.24rem;
			height: 0.24rem;
			margin-left: 2%;
		}
		.nav img:nth-child(3){
			width: 0.12rem;
			height: 0.22rem;
			margin-left: 55%;
		}
		.xzdz{
			background: #FFFFFF;
			position: relative;
			border-bottom: 0.01rem solid  gainsboro;
		}
		.xzdz_left{
			height: 0.8rem;
			position: relative;
		}
		.xzdz_left img{
			position: absolute;
			width: 0.3rem;
			top: 0.23rem;
			left: 0.3rem;
			display: none;
		}
		.xzdz_left img:nth-child(1){
			display: block;
		}
		.xzdz_left p{
			position: absolute;
			top: 0.21rem;
			left: 0.8rem;
			display: none;
		}
		.xzdz_left p:nth-child(1){
			display: block;
		}
		
	    .xzdz_right span{
			vertical-align: bottom;
			margin-left: 0.1rem;
		}
		.xzdz_right{
			position: absolute;
			right: 0.2rem;
			top: 0rem;
		}
		.xzdz_right img{
			width: 0.26rem;
			height: 0.3rem;
			margin: 0.3rem 0 0 0.3rem;
			vertical-align: sub;
		}
		.xzdz_right ul{
			display: flex;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<?php if($code['pd_id'] > 0): ?>
				<a href="javascript:void(0)" onclick='javascript:history.back(-1)'><img src="/static/index/img/houtui_hei.png"/></a>
				<?php else: ?>
				<a href="<?php echo url('user/index'); ?>"><img src="/static/index/img/houtui_hei.png"/></a>
				<?php endif; ?>
				<h1>管理收货地址</h1>
			</div>
			<!-- <div class="nav">
				<p>选择菜鸟驿站代收地址</p>
				<img src="/static/index/img/shouhuo-4.png"/>
				<img src="/static/index/img/qianjin.png"/>
			</div> -->
			<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<div class="tab">
				<div class="content" >
					<?php if($code['pd_id'] > 0): ?>
					<div onclick="location.href='<?php echo url('order/chooseBuyType'); ?>?addr_id=<?php echo htmlentities($vo['id']); ?>&type=<?php echo htmlentities($code['type']); ?>&pd_id=<?php echo htmlentities($code['pd_id']); ?>'">					
						<label for=""><span><?php echo htmlentities($vo['addr_receiver']); ?></span><p style="float: right;margin-right: 5%;"><?php echo htmlentities($vo['addr_tel']); ?></p></label>
						<label for=""><span>收货地址</span><p><?php echo htmlentities($vo['addr_addr']); ?><?php echo htmlentities($vo['addr_detail']); ?></p></label>
					</div>
					<?php else: ?>
					<div href="javascript:void(0)">					
						<label for=""><span><?php echo htmlentities($vo['addr_receiver']); ?></span><p style="float: right;margin-right: 5%;"><?php echo htmlentities($vo['addr_tel']); ?></p></label>
						<label for=""><span>收货地址</span><p><?php echo htmlentities($vo['addr_addr']); ?><?php echo htmlentities($vo['addr_detail']); ?></p></label>
					</div>
					<?php endif; ?>
					<div class="xzdz">
						<?php if($vo['addr_default'] == 1): ?>						
						<div class="xzdz_left">
							<div>								
								<img src="/static/index/img/shouhuo-2.png"/>
							</div>
							<div class="span">								
								<p>默认地址</p>
							</div>							
						</div>
						<?php else: ?>
						<div class="xzdz_left">
							<div>
								<img src="/static/index/img/shouhuo-5.png" onclick="setAddr('<?php echo htmlentities($vo['id']); ?>')"/>
							</div>
							<div class="span">
								<p>设为默认</p>
							</div>							
						</div>
						<?php endif; ?>
						<div class="xzdz_right">
							<ul>
								<li>
									<img src="/static/index/img/shouhuo-1.png"/>
									<a href="<?php echo url('user/editAddr'); ?>?id=<?php echo htmlentities($vo['id']); ?>&type=<?php echo htmlentities($code['type']); ?>&pd_id=<?php echo htmlentities($code['pd_id']); ?>"><span>编辑</span></a>
								</li>
								<li class="del">
									<img src="/static/index/img/shouhuo-3.png"/>
									<a onclick="del(<?php echo htmlentities($vo['id']); ?>)"><span>删除</span></a>
								</li>
							</ul>
							
						</div>
					</div>
				</div>							
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>			
			<button onclick="location.href='<?php echo url('user/addAddr'); ?>?id=<?php echo htmlentities($vo['id']); ?>&type=<?php echo htmlentities($code['type']); ?>&pd_id=<?php echo htmlentities($code['pd_id']); ?>'">添加新地址</button>
			<input type="hidden" name="" id="buytype" value="<?php echo htmlentities($code['type']); ?>">
			<input type="hidden" name="" id="pd_id" value="<?php echo htmlentities($code['pd_id']); ?>">
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			/*$(function(){
				var img = $('.xzdz_left>div img');
				var p = $('.xzdz_left .span p');
				p.eq(0).css('display','block');
				img.eq(0).css('display','block');
				// 
				var div = $('.content');
				$.each(img, function(index,value) {
					$(this).click(function(){
						$(this).css('display','none').siblings().css('display','block');
						p.eq(index).css('display','none').siblings().css('display','block');
						$(this).css('display','');
						
					})
				});
				$.each(div, function(index,value) {
					$(this).click(function(){
						if(div.eq(0)){
							$(this).siblings().children().children().children('div').children('img').eq(0).css('display','block');
							$(this).siblings().children().children().children('div').children('p').eq(0).css('display','block');
							$(this).siblings().children().children().children('div').children('p').eq(1).css('display','none');
							$(this).siblings().children().children().children('div').children('img').eq(1).css('display','none');
						}
						else {
							$(this).siblings().children().children().children('div').children('img').eq(0).css('display','block');
							$(this).siblings().children().children().children('div').children('img').eq(1).css('display','none');
						}
						
					})
				});
				//删除
				$('.xzdz_right ul .del').click(function(){
					$(this).parents('.content').css('display','none');
				})				
			})*/
			function del(id){
				var buytype = $('#buytype').val();
				var pd_id = $('#pd_id').val();
			    layer.confirm('确定要删除么？', {
			      btn: ['确定', '取消']
			    }, function(index, layero){
			        $.ajax({
			            type: "post",
			            url: "<?php echo url('user/delAddr'); ?>",
			            data: {id:id},
			            success: function(data) {
			            	layer.msg(data.msg);
				            if (data.code) {
				                setTimeout(function() {
				                    location.href = "<?php echo url('user/myAddr'); ?>?type="+buytype+'&pd_id='+pd_id;
				                }, 1000);
				            }
			            }
			        });
			    });
			}	
			function setAddr(id){
				var buytype = $('#buytype').val();
				var pd_id = $('#pd_id').val();
		        $.ajax({
		            type: "post",
		            url: "<?php echo url('user/setDefaultAddr'); ?>",
		            data: {id:id},
		            success: function(data) {
		            	layer.msg(data.msg);
			            if (data.code) {
			                setTimeout(function() {
			                    location.href = "<?php echo url('user/myAddr'); ?>?type="+buytype+'&pd_id='+pd_id;
			                }, 1000);
			            }
		            }
		        });
			}
		</script>
	</body>
</html>

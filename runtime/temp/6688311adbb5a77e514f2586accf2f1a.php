<?php /*a:1:{s:84:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\index\news_detail.html";i:1533807182;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>新闻详情</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style>
		body{
		background: #f7f7f7;
		}
		.body_content{
			width: 100%;
			margin: 0 auto;
			position: relative;
			overflow: hidden;
			border-bottom: 0.01rem solid rgba(230,230,230,1);
			padding: 0 0.3rem 0.5rem 0.3rem;
			background: #FFFFFF;
			margin-top: 0.3rem;
			
		}
		.body_content>p{
			margin-top: 0.25rem;
		}
		/**/
		.body_content>label{
			display: flex;
		}
		.body_content>label p{
			width: 50%;
			vertical-align: auto;
		}
		.body_content>label span{
			color: #9E9E9E;
			font-size: 0.24rem;
			width: 50%;
			text-align: right;
		}
		.foot{
			height: 1.1rem;
			width: 100%;
			position: fixed;
			background: #FFFFFF;
			bottom: 0;
			border-top: 0.01rem solid rgba(230,230,230,1);
		}
		.foot label{
			display: block;
			margin-top: 0.3rem;
			text-align: center;
		}
		.foot label img{
			width: 0.31rem;
			height: 0.39rem;
		}
		.foot label span{
			font-size: 0.3rem;
			color: #333333;
			padding-left: 0.1rem;
		}
		.del{
			width: 5.4rem;
			height: 2.43rem;
			border-radius:0.3rem ;
			background: rgba(243,243,243,1);
			overflow: hidden;
			position: fixed;
			bottom: 40%;
			left: 13%;
			display: none;
		}
		.del h1{
			height: 45%;
			color: #000000;
			font-size: 0.32rem;
			border-bottom: 0.01rem solid rgba(232,232,232,1);
			text-align: center;
			margin-top: 0.6rem;
			
		}
		.del ul {
			display: flex;
		}
		.del li {
			width: 50%;
			height: 0.7rem;
			color: #008BF8;
			line-height: 0.75rem;
			text-align: center;
			
		}
		.del li:nth-child(1){
			border-right:  0.01rem solid gainsboro;
		}
		.fgx{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			background: rgba(0,0,0,0.3);
			display: none;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<a href="<?php echo url('index/newsList'); ?>"  ><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>新闻详情</h1>
			</div>
			<div class="body">				
				<div class="body_content">
					<label for=""><p>【<?php echo htmlentities($detail['title']); ?>】</p><span><?php echo htmlentities($detail['add_time']); ?></span></label>
					<p><?php echo htmlentities($detail['simple']); ?></p>
					<br>
					<div id="news_content" >
						<?php echo $detail['content']; ?>          			
					</div>
				</div>

			</div>			
			<!-- <div class="foot">
				<label for="">
					<img src="/static/index/img/shouhuo-3.png"/>
					<span>删除</span>
				</label>
			</div>
			<div class="fgx"></div>
			<div class="del">
				 <h1>确定删除公告吗</h1>
				 <ul>
				 	<li class="qx">取消</li>
				 	<li class="ok">确定</li>
				 </ul>
			</div> -->
			
			
		</div>
		
		
		
		
		
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>

		<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
		<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
		<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

		<script type="text/javascript">
			$(function(){

				/*var ue = UE.getEditor('editor');
				$('.skin-minimal input').iCheck({
					checkboxClass: 'icheckbox-blue',
					radioClass: 'iradio-blue',
					increaseArea: '20%'
				});*/

				$('.foot>label').click(function(){
					$('.del').fadeIn(300);
					$('.fgx').fadeIn(300);
				})
				$('.qx').click(function(){
					$('.del').fadeOut(300);
					$('.fgx').fadeOut(300);
				})
				$('.ok').click(function(){
					$('.body').css('display','none');
					$('.del').fadeOut(300);
					$('.fgx').fadeOut(300);
				})
				
			})
		</script>
	</body>
</html>

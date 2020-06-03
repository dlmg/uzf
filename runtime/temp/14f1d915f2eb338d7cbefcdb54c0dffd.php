<?php /*a:1:{s:85:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\index\goods_detail.html";i:1534748188;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>产品</title>
		<link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
		<style>
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
				width: 100%;
				height: 4.39rem;
				position: relative;
			}
			.header a>img{
				width: 0.44rem;
				height: 0.44rem;
				position: absolute;
				top: 0.3rem;
				left: 0.2rem;
				z-index: 10;
			}
			/*轮播*/
				.swiper-container{
				width: 100%;
				height: 4.39rem;
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
					height: 4.39rem;
				}
				.swiper-container ul li{
					width: 7.5rem;
					height: 100%;
					float: left;
				}
			
			/**/
			.body{
				padding:0rem 5%;
				background: #FFFFFF;
			}
			.body h1{
				font-size: 0.28rem;
				color: #353738;
				padding-bottom: 0.2rem;
			}
			.body p{
				font-size: 0.36rem;
				color:#99A1ED;
			}
			.body del{
				display: block;
				font-size: 0.2rem;
				color: #5E5E5E;
				text-decoration: line-through;
				padding-bottom: 0.2rem;
			}
			.body ul{
				display: flex;
				padding-bottom: 0.2rem;
			}
			.body ul li{
				width: 33%;
				text-align: center;
			}
			.body ul li:nth-child(1){
				text-align: left;
			}
			.body ul li,.body ul li span{
				font-size: 0.2rem;
				color: #5E5E5E;
			}
			/**/
			.gg{
				background: #FFFFFF;
				position: relative;
				margin-top: 0.2rem;
				border-bottom: 0.01rem solid ghostwhite;
			}
			.gg:nth-child(2){
				margin-top: 0rem;
				border-bottom: none;
			}
			.gg ul{
				display: flex;
			}
			.gg ul li{
				height: 0.65rem;
				line-height: 0.65rem;
				margin-left: 3%;
			}
			.gg ul li:nth-child(1){
				color: #747576;
			}
			.gg img{
				width: 0.18rem;
				height: 0.3rem;
				position: absolute;
				top: 0.17rem;
				right: 0.5rem;
			}
			/**/
			.xq{
				background: #FFFFFF;
				height: 4.5rem;
			}
			.xq dl{
				padding-bottom: 1.5rem;
			}
			.xq dl dd{
				display: inline-block;
				width: 44%;
				padding-left: 5%;
				font-size: 0.24rem;
			}
			.xq dl dd span{
				font-size: 0.24rem;
			}
			.xq dl dt{
				margin: 0.3rem 0;
				padding-left: 5%;
			}
			.foot{
				width: 100%;
				position: fixed;
				bottom: 0;
				height: 1.5rem;
				background: #f7f7f7;
				z-index: 10;
				display: flex;
			}
			.foot_left{
				width: 30%;
				height: 100%;
				
			}
			.foot_left img{
				width: 0.4rem;
				height: 0.27rem;
				margin: 0.5rem 0 0 39%;
			}
			.foot_left p {
				font-size: 0.2rem;
				text-align: center;
				color: #2A2B2B;
			}
			.foot_right{
				margin-left: 0.5rem;
			}
			.foot_right button{
				margin-top: 0.4rem;
				font-size: 0.28rem;
			}
			.come,.lijigoumai{
				width: 2.28rem;
				height: 0.8rem;
				border: none;
				color: #FFFFFF;
				background: rgba(95,107,228,1);
			}
			.come{
				border-top-left-radius: 0.4rem;
				border-bottom-left-radius: 0.4rem;
			}
			.lijigoumai{
				
				border-top-right-radius: 0.4rem;
				border-bottom-right-radius: 0.4rem;
			}
			/*hide*/
		    .hide {
		    	width: 3.5rem;
		    	height: 1.6rem;
		    	background: rgba(0,0,0,0.6);
		    	border-radius: 0.24rem;
		    	position: fixed;
		    	bottom: 40%;
		    	left: 25%;
		    	display: none;
		    	z-index: 11;
		    }
		    .hide img{
		    	width: 0.74rem;
		    	height: 0.49rem;
		    	display: block;
		    	margin: 0.3rem 0 0 40%;
		    }
		    .hide p{
		    	font-size: 0.2rem;
		    	color: #FFFFFF;
		    	padding: 0.2rem 0;
		    	text-align: center;
		    }
		    .assort{
		    	width: 100%;
		    	position: fixed;
		    	bottom: 0;
		    	background: #FFFFFF;
		    	z-index: 10;
		    	left: 0;
		    	display: none;
		    	border-top-left-radius: 0.18rem;
		    	border-top-right-radius: 0.18rem;
		    	padding-bottom: 0.6rem;
		    }
		    .assort>img,.goods>img{
		    	width: 0.48rem;
		    	position: absolute;
		    	top: 0.3rem;
		    	right: 0.5rem;
		    }
		    .assort_header img{
		     	height: 3.97rem;
		    	width: 100%;
		    	display: block;
		    	margin: 0 auto;
		     }
		    .assort_header p{
		     	text-align: center;
		     }
		     .assort_header h1{
		     	padding: 5% 0 0 6%;
		     }
		     .assort_tab button{
		     	width: 2rem;
		     	height: 0.6rem;
		     	background: rgba(247,247,247,1);
		     	border: none;
		     	border-radius: 0.27rem;
		     	margin: 0.3rem 0 0 4%;
		     	font-size: 0.24rem;
		     }
		     /*//*/
		    .fgx{
		    	width: 100%;
		    	height: 100%;
		    	background: rgba(0,0,0,0.6);
		    	position: fixed;
		    	z-index: 1;
		    	top: 0;
		    	left: 0;
		    	display: none;
		    }
		    /*产品参数*/
		   .goods{
		   		width: 100%;
		    	position: fixed;
		    	z-index: 89;
		    	bottom: 0;
		    	background: #FFFFFF;
		    	z-index: 10;
		    	left: 0;
		    	display: none;
		    	border-top-left-radius: 0.18rem;
		    	border-top-right-radius: 0.18rem;
		    	padding-bottom: 0.6rem;
		    	padding-top: 0.4rem;
		   }
		   .goods label{
		   		display:flex;
		   		height: 0.8rem;
		   }
		   .goods label span{
		   	 	width: 28%;
		   	 	text-align: center;
		   	 	color: #818384;
		   	 	font-size: 0.28rem;
		   	 	line-height: 0.8rem;
		   }
		    .goods label p{
		    	font-size: 0.24rem;
		    	line-height: 0.8rem;
		    }
		    .goods h1{
		    	text-align: center;
		    	font-size: 0.36rem;
		    }
		     .goods button{
		     	width: 70%;
		     	height: 0.8rem;
		     	background: #5F6BE4;
		     	border: none;
		     	outline-style: none;
		     	border-radius: 0.4rem;
		     	display: block;
		     	margin: 0.5rem auto;
		     	color: #FFFFFF;
		     }
		     /*修改*/
		     .xq .xq_one{
		     	width:100%;

		     }
		      .xq dl>div{
		      	padding:0 0.2rem;
		      }
		      .xq .xq_one img{
		      	width: 100%;
		      }
		</style>
	</head>
	<body>
		<div>
			<div class="header">
				<a href="javascript:void(0)" onclick='javascript:history.back(-1)'><img src="/static/index/img/houtui.png"/></a>
				<div class="swiper-container">
					<ul class="swiper-wrapper">
						<?php if(is_array($info['pd_pic']) || $info['pd_pic'] instanceof \think\Collection || $info['pd_pic'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['pd_pic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li class="swiper-slide"><img src="<?php echo htmlentities($vo); ?>"/></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-pagination"></div>				
				</div>
			</div>
			<!--//-->
			<div class="body">
				<h1><?php echo htmlentities($info['pd_name']); ?></h1>
				<p>￥<?php echo htmlentities($info['pd_price']); ?></p>
				<!-- <del>价格￥2600</del> -->
				<ul>
					<li>快递 ：<span><?php echo htmlentities($info['take_fee']); ?></span></li>
					<li>销量 ：<span><?php echo htmlentities($info['pd_sales']); ?></span></li>
					<li><span><?php echo htmlentities($info['pd_place']); ?></span></li>
				</ul>
			</div>
			<div class="content">
				<div class="gg guige">
					<ul>
						<li>规格</li>
						<li>选择</li>
						<li>颜色分类</li>
					</ul>
					<img src="/static/index/img/qianjin.png"/>
				</div>
				<div class="gg canshu">
					<ul>
						<li>参数</li>
						<li>品牌</li>
						<li>型号</li>
					</ul>
					<img src="/static/index/img/qianjin.png"/>
				</div>
			</div>
			<div class="xq">
				<dl>
					<dt>产品简介</dt>
					<div class="xq_one"><?php echo htmlentities($info['pd_content']); ?></div>
					<dt>产品详情</dt>
					<div class="xq_one"><?php echo $info['pd_detail']; ?></div>
					<!-- <dd>产品等级 ： <span>合格品</span></dd>
					<dd>制造工艺 ： <span>全新技术</span></dd>
					<dd>颜色分类 ： <span>金色</span></dd>
					<dd>尺寸： <span>最大尺寸</span></dd> -->
				</dl>
			</div>
			<div class="foot">
				<div class="foot_left" onclick="location.href = '<?php echo url('cart/index'); ?>' ">
					<img src="/static/index/img/gouwuche.png"/>
					<p>购物车</p>
				</div>
				<div class="foot_right">
					<button class="come" id="tocart">加入购物车</button><button class="lijigoumai" id="lijigoumai">立即购买</button>
				</div>
			</div>
			<!--hide-->
			<!-- <div class="hide">
				<img src="/static/index/img/ok.png"/>
				<p>添加成功，在购物车等候~</p>
			</div> -->
			<!--规格颜色分类-->
			<div class="assort">
				<img src="/static/index/img/guanbi.png"/>
				<div class="assort_header">
					  <img src="<?php echo htmlentities($info['pd_pic']['0']); ?>"/>
					  <p style="color: #CC1616;font-size: 0.36rem;">￥<?php echo htmlentities($info['pd_price']); ?></p>
					  <p style="color: #282829;font-size: 0.26rem;">库存 <span><?php echo htmlentities($info['pd_inventory']); ?></span>件</p>
					  <h1>颜色分类</h1>
				</div>
				<div class="assort_tab">
					<?php if(is_array($info['pd_colors']) || $info['pd_colors'] instanceof \think\Collection || $info['pd_colors'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['pd_colors'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<button id="buy-button" value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></button>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<input type="hidden" name="color" id="color">
				<input type="hidden" name="pd_id" id="pd_id" value="<?php echo htmlentities($info['id']); ?>">
				<div class="foot_right" style="margin: 0 0 0 19%;">
					<button class="come" onclick="cart()">加入购物车</button><button class="lijigoumai" onclick="buy()">立即购买</button>
				</div>
			</div>
			<!--//产品参数详情-->
			<div class="goods">
				<h1>产品参数</h1>
				<label for=""><span>保质期</span><p><?php echo htmlentities($info['pd_date']); ?></p></label>
				<label for=""><span>品牌</span><p><?php echo htmlentities($info['pd_band']); ?></p></label>
				<label for=""><span>型号</span><p><?php echo htmlentities($info['pd_spec']); ?></p></label>
				<label for=""><span>生产企业</span><p><?php echo htmlentities($info['pd_pd_com']); ?></p></label>				
				<label for=""><span>颜色分类</span><p><?php echo htmlentities($info['pd_color']); ?></p></label>
				<button>确认</button>
			</div>
			
		</div>
		<div class="fgx"></div>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			$(function(){				
				//
				var btn = $('.assort_tab button')
				$.each(btn, function(index,value) {
					$(this).click(function(){
						$(this).css('background','#5F6BE4').siblings().css('background','ghostwhite');
						$(this).css('color','#FFFFFF').siblings().css('color','#282829');
						$('#color').val($(this).val());
					})
				});
				//
					var gg = $('.guige');
					var canshu = $('.canshu');
					var good = $('.goods');
					var gb = $('.assort>img');
					var gbs = $('.goods>button');
					var goumai = $('#lijigoumai');
					var tocart = $('#tocart')
					gg.click(function(){
						$('.assort').show(500);
						$('.fgx').fadeIn(500);
						$('body').css('height','100vh').css('overflow','hidden');
					})
					canshu.click(function(){
						let height=document.documentElement.clientHeight;
						$('.goods').show(500);
						$('.fgx').fadeIn(500);
						$('body').css('height',height+'px').css('overflow','hidden');
					})
					gb.click(function(){
						$(this).parent().hide(500);
						$('.fgx').fadeOut(500);
						$('body').css('height','100%').css('overflow','');
					})
					gbs.click(function(){
						$(this).parent().hide(500);
						$('.fgx').fadeOut(500);
						$('body').css('height','100%').css('overflow','');
					})
					goumai.click(function(){
						$('.assort').show(500);
						$('.fgx').fadeIn(500);
						$('body').css('height','100vh').css('overflow','hidden');
					})
					tocart.click(function(){
						$('.assort').show(500);
						$('.fgx').fadeIn(500);
						$('body').css('height','100vh').css('overflow','hidden');
					})
					
				//轮播图
			var mySwiper = new Swiper('.swiper-container',{
                pagination: {
                el:'.swiper-pagination',
                bulletElement:'li',
				},
            })
					
					
			})
			function buy(){
				var type = $('#color').val();
				var id = $('#pd_id').val();
				if(type == ''){
					layer.msg('请选择商品颜色分类');
				}else{
					location.href = "<?php echo url('order/toBuy'); ?>?type="+type+"&pd_id="+id;
				}				
			}
			function cart(){
				var type = $('#color').val();
				var pd_id = $('#pd_id').val();
				if(type == ''){
					layer.msg('请选择商品颜色分类');
				}else{
					$.ajax({
						type: "post",
						url: "<?php echo url('cart/add'); ?>",
						data: {pd_id:pd_id,type:type},
						success:function(data){
							layer.msg(data.msg);
							if(data.code){
								//$('.hide').css('display','block').fadeOut(500);
								$('.come').css('background','#99A1ED');
								setTimeout(function(){
			                        location.href = '';
			                    },1000);
							}
						}
					});
				}				
			}			
		</script>
	</body>
</html>

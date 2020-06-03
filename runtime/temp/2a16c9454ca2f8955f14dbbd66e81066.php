<?php /*a:1:{s:78:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\index_last\view\user\qrcode.html";i:1534732038;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<title>分享给好友</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/static/index/css/personal.css"/>
	<style>
		body{
			background: #f7f7f7;
		}
		.content{
			width: 90%;
			height: 7.5rem;
			background: #FFFFFF;
			margin: 1rem auto;
			border-radius:0.2rem;
			overflow: hidden;
		}
		.content img{
			width: 4.51rem;
			height: 4.53rem;
			display: block;
			margin: 14% auto;
		}
		.content #copy-num{
			color: #333333;
			display: block;
			text-align: center;
			border: none;
			width: 100%;
		}
		button{
			position: fixed;
			width: 90%;
			height: 0.88rem;
			background: #5F6BE4;
			border: none;
			border-radius: 0.4rem;
			color: #FFFFFF;
			font-size: 0.32rem;
			bottom: .7rem;
			left:5%;
		}
		.fuzhi{
			position: fixed;
			width: 70%;
			height: 0.7rem;
			text-align: center;
			line-height: 0.7rem;
			background: rgba(0,0,0,0.2);
			color: #FFFFFF;
			border-radius: 0.25rem;
			left: 16%;
			top: 68%;
			display: none;
		}
	</style>	
	<body>
         <div>
         	<div class="header">
				<a href="<?php echo url('user/index'); ?>"  ><img src="/static/index/img/houtui_hei.png"/></a>
				<h1>分享好友</h1>
			</div>
         	<div class="content">
         		<div id="qrcode"></div>
         		<!-- <img src="/static/index/img/erweima.png"/> -->
         		<input type="text" name=""  id="copy-num" value="<?php echo htmlentities($qrurl); ?>" readonly="readonly" >
         	</div>
         	
         	<button onclick="copyUrl()" id="btn">复制链接</button>
         	   <div class="fuzhi">
         	   	  <p>复制成功</p>
         	   </div>
         </div>		
		
		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/static/qrcodejs-master/qrcode.js"></script>
		<script type="text/javascript">
			 //复制文字
            function copyUrl(){  
            var e=document.getElementById("copy-num");//对象是copy-num1  
            e.select(); //选择对象  
            document.execCommand("Copy"); //执行浏览器复制命令  
            // alert("复制成功");  
        }  
         /* <![CDATA[ */ 
       !function() { 
               try { 
                    var t = "currentScript" in document ? document.currentScript: function() { 
            for (var t = document.getElementsByTagName("script"), e = t.length; e--;) if (t[e].getAttribute("data-cfhash")) return t[e] 
                      } (); 
                      if (t && t.previousSibling) { 
                        var e, r, n, i, c = t.previousSibling, 
                        a = c.getAttribute("data-cfemail"); 
                        if (a) { 
                          for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, 
                          e += String.fromCharCode(i); 
                          e = document.createTextNode(e), 
                          c.parentNode.replaceChild(e, c) 
                        } 
                        t.parentNode.removeChild(t); 
                      } 
                    } catch(u) {} 
          } ()
          $('#btn').click(function(){
          	$('.fuzhi').css('display','block').fadeOut(1000);
          })

          var qrcode = new QRCode("qrcode");         
			function makeCode () {
				var elText = $('#copy-num').val();
			  	qrcode.makeCode(elText);
			}
			makeCode();
		</script>
	</body>
</html>

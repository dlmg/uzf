<?php /*a:1:{s:63:"D:\phpStudy\WWW\szsc\application\index\view\user\edit_addr.html";i:1533896691;}*/ ?>
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
		}
		
		.content{
			width: 93%;
			margin: 0 auto;
			border-radius: 0.12rem;
		}
		.content label span{
			display: inline-block;
			width: 25%;
			color: #333333;
			font-size: 0.3rem;
			margin-left: 3%;
		}
		.content label:nth-child(1){
				margin-top: 0.5rem;
				height: 1.2rem;
				line-height: 1.2rem;
			}
		.content label{
				width: 100%;
				background: #FFFFFF;
				display: block;
				height: 1rem;
				line-height: 1rem;
				border-bottom: 0.01rem solid gainsboro;
				
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
			margin-left: 5%;
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
		.content label select{
			width: 22%;
		}
		button{
			width: 70%;
			height: 0.88rem;
			background: #5F6BE4;
			border: none;
			border-radius: 0.4rem;
			color: #FFFFFF;
			font-size: 0.32rem;
			margin-top: 10%;
			margin-left: 15%;
		}
	</style>
	<body>
		<div>
			<div class="header">
				<?php if($buymsg['type'] != ' '): ?>
				<a href="javascript:void(0)" onclick='javascript:history.back(-1)'><img src="/static/index/img/houtui_hei.png"/></a>
				<?php else: ?>
				<a href="<?php echo url('user/myaddr'); ?>"><img src="/static/index/img/houtui_hei.png"/></a>
				<?php endif; ?>
				<h1>修改收货地址</h1>
			</div>
			<form method="post" id="add-addr-form">
			<div class="content">
				<label for=""><span>收货人</span><input type="text" name="addr_receiver" value="<?php echo htmlentities($info['addr_receiver']); ?>" placeholder="填写收货人姓名"></label>
				<label for=""><span>联系电话</span><input type="text" name="addr_tel" value="<?php echo htmlentities($info['addr_tel']); ?>" placeholder="填写收货电话"></label>
				<label for="">
					<span>所在地区</span>
					<select class="dropdown" name="province"  id="province" key="city" onchange="loadArea('province',2,'city','<?php echo url('User/getArea'); ?>');">
                        <option value="0" selected>省份/直辖市</option>
                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($one['area_id']); ?>" <?php if($one['area_id'] == $info['province']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($one['area_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <select class="dropdown" name="city"   id="city"   onchange="loadArea('city',3,'town','<?php echo url('User/getArea'); ?>');" >
                        <option value="<?php echo htmlentities($info['city']); ?>"><?php echo htmlentities($info['addr_city']); ?></option>        
                    </select>
                    <select class="dropdown" name="town"   id="town"  >
                        <option value="<?php echo htmlentities($info['town']); ?>"><?php echo htmlentities($info['addr_town']); ?></option>
                    </select>
				</label>
				<label for=""><span>详细地址</span><input type="text" name="addr_detail" value="<?php echo htmlentities($info['addr_detail']); ?>" placeholder="填写收货详细地址"></label>
			</div>
			<input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
			</form>
			<button onclick="return add();">修改</button>
			<input type="hidden" name="" id="buytype" value="<?php echo htmlentities($buymsg['type']); ?>">
			<input type="hidden" name="" id="pd_id" value="<?php echo htmlentities($buymsg['pd_id']); ?>">
		</div>		
		<script src="/static/index/js/base.js" type="text/javascript"></script>
		<script src="/static/index/js/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="/static/index/js/code.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
		<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
		<script type="text/javascript">
			function add() {
				var buytype = $('#buytype').val();
				var pd_id = $('#pd_id').val();
		        $.post('<?php echo url("doEditAddr"); ?>', $('#add-addr-form').serialize()).success(function(data) {
		            layer.msg(data.msg);
		            if (data.code) {
		                setTimeout(function() {
		                    location.href = "<?php echo url('user/myAddr'); ?>?type="+buytype+'&pd_id='+pd_id;
		                }, 1000);
		            }
		        });
		        return false;
		    }
			function loadArea(sel,type_id,selName,url){
		      jQuery("#"+selName+" option").each(function(){
		        jQuery(this).remove();
		      });
		      jQuery("<option value=0>请选择</option>").appendTo(jQuery("#"+selName));
		      if(jQuery("#"+sel).val()==0){
		        return;
		      }
		      jQuery.getJSON(url,{parent_id:jQuery("#"+sel).val(),area_type:type_id},
		        function(data){
		          if(data){
		            jQuery.each(data,function(idx,item){
		              jQuery("<option value="+item.area_id+">"+item.area_name+"</option>").appendTo(jQuery("#"+selName));
		            });
		          }else{
		            jQuery("<option value='0'>请选择</option>").appendTo(jQuery("#"+selName));
		          }
		        }
		      );
		    }
		    
		</script>
	</body>
</html>

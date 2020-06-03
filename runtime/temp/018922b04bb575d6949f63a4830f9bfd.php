<?php /*a:3:{s:72:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\user\index.html";i:1559271011;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;s:76:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/page.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />
<style>
	.table-bg thead th {
	     background-color:rgba(255,255,255,0); 
	}
	.bg-1 {
	    background-color:rgba(255,255,255,0);
	}
</style>
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title></title>
<style type="text/css">
.inp {
width: 150px;
height: 25px;
}
.inp:focus {
outline:none;
border: 1px solid red;
}
</style>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员管理 <span class="c-gray en">&gt;</span> 会员列表 
	<!-- <a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:void(0);" onclick="downdo()" title="下载" ><i class="Hui-iconfont">&#xe640;</i></a>&nbsp;&nbsp; -->
	<a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px;margin-right:6px " onclick="excel()" title="导出"><i class="Hui-iconfont">&#xe644;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
	<form class="Huiform" method="get" action="" target="_self">
		状态：
		<span class="select-box inline">
			<select name="us_status" class="select">
				<option value="">全部</option> 
				<option value="1">正常</option> 
				<option value="0" style="color:red;">被禁用</option>
			</select>
		</span>&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- 类型：
		<span class="select-box inline">
			<select name="gave_status" class="select">
				<option value="">全部</option> 
				<option value="0">会员</option> 
				<option value="1">审核中</option>
				<option value="2">商家</option>
			</select>
		</span> -->
		<input type="text" class="input-text" style="width:150px" placeholder="备注名、账号、手机号" id="" name="keywords" value="<?php echo htmlentities((app('request')->get('keywords') ?: '')); ?>">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l" style="margin: 10px">
			<a href="javascript:;" onclick="create(0,'add','添加会员')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 新增会员</a>
		</span> 
		<span class="r" style="margin: 10px">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border  table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">				
				<th>账户名</th>
				<th>备注名</th>
				<!-- <th>详情</th> -->
				<th>手机号</th>
				<th>推荐人</th>
				<!-- <th>类型</th> -->
				<th>会员级别</th>
				<!-- <th>商品分类</th> -->
				<th>我的团队</th>
				<th>账户明细</th>
				<th>充值</th>
				<!-- <th>特惠专区提成奖金</th> -->
				<!-- <th>结算法</th> -->
				<th>状态</th>
				<th>添加时间</th>
				<!-- <th>重置密码</th> -->
				<!-- <th>激活会员</th> -->
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">
					<td><?php echo htmlentities($vo['us_account']); ?></td>
					<td><?php echo htmlentities($vo['us_nickname']); ?></td>
					<!-- <td><a href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'detail','商户详情')">[点击查看]</a></td> -->					
					<td><?php echo htmlentities($vo['us_tel']); ?></td>
					<td><?php echo htmlentities($vo['p_nickname']); ?></td>	
					<!-- <th><?php echo htmlentities($vo['merchant_status_text']); ?></th> -->
					<!-- <td>
						<select name="us_level" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'us_level')" >
							<option value="0" <?php if($vo['us_level'] == 0): ?>selected<?php endif; ?>>普通会员</option>
							<option value="2" <?php if($vo['us_level'] == 2): ?>selected<?php endif; ?>>一星</option>
							<option value="4" <?php if($vo['us_level'] == 4): ?>selected<?php endif; ?>>二星</option>
							<option value="6" <?php if($vo['us_level'] == 6): ?>selected<?php endif; ?>>三星</option>
						</select>
					</td> -->
					<td>
						<?php if($vo['us_level'] == 0): ?>
						普通会员
						<?php else: ?>
						VIP会员
						<?php endif; ?>
					</td>	
					<td><a href="javascript:;" onclick="showMyteam(<?php echo htmlentities($vo['id']); ?>)">[点击查看]</a></td>
					<td><a href="javascript:;" onclick="myAccount(<?php echo htmlentities($vo['id']); ?>)">[点击查看]</a></td>								
					<!-- <td><input type="text" class="inp" value="<?php echo htmlentities($vo['us_shop_bi']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'us_shop_bi')"></td>
					<td><input type="text" class="inp" value="<?php echo htmlentities($vo['us_shop_quan']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'us_shop_quan')"></td> -->
					<!-- <td>
						<select name="us_award_type" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'us_award_type')" >
							<option value="1" <?php if($vo['us_award_type'] == 1): ?>selected<?php endif; ?>>全额</option>
							<option value="0.5" <?php if($vo['us_award_type'] == 0.5): ?>selected<?php endif; ?>>半价</option>
							<option value="0" <?php if($vo['us_award_type'] == 0): ?>selected<?php endif; ?>>免费</option>
						</select>
					</td>		 -->
					<td><a href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'addmoney','会员充值')">[点击充值]</a></td>		
					<td class="td-status">
					<?php if($vo['us_status'] == 1): ?>
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,0,'us_status')" href="javascript:;" title="停用"><span class="label label-success radius">已启用</span></a>
					<?php else: ?>
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,1,'us_status')" href="javascript:;" title="启用"><span class="label label-default radius">已禁用</span></a>
					<?php endif; ?>
					</td>					
					<td><?php echo htmlentities($vo['us_add_time']); ?></td>	
					<!-- <td class="td-manage">					
						<a style="text-decoration:none" onclick="repwd(<?php echo htmlentities($vo['id']); ?>)" title="重置密码"><i class="Hui-iconfont">[点击重置]</i></a>
					</td> -->	
<!-- 					<?php if($vo['us_abc'] > 0): ?>
					<td>已激活</td>
					<?php else: ?>
					<td><a href="javascript:;" onclick="activate(<?php echo htmlentities($vo['id']); ?>)">[点击激活]</a></td>	
					<?php endif; ?> -->					
					<td class="td-manage">					
						<!-- <a style="text-decoration:none" onclick="record(<?php echo htmlentities($vo['id']); ?>,'edit','会员详情')"  title="会员详情"><i class="Hui-iconfont">&#xe6c6;</i></a> -->
					<!-- 	<?php if($vo['us_status'] == 1): ?>
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,0,'us_status')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
						<?php else: ?>
						<a onClick="change(<?php echo htmlentities($vo['id']); ?>,1,'us_status')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
						<?php endif; ?> -->
						<a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'edit','修改用户')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<!-- <a style="text-decoration:none" onclick="create(<?php echo htmlentities($vo['id']); ?>,'addr','地址列表')" title="地址"><i class="Hui-iconfont">&#xe671;</i></a> -->
						<a style="text-decoration:none" onclick="del(<?php echo htmlentities($vo['id']); ?>)" title="删除"><i class="Hui-iconfont">&#xe706;</i></a>
					</td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<div class="pages" style="margin:20px;float: right; "><?php echo $list; ?></div>
</div>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/static/admin/static/gojs/go.js"></script>
<script type="text/javascript" src="/static/admin/static/qrcodejs-master/qrcode.js"></script>
<script>
	var aa = "<?php echo htmlentities(app('request')->controller()); ?>";
	var bb = "<?php echo htmlentities(app('request')->action()); ?>";
	// console.log(aa+"/"+bb);
</script>
<?php if(app('session')->get('admin.id') != '1'): ?>
	<script type="text/javascript">
	var nodeData = [<?php echo htmlentities(app('session')->get('rules')); ?>];
	$('.rule_node').addClass('hidden');
	$.each(nodeData, function (index, value) {
		$('.sidebar').find('li[data-node-id="' + value + '"]').removeClass('hidden');
		$('.sidebar').find('dt[data-node-id="' + value + '"]').removeClass('hidden');
	});
	</script>
<?php endif; ?>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$('select[name="us_status"]').val(<?php echo htmlentities(app('request')->get('us_status')); ?>);
$('select[name="gave_status"]').val(<?php echo htmlentities(app('request')->get('gave_status')); ?>);


function create(id,url,key){
	var url = "<?php echo url('"+url+"'); ?>?id="+id;
	creatIframe(url,key);
}


function change(id,value,key){
	layer.confirm('确定要更改么？', {
	      btn: ['确定', '取消']
	    }, function(index, layero){
	        $.ajax({
	            type: "post",
	            url: "<?php echo url('change'); ?>",
	            data: {id:id,value:value,key:key},
	            success: function(data) {
	             	if(data.code){
	             		location.href = '';
	             	}
	            }
	        });
	    });
}
function repwd(id){
	layer.confirm('确定要重置么？重置后密码为123456', {
	      btn: ['确定', '取消']
	    }, function(index, layero){
	        $.ajax({
	            type: "post",
	            url: "<?php echo url('repwd'); ?>",
	            data: {id:id},
	            success: function(data) {
	            	layer.msg(data.msg);
	             	if(data.code){
	             		setTimeout("window.location='';",1000);
	             		//location.href = '';
	             	}
	            }
	        });
	    });
}
function settle(id){
	layer.confirm('确定要结算么？', {
	      btn: ['确定', '取消']
	    }, function(){
	        $.ajax({
	            type: "post",
	            url: "<?php echo url('settle'); ?>",
	            data: {id:id},
	            async:true,
	            success: function(data) {
	             	if(data.code){
	             		layer.msg(data.msg);
	             		setTimeout("window.location='';",500);
	             	}
	            }
	        });
	    });
}

function del(id){
    layer.confirm('确定要删除么？', {
      btn: ['确定', '取消']
    }, function(index, layero){
        $.ajax({
            type: "post",
            url: "<?php echo url('delete'); ?>",
            data: {id:id},
            success: function(data) {            	
                layer.msg(data.msg);
                setTimeout("window.location=\"<?php echo url('User/index'); ?>\"",500);
            }
        });
    });
}
function activate(id){
	var url = "<?php echo url('User/activate'); ?>?id="+id;
	layer_show('激活会员',url,'600','300');
}	
function myAccount(id){
	var url = "<?php echo url('User/myAccount'); ?>?id="+id;
	layer_show('收益明细',url);
}
function showMyteam(id){
	var url = "<?php echo url('showMyteam'); ?>?id="+id;
	layer_show('我的团队',url);
	//layer_show('发货页面',url,'600','300');
}
function excel(){
    var url = "<?php echo url('excel'); ?>";
    creatIframe(url,'表格导出');
}
</script> 
</body>
</html>
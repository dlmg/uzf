<?php /*a:3:{s:61:"D:\phpstudy_pro\WWW\uzf\application\admin\view\user\news.html";i:1533026748;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员管理 <span class="c-gray en">&gt;</span> 会员列表 
	<!-- <a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:void(0);" onclick="downdo()" title="下载" ><i class="Hui-iconfont">&#xe640;</i></a>&nbsp;&nbsp; -->
	<a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
	<form class="Huiform" method="get" action="" target="_self">
		<input type="text" class="input-text" style="width:150px" placeholder="昵称、账号、手机号" id="" name="keywords" value="<?php echo htmlentities((app('request')->get('keywords') ?: '')); ?>">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border  table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">				
				<th>账户名</th>
				<!-- <th>昵称</th> -->
				<th>姓名</th>
				<th>详情</th>
				<th>身份证号</th>
				<th>手机号</th>
				<th>申请分类</th>
				<th>类型</th>
				<th>申请地区</th>
				<th>申请理由</th>
				<th>申请时间</th>
				
				
				<th>审批代理</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">
					<td><?php echo htmlentities($vo['us_account']); ?></td>
					<td><?php echo htmlentities($vo['us_nickname']); ?></td>
					<!-- <td><?php echo htmlentities($vo['us_name']); ?></td> -->
					<td><a href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'detail','商户详情')">[点击查看]</a></td>
					<td><?php echo htmlentities($vo['us_id_card']); ?></td>
					<td><?php echo htmlentities($vo['us_tel']); ?></td>
					<td><?php echo htmlentities($vo['us_ca_name_text']); ?></td>
					<td><?php echo htmlentities($vo['apply_type_text']); ?></td>
					<td><?php echo htmlentities($vo['us_addr_addr']); ?></td>					
					<td><?php echo htmlentities($vo['us_reason']); ?></td>
					<td><?php echo htmlentities($vo['us_apply_time']); ?></td>					
															
													
					<td class="td-manage">		
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,2,'gave_status')" href="javascript:;" title="审批"><i class="Hui-iconfont">&#xe634;</i></a>			
						<!-- <a style="text-decoration:none" onclick="record(<?php echo htmlentities($vo['id']); ?>,'edit','会员详情')"  title="会员详情"><i class="Hui-iconfont">&#xe6c6;</i></a>
						<?php if($vo['us_status'] == 1): ?>
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,0,'us_status')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
						<?php else: ?>
						<a onClick="change(<?php echo htmlentities($vo['id']); ?>,1,'us_status')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
						<?php endif; ?>
						<a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'edit','修改用户')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a style="text-decoration:none" onclick="create(<?php echo htmlentities($vo['id']); ?>,'addr','地址列表')" title="地址"><i class="Hui-iconfont">&#xe671;</i></a>
						<a style="text-decoration:none" onclick="del(<?php echo htmlentities($vo['id']); ?>)" title="删除"><i class="Hui-iconfont">&#xe706;</i></a> -->
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
$('select[name="us_level"]').val(<?php echo htmlentities(app('request')->get('us_level')); ?>);

function create(id,url,key){
	var url = "<?php echo url('"+url+"'); ?>?id="+id;
	creatIframe(url,key);
}

function change(id,value,key){
	layer.confirm('确定要审批该代理吗？审批后会创建该代理的节点、公排等...', {
	      btn: ['确定', '取消']
	    }, function(index, layero){
	        $.ajax({
	            type: "post",
	            url: "<?php echo url('approve'); ?>",
	            data: {id:id,value:value,key:key},
	            success: function(data) {
	            	layer.msg(data.msg);
	             	if(data.code){
	             		location.href = '';
	             	}
	             	location.href = '';
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
                setTimeout("window.location=\"<?php echo url('User/index'); ?>\"",300);
            }
        });
    });
}	
</script> 
</body>
</html>
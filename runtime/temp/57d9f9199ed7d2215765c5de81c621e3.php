<?php /*a:3:{s:60:"E:\phpStudy\WWW\dfsl\application\admin\view\admin\index.html";i:1528706137;s:61:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_meta.html";i:1530329592;s:63:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_footer.html";i:1530790557;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<form class="Huiform" method="get" action="">
		<input type="text" class="input-text" style="width:150px" placeholder="工号、账户、手机" value="<?php echo htmlentities((app('request')->get('keywords') ?: '')); ?>" id="" name="keywords">
		<button type="submit" class="btn btn-success" id="" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<!-- <a href="javascript:;" onclick="admin_add('添加','add.html','800','500')" class="btn btn-primary radius"> -->
			<a href="javascript:;" onclick="create(0,'add','添加管理员')" class="btn btn-primary radius">

			<i class="Hui-iconfont">&#xe600;</i> 管理员</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span>
	 </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr class="text-c">
				<th width="60">工号</th>
				<th width="60">姓名</th>
				<th width="120">手机/账号</th>
				
				<th width="90">角色</th>
				<th width="150">添加时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><?php echo htmlentities($vo['ad_work_number']); ?></td>
				<td><?php echo htmlentities($vo['ad_name']); ?></td>
				<td><?php echo htmlentities($vo['ad_tel']); ?></td>
				
				<td>
					<select name="ro_id" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'ro_id')" >
						<?php if(is_array($ro_list) || $ro_list instanceof \think\Collection || $ro_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo htmlentities($v['id']); ?>" <?php if($vo['ro_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo htmlentities($v['ro_name']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td><?php echo htmlentities($vo['add_time']); ?></td>
				<td class="td-status">
					<?php if($vo['status'] == 1): ?>
						<span class="label label-success radius">已启用</span>
					<?php else: ?>
						<span class="label label-default radius">已禁用</span>
					<?php endif; ?>
				</td>
				<td class="td-manage">
					<?php if($vo['status'] == 1): ?>
						<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,0,'status')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
					<?php else: ?>
						<a onClick="change(<?php echo htmlentities($vo['id']); ?>,1,'status')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
					<?php endif; ?>
					<a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'edit','修改管理员')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
					<a onclick="del(<?php echo htmlentities($vo['id']); ?>,'Admin')" style="text-decoration:none"><i class="Hui-iconfont" title="删除">&#xe60b;</i></a>
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
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
// function admin_add(title,url,w,h){
// 	layer_show(title,url,w,h);
// }
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
	             	}else{
	             		layer.msg(data.msg);
	             	}
	            }
	        });
	    });
}

function del(id,key){
    layer.confirm('确定要删除么？', {
      btn: ['确定', '取消']
    }, function(index, layero){
        $.ajax({
            type: "post",
            url: "<?php echo url('Admin/deleteAdmin'); ?>",
            data: {id:id,key:key},
            success: function(data) {
                layer.msg(data.msg);
                if(data.code==1){
                    setTimeout(function(){
                        location.href = data.url;
                    },1000);
                }
            }
        });
    });
}
</script>
</body>
</html>
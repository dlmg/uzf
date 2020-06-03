<?php /*a:3:{s:62:"E:\phpStudy\WWW\dfsl\application\admin\view\product\index.html";i:1536743050;s:61:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_meta.html";i:1530329592;s:63:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_footer.html";i:1530790557;}*/ ?>
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
<style>	
		input{
			width:30px;
			border:none;
		}

</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员管理 <span class="c-gray en">&gt;</span> 会员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
	<form class="Huiform" method="get" action="" target="_self">
		排序：
		<span class="select-box inline">
			<select name="orderby" class="select">
				<option value="">全部</option> 
				<option value="1">热销</option> 
				<option value="2">新品</option>
				<option value="3">价格升序</option>
				<option value="4">价格降序</option>
			</select>
		</span>&nbsp;&nbsp;
		状态：
		<span class="select-box inline">
			<select name="pd_status" class="select">
				<option value="">全部</option>
				<option value="6">热门大图</option>
				<option value="5">热门推荐</option>
				<option value="4">首页显示</option>
				<option value="3">热销商品</option> 
				<option value="2">上架</option> 
				<option value="1">下架</option>
				<option value="0" style="color:red;">仓库</option>
			</select>
		</span>&nbsp;&nbsp;

		<span class="select-box inline">			
			<select name="ca_id" class="select">
				<option value="">全部分类</option> 
				<?php if(is_array($ca_list) || $ca_list instanceof \think\Collection || $ca_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ca_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($vo['id']); ?>">┣<?php echo htmlentities($vo['ca_name']); ?></option>
						<?php $_result=getChild($vo['id']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo htmlentities($voo['id']); ?>">┗━<?php echo htmlentities($voo['ca_name']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>			
		</span>
		<input type="text" class="input-text" style="width:150px" placeholder="商品名称" name="pd_name" value="<?php echo htmlentities((app('request')->get('pd_name') ?: '')); ?>">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="create(0,'add','添加商品')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 商品</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border  table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">				
				<th>产品名称</th>
				<th>所属店铺</th>
				<th>产品缩略图</th>
				<th>零售价格</th>
				
				<th>分类名称</th>
				<th>产品库存</th>
				<th>产品销量</th>
				<th>状态</th>
				<!-- <th>是否代理</th>
				<th>代理数量</th> -->
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">
					<td><?php echo htmlentities($vo['pd_name']); ?></td>
					<td><?php echo htmlentities($vo['st_name_text']); ?></td>
					<td><img src="<?php echo htmlentities($vo['pd_head_pic']); ?>" style="width:60px;height:60px" alt=""></td>
					<td><?php echo htmlentities($vo['pd_price']); ?></td>
															
					<td><?php echo htmlentities($vo['ca_name']); ?></td>
					<td><?php echo htmlentities($vo['pd_inventory']); ?></td>
					<td><?php echo htmlentities($vo['pd_sales']); ?></td>					
					<!-- <td><input type="text" value="<?php echo htmlentities($vo['pd_inventory']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'pd_inventory')"></td>			
					<td><input type="text" value="<?php echo htmlentities($vo['pd_sales']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'pd_sales')"></td> -->			
					<td><select onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'pd_status')">
								<option value="6" <?php if($vo['pd_status'] == 6): ?>selected<?php endif; ?>>热门大图</option>
								<option value="5" <?php if($vo['pd_status'] == 5): ?>selected<?php endif; ?>>热门推荐</option>
								<option value="4" <?php if($vo['pd_status'] == 4): ?>selected<?php endif; ?>>首页显示</option>
								<option value="3" <?php if($vo['pd_status'] == 3): ?>selected<?php endif; ?>>热销商品</option>
								<option value="2" <?php if($vo['pd_status'] == 2): ?>selected<?php endif; ?>>上架</option>
								<option value="1" <?php if($vo['pd_status'] == 1): ?>selected<?php endif; ?>>下架</option>
								<option value="0" <?php if($vo['pd_status'] == 0): ?>selected<?php endif; ?>>仓库</option>
						</select>
					</td>
					<!-- <td><select onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'agency_status')">
								<option value="2" <?php if($vo['agency_status'] == 2): ?>selected<?php endif; ?>>否</option>
								<option value="1" <?php if($vo['agency_status'] == 1): ?>selected<?php endif; ?>>是</option>
						</select>
					</td>
					<?php if($vo['agency_status'] == 1): ?>
					<td><input type="text" value="<?php echo htmlentities($vo['agency_num']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'agency_num')"></td>
					<?php else: ?>
					<td></td>
					<?php endif; ?> -->					
					<td><?php echo htmlentities($vo['pd_add_time']); ?></td>								
					<td class="td-manage">
						<a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'edit','修改商品')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a style="text-decoration:none" onclick="del(<?php echo htmlentities($vo['id']); ?>,'Product')" title="删除"><i class="Hui-iconfont">&#xe706;</i></a>
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
	$('select[name="pd_status"]').val(<?php echo htmlentities(app('request')->get('pd_status')); ?>);
	$('select[name="orderby"]').val(<?php echo htmlentities(app('request')->get('orderby')); ?>);
	$('select[name="ca_id"]').val(<?php echo htmlentities(app('request')->get('ca_id')); ?>);
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
	            	console.log(data);
	             	if(data.code == 2){
	             		layer.msg('超过最大限制');
	             	}else if(data.code == 1){             		
	             		location.href = '';
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
            url: "<?php echo url('dodelete'); ?>",
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
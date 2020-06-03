<?php /*a:3:{s:61:"D:\phpStudy\WWW\dfsl\application\admin\view\product\cate.html";i:1536976716;s:61:"D:\phpStudy\WWW\dfsl\application\admin\view\public\_meta.html";i:1530329594;s:63:"D:\phpStudy\WWW\dfsl\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>商品管理 <span class="c-gray en">&gt;</span> 商品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="create(0,'cate_add','添加分类')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 分类</a>
		</span>
		<!-- <span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> --> </div>
	<div class="mt-20">
	<table class="table table-border  table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th>ID</th>
				<th>排序</th> 
				<th>分类名称</th>
				<!-- <th>所属大类</th> -->
				<!-- <th>分类公排</th> -->
				<th>分类图标</th>
				<th>分类状态</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">
					<td><?php echo htmlentities($vo['id']); ?></td>
					<td><input type="text" value="<?php echo htmlentities($vo['ca_sort']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'ca_sort')" style="width:60px"></td>		
					<td>┣&nbsp;<input type="text" value="<?php echo htmlentities($vo['ca_name']); ?>" onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'ca_name')"></td>
					<!-- <td><select onchange="change(<?php echo htmlentities($vo['id']); ?>,$(this).val(),'ca_ca')">
								<option value="3" <?php if($vo['ca_ca'] == 3): ?>selected<?php endif; ?>>A类产品</option>
								<option value="2" <?php if($vo['ca_ca'] == 2): ?>selected<?php endif; ?>>B类产品</option>
								<option value="1" <?php if($vo['ca_ca'] == 1): ?>selected<?php endif; ?>>C类产品</option>
						</select>
					</td> -->
					<!-- <td><a href="javascript:;" onclick="showCateLine(<?php echo htmlentities($vo['id']); ?>)">[点击查看]</a></td> -->
					<td><img src="<?php echo htmlentities($vo['ca_pic']); ?>" style="width:60px;height:60px" alt="">
					</td>
					<td class="td-status">
						<?php if($vo['ca_status'] == 1): ?>
							<span class="label label-success radius">已启用</span>
						<?php else: ?>
							<span class="label label-default radius">已禁用</span>
						<?php endif; ?>
					</td>
					<td><?php echo htmlentities($vo['ca_add_time']); ?></td>
					<td class="td-manage">
						<?php if($vo['ca_status'] == 1): ?>
							<a style="text-decoration:none" onClick="change(<?php echo htmlentities($vo['id']); ?>,0,'ca_status')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
						<?php else: ?>
							<a onClick="change(<?php echo htmlentities($vo['id']); ?>,1,'ca_status')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
						<?php endif; ?>
						<a style="text-decoration:none" onclick="del(<?php echo htmlentities($vo['id']); ?>,'Cate')" title="删除"><i class="Hui-iconfont">&#xe706;</i></a>
						<a style="text-decoration:none" onclick="create(<?php echo htmlentities($vo['id']); ?>,'cate_edit','修改分类')" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<!-- <a href="<?php echo url('excel'); ?>" title="下载"><i class="Hui-iconfont">&#xe706;</i></a> -->
					</td>
				</tr>

				<?php $_result=getChild($vo['id']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td><?php echo htmlentities($voo['id']); ?></td>
						<td><input type="text" value="<?php echo htmlentities($voo['ca_sort']); ?>" onchange="change(<?php echo htmlentities($voo['id']); ?>,$(this).val(),'ca_sort')" style="width:60px"></td>	
						<!-- <td><input type="text" value="<?php echo htmlentities($voo['ca_sort']); ?>" onchange="change(<?php echo htmlentities($voo['id']); ?>,$(this).val(),'ca_sort')"></td> -->			
						<td> ┗━&nbsp;<input type="text" value="<?php echo htmlentities($voo['ca_name']); ?>" onchange="change(<?php echo htmlentities($voo['id']); ?>,$(this).val(),'ca_name')"></td>
						<!-- <td><select disabled="disabled">
								<option value="3" <?php if($vo['ca_ca'] == 3): ?>selected<?php endif; ?>>A类产品</option>
								<option value="2" <?php if($vo['ca_ca'] == 2): ?>selected<?php endif; ?>>B类产品</option>
								<option value="1" <?php if($vo['ca_ca'] == 1): ?>selected<?php endif; ?>>C类产品</option>
							</select>
						</td> -->
						<td><img src="<?php echo htmlentities($voo['ca_pic']); ?>" style="width:60px;height:60px" alt=""></td>
						<td class="td-status">
							<?php if($voo['ca_status'] == 1): ?>
								<span class="label label-success radius">已启用</span>
							<?php else: ?>
								<span class="label label-default radius">已禁用</span>
							<?php endif; ?>
						</td>
						<td><?php echo htmlentities($voo['ca_add_time']); ?></td>
						<td class="td-manage">
							<?php if($voo['ca_status'] == 1): ?>
								<a style="text-decoration:none" onClick="change(<?php echo htmlentities($voo['id']); ?>,0,'ca_status')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
							<?php else: ?>
								<a onClick="change(<?php echo htmlentities($voo['id']); ?>,1,'ca_status')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
							<?php endif; ?>
							<a style="text-decoration:none" onclick="del(<?php echo htmlentities($voo['id']); ?>,'Cate')" title="删除"><i class="Hui-iconfont">&#xe706;</i></a>
							<a style="text-decoration:none" onclick="create(<?php echo htmlentities($voo['id']); ?>,'cate_edit','修改分类')" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<!-- <a href="<?php echo url('excel'); ?>" title="下载"><i class="Hui-iconfont">&#xe706;</i></a> -->
						</td>
					</tr>
				<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
		</tbody>

	</table>
	<div class="pages" style="margin:20px;float: right; "><?php echo $list; ?></div>
	</div>
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
	            url: "<?php echo url('catechange'); ?>",
	            data: {id:id,value:value,key:key},
	            success: function(data) {
	             	if(data.code){
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
            url: "<?php echo url('catedelete'); ?>",
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
function showCateLine(id){
	var url = "<?php echo url('showCateLine'); ?>?id="+id;
	layer_show('分类公排图',url);
	//layer_show('发货页面',url,'600','300');
}
function eee(dada) {
        var data = new FormData();
        data.append('file', dada[0].files[0]);
        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
        $.ajax({
            url: '<?php echo url("upload"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                layer.msg(data.msg);
                if (data.code) {
                    $('.logo').attr('src',data.data);
                    $('input[name="pd_head_pic"]').val(data.data);
                }
                layer.close(index);
            },
            error: function() {
                layer.close(index);
                layer.msg('上传出错');
            }
        });
    }
    function cate_pic(id,value,key){	
    $.ajax({
        type: "post",
        url: "<?php echo url('catechange'); ?>",
        data: {id:id,value:value,key:key},
        success: function(data) {
         	if(data.code){
         		location.href = '';
         	}
        }
    });
}
</script>
</body>
</html>

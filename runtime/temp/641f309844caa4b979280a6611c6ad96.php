<?php /*a:3:{s:62:"D:\phpStudy\WWW\cjt\application\admin\view\admin\role_add.html";i:1528539394;s:60:"D:\phpStudy\WWW\cjt\application\admin\view\public\_meta.html";i:1530329594;s:62:"D:\phpStudy\WWW\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<input type="text" class="hidden" name="id" value="<?php echo htmlentities((isset($info['id']) && ($info['id'] !== '')?$info['id']:'')); ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities((isset($info['ro_name']) && ($info['ro_name'] !== '')?$info['ro_name']:'')); ?>" name="ro_name" style="width:20%">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities((isset($info['ro_description']) && ($info['ro_description'] !== '')?$info['ro_description']:'')); ?>" name="ro_description" style="width:20%">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">拥有权限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if(is_array($ru_list) || $ru_list instanceof \think\Collection || $ru_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ru_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name="rules[]" id="user-Character-1" class="authrule"><?php echo htmlentities($vo['title']); ?>
						</label>
					</dt>
					<dd>
						<dl class="cl permission-list2">
							<dd>
								<?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
								<label class="">
									<input type="checkbox" value="<?php echo htmlentities($sub['id']); ?>" name="rules[]" id="user-Character-1-0-0" class="authrule">
									<?php echo htmlentities($sub['title']); ?></label>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</dd>
						</dl>
					</dd>
				</dl>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save" onclick="return add()"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
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
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
		//选中验证节点
		var rules = [<?php echo htmlentities((isset($info['ro_rules']) && ($info['ro_rules'] !== '')?$info['ro_rules']:"")); ?>];
		console.log(rules);
		$('.authrule').each(function(){
			if( $.inArray( parseInt(this.value,10),rules )>-1 ){
				$(this).attr('checked',true);
			}
		});
	

});

function add(){
	var title       = $('input[name="ro_name"]').val();
	var description = $('input[name="ro_description"]').val();
	if(title == ''){layer.msg('请完善信息');}

	$.post("<?php echo url('roleIndex'); ?>",$('form').serialize()).success(function(data){
		layer.msg(data.msg);
		if(data.code){
			setTimeout(function(){
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);
			},500);
			
		}
	});
	return false;
}



</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
<?php /*a:3:{s:62:"D:\phpStudy\WWW\dfsl\application\admin\view\setting\index.html";i:1537844864;s:61:"D:\phpStudy\WWW\dfsl\application\admin\view\public\_meta.html";i:1530329594;s:63:"D:\phpStudy\WWW\dfsl\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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

<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	基本设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" onclick="ooo()" title="清楚缓存" ><i class="Hui-iconfont">&#xe706;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
				<!-- <span>对公账户</span> -->
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站状态：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="radio-box">
							<input name="status" type="radio" value="1" id="">
							<label for="sex-1">在线</label>
						</div>
						<div class="radio-box">
							<input type="radio" value="0" id="" name="status">
							<label for="sex-2" class="c-red">关闭</label>
						</div>
					</div>
				</div>
				<!-- <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						银行卡姓名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_person"  value="<?php echo cache('setting')['bank_person']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						银行卡号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_num"  value="<?php echo cache('setting')['bank_num']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						开户银行：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_name"  value="<?php echo cache('setting')['bank_name']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						开户行地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_addr"  value="<?php echo cache('setting')['bank_addr']; ?>" class="input-text" style="width:20%">
					</div>
				</div> -->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						提现手续费比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="fee"  value="<?php echo cache('setting')['fee']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						提现最低额度：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="lowest"  value="<?php echo cache('setting')['lowest']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						综合费用比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="sb"  value="<?php echo cache('setting')['sb']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<!-- <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						直推奖励比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award1"  value="<?php echo cache('setting')['award1']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代推荐奖励比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award2"  value="<?php echo cache('setting')['award2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代到九代推荐奖励比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award1"  value="<?php echo cache('setting')['award1']; ?>" class="input-text" style="width:20%">
					</div>
				</div> -->
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="return saveConfig();" class="btn btn-primary radius" type="submit"><i clsass="Hui-iconfont">&#xe632;</i> 保存</button>
				<button class="btn btn-default radius rst" type="reset">&nbsp;&nbsp;重置&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
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
$('.form input[name="status"][value='+"<?php echo cache('setting')['status']; ?>"+']').attr("checked",true);

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
});
// /setting/saveinfo
function saveConfig(){
	$.post("<?php echo url('setting/index'); ?>",$('.form').serialize()).success(function(data){
		layer.msg(data.msg);
		if(!data.code){
			$('.rst').click();
		}
	});
	return false;
}
function ooo(){
	$.post("<?php echo url('every/clear'); ?>").success(function(data){
		layer.msg('清除成功');
	});
	return false;
}
$("#file_upload").change(function() {
        //提交
        var data = new FormData();
        // console.log($(this)[0].files[0]);
        data.append('img',$(this)[0].files[0]);
        $.ajax({
            url: '<?php echo url("tupian"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
            	if(data.code){
            		$('#background').val(data.data);
                	$('.preview').attr('src', data.data);
            	}else{
            		layer.msg(data.msg);
            	}
            	
            },
            error: function() {
                layer.msg('上传出错');
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

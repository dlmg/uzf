<?php /*a:3:{s:75:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\setting\award.html";i:1558321953;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;s:76:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<style type="text/css">
	.award{
		display: flex;
		justify-content: flex-start;
		flex-wrap: wrap;

	}
	.award .row{
		width:20%;
		display: block;
	}
	.award .row .form-label{
		width: 50%;
		padding: 0;
		
	}
	/*.row label{
		width: 20%;
	}*/
	.award .row .formControls{
		width: 50%;
		padding: 0;
	}
	.award .row .formControls>input{
		width: 100% !important;
	}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	奖励设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" onclick="ooo()" title="清楚缓存" ><i class="Hui-iconfont">&#xe706;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<!-- <div class="tabBar cl">
				<span>洗护奖励</span>
				<span>保健品奖励</span>
				<span>化妆品奖励</span> 
				<span>彩妆</span>
				<span>即将上市奖励</span>
			</div> -->
			<div class="c-red">提示：所有提成按百分比计算（%）</div>
			<div class="tabCon ">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						报单提成（非3的倍数）（直推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award1"  value="<?php echo cache('setting')['award1']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						报单提成（3的倍数）（直推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award2"  value="<?php echo cache('setting')['award2']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						报单提成（间推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award3"  value="<?php echo cache('setting')['award3']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						复购提成（直推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award4"  value="<?php echo cache('setting')['award4']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						复购提成（间推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award5"  value="<?php echo cache('setting')['award5']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						特惠专区提成（直推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award6"  value="<?php echo cache('setting')['award6']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						特惠专区提成（间推）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award7"  value="<?php echo cache('setting')['award7']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						月底分红提成（3-17人）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award8"  value="<?php echo cache('setting')['award8']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						月底分红提成（18-59人）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award9"  value="<?php echo cache('setting')['award9']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						月底分红提成（60人以上）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award10"  value="<?php echo cache('setting')['award10']; ?>" class="input-text" style="width:10%">
					</div>
				</div>
				
		<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						开户银行地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_addr"  value="" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						收款账户：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_number"  value="" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						公司名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="company"  value="" class="input-text" style="width:20%">
					</div>
				</div>
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
	$.post("<?php echo url('setting/award'); ?>",$('.form').serialize()).success(function(data){
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

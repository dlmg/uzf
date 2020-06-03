<?php /*a:3:{s:63:"D:\phpStudy\WWW\szsc\application\admin\view\datalist\index.html";i:1533001661;s:61:"D:\phpStudy\WWW\szsc\application\admin\view\public\_meta.html";i:1530329592;s:63:"D:\phpStudy\WWW\szsc\application\admin\view\public\_footer.html";i:1530790557;}*/ ?>
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

<title>数据管理</title>
<style type="text/css">
	.tabBar span.current a{
		color: #fff;
		text-decoration: none;
	}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	数据管理
	<span class="c-gray en">&gt;</span>
	数据管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" onclick="ooo()" title="清楚缓存" ><i class="Hui-iconfont">&#xe706;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<!-- <span onclick=href('44')><a href="<?php echo url('Datalist/index'); ?>?ca_id = 44">洗护</a></span>
				<span onclick=href('45')><a href="<?php echo url('Datalist/index'); ?>?ca_id = 45">保健品</a></span>
				<span onclick=href('43')><a href="<?php echo url('Datalist/index'); ?>?ca_id = 43">化妆品</a></span>
				<span onclick=href('46')><a href="<?php echo url('Datalist/index'); ?>?ca_id = 46">彩妆</a></span>
				<span onclick=href('48')><a href="<?php echo url('Datalist/index'); ?>?ca_id = 48">即将上市</a></span> -->
				<span>洗护</span>
				<span>保健品</span>
				<span>化妆品</span>
				<span>彩妆</span>
				<span>即将上市</span>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日激活：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['0']['data']['todaybind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['0']['data']['bind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日扫码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['0']['data']['todaystart']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						扫码总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['0']['data']['start']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活结余：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['0']['data']['remain']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日激活：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['1']['data']['todaybind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['1']['data']['bind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日扫码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['1']['data']['todaystart']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						扫码总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['1']['data']['start']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活结余：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['1']['data']['remain']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日激活：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['2']['data']['todaybind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['2']['data']['bind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日扫码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['2']['data']['todaystart']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						扫码总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['2']['data']['start']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活结余：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['2']['data']['remain']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日激活：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['3']['data']['todaybind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['3']['data']['bind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日扫码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['3']['data']['todaystart']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						扫码总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['3']['data']['start']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活结余：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['3']['data']['remain']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日激活：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['4']['data']['todaybind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"   value="<?php echo htmlentities($data['4']['data']['bind']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						今日扫码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['4']['data']['todaystart']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						扫码总数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['4']['data']['start']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						激活结余：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text"  value="<?php echo htmlentities($data['4']['data']['remain']); ?>" class="input-text" style="width:20%">
					</div>
				</div>
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
function href(val){
	window.location.href="<?php echo url('Datalist/index'); ?>?ca_id="+val;
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

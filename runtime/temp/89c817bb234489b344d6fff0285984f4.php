<?php /*a:3:{s:57:"E:\phpStudy\WWW\dfsl\application\admin\view\news\add.html";i:1533805814;s:61:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_meta.html";i:1530329592;s:63:"E:\phpStudy\WWW\dfsl\application\admin\view\public\_footer.html";i:1530790557;}*/ ?>
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
	<form class="form form-horizontal" id="form-admin-add"> 
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>摘要：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="simple">
		</div>
	</div>
	<div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题图片：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div style="width:110px;height: 110px;position: relative;display: inline-block; ">
                        <img src="/static/admin/img/add0.png" alt="" class="logo" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;">
                        <input type="file" name="file" onchange="eee($(this))" class="input-text" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;opacity: 0;">
                    </div>
                </div>
            </div>
            <div style="display:none" class="ttt">
                <input type="text" name="pic" value="">
            </div>
	<div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">内容：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea id="editor" type="text/plain" style="width:100%;height:400px;" name="content" >
            </textarea>
        </div>
    </div>
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>内容：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="content" cols="150" rows="20"></textarea>
		</div>
	</div> -->
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="return add()">
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
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
//     $(function() {
//         var ue = UE.getEditor('editor');
        
//         $('.skin-minimal input').iCheck({
//             checkboxClass: 'icheckbox-blue',
//             radioClass: 'iradio-blue',
//             increaseArea: '20%'
//         }); 
// <script type="text/javascript">
$(function(){
	var ue = UE.getEditor('editor');
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
});


function add(){

	$.post("<?php echo url('add'); ?>",$('form').serialize()).success(function(data){
		layer.msg(data.msg);
		if(data.code){
			setTimeout(function(){
				//location.href=reload();
				location.href='';
			},1000);
			
		}
	});
	return false;
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
                    $('input[name="pic"]').val(data.data);
                }
                layer.close(index);
            },
            error: function(data) {
            	//console.log(data)
                layer.close(index);
                layer.msg('上传出错');
            }
        });
    }

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
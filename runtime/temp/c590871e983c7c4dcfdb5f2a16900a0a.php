<?php /*a:3:{s:61:"D:\phpstudy_pro\WWW\uzf\application\admin\view\user\edit.html";i:1585640422;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<link href="/static/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员管理 <span class="c-gray en">&gt;</span> 会员修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-article-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">推荐人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($info['us_pid_text']); ?>" style="width:20%" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">昵称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="us_nickname" value="<?php echo htmlentities($info['us_nickname']); ?>" class="input-text" style="width:20%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">真实姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="us_realname" value="<?php echo htmlentities($info['us_realname']); ?>" class="input-text" style="width:20%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">手机号码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($info['us_tel']); ?>" name="us_tel" style="width:20%">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">身份证：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($info['us_id_card']); ?>" name="us_id_card" style="width:20%">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div style="width:110px;height: 110px;position: relative;display: inline-block; ">
                    <?php if($info['us_head_pic']): ?>
                        <img src="<?php echo htmlentities($info['us_head_pic']); ?>" class="logo" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;">
                    <?php else: ?>
                        <img src="/static/admin/img/add0.png" class="logo" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;">
                    <?php endif; ?>
                    <input type="file" name="file" onchange="eee($(this))" class="input-text" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;opacity: 0;">
                </div>
            </div>
        </div>
        <div style="display:none" class="ttt">
                <input type="text" name="us_head_pic" value="<?php echo htmlentities($info['us_head_pic']); ?>">
                <input type="text" name="id" value="<?php echo htmlentities($info['id']); ?>">
            </div>
		
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">登录密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" name="us_pwd" style="width:20%" >
            </div>
        </div>
        <!-- <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">安全密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name="us_safe_pwd" style="width:20%">
            </div>
        </div> -->

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="return savePro();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 确认提交</button>
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

function savePro(){
    $.post('<?php echo url("edit"); ?>',$('#form-article-add').serialize()).success(function(data){
    	layer.msg(data.msg);
    	if(data.code){
    		setTimeout(function(){
    			location.href = data.url;
    		},500);
    	}
    });
    return false;
}
function eee(dada) {
        var data = new FormData();
        data.append('file', dada[0].files[0]);
        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
        $.ajax({
            url: '<?php echo url("store/upload"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                layer.msg(data.msg);
                if (data.code) {
                    $('.logo').attr('src',data.data);
                    $('input[name="us_head_pic"]').val(data.data);
                }
                layer.close(index);
            },
            error: function() {
                layer.close(index);
                layer.msg('上传出错');
            }
        });
    }
</script>
</body>
</html>
<?php /*a:3:{s:62:"D:\phpstudy_pro\WWW\uzf\application\admin\view\admin\edit.html";i:1528539376;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
            <input type="text" class="hidden" name="id" value="<?php echo htmlentities((isset($info['id']) && ($info['id'] !== '')?$info['id']:'')); ?>">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机/账号：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo htmlentities((isset($info['ad_tel']) && ($info['ad_tel'] !== '')?$info['ad_tel']:'')); ?>" name="ad_tel" style="width:20%">
                </div>
            </div>
             <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo htmlentities((isset($info['ad_name']) && ($info['ad_name'] !== '')?$info['ad_name']:'')); ?>" name="ad_name" style="width:20%">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>登录密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" id="phone" name="ad_pwd" style="width:20%">
                </div>
            </div>
            <!-- <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                    <span class="select-box" style="width:20%">
                        <select name="ro_id"  class="select">
                            <option value="" >选择角色</option>
                            <?php if(is_array($ro_list) || $ro_list instanceof \think\Collection || $ro_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($info['ro_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['ro_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </span>
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
    <script type="text/javascript">

    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });
    function add(){
        $.post("<?php echo url('edit'); ?>", $('form').serialize()).success(function(data) {
            layer.msg(data.msg);
            if (data.code) {
                setTimeout(function() {
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                }, 500);
            }
        });
        return false;
    }
    </script>
</body>

</html>
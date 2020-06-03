<?php /*a:3:{s:66:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\vote\vote.html";i:1587104247;s:69:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\public\_meta.html";i:1530329594;s:71:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<link href="__STATIC__/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>投票管理 <span
        class="c-gray en">&gt;</span> 发起投票 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                                              href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form class="form form-horizontal" id="form-article-add">
        <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>"/>
        <input type="hidden" name="apply_type" value="2"/>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投票主题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="填写投票主题" name="name" id="name" style="width:20%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投票类型：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width:20%">
                <select name="type" class="select" id="leixing" onchange="javascript:doit();">
                    <option value="">选择投票类型</option>
                    <option value="1">发布道具卡、奖励</option>
                    <option value="2">系统功能管理</option>
                    <option value="3">选举超级节点</option>
                </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>开始时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text Wdate" name="start" id="countTimestart" onfocus="selecttime(1)"
                       value="<?php echo htmlentities((app('request')->get('end') ?: '')); ?>" size="17" class="date" readonly style="width:140px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>结束时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text Wdate" name="end" id="countTimeend" onfocus="selecttime(2)"
                       value="<?php echo htmlentities((app('request')->get('end') ?: '')); ?>" size="17" class="date" readonly style="width:140px;">
            </div>
        </div>
        <div class="row cl" id="need" style="display: none">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所需资金：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name="need" style="width:20%">
            </div>
        </div>
        <div class="row cl" id="us_type">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>参与范围：</label>
            <dl class="cl permission-list2">
                <dd>
                    <label class="">
                        <input type="checkbox" class="authrule" name="levels[]" value="4">超级节点</label>&nbsp;
                    <label class="">
                        <input type="checkbox" class="authrule" name="levels[]" value="3" checked>系统服务商</label>&nbsp;
                    <label class="">
                        <input type="checkbox" class="authrule" name="levels[]" value="2">商家</label>&nbsp;
                    <label class="">
                        <input type="checkbox" class="authrule" name="levels[]" value="1">普通会员</label>&nbsp;
                <dd>
            </dl>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onclick="return add();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>
                    确认提交
                </button><!--  -->
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
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript">
    function doit() {
        var obj=document.getElementById("leixing");
        var sel_val = obj.options[obj.selectedIndex].value;
        if (sel_val=='') {
            var div = document.getElementById("need");
            div.style.display="block";
            var us_type = document.getElementById("us_type");
            us_type.style.display="block";
        }
        if (sel_val==1) {
            var div = document.getElementById("need");
            div.style.display="block";
            var us_type = document.getElementById("us_type");
            us_type.style.display="block";
        }
        if (sel_val==2) {
            var div = document.getElementById("need");
            div.style.display="none";
            var us_type = document.getElementById("us_type");
            us_type.style.display="block";
        }
        if (sel_val==3) {
            var us_type = document.getElementById("us_type");
            us_type.style.display="none";
        }

    }

    function add() {
        $.post('<?php echo url("vote"); ?>', $('#form-article-add').serialize()).success(function (data) {
            layer.msg(data.msg);
            if (data.code) {
                setTimeout(function () {
                    location.href = '';
                }, 1000);
            }
        });
        return false;
    }

    function selecttime(flag) {
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDate();
        var hour = date.getHours();
        var minute = date.getMinutes();
        var minTime = year + '-' + month + '-' + day + ' ' + hour + ':' + minute;
        if (flag == 1) {
            var endTime = $("#countTimeend").val();
            if (endTime != "") {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', maxDate: endTime})
            } else {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: minTime})
            }
        } else {
            var startTime = $("#countTimestart").val();
            if (startTime != "") {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: startTime})
            } else {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: minTime})
            }
        }
    }
</script>
</body>
</html>
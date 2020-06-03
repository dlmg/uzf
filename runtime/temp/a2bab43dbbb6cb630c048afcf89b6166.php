<?php /*a:3:{s:62:"D:\phpstudy_pro\WWW\uzf\application\admin\view\user\apply.html";i:1586748535;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<style type="text/css">
    .inp {
        width: 150px;
        height: 25px;
    }
    .inp:focus {
        outline:none;
        border: 1px solid red;
    }
</style>
</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员管理 <span class="c-gray en">&gt;</span> 商户申请列表
    <a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px;margin-right:6px " onclick="excel()" title="导出"><i class="Hui-iconfont">&#xe644;</i></a>
</nav>
<div class="page-container">
    <div class="text-c">
        <form class="Huiform" method="get" action="" target="_self">
            状态：
            <span class="select-box inline">
			<select name="us_status" class="select">
				<option value="">全部</option>
				<option value="1">正常</option>
				<option value="0" style="color:red;">被禁用</option>
			</select>
		</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- 类型：
            <span class="select-box inline">
                <select name="gave_status" class="select">
                    <option value="">全部</option>
                    <option value="0">会员</option>
                    <option value="1">审核中</option>
                    <option value="2">商家</option>
                </select>
            </span> -->
            <input type="text" class="input-text" style="width:150px" placeholder="备注名、账号、手机号" id="" name="keywords" value="<?php echo htmlentities((app('request')->get('keywords') ?: '')); ?>">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">

        <span class="r" style="margin: 10px">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border  table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th>会员名称</th>
                <th>申请商户名称</th>
                <th>商户类别</th>
                <th>详细地址</th>
                <th>店铺环境</th>
                <th>负责人</th>
                <th>负责人联系电话</th>
                <th>审核状态</th>
                <th>申请时间</th>
                <th>通过时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo htmlentities($vo['user_id_text']); ?></td>
                <td><?php echo htmlentities($vo['merchant_name']); ?></td>
                <td><?php echo htmlentities($vo['merchant_style_text']); ?></td>
                <td><?php echo htmlentities($vo['address']); ?></td>
                <td><?php echo htmlentities($vo['environment']); ?></td>
                <td><?php echo htmlentities($vo['person_in_charge']); ?></td>
                <td><?php echo htmlentities($vo['telephone']); ?></td>
                <td><?php echo htmlentities($vo['status_text']); ?></td>
                <td><?php echo htmlentities($vo['start_time']); ?></td>
                <td><?php echo htmlentities($vo['apply_time']); ?></td>
                <td class="td-manage">
<!--                    <a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'edit','修改用户')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>-->
                    <a style="text-decoration:none" onclick="del(<?php echo htmlentities($vo['id']); ?>)" title="删除"><i class="Hui-iconfont">&#xe706;</i></a>
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
        $('select[name="us_status"]').val(<?php echo htmlentities(app('request')->get('us_status')); ?>);
        $('select[name="gave_status"]').val(<?php echo htmlentities(app('request')->get('gave_status')); ?>);


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
                        if(data.code){
                            location.href = '';
                        }
                    }
                });
            });
        }



        function del(id){
            layer.confirm('确定要删除么？', {
                btn: ['确定', '取消']
            }, function(index, layero){
                $.ajax({
                    type: "post",
                    url: "<?php echo url('delete'); ?>",
                    data: {id:id},
                    success: function(data) {
                        layer.msg(data.msg);
                        setTimeout("window.location=\"<?php echo url('User/index'); ?>\"",500);
                    }
                });
            });
        }

        function excel(){
            var url = "<?php echo url('excel'); ?>";
            creatIframe(url,'表格导出');
        }
    </script>
</body>
</html>
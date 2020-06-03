<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\uzf\application\admin\view\admin\role_index.html";i:1586506839;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<title>角色管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 权限管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray"> 
        	 <span class="l">
        		<a class="btn btn-primary radius" href="javascript:;" onclick="create('0','roleAdd','添加角色')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a>
        	</span>
        </div>
        <table class="table table-border table-bordered table-hover table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="6">角色管理</th>
                </tr>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th width="200">角色名</th>
                    <th width="300">描述</th>
                    <th width="70">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['ro_name']); ?></td>
                    <td><?php echo htmlentities($vo['ro_description']); ?></td>
                    <td class="f-14"><a title="编辑" href="javascript:;" onclick="create(<?php echo htmlentities($vo['id']); ?>,'roleAdd','角色修改')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
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
    <script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    function create(id, url, key) {
        var url = "<?php echo url('" + url + "'); ?>?id=" + id;
        creatIframe(url, key);
    }
    /*管理员-角色-删除*/
    function admin_role_del(obj, id) {
        layer.confirm('角色删除须谨慎，确认要删除吗？', function(index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', { icon: 1, time: 1000 });
                },
                error: function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    </script>
</body>

</html>
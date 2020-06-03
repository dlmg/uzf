<?php /*a:3:{s:67:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\vote\index.html";i:1587454374;s:69:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\public\_meta.html";i:1530329594;s:71:"D:\phpstudy_pro\WWW\uzf1\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>投票管理 <span class="c-gray en">&gt;</span> 投票列表
    <!-- <a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:void(0);" onclick="downdo()" title="下载" ><i class="Hui-iconfont">&#xe640;</i></a>&nbsp;&nbsp; -->
    <a class="btn btn-success radius r" style="line-height:1.5em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px;margin-right:6px " onclick="excel()" title="导出"><i class="Hui-iconfont">&#xe644;</i></a>
</nav>
<div class="page-container">
    <div class="text-c">
        <form class="Huiform" method="get" action="" target="_self">
            &nbsp;&nbsp;&nbsp;
            <input type="text" class="input-text" style="width:150px" placeholder="投票主题" id="" name="keywords" value="<?php echo htmlentities((app('request')->get('keywords') ?: '')); ?>">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">

        <span class="r" style="margin: 10px">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border  table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th>投票主题</th>
                <th>投票类型</th>
                <th>发起人</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>参与人数</th>
                <th>投票结果</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo htmlentities($vo['name']); ?></td>
                <?php if($vo['type'] == 1): ?>
                <td>发布道具卡、奖励</td>
                <?php elseif($vo['type'] == 2): ?>
                <td>系统功能管理</td>
                <?php elseif($vo['type'] == 3): ?>
                <td>选举超级节点</td>
                <?php endif; ?>
                <td><?php echo htmlentities($vo['user_name']); ?></td>
                <td><?php echo htmlentities($vo['add_time']); ?></td>
                <td><?php echo htmlentities($vo['end_time']); ?></td>
                <td><?php echo htmlentities($vo['person_num']); ?></td>
                <?php if($vo['status']==-1): ?>
                <td><span class="label label-warning">未通过</span></td>
                <?php elseif($vo['status']==2): ?>
                <td><span class="label label-primary">进行中</span></td>
                <?php elseif($vo['status']==0): ?>
                <td><span class="label label-info">未开始</span></td>
                <?php elseif($vo['status']==1): ?>
                <td><span class="label label-success">已通过</span></td>
                <?php endif; ?>
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
        function excel(){
            var url = "<?php echo url('excel'); ?>";
            creatIframe(url,'表格导出');
        }
    </script>
</body>
</html>
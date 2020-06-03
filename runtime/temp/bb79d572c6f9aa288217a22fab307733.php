<?php /*a:3:{s:72:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\news\index.html";i:1557106194;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;s:76:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<title>公告列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 客户留言 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c"> 
		<input type="text" class="input-text" style="width:250px" placeholder="输入用户名称" id="" name="us_name">
		<button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i>搜用户</button>
	</div> -->
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	<!-- 	<span class="l">
			<a href="javascript:;" onclick="create(0,'add','添加新闻')" class="btn btn-primary radius">
			<i class="Hui-iconfont">&#xe600;</i> 添加新闻</a>
		</span> --> 
		<span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">留言列表</th>
			</tr>
			<tr class="text-c">
				<th width="150">添加时间</th>
				<th width="90">留言</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><?php echo htmlentities($vo['add_time']); ?></td>
				<td><?php echo htmlentities($vo['content']); ?></td>
				<td class="td-manage">
					
					<a title="删除" onclick="aaa(<?php echo htmlentities($vo['id']); ?>)"><i class="Hui-iconfont">&#xe60b;</i></a> 
					<a style="text-decoration:none" onclick="edit(<?php echo htmlentities($vo['id']); ?>,'edit','查看')"  title="查看"><i class="Hui-iconfont">&#xe6df;</i></a>
						
					<!-- <a style="text-decoration:none" onclick="edit(<?php echo htmlentities($vo['id']); ?>,'see','查看')"  title="查看"><i class="Hui-iconfont">&#xe616;</i></a>	 -->
				</td>
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
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
 	function aaa(data){
        layer.confirm('确定要删除么？', {
          btn: ['确定', '取消'] //可以无限个按钮
        }, function(index, layero){
            $.ajax({
                type: "post",
                url: "<?php echo url('del'); ?>",
                data: {id:data},
                success: function(data) {
                    console.log(data);
                    layer.msg(data.msg);
                    if(data.code=='1'){
                        setTimeout(function(){
                            location.href = data.url;
                        },1000);
                    }
                }
            });
            return false;
    	});
    }
     function edit(id,url,key){
		var url = "<?php echo url('"+url+"'); ?>?id="+id;
		creatIframe(url,key);
	}
	function create(id,url,key){
		var url = "<?php echo url('"+url+"'); ?>?id="+id;
		creatIframe(url,key);
	}
</script>
</body>
</html>
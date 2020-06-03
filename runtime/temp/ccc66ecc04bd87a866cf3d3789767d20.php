<?php /*a:2:{s:75:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\index\welcome.html";i:1585359024;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<div class="f-14 c-error" style="margin:20px auto;">特别声明：为避免一些兼容问题，建议您使用Chrome浏览器、及含有急速内核的浏览器等打开本后台。</div>

	<!-- <?php if(app('session')->get('admin.id') == 2): ?> -->
	<!-- 会员信息统计 -->
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr class="text-c">
				<th colspan="8" scope="col" >信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>会员</th>
				<th>商家</th>
				<th>系统服务商</th>
				<th>超级节点</th>

				<!-- <th>今日新进</th>
				<th>本月新进</th> -->
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo htmlentities($data['all']); ?></td>
				<td><?php echo htmlentities($data['pt']); ?></td>
				<td><?php echo htmlentities($data['one']); ?></td>
				<td><?php echo htmlentities($data['two']); ?></td>
<!--				<td><?php echo htmlentities($data['three']); ?></td>-->
				<!-- <td><?php echo htmlentities($data['today']); ?></td>
				<td><?php echo htmlentities($data['month']); ?></td> -->
			</tr>
		</tbody>
	</table>
	<!-- 账户金额信息 -->
	<!-- <table class="table table-border table-bordered table-bg" style="margin-top: 20px;">
		<thead>
			<tr class="text-a">
				<th>统计</th>
				<th>s数目</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-a">
				<td>购物币</td>
				<td>2</td>
			</tr>
			<tr class="text-a">
				<td>今日购买</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>佣金</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>今日提现</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>订单</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>今日完成</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>订单金额</td>
				<td>3</td>
			</tr>
			<tr class="text-a">
				<td>今日金额</td>
				<td>3</td>
			</tr>
		</tbody>
	</table>
	<?php endif; ?> -->
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
<!--				<th colspan="2" scope="col">服务器信息</th>-->
				<th width="30%" scope="col">服务器操作系统</th>
				<td style="margin-left: 10px;"><?php echo htmlentities($data['server']); ?></td>
			</tr>

		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器域名</th>
				<td><span id="lbServerName"><?php echo htmlentities($data['server_name']); ?></span></td>
			</tr>
			<tr>
				<th width="30%">PHP版本</th>
				<td><?php echo htmlentities($data['language']); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	
</footer>
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script> 

</body>
</html>
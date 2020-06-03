<?php /*a:3:{s:60:"D:\phpStudy\WWW\cjt\application\admin\view\order\detail.html";i:1557472567;s:60:"D:\phpStudy\WWW\cjt\application\admin\view\public\_meta.html";i:1530329594;s:62:"D:\phpStudy\WWW\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<title>订单详情</title>
</head>
<body class="pos-r">	
	<div class="page-container">
		<div class="row cl">
			<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px;margin-right:6px " href ="<?php echo url('excel'); ?>?id=<?php echo htmlentities($id); ?>" title="导出"><i class="Hui-iconfont">&#xe644;</i></a>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <a href="javascript:;" class="btn btn-default radius"><span class="l">收货人：<?php echo htmlentities($addr['addr_receiver']); ?> &nbsp;&nbsp;&nbsp;&nbsp;</span><span class="l">电话：<?php echo htmlentities($addr['addr_tel']); ?> &nbsp;&nbsp;&nbsp;&nbsp;</span><span class="addr">收货地址：<?php echo htmlentities($addr['addr_add']); ?> </span> </a></div>
			<div class="col-xs-11 col-sm-12 ">
				<table id="tball" class="table table-border radius">
					<thead id="" class="text-c">
						<tr>
							<th width="25">
							<th>ID</th>
							<th>商品图片</th>
							<th>商品名称</th>
							<th>商品价格</th>
							<th>商品规格</th>
							<th>商品数量</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="tbMain">
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

							<tr class="text-c">
								<th width="25">
								<td><?php echo htmlentities($vo['id']); ?></td>
								<td><img  style="width: 40px;height: 40px" class="product-thumb image" src="<?php echo htmlentities($vo['or_pd_pic'][0]); ?>" alt=""></td>
								<td><?php echo htmlentities($vo['or_pd_name']); ?></td>
								<td><?php echo htmlentities($vo['or_pd_price']); ?></td>
								<td><?php echo htmlentities($vo['pd_spec']); ?></td>
								<td><?php echo htmlentities($vo['or_pd_num']); ?></td>
								<td></td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tr class="text-c">
						<td width="10%">客户留言：</td>
						<td><?php echo htmlentities($remark); ?></td>
					</tr>
					<tr>
						<td width="25">支付凭证：</td>
						<td><img src="<?php echo htmlentities($voucher); ?>"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!-- <div>客户留言：<?php echo htmlentities($remark); ?></div>
	<div>（支付凭证）<img src="<?php echo htmlentities($voucher); ?>"></div> -->
	
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
         function excel(){
         	alert(1111111111);
            var url = "<?php echo url('excel'); ?>";
            creatIframe(url,'表格导出');
        }
        </script>
</body>
</html>
<?php /*a:3:{s:62:"D:\phpStudy\WWW\szsc\application\admin\view\setting\award.html";i:1532053846;s:61:"D:\phpStudy\WWW\szsc\application\admin\view\public\_meta.html";i:1530329592;s:63:"D:\phpStudy\WWW\szsc\application\admin\view\public\_footer.html";i:1530790557;}*/ ?>
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

<title>基本设置</title>
<style type="text/css">
	.award{
		display: flex;
		justify-content: flex-start;
		flex-wrap: wrap;
	}
	.award .row{
		width:20%;
	}
	.award .row .form-label{
		width: 50%;
		padding: 0;
	}
	.award .row .formControls{
		width: 50%;
		padding: 0;
	}
	.award .row .formControls>input{
		width: 100% !important;
	}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	奖励设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" onclick="ooo()" title="清楚缓存" ><i class="Hui-iconfont">&#xe706;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>洗护奖励</span>
				<span>保健品奖励</span>
				<span>化妆品奖励</span> 
				<span>彩妆</span>
				<span>即将上市奖励</span>
			</div>
			<div class="tabCon award">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award"  value="<?php echo cache('setting')['award']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award2"  value="<?php echo cache('setting')['award2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award3"  value="<?php echo cache('setting')['award3']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award4"  value="<?php echo cache('setting')['award4']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award5"  value="<?php echo cache('setting')['award5']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award6"  value="<?php echo cache('setting')['award6']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award7"  value="<?php echo cache('setting')['award7']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award8"  value="<?php echo cache('setting')['award8']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award9"  value="<?php echo cache('setting')['award9']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award10"  value="<?php echo cache('setting')['award10']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award11"  value="<?php echo cache('setting')['award11']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award12"  value="<?php echo cache('setting')['award12']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award13"  value="<?php echo cache('setting')['award13']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award14"  value="<?php echo cache('setting')['award14']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award15"  value="<?php echo cache('setting')['award15']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award16"  value="<?php echo cache('setting')['award16']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award17"  value="<?php echo cache('setting')['award17']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award18"  value="<?php echo cache('setting')['award18']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award19"  value="<?php echo cache('setting')['award19']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award20"  value="<?php echo cache('setting')['award20']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award21"  value="<?php echo cache('setting')['award21']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award22"  value="<?php echo cache('setting')['award22']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award23"  value="<?php echo cache('setting')['award23']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award24"  value="<?php echo cache('setting')['award24']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="award25"  value="<?php echo cache('setting')['award25']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<!-- <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						热门新品打折比例：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="discount"  value="<?php echo cache('setting')['discount']; ?>" class="input-text" style="width:20%">
					</div>
				</div> -->
				<!-- <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						购物币/人民币：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="yuan_coin"  value="<?php echo cache('setting')['yuan_coin']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						每周提现日：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="tixian_day"  value="<?php echo cache('setting')['tixian_day']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						提现日封顶</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="yong_ding"  value="<?php echo cache('setting')['yong_ding']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						动态直推佣金奖励%</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="direct_profit"  value="<?php echo cache('setting')['direct_profit']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						动态二代佣金奖励%</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="erdai_profit"  value="<?php echo cache('setting')['erdai_profit']; ?>" class="input-text" style="width:20%">
					</div>
				</div> -->
		</div>
		<div class="tabCon award">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb"  value="<?php echo cache('setting')['awardb']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb2"  value="<?php echo cache('setting')['awardb2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb3"  value="<?php echo cache('setting')['awardb3']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb4"  value="<?php echo cache('setting')['awardb4']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb5"  value="<?php echo cache('setting')['awardb5']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb6"  value="<?php echo cache('setting')['awardb6']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb7"  value="<?php echo cache('setting')['awardb7']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb8"  value="<?php echo cache('setting')['awardb8']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb9"  value="<?php echo cache('setting')['awardb9']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb10"  value="<?php echo cache('setting')['awardb10']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb11"  value="<?php echo cache('setting')['awardb11']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb12"  value="<?php echo cache('setting')['awardb12']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb13"  value="<?php echo cache('setting')['awardb13']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb14"  value="<?php echo cache('setting')['awardb14']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb15"  value="<?php echo cache('setting')['awardb15']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb16"  value="<?php echo cache('setting')['awardb16']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb17"  value="<?php echo cache('setting')['awardb17']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb18"  value="<?php echo cache('setting')['awardb18']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb19"  value="<?php echo cache('setting')['awardb19']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb20"  value="<?php echo cache('setting')['awardb20']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb21"  value="<?php echo cache('setting')['awardb21']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb22"  value="<?php echo cache('setting')['awardb22']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb23"  value="<?php echo cache('setting')['awardb23']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb24"  value="<?php echo cache('setting')['awardb24']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardb25"  value="<?php echo cache('setting')['awardb25']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
		</div>
		<div class="tabCon award">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc"  value="<?php echo cache('setting')['awardc']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc2"  value="<?php echo cache('setting')['awardc2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc3"  value="<?php echo cache('setting')['awardc3']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc4"  value="<?php echo cache('setting')['awardc4']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc5"  value="<?php echo cache('setting')['awardc5']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc6"  value="<?php echo cache('setting')['awardc6']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc7"  value="<?php echo cache('setting')['awardc7']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc8"  value="<?php echo cache('setting')['awardc8']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc9"  value="<?php echo cache('setting')['awardc9']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc10"  value="<?php echo cache('setting')['awardc10']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc11"  value="<?php echo cache('setting')['awardc11']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc12"  value="<?php echo cache('setting')['awardc12']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc13"  value="<?php echo cache('setting')['awardc13']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc14"  value="<?php echo cache('setting')['awardc14']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc15"  value="<?php echo cache('setting')['awardc15']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc16"  value="<?php echo cache('setting')['awardc16']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc17"  value="<?php echo cache('setting')['awardc17']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc18"  value="<?php echo cache('setting')['awardc18']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc19"  value="<?php echo cache('setting')['awardc19']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc20"  value="<?php echo cache('setting')['awardc20']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc21"  value="<?php echo cache('setting')['awardc21']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc22"  value="<?php echo cache('setting')['awardc22']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc23"  value="<?php echo cache('setting')['awardc23']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc24"  value="<?php echo cache('setting')['awardc24']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardc25"  value="<?php echo cache('setting')['awardc25']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
		</div>
		<div class="tabCon award">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd"  value="<?php echo cache('setting')['awardd']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd2"  value="<?php echo cache('setting')['awardd2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd3"  value="<?php echo cache('setting')['awardd3']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd4"  value="<?php echo cache('setting')['awardd4']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd5"  value="<?php echo cache('setting')['awardd5']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd6"  value="<?php echo cache('setting')['awardd6']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd7"  value="<?php echo cache('setting')['awardd7']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd8"  value="<?php echo cache('setting')['awardd8']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd9"  value="<?php echo cache('setting')['awardd9']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd10"  value="<?php echo cache('setting')['awardd10']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd11"  value="<?php echo cache('setting')['awardd11']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd12"  value="<?php echo cache('setting')['awardd12']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd13"  value="<?php echo cache('setting')['awardd13']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd14"  value="<?php echo cache('setting')['awardd14']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd15"  value="<?php echo cache('setting')['awardd15']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd16"  value="<?php echo cache('setting')['awardd16']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd17"  value="<?php echo cache('setting')['awardd17']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd18"  value="<?php echo cache('setting')['awardd18']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd19"  value="<?php echo cache('setting')['awardd19']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd20"  value="<?php echo cache('setting')['awardd20']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd21"  value="<?php echo cache('setting')['awardd21']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd22"  value="<?php echo cache('setting')['awardd22']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd23"  value="<?php echo cache('setting')['awardd23']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd24"  value="<?php echo cache('setting')['awardd24']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awardd25"  value="<?php echo cache('setting')['awardd25']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
		</div>
		<div class="tabCon award">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde"  value="<?php echo cache('setting')['awarde']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde2"  value="<?php echo cache('setting')['awarde2']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde3"  value="<?php echo cache('setting')['awarde3']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde4"  value="<?php echo cache('setting')['awarde4']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde5"  value="<?php echo cache('setting')['awarde5']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde6"  value="<?php echo cache('setting')['awarde6']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde7"  value="<?php echo cache('setting')['awarde7']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde8"  value="<?php echo cache('setting')['awarde8']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde9"  value="<?php echo cache('setting')['awarde9']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde10"  value="<?php echo cache('setting')['awarde10']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde11"  value="<?php echo cache('setting')['awarde11']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde12"  value="<?php echo cache('setting')['awarde12']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde13"  value="<?php echo cache('setting')['awarde13']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde14"  value="<?php echo cache('setting')['awarde14']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde15"  value="<?php echo cache('setting')['awarde15']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十六代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde16"  value="<?php echo cache('setting')['awarde16']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十七代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde17"  value="<?php echo cache('setting')['awarde17']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十八代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde18"  value="<?php echo cache('setting')['awarde18']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						十九代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde19"  value="<?php echo cache('setting')['awarde19']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde20"  value="<?php echo cache('setting')['awarde20']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十一代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde21"  value="<?php echo cache('setting')['awarde21']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十二代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde22"  value="<?php echo cache('setting')['awarde22']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十三代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde23"  value="<?php echo cache('setting')['awarde23']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十四代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde24"  value="<?php echo cache('setting')['awarde24']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						二十五代：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="awarde25"  value="<?php echo cache('setting')['awarde25']; ?>" class="input-text" style="width:20%">
					</div>
				</div>
		</div>
		<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						开户银行地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_addr"  value="" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						收款账户：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="bank_number"  value="" class="input-text" style="width:20%">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						公司名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="company"  value="" class="input-text" style="width:20%">
					</div>
				</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="return saveConfig();" class="btn btn-primary radius" type="submit"><i clsass="Hui-iconfont">&#xe632;</i> 保存</button>
				<button class="btn btn-default radius rst" type="reset">&nbsp;&nbsp;重置&nbsp;&nbsp;</button>
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
$('.form input[name="status"][value='+"<?php echo cache('setting')['status']; ?>"+']').attr("checked",true);

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
});
// /setting/saveinfo
function saveConfig(){
	$.post("<?php echo url('setting/index'); ?>",$('.form').serialize()).success(function(data){
		layer.msg(data.msg);
		if(!data.code){
			$('.rst').click();
		}
	});
	return false;
}
function ooo(){
	$.post("<?php echo url('every/clear'); ?>").success(function(data){
		layer.msg('清除成功');
	});
	return false;
}
$("#file_upload").change(function() {
        //提交
        var data = new FormData();
        // console.log($(this)[0].files[0]);
        data.append('img',$(this)[0].files[0]);
        $.ajax({
            url: '<?php echo url("tupian"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
            	if(data.code){
            		$('#background').val(data.data);
                	$('.preview').attr('src', data.data);
            	}else{
            		layer.msg(data.msg);
            	}
            	
            },
            error: function() {
                layer.msg('上传出错');
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

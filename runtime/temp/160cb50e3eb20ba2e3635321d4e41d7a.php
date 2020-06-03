<?php /*a:3:{s:77:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\user\my_account.html";i:1557137777;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;s:76:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>会员列表 <span class="c-gray en">&gt;</span> 账户明细<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="page-container">
        <div class="text-c">
            <!-- <form class="Huiform" method="get" action="">
            </span>
                日期范围：
                <input type="text" class="input-text Wdate" name="start" id="countTimestart" onfocus="selecttime(1)" value="<?php echo htmlentities((app('request')->get('start') ?: '')); ?>" size="17" class="date" readonly style="width:140px;"> 
                - 
                <input type="text" class="input-text Wdate" name="end" id="countTimeend" onfocus="selecttime(2)" value="<?php echo htmlentities((app('request')->get('end') ?: '')); ?>" size="17"  class="date" readonly style="width:140px;">
                <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </form> -->
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">总收益：<strong><?php echo htmlentities($nums['0']); ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;报单收益：<strong><?php echo htmlentities($nums['1']); ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;复购收益：<strong><?php echo htmlentities($nums['2']); ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;特惠专区收益：<strong><?php echo htmlentities($nums['3']); ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;分红收益：<strong><?php echo htmlentities($nums['4']); ?></strong></span>
            <span class="r">共有数据：<strong><?php echo htmlentities($list->total()); ?></strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border  table-hover table-bg table-sort">
                <thead>
                    <tr class="text-c">
                        <th>会员</th>
                        <th>奖励额度</th>
                        <!-- <th>现金积分</th> -->
                        <th>说明</th>
                        <th>时间</th>
                        <!-- <th>操作</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c">
                        <td><?php echo htmlentities($vo['us_nickname']); ?></td>
                        <td><?php echo htmlentities($vo['wa_num']); ?></td>                       
                        <!-- <td><?php if($vo['wa_type'] == 1): ?>-<?php endif; ?><?php echo htmlentities($vo['get_bi']); ?></td> -->
                        <td><?php echo htmlentities($vo['wa_note']); ?></td>
                        <td><?php echo htmlentities($vo['add_time']); ?></td>
                       <!--  <td><a style="text-decoration:none" onclick="cancelbi(<?php echo htmlentities($vo['id']); ?>)" title="取消该奖励"><i class="Hui-iconfont">[取消该奖励]</i></a></td> -->
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
        <script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
        <script type="text/javascript">
        $('select[name="wa_type"]').val(<?php echo htmlentities(app('request')->get('wa_type')); ?>);
        function cancelbi(id){
            layer.confirm('确定要取消该奖励吗？', {
                  btn: ['确定', '取消']
                }, function(index, layero){
                    $.ajax({
                        type: "post",
                        url: "<?php echo url('profit/cancelbi'); ?>",
                        data: {id:id},
                        success: function(data) {
                            layer.msg(data.msg);
                            if(data.code){
                                setTimeout("window.location='';",1000);
                                //location.href = '';
                            }
                        }
                    });
                });
        }
        function selecttime(flag){
            if(flag==1){
                var endTime = $("#countTimeend").val();
                if(endTime != ""){
                    WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
                    WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
            }else{
                var startTime = $("#countTimestart").val();
                if(startTime != ""){
                    WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
                    WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
            }
         }
        </script>
</body>

</html>
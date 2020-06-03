<?php /*a:3:{s:79:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\setting\shuffling.html";i:1535452194;s:74:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_meta.html";i:1530329594;s:76:"D:\phpstudy_pro\WWW\127.0.0.3\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<title>标签列表</title>
<style>
  input{
    border:none;
  }
  .text-c td:nth-chid
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 轮播列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" onclick="ooo()" title="清楚缓存" ><i class="Hui-iconfont">&#xe706;</i></a>
</nav>
<div class="page-container">
  <!-- <div class="text-c"> 
    <input type="text" class="input-text" style="width:250px" placeholder="输入用户名称" id="" name="us_name">
    <button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i>搜用户</button>
  </div> -->
  <table class="table table-border table-bordered table-bg">
    
    <thead>
      
      <tr class="text-c">
        <th width="150">图片</th>
        <th width="150">操作</th>
      </tr>
    </thead>
    <form action="">
    <tbody>
      <?php if(is_array($array) || $array instanceof \think\Collection || $array instanceof \think\Paginator): $i = 0; $__LIST__ = $array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <tr class="text-c">
          <td>
            <div style="position: relative;width: 50px;height: 50px;    margin: auto;">
            <img src="<?php echo htmlentities((isset($vo) && ($vo !== '')?$vo:'/static/admin/img/add0.png')); ?>" style="width:50px;height:50px" class="logo<?php echo htmlentities($i); ?>" alt="">
            <input type="file" name="file" onchange="eee($(this),<?php echo htmlentities($i); ?>)" class="input-text" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;opacity: 0;">
            <input type="text" name="<?php echo htmlentities($i); ?>" hidden="hidden" value="<?php echo htmlentities($vo); ?>" class="pic<?php echo htmlentities($i); ?>" >
          </div>
        </td>
        <td>
          <a style="text-decoration:none" onclick="del(this)">删除</a>
        </td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>

    </form>
  </table>
  <div class="row cl">
    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2" style="    text-align: center;margin-top: 50px;">
      <button onclick="return edit();" class="btn btn-primary radius" type="submit"><i clsass="Hui-iconfont">&#xe632;</i> 保存</button>
    </div>
  </div>
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
  $(function(){
    // console.log($("").val(111))
    
  })
  function eee(dada,i) {
        var data = new FormData();
        data.append('file', dada[0].files[0]);
        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
        $.ajax({
            url: '<?php echo url("store/upload"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                // layer.msg(data.msg);
                layer.close(index);
                if (data.code) {
                    $('.logo'+i).attr('src',data.data);
                    $('.pic'+i).val(data.data);
                }
                layer.close(index);
            },
            error: function() {
                layer.close(index);
                layer.msg('上传出错');
            }
        });
    }
  function edit(){
    console.log(123);
      $.ajax({
        type:"post",
        url:"<?php echo url('shuffling'); ?>",
        data:$('form').serialize(),
        success:function(data){
          layer.msg(data.msg);
          if(data.code){
            setTimeout(function() {
               location.href = '';
            }, 500);
          }
        }
      })
    }
    function del(data){
      $(data).parent().parent().remove();
    }
    function ooo(){
  $.post("<?php echo url('every/clear'); ?>").success(function(data){
    layer.msg('清除成功');
  });
  return false;
}
</script>
</body>
</html>
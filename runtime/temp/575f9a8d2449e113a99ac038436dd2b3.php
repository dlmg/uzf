<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\uzf\application\admin\view\product\cate_add.html";i:1585796139;s:64:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_meta.html";i:1530329594;s:66:"D:\phpstudy_pro\WWW\uzf\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<meta name="keywords" content="">
<meta name="description" content="">
</head>

<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>商品分类 <span class="c-gray en">&gt;</span> 添加分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>" />
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>一级分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box" style="width:20%">
                        <select name="p_id"  class="select" onchange = "firstSel()" id = "first">
                            <option value="0">顶级分类</option>
                            <?php if(is_array($first_cate) || $first_cate instanceof \think\Collection || $first_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $first_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['ca_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>


                    </span>
                <!-- <span class="select-box" style="width:20%">
                    <select id="second" class="select-box" name="typeTwo"
                    style="width:200px;">
                </span> -->
            </div>
        </div>
         <div class="row cl">
             <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>二级分类：</label>
             <div class="formControls col-xs-8 col-sm-9">
                 <span class="select-box" style="width:20%">
                     <select name="son_id"  class="select"  id = "second">
                         <option value="0">选择二级分类</option>

                     </select>


                 </span>

             </div>
         </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" id="" name="ca_name" style="width:20%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类图标：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div style="width:110px;height: 110px;position: relative;display: inline-block; ">
                    <img src="/static/admin/img/add0.png" alt="" class="logo" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;">
                    <input type="file" name="file" onchange="eee($(this))" class="input-text" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;opacity: 0;">
                </div>
            </div>
        </div>
        <div style="display:none" class="ttt">
            <input type="text" name="ca_pic" value="">
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="return add()">
            </div>
        </div>
    </form>
</article>
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
<!-- <script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>  -->
<script type="text/javascript">

    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });

    // $(function(){

    //      $("select[name='p_id']").change(function(){

    //          $('input[name="id"]').val('limin');
    //          option = "<option value='1'>生活类</option>"
    //          $("#second").html(option);

    //     });

    // });
    function add(){
        $.post("<?php echo url('cate_add'); ?>", $('form').serialize()).success(function(data) {
            layer.msg(data.msg);
            if (data.code) {
                setTimeout(function() {
                    location.href = '';
                }, 500);
            }
        });
        return false;
    }
    function eee(dada) {
        var data = new FormData();
        data.append('file', dada[0].files[0]);
        var index = layer.load(1, { shade: false }); //0代表加载的风格，支持0-2
        $.ajax({
            url: '<?php echo url("upload"); ?>',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                layer.msg(data.msg);
                if (data.code) {
                    $('.logo').attr('src',data.data);
                    $('input[name="ca_pic"]').val(data.data);
                }
                layer.close(index);
            },
            error: function() {
                layer.close(index);
                layer.msg('上传出错');
            }
        });
    }
    // $(function() {
    //     $("#second").hide(); //初始化的时候第二个下拉列表隐藏
    // });
    function firstSel() {                       //如果第一个下拉列表的值改变则调用此方法
        var caid = $("#first").val();                //得到第一个下拉列表的值

        if(caid!=null && "" != caid&& -1 != caid){
            //通过ajax传入后台，把caid数据传到后端
            $.post("<?php echo url('cate_select'); ?>",{caid:caid},function(data){
                var res = data;//把后台传回的json数据解析
                // var res = $.JSONparse(data);//把后台传回的json数据解析
                // alert(res)
                // console.log(res)
                var option;
                option = "<option value='0'>选择二级分类</option>"
                if (res.length == 0){
                    //$("#second").html(option);              //将循环拼接的字符串插入第二个下拉列表
                    $("#second").find("option").remove();

                    $("#second").html(option);
                }else{
                    $.each(res,function(i,n){           //循环，i为下标从0开始，n为集合中对应的第i个对象
                        // option += "<option value='"+n.orderTypeId+"'>"+n.orderTypeSmall+"</option>"

                        option += "<option value='"+n.id+"'>"+n.ca_name+"</option>"
                    });
                    $("#second").html(option);              //将循环拼接的字符串插入第二个下拉列表
                }

                // $("#second").show();               //把第二个下拉列表展示
            });

        }else {
            $("#second").hide();
        }
    }
</script>
</body>

</html>
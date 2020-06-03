<?php /*a:3:{s:60:"D:\phpStudy\WWW\cjt\application\admin\view\qrcode\code1.html";i:1532659376;s:60:"D:\phpStudy\WWW\cjt\application\admin\view\public\_meta.html";i:1530329594;s:62:"D:\phpStudy\WWW\cjt\application\admin\view\public\_footer.html";i:1530790558;}*/ ?>
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
<style>
  #code0 {
      
      text-align: center;
  }
  #code0 button{
    margin-bottom: 10px;
    outline: none;
  }
  #allCode{
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;

  }
  #allCode div{
     text-align: center;
     margin: 30px;
     border: 1px solid red;
     width:300px;
  }
  #allCode div img{ 
    display: inline-block !important;
    margin-bottom:10px;
  }
  #allCode >div:last-child{
    display: none;
  }
</style>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>二维码管理 <span class="c-gray en">&gt;</span> 二维码列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div id="allCode">
      <div id="code0">
        <button onclick="downloadQrcode('0')">点我下载二维码</button>
        <p id="codefirst"></p>
      </div>
    </div>
    
    <input type="hidden" name="" id="listvalue" value="<?php echo htmlentities($list); ?>">
    <input type="hidden" name="" id="number" value="<?php echo htmlentities($number); ?>">
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
var nodelist = $("#listvalue").val();
var number = eval($("#number").val());
function makeCode () {
    $("#codefirst").text(number[0]);     
    //var elText = document.getElementById("text");
    var elText = eval(nodelist);
    //alert(elText);   
    if (!elText) {
        alert("无法获取链接");
        elText.focus();
        return;
    }
    var idArr = [];
    elText.forEach(function(val,index){
      console.log("####",val);
      if(index == 0){
        var qrcode = new QRCode("code0",{width : 250,height : 250});
        qrcode.makeCode(val);
        console.log(qrcode._el,"---===")
      }else{
        console.log( "!!!!!",idArr[index-1]);
        var qrcode = new QRCode( idArr[index-1],{width : 250,height : 250});
        qrcode.makeCode(val);
      }
      idArr.push("code"+(index+1));
      console.log( "!!!!!",idArr);
      var htmlStr = '<div id="'+"code"+(index+1)+'"><button onclick="downloadQrcode('+(index+1)+')" style="margin-bottom:10px">点我下载二维码</button><p>'+number[index+1]+'</p></div>';
      $("#allCode").append(htmlStr);
      // var qrcode = new QRCode( idArr[index],{width : 150,height : 150});
      // qrcode.makeCode(val);
      // console.log( "!!!!!",index);
      
      // $("#allCode").innerHtml=htmlStr
    });  
    console.log(idArr);
}

makeCode();
function downloadQrcode(val){
  console.log(val,"-----")
  var num;
  if(val=="0"){
    num=number[0];
  }else{
    num=number[val];
  }
  console.log(num,"/////")
  var qrcode = document.getElementById("code"+val);
  var img = qrcode.getElementsByTagName('img')[0];
  var link = document.createElement("a");
  var url = img.getAttribute("src");
  link.setAttribute("href",url);
  link.setAttribute("download",num);
  link.click();
}
/*$("#text").
on("blur", function () {
    makeCode();
}).
on("keydown", function (e) {
    if (e.keyCode == 13) {
        makeCode();
    }
});*/ 
</script> 
</body>
</html>
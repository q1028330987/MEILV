<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/css/bootstrap.min.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>友情链接</title>
</head>
<body>


	<table class='table'>
	  <tr class="success">
	    <th>序号</th>
	    <th>网站名称</th>
	    <th>网址</th>
	    <th>操作</th>
	 </tr>
	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
	 	<td><?php echo ($vo["id"]); ?></td>
	 	<td><?php echo ($vo["name"]); ?></td>
	 	<td><?php echo ($vo["url"]); ?></td>
	 	<td>
	 		<a href='<?php echo U("Friend/listLose");?>?id=<?php echo ($vo["id"]); ?>'>删除</a>
	 		<a href='<?php echo U("Friend/listEdit");?>?id=<?php echo ($vo["id"]); ?>'>修改</a>
	 	</td>
	 </tr><?php endforeach; endif; ?>
 	<table>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/first/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/first/Public/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="/first/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/first/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/first/Public/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="/first/Public/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>

</body>
</html>
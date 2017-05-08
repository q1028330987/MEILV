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
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加产品分类</title>
</head>
<body>
<div class="page-container">
	<form action="<?php echo U('Store/type_add');?>" method="post" class="form form-horizontal" id="form-user-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="name">
			</div>
		</div>
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">备注：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div> -->
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" type="submit"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/first/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/first/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/first/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/first/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/first/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/first/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	
});
$('.input-text').on('blur', function () {
	var that = $(this);
	// console.log(typeof that.val());
	$('.formControls>span').remove();

	if (that.val() == '') {
		// console.log(1);
		$('.formControls').append('<span style="color:red">请输入一个分类名</span>');

	}
});
$('.input-text').on('focus', function () {
	$('.formControls>span').remove();
})
// $('.btn btn-primary radius').on('click', function () {
// 	console.log(123);
// 	$.post('<?php echo U("Store/type_add");?>',
// 		{
// 			name : $('.input-text').val()

// 		},
// 		function (data) {
// 			if (data == 1) {
// 				$('.formControls').append('<span style="color:green">添加成功</span>');
// 			}
// 		},
// 		'json'
// 		)
// })
$("form").submit( function () {
	var str = $('.input-text').val().replace(/\ +/g, "");
	if (str == '') {
  		return false;
	}
} );
// function refresh (obj) {
// 	console.log(123);
// 	// location.replace("U('Store/type_index', 'a=123')");
// }
// $('.btn btn-primary radius').on('click', function () {
// 	console.log('123');
// 	$.post("U('Store/type_index')", 
// 		function () {

// 		},
// 		'json'
// 		)
// })
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<link rel="stylesheet" href="/first/Public/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>/
<![endif]-->
<title>产品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<table class="table">
	<tr>
		<td width="200" class="va-t">
			<ul id="treeDemo" class="ztree">
				<li style="margin-top:20px;color:red">商铺分类</li>
				<table>
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr data-id="<?php echo ($vo['id']); ?>">
							<td onClick="save(this)"><?php echo ($vo['name']); ?></td>
							<td><a href="javascript:;" data-id="<?php echo ($vo['id']); ?>" onclick="del(this)">删除</a></td>
						</tr><?php endforeach; endif; ?>
				</table>

			</ul>
		</td>
		<td class="va-t"><iframe ID="testIframe" Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO width=100%  height=390px SRC="<?php echo U('Store/type_add');?>"></iframe></td>
	</tr>
</table>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/first/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/first/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/first/Public/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script> 
<script type="text/javascript">

//点击删除时触发的方法，负责触发ajax来删除分类
function del (obj) {
	// console.log(obj.getAttribute('data-id'));
	var that = $(obj);
	// console.log(that.parent().parent());
	$.get('<?php echo U("Store/type_del");?>',
		{id : obj.getAttribute('data-id')},
		function (data) {
			console.log(data);
			if (data==1) {

				that.parent().parent().remove();
			}
		},
		'json'
		);
}

//点击触发的修改类名

function moveEnd(obj){
	obj.focus(); 
	var len = obj.value.length; 
	// alert(len);
	if (document.selection) { 
		var sel = obj.createTextRange(); 
		sel.moveStart('character',len); //设置开头的位置
		sel.collapse(); 
		sel.select(); 
	} else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') { 
		obj.selectionStart = obj.selectionEnd = len; 
	} 
} 

function save (obj) {
	var that = $(obj);
	oldname = that.html();
	str = that.html().length;
	size = str*12;
	that.replaceWith("<input class='leave'  style='width:"+size+"px;margin-left:10px;margin-top:10px' value='"+that.html()+"'>");
	$('.leave').focus();
}

//当鼠标离开时修改
$(document).on('blur','.leave',function(){
	var that = $(this);
	// console.log(1);
	// console.log(that.val());
	
	$.post('<?php echo U("Store/editTypeName");?>',
		{
		name : that.val(),
		id : that.parent().attr('data-id')
		},
		function (data) {
		console.log(data);
			if (data > 0) {
				that.replaceWith("<td onClick='save(this)'>"+that.val()+"</td>");
			} else {
				that.replaceWith("<td onClick='save(this)'>"+oldname+"</td>");
			}
		},
		'json'
		)

	// $.post('<?php echo U("Store/editTypeName");?>',
	// 	{
	// 		name : that.val(),
	// 		id : that.parent().attr('data-id')
	// 	},
	// 	function (data) {
	// 		if (data > 0) {
		
	// 			that.replaceWith("<td onClick='save(this)'>"+that.val()+"</td>");
				
	// 		}
	// 	},
	// 	'json'
	// 	)
})


$(document).on('focus', '.leave', function () {

	//当按下回车时修改
	$(document).on('keydown', '.leave', function () {
		var that = $(this);
		if (event.keyCode == 13) {
			that.replaceWith("<td onClick='save(this)'>"+that.val()+"</td>");
		}
	})
	
})

</script>
</body>
</html>
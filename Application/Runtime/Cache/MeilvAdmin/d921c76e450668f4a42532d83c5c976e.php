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
<link rel="stylesheet" type="text/css" href="/first/Public/admin/css/store.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/first/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>品牌管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 餐厅管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" placeholder="餐厅名称" value="" class="input-text" style="width:120px">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传logo</a>
			<input type="file" multiple name="file-2" class="input-file">
			</span> <span class="select-box" style="width:150px">
			<select class="select" name="brandclass" size="1">
				<option value="-1" selected>--请选择分类--</option>

			</select>
			</span><button type="button" class="btn btn-success" id="" name="" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
		</form>
	</div> -->
	<!-- <div class="cl pd-5 bg-1 bk-gray mt-20"> <span>共有数据：<strong><?php count($storeList); ?></strong> 条</span> </div> -->
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th width="80">分类</th>
					<th width="200">LOGO</th>
					<th width="120">餐厅名称</th>
					<th width="100">状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>

				<?php if(is_array($storeList)): foreach($storeList as $key=>$vo): ?><tr class="text-c">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo ($vo["id"]); ?></td>
						<td><a href="javascript:;" title="修改分类" onClick='editStoreType(this)'><?php echo ($vo["typename"]); ?></a></td>
						<td><img height ="60" src="/first/Public/<?php echo ($vo["pic"]); ?>"></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["statusname"]); ?></td>
						<td class="f-14 product-brand-manage"><a class="feng" onclick="editStatus(this)" store-id="<?php echo ($vo["id"]); ?>" status="<?php echo ($vo["status"]); ?>" style="color:red">
							<?php if($vo["status"] != 4): ?>封店
								<?php else: ?> 解封<?php endif; ?>
						</a> <a href="<?php echo U('Store/goods_index');?>?id=<?php echo ($vo["id"]); ?>">详情</a></td>
					</tr><?php endforeach; endif; ?>
				<!-- <tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>1</td>
					<td><input type="text" class="input-text text-c" value="1"></td>
					<td><img src="temp/brand/dongpeng.jpeg"></td>
					<td class="text-l"><img title="国内品牌" src="static/h-ui.admin/images/cn.gif"> 东鹏</td>
					<td class="text-l">东鹏陶瓷被评为“中国名牌”、“国家免检产品”、“中国驰名商标”、http://www.dongpeng.net/</td>
					<td class="f-14 product-brand-manage"><a style="text-decoration:none" onClick="product_brand_edit('品牌编辑','codeing.html','1')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="active_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/first/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/first/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/first/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/first/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/first/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/first/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});

// $('.feng').on('click', function () {
// 	alert(1);
// })

function editStatus (obj) {
	var that = $(obj);
	// console.log( that.parent().prev().html() );
	$.post('<?php echo U("Store/editStatus");?>',
		{
			id : that.attr('store-id'),
			status : that.attr('status')
		},
		function (data) {
			if (data == 1) {
				if (that.attr('status') == 4) {
					that.attr('status', 1);
					that.html('封店');
					that.parent().prev().html('开业');
				} else {
					that.attr('status', 4);
					that.html('解封');
					that.parent().prev().html('已封');

				}
			}
		},
		'json'
		)
	// console.log($(obj));
}

//修改餐厅所属分类
function editStoreType (obj) {
	var that = $(obj);
	console.log(that);
	var str = '';
	$.post('<?php echo U("Store/type_index");?>',
		{},
		function (data) {
			str += '<select name="type">'	;
			str += '<option valuue="-1">--请选择分类</option>';
			for (var i=0; i<data.length; i++) {
				str += '<option value='+data.name+'></option>'
			}
			str += '</select>'
		})

	that.replaceWith(str);
}
</script>
</body>
</html>
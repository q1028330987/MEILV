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
<title>订单列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

    <div class="page-container">
    	<div class="f-14 c-error">订单列表</div>
    </div>
    <div class="container">
        <form action="<?php echo U('Orders/ordersList');?>" method="get">
            <div class="form-group form-inline">
                <label for="store">店铺名搜索</label>
                <input type="text" class="form-control" id="store" name="storename" placeholder="店铺名" value="<?php echo ($_GET['storename']); ?>">
             </div>
            <div class="form-group form-inline  col-md-offset-1">
                <label for="orderid">订单号搜索</label>
                <input type="num" class="form-control" id="orderis" name="oid" placeholder="订单号" value="<?php echo ($_GET['oid']); ?>">
            </div>
            <div class="form-group form-inline ">
                <button type="submit" class="btn btn-default">搜索</button>
            </div>
        </form>

        <table class="table table-striped">
            <tr>
                <th>订单号</th>
                <th>下单用户</th>
                <th>所属店铺</th>
                <th>订单总价</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                    <td><?php echo ($v["id"]); ?></td>
                    <td><?php echo ($v["uid"]); ?></td>
                    <td><?php echo ($v["sid"]); ?></td>
                    <td>￥<?php echo ($v["price"]); ?></td>
                    <td><a href="<?php echo U('Orders/ordersDetail',['id'=>$v['id'],'totalprice'=>$v['price']]);?>">详情</a></td>
                </tr>
                <tr>
                    <td>收件人：<?php echo ($v["aid"]["name"]); echo ($v["aid"]["sex"]); ?></td>
                    <td>联系电话：<?php echo ($v["aid"]["phone"]); ?></td>
                    <td>收货地址：<?php echo ($v["aid"]["address"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>

        <?php echo ($show); ?>
    </div>

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
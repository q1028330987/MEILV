<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>


<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 7]><html class="ie7"><![endif]-->
<!--[if IE 6]><html class="ie6"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="dns-prefetch" href="//xs01.meituan.net">
    <link rel="dns-prefetch" href="//p0.meituan.net">
    <link rel="dns-prefetch" href="//p1.meituan.net">
    
    <meta name="baidu-site-verification" content="Qu9OzfSVVJ" />
    <meta name="keywords" content="外卖,美旅外卖,外卖网,外卖网上订餐,美旅,美旅网">
    <meta name="description" content="美旅外卖专业品质外卖网，饿了么，饿了订外卖就上美旅外卖。美旅外卖覆盖全国各城市优质外卖商家、快餐和特色美食，拥有最先进的外卖网上订餐平台和专业外卖送餐旅队，提供24小时叫外卖、外卖网上订餐服务。">
    <title>美旅外卖-个人中心</title>   
    
    <link rel="icon" href="/first/Public/home/meilv.ico" size="16x16 32x32">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/static/img/favicon_1.ico">
    <link rel="icon" href="/static/img/favicon_1.ico" size="16x16 32x32">

    <link rel="stylesheet" href="/first/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/first/Public/css/star-rating.min.css" />
    <link rel="stylesheet" href="/first/Public/css/setting_8b545a0f.css" />
    <link rel="stylesheet" href="/first/Public/css/home_0a184c9e.css" />
    
    <!-- <script src="/first/Public/js/jquery.js"></script> -->
    <script src="/first/Public/js/page/jquery-1.11.2.js"></script>
    <script src="/first/Public/js/bootstrap.min.js"></script>
    <script src="/first/Public/js/star-rating.min.js"></script>
    <script  src="/first/Public/js/layer/layer.js"></script>

    
    <style>
      .page1 a,span{
            position: relative;
            right: 0px;
            top: 0px;
            font-size: 14px;
      }
      .page-header {
            padding-bottom: 9px;
            margin: 0px 0 20px;
            border-bottom: 1px solid #eee;
      }
      .search-box .header-search {
        margin: 12px 0 5px 43px;
      }
    </style>
    
	<style>
		.mya a,span{
			position: relative;
			top:0px;
			right:0px;
		}
	</style>

	</head>
	<body>
	  <div class="triffle" id="triffle">
       <!--  <div class="icon-list">
        <a href="http://kaidian.waimai.meituan.com/open_store/welcome?source=1" class="merchant">
          <i class="text">商家入驻</i>

        </a>
        <a href="javascript:;" class="small-qrcode">
          <i class="big-qrcode">
            <b></b>
            扫码下载客户端
          </i>
        </a>
	    <a href="/contact/call" class="phone">
	      <i class="text">联系我们</i>
	    </a>
	    </div>
	    <a id="aside-feedback" target="_blank" href="javascript:;" class="top"><i class="icon i-backtop"></i></a> -->

	  </div>
	  <div class="wrapper">
  	  <div class="page-header">
        <div class="top-nav">
          <div class="topnav-wrap">
            <div class="fr welcome">
                  
    <div id="is-login" class="top-loginbar fl">
      <span class="fl top-loginbar-username">欢迎你，<?php echo ($_SESSION['userinfo']['name']); ?></span>
      <i class="icon i-top-yarrow"></i>
      <ul class="login-menu">
        <li><a class="wrap" href="<?php echo U('Orders/index');?>">我的外卖订单</a></li>
        <li><a class="wrap" href="<?php echo U('User/collect');?>">我的收藏夹</a></li>
        <li><a class="wrap" href="<?php echo U('Out/outLogin');?>" id="logout">退出</a></li>
      </ul>
    </div>

              <a href="/mobile/download/default" class="wap fl" rel="nofollow"><i class="icon i-top-mobile"></i><span>手机版</span></a>
              <a target="_blank" href="http://meituan.com" class="site-name fl" ><i class="icon i-top-tuan"></i><span>美旅网</span></a>
              <a target="_blank" href="/contact/call" class="site-name fl" ><i class="icon i-top-call"></i><span>联系我们</span></a>
            </div>


            <i class="fl icon i-top-loc"></i>
              <span class="current-city fl" id="current-city">天河区</span>
            
            
              
              <span class="address fl" id="address">
                <span id="curr-location" class="current-address fl">东圃</span>
                <div class="change fl clearfix" id="changePosition">
                  <a href="/?stay=1" class="change-link">
                    <span class="fl">[切换地址]</span>
                  </a>
                </div>
              </span>
            
          </div>
        </div>
        <div class="middle-nav">
          <div class="middlenav-wrap clearfix">
            <h1 class="logo fl">
              <a href="<?php echo U('Index/index');?>"  title="美旅外卖"><img src="/first/Public/images/logo.png" alt="美旅外卖"></a>
            </h1>
            <div class="desire fl">
              <a href="<?php echo U('Index/index');?>" class="ca-lightgrey"><span>首页</span></a>
              <span class="vertical-line">|</span>
              <a href="<?php echo U('Orders/index');?>" class="ca-lightgrey" rel="nofollow"><span>我的外卖</span></a>
              <span class="vertical-line">|</span>
              <a href="<?php echo U('Orders/saleOrders');?>" class="ca-lightgrey"><span>商家入驻加盟</span></a>
            </div>
            <div class="search-box fr">
              <input type="text" class="header-search fl" placeholder="搜索商家，美食" />
              <a href="javascript:;" class="doSearch fr" >搜索</a>
              <div class="result-box">
                <div class="result-left fl">
                  <div class="rest-words ct-black">餐厅</div>
                  <div class="food-words ct-black">美食</div>
                </div>
                <div class="result-right fl">
                  <ul class="rest-lists">
                  </ul>
                  <div class="line"></div>
                  <ul class="food-lists">
                  </ul>
                </div>
              </div>
              <div class="no-result">
                没有找到相关结果，请换个关键字搜索！
              </div>
            </div>
          </div>
        </div>
      </div>

<div class="page-wrap">
        <div class="inner-wrap">

<div class="account-cont clearfix">
	<div class="orders-tab fl">
  <span href="javascript:;" class="tab">
    <span class="title">订单查询</span>
    <ul>
      <li><a href="<?php echo U('Orders/index');?>" class="borderradius-1 order-today active">近期订单</a></li>
    </ul>
  </span>  
  <span href="javascript:;" class="tab">
    <span class="title">账号管理</span>
    <ul>
      <li><a href="<?php echo U('User/userInfo');?>" class="borderradius-1 my-account">我的账号</a></li>
      <li><a href="<?php echo U('User/collect');?>" class="borderradius-1 my-favorite ">我的收藏</a></li>
      <li><a href="<?php echo U('Orders/myRate');?>" class="borderradius-1 my-favorite ">我的评论</a></li>
    </ul>
  </span>
  <span href="javascript:;" class="tab">
    <span class="title">我的店铺</span>
    <ul>
      <li><a href="<?php echo U('Orders/saleOrders');?>" class="borderradius-1 my-account ">店内订单</a></li>
      <li><a href="<?php echo U('User/userStore');?>" class="borderradius-1 my-favorite ">店内商品</a></li>
    </ul>
  </span>
</div>
  <div class="setting-box" id="setting-box">
  	  <div class="user-info clearfix ct-commonblack" >
            <!-- <i class="icon i-uncomment fl"></i> --> 
            <!-- <span style="font-size: 20px;">您还没有开通店铺<a class="cc-lightred-new" href="">立即申请</a></span> -->
       </div>
       <div>
            <?php if($list == false): ?><h1>暂无订单</h1>
            <?php else: ?>
            <table class="table table-hover">
            	<tr>
            		<th>订单号</th>
            		<th>所属店铺</th>
            		<th>订单总价</th>
            		<th>状态</th>
            	</tr>
           <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
           			<td class="orderid"><?php echo ($vo['id'][0]['oid']); ?></td>
           			<td><?php echo ($vo["sid"]); ?></td>
           			<td>￥<?php echo ($vo["price"]); ?>(包含配送费和包装盒费用)</td>
                <?php if($vo["status"] == 0): ?><td>等待商家派送</td><?php endif; ?>
                <?php if($vo["status"] == 1): ?><td class="btn btn-warning">确认收货</td><?php endif; ?>
                <?php if($vo["status"] == 2): ?><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@<?php echo ($vo["sid"]); ?>" id="myModal" data-oid="<?php echo ($vo['id'][0]['oid']); ?>">评论</button></td><?php endif; ?> 
                <?php if($vo["status"] == 3): ?><td>已评论</td><?php endif; ?> 
           		</tr>
           		<?php if(is_array($vo['id'])): foreach($vo['id'] as $key=>$v): ?><tr>
	           			<td><?php echo ($v["gid"]["name"]); ?></td>
	           			<td><img src="/first/Public/<?php echo ($v["gid"]["pic"]); ?>" alt="" height="50"></td>
	           			<td>单价：￥<?php echo ($v["gid"]["price"]); ?></td>
	           			<td><?php echo ($v["num"]); ?>份</td>
	           		</tr><?php endforeach; endif; ?>
              <tr>
                <td>收件人：<?php echo ($vo["aid"]["name"]); echo ($vo["aid"]["sex"]); ?></td>
                <td>联系电话：<?php echo ($vo["aid"]["phone"]); ?></td>
                <td>收货地址：<?php echo ($vo["aid"]["address"]); ?></td>
              </tr><?php endforeach; endif; ?>
          
            </table>
            <div class="mya">
            <?php echo ($show); ?>
            </div><?php endif; ?>
      	</div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo U('Orders/ordersRate');?>" method="post">
          <div class="form-group">
            <label for="input-id" class="control-label">评分:</label>
            <input id="input-id" type="number" class="rating" min=0 max=5 step=0.5 data-size="lg" name="rate">
            <!-- <input type="text" class="form-control" id="recipient-name"> -->
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">留言:</label>
            <textarea class="form-control" id="message-text" name="message"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
      
    <div class="page-footer">
      <div class="footer-wrap">
        <div class="QRcode fl" style="height:167px;margin-right:70px;">
            <div class="footer-qrcode fl"></div>
            <div class="fl">
                <p class="qr-text3 qr-text4">扫一扫二维码</p>
                <p class="qr-text3">查看更多商家</p>
                <p class="qr-text1">小程序下单</p>
                <p class="qr-text2">便捷更优惠</p>
            </div>
        </div>
        <div class="column fl corp">
          <div class="title">商务合作</div>
          <ul>
            <li><a href="" class="ca-darkgrey kaidian_address">我要开店</a></li>
            <li><a href="" class="ca-darkgrey">配送合作申请入口</a></li>
            <li><a href="" class="ca-darkgrey">城市代理商申请入口</a></li>
            <li><a href="" class="ca-darkgrey">零售招商合作加盟入口</a></li>
            <li><a href="" class="ca-darkgrey">聚宝盆餐饮开放平台</a></li>
          </ul>
        </div>
        <div class="column fl info">
          <div class="title">公司信息</div>
          <ul>
            <li><a href="" class="ca-darkgrey" rel="nofollow">关于美旅</a></li>
            <li><a href="" class="ca-darkgrey"  rel="nofollow">媒体报道</a></li>
            <li><a href="" class="ca-darkgrey" rel="nofollow">加入我们</a></li>
            <li><a href="" class="ca-darkgrey" rel="nofollow">美旅点评餐饮安全管理办法</a></li>
          </ul>
        </div>
        <div class="column fr service">
        <div class="title">客服电话</div>
          <div class="details">
            <p class="w2">10109777</p>
            <!-- <p class="w2">4008508888</p> -->
            <!-- <p class="w2">010-56652722</p> -->

              <p class="w3">周一至周日 9:00-23:00</p>

            <p class="w3">客服不受理商务合作</p>
          </div>
        </div>
        <div class="clear"></div>
        <div class="copyright">&copy;2015 meituan.com <a target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a> 京公网安备11010502025545号</div>
        <div class="sp-ft">
          <a target="_blank" title="备案信息" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202011122700003" class="record"></a>
        </div>
      </div>
    </div>
  </div>

  
  
    <!-- <script type="text/javascript" data-main="http://xs01.meituan.net/waimai_web/js/page/account/setting_b24d1d1f" src="http://xs01.meituan.net/waimai_web/js/lib/r.js"></script> -->
  
    <script>
      $('.i-top-yarrow').mouseover(function() {
        $('.top-loginbar').addClass('hover');
      });
      $('#is-login').mouseleave(function() {
        $('.top-loginbar').removeClass('hover');
      });

      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        var oid = "<input type='hidden' name='oid' value='"+button.data('oid')+"'>";
        modal.find('.modal-title').text('订单'+button.data('oid') + recipient);
        modal.find('.modal-body input').val(recipient);
        modal.find('.modal-body form').append(oid);
      });

     

     
      $('td[class="btn btn-warning"]').on('click',function() {
 
        var oid = $(this).siblings('.orderid').html();

        var that = $(this);
        $.post('<?php echo U("Orders/ajaxChangeOrderStatus");?>',
          {oid:oid},
          function(data) {
            that.removeClass('btn-warning');

            that.addClass('btn-primary');
            that.addClass('btn');
            that.html(data['content']);
            that.attr('data-toggle', 'modal');
            that.attr('data-target', '#exampleModal');
            that.attr('data-whatever', '@<?php echo ($vo["sid"]); ?>');
            that.attr('data-oid', '<?php echo ($vo['id'][0]['oid']); ?>');
            // alert(1);
            
          },
          'json');
       } );

      $("#input-id").rating();

      $('#myModal').modal(options);
    </script>
  

	</body>
</html>
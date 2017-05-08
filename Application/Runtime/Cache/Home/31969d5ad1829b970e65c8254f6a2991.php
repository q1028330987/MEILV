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

		<style>
            .table a{
            	position: relative;
            	top:-5px;
            }
            
        </style>
        <div class="page-wrap">
        <div class="inner-wrap">

<div class="account-cont clearfix">
	<div class="orders-tab fl">
  <span href="javascript:;" class="tab">
    <span class="title">订单查询</span>
    <ul>
      <li><a href="<?php echo U('Orders/index');?>" class="borderradius-1 order-today">近期订单</a></li>
    </ul>
  </span>  
  <span href="javascript:;" class="tab">
    <span class="title">账号管理</span>
    <ul>
      <li><a href="<?php echo U('User/userInfo');?>" class="borderradius-1 my-account">我的账号</a></li>
      <li><a href="<?php echo U('User/collect');?>" class="borderradius-1 my-favorite ">我的收藏</a></li>
      <li><a href="<?php echo U('Orders/myRate');?>" class="borderradius-1 my-favorite active">我的评论</a></li>
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
       <?php if(empty($list)): ?><h1>暂无评论</h1>
       <?php else: ?>
       
       <div>

            <table class="table">
				<tr>
					<th>序号</th>
					<th>店铺</th>
					<th>订单号</th>
					<th>评论内容</th>
					<th>分数</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
						<td><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["sid"]); ?></td>
						<td><?php echo ($v["oid"]); ?></td>
						<td><?php echo ($v["content"]); ?></td>
						<td width="200">
							<div class="restaurant">
						        <div class="rank clearfix">
						            <span class="star-ranking fl">
						                    <!-- 5颗星60px长度，算此时星级的长度 -->
						                    <!-- 算出空白填充的部分长度 -->
						                <span class="star-score" style="width: <?php echo ($v['star']); ?>px"></span>
						            </span>
						                <span><?php echo ($v['level']); ?>分</span>

						                  
						                  <!--
						                  <span class="total cc-lightred-new fr">
						月售3322单
						                  </span>
						                  -->
						        </div>
						    </div>
						</td>
						<td><a href="javascript:;" class="btn btn-danger" data-id="<?php echo ($v["id"]); ?>">删除</a></td>
					</tr><?php endforeach; endif; ?>
            </table>
            <div class="page1">
			<?php echo ($show); ?>
            </div>
      	</div><?php endif; ?>
  </div>
  </div>
  </div>
  </div>
	<script>
	$('.btn-danger').on('click', function() {
		var id = $(this).attr('data-id');
		// alert(id);
		var that = $(this);
		$.post('<?php echo U("Orders/ajaxDeleteRate");?>', {id:id}, function(data) {
			if (data == '1') {
				that.parents('tr').remove();
			}
		});
	});
	</script>
  
      
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

       //搜索开始
     
     //这个函数去除左边的空格
      function trimLeft(s){  
          if(s == null) {  
              return "";  
          }  
          var whitespace = new String(" \t\n\r");  
          var str = new String(s);  
          if (whitespace.indexOf(str.charAt(0)) != -1) {  
              var j=0, i = str.length;  
              while (j < i && whitespace.indexOf(str.charAt(j)) != -1){  
                  j++;  
              }  
              str = str.substring(j, i);  
          }  
          return str;  
      }  

      //这是搜索的函数
      function search () {
            keywords = trimLeft( $('.header-search').val() );
            if (keywords !== '') {

              location.href = "<?php echo U('Index/search');?>"+"?keywords="+keywords;
            }

      }

      //enter键搜索
      $('.header-search').on('focus', function () {
          $(this).on('keydown', function () {
            if (event.keyCode == '13') {
                search();
            
            }
          })
      })

      //点击搜索
      $('.doSearch').on('click', function () {
          search();
      })
      //搜索结束
      
      $('td[class="btn btn-warning"]').on('click',function() {
        // alert(1);
        var oid = $(this).siblings('.orderid').html();
        // console.log(oid);
        var that = $(this);
        $.post('<?php echo U("Orders/ajaxChangeOrderStatus");?>',
          {oid:oid},
          function(data) {
            // console.log(data);
            that.removeClass('btn btn-warning');
            that.html(data['content']);
          },
          'json');
       } );

      $('.i-top-yarrow').mouseover(function() {
        $('.top-loginbar').addClass('hover');
      });
      $('#is-login').mouseleave(function() {
        $('.top-loginbar').removeClass('hover');
      });

    </script>
  
	</body>
</html>
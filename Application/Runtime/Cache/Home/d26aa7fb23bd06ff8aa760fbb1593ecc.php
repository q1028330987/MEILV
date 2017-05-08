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
    <meta name="keywords" content="外卖,美团外卖,外卖网,外卖网上订餐,美团,美团网">
    <meta name="description" content="美团外卖专业品质外卖网，饿了么，饿了订外卖就上美团外卖。美团外卖覆盖全国各城市优质外卖商家、快餐和特色美食，拥有最先进的外卖网上订餐平台和专业外卖送餐团队，提供24小时叫外卖、外卖网上订餐服务。">
    <title>美旅外卖-个人中心</title>   
    

    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/static/img/favicon_1.ico">
    <link rel="icon" href="_PUBLIC__/home/meilv.ico" size="16x16 32x32">
  
    <link rel="stylesheet" href="/first/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/first/Public/css/setting_8b545a0f.css" />
    <link rel="stylesheet" href="/first/Public/css/star-rating.min.css" />
     <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/static/img/favicon_1.ico">
    <link rel="stylesheet" href="/first/Public/css/restaurant_66aaae7c.css" />
    <script src="/first/Public/js/page/jquery-1.11.2.js"></script>
    <script  src="/first/Public/js/layer/layer.js"></script>
    <script src="/first/Public/js/bootstrap.min.js"></script>
    <script src="/first/Public/js/star-rating.min.js"></script>
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
    .favorite-cont .favorite-box {
    width: 839px;
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
        <li><a class="wrap" href="<?php echo U('Out/outLogin');?>">退出</a></li>
      </ul>
    </div>

              <a href="/mobile/download/default" class="wap fl" rel="nofollow"><i class="icon i-top-mobile"></i><span>手机版</span></a>
              <a target="_blank" href="http://meituan.com" class="site-name fl" ><i class="icon i-top-tuan"></i><span>美团网</span></a>
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
              <a href="<?php echo U('Index/index');?>"  title="美团外卖"><img src="/first/Public/images/logo.png" alt="美团外卖"></a>
            </h1>
            <div class="desire fl">
              <a href="<?php echo U('Index/index');?>" class="ca-lightgrey"><span>首页</span></a>
              <span class="vertical-line">|</span>
              <a href="<?php echo U('Orders/index');?>" class="ca-lightgrey" rel="nofollow"><span>我的外卖</span></a>
              <span class="vertical-line">|</span>
              <a href="<?php echo U('User/userStore');?>" class="ca-lightgrey"><span>商家入驻加盟</span></a>
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


<div class="favorite-cont clearfix">
  <div class="orders-tab fl">
    <span href="javascript:;" class="tab">
      <span class="title">订单查询</span>
      <ul>
        <li><a href="<?php echo U('Orders/index');?>" class="borderradius-1 order-today ">近期订单</a></li>
      </ul>
    </span>  
    <span href="javascript:;" class="tab">
      <span class="title">账号管理</span>
      <ul>
        <li><a href="<?php echo U('User/userInfo');?>" class="borderradius-1 my-account ">我的账号</a></li>
        <li><a href="<?php echo U('User/collect');?>" class="borderradius-1 my-favorite active">我的收藏</a></li>
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


  <div class="favorite-box"  id="favorite-box">
    <h2>收藏的商家</h2>
    <div class="save-up-cancel j-save-up-cancel">取消收藏成功</div>
      <div class="list-wrapper">
        <ul class="clearfix">
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><li class="fl favorite-list" data-id="<?php echo ($v["sid"]); ?>">
            <div class="list-animate">  <a href="" target="_blank" class="restaurant-info ct-lightgrey">
              <div class="preview fl">
                <img class="scroll-loading" src="/first/Public/<?php echo ($v["pic"]); ?>" data-src="/first/Public/<?php echo ($v["pic"]); ?>" data-max-width="118" data-max-height="88" width="118" height="88" />
              </div>
              <div class="content">
                <div class="name">
                  <span title="<?php echo ($v["name"]); ?>">
              <?php echo ($v["name"]); ?>
                  </span>
                </div>
                <div class="rank clearfix">
                  <span class="star-ranking fl">
                    <!-- 5颗星60px长度，算此时星级的长度 -->
                    <!-- 算出空白填充的部分长度 -->
                    <span class="star-score" style="width:<?php echo ($v["levelData"]); ?>px"></span>
                  </span>            
                  <span class="score-num fl"><?php echo ($v['level']!=0?$v['level']:'暂无'); ?></span>
                 <!--   <span class="total cc-lightred-new fr">
                      月售210单
                    </span> -->
                </div>
                <div class="price">
                  <span class="start-price">起送:￥<?php echo ($v["upsend"]); ?></span>
                    <span class="send-price">
                        <?php echo ($v["peisend"]); ?>元配送费
                    </span>
                    <span class="send-time"><i class="icon i-poi-timer"></i>
                          <?php echo ($v["atime"]); ?>分钟
                    </span>
                </div>
              </div>
              </a>
              <div class="other clearfix">
                <div class="discount fl">
                    <i class="icon i-pay fl"></i>
                    <i class="icon i-minus fl"></i>
                </div>
                <div class="fr save-up-box ct-lightgrey">
                  <span class="fr"><i class="icon i-heart-12 fl"></i>
                    <a href="javascript:;" class="j-save-up ct-lightgrey fl favorite j-save-up" data-a="<?php echo ($v["id"]); ?>" >取消收藏</a>
                  </span>
                  <span class="fr vertical-line">|</span>
                  <span class="fr">收藏<strong class="cc-lightred-new"> (0)</strong></span>
                </div>
              </div>
            </div>
          </li><?php endforeach; endif; ?>
        </ul>
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
            <li><a href="http://kd.waimaie.meituan.com/open_store/welcome" class="ca-darkgrey kaidian_address" target="_blank">我要开店</a></li>
            <li><a href="http://page.peisong.meituan.com/apply/join" class="ca-darkgrey" target="_blank">配送合作申请入口</a></li>
            <li><a href="/help/agent" class="ca-darkgrey" target="_blank">城市代理商申请入口</a></li>
            <li><a href="http://b.retail.meituan.com/zhaoshang/pages/WMInvest.html" class="ca-darkgrey" target="_blank">零售招商合作加盟入口</a></li>
            <li><a href="http://developer.meituan.com?applyFrom=waimai_c_pc_contact" class="ca-darkgrey" target="_blank">聚宝盆餐饮开放平台</a></li>
          </ul>
        </div>
        <div class="column fl info">
          <div class="title">公司信息</div>
          <ul>
            <li><a href="http://www.meituan.com/about/" class="ca-darkgrey" target="_blank" rel="nofollow">关于美团</a></li>
            <li><a href="http://www.meituan.com/about/press" class="ca-darkgrey" target="_blank" rel="nofollow">媒体报道</a></li>
            <li><a href="/help/job" class="ca-darkgrey" target="_blank" rel="nofollow">加入我们</a></li>
            <li><a href="/help/rule" class="ca-darkgrey" target="_blank" rel="nofollow">美团点评餐饮安全管理办法</a></li>
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

    <script type="text/javascript" data-main="http://xs01.meituan.net/waimai_web/js/page/favorite/restaurant_53cae7ab" src="http://xs01.meituan.net/waimai_web/js/lib/r.js"></script>
    
    <!-- <script type="text/javascript" data-main="http://xs01.meituan.net/waimai_web/js/page/account/setting_b24d1d1f" src="http://xs01.meituan.net/waimai_web/js/lib/r.js"></script> -->
  
  <script>
      $('a').on('click',function(){
        var id = $(this).parent().parent().parent().parent().parent().attr('data-id');
        var uid = '<?php echo ($v["uid"]); ?>';
        var that = $(this);
        // console.log(uid);
        // console.log($(this).parent().parent().parent().parent().parent().attr('data-id'));
        // console.log($(this).parent().parent().parent().parent().parent());
        $.post("<?php echo U('');?>",{sid:id,uid:uid},function (data){
          console.log(data);
          if (data) {

            that.parent().parent().parent().parent().parent().remove();
            
          }

        })
      });
  </script>

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
            console.log(data);
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
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
    <meta name="description" content="美旅外卖专业品质外卖网，饿了么，饿了订外卖就上美旅外卖。美旅外卖覆盖全国各城市优质外卖商家、快餐和特色美食，拥有最先进的外卖网上订餐平台和专业外卖送餐团队，提供24小时叫外卖、外卖网上订餐服务。">
    <title>美旅外卖-确认订单</title>    


    <!-- <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/static/img/favicon_1.ico"> -->
    <link rel="icon" href="/first/Public/home/meilv.ico" size="16x16 32x32">

    <link rel="stylesheet" href="/first/Public/css/preview_a5a255a2.css" />

    <link rel="stylesheet" href="/first/Public/css/bootstrap.min.css" />
    <script src="/first/Public/js/jquery.js"></script>
    <script src="/first/Public/js/bootstrap.min.js"></script>
	<style>
		.page-header {
	            padding-bottom: 9px;
	            margin: 0px 0 20px;
	            border-bottom: 1px solid #eee;
	      }
        
            .search-box .header-search {
                display: block;
                width: 234px;
                height: 14px;
                padding: 7px 0;
                font-size: 12px;
                color: #535353;
                border: none;
                background: 0 0;
                margin: 12px 0 5px 10px;
            }
	</style>
    
	</head>
	<body>
	  
	  <div class="wrapper">
  	  <div class="page-header clearfix">
        <div class="top-nav">
          <div class="topnav-wrap">
            <div class="fr welcome">
                
    <!-- <div id="is-login" class="top-loginbar fl">
      <div class="top-loginbar-inner">
        <span class="fl top-loginbar-username">欢迎你，<?php echo ($_SESSION['userinfo']['name']); ?></span>
        <i class="icon i-top-yarrow"></i>
      </div>
      <ul class="login-menu">
        <li><a class="wrap" href="/customer/order/list">我的订单</a></li>
        <li><a class="wrap" href="/favorite/restaurant">我的收藏</a></li>
        <li><a class="wrap" href="<?php echo U('Out/outLogin');?>" id="logout">退出</a></li>
      </ul>
    </div> -->
    <?php if(empty($_SESSION['userinfo']['name'])): ?><span id="dis-login" class="top-disloginbar fl">
        <a class="j-register register-btn fl"  href="<?php echo U('Register/userRegister');?>" rel="nofollow">注册</a>
        <span class="lg-divide fl">|</span>
        <a class="j-login login-btn fl"  href="<?php echo U('Login/LoginExtends');?>" rel="nofollow">登录</a>
    </span>

    <?php else: ?>
  
      <div id="is-login" class="top-loginbar fl">
      <div class="top-loginbar-inner">
        <span class="fl top-loginbar-username"><?php echo ($_SESSION['userinfo']['name']); ?></span>
        <i class="icon i-top-yarrow"></i>
      </div>
      <ul class="login-menu">
        <li><a class="wrap" href="/customer/order/list">我的订单</a></li>
        <li><a class="wrap" href="/favorite/restaurant">我的收藏</a></li>
        <li><a class="wrap" href="<?php echo U('Out/outLogin');?>" id="logout">退出</a></li>
      </ul>
    </div><?php endif; ?>
              <a  class="wap fl" rel="nofollow"><i class="icon i-top-mobile"></i><span>手机版</span></a>
              <a  class="site-name fl" ><i class="icon i-top-tuan"></i><span>美旅网</span></a>
              <a  class="site-name fl" ><i class="icon i-top-call"></i><span>联系我们</span></a>
            </div>


            <i class="fl icon i-top-loc"></i>
              <span class="current-city fl" id="current-city">天河区</span>
            
            
              
              <span class="address fl" id="address">
                <span id="curr-location" class="current-address fl">东圃大马路</span>
                <span class="addr-dvd">|</span>
                <div class="change fl clearfix" id="changePosition">
                  <a href="/?stay=1" class="change-link">
                    <span class="fl">切换地址</span>
                      <i class="icon i-top-yarrow"></i>
                  </a>
                    <ul>
                          <li>
                            <a class="wrap clearfix"  title="是德科技大厦">
                              <i class="icon i-hisbar-timer fl"></i>
                              <div class="na fl">是德科技大厦
                  
</div>
                            </a>
                          </li>
                        <li>
                          <a class="wrap clearfix"  title="换至新地址">
                            <i class="icon i-hisbar-cy fl"></i><div class="na fl">换至新地址</div>
                          </a>
                        </li>
                    </ul>
                </div>
              </span>
            
          </div>
        </div>
        <div class="middle-nav">
          <div class="middlenav-wrap clearfix">
            <h1 class="logo fl">
              <a href="/"  title="美旅外卖"><img src="/first/Public/images/logo.png" alt="美旅外卖"></a>
            </h1>
            <div class="desire fl">
              <a href="<?php echo U('Index/index');?>" class="ca-lightgrey"><span>首页</span></a>
              <a href="<?php echo U('Orders/index');?>" class="ca-lightgrey" rel="nofollow"><span>我的外卖</span></a>
              <a href="<?php echo U('Orders/saleOrders');?>" class="ca-lightgrey"><span>入驻加盟</span></a>
            </div>
            <div class="search-box fr">
              <input type="text" class="header-search fl" placeholder="搜索商家，美食" />
              <a href="javascript:;" class="doSearch fr" ></a>
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



<div id="anti_token" data-token="11Q/WuDsQhWegl5EqE8eWlvKhrKvJpaj6DNiJ5VEAOUlZjZRXZpMzyumYZ0kB+k4"></div>

<div class="breadcrumb">
  <a class="ca-brown" href="/restaurant/149400"><?php echo ($storeName); ?></a><i>&gt;</i><span>确认购买</span>
</div>

<div class="clearfix order-confirm" id="j-order-confirm">


  <div class="order-info-wrapper j-order-info-wrapper clearfix">
    <div class="fl address">

      <table class="standard-table dishes-table">
        <thead>
          <tr class="bot-border">
            <th class="left" width="240"><div class="th-inner align-left">菜品</div></th>
            <th class="right" colspan="2"><div class="th-inner align-right">价格/份数</div></th>
          </tr>
        </thead>
        <tbody>
        	<?php if(is_array($orderList)): foreach($orderList as $key=>$v): ?><tr class="" >
                <td class="left">
                  <div class="td-inner align-left" title="<?php echo ($v["name"]); ?>">
                    <div><?php echo ($v["name"]); ?></div>
                    <div class="dish-sku">
                    </div>
                  </div>
                </td>
                <td class="right" colspan="2">
                    <div class="td-inner align-right">
                      &yen;<?php echo ($v["price"]); ?>*<?php echo ($v["num"]); ?>
                    </div>
                </td>
              </tr><?php endforeach; endif; ?>
            <tr class="delivery-cost bot-border">
              <td class="left"><div class="td-inner align-left">配送费</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">&yen;5</div></td>
            </tr>
            <tr class="delivery-cost bot-border">
              <td class="left"><div class="td-inner align-left">包装盒</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">&yen;<?php echo ($num); ?></div></td>
            </tr>
            <tr class="total" data-total="56">
              <td colspan="3" class="clearfix middle">
                <div class="td-inner clearfix">
                  <span class="t-total fl">合计</span>
                  <span class="t-number fr">&yen;<?php echo ($totalPrice); ?></span>
                </div>
              </td>
            </tr>
        </tbody>
      </table>

        
      <div class="ticket-age"></div>

    </div>
    <div class="dishes">
      <div class="dishes-rap">
        <div class="address-head">
          <h3 class="address-title">
              送餐详情
          </h3>
        </div>
		
		<?php if(!empty($_SESSION['userinfo'])): ?><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加新地址</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo U('Address/addAddress');?>" method="post">
          <input type="hidden" name="sid" value="<?php echo ($sid); ?>">
          <div class="form-group">
            <label for="recipient-name" class="control-label">联系人:</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="请填写收货人姓名" name="name">
          </div>
          <div class="form-group">
            <label for="sex1" class="form-inline">男:</label>
            <input type="radio" class="form-inline" id="sex1" value="1" name="address-sex"></input>
            <label for="sex2" class="form-inline">女:</label>
            <input type="radio" class="form-inline" id="sex2" value="2" name="address-sex"></input>
          </div>
          <div class="form-group">
            <label for="phone" class="control-label">手机号码:</label>
            <input class="form-control" id="phone" placeholder="收货人电话" name="phone"></input>
          </div>
          <div class="form-group">
            <label for="address" class="control-label">收餐地址:</label>
            <input class="form-control" id="address" placeholder="请填写收餐详细地址" name="address"></input>
          </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	        <button type="submit" class="btn btn-primary">保存</button>
	      </div>
        </form>
      </div>
    </div>
  </div>
</div>


	<?php else: ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">请先登录</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo U('Login/verify');?>" method="post">
          <input type="hidden" name="sid" value="<?php echo ($sid); ?>">
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名:</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="请填写用户名" name="name">
          </div>
          
          <div class="form-group">
            <label for="password" class="control-label">密码:</label>
            <input type="password" class="form-control" id="password" placeholder="请输入密码" name="pass"></input>
          </div>
          
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	        <button type="submit" class="btn btn-primary">登录</button>
	      </div>
        </form>
      </div>
    </div>
  </div>
</div><?php endif; ?>

<?php if(!empty($_SESSION['userinfo'])): ?><div class="modal fade" id="exampleModalPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">付款</h4>
      </div>
      <div class="modal-body">
        <img src="/first/Public/images/pay.jpg" height="250" alt="">
        <img src="/first/Public/images/pay1.jpg" height="250" alt="">
        <img src="/first/Public/images/wechatPay.jpg" height="250" alt="">

        <form action="<?php echo U('ShopCar/newOrder');?>" method="post" id="myPay">
          <input type="hidden" name="uid" value="<?php echo ($_SESSION['userinfo']['id']); ?>">
          
          <input type="hidden" name="aid" >

          <input type="hidden" name="sid" value="<?php echo ($sid); ?>">

          <input type="hidden" name="totalPrice" value="<?php echo ($totalPrice); ?>">
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">确定</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


  <?php else: ?>
  <div class="modal fade" id="exampleModalPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">请先登录</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo U('Login/verify');?>" method="post">
          <input type="hidden" name="sid" value="<?php echo ($sid); ?>">
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名:</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="请填写用户名" name="name">
          </div>
          
          <div class="form-group">
            <label for="password" class="control-label">密码:</label>
            <input type="password" class="form-control" id="password" placeholder="请填写密码" name="pass"></input>
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">登录</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div><?php endif; ?>


        <form id="orderForm" class="order-form">
          <div id="address-list" class="address-list">
                <div id="address-new" class="address-box-empty" data-newuser="1" data-toggle="modal" data-target="#exampleModal" data-whatever="">
                  <i class="order-icon i-add-addr"></i>添加新地址
                </div>
                <?php if(!empty($addressList)): if(is_array($addressList)): foreach($addressList as $key=>$vo): ?><div class="address-box-empty">
                			
	                			<label><input type="radio" name="address" value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); echo ($vo["sex"]); ?>:<?php echo ($vo["phone"]); ?>
	                			详细地址：<?php echo ($vo["address"]); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-id="<?php echo ($vo["id"]); ?>">删除</button>
                			
                		</div><?php endforeach; endif; endif; ?>
          </div>

            
        </form>
		
        <!-- <script type="text/template" id="addressDialog"> -->
          
        <!-- </script> -->
      </div>
        
		<script type="text/javascript">

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

        $('.btn-danger').on('click', function() {
          // alert($(this).attr('data-id'));
          var that = $(this);
          var aid = $(this).attr('data-id');
          $.post('<?php echo U("Address/delAddress");?>', {aid:aid}, function(data) {
            // console.log(data);
            if (data == 1) {
              that.parents('.address-box-empty').remove();
            }
          });
        });
        $('#myPay').submit(function() {
           // console.log(typeof $('input[name="aid"]').val());
          if ( $('input[name="aid"]').val() == '') {
            alert('请选择收货地址');
            return false;
          }

        });


        $('input[type="radio"]').click(function() {
          var aid = $(this).val()
          $('input[name="aid"]').val(aid);
        })
				$('.i-top-yarrow').mouseover(function() {
		        $('.top-loginbar').addClass('hover');
		      	});
		      	$('#is-login').mouseleave(function() {
		        $('.top-loginbar').removeClass('hover');
		      	});


			// $('#address-new').on('click', function() {
			// 	// alert(1);
			// 	console.log(<?php echo ($login); ?>);
			// });
			$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var recipient = button.data('whatever') // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this);
			  	$('#sex1').val('1');
        $('#sex2').val('2');
				
        // $('input[name="sid"]').val(4);
			});
      $('#exampleModalPay').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        // modal.find('.modal-title').text('添加新地址')
        // modal.find('.modal-body input').val(recipient);
        
      });
		</script>
      <div class="pay-area">
        <div id="order-address-warning" class="order-address-warning" style="display: none"></div>
          
 
          <a class="s-btn yellow-btn fr " id="confirmOrder"><span class="s-btn" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalPay">去付款</span></a>
        <div class="tips ct-black">
            您需支付&nbsp;<span class="price cc-lightred-new">&yen;<span id="totalPrice"><?php echo ($totalPrice); ?></span>
              <span  class="nodiscount-tip borderradius-2">
                您今日优惠已用完，本单不再享受优惠
                <i class="icon i-discountip"></i>
              </span>
              <span  class="nodiscount-tip borderradius-2">
                您今日优惠已用完，使用<a >手机客户端</a>可享更多优惠
                <i class="icon i-discountip"></i>
              </span>
            </span>
          <span id="endfix" class="ct-black hidden">，饭到当面付款</span><br/>

              <span class="ct-lightgrey">* 由&nbsp;<img class="pay-thirdpart-pic" src=""><?php echo ($storeName); ?>&nbsp;提供外卖服务</span>
        </div>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>
    <div class="page-footer">
      <div class="footer-wrap">
        <div class="column fl corp">
          <ul>
            <li><a  class="kaidian_address">我要开店</a></li>
            <li><a  >配送加盟</a></li>
            <li><a  >城市代理</a></li>
            <li><a  >零售加盟</a></li>
          </ul>
        </div>
        <div class="column fl info">
          <ul>
            <li><a  >开放平台</a></li>
            <li><a  >关于美旅</a></li>
            <li><a   >媒体报道</a></li>
            <li><a  >规则中心</a></li>
          </ul>
        </div>
        <div class="column fl ques">
                  <ul>
                    <li><a >常见问题</a></li>
                    <li><a >用户反馈</a></li>
                    <li><a >诚信举报</a></li>
                    <li><a >加入我们</a></li>
                  </ul>
                </div>
        <div class="column fl service">
          <div class="details">
            <p class="w2">1010-9777</p>
            <!-- <p class="w2">4008508888</p> -->
            <!-- <p class="w2">010-56652722</p> -->

              <p class="w3">周一至周日 9:00-23:00</p>

            <p class="w3">客服不受理商务合作</p>
          </div>
        </div>
        <div class="QRcode fl">
            <div class="footer-qrcode fl"></div>
            <div class="fl">
                <p class="qr-text1">小程序下单</p>
                <p class="qr-text2">更多商家，更多优惠</p>
            </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="copyright-wrap">
        <span class="sp-ft">
          <a target="_blank" title="备案信息" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202011122700003" class="record"></a>
        </span>
        <span class="copyright">&copy;2015 meituan.com <a target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a> 京公网安备11010502025545号</span>
    </div>
  </div>

  

    <script type="text/javascript" data-main="http://xs01.meituan.net/waimai_web/js/page/order/previewnew_b826ad94" src="/first/Public/js/r1.js"></script>

	</body>
</html>
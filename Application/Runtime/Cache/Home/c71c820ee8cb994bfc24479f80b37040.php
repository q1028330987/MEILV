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
        <li><a href="<?php echo U('User/collect');?>" class="borderradius-1 my-favorite ">我的收藏</a></li>
        <li><a href="<?php echo U('Orders/myRate');?>" class="borderradius-1 my-favorite ">我的评论</a></li>
      </ul>
    </span>
    <span href="javascript:;" class="tab">
      <span class="title">我的店铺</span>
      <ul>
        <li><a href="<?php echo U('Orders/saleOrders');?>" class="borderradius-1 my-account ">店内订单</a></li>
        <li><a href="<?php echo U('User/userStore');?>" class="borderradius-1 my-favorite active">店内商品</a></li>
      </ul>
    </span>
  </div>
  <div class="setting-box" id="setting-box" style="height: 800px;">
    <div class="user-info clearfix ct-commonblack">
<?php if($info == false): ?><blockquote>
        <p>您还没有店铺或已经在申请,请耐心等待审核</p>
        <footer>如还没有申请店铺请点击申请店铺 <a href="<?php echo U('ManStore/storeApplication');?>"><cite title="Source Title">申请店铺</cite></a></footer>
      </blockquote>

<?php else: ?>

<div class="container-fluid">
  <div class="row-fluid" id="divrow">
    <div  class="span6" style="float:left; width:400px;height:100px;">
      <img alt="140x140" width="150px" src="/first/Public/<?php echo ($info["pic"]); ?>" class="img-thumbnail" />
<!--     </div>
    <div class="span6"  style="width:300px;height:100px;"> -->
      <dl style="float: right;margin-left:170px; margin-top:-105px;">
        <dt style="display:inline;">店铺名　:　</dt>
        <dd style="display:inline;"><?php echo ($info["name"]); ?></dd><br>
        <dt style="display:inline;">营业时间:　</dt>
        <dd style="display:inline;"><?php echo ($info["start"]); ?>:00-<?php echo ($info["stop"]); ?>:00</dd><br>
        <dt style="display:inline;">店铺地址:　</dt>
        <dd style="display:inline;"><?php echo ($info["address"]); ?></dd><br>
        <dt style="display:inline;">店铺号码:　</dt>
        <dd style="display:inline;"><?php echo ($info["phone"]); ?></dd><br>
        <dt style="display:inline;">起送￥:　</dt>
        <dd style="display:inline;"><?php echo ($info["upsend"]); ?>　</dd>
        <dt style="display:inline;">配送￥:　</dt>
        <dd style="display:inline;"><?php echo ($info["peisend"]); ?></dd>
        <dt><a type="button" href="<?php echo U('ManStore/setStore');?>">设置店铺信息</a></dt>
      </dl>
    </div>
<?php if($info['status'] == 1): ?><button class="btn btn-default btn-sm" style="margin-left:663px;margin-top:-100px;" onClick="stop_store(this,'<?php echo ($info["id"]); ?>')" type="button">店铺营业中</button>
<?php elseif($info['status'] == 0 ): ?>
        <button class="btn btn-default btn-sm" style="margin-left:663px;margin-top:-100px;" onClick="start_store(this,'<?php echo ($info["id"]); ?>')" type="button">店铺休息中</button><?php endif; ?>
  </div>

  <div class="row-fluid">
    <div class="span12">
      <ul class="nav nav-tabs" style="height:100px">
        <li class="<?php echo ($id == ''?'active':''); ?>" >
          <a href="<?php echo U('User/userStore');?>" style="color:#333;">全部商品</a>
        </li>
<?php if(is_array($goodsType)): foreach($goodsType as $key=>$v): ?><li class="<?php echo ($id == $v['id']?'active':''); ?>" >
         <a href="<?php echo U('User/userStore');?>?id=<?php echo ($v["id"]); ?>" style="color:#333;" ><?php echo ($v["name"]); ?></a>
        </li><?php endforeach; endif; ?>
        <li class="" style="float: right;">
          <a href="<?php echo U('ManStore/goodsType');?>"  style="color:#333;" >商品分类管理</a>
        </li>
        <li class="" style="float: right;">
          <a href="<?php echo U('ManStore/addGoods');?>"  style="color:#333;" >添加商品</a>
        </li>
      </ul>
      <div class="row-fluid">
      </div>
<?php if(is_array($goodsData)): foreach($goodsData as $key=>$vg): ?><div class="col-xs-3 span3" id="goods" style="margin-top:10px;background:white">
        
          <img alt="140x140" width="150px" height="150px" src="/first/Public/<?php echo ($vg["pic"]); ?>" class="img-rounded" />
          <div class="row-fluid">
            <dt style="">商品名:　</dt><dd style="height:20px;overflow: hidden;"><?php echo ($vg["name"]); ?></dd>
            <dt style="display:inline;">价　格:　</dt><dd style="display:inline;"><?php echo ($vg["price"]); ?></dd><br>
          </div>
          <div class="row-fluid" >
            <div class="span6" id="button">
<?php if($vg["status"] == 1): ?><button class="btn btn-danger btn-xs" onClick="goods_stop(this,'<?php echo ($vg["id"]); ?>')"  type="button">下架</button>
<?php else: ?>
               <button class="btn btn-default btn-xs" onClick="goods_start(this,'<?php echo ($vg["id"]); ?>')" type="button">上架</button><?php endif; ?>
               <button class="btn btn-default btn-xs" onClick="goods_save(<?php echo ($vg["id"]); ?>)" type="button">编辑</button>
               <button class="btn btn-default btn-xs" onClick="goods_del(this,'<?php echo ($vg["id"]); ?>')" type="button">删除</button>
            </div>
          </div>
        </div><?php endforeach; endif; ?>

    </div>
  </div>
</div><?php endif; ?>
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

function goods_stop(obj,id){

 layer.confirm('确认要下架吗？', {

  btn: ['确定','取消'] 
  }, function(){

    $.post('<?php echo U("ManStore/stop");?>', { id: id },
    function(data){
      if (data) {

        $(obj).parent("div").prepend('<button class="btn btn-default btn-xs" onClick="goods_start(this,'+id+')" type="button">上架</button>');
        layer.msg('您的商品已下架');
        $(obj).remove();

      }
    },'json');

  }, function(){

    layer.msg('您选择了不下架')});

}
function goods_start(obj,id){

  layer.confirm('确认要上架吗？', {

  btn: ['确定','取消'] 
  }, function(){

    $.post('<?php echo U("ManStore/start");?>', { id: id },
    function(data){
      if (data) {
        $(obj).parent("div").prepend('<button class="btn btn-danger btn-xs" onClick="goods_stop(this,'+id+')"  type="button">下架</button>');
        layer.msg('您的商品已上架');
        $(obj).remove();

      }
    },'json');

  }, function(){

    layer.msg('您选择了不上架')});
  }


  function goods_del(obj,id){

  if (confirm('确认要删除商品么？')) {

    $.post('<?php echo U("ManStore/del");?>', { id: id },
    function(data){
      if (data == 1) {
        $(obj).parent().parent().parent().fadeTo("slow", 0.05, function(){
          $(obj).parent().parent().parent().slideUp("slow", function() {

            layer.msg('删除成功');

          });
        });
      }else{

        layer.msg('删除失败');

      }
    });

  }

}


function goods_save(id){

    location.href = "<?php echo U('ManStore/saveGoods');?>?id="+id;

}


function stop_store(obj,id){

  if (confirm('确认要关店休息么？')) {
    // console.log($(obj).parent("div"));
    $.post('<?php echo U("ManStore/stopStore");?>', { id: id },
    function(data){
      if (data) {
        
        $(obj).parent("#divrow").append('<button class="btn btn-default btn-sm" style="margin-left:663px;margin-top:-100px;" onClick="start_store(this,'+id+')" type="button">店铺休息中</button>');
        layer.msg('您的店铺已休息');
        $(obj).remove();

      }else{

        layer.msg('休息失败！');

      }
    });

  }

}


function start_store(obj,id){

  if (confirm('开始营业？？')) {

    // console.log($(obj).parent("#divrow"));

    $.post('<?php echo U("ManStore/startStore");?>', { id: id },
    function(data){
      if (data) {
        
        $(obj).parent("div").append('<button class="btn btn-default btn-sm" style="margin-left:663px;margin-top:-100px;" onClick="stop_store(this,'+id+')" type="button">店铺营业中</button>');
        layer.msg('您的店铺已营业');
        $(obj).remove();

      }else{

        layer.msg('开店失败！');

      }
    });

  }

}
       
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
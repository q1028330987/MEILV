<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>找回密码 </title>
        <link rel="shortcut icon" type="image/x-icon" href="/static/favicon.ico" />

                    <link rel="stylesheet" type="text/css" href="/first/Public/css/pass/yzpass.css"/></head>
    <body>        <div id="wrapper">
                                            <div class="common-head">
    <div class="top-nav">
        <div class="top-nav-inner">
            <ul class="nav-list">
                                    <li class="nav-list_item">
                        <a rel="nofollow" href="<?php echo U('Login/LoginExtends');?>">登录</a>
                    </li>
                    <li class="nav-list_item">
                        <a rel="nofollow" href="<?php echo U('Register/userRegister');?>">注册</a>
                    </li>
                
                <li class="dropdown nav-list_item">
                    <a class="dropdown__toggle" href="" gaevent="top/service">
                        <span>联系客服</span>
                        <i class="tri tri--dropdown"></i>
                        <i class="vertical-bar"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu--text dropdown-menu--help">
                        <ul class="site-help-info">
                            <li><a rel="nofollow" class="dropdown-menu__item" href="http://www.meituan.com/help/selfservice" gaevent="top/service/refund">申请退款</a></li>
                            <li><a rel="nofollow" class="dropdown-menu__item" href="http://www.meituan.com/help/selfservice?tab=1" gaevent="top/service/returns">申请退换货</a></li>
                            <li><a rel="nofollow" class="dropdown-menu__item" href="http://www.meituan.com/help/selfservice?tab=2" gaevent="top/service/code">查看美团券</a></li>
                            <li><a rel="nofollow" class="dropdown-menu__item" href="http://www.meituan.com/help/selfservice?tab=3" gaevent="top/service/tel">换绑手机号</a></li>
                            <li><a rel="nofollow" class="dropdown-menu__item" href="http://www.meituan.com/help/faq" gaevent="top/service/faq">常见问题</a></li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
        
    </div>
    <div class="brand">
        <a  class="logo"> 验证中心</a>
    </div>
</div>
        
        <div id="bdw" class="bdw">
    <div id="bd" class="cf">
        <div class="content">
            <h3 class="headline">
                <span class="headline__content">找回密码</span>
            </h3>

            <ul class="steps-bar steps-bar--dark cf">
    
    
                    
        
        <li class="step step--current" style="z-index:3;width:33.333333333333336%;">
            <span class="step__num">1.</span>
            <span>选择验证方式</span>
            <span class="arrow__background"></span>
            <span class="arrow__foreground"></span>
        </li>

                
                    
        
        <li class="step step--pre" style="z-index:2;width:33.333333333333336%;">
            <span class="step__num">2.</span>
            <span>验证/修改</span>
            <span class="arrow__background"></span>
            <span class="arrow__foreground"></span>
        </li>

        
                    
        
        <li class="step step--pre" style="z-index:1;width:33.333333333333336%;">
            <span class="step__num">3.</span>
            <span>完成</span>
            <span class="arrow__background"></span>
            <span class="arrow__foreground"></span>
        </li>

        
            </ul>

            
                            <p class="verify-tip-title">您正在为账户<b><?php echo ($list); ?></b>重置登录密码，请选择找回方式：</p>
            
            <ul class="find-ways">
                                                                                                                                    
                                        <form class="way__content cf" action="<?php echo U('Login/yzPass');?>" method="POST" data-id="0">
                                            <input class="btn immi-retrieve" type="submit" value="立即找回" data-mtevent="nextstep" />
                                            <input type="hidden" value="<?php echo ($list); ?>" name="name" />
                                            <i class="icon icon--mobile"></i>
                                            <span class="title">通过邮箱验证</span>
                                            <span class="description">需要您绑定的邮箱可以接收邮箱</span>
                                        </form>
                                    </li>
                                                                                                                                                </ul>

        </div>
    </div>
</div>

                    <div class="common-footer">
    <p>©2016 meituan.com 京ICP证070791号 京公网安备11010502025545号</p>
</div>

                    </div>

</body>
        </html>
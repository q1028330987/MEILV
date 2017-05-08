<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>通过短信验证 </title>
        <link rel="shortcut icon" type="image/x-icon" href="/static/favicon.ico" />

                    <link rel="stylesheet" type="text/css" href="/first/Public/css/pass/findpass.css"/></head>
    <body>        <div id="wrapper">
                                            <div class="common-head">
    <div class="top-nav">
        <div class="top-nav-inner">
            <ul class="nav-list">
                                    <li class="nav-list_item">
                        <a rel="nofollow" href="https://passport.meituan.com/account/unitivelogin?service=www">登录</a>
                    </li>
                    <li class="nav-list_item">
                        <a rel="nofollow" href="https://passport.meituan.com/account/unitivesignup?service=www">注册</a>
                    </li>
                
                <li class="dropdown nav-list_item">
                    <a class="dropdown__toggle" href="http://www.meituan.com/help/selfservice" gaevent="top/service">
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
        <a href="http://www.meituan.com/" class="logo"> 验证中心</a>
    </div>
</div>
        
        <div id="bdw" class="bdw" data-action="findpwd">
    <div id="bd" class="cf">
        <div class="content">
                <div class="common-tip J-page-error-message" style="display:none">
                    <div class="sysmsg">
                        <p>
                            <span class="tip-status tip-status--error"></span>
                            <span class="J-error-content"></span>
                        </p>
                    </div>
                </div>

                <h3 class="headline">
                    <span class="headline__content">通过邮箱验证</span>
                </h3>

                <ul class="steps-bar steps-bar--dark cf">
    
    
            
        
        <li class="step step--post" style="z-index:3;width:33.333333333333336%;">
            <span class="step__num">1.</span>
            <span>选择验证方式</span>
            <span class="arrow__background"></span>
            <span class="arrow__foreground"></span>
        </li>

        
                            
        
        <li class="step step--current" style="z-index:2;width:33.333333333333336%;">
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

                                    <p class="verify-tip-title">您正在通过“绑定的邮箱”方式进行验证/修改</p>
                
                <form class="verify-cont verify--info" method="POST" action="<?php echo U('Login/emailPass');?>">
                    <input type="hidden" name="id" value="4" />

                        <div class="verify-help-title cf">
        <span class="tip-status tip-status--large tip-status--large--info"></span>
        <h3 class="title title-singleline">为了您的账户安全，请先验证邮箱</h3>
    </div>

                        
    <div class="mobile-verify-info">
    <div class="form-field form-field--text form-field--smssender">
        <label>您绑定的邮箱号</label>
        <div>
            <p>
                <span class="text color-highlight"><?php echo ($email); ?></span>
            </p>
            <div class="smssender-cont">
                <div class="J-resend-error-tip resend-error-tip" style="display:none;">
                    <span class="tip-status tip-status--error"></span>
                    <span class="J-content"></span>
                </div>

              <!--   <input type="button" class="btn btn-normal btn-mini J-send-message-btn" value="获取动态码">
 -->
                <div class="resend-wrapper">
                <!--     <a class="resend-message J-resend-message" href="javascript:void(0);">没收到短信动态码？</a> -->

                    <div class="resend-message-tip J-resend-tip common-bubble" style="display:none">
                        <div class="arrow--background"></div>

                        <div class="arrow--prospect"></div>

                        <div class="common-close--small J-close close"></div>

                        <!-- <ul class="resend-message-tip__list">
                            <li class="resend-message-tip__head">网络通讯异常可能会造成短信丢失，请重新发送短信</li>
                            <li>请核实手机是否已欠费停机，或者屏蔽了系统短信</li>
                            <li>如果手机159*****635已丢失或停用，请选择<a
                                href="/findpwd/select">选择其它验证方式</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        <input type="hidden" value="<?php echo ($list); ?>" name="code1" />
         <input type="hidden" value="<?php echo ($name); ?>" name="name" />
    <div class="form-field">
        <label>邮箱验证码</label>
        <input type="text" class="f-text" name="code" required />
    </div>

    </div>

    <div class="form-field">
        <input type="submit" class="btn next-step" value="下一步" />
        <a href="/findpwd/select" data-mtevent="prevstep">上一步</a>
    </div>
                </form>
        </div>
    </div>
</div>


                    <div class="common-footer">
    <p>©2016 meituan.com 京ICP证070791号 京公网安备11010502025545号</p>
</div>

                    </div>
   
</script></body>
        </html>
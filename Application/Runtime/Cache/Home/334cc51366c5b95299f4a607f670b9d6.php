<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

    <link rel="dns-prefetch" href="//s0.meituan.net">

    <link rel="apple-touch-icon" href="https://s0.meituan.net/img/apple-touch-icon-ipad.png">
    <link rel="shortcut icon" href="//p1.meituan.net/tuanpic/1e4d71577b7922f1ab756d202e1ac4af1342.ico">
    <link rel="icon" href="//p1.meituan.net/tuanpic/1e4d71577b7922f1ab756d202e1ac4af1342.ico" sizes="16x16 32x32">

    <link rel="alternate" href="http://www.meituan.com/feed" title="订阅更新" type="application/rss+xml">

    <link rel="canonical" href="/account/retrievepassword?service&#x3D;waimai&amp;continue&#x3D;http%3A%2F%2Fwaimai.meituan.com%3A80%2Faccount%2Fsettoken%3Fcontinue%3Dhttp%253A%252F%252Fwaimai.meituan.com%252Fhome%252Fws0es8j4zxd1">
    <meta name="keywords" content="美团,登录,注册,美团登录,美团注册">

    <title>登录 | 找回登录密码</title>
    <!--[if lt IE 9]>
        <script src="//s0.meituan.net/bs/jsm/?f&#x3D;fe-sso-fs:build/page/vendor/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="//s0.meituan.net/bs/css/?f=fe-sso-fs:build/page/forget/index.97a0fc2.css">



    <script>
        !function(e,t,n){function s(){var e=t.createElement("script");e.async=!0,e.src="//s0.meituan."+(-1===t.location.protocol.indexOf("https")?"net":"com")+"/bs/js/?f=mta-js:mta.min.js";var n=t.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)}if(e.MeituanAnalyticsObject=n,e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},"complete"===t.readyState)s();else{var i="addEventListener",r="attachEvent";if(e[i])e[i]("load",s,!1);else if(e[r])e[r]("onload",s);else{var a=e.onload;e.onload=function(){s(),a&&a()}}}}(window,document,"mta"),function(e,t,n){if(t&&!("_mta"in t)){t._mta=!0;var s=e.location.protocol;if("file:"!==s){var i=e.location.host,r=t.prototype.open;t.prototype.open=function(t,n,a,o,l){if(this._method="string"==typeof t?t.toUpperCase():null,n){if(0===n.indexOf("http://")||0===n.indexOf("https://")||0===n.indexOf("//"))this._url=n;else if(0===n.indexOf("/"))this._url=s+"//"+i+n;else{var h=s+"//"+i+e.location.pathname;h=h.substring(0,h.lastIndexOf("/")+1),this._url=h+n}var u=this._url.indexOf("?");-1!==u?(this._searchLength=this._url.length-1-u,this._url=this._url.substring(0,u)):this._searchLength=0}else this._url=null,this._searchLength=0;return this._startTime=(new Date).getTime(),r.apply(this,arguments)};var a="onreadystatechange",o="addEventListener",l=t.prototype.send;t.prototype.send=function(t){function n(n,i){if(0!==n._url.indexOf(s+"//frep.meituan.net/_.gif")){var r;if(n.response)switch(n.responseType){case"json":r=JSON&&JSON.stringify(n.response).length;break;case"blob":case"moz-blob":r=n.response.size;break;case"arraybuffer":r=n.response.byteLength;case"document":r=n.response.documentElement&&n.response.documentElement.innerHTML&&n.response.documentElement.innerHTML.length+28;break;default:r=n.response.length}e.mta("send","browser.ajax",{url:n._url,method:n._method,error:!(0===n.status.toString().indexOf("2")||304===n.status),responseTime:(new Date).getTime()-n._startTime,requestSize:n._searchLength+(t?t.length:0),responseSize:r||0})}}if(o in this){var i=function(e){n(this,e)};this[o]("load",i),this[o]("error",i),this[o]("abort",i)}else{var r=this[a];this[a]=function(t){r&&r.apply(this,arguments),4===this.readyState&&e.mta&&n(this,t)}}return l.apply(this,arguments)}}}}(window,window.XMLHttpRequest,"mta");

        mta("create","56b169118135d3e3104fdd0f");
        mta("send","page");
    </script>
    
</head>

<body class="pg-retrieve theme--waimai">

	<header class="header--mini">
    <div class="wrapper cf">
        <a class="site-logo" href="http://waimai.meituan.com">美团</a>
    </div>
</header>



    <div class="content">
        <h3 class="headline"><span class="headline__content">找回登录密码</span></h3>
        <ul class="steps-bar steps-bar--dark cf">
    <li class="step step--first step--current" style="z-index:3">
        <span class="step__num">1.</span>
        <span>确认账号</span>
        <span class="arrow__background"></span><span class="arrow__foreground"></span>
    </li>
    <li class="step step--post" style="z-index:2">
        <span class="step__num">2.</span>
        <span>选择验证方式</span>
        <span class="arrow__background"></span><span class="arrow__foreground"></span>
    </li>
    <li class="step step--post" style="z-index:1">
        <span class="step__num">3.</span>
        <span>验证/修改</span>
        <span class="arrow__background"></span><span class="arrow__foreground"></span>
    </li>
    <li class="step step--last step--post" style="z-index:0">
        <span class="step__num">4.</span>
        <span>完成</span>
        
    </li>
</ul>

        <div class="form__wrapper">
            <form class="form__content" method="POST" action="">
                <div class="form-field">
                    <label>美团账户</label>
                    <input class="f-text account" name="name" type="text" placeholder="用户名/邮箱" />
                    <span class="tip" style="display:none;"><i class="icon"></i><span></span></span>
                </div>
                <div class="form-field captcha cf">
                    <label>验证码</label>
                    <input class="f-text verify-code" name="code" type="text"  />
                    <img height="36px" width="72px" class="signup-captcha-img" id="signup-captcha-img" src="<?php echo U('Login/makeCode');?>" onclick="this.src='<?php echo U('Login/makeCode');?>?'+Math.random()"/> 
                </div>
                <div class="form-field">
                    <input type="hidden" name="csrf" value="yr035J88-pB8HBDoziASZT1lAwjph9Az6Pqg" />
                    <input type="submit" class="btn" value="下一步" />
                </div>
            </form>
        </div>
    </div>

	<footer class="footer--mini">
    <p class="copyright">
        ©<a class="f1" href="http://www.meituan.com">meituan.com</a>&nbsp;
        <a class="f1" target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a>&nbsp;
        <span class="f1">京公网安备11010502025545号</span>
    </p>
</footer>

</body>
</html>
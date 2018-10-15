<?php

echo '<!doctype html>' . "\r\n" . '<html>' . "\r\n\r\n" . '<head>' . "\r\n\t" . '<meta charset="utf-8" />' . "\r\n\t" . '<title>系统后台</title>' . "\r\n\t" . '<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width" />' . "\r\n\t" . '<meta name="robots" content="noindex,nofollow">' . "\r\n\t" . '<link href="template/css/login.css" rel="stylesheet" />' . "\r\n\t" . '<script type="text/javascript" src="js/login.js"></script>' . "\r\n" . '</head>' . "\r\n\r\n" . '<body>' . "\r\n\t" . '<div class="topbg">' . "\r\n\t\t" . '<span class="left"><a href="';
echo $mymps_global[SiteUrl];
echo '" target="_blank">访问网站首页</a></span>' . "\r\n\t\t" . '<span class="right"><a href="#" onClick="var strHref=window.location.href;this.style.behavior=\'url(#default#homepage)\';this.setHomePage(\'';
echo GetUrl();
echo '\');" style="cursor: hand">设为首页</a> <a href="#" onClick="collect();">加入收藏</a></span>' . "\r\n\t" . '</div>' . "\r\n\t" . '<div class="wrap">' . "\r\n\t\t" . '<h1>Mymps 后台管理中心</h1>' . "\r\n\t\t" . '<form name="Login" action="index.php?part=chk&url=';
echo $url;
echo '&go=';
echo $go;
echo '" method="post" onSubmit="return CheckForm();">' . "\r\n" . '            <input name="do" value="login" type="hidden">' . "\r\n\t\t\t" . '<div class="login">' . "\r\n\t\t\t\t" . '<ul>' . "\r\n\t\t\t\t\t" . '<li>' . "\r\n\t\t\t\t\t\t" . '<input class="input" required name="username" type="text" placeholder="帐号" title="管理员帐号" />' . "\r\n\t\t\t\t\t" . '</li>' . "\r\n\r\n\t\t\t\t\t" . '<li>' . "\r\n\t\t\t\t\t\t" . '<input class="input" type="password" required name="password" placeholder="密码" title="管理员密码" />' . "\r\n\t\t\t\t\t" . '</li>' . "\r\n\t\t\t\t\t";

if ($authcodesettings['adminlogin'] == 1) {
	echo "\t\t\t\t\t" . '<li>' . "\r\n\t\t\t\t\t\t" . '<img style="float:right;" src="../';
	echo $mymps_global[cfg_authcodefile];
	echo '" alt="看不清，请点击刷新" class="authcode" onClick="this.src=this.src+\'?\'" align="absmiddle"/> <input style="float:left; width:100px; height:28px;" class="input" type="text" required name="checkcode" placeholder="验证码" title="验证码" />' . "\r\n\t\t\t\t\t" . '</li>' . "\r\n\t\t\t\t\t" . ' ' . "\r\n\t\t\t\t\t";
}

echo "\t\t\t\t" . '</ul>' . "\r\n\t\t\t\t" . '<button type="submit" name="submit" class="btn">登录管理</button>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t" . '</form>' . "\r\n\t" . '</div>' . "\r\n\t" . '<div class="foot">' . "\r\n\t\t" . 'Powered by <a href="http://www.dabai.com" target="_blank">Mymps</a> ';
echo MPS_VERSION;
echo "\t" . '</div>' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>

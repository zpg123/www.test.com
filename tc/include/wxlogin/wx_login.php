<?php

define('IN_MYMPS', true);
define(CURROOT, dirname(__FILE__));
include CURROOT . '../../global.php';
include MYMPS_DATA . '/config.php';
include MYMPS_DATA . '/config.db.php';
$actionkey = $timestamp . rand(0, 100);
$url = base64_encode($mymps_global['SiteUrl'] . '/include/wxlogin/wxlogin.php?actionkey=' . $actionkey);
echo '<!DOCTYPE html>' . "\r\n" . '<html>' . "\r\n" . '<head>' . "\r\n" . '<meta charset=utf-8"';
echo $charset;
echo '" />' . "\r\n" . '<title>';
echo $mymps_global['SiteName'];
echo ' - 会员登陆</title>' . "\r\n" . '<script>var nowdomain="';
echo $mymps_global['SiteUrl'];
echo '";</script>' . "\r\n" . '<style type="text/css">body{margin:0;padding:0;font-size:14px;background-color:#333;color:#fff;text-align:center;font-family:"微软雅黑"}.wrapper h3{font-size:20px;font-weight:400;margin:50px 0 20px}.wrapper img{background-color:#FFF;padding:0;vertical-align:top;display:block;margin:0 auto}.impowerBox{padding:10px 0;background-color:#232323;border-radius:100px;-moz-border-radius:100px;-webkit-border-radius:100px;box-shadow:inset 0 5px 10px -5px #191919,0 1px 0 0 #444;-moz-box-shadow:inset 0 5px 10px -5px #191919,0 1px 0 0 #444;-webkit-box-shadow:inset 0 5px 10px -5px #191919,0 1px 0 0 #444;width:259px;margin:20px auto 0}.txtBox{color:#ccc;font-size:14px;margin-bottom:12px}</style>' . "\r\n" . '<body>' . "\r\n" . '<div class="wrapper">' . "\r\n\t" . '<h3>微信登录</h3>' . "\r\n\t" . '<div class="txtBox">请使用微信扫描二维码登录&ldquo;';
echo $mymps_global['SiteName'];
echo '&rdquo;</div>' . "\r\n\t" . '<img src="';
echo $mymps_global['SiteUrl'];
echo '/qrcode.php?size=6&url=';
echo $url;
echo '" id="wx_default_img" alt="" />' . "\r\n\t" . '<div class="impowerBox" id="wx_default_msg">等待扫描</div>' . "\r\n" . '</div>' . "\r\n" . '</body>' . "\r\n" . '<script src="';
echo $mymps_global['SiteUrl'];
echo '/template/default/js/jquery-1.10.2.min.js"></script>' . "\r\n" . '<script>' . "\r\n" . 'function loadwxlogin(){' . "\r\n\t" . 'var url = nowdomain+\'/javascript.php?part=chk_wxlogin&actionkey=';
echo $actionkey;
echo '\';' . "\r\n\t" . '$.get(url,function(data){' . "\r\n\t\t" . 'if(data == 1){' . "\r\n\t\t\t" . '$(\'#wx_default_msg\').html(\'登录成功，即将跳转\');' . "\r\n\t\t\t" . 'window.location.href = \'';
echo $mymps_global['SiteUrl'];
echo '/\';' . "\r\n\t\t" . '}else{' . "\r\n\t\t\t" . '$(\'#wx_default_msg\').html(\'等待扫描\');' . "\r\n\t\t" . '}' . "\r\n\t\t" . 'window.setTimeout(function(){loadwxlogin();},1500);' . "\r\n\t" . '});' . "\r\n" . '}' . "\r\n" . 'loadwxlogin();' . "\r\n" . '</script>' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>

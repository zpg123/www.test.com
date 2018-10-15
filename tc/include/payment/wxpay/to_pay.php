<?php

define('IN_AJAX', true);
@header('Content-Type: text/html; charset=utf-8');
!defined('IN_MYMPS') && exit('ACCESS DENIED!');
require_once 'function.php';
$payr['payuser'] = trim($payr['payuser']);
$payr['paykey'] = trim($payr['paykey']);
$payr['appid'] = trim($payr['appid']);
$payr['appsecret'] = trim($payr['appsecret']);
$order_no = ($ddno ? $ddno : getOrderNo());
session_start();
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$params['wx_appid'] = $payr['appid'];

if (!$_GET['code']) {
	if (!$_SESSION['openid'] || !$_SESSION['access_token']) {
		$request_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $params['wx_appid'] . '&redirect_uri=' . urlencode($url) . '&response_type=code&scope=snsapi_base&state=123#wechat_redirect';
		header('location:' . $request_url);
		exit();
	}
}
else {
	$json = getAccessTokenByCode($_GET['code'], $payr['appid'], $payr['appsecret']);
	$_SESSION['openid'] = $json['openid'];
	$_SESSION['access_token'] = $json['access_token'];
}

$params = array('orderno' => $order_no, 'money' => $money);
$config['title'] = ($charset == 'gbk' ? iconv('gbk', 'utf-8', $productname) : $productname);
$config['code'] = $params['orderno'];
$config['money'] = $params['money'] * 100;
$config['NotifyUrl'] = $PayReturnUrlQz . '/include/payment/wxpay/notify.php';
$config['openid'] = $_SESSION['openid'];
$config['appid'] = $payr['appid'];
$config['appsecret'] = $payr['appsecret'];
$config['payuser'] = $payr['payuser'];
$config['paykey'] = $payr['paykey'];
require_once 'wechat_jspay.php';
$weixinpay = new wechat_jspay($config);
$params = $result = $weixinpay->sendPay();

if ($result === false) {
	exit('支付请求过程出错');
}

echo '<!doctype html>' . "\r\n" . '<html class="no-js">' . "\r\n" . '<head>' . "\r\n" . '    <meta charset="utf-8">' . "\r\n" . '    <meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\r\n" . '    <meta name="description" content="">' . "\r\n" . '    <meta name="keywords" content="">' . "\r\n" . '    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">' . "\r\n" . '    <title>微信支付</title>' . "\r\n\r\n" . '    <!-- Set render engine for 360 browser -->' . "\r\n" . '    <meta name="renderer" content="webkit">' . "\r\n\r\n" . '    <!-- No Baidu Siteapp-->' . "\r\n" . '    <meta http-equiv="Cache-Control" content="no-siteapp"/>' . "\r\n\r\n" . '    <!-- Add to homescreen for Chrome on Android -->' . "\r\n" . '    <meta name="mobile-web-app-capable" content="yes">' . "\r\n\r\n" . '    <!-- Add to homescreen for Safari on iOS -->' . "\r\n" . '    <meta name="apple-mobile-web-app-capable" content="yes">' . "\r\n" . '    <meta name="apple-mobile-web-app-status-bar-style" content="black">' . "\r\n" . '    <link rel="stylesheet" href="template/css/weui.min.css">' . "\r\n" . '    <script type="text/javascript">' . "\r\n\r\n" . '        //调用微信JS api 支付' . "\r\n" . '        function jsApiCall()' . "\r\n" . '        {' . "\r\n" . '            WeixinJSBridge.invoke(' . "\r\n" . '                \'getBrandWCPayRequest\', {' . "\r\n" . '                    "appId"    : "';
echo $params['appId'];
echo '",     //公众号名称，由商户传入' . "\r\n" . '                    "timeStamp": "';
echo $params['timeStamp'];
echo '",         //时间戳，自1970年以来的秒数' . "\r\n" . '                    "nonceStr" : "';
echo $params['nonceStr'];
echo '", //随机串' . "\r\n" . '                    "package"  : "';
echo $params['package'];
echo '",' . "\r\n" . '                    "signType" : "';
echo $params['signType'];
echo '",         //微信签名方式:' . "\r\n" . '                    "paySign"  : "';
echo $params['paySign'];
echo '" //微信签名' . "\r\n" . '                },' . "\r\n" . '                function(res) {' . "\r\n" . '                    if (res.err_msg == "get_brand_wcpay_request:ok") {' . "\r\n" . '                        location.href = \'index.php?mod=member\';' . "\r\n" . '                    } else if (res.err_msg == "get_brand_wcpay_request:fail") {' . "\r\n" . '                        alert(\'支付失败\');' . "\r\n" . '                    }' . "\r\n" . '                }' . "\r\n" . '            );' . "\r\n" . '        }' . "\r\n\r\n" . '        function callpay()' . "\r\n" . '        {' . "\r\n" . '            if (typeof WeixinJSBridge == "undefined"){' . "\r\n" . '                if( document.addEventListener ){' . "\r\n" . '                    document.addEventListener(\'WeixinJSBridgeReady\', jsApiCall, false);' . "\r\n" . '                }else if (document.attachEvent){' . "\r\n" . '                    document.attachEvent(\'WeixinJSBridgeReady\', jsApiCall);' . "\r\n" . '                    document.attachEvent(\'onWeixinJSBridgeReady\', jsApiCall);' . "\r\n" . '                }' . "\r\n" . '            }else{' . "\r\n" . '                jsApiCall();' . "\r\n" . '            }' . "\r\n" . '        }' . "\r\n\r\n" . '    </script>' . "\r\n" . '</head>' . "\r\n" . '<body ontouchstart>' . "\r\n\r\n" . '<div class="weui_msg">' . "\r\n" . '    <div class="weui_text_area" style="margin-top: 5em;">' . "\r\n" . '        <div class="hd">' . "\r\n" . '            <h1 class="page_title">';
echo $money;
echo ' 元</h1>' . "\r\n" . '            <p class="weui_msg_desc">';
echo $config['title'];
echo '</p>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '    <div class="weui_opr_area" style="margin-top: 4em;">' . "\r\n" . '        <p class="weui_btn_area">' . "\r\n" . '            <a href="javascript:void(0)" onclick="callpay()" class="weui_btn weui_btn_primary">立即支付</a>' . "\r\n" . '            <a href="javascript:history.back();" class="weui_btn weui_btn_default">暂不支付</a>' . "\r\n" . '        </p>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n\r\n" . '</body>' . "\r\n" . '</html>';

?>

<?php
 define('WXLOGIN', 1);
$actionkey = $_GET['actionkey'] ? trim(htmlspecialchars($_GET['actionkey'])) : '';
$data = '';
@include('../../data/caches/wxlogin.php');
$appid = $data['appid'];
$appsecret = $data['appsecret'];
$callback = $data['callback'] . '?actionkey=' . $actionkey;
$scope = 'snsapi_userinfo';
$state = 'mymps';
wx_login($appid, $scope, $state, $callback);
function wx_login($zym_5, $zym_4, $zym_1, $zym_2){
    $zym_3 = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $zym_5 . '&redirect_uri=' . urlencode($zym_2) . '&response_type=code' . '&scope=' . $zym_4 . '&state=' . $zym_1 . '&connect_redirect=1#wechat_redirect';
    header("Location:$zym_3");
}
?>
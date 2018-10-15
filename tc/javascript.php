<?php
 error_reporting(E_ALL ^ E_NOTICE);
@header('Content-Type: text/html; charset=utf-8');
__FILE__ == '' && die('Fatal error code: 0');
define('IN_MYMPS', true);
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
define('MYMPS_ROOT', dirname(__FILE__));
define('MYMPS_DATA', MYMPS_ROOT . '/data');
define('MYMPS_INC', MYMPS_ROOT . '/include');
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Hongkong');
@set_magic_quotes_runtime(0);
if (defined('DEBUG_MODE') == false){
    define('DEBUG_MODE', 0);
}
if(PHP_VERSION < '4.1.0'){
    $_GET = & $HTTP_GET_VARS;
    $_SERVER = & $HTTP_SERVER_VARS;
    unset($HTTP_GET_VARS, $HTTP_SERVER_VARS);
}
if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])){
    exit('Request tainting attempted.');
}
require_once MYMPS_DATA . '/config.php';
require_once MYMPS_ROOT . '/include/common.fun.php';
require_once MYMPS_ROOT . '/include/class.fun.php';
require_once MYMPS_ROOT . '/include/custom.fun.php';
$part = isset($_GET['part']) ? mhtmlspecialchars($_GET['part']) : 'jswizard';
$flag = isset($_GET['flag']) ? mhtmlspecialchars($_GET['flag']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$inajax = isset($_GET['inajax']) ? intval($_GET['inajax']) : '';
$getvalue = isset($_GET['value']) ? mhtmlspecialchars($_GET['value']) : '';
$getvalue = iconv('GB2312', 'UTF-8', $getvalue);
$timestamp = time();
$cityid = isset($_GET['cityid']) ? intval($_GET['cityid']) : '';
$customtype = isset($customtype) ? mhtmlspecialchars($_GET['customtype']) : 'info';
$url = isset($_GET['url']) ? urlencode(mhtmlspecialchars($_GET['url'])) : '';
if(empty($part) || !in_array($part, array('advertisement', 'information', 'news', 'member', 'jswizard', 'iflogin', 'chk_remember', 'chk_remobile', 'chk_authcode', 'chk_smsauthcode', 'chk_answer', 'chk_remail', 'chk_wxlogin'))){
    $part = 'advertisement';
}
if($part == 'chk_answer'){
    $data = NULL;
    @require_once MYMPS_ROOT . '/include/cache.fun.php';
    $result = read_static_cache('checkanswer');
    if(is_array($result)){
        if(empty($getvalue) || empty($id)){
            exit('请输入验证问题！');
        }elseif($result[$id]['answer'] != $getvalue){
            exit('验证答案不正确！');
        }else{
            exit('success');
        }
    }
    $result = $getvalue = $whenpost = $data = NULL;
}elseif($part == 'chk_authcode'){
    @session_save_path(MYMPS_ROOT . '/data/sessions');
    exit(mymps_chk_randcode($getvalue) ? 'success' : '验证码错误，请重新输入');
    $getvalue = '';
//屏蔽手机验证码
//}elseif($part == 'chk_smsauthcode'){
//  @session_save_path(MYMPS_ROOT . '/data/sessions');
//  exit(mymps_chk_smsrandcode($getvalue) ? 'success' : '手机验证码输入不正确');
//  $getvalue = '';
}elseif($part == 'chk_remember'){
    require_once MYMPS_DATA . '/config.db.php';
    @header('Content-type: text/html; charset=' . $charset);
    require_once MYMPS_INC . '/db.class.php';
    if(empty($getvalue)){
        echo '用户名不符合规范！';
    }else{
        if(PASSPORT_TYPE == 'phpwind'){
            include MYMPS_ROOT . '/pw_client/uc_client.php';
            exit(uc_user_get($getvalue) ? '很遗憾！该用户名已被注册！' : 'success');
        }elseif(PASSPORT_TYPE == 'ucenter'){
            include MYMPS_ROOT . '/uc_client/client.php';
            exit(uc_get_user($getvalue) ? '很遗憾！该用户名已被注册！' : 'success');
        }else{
            $check = CheckUserID($getvalue, '用户名');
            if(strstr($getvalue, 'admin') || strstr($getvalue, '管理员')){
                exit('该用户名已被保护，请换一个用户名！');
            }
            if(strlen($getvalue) < 4 || strlen($getvalue) > 20){
                exit('可填写字母、数字、下划线_，不得少于4个字符');
            }
            if($check == 'ok'){
                exit((!$re = $db -> getOne("SELECT * FROM {$db_mymps}member WHERE userid LIKE '$getvalue'")) ? 'success' : '很抱歉！该用户名已经被注册！');
            }else{
                exit($check);
            }
        }
    }
    $getvalue = NULL;
}elseif($part == 'chk_remail'){
    $mod = isset($_GET['mod']) ? intval($_GET['mod']) : 0;
    require_once MYMPS_DATA . '/config.db.php';
    @header('Content-type: text/html; charset=' . $charset);
    require_once MYMPS_INC . '/db.class.php';
    if($db -> getOne("SELECT id FROM {$db_mymps}member WHERE email = '$getvalue'")){
        echo empty($mod) ? '很抱歉！该电子邮箱地址已经被注册！' : 'success';
    }else{
        echo $mod == 1 ? '该电子邮箱帐号不存在，无法发送邮件！' : 'success';
    }
}elseif($part == 'chk_wxlogin'){
    $actionkey = isset($_GET['actionkey']) ? mhtmlspecialchars($_GET['actionkey']) : '';
    require_once MYMPS_DATA . '/config.db.php';
    require_once MYMPS_INC . '/db.class.php';
    require_once MYMPS_INC . '/member.class.php';
    if($row = $db -> getRow("SELECT * FROM `{$db_mymps}member_wx` WHERE actionkey='$actionkey'")){
        $db -> query("DELETE FROM `{$db_mymps}member_wx` WHERE actionkey = '$actionkey'");
        $member_log -> in($row['userid'], $row['userpwd'], 'on', 'noredirect');
        echo 1;
    }else{
        echo 0;
    }
}elseif($part == 'chk_remobile'){
    $mod = isset($_GET['mod']) ? intval($_GET['mod']) : 0;
    require_once MYMPS_DATA . '/config.db.php';
    @header('Content-type: text/html; charset=' . $charset);
    require_once MYMPS_INC . '/db.class.php';
    if($db -> getOne("SELECT id FROM {$db_mymps}member WHERE mobile = '$getvalue'")){
        echo empty($mod) ? '很抱歉！该手机号码已经被注册！' : 'success';
    }else{
        echo $mod == 1 ? '该手机号码未注册会员，无法发送验证码！' : 'success';
    }
}elseif($part == 'advertisement'){
    empty($id) && exit(html2js('Invalid Id'));
    require_once MYMPS_ROOT . '/data/config.db.php';
    require_once MYMPS_ROOT . '/include/db.class.php';
    if($code = $db -> getOne("SELECT code FROM `{$db_mymps}advertisement` WHERE available > '0' AND starttime<='" . $timestamp . "' AND type = 'normalad' AND advid = '$id'")) echo html2js($code);
}elseif($part == 'iflogin'){
    require_once MYMPS_DATA . '/config.db.php';
    require_once MYMPS_INC . '/db.class.php';
    require_once MYMPS_INC . '/member.class.php';
    require_once MYMPS_INC . '/cache.fun.php';
    $qqlogin = read_static_cache('qqlogin');
    $wxlogin = read_static_cache('wxlogin');
    $echo = $qqlogin['open'] == 1 ? '<ul><a href="' . $mymps_global[SiteUrl] . '/include/qqlogin/qq_login.php" title="用QQ帐号登录">QQ登录</a></ul> <ul class="line"><u></u></ul>' : '';
    $echo .= $wxlogin['open'] == 1 ? '<ul><a href="' . $mymps_global[SiteUrl] . '/include/wxlogin/wx_login.php" title="微信扫一扫登录">微信登录</a></ul> <ul class="line"><u></u></ul>' : '';
    $qqlogin = $wxlogin = NULL;
    $echo .= '<ul><a href="' . $mymps_global['SiteUrl'] . '/' . $mymps_global['cfg_member_logfile'] . '?url=' . $url . '" >登录</a></ul><ul class="line"><u></u></ul><ul><a href="' . $mymps_global[SiteUrl] . '/' . $mymps_global['cfg_member_logfile'] . '?mod=register" >注册</a></ul>';
    echo $member_log -> chk_in() ? '欢迎回来，' . $s_uid . '！&nbsp;<a href="' . $mymps_global['SiteUrl'] . '/member/index.php">用户中心</a> <a href="' . $mymps_global[SiteUrl] . '/' . $mymps_global['cfg_member_logfile'] . '?mod=out&url=' . $url . '" >退出</a> ' : $echo;
}elseif(in_array($part, array('information', 'news', 'member'))){
    empty($id) && exit('Invalid Id');
    require_once MYMPS_ROOT . '/data/config.db.php';
    require_once MYMPS_ROOT . '/include/db.class.php';
    $viewed = mgetcookie($part . $id);
    if($viewed != 1){
        $db -> query("UPDATE `{$db_mymps}" . $part . "` SET hit = hit+1 WHERE id = '$id'");
        msetcookie($part . $id, 1, 60);
    }
    $hit = $db -> getOne("SELECT hit FROM `{$db_mymps}" . $part . "` WHERE id = '$id'");
    echo $hit;
}elseif($part == 'jswizard'){
    require_once MYMPS_ROOT . '/data/config.db.php';
    require_once MYMPS_ROOT . '/include/db.class.php';
    echo custom($flag, 'js');
}else{
    exit('Access Denied!');
}
unset($part, $flag, $cachefile, $nocache, $jsrefdomains, $allowflag, $jswizard_lists, $datalist, $writedata, $inajax, $timestamp);
?>
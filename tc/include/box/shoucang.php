<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
require_once MYMPS_INC . '/cache.fun.php';
require_once MYMPS_INC . '/member.class.php';
$infoid = ($_REQUEST['infoid'] ? intval($_REQUEST['infoid']) : '');
!$infoid && write_msg('收藏的信息主题ID不能为空!', 'olmsg');
$log = $member_log->chk_in();

switch ($log) {
case true:
	$msg = '<br>';

	if (0 < $db->getOne('SELECT COUNT(id) FROM `' . $db_mymps . 'shoucang` WHERE infoid = \'' . $infoid . '\' AND userid = \'' . $s_uid . '\'')) {
		$msg .= '<style>div{font-family:microsoft yahei;line-height:28px; font-size:14px; text-align:left; float:left; margin-bottom:30px; color:#585858;} span{margin-left:25px; margin-right:15px; display:block; float:left; height:64px; width:64px; background:url(' . $mymps_global[SiteUrl] . '/template/default/images/post/info_icons.png) 0 -128px no-repeat; margin-bottom:30px;}</style><span></span><div>您好，您已经收藏过该信息。不能重复收藏哦！<br />查看 <a href=\'' . $mymps_global[SiteUrl] . '/member/index.php?m=shoucang\' target=_blank style=\'font-size:14px;\'>我的收藏>></a></div>';
	}
	else {
		$r = $db->getRow('SELECT title,catid,html_path FROM `' . $db_mymps . 'information` WHERE id = \'' . $infoid . '\'');
		$url = Rewrite('info', array('id' => $infoid, 'catid' => $r['catid'], 'html_path' => $r['html_path']));
		$url = str_replace($mymps_global['SiteUrl'], '', $url);

		if (!$s_uid) {
			exit('无效的登录用户，请重新登录！');
		}

		$db->query('INSERT INTO `' . $db_mymps . 'shoucang` (infoid,title,url,userid,intime)VALUES(\'' . $infoid . '\',\'' . $r['title'] . '\',\'' . $url . '\',\'' . $s_uid . '\',\'' . $timestamp . '\')');
		$msg .= '<style>div{font-family:microsoft yahei;line-height:28px; font-size:14px; text-align:left; float:left; margin-bottom:30px; color:#585858;} span{margin-left:25px; margin-right:15px; display:block; float:left; height:64px; width:64px; background:url(' . $mymps_global[SiteUrl] . '/template/default/images/post/info_icons.png) 0 0 no-repeat; margin-bottom:30px;}</style><span></span><div>恭喜！已成功收藏到用户中心—我的收藏夹中！<br />查看 <a href=\'' . $mymps_global[SiteUrl] . '/member/index.php?m=shoucang\' target=_blank style=\'font-size:14px;\'>我的收藏>></a>';
	}

	echo $msg;
	$msg = $r = NULL;
	break;

default:
	$authcodesettings = read_static_cache('authcodesettings');
	$gourl = 'shoucang';
	include MYMPS_ROOT . '/template/box/login.html';
	break;
}

?>

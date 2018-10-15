<?php

(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$gd_info = @gd_info();
$gd_version = (is_array($gd_info) ? $gd_info['GD Version'] : '<font color=red>不支持GD库</font>');
$cfg_if_tpledit = ($mymps_mymps[cfg_if_tpledit] == 0 ? '<font color=green>关闭</font>' : '<font color=red>开启</font>');
$if_del_install = (!is_file(MYMPS_ROOT . '/install/index.php') ? '<font color=green>已删除</font>' : '<font color=red>未删除</font>');
$Register_Globals = (ini_get('Register_Globals') ? 'on' : 'off');
$Magic_Quotes_Gpc = (MAGIC_QUOTES_GPC ? 'on' : 'off');
$expose_php = (ini_get('expose_php') ? 'on' : 'off');
$cur_dir = getcwdOL();
$cur_dir = ($cur_dir == '/admin' ? '<font color=red title=不建议使用admin作为目录名>/admin</font>' : '<font color=green>' . $cur_dir . '</font>');
$latestbackup = $db->getOne('SELECT value FROM `' . $db_mymps . 'config` WHERE description = \'latestbackup\' AND type = \'database\'');
$parttime = round((0 < $latestbackup ? $timestamp - $latestbackup : 0) / (3600 * 24));

if (!$latestbackup) {
	$message = '<font color=red>您尚未备份过Mymps系统全部数据</font>';
}
else if (13 < $parttime) {
	$message = '<font color=red>您已经超过两周没有备份Mymps系统全部数据了</font>';
}
else if ($parttime == 0) {
	$message = '<font color=green>您今天已经备份过Mymps全部数据</font>';
}
else {
	$message = '您在 <font color=green>' . $parttime . '</font> 天前备份过mymps系统数据，上次备份：<font color=green>' . GetTime($latestbackup) . '</font>';
}

$message .= '，<a href="database.php?part=backup" style="text-decoration:underline">点此备份系统数据</a>';
$dsxx = mymps_count('information', 'WHERE info_level = \'0\'');
$dshy = mymps_count('member', 'WHERE status = \'0\'');
$welcome = array('常用操作' => "\r\n\t\t" . '<div>' . "\r\n\t\t" . '<span><input value="审核信息(' . $dsxx . ')" onclick="location.href=\'information.php?info_level=0\'" type="button" class="gray large"></span>' . "\r\n\t\t" . '<div><span><input value="审核会员(' . $dshy . ')" onclick="location.href=\'member.php?part=verify&do_action=default\'" type="button" class="gray large"></span>' . "\r\n\t\t" . '<span><input value="发布信息" onclick="window.open(\'../' . $mymps_global[cfg_postfile] . '\'); target=\'_blank\'" type="button" class="gray large"></span><span><input value="清除缓存" onclick="location.href=\'config.php?part=cache_sys&return_url=' . urlencode('index.php?do=manage&part=right') . '\'" type="button" class="gray large"></span><span><input value="系统优化" onclick="location.href=\'optimise.php\'" type="button" class="gray large"></span></div>' . "\r\n\t\t\t", '数据统计' => $mymps_count_str, '快捷操作' => "\r\n\t\t" . '<div class="mainnav">' . "\r\n\t\t" . '<ul>' . "\r\n\t\t" . '<li><a href="' . $mymps_global[SiteUrl] . '" target="_blank"><img border="0" src="template/images/default/home.gif" />网站首页</a></li>' . "\r\n\t\t" . '<li><a href="#" onclick="parent.framRight.location=\'member.php\'"><img border="0" src="template/images/default/user.png" alt="审核注册" />审核注册</a></li>' . "\r\n\t\t" . '<li><a href="#" onclick="parent.framRight.location=\'announce.php?part=add\'"><img border="0" src="template/images/default/tpc.png" alt="审核主题" />发布公告</a></li>' . "\r\n\t\t" . '<li><a href="#" onclick="parent.framRight.location=\'information.php\'"><img border="0" src="template/images/default/post.png"/>分类信息</a></li>' . "\r\n\t\t" . '<li><a href="#" onclick="parent.framRight.location=\'friendlink.php\'"><img border="0" src="template/images/default/share.png" />审核链接</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t\t\t", '安全建议' => "\r\n\t\t" . '<span>在线编辑模板功能</span> 当前：' . $cfg_if_tpledit . '。建议您只有在十分必要的时候才开启它。请修改 /data/config.inc.php 关闭此功能<br />' . "\r\n" . '<span>系统 install目录</span> 当前：' . $if_del_install . '。为防止站外人员利用，建议您安装完成后，删除该目录<br />' . "\r\n" . '<span>系统管理目录</span> 当前：' . $cur_dir . '。建议您安装完成后，修改目录名（可直接修改）。<br />' . "\r\n" . '<span>数据安全</span>' . $message, 
);

?>

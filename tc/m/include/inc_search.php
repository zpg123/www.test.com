<?php
CURSCRIPT != 'wap' && exit('FORBIDDEN');
$keywords = isset($_GET['keywords']) ? addslashes($_GET['keywords']) : '';
$keywords = checkhtml($keywords);
if(preg_match("/from|script|iframe|alert/i",$keywords)) $keywords = '';
if($keywords != '' && strlen($keywords) < 2) redirectmsg('您输入的关键字太短了！关键字不能少于2个字节！','index.php?mod=search');
$timestamp = time();

define(CURSCRIPT,'search');

$perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : '';
$page = empty($page) ? 1 : $page;
$where = " WHERE a.info_level > 0 ";
$where .= $cityid ? " AND cityid = '$cityid'" : "";
$cat_children =	$catid ? get_children($catid) : "";
$where .= $catid ? " AND ".$cat_children : "";
$where .= $keywords ? " AND (title LIKE '%".$keywords."%' OR content LIKE '%".$keywords."%') " : "";

$param		= setparams(array('mod','keywords'));
$rows_num = $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}information` AS a {$where}");
$totalpage = ceil($rows_num/$perpage);
$num = intval($page-1)*$perpage;
$info_list = $db -> getAll("SELECT a.* FROM `{$db_mymps}information` AS a {$where} ORDER BY a.id DESC LIMIT $num,$perpage");
$pageview = pager();
include mymps_tpl('search');

?>
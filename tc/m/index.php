<?php
//123456
define('WAP', true);
define('CURSCRIPT', 'wap');
define('IN_MYMPS', true);
define('IN_SMT', true);
require_once dirname(__FILE__) . '/../include/global.php';
require_once MYMPS_DATA . '/config.php';
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
$mobile_settings = get_mobile_settings();

if ($mobile_settings['allowmobile'] != 1) {
	errormsg('本站手机版暂停访问！');
}

if (pcclient()) {
	write_msg('', $mymps_global['SiteUrl']);
}

//bb('baidu.com');
!in_array($mod, array('category', 'index', 'items', 'information', 'login', 'register', 'post', 'search', 'member', 'history', 'news', 'goods', 'corp', 'store')) && ($mod = 'index');
$s_uid = $iflogin = NULL;
include MYMPS_INC . '/member.class.php';
$returnurl = urlencode(GetUrl());

if ($member_log->chk_in()) {
	$iflogin = 1;
}
else {
	$iflogin = 0;
}

include MYMPS_ROOT . '/m/include/inc_' . $mod . '.php';
is_object($db) && $db->Close();
$parent_cats = $loginfo = $newinfo = $mod = $ac = $mymps_global = $catid = $areaid = $db = $db_mymps = $mobile_settings = $member_log = NULL;
function bb($agree_domain)
{
	if (empty($HTTP_HOST)) {
		if (myget('HTTP_HOST')) {
			$HTTP_HOST = myget('HTTP_HOST');
		}
		else {
			$HTTP_HOST = '';
		}
	}

	$agree_domain = '.127.0.0.1|localhost|' . $agree_domain;
	$now_domain = getRd(htmlspecialchars($HTTP_HOST));
	$now_domain = str_replace('.www.', '', $now_domain);

	if (!in_array($now_domain, explode('|', $agree_domain))) {
		exit();
	}
}

function myget($var_name)
{
	if (isset($_SERVER[$var_name])) {
		return $_SERVER[$var_name];
	}

	if (isset($_ENV[$var_name])) {
		return $_ENV[$var_name];
	}

	if (getenv($var_name)) {
		return getenv($var_name);
	}

	if (function_exists('apache_getenv') && apache_getenv($var_name, true)) {
		return apache_getenv($var_name, true);
	}

	return '';
}

function getRd($domain)
{
	$suffix = array('wang', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'an', 'ao', 'aq', 'ar', 'as', 'at', 'au', 'aw', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn', 'bo', 'br', 'bs', 'bt', 'bv', 'bw', 'by', 'bz', 'ca', 'cc', 'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cq', 'cr', 'cu', 'cv', 'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'ec', 'ee', 'eg', 'eh', 'es', 'et', 'ev', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gr', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il', 'in', 'io', 'iq', 'ir', 'is', 'it', 'jm', 'jo', 'jp', 'ke', 'kg', 'kh', 'ki', 'km', 'kn', 'kp', 'kr', 'kw', 'ky', 'kz', 'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'mg', 'mh', 'ml', 'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mv', 'mw', 'mx', 'my', 'mz', 'na', 'nc', 'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nt', 'nu', 'nz', 'om', 'qa', 'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 'pr', 'pt', 'pw', 'py', 're', 'ro', 'ru', 'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si', 'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'st', 'su', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 'tj', 'tk', 'tm', 'tn', 'to', 'tp', 'tr', 'tt', 'tv', 'tw', 'tz', 'ua', 'ug', 'uk', 'us', 'uy', 'va', 'vc', 've', 'vg', 'vn', 'vu', 'wf', 'ws', 'ye', 'yu', 'za', 'zm', 'zr', 'zw', 'com', 'edu', 'gov', 'int', 'mil', 'net', 'org');
	$domainArr = explode('.', $domain);
	$l = count($domainArr);
	$key = 0;

	for ($i = 0; $i < $l; $i++) {
		if (in_array($domainArr[$i], $suffix)) {
			$key = $i;
			break;
		}
	}

	$inSuffixs = '';

	for ($i = $key; $i < $l; $i++) {
		$inSuffixs .= '.' . $domainArr[$i];
	}

	return $domainArr[$key - 1] . $inSuffixs;
}

function errormsg($error_msg)
{
	global $charset;
	global $mymps_global;
	global $cityid;
	redirectmsg($error_msg, 'javascript:history.back();');
}

function redirectmsg($redirectmsg, $url)
{
	global $charset;
	global $mymps_global;
	global $cityid;
	$url = ($url ? $url : 'javascript:history.back();');
	include mymps_tpl('notice_redirect');
	exit();
}

function setparams($param)
{
	foreach ($param as $k => $v ) {
		$$v = &$GLOBALS[$v];
		$params .= ($$v ? urlencode($v) . '=' . $$v . '&' : '');
	}

	return $params;
}

function pager()
{
	global $page;
	global $totalpage;
	global $rows_num;
	global $param;
	if (($totalpage == 1) && ($page == 1)) {
		$nav = $rows_num . '条记录';
	}
	else {
		if (($page - 1) < 1) {
			$nav .= '<a href="javascript:void();" class="pageprev pagedisable">上一页</a>';
			$nav .= '<a class="pageno pagecur">' . $page . '</a>';
			$nav .= '<a href="?' . $param . 'page=' . ($page + 1) . '" class="pageno">' . ($page + 1) . '</a>';

			if (($page + 1) < $totalpage) {
				$nav .= '<a href="?' . $param . 'page=' . ($page + 2) . '" class="pageno">' . ($page + 2) . '</a>';
			}
		}
		else {
			$nav .= '<a href="?' . $param . 'page=' . (($page - 1) < 1 ? 1 : $page - 1) . '" class="pageprev">上一页</a>';
			if (($totalpage == 3) && ($page == 3)) {
				$nav .= '<a href="?' . $param . 'page=' . ($page - 2) . '" class="pageno">' . ($page - 2) . '</a>';
			}

			$nav .= '<a href="?' . $param . 'page=' . ($page - 1) . '" class="pageno">' . (($page - 1) < 1 ? 1 : $page - 1) . '</a>';
			$nav .= '<a class="pageno pagecur">' . $page . '</a>';

			if ($page < $totalpage) {
				$nav .= '<a href="?' . $param . 'page=' . ($page + 1) . '" class="pageno">' . ($page + 1) . '</a>';
			}
		}

		if ($page < $totalpage) {
			$nav .= '<a href="?' . $param . 'page=' . ($page + 1) . '" class="pagenext">下一页</a>';
		}
		else {
			$nav .= '<a href="javascript:void();" class="pagenext pagedisable">下一页</a>';
		}
	}

	return $nav;
}

function get_mobile_nav($typeid = 1)
{
	static $res;
	$data = read_static_cache('mobile_nav');

	if ($data === false) {
		$query = $GLOBALS['db']->query('SELECT * FROM `' . $GLOBALS['db_mymps'] . 'mobile_nav` WHERE isview = 2 ORDER BY displayorder ASC');

		while ($row = $GLOBALS['db']->fetchRow($query)) {
			$res[$row['typeid']][$row['id']]['title'] = $row['title'];
			$res[$row['typeid']][$row['id']]['url'] = $row['url'];
			$res[$row['typeid']][$row['id']]['color'] = $row['color'];
			$res[$row['typeid']][$row['id']]['flag'] = $row['flag'];
			$res[$row['typeid']][$row['id']]['ico'] = $row['ico'];
			$res[$row['typeid']][$row['id']]['target'] = (in_array($row['target'], array('_selef', '_blank')) ? $row['target'] : '_self');
		}

		write_static_cache('mobile_nav', $res);
	}
	else {
		$res = $data;
	}

	return $res[$typeid];
}

function get_mobile_gg($typeid = 1)
{
	static $res;
	$data = read_static_cache('mobile_gg');

	if ($data === false) {
		$query = $GLOBALS['db']->query('SELECT * FROM `' . $GLOBALS['db_mymps'] . 'mobile_gg` ORDER BY displayorder ASC');

		while ($row = $GLOBALS['db']->fetchRow($query)) {
			$res[$row['typeid']][$row['id']]['words'] = $row['words'];
			$res[$row['typeid']][$row['id']]['url'] = $row['url'];
			$res[$row['typeid']][$row['id']]['image'] = $row['image'];
		}

		write_static_cache('mobile_gg', $res);
	}
	else {
		$res = $data;
	}

	return $res[$typeid];
}


?>

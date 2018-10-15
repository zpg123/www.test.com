<?php

function updatecaches()
{
	@set_time_limit(0);
	global $db;
	global $db_mymps;
	global $mymps_global;
	clear_cache_files();
	write_admin_cache();
	updateadvertisement();
	write_cron_cache();
	write_checkanswer_cache();
	update_checkanswer_settings();
	update_jswizard_settings();
	write_jswizard_cache();
	write_authcode_cache();
	write_plugin_cache();
	write_insidelink_cache();
	write_qqlogin_cache();
	write_wxlogin_cache();
	write_cats_js();
}

function write_cats_js()
{
	global $db;
	global $db_mymps;
	global $mymps_global;

	if (is_array($global_cat = get_categories_tree(0, 'category'))) {
		foreach ($global_cat as $k => $mymps ) {
			$mayicms .= '<li><em><a href="' . $mymps[uri] . '" style="color:' . $mymps[color] . '">' . $mymps[catname] . '</a></em><dl><dt><b></b></dt><dd>';

			if (is_array($mymps)) {
				foreach ($mymps[children] as $w ) {
					$mayicms .= '<a href="' . $w[uri] . '" style="color:' . $w[color] . '" title="' . $w[catname] . '">' . $w[catname] . '</a>';
				}
			}

			$mayicms .= '</dd></dl></li>';
		}

		$mayicms = html2js($mayicms);

		if (!createfile(MYMPS_DATA . '/caches/cats_js.php', $mayicms)) {
			write_msg(MYMPS_DATA . '/caches/cats_js.php 文件不可写，请检查相应权限');
		}
	}
}

function write_plugin_cache()
{
	global $db;
	global $db_mymps;
	global $charset;
	clear_cache_files('plugin');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'plugin`');

	while ($row = $db->fetchRow($query)) {
		$res[$row['flag']]['id'] = $row['id'];
		$res[$row['flag']]['flag'] = $row['flag'];
		$res[$row['flag']]['iscore'] = $row['iscore'];
		$res[$row['flag']]['name'] = $row['name'];
		$res[$row['flag']]['directory'] = $row['directory'];
		$res[$row['flag']]['disable'] = $row['disable'];
		$config = ($charset == 'utf-8' ? utf8_unserialize($row['config']) : unserialize($row['config']));
		$res[$row['flag']]['ifrewrite'] = $config['ifrewrite'];
		$res[$row['flag']]['seotitle'] = $config['seotitle'];
		$res[$row['flag']]['seokeywords'] = $config['seokeywords'];
		$res[$row['flag']]['seodescription'] = $config['seodescription'];
		$res[$row['flag']]['adminmenu'] = $config['adminmenu'];
		$res[$row['flag']]['membermenu'] = $config['membermenu'];

		if ($row['flag'] == 'goods') {
			$res[$row['flag']]['quhuo'] = $config['quhuo'];
			$res[$row['flag']]['fukuan'] = $config['fukuan'];
			$res[$row['flag']]['service'] = $config['service'];
		}

		$res[$row['flag']]['version'] = $row['version'];
		$res[$row['flag']]['releasetime'] = $row['releasetime'];
		$res[$row['flag']]['author'] = $row['author'];
		$res[$row['flag']]['introduce'] = $row['introduce'];
		$res[$row['flag']]['siteurl'] = $row['siteurl'];
		$res[$row['flag']]['email'] = $row['email'];
		$res[$row['flag']]['copyright'] = $row['copyright'];
	}

	write_static_cache('plugin', $res);
	clear_cache_files('pluginmenu_admin');
	clear_cache_files('pluginmenu_member');
	@include MYMPS_DATA . '/caches/plugin.php';

	if (is_array($data)) {
		foreach ($data as $key => $val ) {
			if ($val['disable'] != 1) {
				$adminmenu[$val['name']] = arraychange($val['adminmenu']);
				$membermenu[$val['flag']] = $val['name'];
				write_static_cache('pluginmenu_admin', $adminmenu);
				write_static_cache('pluginmenu_member', $membermenu);
			}
		}
	}
}

function get_mobile_settings()
{
	global $db;
	global $db_mymps;
	$data = read_static_cache('mobile');

	if ($data === false) {
		clear_cache_files('mobile');
		$res = $db->getOne('SELECT value FROM `' . $db_mymps . 'config` WHERE type=\'mobile\' AND description = \'mobile\'');
		$res = ($res ? ($charset == 'utf-8' ? utf8_unserialize($res) : unserialize($res)) : array());
		write_static_cache('mobile', $res);
	}
	else {
		$res = $data;
	}

	return $res;
}

function get_commentsettings()
{
	global $db;
	global $db_mymps;
	$data = read_static_cache('commentsettings');

	if ($data === false) {
		clear_cache_files('commentsettings');
		$res = $db->getOne('SELECT value FROM `' . $db_mymps . 'config` WHERE type=\'comment\' AND description = \'comment\'');
		$res = ($res ? ($charset == 'utf-8' ? utf8_unserialize($res) : unserialize($res)) : array());
		write_static_cache('commentsettings', $res);
	}
	else {
		$res = $data;
	}

	return $res;
}

function get_info_counts()
{
	global $db;
	global $db_mymps;
	$sql = 'SELECT catid,count(*) AS num FROM ' . $db_mymps . 'information group by catid';
	$counts = $db->getAll($sql);
	$res = array();

	foreach ($counts as $k => $v ) {
		$res[$v['catid']] = $v['num'];
	}

	return $res;
}

function write_insidelink_cache()
{
	global $db;
	global $db_mymps;
	global $charset;
	clear_cache_files('insidelink');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'insidelink`');

	while ($row = $db->fetchRow($query)) {
		$res['detail'][$row['word']] = $row['url'];
	}

	$settings = $db->getOne('SELECT value FROM `' . $db_mymps . 'config` WHERE type = \'insidelink\' AND description = \'insidelink\'');
	$res['settings'] = ($charset == 'gbk' ? unserialize($settings) : utf8_unserialize($settings));
	write_static_cache('insidelink', $res);
}

function updateadvertisement()
{
	global $timestamp;
	$query = $GLOBALS['db']->query('SELECT * FROM `' . $GLOBALS['db_mymps'] . 'advertisement` WHERE available>\'0\' AND starttime<=\'' . $timestamp . '\' AND type != \'normalad\' ORDER BY displayorder ASC');

	if ($GLOBALS['db']->num_rows($query)) {
		while ($adv = $GLOBALS['db']->fetchRow($query)) {
			foreach (explode("\t", $adv['targets']) as $target ) {
				if (($adv['type'] == 'indexcatad') && is_numeric($target)) {
					$advs['index']['type'][$adv['type']][$target][] = $adv['advid'];
					$advs['index']['items'][$adv['advid']] = $adv['code'];
				}
				else if ($target == 'index') {
					$advs['index']['type'][$adv['type']][] = $adv['advid'];
					$advs['index']['items'][$adv['advid']] = $adv['code'];
				}
				else if ($target == 'all') {
					$position = ($charset == 'gbk' ? unserialize($adv['parameters']) : utf8_unserialize($adv['parameters']));

					foreach (array('category', 'info', 'index', 'other') as $range ) {
						if ($position['position']) {
							$advs[$range][$target]['type'][$adv['type']][$position['position']][] = $adv['advid'];
						}
						else {
							$advs[$range][$target]['type'][$adv['type']][] = $adv['advid'];
						}

						$advs[$range]['items'][$adv['advid']] = $adv['code'];
					}
				}
				else if (is_numeric($target)) {
					$position = ($charset == 'gbk' ? unserialize($adv['parameters']) : utf8_unserialize($adv['parameters']));

					foreach (array('category', 'info') as $range ) {
						if ($position['position']) {
							$advs[$range][$target]['type'][$adv['type']][$position['position']][] = $adv['advid'];
						}
						else {
							$advs[$range][$target]['type'][$adv['type']][] = $adv['advid'];
						}

						$advs[$range]['items'][$adv['advid']] = $adv['code'];
					}
				}
			}
		}

		foreach (array('index', 'category', 'info', 'other') as $range ) {
			write_static_cache('adv_' . $range, $advs[$range]);
		}
	}
}

function write_cron_cache()
{
	global $db;
	global $db_mymps;
	global $timestamp;
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'crons` WHERE 1 OR nextrun = \'0\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['name']]['lastrun'] = $row['lastrun'];
		$res[$row['name']]['nextrun'] = $row['nextrun'];
		$res[$row['name']]['day'] = $row['day'];
	}

	$content = '<?php' . "\r\n";
	$content .= '$m_cron = ' . var_export($res, true) . ';' . "\r\n";
	$content .= '?>';

	if (!createfile(MYMPS_DATA . '/cron.cache.php', $content)) {
		write_msg(MYMPS_DATA . '/cron.cache.php 文件不可写，请检查相应权限');
	}
}

function write_qqlogin_cache()
{
	global $db;
	global $db_mymps;
	global $timestamp;
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'qqlogin\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	$res['scope'] = 'get_user_info';
	write_static_cache('qqlogin', $res);
}

function write_wxlogin_cache()
{
	global $db;
	global $db_mymps;
	global $timestamp;
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'wxlogin\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	$res['scope'] = 'get_user_info';
	write_static_cache('wxlogin', $res);
}

function write_authcode_cache()
{
	global $db;
	global $db_mymps;
	clear_cache_files('authcodesettings');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'authcode\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	write_static_cache('authcodesettings', $res);
}

function write_checkanswer_cache()
{
	$query = $GLOBALS['db']->query('SELECT * FROM `' . $GLOBALS['db_mymps'] . 'checkanswer` ORDER BY id DESC');

	while ($row = $GLOBALS['db']->fetchRow($query)) {
		$res[$row['id']]['id'] = $row['id'];
		$res[$row['id']]['question'] = $row['question'];
		$res[$row['id']]['answer'] = $row['answer'];
	}

	write_static_cache('checkanswer', $res);
}

function update_checkanswer_settings()
{
	global $db;
	global $db_mymps;
	clear_cache_files('checkanswer_settings');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'checkanswe\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	write_static_cache('checkanswer_settings', $res);
}

function update_config_cache()
{
	$query = $GLOBALS['db']->query('SELECT description,value FROM `' . $GLOBALS['db_mymps'] . 'config` WHERE type = \'config\'');

	while ($row = $GLOBALS['db']->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	$content = '<?php' . "\r\n";
	$content .= '$mymps_global = ' . var_export($res, true) . ';' . "\r\n";
	$content .= '?>';

	if (!createfile(MYMPS_DATA . '/config.php', $content)) {
		write_msg(MYMPS_DATA . '/config.php 文件不可写，请检查相应权限！');
	}
}

function write_htmlstyle_cache($style = 'news')
{
	global $db;
	global $db_mymps;
	$row = $db->getRow('SELECT value FROM `' . $db_mymps . 'config` WHERE description = \'glb_html_' . $style . '\'');
	$mymps .= '<?php' . "\n";
	$mymps .= '$htmlstyle[' . $style . '] = \'' . $row['value'] . '\';' . "\n";
	$mymps .= '?>';
	!createfile(MYMPS_DATA . '/html_style.inc.php', $mymps) && write_msg(MYMPS_DATA . '/html_style.inc.php 文件不可写，请检查相应权限');
}

function clear_tpl_files($is_cache = 1, $ext = '')
{
	$dirs = array();

	if ($is_cache == 1) {
		$dirs[] = MYMPS_DATA . '/caches/';
	}
	else if ($is_cache == 2) {
		$dirs[] = MYMPS_DATA . '/pagesinfo/';
	}
	else if ($is_cache == 3) {
		$dirs[] = MYMPS_DATA . '/templates/';
	}
	else if ($is_cache == 4) {
		$dirs[] = MYMPS_DATA . '/pageslist/';
	}
	else if ($is_cache == 5) {
		$dirs[] = MYMPS_DATA . '/pagesmymps/';
	}

	$str_len = strlen($ext);
	$count = 0;

	foreach ($dirs as $dir ) {
		$folder = @opendir($dir);

		if ($folder === false) {
			continue;
		}

		while ($file = readdir($folder)) {
			if (($file == '.') || ($file == '..') || ($file == 'index.htm') || ($file == 'index.html')) {
				continue;
			}

			if (is_file($dir . $file)) {
				$pos = strrpos($file, '.');
				if ((0 < $str_len) && ($pos !== false)) {
					$ext_str = substr($file, 0, $pos);

					if ($ext_str == $ext) {
						if (@unlink($dir . $file)) {
							$count++;
						}
					}
				}
				else if (@unlink($dir . $file)) {
					$count++;
				}
			}
		}

		closedir($folder);
	}

	return $count;
}

function clear_smt_cache_files($ext = '')
{
	return clear_tpl_files(2, $ext);
}

function clear_compiled_files($ext = '')
{
	return clear_tpl_files(3, $ext);
}

function clear_cache_files($ext = '')
{
	return clear_tpl_files(1, $ext);
}

function clear_all_files($ext = '')
{
	return clear_tpl_files(1, $ext) + clear_tpl_files(2, $ext) + clear_tpl_files(3, $ext);
}

function clear_smarty_files()
{
	clear_tpl_files(2, $ext) + clear_tpl_files(3, $ext);
}

function read_static_cache($cache_name)
{
	if ((DEBUG_MODE & 2) == 2) {
		return false;
	}

	static $result = array();

	if (!empty($result[$cache_name])) {
		return $result[$cache_name];
	}

	$cache_file_path = MYMPS_DATA . '/caches/' . $cache_name . '.php';

	if (file_exists($cache_file_path)) {
		include_once $cache_file_path;
		$result[$cache_name] = $data;
		return $result[$cache_name];
	}
	else {
		return false;
	}
}

function write_static_cache($cache_name, $caches)
{
	if ((DEBUG_MODE & 2) == 2) {
		return false;
	}

	$cache_file_path = MYMPS_DATA . '/caches/' . $cache_name . '.php';
	$content = '<?php' . "\r\n";
	$content .= '$data = ' . var_export($caches, true) . ';' . "\r\n";
	$content .= '?>';
	file_put_contents($cache_file_path, $content, LOCK_EX);
}

function get_cache_config()
{
	$data = read_static_cache('cache');

	if ($data === false) {
		$query = $GLOBALS['db']->query('SELECT * FROM `' . $GLOBALS['db_mymps'] . 'cache`');

		while ($row = $GLOBALS['db']->fetchRow($query)) {
			$cache[$row['page']]['time'] = $row['time'];
			$cache[$row['page']]['open'] = $row['open'];
		}

		write_static_cache('cache', $cache);
	}
	else {
		$cache = $data;
	}

	return $cache;
}

function update_jswizard_settings()
{
	global $db;
	global $db_mymps;
	clear_cache_files('jswizard_settings');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'jswizard\'');

	while ($row = $db->fetchRow($query)) {
		$res[$row['description']] = $row['value'];
	}

	write_static_cache('jswizard_settings', $res);
}

function write_jswizard_cache()
{
	global $db;
	global $db_mymps;
	global $charset;
	clear_cache_files('jswizard_lists');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'jswizard`');

	while ($row = $db->fetchRow($query)) {
		$res[$row['flag']]['id'] = $row['id'];
		$res[$row['flag']]['flag'] = $row['flag'];
		$res[$row['flag']]['customtype'] = $row['customtype'];
		$res[$row['flag']]['parameter'] = ($charset == 'utf-8' ? utf8_unserialize($row['parameter']) : unserialize($row['parameter']));
	}

	write_static_cache('jswizard_lists', $res);
}

function write_admin_cache()
{
	clear_cache_files('admin');
	$query = $GLOBALS['db']->query('SELECT a.*,b.purviews,b.typename,b.ifsystem FROM `' . $GLOBALS['db_mymps'] . 'admin` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . 'admin_type` AS b ON a.typeid = b.id');

	while ($row = $GLOBALS['db']->fetchRow($query)) {
		$res[$row['userid']]['typename'] = $row['typename'];
		$res[$row['userid']]['ifsystem'] = $row['ifsystem'];
		$res[$row['userid']]['purviews'] = $row['purviews'];
	}

	$row = $query = NULL;
	write_static_cache('admin', $res);
	return $res;
}

function get_credit_score()
{
	global $db;
	global $db_mymps;
	global $charset;
	$data = read_static_cache('credit_score');

	if ($data === false) {
		$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'credit_sco\'');

		while ($row = $db->fetchRow($query)) {
			$res[$row['description']] = ($charset == 'utf-8' ? utf8_unserialize($row['value']) : unserialize($row['value']));
		}

		write_static_cache('credit_score', $res);
	}
	else {
		$res = $data;
	}

	return $res;
}

function get_tpl_index()
{
	global $db;
	global $db_mymps;
	global $charset;
	$data = read_static_cache('tpl_index');

	if ($data === false) {
		clear_cache_files('tpl_index');
		$query = $db->query('SELECT * FROM `' . $db_mymps . 'config` WHERE type = \'tpl\'');

		while ($row = $db->fetchRow($query)) {
			$res[$row['description']] = ($charset == 'utf-8' ? utf8_unserialize($row['value']) : unserialize($row['value']));
		}

		write_static_cache('tpl_index', $res);
	}
	else {
		$res = $data;
	}

	return $res;
}

function get_category_dir()
{
	$data = read_static_cache('category_dir');

	if ($data === false) {
		$query = $GLOBALS['db']->query('SELECT catid,dir_typename FROM `' . $GLOBALS['db_mymps'] . 'category`');

		while ($row = $GLOBALS['db']->fetchRow($query)) {
			$cache[$row['catid']] = $row['dir_typename'];
		}

		write_static_cache('category_dir', $cache);
	}
	else {
		$cache = $data;
	}

	return $cache;
}


?>

<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
$member_log = new mymps_member_log($cookiepre);
class mymps_member_log
{
	public $cookiepre;

	public function __construct($cookiepre)
	{
		$this->cookiepre = $cookiepre;
	}

	public function mymps_member_log($cookiepre)
	{
		$this->__construct($cookiepre);
	}

	public function PutLogin($s_uid = '', $s_pwd = '', $memory = '')
	{
		global $cookiepre;
		global $cookiedomain;
		global $cookiepath;
		global $timestamp;
		$timestamp = ($timestamp ? $timestamp : time());

		if ($memory == 'on') {
			msetcookie('s_uid', $s_uid, 3600 * 24 * 30);
			msetcookie('s_pwd', mmd5($s_pwd, 'EN'), 3600 * 24 * 30);
		}
		else {
			msetcookie('s_uid', $s_uid, 0);
			msetcookie('s_pwd', mmd5($s_pwd, 'EN'));
		}
	}

	public function in($s_uid = '', $s_pwd = '', $memory = '', $url = '', $type = '')
	{
		global $mymps_global;
		global $uid;
		global $db_mymps;
		global $db;
		global $timestamp;
		global $do;
		global $mymps_mymps;
		if ($s_uid && $s_pwd) {
			$this->PutLogin($s_uid, $s_pwd, $memory);
			if (($do != 'power') && !defined('WAP')) {
				$timestamp = ($timestamp ? $timestamp : time());
				$loginip = GetIP();

				if ($mymps_mymps['cfg_iflogin_port'] == 1) {
					if ($loginip) {
						require_once 'ip.class.php';
						$ipdata = new ip();
						$a = $ipdata->getaddress($loginip);
						$ip2area = $a['area1'] . $a['area2'];
					}
					else {
						$ip2area = '';
					}

					$browser = getbrowser();
					$os = getos();
					$port = getport();
				}
				else {
					$ip2area = $browser = $os = $port = '';
				}

				$db->query('DELETE FROM `' . $db_mymps . 'member_record_login` WHERE userid = \'' . $s_uid . '\'');
				$db->query('INSERT INTO `' . $db_mymps . 'member_record_login` (id,userid,userpwd,pubdate,ip,ip2area,browser,os,port,result) VALUES (\'\',\'' . $s_uid . '\',\'' . $userpwd . '\',\'' . $timestamp . '\',\'' . $loginip . '\',\'' . $ip2area . '\',\'' . $browser . '\',\'' . $os . '\',\'' . $port . '\',\'1\')');
				$db->query('UPDATE `' . $db_mymps . 'member` SET logintime = \'' . $timestamp . '\' WHERE userid = \'' . $s_uid . '\'');
			}

			if ($url != 'noredirect') {
				if (empty($url) && empty($type)) {
					echo mymps_goto($mymps_global['SiteUrl'] . '/member/index.php');
				}
				else {
					if (!empty($url) && empty($type)) {
						$url = urldecode($url);
						echo mymps_goto($url);
					}
				}
			}
		}
	}

	public function out($url = '')
	{
		global $mymps_global;
		global $db;
		global $db_mymps;
		global $timestamp;
		global $s_uid;
		$s_uid = mgetcookie('s_uid');
		$s_uid = (isset($s_uid) ? addslashes($s_uid) : '');
		$timestamp = ($timestamp ? $timestamp : time());
		if ($s_uid && !defined('WAP')) {
			$db->query('UPDATE `' . $db_mymps . 'member_record_login` SET outdate = \'' . $timestamp . '\' WHERE userid = \'' . $s_uid . '\'');
		}

		msetcookie('s_uid', '');
		msetcookie('s_pwd', '');

		if ($url == 'noredirect') {
		}
		else if (empty($url)) {
			echo mymps_goto('../index.php');
		}
		else {
			$url = urldecode($url);
			echo mymps_goto($url);
		}
	}

	public function chk_in()
	{
		global $db;
		global $db_mymps;
		global $s_uid;
		global $cookie;
		$s_uid = mgetcookie('s_uid');
		$s_pwd = mgetcookie('s_pwd');

		if (empty($s_uid)) {
			msetcookie('s_uid', '');
			msetcookie('s_pwd', '');
			return false;
		}
		else {
			$m = $db->getRow('SELECT userpwd,openid FROM `' . $db_mymps . 'member` WHERE userid = \'' . $s_uid . '\'');
			if ($m['openid'] && !$m['userpwd']) {
				return true;
			}
			else {
				return mmd5($m['userpwd'], 'EN', '', $this->cookiepre) == $s_pwd ? true : false;
			}
		}
	}

	public function get_info()
	{
		global $s_uid;
		global $db;
		global $db_mymps;
		$s_uid = mgetcookie('s_uid');
		return $db->getRow('SELECT * FROM ' . $db_mymps . 'member WHERE userid = \'' . $s_uid . '\'');
	}
}


?>

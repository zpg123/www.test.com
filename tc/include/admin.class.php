<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
$db_mixcode = ($db_mixcode ? $db_mixcode : '');
$mymps_admin = new mymps_admin_log($db_mixcode);
class mymps_admin_log
{
	public $db_mixcode;

	public function __construct($db_mixcode)
	{
		$this->db_mixcode = $db_mixcode;
	}

	public function mymps_member_log($db_mixcode)
	{
		$this->__construct($db_mixcode);
	}

	public function PutLogin($admin_id, $admin_name)
	{
		session_start();
		$_SESSION['admin_id'] = $admin_id;
		$_SESSION['admin_name'] = $admin_name;
	}

	public function mymps_admin_login($admin_id, $admin_name)
	{
		global $admin_id;
		global $admin_name;
		if (!empty($admin_id) && !empty($admin_name)) {
			$this->PutLogin($admin_id, $admin_name);
		}
	}

	public function mymps_admin_logout()
	{
		session_start();
		session_unset();
	}

	public function mymps_admin_chk_getinfo()
	{
		session_start();
		global $admin_id;
		global $admin_name;
		global $url;
		if (empty($_SESSION['admin_name']) || empty($_SESSION['admin_id'])) {
			$this->mymps_admin_logout();
			return false;
		}
		else {
			$admin_id = $_SESSION['admin_id'];
			$admin_name = $_SESSION['admin_name'];
			return true;
		}
	}
}


?>

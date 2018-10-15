<?php
CURSCRIPT != 'wap' && exit('FORBIDDEN');

$returnurl = isset($_REQUEST['returnurl']) ? urldecode($_REQUEST['returnurl']) : '';
$authcodesettings = read_static_cache('authcodesettings');

if($action == 'logout'){

	if(PASSPORT_TYPE == 'ucenter'){
		//整合UC
		require MYMPS_ROOT.'/uc_client/client.php';
		$ucsynlogout = uc_user_synlogout();
		echo $ucsynlogout;
	}
	$member_log->out('noredirect');
	echo mymps_goto($url ? $url : $mymps_global['SiteUrl'].'/m/index.php?mod=member');
	
} elseif($action == 'login') {
	
	$userid = isset($userid) ? trim($userid) : '';
	$userpwd = isset($userpwd) ? trim($userpwd) : '';
	$checkcode = isset($checkcode) ? trim($checkcode) : '';

	if($authcodesettings['login'] == 1 && !$randcode = mymps_chk_randcode($checkcode)){
		redirectmsg('验证码输入错误，请重新输入','index.php?mod=login');
	}
	if($userid == '' || $userpwd == '') redirectmsg('用户帐号或密码不能为空','index.php?mod=login');
	
	$userid = $db->getOne("SELECT userid FROM `{$db_mymps}member` WHERE userid='$userid' OR mobile='$userid' OR email='$userid'");
	$row  = $db -> getRow("SELECT * FROM `{$db_mymps}member` WHERE userid='$userid' AND userpwd='".md5($userpwd)."'");
	$s_uid=$row['userid'];
	
	if(PASSPORT_TYPE == 'ucenter') {
		//UC整合
		require_once MYMPS_ROOT.'/member/include/common.func.php';
		require MYMPS_ROOT.'/uc_client/client.php';
		
		list($uid, $username, $password, $email) = uc_user_login($userid, $userpwd,$email);
		
		if($uid > 0) {
		
			if(!$db->getOne("SELECT count(*) FROM {$db_mymps}member WHERE userid='$userid'")) {
				member_reg($userid,md5($userpwd));
			}else{
				$db->query("UPDATE `{$db_mymps}member` SET userpwd = '".md5($userpwd)."' WHERE userid = '$userid'");
			}
			
			$s_uid = $userid;
			
		} else {
			
			if($uid == -1) {
				errormsg( '用户不存在,或者被删除');
			} elseif ($uid == -2) {
				errormsg( '密码输入错误');
			} else {
				errormsg( '未定义操作');
			}
			
			exit;
		}
	}

	if($s_uid){
		if(empty($row['status'])){
			redirectmsg('您的账号 [<b>'.$s_uid.'</b>] 正在审核中，审核通过后可正常登录！',$returnurl ? $returnurl : urlencode('index.php?mod=login&cityid='.$cityid));
			exit;
		} else {
			$db -> query("UPDATE `{$db_mymps}member` SET logintime='$timestamp'  WHERE userid = '$userid' ");
			$member_log -> in($s_uid,md5($userpwd),'on','noredirect');
		}
		
		if(PASSPORT_TYPE == 'phpwind' && $user_login['synlogin']){
			echo $user_login['synlogin'];
		} elseif(PASSPORT_TYPE == 'ucenter'){
			echo uc_user_synlogin($uid);
		}
		redirectmsg($s_uid.'， 欢迎回来!',$returnurl ? $returnurl : urlencode('index.php?mod=member&cityid='.$cityid));
	}else{
		redirectmsg('登录失败，您输入了错误的帐号或密码!',$returnurl ? $returnurl : urlencode('index.php?mod=login&cityid='.$cityid));
	}

} else{

	if($iflogin == 1){
		redirectmsg('您已登录',$returnurl ? $returnurl : 'index.php?mod=member');
	}else{
		$qqlogin = read_static_cache('qqlogin');
		$wxlogin = read_static_cache('wxlogin');
		include mymps_tpl('member_login');
	}
}

?>
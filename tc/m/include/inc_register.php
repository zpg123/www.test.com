<?php
CURSCRIPT != 'wap' && exit('FORBIDDEN');

$mobile_settings['register'] != 1 && redirectmsg('本站手机版已关闭注册功能！如需注册，请打开 '.$mymps_global[SiteUrl].' 网页后再进行注册！','javascript:history.back();');
$authcodesettings = read_static_cache('authcodesettings');
if($action == 'register'){

	include MYMPS_ROOT.'/member/include/common.func.php';
	
	if(!$mixcode || $mixcode != md5($cookiepre)){
		redirectmsg('系统判断您的来路不正确！','javascript:history.back();');
	}

	if($authcodesettings['register'] == 1 && !mymps_chk_randcode($checkcode)){
		redirectmsg('验证码输入错误，请返回重新输入','javascript:history.back();');
	}
	
	if($mymps_global['cfg_member_verify'] == 4){
		if(!$mobile) write_msg('请输入您的手机号码!');
		if(!is_mobile($mobile)) write_msg('手机号格式不正确!');
		if($db->getOne("SELECT COUNT(id) FROM `{$db_mymps}member` WHERE mobile = '$mobile'") > 0) redirectmsg('该手机号已被注册请换一个手机号！','javascript:history.back();');
//		if(!mymps_chk_smsrandcode($smscheckcode,$mobile)) redirectmsg('手机验证码输入不正确或与手机号不匹配！','javascript:history.back();');
		$userid = 'sj_'.$timestamp.rand(0,100);
	}else{
		strlen($userid) > 20 && redirectmsg('您的用户名多于20个字符，不允许注册!','javascript:history.back();');
		$rs	= CheckUserID($userid,'用户名');
		$rs != 'ok' && redirectmsg($rs,'index.php?mod=register');
		!is_email($email) && redirectmsg('Email格式不正确！','javascript:history.back();');
	}
	
	if($userpwd != $reuserpwd) redirectmsg('您两次输入的密码不相同，请返回重新输入','javascript:history.back();');
	(strlen($userid) < 3 || strlen($userpwd) < 5) && redirectmsg('你的用户名或密码过短(不能少于3个字符)，不允许注册!','javascript:history.back();');
	$db->getOne("SELECT id FROM `{$db_mymps}member` WHERE userid = '$userid' ") && redirectmsg('你指定的用户名 '.$userid.' 已存在，请使用别的用户名!','javascript:history.back();');
	
	if(PASSPORT_TYPE == 'ucenter'){
		//uc整合
		require MYMPS_ROOT.'/uc_client/client.php';
		//在UCenter注册用户信息
		if($activation && ($activeuser = uc_get_user($activation))) {
			list($uid, $userid) = $activeuser;
		} else {
			$user = $db -> getRow("SELECT id,userid FROM `{$db_mymps}member` WHERE userid = '$userid'");
			if(uc_get_user($userid) && !$user['userid']) {
				//判断需要注册的用户如果是需要激活的用户，则需跳转到登录页面
				redirectmsg("该用户无需注册，请重新登录",$mymps_global[SiteUrl]."/m/index.php?m=login");
			}
			$uid = uc_user_register($userid,$userpwd, $email);
			if($uid <= 0) {
				if($uid == -1) {
					errormsg('用户名不合法');
				} elseif($uid == -2) {
					errormsg( '包含不允许注册的词语');
				} elseif($uid == -3) {
					errormsg( '用户名已经存在');
				} elseif($uid == -4) {
					errormsg( 'Email 格式有误');
				} elseif($uid == -5) {
					errormsg( 'Email 不允许注册');
				} elseif($uid == -6) {
					errormsg( '该 Email 已经被注册');
				} else {
					errormsg( '未定义');
				}
			} else {
				$userid  = trim($userid);
				$userpwd = trim($userpwd);
				$email 	 = trim($email);
			}
		}
	}
	
	$score_change = get_credit_score();
	$score_changer = $score_change['score']['rank']['register'];
	$score_changer = $score_changer === 0 ? ' +0' : $score_changer;
	$money_own	=	$db -> getOne("SELECT money_own FROM `{$db_mymps}member_level` WHERE id = '1'");
	$money_own	=	$money_own ? $money_own : 0;
	
	member_reg($userid,md5($userpwd),$email);
	$uid = $db->insert_id();
	
	if($reg_corp == 1){
		if(is_array($catid)){
			foreach($catid as $kids => $vids){
				$db->query("INSERT INTO `{$db_mymps}member_category` (userid,catid)VALUES('$userid','$vids')");
			}
			$catids  = implode(',',$catid);
		}
		$db->query("UPDATE `{$db_mymps}member` SET tname = '$tname' , cname = '$cname', catid = '$catids',areaid = '$areaid',qq = '$qq' , if_corp = '1' ,tel = '$tel' , mobile = '$mobile', money_own = '$money_own' ,introduce = '$introduce',address = '$address' ,score = score".$score_changer."  WHERE userid = '$userid'");
	} else {
		$db->query("UPDATE `{$db_mymps}member` SET mobile='$mobile',money_own = '$money_own',score = score".$score_changer." WHERE userid = '$userid'");
	}
	
	if($mymps_global['cfg_member_verify'] == 1 || $mymps_global['cfg_member_verify'] == 4){
		$member_log -> in($userid,md5($userpwd),'off','noredirect');
		if($reg_corp == 1){
			redirectmsg('请完善机构资料信息以完成注册！','index.php?mod=member&action=editbase&type=reg');
		}else{
			redirectmsg('恭喜! 您已经注册成功','index.php?mod=member');
		}
		
	}else{
		redirectmsg('您的账号正在审核中，请联系客服人员开通！','index.php?mod=index');
	}
} else {
	$mixcode = md5($cookiepre);
	include mymps_tpl('member_register');
}
?>
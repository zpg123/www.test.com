<?php
require_once MYMPS_ROOT.'/include/sms.fun.php';
if($action == 'sendmail'){
	
	$email = isset($email) ? mhtmlspecialchars($email): '';
	if($authcodesettings['forgetpass'] == 1 && !$randcode = mymps_chk_randcode($checkcode)){write_msg('验证码输入错误，请返回重新输入');}
	empty($email)  && write_msg("请填写电子邮箱地址！");
	//if(mgetcookie('emailsended'.$email) == 1){write_msg("休息一会再发送邮件");}
	$user_info = $db ->getRow("SELECT * FROM `{$db_mymps}member` WHERE email = '$email'");
	if ($user_info['userid']){
		require MYMPS_INC.'/email.fun.php';
		$code = base64_encode($user_info['id'].".".md5($user_info['id'].'+'.$user_info['userpwd']).'.'.$timestamp);
		
		globalassign();
		if (send_pwd_email($user_info['id'], $user_info['userid'], $email, $code)){
			//msetcookie("emailsended".$userinfo['email'],1);
			include mymps_tpl($mod.'_2');
		}else{
			$status = 'error2';
			$msg = '发送邮件失败，请联系客服：'.$mymps_global["SiteTel"].'重设密码！';
			include mymps_tpl($mod.'_4');
		}
	
	}else{
	
		$status = 'error2';
		$msg = '该电子邮箱或用户名不存在！请联系客服：'.$mymps_global["SiteTel"].'！';
		globalassign();
		include mymps_tpl($mod.'_4');
	
	}
	
}elseif($action == 'sendsms'){
	
	$mobile = isset($mobile) ? mhtmlspecialchars($mobile) : '';
	if($authcodesettings['forgetpass'] == 1 && !$randcode = mymps_chk_randcode($checkcode)) write_msg('验证码输入错误，请返回重新输入');
	empty($mobile)  && write_msg("请填写您的手机号码！");
	$user_info = $db ->getRow("SELECT * FROM `{$db_mymps}member` WHERE mobile = '$mobile'");
	if ($user_info['userid']){
		
		//发送手机验证码
		$smsconfig = get_sms_config();//获得sms配置 dxton ihuyi
		$smsconfig['sms_service'] && include MYMPS_ROOT.'/include/'.$smsconfig['sms_service'].'/mymps.php';
		
		if(!send_pwdsms($smsconfig['sms_user'],$smsconfig['sms_pwd'],$mobile,$smsconfig['sms_pwdtpl'])){
			//发送失败
			$status = 'error2';
			$msg = '验证码发送失败！请联系客服：'.$mymps_global["SiteTel"].'！';
			globalassign();
			include mymps_tpl($mod.'_4');
		}else{
			$uid = $user_info['id'];
			$userid = $user_info['userid'];
			include mymps_tpl($mod.'_2');
		}
	}else{
	
		$status = 'error2';
		$msg = '该手机号尚未注册用户！请联系客服：'.$mymps_global["SiteTel"].'！';
		globalassign();
		include mymps_tpl($mod.'_4');
	
	}
	
}elseif($action == 'resetpage'){

	globalassign();
	include mymps_tpl($mod.'_3');

}elseif($action == 'resetpwd'){
	$uid = $uid ? intval($uid) : '';
	$userid = $userid ? mhtmlspecialchars($userid) : '';
	$userpwd = $userpwd ? mhtmlspecialchars($userpwd) : '';
	$email = $email ? mhtmlspecialchars($email) : '';
	$mobile = $mobile ? mhtmlspecialchars($mobile) : '';
	$smscheckcode = $smscheckcode ? intval($smscheckcode) : '';
	if($mymps_global['cfg_member_verify'] == 4){
//		if(!mymps_chk_smsrandcode($smscheckcode,$mobile)) write_msg('密码修改失败，手机验证码输入不正确或与手机号不匹配！','?mod=forgetpass');
	}
	if(empty($userpwd)) write_msg('请输入你的新密码！');
	if(PASSPORT_TYPE == 'phpwind'){
		//pw整合
		require MYMPS_ROOT.'/pw_client/uc_client.php';
		$pw_user = uc_user_get($userid);
		$result = uc_user_edit($pw_user['uid'], $pw_user['username'], '', md5($userpwd), '');
	} elseif(PASSPORT_TYPE == 'ucenter') {
		//UC整合
		require MYMPS_ROOT.'/uc_client/client.php';
		$result =  uc_user_edit($userid, $userpwd, $userpwd, $email, 1);
	}
	
	if (!empty($userpwd)){
		$db->query("UPDATE `{$db_mymps}member` SET userpwd='".md5($userpwd)."' WHERE id = '$uid'");
		$status = 'success';
	} else {
		$status = 'error';
		$msg = '未定义错误，密码修改失败！';
	}
	
	globalassign();
	include mymps_tpl($mod.'_4');
}
?>
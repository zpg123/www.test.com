<?php
function write_money_use($info='',$cost=''){
	global $db,$db_mymps,$s_uid,$timestamp;
	$timestamp = $timestamp ? $timestamp : time();
	if($db -> query("INSERT INTO `{$db_mymps}member_record_use` (userid,paycost,subject,pubtime) VALUES ('$s_uid','$cost','$info','$timestamp')"))return true;
	else return false;
}

function member_reg($userid,$userpwd,$email='',$safequestion='',$safeanswer='',$openid='',$cname='',$status='',$openid_wx='',$logo='',$prelogo=''){

	global $mymps_global,$db,$db_mymps,$member_log,$timestamp;
	
	if($openid){
		if($db->getOne("SELECT id FROM `{$db_mymps}member` WHERE openid = '$openid'")) write_msg('openid已重复!请重新完善帐号信息！');
	}
	
	if($openid_wx){
		if($db->getOne("SELECT id FROM `{$db_mymps}member` WHERE openid_wx = '$openid_wx'")) write_msg('openid已重复!请重新完善帐号信息！');
	}
	
	$ip = GetIP();
	$safeanswer = trim($safeanswer);
	$row 		= $db->getRow("SELECT money_own FROM `{$db_mymps}member_level` WHERE id = '1'"); 
	$money_own	= $row['money_own'];
	$status 	= ($status == 1 || $mymps_global['cfg_member_verify'] == 1 || $mymps_global['cfg_member_verify'] == 4) ? 1 : 0;
	
	$sql 		= "INSERT INTO `{$db_mymps}member`(id,userid,userpwd,logo,prelogo,email,safequestion,safeanswer,levelid,joinip,loginip,jointime,logintime,money_own,openid,openid_wx,cname,status) VALUES ('','$userid','$userpwd','$logo','$prelogo','$email','$safequestion','$safeanswer','1','$ip','$ip','$timestamp','$timestamp','$money_own','$openid','$openid_wx','$cname','$status')";
	
	$db -> query($sql);
}

function sendpm($fromuser='',$touser='',$title='',$content='',$if_sys=0){
	global $db,$db_mymps,$timestamp;
	$fromuser = $fromuser ? mhtmlspecialchars($fromuser) : '';
	$touser	  = $touser	  ? mhtmlspecialchars($touser)	 : '';
	$title 	  = $title	  ? mhtmlspecialchars($title)	 : '';
	$content  = $content  ? $content	 				 : '';
	
	$pubtime = $timestamp ? $timestamp : time();
	$result  = array();
	$title 	 = str_replace("'",'"',$title);
	$content = str_replace("'",'"',$content);
	empty($title) && $title = substring($content,0,15);
	if(empty($touser)) die('请指定要发短消息的用户名');
	if(empty($content) || $fromuser == $touser) {
		$result['succ'] = 'no';
		$result['member'] = $touser;
		return $result;
		exit;
	}
	if(!$ifuser = $db->getOne("SELECT userid FROM `{$db_mymps}member` WHERE userid = '$touser'")){
		$result['succ'] = 'no';
		$result['member'] = $touser;
	} else {
		$db -> query("INSERT INTO `{$db_mymps}member_pm` (title,content,fromuser,touser,pubtime,if_sys) VALUES ('$title','$content','$fromuser','$touser','$pubtime','$if_sys')");
		$result['succ'] = 'yes';
		$result['member'] = $touser;
	}
	return $result;
}
?>
<?php
define('IN_SMT',true);
define('IN_MYMPS', true);
define('CURSCRIPT','store');

require_once dirname(__FILE__)."/include/global.php";
require_once MYMPS_DATA."/config.php";
require_once MYMPS_DATA."/config.db.php";
require_once MYMPS_INC."/db.class.php";

ifsiteopen();

$part 	= isset($part)	 ? trim($part)	 	: 'index';
$user 	= isset($user)	 ? checkhtml($user)	: '';
$uid    = isset($uid) 	 ? intval($uid)	 	: '';
$id    = isset($id) 	 ? intval($id)	 	: '';
$typeid = isset($typeid) ? intval($typeid)  : '';
$action = isset($action) ? trim($action)	: '';
$Uid	= isset($Uid)    ? trim($Uid) 		: '';

$seo = get_seoset();

if($Uid && $seo['seo_force_store'] == 'rewrite'){
	$detail=explode("-",$Uid);
	$part = $detail[0];
	if($detail[1]){
		for($i=1;$i<count($detail) ;$i++ ){
			$_GET[$detail[$i]]=$$detail[$i]=str_replace(array('#@#','#!#'),array('-','/'),$detail[++$i]);	
		}
		extract($_GET);
	}
	$CAtid = $detail = NULL;
}

in_array($part,array('index','comment')) && require_once MYMPS_INC."/member.class.php";

if($action != 'dopost'){
	
	if(empty($user)&&empty($uid)){
		write_msg('您指定的商铺不存在或者未通过审核！',$mymps_global[SiteUrl].'/corporation.php');
	}elseif(empty($uid) && $user) {
		$uid = $db -> getOne("SELECT id FROM `{$db_mymps}member` WHERE userid ='$user'");
	}
	
	if(!pcclient()){
		write_msg('',$mymps_global['SiteUrl'].'/m/index.php?mod=store&id='.$uid);
	}
 
	$where  = "WHERE a.id = '$uid' AND status = '1' AND if_corp = '1'";
	
	$store	= $db -> getRow("SELECT a.* FROM `{$db_mymps}member` AS a $where");
	if(!$store || empty($uid)) write_msg('您指定的机构不存在或者未通过审核！',$mymps_global[SiteUrl].'/corporation.php');
	if(!$store['template'] || !in_array($store['template'],array('blue','green','orange','purple','pink'))) $store['template'] = 'blue';
	
	$allow_param = array('about','info','document','album','contactus','comment','index','goods');
	if(!$part || !in_array($part,$allow_param)) $part = 'index';
	foreach($allow_param as $allow){
		$uri[$allow] = Rewrite('store',array('uid'=>$uid,'part'=>$allow));
	}
	$store['good_comment'] = $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}member_comment` AS a WHERE a.userid = '$store[userid]'  AND enjoy IN('2','3') ");
	$store['soso_comment'] = $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}member_comment` AS a WHERE a.userid = '$store[userid]' AND enjoy = '1' ");
	$store['bad_comment'] = $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}member_comment` AS a WHERE a.userid = '$store[userid]' AND enjoy = '0' ");
	$uri['good_comment'] = Rewrite('store',array('uid'=>$uid,'part'=>'comment','type'=>'good','page'=>1));
	$uri['soso_comment'] = Rewrite('store',array('uid'=>$uid,'part'=>'comment','type'=>'soso','page'=>1));
	$uri['bad_comment']  = Rewrite('store',array('uid'=>$uid,'part'=>'comment','type'=>'bad','page'=>1));
	$store['all_comment'] = $store['good_comment'] + $store['soso_comment'] + $store['bad_comment'];
	$store['good_comment_per']	= empty($store['all_comment']) ? 0 : ceil($store['good_comment']*100/$store['all_comment']);
	$store['soso_comment_per'] = empty($store['all_comment']) ? 0 : ceil($store['soso_comment']*100/$store['all_comment']);
	$store['bad_comment_per'] 	= empty($store['all_comment']) ? 0 : ceil($store['bad_comment']*100/$store['all_comment']);
	
	$store['tname']	  = $store['tname']   ? $store['tname']	  : $store['userid'];
	$store['prelogo'] = $store['prelogo'] ? $store['prelogo'] : '/images/nophoto.jpg';
	$store['logo'] 	  = $store['logo'] 	  ? $store['logo'] 	  : '/images/nophoto.jpg';
	
	
	$store['contact'] = get_member_group($store['levelid']);
	$store['levelname'] = $db -> getOne("SELECT levelname FROM `{$db_mymps}member_level` WHERE id = '$store[levelid]'");

	if($store['contact']['member_contact'] == 0){
		$store['cname'] 	= $mymps_global['SiteTeacher'];
		$store['tel']		= $mymps_global['SiteTel'];
		$store['qq']		= $mymps_global['SiteQQ'];
		$store['email']	= $mymps_global['SiteEmail'];
	}
	
	if($part == 'about'){
		
		
	} elseif($part == 'info'){
		
		$where = " WHERE userid = '$store[userid]' AND info_level > '0'";
		$sql = "SELECT a.* FROM {$db_mymps}information AS a $where ORDER BY a.id DESC";
		
		$rows_num = $db->getOne("SELECT COUNT(a.id) FROM `{$db_mymps}information` AS a {$where}");
		$param	  = store_setParam(array('uid','part'),$seo['seo_force_store'],'store-'.$store[id].'/');
		$list     = array();
		$page1	  = page1($sql,15);
		
		foreach($page1 as $k => $row){
			$arr['id']          = $row['id'];
			$arr['uri']         = Rewrite('info',array('dir_typename'=>$row['dir_typename'],'id'=>$row['id'],'cityid'=>$row['cityid']));
			$arr['title']  	    = SpHtml2Text($row['title']);
			$arr['begintime']   = $row['begintime'];
			$arr['catname']   = $row['catname'];
			$arr['img_path']	= $row['img_path'];
			$arr['hit']			= $row['hit'];
			$info[]= $arr;
		}
		
		$pageview = store_page2($seo['seo_force_store']);
		
	}  elseif($part == 'contactus'){
		
		$store['location'] = get_store_location($uri['index'],$store['tname'],'联系方式');
		
	} elseif($part == 'goods'){
		
		$where = " WHERE userid = '$store[userid]'  AND onsale = '1'";
		$sql = "SELECT a.* FROM {$db_mymps}goods AS a $where ORDER BY a.goodsid DESC";
		
		$rows_num = $db->getOne("SELECT COUNT(a.goodsid) FROM `{$db_mymps}goods` AS a {$where}");
		$param	  = store_setParam(array('uid','part'),$seo['seo_force_store'],'store-'.$store[id].'/');
		$list     = array();
		$page1	  = page1($sql,15);
		
		foreach($page1 as $k => $row){
			$arr['goodsid']     = $row['goodsid'];
			$arr['uri']         = Rewrite('goods',array('id'=>$row['goodsid']));
			$arr['goodsname']  	= SpHtml2Text($row['goodsname']);
			$arr['oldprice']	= $row['oldprice'];
			$arr['nowprice']	= $row['nowprice'];
			$arr['picture']		= $row['picture'];
			$goods[]= $arr;
		}
		
		$pageview = store_page2($seo['seo_force_store']);
		
	} elseif($part == 'document'){
		
		if(!$id && $typeid){
			
			$docutype = get_member_docutype();
			
			$where = " WHERE a.userid = '$store[userid]' AND a.typeid = '$typeid'";
			$sql = "SELECT a.*,b.id AS uid FROM {$db_mymps}member_docu AS a LEFT JOIN `{$db_mymps}member` AS b ON a.userid = b.userid  $where ORDER BY a.id DESC";
			
			$rows_num = $db->getOne("SELECT COUNT(a.id) FROM `{$db_mymps}member_docu` AS a {$where}");
			$param = store_setParam(array('uid','part','typeid'),$seo['seo_force_store'],'store-'.$store[id].'/');
			$list     = array();
			$page1	  = page1($sql,15);
			
			foreach($page1 as $k => $row){
				$arr['id'] = $row['id'];
				$arr['userid'] = $row['userid'];
				$arr['tname'] = $row['tname'];
				$arr['typeid'] = $row['typeid'];
				$arr['title']  = $row['title'];
				$arr['pubtime']= $row['pubtime'];
				$arr['imgpath']= $row['imgpath'];
				$arr['hit']= $row['hit'];
				$arr['pre_imgpath']= $row['pre_imgpath'];
				$arr['uri']   	= Rewrite('store',array('uid'=>$row['uid'],'id'=>$row['id'],'part'=>'document'));
				$docu[] = $arr;
			}
			
			$pageview = store_page2($seo['seo_force_store']);
			$typename = $docutype[$typeid]['typename'];
			
		} elseif($id && !$typeid) {
			
			if(!$docu = $db->getRow("SELECT a.* FROM `{$db_mymps}member_docu` AS a WHERE a.userid = '$store[userid]' AND a.id = '$id'")){
				die('您所指定的空间文档不存在');
			} else {
				$db->query("UPDATE `{$db_mymps}member_docu` SET hit = hit + 1 WHERE id = '$id'");
				$docutype = get_member_docutype();
				$typename = $docutype[$docu['typeid']]['typename'];
				//$docu['content'] = preg_replace("/<a[^>]+>(.+?)<\/a>/i","$1",$docu['content']);
			}
			
		} else {
			die('Access Denied!');
		}
		
	}elseif($part == 'album') {
		
		if(!$seo) $seo = get_seoset();
		$param	  = store_setParam(array('uid','part'),$seo['seo_force_store'],'store-'.$store[id].'/');
		$where = " WHERE a.userid = '$store[userid]'";
		
		$rows_num = $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}member_album` AS a $where");
		$album 	  = page1("SELECT a.* FROM `{$db_mymps}member_album` AS a $where ORDER BY a.id desc",15);

		$pageview = store_page2($seo['seo_force_store']);
		$seo = NULL;
		
	}elseif($part == 'comment'){
	
		if(!$seo) $seo = get_seoset();
		$param = store_setParam(array('uid','part','type'),$seo['seo_force_store'],'store-'.$store[id].'/');
		$where = " WHERE a.userid = '$store[userid]'";
		
		if($type == 'good'){
			$where .= " AND a.enjoy IN(2,3)";
			$rows_num = $store['good_comment'];
		} elseif($type == 'soso'){
			$where .= " AND a.enjoy = '1'";
			$rows_num = $store['soso_comment'];
		} elseif($type == 'bad'){
			$where .= " AND a.enjoy = '0'";
			$rows_num = $store['bad_comment'];
		} else {
			$rows_num = $store['all_comment'];
		}
		
		$page		 = empty($page) ? 1 : intval($page);

		$comment = array();
		$result = page1("SELECT a.* FROM `{$db_mymps}member_comment` AS a $where AND a.commentlevel = '1' order by id DESC",15);
		
		foreach($result as $k => $row){
			$arr['id']			 = $row['id'];
			$arr['quality']		 = intval($row['quality']);
			$arr['service']		 = intval($row['service']);
			$arr['environment']	 = intval($row['environment']);
			$arr['price']		 = intval($row['price']);
			$arr['enjoy']		 = intval($row['enjoy']);
			$arr['reply']		 = de_textarea_post_change($row['reply']);
			$arr['retime']		 = GetTime($row['retime']);
			$arr['enjoy']		 = $row['enjoy'] == 0 ? 'cha' : ($row['enjoy'] == 1 ? 'zhong' : 'hao');
			$arr['content']		 = $row['content'];
			$arr['fromuser']	 = $row['fromuser'] ? $row['fromuser'] : '匿名网友';
			$arr['useruri']		 = $row['fromuser'] ? Rewrite('space',array('user'=>$row['fromuser'])) : '#';	
			$arr['pubtime'] 	 = GetTime($row['pubtime']);
			$arr['face']		 = $row['face'] ? $row['face'] : $mymps_global['SiteUrl'].'/images/noavatar_small.gif';
			$comment[]      	 = $arr;
		}
		
		$pageview = store_page2($seo['seo_force_store']);
	
		require_once MYMPS_INC."/member.class.php";
		$commentsettings = get_commentsettings();
		$store['commentsettings'] = $commentsettings[CURSCRIPT];
		$commentsettings = NULL;
		if($iflogin = $member_log -> chk_in()){
			$store['loginlimit'] = $s_uid.'<a href="'.$mymps_global[SiteUrl].'/'.$mymps_global[cfg_member_logfile].'?mod=out&url='.urlencode(GetUrl()).'">[退出]</a>';
		} else {
			if($store['commentsettings'] == 2){
				$store['loginlimit'] = '<span class="left">用户名：<input name="loginuser" class="login_test" type="text" /> 密码：<input name="loginpwd" class="login_test" type="password" />';
			}
			
			$store['loginlimit'] .= '验证码：<input name="checkcode" class="login_test" style="width:50px" type="text" /></span><span class="left"> <img src="'.$mymps_global["SiteUrl"].'/'.$mymps_global["cfg_authcodefile"].'" alt="看不清，请点击刷新" align="absmiddle" class="authcode" onClick="this.src=this.src+\'?\'"/></span>';
		}
 		$store['location'] = get_store_location($uri['index'],$store['tname'],'留言点评');
		
	} elseif($part == 'index') {
		
		$album = $db -> getAll("SELECT a.* FROM `{$db_mymps}member_album` AS a  WHERE a.userid='$store[userid]' ORDER BY a.id DESC LIMIT 0,15");
		$where = " WHERE a.userid = '$store[userid]'";
		$store['location'] = get_store_location($uri['index'],$store['tname'],'机构首页');
		$goods = mymps_get_goods(8,1,'','',$store['userid']);
		
	}
	globalassign();
	include mymps_tpl($part);
	
} else {
	define ('IN_AJAX',true);
	$part	= $part ? trim($part) : '';
	$commentsettings = get_commentsettings();
	$store['commentsettings'] = $commentsettings[CURSCRIPT];
	$commentsettings = NULL;
	
	if($part == 'comment'){
		$userid			= $user ? mhtmlspecialchars($user) : '';
		if(empty($userid)) write_msg('您还没有指定点评的对象!');
		
		if(empty($content)) write_msg('请填写点评内容!');
		$result 		= verify_badwords_filter($mymps_global['cfg_if_comment_verify'],'',$content);
		$content 		= textarea_post_change($result['content']);
		
		$commentlevel	= $result['level'];
		
		$price			= $price   != '' ? intval($price) : '';
		$enjoy			= $enjoy ? intval($enjoy) : '';
		
		if($iflogin 	= $member_log -> chk_in()){
			$fromuser = $s_uid;
		} else {
			if(!$randcode = mymps_chk_randcode($checkcode)){
				write_msg('验证码输入错误，请返回重新输入');
				exit;
			}
			if($store['commentsettings'] == 1 ){
				$fromuser = '';
			} elseif($store['commentsettings'] == 2){
				$loginuser	= $loginuser ? mhtmlspecialchars($loginuser) : '';
				$loginpwd	= $loginpwd	 ? mhtmlspecialchars($loginpwd)	 : '';
				if(empty($loginuser)) write_msg('请填写你的用户帐号!');
				if(empty($loginpwd)) write_msg('请填写你的用户密码！');
				$loginpwd = md5($loginpwd);
				if(!$res = $db -> getOne("SELECT id FROM `{$db_mymps}member` WHERE userid = '$loginuser' AND userpwd = '$loginpwd'")){
					unset($res);
					write_msg('你的帐号或密码输入错误，或不存在该用户！');
				} else {
					$fromuser		= $loginuser;
					$member_log -> in($loginuser,$loginpwd,'','noredirect');
				}
			}
			
		}
		
		$avgprice		= $avgprice ? mhtmlspecialchars($avgprice) : '';
		$face 			= $db -> getOne("SELECT prelogo FROM `{$db_mymps}member` WHERE userid = '$fromuser'");
		$face			= $face ? $face : '';
		$db -> query("INSERT INTO `{$db_mymps}member_comment` (id,userid,fromuser,content,commentlevel,quality,service,environment,price,avgprice,enjoy,pubtime,face) VALUES ('','$userid','$fromuser','$content','$commentlevel','$quality','$service','$environment','$price','$avgprice','$enjoy','$timestamp','$face')");
		$uid = $db -> getOne("SELECT id FROM `{$db_mymps}member` WHERE userid = '$user'");
		if($commentlevel == '0'){
			write_msg("您发表的评论包含敏感关键字，管理员审核通过后显示！","store.php?uid=$uid&part=comment");
		} else {
			
			write_msg("成功发表一则点评","store.php?uid=$uid&part=comment");
		}
	}
}

is_object($db) && $db->Close();

function get_store_location($homeurl='',$storename='',$curlocate=''){
	global $mymps_global;
	$raquo = $mymps_global['cfg_raquo'];
	$location = ' <a href="'.$homeurl.'" target="_blank" title='.$storename.'>'.$storename."</a> ".$raquo." ".$curlocate;
	
	return $location;
}

function store_setParam($param1,$rewrite='active',$pre='store-',$htmlpath='')
{
	if($rewrite == 'rewrite'){
		$param = $pre;
		foreach($param1 as $key){
			global ${$key};
			$param .= ($key != 'uid') ? $key.'-'.${$key}.'-' : '';
		}
		$param = str_replace('part-','',$param);
	} elseif($rewrite == 'active'){
		foreach($param1 as $key){
			global ${$key};
			$param .= ${$key} ? urlencode($key).'='.${$key}.'&' : '';
		}
	}
	return $param;
}

function store_page2($rewrite='active',$ext='.html')
{
	global $rows_num,$page,$pages_num,$per_page,$rows_offset,$param,$per_screen;
	$font_size="10pt";
	$mid = ceil(($per_screen+1)/2);
	$nav = '';
	if($page <= $mid ){
		$begin = 1;
	}elseif($page > $pages_num-$mid) {
		$begin = $pages_num-$per_screen+1;
	}else{
		$begin = $page-$mid+1;
	}
	$begin = ($begin < 0)?1:$begin;
	if($rewrite == 'active'){
		$nav .="<span>共".$rows_num."记录</span> ";
		if($page>1)$nav .= "<a href='?$param"."page=".($page-1)."' title='第".($page-1)."页'>上一页</a>";
		if($begin!=1)$nav .= "<a href='?$param' title='第1页'>1 ...</a>";
		$end = ($begin+$per_screen>$pages_num)?$pages_num+1:$begin+$per_screen;
		for($i=$begin; $i<$end; $i++) {
			if (!empty($i)){
				$nav .=($page!=$i)?"<a href='?$param"."page=$i' title='第{$i}页'>$i</a> ":" <span class=current>$i</span> ";
			}
		}
		if($end!=$pages_num+1) $nav .= "<a href='?$param"."page=$pages_num' title='第{$pages_num}页'>... {$pages_num}</a>";
		if($page<$pages_num)   $nav .= "<a href='?$param"."page=".($page+1)."' title='第".($page+1)."页'>下一页</a>";
	} elseif($rewrite == 'rewrite') {
		$nav .="<span>共".$rows_num."记录</span> ";
		if($page>1)$nav .= "<a href='/$param"."page-".($page-1).".html' title='第".($page-1)."页'>上一页</a>";
		if($begin!=1)$nav .= "<a href='/$param"."page-1.html' title='第1页'>1 ...</a>";
		$end = ($begin+$per_screen>$pages_num)?$pages_num+1:$begin+$per_screen;
		for($i=$begin; $i<$end; $i++) {
			if (!empty($i)){
				$nav .=($page!=$i)?"<a href='/$param"."page-$i.html' title='第{$i}页'>$i</a> ":" <span class=current>$i</span> ";
			}
		}
		if($end!=$pages_num+1) $nav .= "<a href='/$param"."page-$pages_num.html' title='第{$pages_num}页'>... {$pages_num}</a>";
		if($page<$pages_num) $nav .= "<a href='/$param"."page-".($page+1).".html' title='第".($page+1)."页'>下一页</a>";
	}
	return $nav; 
}
?>
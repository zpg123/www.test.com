<?php
define('IN_SMT',true);
define ('CURSCRIPT','information');
define('IN_MYMPS', true);

require_once dirname(__FILE__)."/include/global.php";
require_once MYMPS_DATA."/config.php";
require_once MYMPS_DATA."/config.db.php";
require_once MYMPS_INC."/db.class.php";

$id	= isset($id) ? intval($id) 	: 0;

$cache = get_cache_config();
require_once MYMPS_INC.'/cachepages.class.php';
$cachepages = new cachepages($cache['info']['time'],'info_'.$id);
$cachetime = $cache['info']['time'];
$cachepages->cacheCheck();
unset($cache);

runcron();

$seo	 		= $seo ? $seo : get_seoset();
$rewrite	 	= $seo['seo_force_info'];

$info = $db->getRow("SELECT a.*,b.areaname,c.parentid,c.template_info,c.usecoin,c.modid FROM `{$db_mymps}information` AS a LEFT JOIN  `{$db_mymps}area` AS b ON a.areaid = b.areaid LEFT JOIN `{$db_mymps}category` AS c ON a.catid = c.catid WHERE a.id = '$id'");
if(!$info) write_msg('该信息不存在或已被删除！',$mymps_global['SiteUrl']);
if(empty($info['info_level'])) write_msg('该信息尚未通过审核！',$mymps_global['SiteUrl']);
if($info['usecoin'] < 0){
	require_once MYMPS_INC."/member.class.php";
	if(!$member_log->chk_in()){$info['usecoin'] = '-1';}else{$info['usecoin'] = 0;}
}

$info['caturi']	= $rewrite == 'rewrite_py' ?  $mymps_global['SiteUrl'].'/'.$info['dir_typename'].'/' : Rewrite('category',array('catid'=>$info['catid'],'dir_typename'=>$info['dir_typename']));

$advertisement	= get_advertisement('info');
$adveritems		= $advertisement['items'];
$advertisement['type']	= $advertisement['all'] ? (is_array($advertisement[$info['catid']]['type']) ? array_merge($advertisement['all']['type'],$advertisement[$info['catid']]['type']) : $advertisement['all']['type']): $advertisement[$info['catid']]['type'];

$info['description'] = mhtmlspecialchars(clear_html($info['content']));
$info['zhiding']	 = ($info['upgrade_type'] > 1 || $info['upgrade_type_index'] > 1) ? 1 : 0;
$info['endtime']	 = get_info_life_time($info['endtime']);
$info['contactview'] = ($info['endtime'] == '<font color=red>已过期</font>' && $mymps_global['cfg_info_if_gq'] != 1) ? 0 : 1;
$info['tel_base64'] = base64_encode($info['tel']);
$info['tel']		 = part_tel($info['tel']);
$info['content'] = replace_insidelink($info['content'],'information');

if($info['ismember']==1 && $info['userid']){
	$member = get_member_info($info['userid']);
	$member['if_corp'] = $mymps_global['cfg_if_corp'] != 1 ? 0 : $member['if_corp'];
	$group  = get_member_group('',$info['userid']);
	if($member['userid'] && $group['member_contact'] == 0 && $info['ismember'] == '1'){
		$info['tel'] 		 = $mymps_global['SiteTel'];
		$info['qq'] 		 = $mymps_global['SiteQQ'];
		$info['email'] 		 = $mymps_global['SiteEmail'];
	}
	$info['userid'] = $member['if_corp']==1 ? '<a title="'.$member['tname'].'" target=_blank href="'.Rewrite('store',array('uid'=>$member['id'])).'">'.cutstr($member['tname'],28).'</a>' : '<a target=_blank href="'.Rewrite('space',array('user'=>$info['userid'])).'">'.$info['userid'].'</a>';
} elseif($info['userid']) {
	$info['userid'] = '<a href="'.Rewrite('space',array('user'=>$info['userid'])).'" target=_blank>'.$info[userid].'</a>';
} else{
	$info['userid'] = $info['contact_who'];
}

if(function_exists("gd_info") && $mymps_global['cfg_info_if_img'] == 1){
	$info['qqnum'] 		= $info['qq']?	"<img src=\"".$mymps_global['SiteUrl']."/".$mymps_global['cfg_authcodefile']."?part=contact&wid=130&strings=".base64_encode($info['qq'])."\">":$info['qq'];
	$info['email'] 		= $info['email']?	"<img src=\"".$mymps_global['SiteUrl']."/".$mymps_global['cfg_authcodefile']."?part=contact&wid=230&strings=".base64_encode($info['email'])."\">":$info['email'];
	$info['telephone'] 	= $info['tel']	?	"<img src=\"".$mymps_global['SiteUrl']."/".$mymps_global['cfg_authcodefile']."?part=contact&wid=130&strings=".base64_encode($info['tel'])."\">":$info['tel'];
} else {
	$info['qqnum'] 		= $info['qq'];
	$info['telephone'] 	= $info['tel'];
}

$info['ip'] = $info['ip'] != '' ? part_ip($info['ip']) : '';

if($info['modid'] > 1){
	$extr = $db ->getRow("SELECT * FROM `{$db_mymps}information_{$info[modid]}` WHERE id ='$id'");
	if(is_array($extr)){
		$des = get_info_option_array();
		unset($extr['iid'],$extr['id'],$extr['content']);
		foreach($extr as $k =>$v){
			$val = get_info_option_titval($des[$k],$v);
			$arr['title'] = $val['title'];
			$arr['value'] = $val['value'];
			$info['extra'][]=$arr;
			$info[$k] = $val['value'];
		}
		$des = NULL;
	}
}

$info['image'] = $info['img_path'] != '' ? $db -> getAll("SELECT prepath,path FROM `{$db_mymps}info_img` WHERE infoid = '$id' ORDER BY id ASC") : false;

$pdetail = ($info['img_path'] != '' ? '【图】':'').$info['title'].'-'.$mymps_global['SiteCity'].$info['areaname'].$info['catname'].'-'.$mymps_global['SiteName'];
$loc 		= get_location('category',$info['catid'],'','',$pdetail);
$location 	= $loc['location'];
$page_title = $loc['page_title'];

$cat = array();
$cat['catid'] = $info['catid'];
$cat['parentid'] = $info['parentid'];
if($cat['parentid'] > 0){
	$flag = array_reverse(get_parent_cats('category',$cat['parentid']));
	$cat['parentid'] = $flag[0]['catid'];
}
$info['img_path'] = $info['img_path'] ? $info['img_path'] : '/images/nophoto.jpg';
$relate_cat = get_categories_tree($info['parentid']);
$latest_info = mymps_get_infos(10,'','','',$info['catid']);

globalassign();
include mymps_tpl($info['template_info']?$info['template_info']:'info');
is_object($db) && $db->Close();
$cachetime && $cachepages->caching();

$advertisement = NULL;
unset($advertisement);
?>
<?php
/*
 * this is not a freeware, use is subject to license terms
 * ============================================================================
 * 版权所有 mymps研发团队，保留所有权利。
 * 网站地址: http://www.dabai.com；
 * 交流论坛：http://bbs.mymps.com.cn；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 软件作者: 郑州维维信息技术有限公司
`*/
define('IN_SMT', true);
define('IN_MYMPS', true);
define('CURSCRIPT','index');

require_once dirname(__FILE__)."/include/global.php";
require_once MYMPS_DATA."/config.php";
require_once MYMPS_DATA."/config.db.php";
require_once MYMPS_INC."/db.class.php";

ifsiteopen();

if($fromuid && $mymps_global['cfg_if_affiliate'] == 1){
	msetcookie("fromuid",$fromuid,3600*24);
	msetcookie("fromip",GetIP(),3600*24);
}

$cache = get_cache_config();
require_once MYMPS_INC.'/cachepages.class.php';
$cachepages = new cachepages($cache['site']['time'],'index');
$cachetime = $cache['site']['time'] > 0 ? true : false;
$cachepages->cacheCheck();
unset($cache);

$tpl_index = get_tpl_index();
$tpl_index = $tpl_index['tpl_set'];

$seo = get_seoset();
$mymps_global = array_merge($mymps_global,$seo);

//当前位置
$loc					= get_location('index');
$location				= $loc['location'];
$page_title				= $loc['page_title'];

//获得首页广告
$advertisement			= get_advertisement('index');
$adveritems				= $advertisement['items'];
$advertisement['type']	= $advertisement['all'] ? (is_array($advertisement['type']) ? array_merge($advertisement['all']['type'],$advertisement['type']) : $advertisement['all']['type']) : $advertisement['type'];

//申请友情链接
$about['friendlink_uri'] = $mymps_global['SiteUrl'].Rewrite('about',array('part'=>'friendlink'));

if($tpl_index['banmian'] == 'portal'){
	
	$index_cat = get_categories_tree(0,'category');

	if(ifplugin('group')){
		require_once MYMPS_ROOT.'/plugin/group/include/functions.php';
		$groups = mymps_get_groups(3);
		$groupclass = get_group_class();
	}
	if(ifplugin('goods')){
		require_once MYMPS_ROOT.'/plugin/goods/include/functions.php';
		$goods = mymps_get_goods($tpl_index['goods'],1);
	}
	$in = $tpl_index['portal']['ershou'].','.$tpl_index['portal']['zhaopin'].','.$tpl_index['portal']['ershoufang'].','.$tpl_index['portal']['jianli'].','.$tpl_index['portal']['zufang'];
	if($query = $db->query("SELECT catid,dir_typename FROM `{$db_mymps}category` WHERE catid IN($in)")){
		while($row = $db->fetchRow($query)){
			$hd[$row['catid']]['dir_typename'] = $row['dir_typename'];
		}
	}
	
	$portaluri['moreershou'] = Rewrite('category',array('catid'=>$tpl_index['portal']['ershou'],'dir_typename'=>$hd[$tpl_index['portal']['ershou']]['dir_typename']));
	$portaluri['catidershou'] = $tpl_index['portal']['ershou'];

	$portaluri['morezufang'] = Rewrite('category',array('catid'=>$tpl_index['portal']['zufang'],'dir_typename'=>$hd[$tpl_index['portal']['zufang']]['dir_typename']));
	$portaluri['catidzufang'] = $tpl_index['portal']['zufang'];
	$portaluri['postzhaopin'] = $mymps_global['cfg_postfile'].'?catid='.$tpl_index['portal']['zhaopin'];
	$portaluri['morezhaopin'] = Rewrite('category',array('catid'=>$tpl_index['portal']['zhaopin'],'dir_typename'=>$hd[$tpl_index['portal']['zhaopin']]['dir_typename']));
	$portaluri['catidzhaopin'] = $tpl_index['portal']['zhaopin'];
	$portaluri['moreershoufang'] = Rewrite('category',array('catid'=>$tpl_index['portal']['ershoufang'],'dir_typename'=>$hd[$tpl_index['portal']['ershoufang']]['dir_typename']));
	$portaluri['catidershoufang'] = $tpl_index['portal']['ershoufang'];
	$portaluri['morejianli'] = Rewrite('category',array('catid'=>$tpl_index['portal']['jianli'],'dir_typename'=>$hd[$tpl_index['portal']['jianli']]['dir_typename']));
	$portaluri['catidjianli'] = $tpl_index['portal']['jianli'];
	$arr = '';
	$zhaopin = array();
	$query = $db -> query("SELECT a.id,a.title,a.ifred,a.ifbold,a.dir_typename,g.{$tpl_index[portali][company]} FROM `{$db_mymps}information` AS a LEFT JOIN `{$db_mymps}information_{$tpl_index[portal][zhaopinmod]}` AS g ON a.id = g.id WHERE ".get_children($tpl_index[portal][zhaopin])." AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC LIMIT 0,12");
	
	while($row = $db -> fetchRow($query)){
		$arr['id']        = $row['id'];
		$arr['title']     = $row['title'];
		$arr['ifred']     = $row['ifred'];
		$arr['ifbold']    = $row['ifbold'];
		$arr[$tpl_index['portali']['company']] = $row[$tpl_index['portali']['company']];
		$arr['uri']       = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
		$zhaopin[$row['id']]      = $arr;
	}
	$arr = '';
	$jianli = array();
	$query = $db -> query("SELECT a.id,a.title,a.ifred,a.ifbold,a.contact_who,a.dir_typename FROM `{$db_mymps}information` AS a WHERE ".get_children($tpl_index[portal][jianli])." AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC LIMIT 0,4");
	if($query){
		while($row = $db -> fetchRow($query)){
			$arr['id']        = $row['id'];
			$arr['title']     = $row['title'];
			$arr['ifred']     = $row['ifred'];
			$arr['ifbold']    = $row['ifbold'];
			$arr['contact_who']    = $row['contact_who'];
			$arr['uri']       = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
			$jianli[$row['id']]      = $arr;
		}
	}
	$arr = '';
	$esf = array();
	$query = $db -> query("SELECT a.id,a.title,a.ifred,a.ifbold,a.img_path,a.dir_typename,g.{$tpl_index[portali][acreage]},g.{$tpl_index[portali][prices]} FROM `{$db_mymps}information` AS a LEFT JOIN `{$db_mymps}information_{$tpl_index[portal][ershoufangmod]}` AS g ON a.id = g.id WHERE ".get_children($tpl_index[portal][ershoufang])." AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC LIMIT 0,12");
	while($row = $db -> fetchRow($query)){
		$arr['id']        = $row['id'];
		$arr['title']     = $row['title'];
		$arr['ifred']     = $row['ifred'];
		$arr['ifbold']    = $row['ifbold'];
		$arr['img_path']   = $row['img_path'];
		$arr[$tpl_index[portali][prices]] = $row[$tpl_index[portali][prices]];
		$arr[$tpl_index[portali][acreage]]    = $row[$tpl_index[portali][acreage]];
		$arr['uri']       = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
		$esf[$row['id']]      = $arr;
	}
	
	$arr = '';
	$czf = array();
	$query = $db -> query("SELECT a.id,a.title,a.ifred,a.ifbold,a.img_path,a.dir_typename FROM `{$db_mymps}information` AS a WHERE ".get_children($tpl_index[portal][zufang])." AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC LIMIT 0,4");
	while($row = $db -> fetchRow($query)){
		$arr['id']        = $row['id'];
		$arr['title']     = $row['title'];
		$arr['ifred']     = $row['ifred'];
		$arr['ifbold']    = $row['ifbold'];
		$arr['img_path']   = $row['img_path'];
		$arr['uri']       = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
		$czf[$row['id']]      = $arr;
	}
	
	unset($arr);
	$ershou = $ershou_img = array();
	$inershou = get_children($tpl_index[portal][ershou]);
	$query	 = $db -> query("SELECT a.id,a.title,a.ifred,a.ifbold,a.begintime,a.catname,a.dir_typename FROM {$db_mymps}information AS a  WHERE ".$inershou." AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC LIMIT 0,10");
	while($row   = $db -> fetchRow($query)){
		$arr['id'] 	      = $row['id'];
		$arr['title'] 	  = $row['title'];
		$arr['begintime'] = $row['begintime'];
		$arr['catname']	  = $row['catname'];
		$arr['ifred']	  = $row['ifred'];
		$arr['ifbold']	  = $row['ifbold'];
		$arr['uri']		  = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
		$ershou[$row['id']] = $arr;
	}
	$arr = '';
	$query = $db -> query("SELECT a.id,a.title,a.img_path,a.dir_typename FROM `{$db_mymps}information` AS a WHERE ".$inershou." AND (a.info_level = 1 OR a.info_level = 2) AND img_path != '' ORDER BY a.begintime DESC LIMIT 0,6");
	if($query){
		while($row = $db -> fetchRow($query)){
			$arr['id']        = $row['id'];
			$arr['title']     = $row['title'];
			$arr['img_path']  = $row['img_path'];
			$arr['uri']       = Rewrite('info',array('id'=>$row['id'],'dir_typename'=>$row['dir_typename']));
			$ershou_img[$row['id']]      = $arr;
		}
	}

} elseif($tpl_index['banmian'] == 'classic'){

	$index_cat = get_categories_tree(0,'category');
	if(is_array($index_cat)){
		foreach($index_cat as $firstcatkey => $firstcatval){
			$idin = get_page_idin2("id","SELECT a.id FROM `{$db_mymps}information` AS a WHERE a.gid='$firstcatval[catid]' AND (a.info_level = 1 OR a.info_level = 2) ORDER BY a.begintime DESC",$tpl_index['foreachinfo']);
			if($idin){
				$query	= $db -> query("SELECT a.catname,a.dir_typename,a.id,a.userid,a.catid,a.title,a.ifred,a.ifbold,a.begintime FROM `{$db_mymps}information` AS a WHERE a.id IN ($idin) ORDER BY a.begintime DESC");
				$index_cat[$firstcatval['catid']]['information'] = array();
				while($irow   = $db -> fetchRow($query)){
					$arr['id'] 	      = $irow['id'];
					$arr['title'] 	  = $irow['title'];
					$arr['begintime'] = $irow['begintime'];
					$arr['catname']	  = $irow['catname'];
					$arr['ifred']	  = $irow['ifred'];
					$arr['ifbold']	  = $irow['ifbold'];
					$arr['caturi']	  = Rewrite('category',array('dir_typename'=>$irow['dir_typename'],'catid'=>$irow['catid'],'domain'=>$city['domain']));
					$arr['uri']		  = Rewrite('info',array('id'=>$irow['id'],'dir_typename'=>$irow['dir_typename']));
					$index_cat[$firstcatval['catid']]['information'][] = $arr;
				}
			}
		}
	}
	$tpl_index[classic][cats] = $tpl_index[classic][cats] ? $tpl_index[classic][cats]+1 : '12';	
	
} elseif($tpl_index['banmian'] == 'simple'){
		
	if(ifplugin('goods')){
		require_once MYMPS_ROOT.'/plugin/goods/include/functions.php';
		$goods = mymps_get_goods($tpl_index['goods'],1);
	}
	$index_cat = get_categories_tree(0,'category');
	$firstcats = get_smplist_cats($tpl_index['smp_cats']['first'],$tpl_index['showstyle']);
	$secondcats = get_smplist_cats($tpl_index['smp_cats']['second'],$tpl_index['showstyle']);
	$thirdcats = get_smplist_cats($tpl_index['smp_cats']['third'],$tpl_index['showstyle']);
	$fourthcats = get_smplist_cats($tpl_index['smp_cats']['fourth'],$tpl_index['showstyle']);

}

include mymps_tpl('index_'.$tpl_index['banmian']);
is_object($db) && $db->Close();
$cachetime && $cachepages->caching();

$advertisement =NULL;
unset($advertisement);
?>
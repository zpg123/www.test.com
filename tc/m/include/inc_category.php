<?php
CURSCRIPT != 'wap' && exit('FORBIDDEN');

$catid = isset($catid) ? intval($catid) : 0;
$areaid = isset($areaid) ? intval($areaid) : 0;
$page = isset($page) ? intval($page) : 1;

$cat_list = get_categories_tree($catid);

if(empty($catid)){
	include mymps_tpl('category_all');
	exit;
}

if(!$cat = get_cat_info($catid)){
	errormsg('您所指定的栏目不存在或者已被删除！');
}

//手机版每页显示记录
$perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : '';
$page = empty($page) ? 1 : $page;

//筛选字段
$allow_identifier = allow_identifier();
$allow_identifier = $allow_identifier[$cat['modid']]['identifier'];
$allow_identifier = is_array($allow_identifier) ? $allow_identifier : array();
$allow_identifiers = array_merge(array('mod','catid','areaid','streetid','lat','lng','distance'),$allow_identifier);

//字段筛选
$mymps_extra_model = mod_identifier();
$mymps_extra_model = $mymps_extra_model[$cat['modid']];
$mymps_extra_model = is_array($mymps_extra_model) ? $mymps_extra_model : array();

foreach($mymps_extra_model as $key => $val){
	if(is_array($val['list'])){
		foreach($val['list'] as $k => $v){
			$mymps_extra_model[$key]['list'][$k]['uri'] = 'index.php?mod=category&areaid='.$areaid;
			foreach($allow_identifiers as $keys){
				if($v['identifier'] == $keys){
					$mymps_extra_model[$key]['list'][$k]['uri'] .= $v['id'] ? '&'.$keys.'='.$v['id'] : '';
				} else {
					$mymps_extra_model[$key]['list'][$k]['uri'] .= $$keys ? '&'.$keys.'='.$$keys : '';
				}
			}
			if($v['id'] == $$v['identifier']){
				$mymps_extra_model[$key]['list'][$k]['select'] .= 1;
			} else{
				$mymps_extra_model[$key]['list'][$k]['select'] .= 0;
			}
		}
	}
}

//分类筛选
$parentcats = get_parent_cats('category',$catid);
$parentcats = is_array($parentcats) ? array_reverse($parentcats) : '';
$area_list = cat_list('area',0,0,false,1);
//构造SQL
$sq = $s = '';
if($cat['modid'] > 1){
	$s = "";
	foreach ($_GET as $key => $val){
		if(in_array($key,$allow_identifier) && !empty($$key)){
			$val =explode('~',$val);
			if($val[1]){
				$sq .= " AND g.`$key` <= '$val[1]'  AND g.`$key` >= '$val[0]'";
			}elseif($val[0] && isset($val[1])){
				$sq .= " AND g.`$key` >= '$val[0]'";
			}else{
				$sq .= " AND g.`$key` LIKE '%".$val[0]."%' ";
				//$sq .= " AND g.`$key` = '$val[0]' ";
			}
			$s = " LEFT JOIN `{$db_mymps}information_{$cat[modid]}` AS g ON a.id = g.id";
		}
	}
}
$cate_limit = $cat['parentid'] > 0 ? " AND ".get_children($catid) : " AND a.gid = '$catid'";
$lat =(float)$lat;
$lng = (float)$lng;
$distance = (float)$distance;
$distance = !in_array($distance,array('0.5','1','3','5')) ? '0' : $distance;
$city_limit 	= empty($city['cityid']) ? "": " AND a.cityid = '$city[cityid]'";
if($distance){
	$city_limit .= " AND latitude < '".($lat+$distance)."' AND latitude > '".($lat-$distance)."' AND longitude < '".($lng+$distance)."' AND longitude > '".($lng-$distance)."'";
}else{
	$city_limit  .= empty($areaid) ? "": " AND a.areaid = '$areaid'";
}

$orderby	= $cat['parentid'] == 0 ? " ORDER BY a.upgrade_type DESC,a.begintime DESC" : " ORDER BY a.upgrade_type_list DESC,a.begintime DESC";

$param		= setparams($allow_identifiers);

$rows_num 	= $cat['totalnum'] =  $db -> getOne("SELECT COUNT(a.id) FROM `{$db_mymps}information` AS a {$s} WHERE a.info_level > 0 {$sq}{$cate_limit}{$city_limit}");
$totalpage = ceil($rows_num/$perpage);
$num = intval($page-1)*$perpage;

$idin = get_page_idin("id","SELECT a.id FROM `{$db_mymps}information` AS a {$s} WHERE (a.info_level = 1 OR a.info_level = 2) {$sq}{$cate_limit}{$city_limit}{$orderby}",$perpage);

$idin = $idin ? " AND a.id IN (".$idin.") " : "";

$sql = "SELECT a.* FROM {$db_mymps}information AS a WHERE 1 {$idin} {$orderby}";

$infolist = $idin ? $db -> getAll($sql) : array();
foreach($infolist as $k => $row){
	$arr['id']              = $row['id'];
	$arr['title']           = $row['title'];
	$arr['hit']             = $row['hit'];
	$arr['img_path']        = $row['img_path'];
	$arr['ifred']        	= $row['ifred'];
	$arr['ifbold']        	= $row['ifbold'];
	$arr['certify']        	= $row['certify'];
	$arr['img_count']       = $row['img_count'];
	$arr['upgrade_type']	= !$cat['parentid'] ? $row['upgrade_type'] : $row['upgrade_type_list'];
	$arr['contact_who']     = $row['contact_who'];
	$arr['content']	        = $row['content'];
	$arr['begintime']       = $row['begintime'];
	$info_list[$row['id']]	= $arr;
	$ids .= $row['id'].',';
}	
if($cat['modid'] > 1 && $idin) {
	$des = get_info_option_array();
	$extra = $db ->getAll("SELECT a.* FROM `{$db_mymps}information_{$cat[modid]}` AS a WHERE 1 {$idin}"); 
	foreach($extra as $k => $v){
		unset($v['iid']);
		unset($v['content']);
		foreach($v as $u => $w){
			$g = get_info_option_titval($des[$u],$w);
			if($u != 'id' && !is_numeric($u)) $info_list[$v['id']]['extra'][$u] = $g['value'];
		}
	}
}

$pageline = NULL;
$pageview = pager();

include mymps_tpl('category_list');
?>
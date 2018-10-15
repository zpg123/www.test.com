<?php
CURSCRIPT != 'wap' && exit('FORBIDDEN');
$id = isset($id) ? intval($id) : '';
$catid = isset($catid) ? intval($catid) : '';
$page = isset($page) ? intval($page) : 1;
if($id){
	if(!$goods = $db ->getRow("SELECT a.*,b.id as uid,b.tname FROM {$db_mymps}goods AS a LEFT JOIN `{$db_mymps}member` AS b ON a.userid = b.userid WHERE goodsid = '$id' AND onsale = '1'")) errormsg('当前商品不存在或者已经被删除！','javascript:history.back();');
	$db->query("UPDATE `{$db_mymps}goods` SET hit = hit +1 WHERE goodsid = '$id';");
	//$goods['catname'] = $db->getOne("SELECT catname FROM `{$db_mymps}goods_category` WHERE catid = '$goods[catid]'");
	include mymps_tpl('goods');
}else{
	require_once MYMPS_ROOT.'/plugin/goods/include/functions.php';
	$where = " WHERE onsale = '1' ";
	if($catid){
		$catid = intval($catid);
		$cat = $db -> getRow("SELECT * FROM `{$db_mymps}goods_category` WHERE catid = '$catid'");
		if(!$cat){
			$where = NULL;
			redirectmsg('该商品分类不存在或者已删除！','javascript:history.back();');
			exit;
		}
		$goods_children = mymps_get_goods_children($catid);
		$where .= " AND catid IN (".$goods_children.")";
	}
	
	$goods_cat = goods_category_tree(0);
	
	$perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
	$param		= setparams(array('mod','catid'));
	$rows_num = $db -> getOne("SELECT COUNT(goodsid) FROM `{$db_mymps}goods` $where");
	$totalpage = ceil($rows_num/$perpage);
	$num = intval($page-1)*$perpage;
	
	if($orderby == 'tuijian'){
		$orderby2 = " ORDER BY tuijian DESC ";
	}elseif($orderby == 'cuxiao'){
		$orderby2 = " ORDER BY cuxiao DESC ";
	}elseif($orderby == 'xinpin' ){
		$orderby2 = " ORDER BY dateline DESC ";
	}else{
		$orderby2 = " ORDER BY goodsid DESC ";
	}
	
	$orderbyarr = array('tuijian'=>'按推荐排序','cuxiao'=>'按促销排序','xinpin'=>'按新品排序');
	
	$page1 = page1("SELECT * FROM {$db_mymps}goods $where $orderby2",$perpage);
	foreach($page1 as $k => $v){
		$list[$v['goodsid']]['goodsid'] = $v['goodsid'];
		$list[$v['goodsid']]['goodsname'] = $v['goodsname'];
		$list[$v['goodsid']]['nowprice'] = $v['nowprice'];
		$list[$v['goodsid']]['oldprice'] = $v['oldprice'];
		$list[$v['goodsid']]['cuxiao'] = $v['cuxiao'];
		$list[$v['goodsid']]['tuijian'] = $v['tuijian'];
		$list[$v['goodsid']]['pre_picture'] = $v['pre_picture'];
		$list[$v['goodsid']]['picture'] = $v['picture'];
	}
	$pageview = pager();

	include mymps_tpl('goods_list');
}
?>
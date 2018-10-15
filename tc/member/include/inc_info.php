<?php
if(!defined('IN_MYMPS')) exit('Forbidden');
$l 	= !empty($_GET['l']) ? trim($_GET['l']) : 'normal';
$box = !empty($_POST['box']) ? 1 : '';
$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : '';

require_once MEMBERDIR.'/include/common.func.php';

if($ac == 'del'){

	empty($id) && write_msg('','?m=info&error=1&l='.$l.'&page='.$page);
	$r = $db -> getRow("SELECT a.*,b.modid FROM `{$db_mymps}information` AS a LEFT JOIN `{$db_mymps}category` AS b ON a.catid = b.catid {$wherea} AND a.id =".$id);
	if(!empty($r['img_path'])){
		$del = $db->getAll("SELECT path,prepath FROM `{$db_mymps}info_img` WHERE infoid='$id'");
		foreach ($del as $k => $v){
			if($v['path']) @unlink(MYMPS_ROOT.$v['path']) ;
			if($v['prepath']) @unlink(MYMPS_ROOT.$v['prepath']);
		}
		mymps_delete("info_img","WHERE infoid = '$id'");
	}
	mymps_delete("comment","WHERE type = 'information' AND typeid = '$id'");
	if($r[modid] > 1) mymps_delete("information_".$r[modid],"WHERE id = '$id'");
	$db -> query("DELETE FROM `{$db_mymps}information` WHERE id = ".$id);
	write_msg('','?m=info&success=3&l='.$l.'&page='.$page);

} elseif($ac == 'refresh') {

	$l == 'inormal' && write_msg('','?m=info&error=7&l=inormal&page='.$page);
	empty($id) && write_msg('','?m=info&error=1&page='.$page);
	/*刷新扣除的金币数*/
	$delmoney = $mymps_global['cfg_member_info_refresh'];
	if($delmoney > $money_own){
		write_msg('','?m=pay&error=2');
		exit;
	}
	
	mgetcookie('refreshed'.$id) == 1 && write_msg('','?m=info&error=3&page='.$page);
	$activetime = $db->getOne("SELECT activetime FROM `{$db_mymps}information` {$where} AND id = '$id'");
	$endtime	= $activetime == 0 ? 0 : $activetime*3600*24+$timestamp;
	$db -> query("UPDATE `{$db_mymps}information` SET begintime = '$timestamp' , endtime = '$endtime' {$where} AND id = '$id'");
	msetcookie("refreshed".$id,1);
	
	if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' {$where}");
	write_money_use("编号为 $id 的信息主题被执行 <font color=red>刷新</font> 操作","<font color=red>扣除金币 ".$delmoney." </font>");
	write_msg('','?m=info&success=2');

} elseif($ac == 'red') {
	
	$l == 'inormal' && write_msg('','?m=info&error=7&l=inormal&page='.$page);
	empty($id) && write_msg('','?m=info&error=1&page='.$page);
	$delmoney = $mymps_global['cfg_member_info_red'];
	if($money_own < $delmoney) write_msg('','?m=pay&error=2');
	$db -> query("UPDATE `{$db_mymps}information` SET ifred = '1' {$where} AND id =".$id);
	if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' {$where}");
	write_money_use("编号为 $id 的信息主题被执行 <font color=red>标题套红</font> 操作","<font color=red>扣除金币 ".$delmoney." </font>");
	write_msg('','?m=info&success=4&page='.$page);

} elseif($ac == 'bold') {
	
	$l == 'inormal' && write_msg('','?m=info&error=7&l=inormal&page='.$page);
	empty($id) && write_msg('','?m=info&error=1&page='.$page);
	$delmoney = $mymps_global['cfg_member_info_bold'];
	if($money_own < $delmoney) write_msg('','?m=pay&error=2');
	$db -> query("UPDATE `{$db_mymps}information` SET ifbold = '1' {$where} AND id =".$id);
	if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' {$where}");
	write_money_use("编号为 $id 的信息主题被执行 <font color=red>标题加粗</font> 操作","<font color=red>扣除金币 ".$delmoney." </font>");
	write_msg('','?m=info&success=5&page='.$page);

} elseif($ac == 'upgrade') {
		
	require_once MYMPS_DATA.'/info.level.inc.php';
	unset($information_level,$news_level);
	
	if(empty($id)) write_msg('','?m=info&error=1&page='.$page);
	$location = location('user','置顶信息');
	$row = $db -> getRow("SELECT id,title,catid,upgrade_type,upgrade_type_list,upgrade_type_index FROM `{$db_mymps}information` {$where} AND id = '$id'");
	if(empty($row['id'])) write_msg('','?m=info&error=1&page='.$page);
	include mymps_tpl('info_upgrade');

} elseif($ac == 'actionupgrade') {
	
	require_once MYMPS_INC."/class.fun.php" ;
	require_once MYMPS_INC.'/cache.fun.php';
	
	$id				 = isset($id) ? intval($id) : intval($_POST['id']);

	$catid			 = isset($catid) ? intval($catid) :intval($_POST['catid']);
	$upgrade_time	 = isset($upgrade_time) ? intval($upgrade_time) : intval($_POST['upgrade_time']);
	$upgrade_type	 = isset($upgrade_type) ? trim($upgrade_type) : trim($_POST['upgrade_type']);
	$money_own		 = $money_own ? $money_own : intval($_POST['money_own']);
	$iftop		 	 = isset($iftop) ? intval($iftop) : intval($_POST['iftop']);
	$iflisttop		 = isset($iflisttop) ? intval($iflisttop) : intval($_POST['iflisttop']);
	$ifindextop		 = isset($ifindextop) ? intval($ifindextop) : intval($_POST['ifindextop']);
	$money_cost 	 = $upgrade_time * $mymps_global[$upgrade_type];
	$upgrade_time 	 = ($upgrade_time*3600*24)+$timestamp;
	
	if(empty($id) || empty($catid) || empty($upgrade_time) || !in_array($upgrade_type,array('cfg_member_upgrade_index_top','cfg_member_upgrade_top','cfg_member_upgrade_list_top'))) {
		if($box) {
			write_msg('置顶失败，你选择置顶的信息主题编号为空或者置顶类型不正确');
		} else {
			write_msg('','?m=info&ac=upgrade&error=4&id='.$id);
		}
	}
	
	if($money_own < $money_cost) {
		if($box) {
			write_msg('您的账户余额不足，请先充值','member/index.php?m=pay&box=1','',1);
		} else {
			//write_msg('','?m=info&ac=upgrade&error=2&id='.$id);
			write_msg('','?m=pay&error=2');
		}
	}
	
	if($upgrade_type == 'cfg_member_upgrade_top') {
		
		if($box){
			$iftop == 2 && write_msg('该信息主题已处于大类置顶状态');
		} else {
			$iftop == 2 && write_msg('','?m=info&ac=upgrade&error=5&id='.$id);
		}
		
		$db->query("UPDATE `{$db_mymps}information` SET upgrade_type = '2' , upgrade_time = '$upgrade_time' {$where} AND id = '$id'");
		
	}elseif($upgrade_type == 'cfg_member_upgrade_list_top') {
		
		if($box){
			$iflisttop == 2 && write_msg('该信息主题已处于小类置顶状态');
		} else {
			$iflisttop == 2 && write_msg('','?m=info&ac=upgrade&error=5&id='.$id);
		}
		
		$db->query("UPDATE `{$db_mymps}information` SET upgrade_type_list = '2' , upgrade_time_list = '$upgrade_time' {$where} AND id = '$id'");
		
	} elseif($upgrade_type == 'cfg_member_upgrade_index_top') {
		
		if($box){
			$ifindextop == 2 && write_msg('该信息主题已处于首页置顶状态');
		} else {
			$ifindextop == 2 && write_msg('','?m=info&ac=upgrade&error=6&id='.$id);
		}
		
		/*
		if(mymps_count("information","WHERE upgrade_type_index = '2'") > 39){
			if($box){
				write_msg('置顶失败，首页头版头条位置不够，请明天再置顶');
			} else {
				write_msg('','?m=info&ac=upgrade&error=38&id='.$id);
			}
		}
		*/
		
		$db->query("UPDATE `{$db_mymps}information` SET upgrade_type_index = '2' , upgrade_time_index = '$upgrade_time' {$where} AND id = '$id'");
	}
	
	$db->query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$money_cost' {$where}");
	$caozuo = $upgrade_type == 'cfg_member_upgrade_index_top' ? '首页置顶' : ($upgrade_type == 'cfg_member_upgrade_top' ? '大类置顶' : '小类置顶');
	write_money_use("编号为 $id 的信息主题被执行 <font color=red>".$caozuo."</font> 操作","<font color=red>扣除金币 ".$money_cost." </font>");
	
	$$_request = array();
	$seo = get_seoset();
	if($upgrade_type == 'cfg_member_upgrade_top'){
		$do_action = '大类置顶';
	}elseif($upgrade_type == 'cfg_member_upgrade_list_top'){
		$do_action = '小类置顶';
	}elseif($upgrade_type == 'cfg_member_upgrade_index_top'){
	}
	
	if($box){
		write_msg('恭喜，该信息主题已被<font color=red>'.$caozuo.'</font>！<br /><br /><input value="关闭窗口" type="button" onclick=\'parent.window.location.reload();parent.closeopendiv();\' style="margin-left:auto;margin-right:auto;" class="blue">','olmsg');
	} else {
		write_msg('','?m=info&ac=upgrade&success=6&id='.$id);
	}

} else {
	
	require_once MYMPS_DATA.'/info.level.inc.php';
	runcron();
	if($l == 'normal'){
		$where .= '';
	} elseif($l == 'inormal'){
	 	$where .= ' AND a.info_level = \'0\' ';
	} elseif($l == 'tuiguang'){
		$where .= ' AND (upgrade_type > 1 OR upgrade_type_list > 1 OR upgrade_type_index > 1)';
	}
	$sql = "SELECT a.* FROM {$db_mymps}information AS a $where ORDER BY a.begintime DESC";
	
	$rows_num = $db->getOne("SELECT COUNT(a.id) FROM `{$db_mymps}information` AS a {$where}");
	$param	  = setParam(array("m","l"));
	$list     = array();
	$page1	  = page1($sql,10);
	
	foreach($page1 as $k => $row){
		$arr['id']          = $row['id'];
		$arr['uri']         = Rewrite('info',array('dir_typename'=>$row['dir_typename'],'id'=>$row['id']));
		$arr['title']  	    = SpHtml2Text($row['title']);
		$arr['content']     = SpHtml2Text($row['content']);
		$arr['begintime']   = get_format_time($row['begintime']);
		$arr['endtime']  	= $row['endtime'];
		$arr['upgrade_time']= $row['upgrade_time'];
		$arr['upgrade_time_index']= $row['upgrade_time_index'];
		$arr['upgrade_time_list']= $row['upgrade_time_list'];
		$arr['info_level']  = $information_level[$row['info_level']];
		$arr['ifred']		= $row['ifred'];
		$arr['ifbold']		= $row['ifbold'];
		$arr['img_path']	= $row['img_path'];
		$arr['hit']			= $row['hit'];
		$arr['info_level']	= $row['info_level'];
		
		if($row['upgrade_time'] >= $timestamp){
			if($row['upgrade_type']>1){
				$arr['upgrade_type'] = 1;
			} else {
				$arr['upgrade_type'] = NULL;
			}
		} else {
			$arr['upgrade_type'] = NULL;
		}
		
		if($row['upgrade_time_list'] >= $timestamp){
			if($row['upgrade_type_list']>1){
				$arr['upgrade_type_list'] = 1;
			} else {
				$arr['upgrade_type_list'] = NULL;
			}
		} else {
			$arr['upgrade_type_list'] = NULL;
		}
		
		if($row['upgrade_time_index'] >= $timestamp){
			if($row['upgrade_type_index']>1){
				$arr['upgrade_type_index'] = 1;
			} else {
				$arr['upgrade_type'] = NULL;
			}
		} else {
			$arr['upgrade_type_index'] = NULL;
		}
	
		$list[]= $arr;
	}
	$location = location();
	include mymps_tpl('info');
	
}
?>
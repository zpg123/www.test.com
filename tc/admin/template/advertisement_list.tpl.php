<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?part=intro" ';

if ($part == 'intro') {
	echo 'class="current"';
}

echo '>广告位详细介绍</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>广告列表</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t\t" . '<ul style="float:right; text-align:right">' . "\r\n\t\t\t" . '<select name="type" onChange="location.href=\'?type=\'+(this.options[this.selectedIndex].value)">' . "\r\n\t\t\t" . '<option value="">==按广告类型筛选==</option>' . "\r\n\t\t\t";

foreach ($vbm_adv_type as $k => $v ) {
	echo "\t\t\t" . '<option value="';
	echo $k;
	echo '" ';

	if ($k == $type) {
		echo 'selected';
	}

	echo '>';
	echo $v[name];
	echo '</option>' . "\r\n\t\t\t";
}

echo "\t\t\t" . '</select>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td>' . "\r\n" . '<form method="get" action="?">' . "\r\n" . '<input name="part" value="add" type="hidden"/>' . "\r\n" . '新增广告 -> 广告标题：<input style="vertical-align: middle" class="text" type="text" name="title" value="" size="25" maxlength="50">  ';
echo get_adv_style();
echo ' ';
echo get_adv_option();
echo '</form>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'adv.php\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<input name="part" value="';
echo $part;
echo '" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td width="5%">' . "\r\n" . '<input name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'delids\')" class="checkbox"/>删?</td>' . "\r\n" . '<td width="5%">可用</td>' . "\r\n" . '<td width="8%">显示顺序</td>' . "\r\n" . '<td width="15%">标题</td>' . "\r\n" . '<td width="12%">类型</td>' . "\r\n" . '<td width="5%">样式</td>' . "\r\n" . '<td width="8%">起始时间</td>' . "\r\n" . '<td width="8%">终止时间</td>' . "\r\n" . '<td width="10%">详情</td>' . "\r\n" . '</tr>' . "\r\n";

foreach ($adv as $k => $value ) {
	echo '<tr bgcolor="white">' . "\r\n" . '  <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[advid];
	echo '\' id="';
	echo $value[advid];
	echo '"></td>' . "\r\n" . '  <td><input class="checkbox" type="checkbox" name="available[';
	echo $value[advid];
	echo ']" value="1" ';

	if ($value['available'] == 1) {
		echo 'checked';
	}

	echo '/></td>' . "\r\n" . '  <td><input name="displayorder[';
	echo $value[advid];
	echo ']" value="';
	echo $value[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '  <td><input name="titlenew[';
	echo $value[advid];
	echo ']" value="';
	echo $value[title];
	echo '" type="text" class="text" style="width:100px"/></td>' . "\r\n" . '  <td><a href="?cityid=';
	echo $cityid;
	echo '&type=';
	echo $value[type];
	echo '">';
	echo $vbm_adv_type[$value[type]][name];
	echo '</a></td>' . "\r\n" . '  <td>' . "\r\n" . '  ';
	$adv_style = ($charset == 'utf-8' ? utf8_unserialize($value[parameters]) : unserialize($value[parameters]));
	echo $vbm_adv_style[$adv_style[style]];
	echo '</td>' . "\r\n" . '  <td><em>';
	echo $value[starttime] ? GetTime($value[starttime], 'Y-m-d') : '-';
	echo '</em></td>' . "\r\n" . '  <td><em>';
	echo $value[endtime] ? GetTime($value[endtime], 'Y-m-d') : '-';
	echo '</em></td>' . "\r\n" . '  <td><a href="?part=edit&advid=';
	echo $value[advid];
	echo '">编辑</a> ';

	if (!in_array($value[type], array('couplead', 'floatad'))) {
		echo '&nbsp;&nbsp;<a href="' . "\r\n" . 'javascript:setbg(\'广告预览\',550,110,\'../box.php?part=advertisementview&id=';
		echo $value[advid];
		echo '\')">预览</a>';
	}

	echo ' ';

	if ($value[type] == 'normalad') {
		echo ' &nbsp;&nbsp;<a href="' . "\r\n" . 'javascript:setbg(\'自定义广告调用\',550,110,\'../box.php?part=advertisement&id=';
		echo $value[advid];
		echo '\')">调用</a>';
	}

	echo '</td>' . "\r\n" . '</tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

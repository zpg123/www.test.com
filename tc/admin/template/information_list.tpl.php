<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.text{ *height:16px!important;*padding-top:1px!important;*padding-bottom:1px!important;}' . "\r\n" . 'input.mymps{*height:24px!important;*padding-top:0px!important;*padding-bottom:0px!important;}' . "\r\n" . '</style>' . "\r\n" . '<script type="text/javascript" src="js/titlealt.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '            ' . "\t" . '<li><a title="待审信息" href="information.php?info_level=0" ';

if ($info_level === '0') {
	echo 'class="current"';
}

echo '>待审</a></li>' . "\r\n" . '                <li><a title="正常信息" href="information.php?info_level=1" ';
if (($info_level == 1) || (($info_level == '') && ($upgrade != 'index') && ($upgrade != 'list') && ($upgrade != 'category') && ($ifred != '1') && ($ifbold != '1'))) {
	echo 'class="current"';
}

echo '>正常</a></li>' . "\r\n" . '                <li><a title="推荐信息" href="information.php?info_level=2" ';

if ($info_level == 2) {
	echo 'class="current"';
}

echo '>推荐</a></li>' . "\r\n" . '                <li><a title="首页置顶信息" href="information.php?upgrade=index" ';

if ($upgrade == 'index') {
	echo 'class="current"';
}

echo '>首顶</a></li>' . "\r\n" . '                <li><a title="大类置顶信息" href="information.php?upgrade=category" ';

if ($upgrade == 'category') {
	echo 'class="current"';
}

echo '>大顶</a></li>' . "\r\n\t\t\t\t" . '<li><a title="小类置顶信息" href="information.php?upgrade=list" ';

if ($upgrade == 'list') {
	echo 'class="current"';
}

echo '>小顶</a></li>' . "\r\n" . '                <li><a title="标题套红信息" href="information.php?ifred=1" ';

if ($ifred == 1) {
	echo 'class="current"';
}

echo '>套红</a></li>' . "\r\n" . '                <li><a title="标题加粗信息" href="information.php?ifbold=1" ';

if ($ifbold == 1) {
	echo 'class="current"';
}

echo '>加粗</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '            <ul style="float:right; text-align:right">' . "\r\n\t\t\t\t" . '<form action="?" method="get">' . "\r\n\t\t\t\t" . '<select name="show" style="margin-top:-1px;">' . "\r\n\t\t\t\t" . '<option value="title" ';

if ($show == 'title') {
	echo 'selected';
}

echo '>信息标题</option>' . "\r\n\t\t\t\t" . '<option value="idno" ';

if ($show == 'idno') {
	echo 'selected';
}

echo '>信息ID编号</option>' . "\r\n\t\t\t\t" . '<option value="catidno" ';

if ($show == 'catidno') {
	echo 'selected';
}

echo '>分类catID编号</option>' . "\r\n\t\t\t\t" . '<option value="userid" ';

if ($show == 'userid') {
	echo 'selected';
}

echo '>用户名</option>' . "\r\n\t\t\t\t" . '<option value="tel" ';

if ($show == 'tel') {
	echo 'selected';
}

echo '>联系电话</option>' . "\r\n\t\t\t\t" . '</select>' . "\r\n\t\t\t\t" . '<input name="keywords" value="';
echo $keywords;
echo '" type="text" class="text" style="width:60px">' . "\r\n\t\t\t\t" . '<input name="submit" type="submit" value="搜索" class="mymps"/>' . "\r\n\t\t\t\t" . '</form>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?action=pm" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">选择</td>' . "\r\n" . '    <td width="40">缩略图</td>' . "\r\n\t" . '<td width="30">状态</td>' . "\r\n" . '    <td>信息标题</td>' . "\r\n" . '    <td width="50">大顶</td>' . "\r\n\t" . '<td width="50">小顶</td>' . "\r\n" . '    <td width="50">首顶</td>' . "\r\n\t" . '<td width="50">发布人</td>' . "\r\n\t" . '<td width="60">所在地</td>' . "\r\n\t" . '<td width="50">时间</td>' . "\r\n" . '    <td width="30">管理</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($information as $row ) {
	echo "\r\n" . '     <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $row[id];
	echo '\' class=\'checkbox\' id="';
	echo $row[id];
	echo '"></td>' . "\r\n" . '     <td>';
	$row['img_path'] = ($row['img_path'] ? $row['img_path'] : '/images/nophoto.gif');
	echo '<img src="';
	echo $row[img_path];
	echo '" width="48" height="36" style="border:1px #dddddd solid; padding:1px"></td>' . "\r\n\t" . '<td>';
	echo $row[info_level];
	echo '</td>' . "\r\n" . '    <td>';

	if ($row['img_path']) {
		echo '<font color="green">[';
		echo $row['img_count'];
		echo '图]</font> ';
	}

	echo '<a style="';

	if ($row['ifred'] == 1) {
		echo 'color:red;';
	}

	if ($row['ifbold'] == 1) {
		echo 'font-weight:bold;';
	}

	echo '" href="';
	echo $row[uri];
	echo '" target="_blank" title="';
	echo $row[id];
	echo ' - ';
	echo $row[title];
	echo '">';
	echo $row[title];
	echo '</a><a title="catID编号:';
	echo $row[catid];
	echo '" target="_blank" href="';
	echo $row[uri_cat];
	echo '" style="color:#333; margin-left:10px">';
	echo $row[catname];
	echo '</a>';

	if ($row[certify] == 1) {
		echo ' <img title="认证信息" alt="认证信息" align="absmiddle" src="../images/company1.gif">';
	}

	echo '</td>' . "\r\n" . ' ' . "\r\n" . '    <td><div class="signin_button"  onmouseover="wsug(event, \'';
	echo $row['upgrade_time'];
	echo '\')" onmouseout="wsug(event, 0)">';
	echo $row[upgrade_type];
	echo '</div></td>' . "\r\n" . '    <td><div class="signin_button"  onmouseover="wsug(event, \'';
	echo $row['upgrade_time_list'];
	echo '\')" onmouseout="wsug(event, 0)">';
	echo $row[upgrade_type_list];
	echo '</div></td>' . "\r\n" . '    <td><div class="signin_button"  onmouseover="wsug(event, \'';
	echo $row['upgrade_time_index'];
	echo '\')" onmouseout="wsug(event, 0)">';
	echo $row[upgrade_type_index];
	echo '</div></td>' . "\r\n\t" . '<td>';
	echo $row[contact_who];
	echo '    </td>' . "\r\n\t" . '<td><div class="signin_button"  onmouseover="wsug(event, \'';
	echo $row['ip2area'] == 'wap' ? '手机端' : $row['ip2area'];
	echo '\')" onmouseout="wsug(event, 0)"><i style="color:#585858">';
	echo $row['ip2area'] == 'wap' ? '手机端' : $row['ip'];
	echo '</i></div>' . "\r\n" . '    </td>' . "\r\n\t" . '<td><div class="signin_button"  onmouseover="wsug(event, \'发布时间：';
	echo GetTime($row['begintime']);
	echo '\')" onmouseout="wsug(event, 0)"><font style="color:#585858">';
	echo date('m-d', $row['begintime']);
	echo '</font></div></td>' . "\r\n\t" . '<td>' . "\r\n" . '     <a href=\'?action=edit&id=';
	echo $row[id];
	echo '\'>编辑</a>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    <label for="delall"><input type="radio" value="delall" id="delall" name="do_action" class="radio">删除</label> ' . "\r\n" . '    <label for="refresh"><input type="radio" value="refresh" id="refresh" name="do_action" class="radio">刷新</label>' . "\r\n" . '    ';

foreach ($information_level as $k => $v ) {
	echo '    <label for="level';
	echo $k;
	echo '"><input type="radio" value="level.';
	echo $k;
	echo '" id="level';
	echo $k;
	echo '" name="do_action" class="radio">转为';
	echo $v;
	echo '</label> ' . "\r\n" . '    ';
}

echo '    <hr>' . "\r\n\t" . '<label for="certify_yes"><input type="radio" value="certify_yes" id="certify_yes" name="do_action" class="radio">通过认证</label> ' . "\r\n\t" . '<label for="certify_no"><input type="radio" value="certify_no" id="certify_no" name="do_action" class="radio">取消认证</label> ' . "\r\n" . '    <hr>' . "\r\n" . '    <label for="upgrade"><input type="radio" value="upgrade" id="upgrade" name="do_action" class="radio">取消/大类置顶</label> ' . "\r\n\t" . '<label for="upgrade_list"><input type="radio" value="upgrade_list" id="upgrade_list" name="do_action" class="radio">取消/小类置顶</label> ' . "\r\n" . '    <label for="upgrade_index"><input type="radio" value="upgrade_index" id="upgrade_index" name="do_action" class="radio">取消/首页置顶</label> ' . "\r\n" . '    <hr>' . "\r\n" . '    <label for="ifred"><input type="radio" value="ifred" id="ifred" name="do_action" class="radio">取消/标题套红</label> ' . "\r\n" . '    <label for="ifbold"><input type="radio" value="ifbold" id="ifbold" name="do_action" class="radio">取消/标题加粗</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

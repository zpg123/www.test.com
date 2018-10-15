<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<form action="?" method="get">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的团购活动</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">团购活动名称</td>' . "\r\n" . '    <td>&nbsp;<input name="gname" class="text" value="';
echo $gname;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">用户名(UserID)</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属分类</td>' . "\r\n" . '    <td>&nbsp;<select name="cate_id">' . "\r\n" . '    <option value="">>不限分类</option>' . "\r\n" . '    ';
echo get_groupclass_select('cate_id', $cate_id, 'no');
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属地区</td>' . "\r\n" . '    <td>&nbsp;<select name="areaid">' . "\r\n" . '    <option value="">>不限地区</option>' . "\r\n" . '    ';
echo cat_list('area', 0, $areaid);
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">&nbsp;</td>' . "\r\n" . '    <td>预览图</td>' . "\r\n" . '    <td>活动名称</td>' . "\r\n" . '    <td width="100">发起商家</td>' . "\r\n" . '    <td>发布时间</td>' . "\r\n" . '    <td>排序</td>' . "\r\n" . '    <td>报名</td>' . "\r\n" . '    <td>状态</td>' . "\r\n" . '    <td>操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($group as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'selectedids[]\' value="';
	echo $row['groupid'];
	echo '" class=\'checkbox\' id="';
	echo $row['groupid'];
	echo '"></td>' . "\r\n" . '    <td><img src="';
	echo $mymps_global['SiteUrl'] . $row['pre_picture'];
	echo '" width="60"></td>' . "\r\n" . '    <td><a href="../group.php?id=';
	echo $row[groupid];
	echo '" target="_blank">';
	echo $row['gname'];
	echo '</a></td>' . "\r\n" . '    <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[userid];
	echo '</a></td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['dateline']);
	echo '</em></td>' . "\r\n" . '    <td>';
	echo $row['displayorder'];
	echo '</td>' . "\r\n" . '    <td>&nbsp;';
	echo $row['signintotal'];
	echo '</td>' . "\r\n" . '    <td>' . "\r\n" . '    ';
	echo $glevel[$row['glevel']];
	echo '</td>' . "\r\n" . '    <td><a href="?part=edit&id=';
	echo $row[groupid];
	echo '">编辑</a></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    ';

foreach ($glevel as $k => $v ) {
	echo "\t" . '<label for="glevel';
	echo $k;
	echo '"><input type="radio" value="glevel';
	echo $k;
	echo '" id="glevel';
	echo $k;
	echo '" name="action" class="radio">转';
	echo $v;
	echo '</label> ' . "\r\n" . '    ';
}

echo '     <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '     <label for="delall"><input type="radio" value="delall" id="delall" name="action" class="radio">批量删除</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="group_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

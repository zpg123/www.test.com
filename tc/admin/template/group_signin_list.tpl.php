<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'js/calendar.js\'></script>' . "\r\n" . '<form action="?" method="get">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的报名信息</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">姓名</td>' . "\r\n" . '    <td>&nbsp;<input name="name" class="text" value="';
echo $name;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">商家用户名</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">报名时间(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="begindate" style="width:100px;" class="txt" value="';
echo $begindate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"> - <input name="enddate" style="width:100px;"  class="txt" value="';
echo $enddate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"></td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">&nbsp;</td>' . "\r\n" . '    <td>真实姓名</td>' . "\r\n" . '    <td>商家用户名</td>' . "\r\n" . '    <td>所报活动</td>' . "\r\n" . '    <td width="100">联系电话</td>' . "\r\n" . '    <td>报名时间</td>' . "\r\n" . '    <td>IP</td>' . "\r\n" . '    <td>人数</td>' . "\r\n" . '    <td>状态</td>' . "\r\n" . '    <td>操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($group as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'selectedids[]\' value="';
	echo $row['signid'];
	echo '" class=\'checkbox\' id="';
	echo $row['signid'];
	echo '"></td>' . "\r\n" . '    <td><a href="?part=view&id=';
	echo $row[signid];
	echo '">';
	echo $row['sname'];
	echo '</a></td>' . "\r\n" . '    <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[userid];
	echo '</a></td>' . "\r\n" . '    <td><a href="../group.php?id=';
	echo $row['groupid'];
	echo '" target="_blank">';
	echo $row['gname'];
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $row['tel'];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['dateline']);
	echo '</em></td>' . "\r\n" . '    <td>';
	echo $row['signinip'];
	echo '</td>' . "\r\n" . '    <td>&nbsp;';
	echo $row['totalnumber'];
	echo '</td>' . "\r\n" . '    <td>' . "\r\n" . '    ';
	echo $status[$row['status']];
	echo '</td>' . "\r\n" . '    <td><a href="?part=view&id=';
	echo $row[signid];
	echo '">详细</a></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    ';

foreach ($status as $k => $v ) {
	echo "\t" . '<label for="status';
	echo $k;
	echo '"><input type="radio" value="status';
	echo $k;
	echo '" id="status';
	echo $k;
	echo '" name="action" class="radio">转';
	echo $v;
	echo '</label> ' . "\r\n" . '    ';
}

echo '     <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '     <label for="delall"><input type="radio" value="delall" id="delall" name="action" class="radio">批量删除</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

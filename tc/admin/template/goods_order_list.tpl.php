<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'js/calendar.js\'></script>' . "\r\n" . '<form action="?" method="get">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的下单信息</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">联系人</td>' . "\r\n" . '    <td>&nbsp;<input name="oname" class="text" value="';
echo $oname;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">商家用户名</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">下单时间(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="begindate" style="width:100px;" class="txt" value="';
echo $begindate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"> - <input name="enddate" style="width:100px;"  class="txt" value="';
echo $enddate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"></td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<input name="action" value="delall" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n\t" . '<td width="50">' . "\r\n\t" . '<input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/>删?</td>' . "\r\n" . '    <td>联系人</td>' . "\r\n" . '    <td>商家用户名</td>' . "\r\n" . '    <td>下单商品</td>' . "\r\n" . '    <td width="100">联系电话</td>' . "\r\n" . '    <td>下单时间</td>' . "\r\n" . '    <td>IP</td>' . "\r\n" . '    <td>数量</td>' . "\r\n" . '    <td>操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($goods as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'selectedids[]\' value="';
	echo $row['id'];
	echo '" class=\'checkbox\' id="';
	echo $row['id'];
	echo '"></td>' . "\r\n" . '    <td>';
	echo $row['oname'];
	echo '</td>' . "\r\n" . '    <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[userid];
	echo '</a></td>' . "\r\n" . '    <td><a href="../goods.php?id=';
	echo $row['goodsid'];
	echo '" target="_blank">';
	echo $row['goodsname'];
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $row['tel'];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['dateline']);
	echo '</em></td>' . "\r\n" . '    <td>';
	echo $row['ip'];
	echo '</td>' . "\r\n" . '    <td>&nbsp;';
	echo $row['ordernum'];
	echo '</td>' . "\r\n" . '    <td><a href="?part=view&id=';
	echo $row[id];
	echo '">详细</a></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

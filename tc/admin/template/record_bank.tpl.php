<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <form name=\'form1\' method=\'post\' action=\'?do=';
echo $do;
echo '&part=';
echo $part;
echo '&type=';
echo $type;
echo '\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '  <input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '  <input name="action" type="hidden" value="delall">' . "\r\n" . '   <tbody onmouseover="addMouseEvent(this);">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="30">选择</td>' . "\r\n" . '      <td width="30">编号</td>' . "\r\n" . '   ' . "\t" . '  <td>用户名</td>' . "\r\n" . '      <td>项目</td>' . "\r\n" . '      <td>金额变化</td>' . "\r\n" . '      <td>操作时间</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($get as $v ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '      <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $v[id];
	echo '\' class=\'checkbox\' id="';
	echo $v[id];
	echo '"></td>' . "\r\n" . '      <td>';
	echo $v[id];
	echo '</td>' . "\r\n" . '      <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'Mymps会员中心\',400,110,\'/box.php?part=member&userid=';
	echo $v[userid];
	echo '\')">';
	echo $v[userid];
	echo '</a></td>' . "\r\n\t" . '  <td>';
	echo $v[subject];
	echo '</td>' . "\r\n" . '      <td>';
	echo $v[paycost];
	echo '</td>' . "\r\n" . '      <td><em>';
	echo $v[pubtime];
	echo '</em></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo "\t" . '</tbody>' . "\r\n" . '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" class="checkbox"  type="checkbox" id="checkall" onClick="CheckAll(this.form)"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '      <input type="submit" onClick="if(!confirm(\'确定要删除吗？\'))return false;" value="删除记录" class="mymps mini"/>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '  </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n\t\t" . '<li>' . "\r\n\t" . '    数据表优化可以去除数据文件中的碎片，使记录排列紧密，提高读写速度。</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="database.php?part=optimize">数据库优化</a></li>' . "\r\n\t\t\t" . '<li><a href="database.php?part=check">数据库检查</a></li>' . "\r\n\t\t\t" . '<li><a href="database.php?part=repair">数据库修复</a></li>' . "\r\n\t\t\t" . '<li><a href="data_replace.php" class="current">数据库内容替换</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '  <form action="data_replace.php" name="form1" method="post" target="stafrm" onSubmit="return CheckSubmit()">' . "\r\n" . '  ' . "\t" . '<input type=\'hidden\' name=\'part\' value=\'do_action\'>' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="2">' . "\r\n" . '        数据库内容替换：' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td bgcolor="#FFFFFF" colspan="2">' . "\r\n\t\t\t" . '程序用于批量替换数据库中某字段的内容，此操作极为危险，请小心使用。' . "\r\n" . '            </td>' . "\r\n" . '          </tr>' . "\r\n\r\n" . '          <tr id=\'datasel\' bgcolor="#ffffff">' . "\r\n" . '            <td width="15%" style="background-color:#f1f5f8;" height="66">&nbsp;选择数据表与字段：</td>' . "\r\n" . '            <td> ' . "\r\n\t\t\t" . '<table width="98%" border="0" cellspacing="0" cellpadding="0">' . "\r\n" . '                <tr>' . "\r\n" . '                  <td id="tables">' . "\r\n" . '                    ';
$mymps_tables = fetchtablelist($db_mymps);
echo '<select name=\'exptable\' id=\'exptable\' size=\'10\' style=\'width:60%\' onchange=\'ShowFields()\'>' . "\r\n";

foreach ($mymps_tables as $key => $val ) {
	echo '<option value=\'' . $val[Name] . '\'>' . $val[Name] . '</option>' . "\r\n";
}

echo '</select>' . "\r\n";
$db->Close();
echo '                  </td>' . "\r\n" . '                </tr>' . "\r\n" . '                <tr>' . "\r\n" . '                  <td height="28"> 要替换的字段：' . "\r\n" . '                    <input name="rpfield" type="text" id="rpfield" class="alltxt" />' . "\r\n" . '                  </td>' . "\r\n" . '                </tr>' . "\r\n" . '              </table></td>' . "\r\n" . '          </tr>' . "\r\n\r\n" . '          <tr bgcolor="#ffffff">' . "\r\n" . '            <td style="background-color:#f1f5f8;">&nbsp;被替换内容：</td>' . "\r\n" . '            <td><textarea name="rpstring" id="rpstring" class="alltxt" style="width:60%;height:50px"></textarea></td>' . "\r\n" . '          </tr>' . "\r\n" . '          <tr bgcolor="#ffffff">' . "\r\n" . '            <td style="background-color:#f1f5f8;">&nbsp;替换为：</td>' . "\r\n\r\n" . '            <td><textarea name="tostring" id="tostring" class="alltxt" style="width:60%;height:50px"></textarea></td>' . "\r\n" . '          </tr>' . "\r\n" . '    ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n\t\t\t" . '<td>&nbsp;</td>' . "\r\n" . '      ' . "\t\t" . '<td height="31" bgcolor="#ffffff">' . "\r\n" . '      ' . "\t\t" . '<input type="submit" name="Submit" value="开始替换数据" class="mini gray" />' . "\r\n" . '      ' . "\t" . '</td>' . "\r\n" . '    </tr>' . "\r\n\t";
include mymps_tpl('html_runbox');
echo '  </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="test_same.php?" method="get" target=\'stafrm\'>' . "\r\n" . '<input name="part" value="do_list" type="hidden">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索重复的分类信息主题</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:100px">删除选项:</td>' . "\r\n" . '    <td>&nbsp;<select name="deltype">' . "\r\n" . '    <option value="delold">保留最近的一条</option>' . "\r\n" . '    <option value="delnew" selected="selected">保留最早的一条</option>' . "\r\n" . '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">每排列出记录:</td>' . "\r\n" . '    <td>&nbsp;<input name="pagesize" type="text" class="txt" value="100">条</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#ffffff">' . "\r\n" . ' ' . "\t" . '<td>&nbsp;</td>' . "\r\n" . '    <td colspan="2">&nbsp;<input name="test_same_submit" type="submit" value="分析重复的信息主题" class="gray mini"></td>' . "\r\n" . '  </tr>' . "\r\n" . '</form>' . "\r\n";
include mymps_tpl('html_runbox');
echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

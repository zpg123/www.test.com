<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="pm.php?part=send" ';

if ($part == 'send') {
	echo 'class="current"';
}

echo '>群发短消息</a></li>' . "\r\n\t\t\t\t" . '<li><a href="pm.php?part=outbox" ';

if ($part == 'outbox') {
	echo 'class="current"';
}

echo '>已发送短消息</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>若需发送短消息至指定会员组，则指定会员一栏请留空</li>' . "\r\n" . '  <li>若须发送短消息至指定会员，则指定会员组请不要选择选项</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="pm.php?" method="post" target=\'stafrm\'>' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="4">填写短消息内容</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff" >' . "\r\n" . '        <td width="80" >会员组：</td>' . "\r\n" . '        <td><select name="group[]" size="5"  style="width:100px" multiple="multiple">' . "\r\n" . '        ';
echo member_groups();
echo '        </select><br /><br />若须发送短消息至指定会员，则不要选择会员组选项</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff" >' . "\r\n" . '        <td width="80" >指定会员：</td>' . "\r\n" . '        <td ><input name="touser" style="width:300px" class="text" type="text" value="';
echo $userid;
echo '"/> 多个会员用户名用 , 隔开</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff" >' . "\r\n" . '        <td width="80" >标题：</td>' . "\r\n" . '        <td ><input name="title" style="width:300px" class="text" type="text" value="';
echo $title;
echo '"/></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff" >' . "\r\n" . '        <td width="80" >内容：</td>' . "\r\n" . '        <td ><textarea name="content" style="width:400px; height:200px"/>';
echo $content;
echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n" . '    <tr> ' . "\r\n" . '      <td bgcolor="#f5f8ff">&nbsp;</td>' . "\r\n" . '      <td bgcolor="#f5f8ff"><input name="pm_submit" style="margin:10px;" class="mymps large" type="submit" value="提交发送"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '  ';
include mymps_tpl('html_runbox');
echo '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

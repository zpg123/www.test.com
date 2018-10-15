<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . 'label{float:left; width:180px}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=group" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>会员组类型</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=group&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加会员组</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="member.php?do=group&part=insert" onSubmit="return checkSubmit();" method="post">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">会员用户组基本设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="30">用户组名称：</td>' . "\r\n" . '    <td ><input name="levelname" type="text" class="text" size="16" style="width:200px;" value=""/></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">用户组权限设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
echo mymps_member_purview();
echo '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">其它设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">默认拥有金币数</td>' . "\r\n" . '    <td ><input name="money_own" type="text" class="txt" value=""/> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">可选择的会员模板<br />' . "\r\n" . '<font color="#006acd">（只对商家会员有效）</font></td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="allow_tpl[]" multiple="multiple" style="width:100px; height:80px">' . "\r\n" . '    ';
echo get_memtpl_options();
echo '    </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">每天至多发布信息</td>' . "\r\n" . '    <td ><input name="perday_maxpost" type="text" class="text" size="16" style="width:200px;" value=""/></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">升级到当前会员组扣除金币<br /><font color="red">(您至少要选择启用一个升级期限)</font></td>' . "\r\n" . '    <td >' . "\r\n" . '    ';

foreach (array('month' => '一个月', 'halfyear' => '半年', 'year' => '一年', 'forever' => '永久') as $k => $v ) {
	echo '    <div style="width:100%; margin:5px auto; line-height:25px">' . "\r\n" . '<input name="settings[ifopen][';
	echo $k;
	echo ']" type="checkbox" class="checkbox" value="1" checked="checked">启用 <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <input name="settings[money][';
	echo $k;
	echo ']" class="txt" value=""> ';
	echo $v;
	echo '    </div>' . "\r\n" . '    ';
}

echo '</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">会员的联系方式显示<br />' . "\r\n" . '<font color="#006acd">（只对商家会员有效）</font></td>' . "\r\n" . '    <td><select name="member_contact">' . "\r\n" . '    ' . "\t" . '<option value="0">显示为网站的联系方式</option>' . "\r\n" . '        <option value="1">显示为会员自己的联系方式</option>' . "\r\n" . '        </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="60">&nbsp;</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input type="submit" name="Submit" class="mymps mini" value="确认提交"/>' . "\r\n" . '    　<input type="button" onClick=history.back() class="mymps mini" value="返 回">           </td>' . "\r\n" . '  </tr>  ' . "\r\n" . '    </form>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

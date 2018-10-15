<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . 'label{float:left; display:block; height:20px;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="member.php?do=group&part=update" onSubmit="return checkSubmit();" method="post">' . "\r\n" . '<input type="hidden" name="id" value="';
echo $group[id];
echo '">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">会员用户组基本设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="80" height="30">用户组名称：</td>' . "\r\n" . '    <td ><input name="levelname" type="text" class="text" id="levelname" size="16" style="width:200px;" value="';
echo $group[levelname];
echo '" /></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">用户组权限设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
echo mymps_member_purview($purviews);
echo '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">其它设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';

if ($id == '1') {
	echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">默认拥有金币数</td>' . "\r\n" . '    <td ><input name="money_own" type="text" class="txt" value="';
	echo $group['money_own'];
	echo '"/> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
}

echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">可选择的会员模板<br />' . "\r\n" . '<font color="#006acd">（只对商家会员有效）</font></td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="allow_tpl[]" multiple="multiple" style="width:100px; height:80px">' . "\r\n" . '    ';
echo get_memtpl_options($group['allow_tpl']);
echo '    </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">每天至多发布信息</td>' . "\r\n" . '    <td ><input name="perday_maxpost" type="text" class="text" size="16" style="width:200px;" value="';
echo $group['perday_maxpost'];
echo '"/></td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';

if (1 < $group['id']) {
	echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">升级到当前会员组扣除金币<br /><font color="red">(您至少要选择启用一个升级期限)</font></td>' . "\r\n" . '    <td >' . "\r\n" . '    ';

	foreach (array('month' => '一个月', 'halfyear' => '半年', 'year' => '一年', 'forever' => '永久') as $k => $v ) {
		echo '    <div style="width:100%; margin:5px auto; line-height:25px">' . "\r\n" . '<input name="settings[ifopen][';
		echo $k;
		echo ']" type="checkbox" class="checkbox" value="1" ';

		if ($settings['ifopen'][$k] == 1) {
			echo 'checked="checked"';
		}

		echo '>启用 <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <input name="settings[money][';
		echo $k;
		echo ']" class="txt" value="';
		echo $settings['money'][$k];
		echo '"> ';
		echo $v;
		echo '    </div>' . "\r\n" . '    ';
	}

	echo '   </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
}

echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">会员的联系方式显示<br />' . "\r\n" . '<font color="#006acd">（只对商家会员有效）</font></td>' . "\r\n" . '    <td><select name="member_contact">' . "\r\n" . '    ' . "\t" . '<option value="0" ';

if ($group['member_contact'] == 0) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>显示为网站的联系方式</option>' . "\r\n" . '        <option value="1" ';

if ($group['member_contact'] == 1) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>显示为会员自己的联系方式</option>' . "\r\n" . '        </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="60">&nbsp;</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input type="submit" name="Submit" class="mymps mini" value="确认提交"/>' . "\r\n" . '    　<input type="button" onClick=history.back() class="mymps mini" value="返 回">           </td>' . "\r\n" . '  </tr>  ' . "\r\n" . '    </form>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n" . 'function checkSubmit()' . "\r\n" . '{' . "\r\n\t" . ' if(document.form1.userid.value==""){' . "\r\n\t" . '     alert("用户名不能为空！");' . "\r\n\t" . '     document.form1.userid.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                ';

if ($part == 'add') {
	echo '                <li><a href="?part=add" ';

	if (!$if_corp) {
		echo 'class="current"';
	}

	echo '>增加个人会员</a></li>' . "\r\n" . '                <li><a href="?part=add&if_corp=1" ';

	if ($if_corp == 1) {
		echo 'class="current"';
	}

	echo '>增加商家会员</a></li>' . "\r\n" . '                ';
}
else {
	echo '                <li><a href="?if_corp=0" ';

	if (!$if_corp) {
		echo 'class="current"';
	}

	echo '>个人会员</a></li>' . "\r\n" . '                <li><a href="?if_corp=1" ';

	if ($if_corp == 1) {
		echo 'class="current"';
	}

	echo '>商家会员</a></li>' . "\r\n" . '                ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<div style="display:none;">' . "\r\n" . '<iframe width=0 height=0 src=\'\' id="iframe_area" name="iframe_area"></iframe> ' . "\r\n" . '<iframe width=0 height=0 src=\'\' id="iframe_street" name="iframe_street"></iframe> ' . "\r\n" . '<form method="post" target="iframe_area" id="form_area"></form>' . "\r\n" . '</div>' . "\r\n" . '<form name="form1" action="member.php?do=member&part=';
echo $action;
echo '" method="post" onSubmit="return checkSubmit();">' . "\r\n";

if ($part == 'edit') {
	echo '<input type="hidden" name="id" value="';
	echo $id;
	echo '" />' . "\r\n" . '<input type="hidden" name="if_corp" value="1" />' . "\r\n";
}

echo '<input name="reg_corp" value="1" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '<tr class="firstr">' . "\r\n\t\t" . '<td colspan="2">帐号信息</td>' . "\r\n\t" . '</tr>' . "\r\n" . '     <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">用户帐号：</td>' . "\r\n" . '      <td><input name="userid" type="text" class="text" value="';
echo $edit[userid];
echo '"/> ';

if ($edit) {
	echo '【非必要，请勿修改<font color="red"><b>特别是整合其他系统（如：ucenter）之后</b></font>】';
}

echo '</td>' . "\r\n" . '     </tr>' . "\r\n" . '      <tr bgcolor="#ffffff">' . "\r\n" . '        <td width="16%" height="30">用户姓名：</td>' . "\r\n" . '        <td width="84%">' . "\r\n" . '        <input name="cname" type="text" class="text" value="';
echo $edit[cname];
echo '"/>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td height="30">电子邮箱：</td>' . "\r\n" . '        <td>' . "\r\n" . '            <input name="email" type="text" class="text" value="';
echo $edit[email];
echo '"/>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '            <td height="30">所在用户组</td>' . "\r\n" . '            <td>' . "\r\n\t\t\t\t";
echo get_member_level($edit[levelid]);
echo '                【<a href="member.php?do=group">设置用户组权限</a>】' . "\r\n\t\t" . '    </td>' . "\r\n" . '        </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">登录密码：</td>' . "\r\n" . '      <td><input name="userpwd" type="text" class="text" /> ';

if ($part == 'edit') {
	echo '【若不修改请留空】';
}

echo '</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td height="30" colspan="2">联系方式</td>' . "\r\n" . '    </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td>所属地区</td>' . "\r\n" . '    <td>' . "\r\n\t\t" . '<select name="areaid">' . "\r\n" . '            ';
echo cat_list('area', 0, $edit[areaid]);
echo '            </select>' . "\r\n\t" . '</td>' . "\r\n" . '  </tr>' . "\r\n" . '     <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">联系人性别：</td>' . "\r\n" . '      <td><select name="sex">' . "\r\n" . '        ';
echo get_sex_option($edit['sex']);
echo '        </select></td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">固定电话：</td>' . "\r\n" . '      <td><input name="tel" type="text" class="text" value="';
echo $edit[tel];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">移动电话：</td>' . "\r\n" . '      <td><input name="mobile" type="text" class="text" value="';
echo $edit[mobile];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">QQ号码：</td>' . "\r\n" . '      <td><input name="qq" type="text" class="text" value="';
echo $edit[qq];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">MSN：</td>' . "\r\n" . '      <td><input name="msn" type="text" class="text" value="';
echo $edit[msn];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">机构网址：</td>' . "\r\n" . '      <td><input name="web" type="text" class="text" value="';
echo $edit[web];
echo '"/> 请以 http:// 开始</td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">详细地址：</td>' . "\r\n" . '      <td><input name="address" type="text" class="text" value="';
echo $edit[address];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">乘车路线：</td>' . "\r\n" . '      <td>' . "\r\n" . '      <textarea name="busway" style="height:100px; width:300px">';
echo $edit[busway];
echo '</textarea></td>' . "\r\n" . '     </tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">地图标注：</td>' . "\r\n" . '      <td><input id=\'mappoint\' name=\'mappoint\' type=\'text\' maxLength=\'50\' value="';
echo $edit['mappoint'];
echo '" class="text"> <input type="button" class="gray mini" value="我要标注" onclick="javascript:setbg(\'地图标注\',500,300,\'../map.php?action=markpoint&width=500&height=300\')" />' . "\r\n\t" . '  </td>' . "\r\n\t" . ' </tr>' . "\r\n\t" . '<tr class="firstr">' . "\r\n\t" . '  <td height="30" colspan="2">其它信息</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">个人身份证认证：</td>' . "\r\n" . '      <td>' . "\r\n" . '      <select name="per_certify">' . "\r\n" . '      ' . "\t" . '<option value="1" ';

if ($edit['per_certify'] == 1) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>通过验证</option>' . "\r\n" . '        <option value="0" ';

if (empty($edit['per_certify'])) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>未通过验证</option>' . "\r\n" . '      </select></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">营业执照认证：</td>' . "\r\n" . '      <td>' . "\r\n" . '      <select name="com_certify">' . "\r\n" . '      ' . "\t" . '<option value="1" ';

if ($edit['com_certify'] == 1) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>通过验证</option>' . "\r\n" . '        <option value="0" ';

if (empty($edit['com_certify'])) {
	echo 'selected style="background-color:#6EB00C;color:white"';
}

echo '>未通过验证</option>' . "\r\n" . '      </select></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">拥有金币：</td>' . "\r\n" . '      <td><input name="money_own" type="text" class="txt" value="';
echo $edit[money_own];
echo '"/> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">积分：</td>' . "\r\n" . '      <td><input name="score" type="text" class="txt" value="';
echo $edit[score];
echo '"/></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">信用值：</td>' . "\r\n" . '      <td><input name="credit" type="text" class="txt" value="';
echo $edit[credit];
echo '"/> ' . "\r\n\t" . '  ';

if ($edit[credits]) {
	echo "\t" . '  <img src="../images/credit/';
	echo $edit[credits];
	echo '.gif" align="absmiddle">' . "\r\n\t" . '  ';
}

echo "\t" . '  </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr class="firstr">' . "\r\n\t\t" . '<td colspan="2">网店信息</td>' . "\r\n\t" . '</tr>' . "\r\n" . ' ' . "\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td height="30">商家/机构名称：</td>' . "\r\n" . '      <td><input name="tname" type="text" class="text" value="';
echo $edit[tname];
echo '"/> </td>' . "\r\n" . '     </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td height="30">商家/机构类型：</td>' . "\r\n" . '        <td>' . "\r\n" . '            ';
echo get_member_cat(explode(',', $edit[catid]));
echo '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n\t\t" . '<td>空间使用模板</td>' . "\r\n\t\t" . '<td>' . "\r\n\t\t" . '<select name="template">' . "\r\n\t\t";
echo get_shop_tpl($edit['template'], $edit['userid']);
echo "\t\t" . '</select>' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n\t" . '<tr class="firstr">' . "\r\n\t\t" . '<td colspan="2">商家/机构简介：</td>' . "\r\n\t" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">' . "\r\n\t";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" class="mymps mini" value="提 交">' . "\r\n" . '                　<input type="button" onClick="location.href=\'member.php?if_corp=1\'"  class="mymps mini" value="返 回"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

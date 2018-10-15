<?php

include mymps_tpl('inc_head_jq');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../include/datepicker/datepicker.js"></script>' . "\r\n" . '<link rel="stylesheet" href="../include/datepicker/ui.css">' . "\r\n" . '<script language=\'javascript\'>' . "\r\n" . '$(function(){' . "\r\n\t" . '$("#datepicker1").datepicker();' . "\r\n\t" . '$("#datepicker2").datepicker();' . "\r\n\t" . '$("#datepicker3").datepicker();' . "\r\n\t" . '$("#datepicker4").datepicker();' . "\r\n" . '});' . "\r\n" . '</script>' . "\r\n" . '<script language="javascript" src="js/vbm.js"></script>' . "\r\n\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="member.php?if_corp=0" ';

if ($if_corp == '0') {
	echo 'class="current"';
}

echo '>个人会员</a></li>' . "\r\n\t\t\t\t" . '<li><a href="member.php?if_corp=1" ';

if ($if_corp == '1') {
	echo 'class="current"';
}

echo '>商家会员</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<div class="clear"></div>' . "\r\n" . '<form action="member.php" method="get">' . "\r\n" . '<input type=\'hidden\' name=\'part\' value=\'default\'/>' . "\r\n" . '<input name="if_corp" value="';
echo $if_corp;
echo '" type="hidden" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="4">搜索符合条件的';
echo $if_corp == '0' ? '个人会员' : '商家会员';
echo ' <label for="moreoptions"><input name="moreoptions" value="yes" type="checkbox" class="checkbox" onclick="blocknone(\'showtbody\');" id="moreoptions" ';

if ($moreoptions == 'yes') {
	echo 'checked';
}

echo '>全部条件</label></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:25%">用户名(UserID)</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '     <td style="background-color:#f1f5f8; width:25%">';
echo $if_corp == '1' ? '商家名称' : '用户姓名';
echo '</td>' . "\r\n" . '    <td>&nbsp;<input name="tname" class="text" value="';
echo $tname;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">所属用户组</td>' . "\r\n" . '    <td>&nbsp;';
echo get_member_level($levelid);
echo '</td>' . "\r\n" . '    <td style="background-color:#f1f5f8;">所属地区</td>' . "\r\n" . '    <td>&nbsp;<select name="areaid">' . "\r\n" . '    <option value="">>不限地区</option>' . "\r\n" . '    ';
echo cat_list('area', 0, $areaid);
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n";

if ($if_corp == '1') {
	echo '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">所在分类</td>' . "\r\n" . '    <td>&nbsp;';
	echo get_member_cat($catid, false);
	echo '</td>' . "\r\n" . '    <td style="background-color:#f1f5f8;">是否推荐显示</td>' . "\r\n" . '    <td>&nbsp;<select name="tuijian">' . "\r\n" . '    <option value="all" ';

	if ($tuijian == 'all') {
		echo 'selected="selected"';
	}

	echo '>全部商家</option>' . "\r\n\t" . '<option value="index" ';

	if ($tuijian == 'index') {
		echo 'selected="selected"';
	}

	echo '>首页推荐商家</option>' . "\r\n\t" . '<option value="list" ';

	if ($tuijian == 'list') {
		echo 'selected="selected"';
	}

	echo '>店铺列表页推荐商家</option>' . "\r\n" . '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
}

echo '  </tr>' . "\r\n" . '  <tbody id="showtbody" ';

if ($moreoptions != 'yes') {
	echo 'style="display:none"';
}

echo '>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">金币 低于:</td>' . "\r\n" . '    <td>&nbsp;<input name="moneylower" class="txt" value="';
echo $moneylower;
echo '"> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"></td>' . "\r\n" . '    <td style="background-color:#f1f5f8" width="25%">金币 高于:</td>' . "\r\n" . '    <td>&nbsp;<input name="moneyhigher" class="txt" value="';
echo $moneyhigher;
echo '"> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">注册IP开头 (通配符 "*" 如 "127.0.*.*"(不含引号)):</td>' . "\r\n" . '    <td>&nbsp;<input name="regip" class="text" value="';
echo $regip;
echo '"></td>' . "\r\n" . '    <td style="background-color:#f1f5f8">上次访问IP开头 (通配符 "*" 如 "127.0.*.*"(不含引号)):</td>' . "\r\n" . '    <td>&nbsp;<input name="lastip" class="text" value="';
echo $lastip;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">注册日期早于(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="regdatebefore" style="width:100px;" class="text" value="';
echo $regdatebefore;
echo '"  id="datepicker1"></td>' . "\r\n" . '  ' . "\t" . '<td style="background-color:#f1f5f8">注册日期晚于(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="regdateafter" style="width:100px;" class="text" value="';
echo $regdateafter;
echo '"  id="datepicker2"></td>' . "\r\n" . '  ' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">最后访问时间早于(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="lastvisitbefore" style="width:100px;" class="text" value="';
echo $lastvisitbefore;
echo '"  id="datepicker3"></td>' . "\r\n\t" . '<td style="background-color:#f1f5f8">最后访问时间晚于(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="lastvisitafter" style="width:100px;"  class="text" value="';
echo $lastvisitafter;
echo '"  id="datepicker4"></td>' . "\r\n" . '  ' . "\r\n" . '  </tr>' . "\r\n" . '  </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="搜 索" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<div class="clear"></div>' . "\r\n\r\n" . '<form name=\'form1\' method=\'post\' action=\'member.php\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '<input type=\'hidden\' name=\'part\' value=\'default\'/>' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="30">选择</td>' . "\r\n" . '      <td width="30">编号</td>' . "\r\n" . '      <td>用户名</td>' . "\r\n" . '      ';

if ($if_corp == 1) {
	echo '<td>机构名称</td>';
}

echo '      <td width="100">认证情况</td>' . "\r\n" . '      <td width="100">用户组</td>' . "\r\n" . '      <td width="100">注册地IP</td>' . "\r\n" . '      <td>注册时间</td>' . "\r\n" . '      <td>上次登录</td>' . "\r\n" . '      <td width="60">操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($member as $member ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '      <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $member[id];
	echo '\' class=\'checkbox\' id="';
	echo $member[id];
	echo '" ';

	if ($userid) {
		echo ' checked ';
	}

	echo '></td>' . "\r\n" . '      <td>';
	echo $member[id];
	echo '</td>' . "\r\n\t" . '  <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $member[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $member[userid];
	echo '</a></td>' . "\r\n\t" . '  ';

	if ($if_corp == 1) {
		echo '<td>';
		if (($member['if_corp'] == 1) && ($member['ifindex'] == 2)) {
			echo '[<a href="?ifindex=2&if_corp=1" style="color:red" title="首页推荐">首页</a>] ';
		}

		if (($member['if_corp'] == 1) && ($member['iflist'] == 2)) {
			echo '[<a href="?iflist=2&if_corp=1" style="color:#ff6600" title="列表推荐">列表</a>] ';
		}

		echo '<font color="#000">';
		echo $member[tname];
		echo '</font></td>';
	}

	echo '      <td>' . "\r\n\t" . '  ';

	if ($member['per_certify'] == 1) {
		echo '<img src="../images/person1.gif" align="absmiddle" title="已通过身份证认证"/>';
	}
	else {
		echo '<img src="../images/person0.gif" align="absmiddle" title="未通过身份证认证"/>';
	}

	echo "\t" . '  ';

	if ($if_corp == 1) {
		if ($member['com_certify'] == 1) {
			echo '<img src="../images/company1.gif" align="absmiddle" title="已通过营业执照证认证"/>';
		}
		else {
			echo '<img src="../images/company0.gif" align="absmiddle" title="未通过营业执照认证"/>';
		}
	}

	echo '</td>' . "\r\n" . '      <td>';
	echo $member[levelname];

	if (!empty($member['levelup_time'])) {
		echo '<br /><em style=color:red>截至' . date('Y-m-d', $member['levelup_time']) . '</em>';
	}

	echo '</td>' . "\r\n" . '      <td><a href="' . "\r\n" . 'javascript:setbg(\'查看IP所在地\',400,110,\'../box.php?part=iptoarea&ip=';
	echo $member[joinip];
	echo '&admindir=';
	echo $admindir;
	echo '\')" title="点击查看注册地">';
	echo $member[joinip] == 'wap' ? '手机端' : $member[joinip];
	echo '</a></td>' . "\r\n" . '      <td><em>';
	echo GetTime($member[jointime]);
	echo '</em></td>' . "\r\n" . '      <td><em>';
	echo GetTime($member[logintime]);
	echo '</em></td>' . "\r\n" . '      <td><a href="member.php?part=edit&id=';
	echo $member[id];
	echo '">编辑</a> | <a href="member.php?part=pay&id=';
	echo $member[id];
	echo '">充值</a></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    <label for="delall">' . "\r\n\t" . '<b>转为-></b> <label for="status"><input name="do_action" class="radio" id="status" value="status" type="radio">待审核</label> | ';
echo get_member_level_label();
echo ' | ';

if ($if_corp == '1') {
	echo '<label for="person"><input name="do_action" class="radio" id="person" value="person" type="radio">个人会员</label>';
}
else {
	echo '<label for="corp"><input name="do_action" class="radio" id="corp" value="corp" type="radio">商家会员</label>';
}

echo "\t" . '  <hr><b>通过-></b>' . "\r\n\t" . '  <label for="per_certify"><input type="radio" id="per_certify" value="per_certify" name="do_action">身份证认证</label> <label for="com_certify"><input type="radio" id="com_certify" value="com_certify" name="do_action">营业执照认证</label>' . "\r\n" . '      <hr>' . "\r\n" . '      <b>删除-></b> <label for="delall"><input type="radio" value="delall" id="delall" name="do_action" class="radio">该会员以及他的全部信息</label>';

if ($if_corp == '1') {
	echo ' | <label for="delinfo"><input type="radio" value="delinfo" id="delinfo" name="do_action" class="radio">分类信息</label> <label for="deldoc"><input type="radio" value="deldoc" id="deldoc" name="do_action" class="radio">空间文档</label> <label for="delalbum"><input type="radio" value="delalbum" id="delalbum" name="do_action" class="radio">相册</label> <label for="delcomment"><input type="radio" value="delcomment" id="delcomment" name="do_action" class="radio">网友点评</label>';
}

echo ' <label for="delpm"><input type="radio" value="delpm" id="delpm" name="do_action" class="radio">短消息</label>' . "\r\n\t" . '  ';

if ($if_corp == 1) {
	echo "\t" . '  <hr>' . "\r\n\t" . '  <b>显示在-></b>' . "\r\n\t" . '  <label for="ifindex2"><input name="do_action" value="ifindex2" id="ifindex2" type="radio">首页推荐</label>' . "\r\n\t" . '  <label for="ifindex1"><input name="do_action" value="ifindex1" id="ifindex1" type="radio">去除首页推荐</label>' . "\r\n\t" . '  |' . "\r\n\t" . '  <label for="iflist2"><input name="do_action" value="iflist2" id="iflist2" type="radio">店铺列表推荐</label>' . "\r\n\t" . '  <label for="iflist1"><input name="do_action" value="iflist1" id="iflist1" type="radio">去除列表推荐</label>' . "\r\n\t" . '  ';
}

echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

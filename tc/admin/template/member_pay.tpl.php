<?php

include mymps_tpl('inc_head');
echo "\r\n" . '<form name="form1" action="member.php?do=member&part=payupdate" method="post">' . "\r\n" . '<input name="userid" type="hidden" value="';
echo $row['userid'];
echo '"/>' . "\r\n" . '<input name="id" type="hidden" value="';
echo $id;
echo '"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '<tr class="firstr">' . "\r\n" . '    ' . "\t" . '<td colspan="2">' . "\r\n" . '        给';
echo $row['userid'];
echo '充值金币' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '        <td class="altbg1" style="width:30%">用户编号：</td>' . "\r\n" . '        <td>' . "\r\n" . '            <b>';
echo $id;
echo '</b>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td class="altbg1">用户名：</td>' . "\r\n" . '        <td>' . "\r\n" . '            <b>';
echo $row['userid'];
echo '</b>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

if ($row['tname']) {
	echo '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td class="altbg1">机构名：</td>' . "\r\n" . '        <td>' . "\r\n" . '            <b>';
	echo $row['tname'];
	echo '</b>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td class="altbg1">当前余额：</td>' . "\r\n" . '        <td>' . "\r\n" . '           <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <b>';
echo $row['money_own'];
echo '</b>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td class="altbg1">充值金币数(请填写整数)：</td>' . "\r\n" . '        <td>' . "\r\n" . '            <input name="paymoney" type="text" class="txt"/>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" class="mymps mini" value="提 交">' . "\r\n" . '<input type="button" onClick="location.href=\'member.php?if_corp=';
echo $row['if_corp'];
echo '\'"  class="mymps mini" value="返 回"></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '<tr class="firstr">' . "\r\n" . '    <td colspan="7">' . "\r\n" . '    ';
echo $row['userid'];
echo '的充值记录' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="font-weight:bold;">' . "\r\n" . '      <td>订单号</td>' . "\r\n" . '      <td>汇款者</td>' . "\r\n" . '      <td>金额</td>' . "\r\n" . '      <td>汇款时间</td>' . "\r\n" . '      <td>汇款IP</td>' . "\r\n" . '      <td>备注</td>' . "\r\n" . '      <td>接口</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

if (!empty($list)) {
	foreach ($list as $list ) {
		echo '    <tr bgcolor="white">' . "\r\n" . '        <td>';
		echo $list[orderid];
		echo '</td>' . "\r\n" . '        <td><a href="javascript:void(0);" onclick="setbg(\'';
		echo MPS_SOFTNAME;
		echo '会员中心\',400,110,\'../box.php?part=member&userid=';
		echo $list[userid];
		echo '&admindir=';
		echo $admindir;
		echo '\')">';
		echo $list[userid];
		echo '</a></td>' . "\r\n" . '        <td><em><font color="red">';
		echo $list[money];
		echo '</font></em></td>' . "\r\n" . '        <td>';
		echo GetTime($list[posttime]);
		echo '</td>' . "\r\n" . '        <td align="left">';
		echo $list[payip];
		echo '</td>' . "\r\n" . '        <td align="left">';
		echo $list[paybz];
		echo '</td>' . "\r\n" . '        <td align="left">';
		echo $list[type];
		echo '</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
	}
}
else {
	echo '    <tr bgcolor="white">' . "\r\n" . '    ' . "\t" . '<td colspan="7">该用户暂无充值记录！</td>' . "\r\n" . '    </tr>' . "\r\n\t";
}

echo "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

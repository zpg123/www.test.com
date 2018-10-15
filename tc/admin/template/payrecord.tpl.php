<?php

include mymps_tpl('inc_head_jq');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../include/datepicker/datepicker.js"></script>' . "\r\n" . '<link rel="stylesheet" href="../include/datepicker/ui.css">' . "\r\n" . '<script language=\'javascript\'>' . "\r\n" . '$(function(){' . "\r\n\t" . '$("#datepicker1").datepicker();' . "\r\n\t" . '$("#datepicker2").datepicker();' . "\r\n" . '});' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">详细搜索</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '    ' . "\t" . '<form action="payrecord.php" method="get">' . "\r\n" . '        <input name="url" value="';
echo GetUrl();
echo '" type="hidden" />' . "\r\n\t\t" . '时间从<input style="width:80px;" id="datepicker1" name="starttime" type="text" class="text" value="';
echo GetTime($rstarttime, 'Y-m-d');
echo '"> - <input id="datepicker2" style="width:80px;" name="endtime" type="text" class="text" value="';
echo GetTime($rendtime, 'Y-m-d');
echo '"> ' . "\r\n\t\t" . '关键字 <input name="keywords" type="text" class="text" value="';
echo $keywords;
echo '">    ' . "\r\n" . '        <select name="action" id="action">' . "\r\n" . '            <option value="1" ';

if ($action == '1') {
	echo 'selected';
}

echo '>订单号</option>' . "\r\n" . '            <option value="2" ';

if ($action == '2') {
	echo 'selected';
}

echo '>汇款者</option>' . "\r\n" . '            <option value="3" ';

if ($action == '3') {
	echo 'selected';
}

echo '>汇款IP</option>' . "\r\n\t\t\t" . '<option value="4" ';

if ($action == '4') {
	echo 'selected';
}

echo '>备注</option>' . "\r\n" . '          </select> ' . "\r\n\t\t" . '<input name=submit1 type=submit id="submit12" value=搜索 class="gray">' . "\r\n" . '         </form>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr style="font-weight:bold; background-color:#dff6ff">' . "\r\n" . '    <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>订单号</td>' . "\r\n" . '      <td>用户</td>' . "\r\n" . '      <td>金额</td>' . "\r\n" . '      <td>汇款时间</td>' . "\r\n" . '      <td>汇款IP</td>' . "\r\n" . '      <td>备注</td>' . "\r\n" . '      <td>接口</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
$list = (is_array($list) ? $list : array());

foreach ($list as $list ) {
	echo '    <tr bgcolor="white">' . "\r\n" . '        <td><input type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $list[id];
	echo '\' class=\'checkbox\' id="';
	echo $list[id];
	echo '"></td>' . "\r\n" . '        <td>';
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
	echo '</td>' . "\r\n" . '        <td align="left"';

	if ($list[paybz] == '等待支付') {
		echo 'style="color:red;"';
	}
	else {
		echo 'style="color:green;"';
	}

	echo '>';
	echo $list[paybz];
	echo '</td>' . "\r\n" . '        <td align="left">' . "\r\n\t\t";

	switch ($list[type]) {
	case 'alipay':
		echo '支付宝';
		break;

	case 'alipay_h5':
		echo '支付宝手机版';
		break;

	case 'wxpay':
		echo '微信支付';
		break;

	case 'tenpay':
		echo '财付通';
		break;

	case 'chinabank':
		echo '京东钱包';
		break;

	default:
		echo '<font color=red>' . $list['type'] . '</font>';
		break;
	}

	echo '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/><div class="clear"></div></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

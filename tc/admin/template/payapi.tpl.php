<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr style="font-weight:bold; background-color:#dff6ff">' . "\r\n" . '      <td style="width:15%">接口名称</td>' . "\r\n" . '      <td style="width:40%">接口描述</td>' . "\r\n" . '      <td>开启状态</td>' . "\r\n" . '      <td>接口类型</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($payapi as $k => $value ) {
	echo '        <tr bgcolor="#ffffff">' . "\r\n" . '          <td><b>';
	echo $value[payname];
	echo '</b></td>' . "\r\n" . '          <td><em>';
	echo $value[paysay];
	echo '</em></td>' . "\r\n" . '          <td>';
	echo $value[isclose] == '0' ? '<font color=green>开启</font>' : '<font color=red>关闭</font>';
	echo '</td>' . "\r\n" . '          <td>';
	echo $value[paytype];
	echo '</td>' . "\r\n" . '          <td><a href="?payid=';
	echo $value[payid];
	echo '">详情</a></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '</table>' . "\r\n" . '</div>' . "\r\n";

if (!empty($payid)) {
	echo '<form action="?" method="post">' . "\r\n" . '<input type="hidden" name="payid" value="';
	echo $payid;
	echo '">' . "\r\n" . '<input name="return_url" value="';
	echo GetUrl();
	echo '" type="hidden" />' . "\r\n" . '<div id="';
	echo MPS_SOFTNAME;
	echo '" style="margin-top:10px; clear:both">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">配置支付接口</td>' . "\r\n" . '</tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">接口类型：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="paytype" value="';
	echo $paydetail[paytype];
	echo '" readonly class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';

	if ($paydetail[paytype] == 'alipay') {
		echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">收款类型：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <label for="r1"><input type="radio" name="buytype" value="1" id="r1" ';

		if ($paydetail[buytype] == 1) {
			echo 'checked';
		}

		echo '>即时到帐收款</label>' . "\r\n\t" . '<label for="r3"><input type="radio" name="buytype" value="3" id="r3" ';

		if ($paydetail[buytype] == 3) {
			echo 'checked';
		}

		echo '>担保交易收款</label>' . "\r\n" . '    <label for="r2"><input type="radio" name="buytype" value="2" id="r2" ';

		if ($paydetail[buytype] == 2) {
			echo 'checked';
		}

		echo '>双功能收款</label>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
	}

	echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">接口名称：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="payname" value="';
	echo $paydetail[payname];
	echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
	if (($paydetail['paytype'] == 'alipay') || ($paydetail['paytype'] == 'alipay_h5')) {
		echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">参数一：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="payemail" value="';
		echo $paydetail[payemail];
		echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
	}

	if ($paydetail['paytype'] == 'wxpay') {
		echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">参数一：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="appid" value="';
		echo $paydetail[appid];
		echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">参数二：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="appkey" value="';
		echo $paydetail[appkey];
		echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
	}

	echo '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">';
	if (($paydetail['paytype'] == 'alipay') || ($paydetail['paytype'] == 'alipay_h5')) {
		echo '参数二';
	}
	else if ($paydetail['paytype'] == 'wxpay') {
		echo '参数三';
	}
	else {
		echo '参数一';
	}

	echo '：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="payuser" value="';
	echo $paydetail[payuser];
	echo '" class="text"/> ' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">';
	if (($paydetail['paytype'] == 'alipay') || ($paydetail['paytype'] == 'alipay_h5')) {
		echo '参数三';
	}
	else if ($paydetail['paytype'] == 'wxpay') {
		echo '参数四';
	}
	else {
		echo '参数二';
	}

	echo '：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input name="paykey" value="';
	echo $paydetail[paykey];
	echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">接口状态：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <label for="0"><input name="isclose" type="radio" value="0" class="radio" id="0" ';

	if ($paydetail['isclose'] == '0') {
		echo 'checked';
	}

	echo '/>开启</label>' . "\r\n" . '    <label for="1"><input name="isclose" type="radio" value="1" class="radio" id="1" ';

	if ($paydetail['isclose'] == '1') {
		echo 'checked';
	}

	echo '/>关闭</label>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="15%" height="25">接口描述：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <textarea name="paysay" style="width:320px; height:100px">' . "\r\n" . '    ';
	echo clear_html($paydetail[paysay]);
	echo '    </textarea>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="';
	echo CURSCRIPT;
	echo '_submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '  </form>' . "\r\n";
}

mymps_admin_tpl_global_foot();

?>

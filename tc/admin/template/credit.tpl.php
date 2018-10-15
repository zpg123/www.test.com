<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t" . '<li><a href="score.php">积分增减设置</a></li>' . "\r\n\t\t" . '<li><a href="credit.php" class="current">信用值增减设置</a></li>' . "\r\n\t\t" . '<li><a href="credit_set.php">信用等级管理</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>扣除请在前面加“-”，如扣除1点信用值请填写“-1” </li>' . "\r\n" . ' <li>增加请在前面加“+”，如增加1点信用值请填写“+1” </li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">信用值被动设置</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">通过营业执照认证，信用值变化</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="credit_new[rank][com_certify]" value="';
echo $credit[rank]['com_certify'];
echo '" class="txt"/> <i> 初始值:<font color="red">+50</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">通过身份证认证，信用值变化</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="credit_new[rank][per_certify]" value="';
echo $credit[rank]['per_certify'];
echo '" class="txt"/> <i> 初始值:<font color="red">+50</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">信用值主动设置</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">消费1个金币，信用值变化</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="credit_new[rank][coin_credit]" value="';
echo $credit[rank]['coin_credit'];
echo '" class="txt"/> <i> 初始值:<font color="red">+10</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="seoset_submit" value="提 交" class="mymps large" type="submit"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

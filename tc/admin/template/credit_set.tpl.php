<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="score.php">积分增减设置</a></li>' . "\r\n\t\t\t" . '<li><a href="credit.php">信用值增减设置</a></li>' . "\r\n\t\t\t" . '<li><a href="credit_set.php" class="current">信用等级管理</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' ' . "\t\t" . '<li>您可以修改 /images/credit 目录下的图片，设计适合自己站点风格的图标</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="margin-top:10px;">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">实时更新会员信用值缓存</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li><input type="button" class="gray mini" onclick="location.href=\'?ac=update_credits\';this.disabled=\'true\'" value="更新会员信用图标"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="color:#333">' . "\r\n\t\t\t" . '1，在您修改了以下信用度设置后，网站的会员信用等级图标不会立即应用，须点击“更新会员信用图标”' . "\r\n" . '<br />' . "\r\n" . '2，如果您的网站会员很多，该操作耗时可能会较长' . "\r\n" . '<br />' . "\r\n" . '3，如果没有更新以下积分信用设置，不建议更新信用图标' . "\r\n\t\t" . '</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="5">信用等级</td></tr> ' . "\r\n" . '<tr bgcolor="#f5f8ff" style="font-weight:bold"><td>信用等级</td><td>信用度大于</td><td>信用度小于</td><td>等级图标</td></tr> ' . "\r\n";

for ($i = 1; $i < 16; $i++) {
	echo '<tr align="center" bgcolor="white"><td>';
	echo $i;
	echo '</td><td><input type="text" class="txt" name="credit_setnew[rank][';
	echo $i;
	echo ']" value="';
	echo $credit_set[rank][$i];
	echo '"></td><td>';
	echo $credit_set[rank][$i + 1];
	echo '&nbsp;</td><td><img src="../images/credit/';
	echo $i;
	echo '.gif" border="0"></td> ' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="seoset_submit" value="提 交" class="mymps large" type="submit"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

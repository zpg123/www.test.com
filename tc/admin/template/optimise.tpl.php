<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . 'body{ text-align:center!important;}' . "\r\n" . '.stepstart{ width:959px; height:auto; overflow:auto; margin-left:auto; margin-right:auto; text-align:center; margin-top:80px;}' . "\r\n" . '.tep{ float:left; display:block; border-bottom:5px #dedede solid; color:#999; padding-bottom:10px; width:65px; height:80px; padding-left:10px; padding-right:10px; padding-bottom:40px; vertical-align:middle; text-align:left; cursor:pointer; padding-top:10px;}' . "\r\n" . '.on{ border-bottom:5px #226499 solid; color:#226499;}' . "\r\n" . '.subdiv{ margin-top:70px; margin-bottom:70px; text-align:center}' . "\r\n" . '.chkbox{ text-align:center; margin-left:auto; margin-right:auto; margin-bottom:10px;}' . "\r\n" . '.finished{ margin-top:70px; margin-bottom:70px; color:#226499; font-family:microsoft yahei; font-size:18px;}' . "\r\n" . '.vbm{ text-align:center;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=cache">页面缓存</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=cache_sys">数据缓存</a></li>' . "\r\n\t\t\t\t" . '<li><a href="optimise.php" class="current">系统优化</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td>一键优化MyMps系统/清除冗余数据</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n" . '  <td>' . "\r\n\t" . '<form method="post" action="?">' . "\r\n\t" . '<input name="action" value="dopost" type="hidden">' . "\r\n\t" . '<div class="stepstart">' . "\r\n\t\t";
$lastarr = explode(',', $last);

foreach ($step as $k => $v ) {
	echo "\t\t\t" . '<label for="step';
	echo $k;
	echo '"><div class="tep ';
	echo in_array($k, $lastarr) ? 'on' : '';
	echo '"><div class="chkbox"><input id="step';
	echo $k;
	echo '" class="checkbox" name="steporder[';
	echo $k;
	echo ']" value="1" ';
	echo in_array($k, $lastarr) || (empty($last) && ($k != '2') && ($k != '1')) ? 'checked="checked"' : '';
	echo ' type="checkbox"></div>';
	echo $v;
	echo '</div></label>' . "\r\n\t\t";
}

echo "\t" . '</div>' . "\r\n\t" . '<div class="clear"></div>' . "\r\n\t";

if ($finished == 1) {
	echo "\t" . '<center class="finished">' . "\r\n\t" . '恭喜您，系统优化已完成!' . "\r\n\t" . '</center>' . "\r\n\t";
}
else {
	if (empty($next) && empty($last)) {
		echo "\t" . '<div class="subdiv"><input name="';
		echo CURSCRIPT;
		echo '_submit" type="submit" value="提 交" class="mymps large"/></div>' . "\r\n\t";
	}
	else {
		echo "\t" . '<div class="subdiv">' . "\r\n\t" . '&nbsp;&nbsp;' . "\r\n\t" . '</div>' . "\r\n\t";
	}
}

echo "\t" . '</form>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div class="clear"></div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

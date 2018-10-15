<?php

include mymps_tpl('inc_head');
echo '<script language="javascript">' . "\r\n" . 'ifcheck = false;' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n" . '            ' . "\t" . '<li><a href="?part=cache">页面缓存</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?part=cache_sys" class="current">数据缓存</a></li>' . "\r\n\t\t\t\t" . '<li><a href="optimise.php">系统优化</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=cache_sysupdate" method="post">' . "\r\n" . '<input name="return_url" type="hidden" value="';
echo $return_url;
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">更新系统缓存页面</td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '  <tr>' . "\r\n" . '  ' . "\t" . '<td class="altbg1" valign="center" style="text-align:center;width:15%"><b><input class="checkbox" name="chkall" onclick="CheckAll(this.form)" checked="checked" type="checkbox" id="chkalltables" /><label for="chkalltables"> 全选</label></b></td>' . "\r\n\t" . '<td class="altbg2">' . "\r\n\t";

foreach ($cachearray as $k => $v ) {
	echo "\t" . '<label for="';
	echo $k;
	echo '"><input checked="checked" name="updatecache[]" value="';
	echo $k;
	echo '" type="checkbox" class="checkbox" id="';
	echo $k;
	echo '">';
	echo $v;
	echo '</label><br />' . "\r\n" . '    ';
}

echo "\t" . '</td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large"></center>' . "\r\n" . '</form>' . "\r\n\r\n";
mymps_admin_tpl_global_foot();

?>

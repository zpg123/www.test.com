<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8; width:20%}' . "\r\n" . '.altbg2{ background-color:white;}' . "\r\n" . '.altbg2 li{ margin:5px auto;}' . "\r\n" . '</style>' . "\r\n\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?part=intro" ';

if ($part == 'intro') {
	echo 'class="current"';
}

echo '>广告位详细介绍</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>广告列表</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr"><td colspan="2">详细介绍</td></tr>' . "\r\n\t";

foreach ($vbm_adv_type as $k => $v ) {
	echo '    <tr>' . "\r\n" . '        <td width="45%" class="altbg1"><b>';
	echo $v[name];
	echo ':</b></td>' . "\r\n\t\t" . '<td class="altbg2">';
	echo $v[notice];
	echo '        </td>' . "\r\n" . '    </tr>' . "\r\n\t";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

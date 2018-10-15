<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript" src="js/vbm.js"></script>' . "\r\n" . '<style>' . "\r\n" . '.ccc2 ul input{margin:2px 0}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                ';
echo get_mymps_config_menu();
echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=update" method="post" name="form1">' . "\r\n";
echo get_mymps_config_input();
echo '<div align="center" style="margin:15px;">' . "\r\n" . '<input class="mymps mini" value="保存设置" type="submit" > ' . "\r\n" . '<input type="button" onClick="history.back()"value="返回" class="mymps mini">' . "\r\n" . '</div>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

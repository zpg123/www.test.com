<?php

echo mymps_admin_tpl_global_head();
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '    <td><strong>';
echo $nav_path;
echo '</strong></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr align="center" bgcolor="#ffffff">' . "\r\n" . '    <td align="left" height="100">' . "\r\n" . '    <table width=\'100%\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' align=\'center\'>' . "\r\n" . '    <tr>' . "\r\n" . '    <td colspan=\'2\' ><font color=\'green\'><b>&radic; ';
echo $message;
echo '：</b></font></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td colspan=\'2\' style="height:120px;border-bottom:none;"> ' . "\r\n" . '    　　请选择你的后续操作：';
echo $after_action;
echo '     </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </table>' . "\r\n\t" . '</td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

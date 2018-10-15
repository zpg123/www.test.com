<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      <td colspan="2">' . "\r\n" . '       基本资料' . "\r\n" . '      </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>所报活动</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        <a href="group_list.php?part=edit&id=';
echo $view['groupid'];
echo '" target="_blank">';
echo $view['gname'];
echo '</a>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>真实姓名</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['sname'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>联系电话</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['tel'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>QQ</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['qqmsn'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>年龄</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['age'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>参加人数</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['totalnumber'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>简短附言</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['message'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      ' . "\t" . '<td colspan="2">附加资料</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>报名时间</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo GetTime($view['dateline']);
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>报名IP</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['signinip'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>当前状态</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $status[$view['status']];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" class="mymps large" value="返 回" onClick="history.back();"></center>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

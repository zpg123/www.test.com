<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      <td colspan="2">' . "\r\n" . '       基本资料' . "\r\n" . '      </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>订购的商品</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        <a href="../goods.php?id=';
echo $view['goodsid'];
echo '" target="_blank">';
echo $view['goodsname'];
echo '</a>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>真实姓名</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['oname'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>座机电话</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['tel'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>联系地址</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['address'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>手机号码</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['mobile'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>QQ</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['qq'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>购买数量</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['ordernum'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>简短附言</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['msg'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      ' . "\t" . '<td colspan="2">附加资料</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>下单时间</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo GetTime($view['dateline']);
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td>下单IP</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        ';
echo $view['ip'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" class="mymps large" value="返 回" onClick="history.back();"></center>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

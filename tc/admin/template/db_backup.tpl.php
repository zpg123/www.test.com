<?php

include mymps_tpl('inc_head');
echo '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'function hide_backup_type(){' . "\r\n\t" . 'var jumpTest = $Obj(\'isjump\');' . "\r\n\t" . 'var jtr = $Obj(\'redirecturltr\');' . "\r\n\t" . 'if(jumpTest.checked){' . "\r\n\t\t" . 'jtr.style.display = "";' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'jtr.style.display = "none";' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'ifcheck = false;' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.dblist{ line-height:25px;}' . "\r\n" . '.dblist li{ float:left; display:block; width:200px}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '      <li style="color:#FF6600;">服务器备份目录为 <font color="#006acd"><b>';
echo $mymps_global[cfg_backup_dir];
echo '</b></font></li>' . "\r\n" . '      <li>数据备份功能根据您的选择备份全部分类信息和设置数据，导出的数据文件可用“数据还原”功能</li>' . "\r\n" . '      <li>数据备份选项中的设置，仅供高级用户的特殊用途使用，当您尚未对数据库做全面细致的了解之前，请使用默认参数备份，否则将导致备份数据错误等严重问题。' . "\r\n" . '      </li>' . "\r\n" . '      <li>十六进制方式可以保证备份数据的完整性，但是备份文件会占用更多的空间。' . "\r\n" . '      </li>' . "\r\n" . '      <li>压缩备份文件可以让您的备份文件占用更小的空间。' . "\r\n" . '      </li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=backup&setup=1" method="post">' . "\r\n" . '<input name="action" value="doaction" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="2">数据备份类型</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td width="100" class="bd_txt">数据库</td>' . "\r\n" . '      <td>' . "\r\n\t\t" . '<label for="mymps"><input id="mymps" name="type" type="radio" class="radio" value="mymps" checked="checked" onClick="hide_backup_type()"> Mymps全部数据</label>' . "\r\n" . '      </td>' . "\r\n" . '      </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td width="56" class="bd_txt">&nbsp;</td>' . "\r\n" . '      <td>' . "\r\n" . '<label for="isjump"><input name="type" type="radio" class="radio" value="custom" id="isjump" onClick="hide_backup_type()"> 自定义备份</label>' . "\r\n" . '</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff" id="redirecturltr" style="display:none">' . "\r\n" . '    ' . "\t" . '<td>' . "\r\n" . '         <input class="checkbox" name="chkall" onclick="CheckAll(this.form)" checked="checked" type="checkbox" id="chkalltables" /><label for="chkalltables"> 全选</label>' . "\r\n" . '        </td>' . "\r\n" . '        <td>' . "\r\n" . '        <ul class="dblist" onmouseover="altStyle(this);">' . "\r\n" . '        ';

foreach ($mymps_tables as $key => $val ) {
	echo '        <li><label for="list_';
	echo $val['Name'];
	echo '"><input type="checkbox" name="customtables[]" value="';
	echo $val['Name'];
	echo '" class="checkbox" checked="checked" id="list_';
	echo $val['Name'];
	echo '"/> ';
	echo $val['Name'];
	echo '</label></li>' . "\r\n" . '        ';
}

echo '        </ul>' . "\r\n" . '        </td>' . "\r\n" . '     </tr>' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td class="bd_txt" colspan="2">数据备份选项</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td>建表语句格式</td>' . "\r\n" . '        <td>' . "\r\n" . '<input class="radio" type="radio" name="sqlcompat" value="" checked>&nbsp;默认<br />' . "\r\n" . '<input class="radio" type="radio" name="sqlcompat" value="MYSQL40">&nbsp;MySQL 3.23/4.0.x<br />' . "\r\n" . '<input class="radio" type="radio" name="sqlcompat" value="MYSQL41">&nbsp;MySQL 4.1.x/5.x</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td>强制字符集</td>' . "\r\n" . '        <td>' . "\r\n" . '<input class="radio" type="radio" name="sqlcharset" value="" checked="checked">&nbsp;默认<br />' . "\r\n" . '<input class="radio" type="radio" name="sqlcharset" value="gbk">&nbsp;GBK<br />' . "\r\n" . '<input class="radio" type="radio" name="sqlcharset" value="utf8">&nbsp;UTF-8</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td>十六进制方式</td>' . "\r\n" . '        <td>' . "\r\n" . '<input class="radio" type="radio" name="extendins" value="1" >&nbsp;是<br />' . "\r\n" . '<input class="radio" type="radio" name="extendins" value="0" checked>&nbsp;否</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td>备份文件名</td>' . "\r\n" . '        <td><input type="text" class="text" name="filename" value="';
echo $defaultfilename;
echo '" />.sql</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td>单卷文件长度限制</td>' . "\r\n" . '        <td><input type="text" class="txt" name="sizelimit" value="4096" />KB</td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="backup_submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

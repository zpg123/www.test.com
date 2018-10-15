<?php

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\r\n" . '<html xmlns="http://www.w3.org/1999/xhtml">' . "\r\n" . '<head>' . "\r\n" . '<meta http-equiv=\'Content-Type\' content=\'text/html; charset=utf-8\'>' . "\r\n" . '<title>';
echo $here;
echo '  - powered by ';
echo MPS_SOFTNAME;
echo '</title>' . "\r\n" . '<link href=\'template/css/';
echo MPS_SOFTNAME;
echo '.css\' rel=\'stylesheet\' type=\'text/css\'>' . "\r\n" . '<script type=\'text/javascript\' src=\'../template/global/mymps.js\'></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'../template/global/noerr.js\'></script>' . "\r\n" . '</head>' . "\r\n\r\n" . '<body>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="test_same.php?" method="post">' . "\r\n" . '<input name="part" value="do_action" type="hidden">' . "\r\n" . '<input type=\'hidden\' name=\'pagesize\' value=\'';
echo $pagesize;
echo '\' />' . "\r\n" . '<input name="deltype" value="';
echo $deltype;
echo '" type="hidden" />' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '    <td width="10%"> <input name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'infoTitles\')" class="checkbox"/></td>' . "\r\n" . '    <td width="10%"> 重复数量 </td>' . "\r\n" . '    <td> 信息标题 </td>' . "\r\n" . '  </tr>' . "\r\n" . ' ';

while ($row = $db->fetchRow($query)) {
	if ($row['dd'] == 1) {
		break;
	}

	echo '   <tr bgcolor="#FFFFFF" height="24" onMouseMove="javascript:this.bgColor=\'#EFEFEF\';" onMouseOut="javascript:this.bgColor=\'#FFFFFF\';">' . "\r\n" . '    <td>' . "\r\n" . '      <input name="infoTitles[]" type="checkbox" value="';
	echo urlencode($row['title']);
	echo '" class="checkbox" />' . "\r\n" . '    </td>' . "\r\n" . '    <td>' . "\r\n\t";
	$allinfo += $row['dd'];
	echo $row['dd'];
	echo "\t" . '</td>' . "\r\n" . '    <td><a href="information.php?keywords=';
	echo $row['title'];
	echo '&show=title">';
	echo $row['title'];
	echo '</a></td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
}

echo '  <tr bgcolor="#E5F9FF">' . "\r\n" . '   <td height="28" colspan="3" bgcolor="#F8FBFB">' . "\r\n" . '     <input class="gray mini" value="删除重复信息" type="submit" name="';
echo CURSCRIPT;
echo '_submit">' . "\r\n" . '      (共有 <font color="red">';
echo $allinfo;
echo '</font> 篇重复标题的分类信息主题！)<br /><br />&nbsp;&nbsp;↑' . "\r\n" . '只';
echo $deltype == 'delnew' ? '保留最早的一条' : '保留最近的一条';
echo '   </td>' . "\r\n" . ' </tr>' . "\r\n" . '</form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</body>' . "\r\n" . '</html>' . "\r\n";

?>

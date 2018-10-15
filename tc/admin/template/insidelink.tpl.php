<?php

include mymps_tpl('inc_head');
echo '<form action="?" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    ' . "\t" . '<td colspan="2">文字内链设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td width="100"><b>启用文字内链:</td>' . "\r\n" . '        <td>' . "\r\n\t\t";

foreach ($insidelink_forward as $k => $v ) {
	echo "\t\t" . '<label for="';
	echo $k;
	echo '"><input class="checkbox" type="checkbox" name="settings[forward][';
	echo $k;
	echo ']" id="';
	echo $k;
	echo '" value="1" ';

	if ($settings['forward'][$k] == '1') {
		echo 'checked';
	}

	echo '> ';
	echo $v;
	echo '</label> ' . "\r\n\t\t";
}

echo "\t\t" . '</td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="3">内链文字设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5f8ff" style="font-weight:bold">' . "\r\n" . '      <td width="100"><input name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'delete\')" class="checkbox"/>删?</td>' . "\r\n" . '      <td>文字</td>' . "\r\n" . '      <td>链接网址</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($insidelink as $key => $val ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '        <td width="40"><input class="checkbox" type="checkbox" name="delete[]" value="';
	echo $val['id'];
	echo '"></td>' . "\r\n" . '        <td  width="240"><input class="text" type="text" name="word[';
	echo $val['id'];
	echo ']" value="';
	echo $val['word'];
	echo '"></td>' . "\r\n" . '        <td><input class="text" type="text" name="url[';
	echo $val['id'];
	echo ']" value="';
	echo $val['url'];
	echo '"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '   <tbody id="secqaabody" bgcolor="white">' . "\r\n" . '   <tr align="center">' . "\r\n" . '       <td>新增:<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '       <td><input class="text" type="text" name="newword[]"></td>' . "\r\n" . '       <td><input class="text" type="text" name="newurl[]"></td>' . "\r\n" . '   </tr>' . "\r\n" . '   </tbody>' . "\r\n" . '   ' . "\r\n" . '   <tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '       <tr align="center" bgcolor="white">' . "\r\n" . '       <td>&nbsp;</td>' . "\r\n" . '       <td><input class="text" type="text" name="newword[]"></td>' . "\r\n" . '       <td><input class="text" type="text" name="newurl[]"></td>' . "\r\n" . '       </tr>' . "\r\n" . '   </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" type="submit" name="';
echo CURSCRIPT;
echo '_submit"> &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>  ' . "\r\n";
mymps_admin_tpl_global_foot();

?>

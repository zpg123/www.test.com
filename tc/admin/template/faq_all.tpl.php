<?php

include mymps_tpl('inc_head');
echo '<div class="ccc2">' . "\r\n\t" . '<ul>' . "\r\n" . '    <select name="typeid" onChange="location.href=(this.options[this.selectedIndex].value)">' . "\r\n" . '        <option value="?">所有帮助主题</option>' . "\r\n" . '        ';

foreach ($faq_type as $k ) {
	echo '        <option value="?typeid=';
	echo $k[id];
	echo '"';

	if ($typeid == $k[id]) {
		echo 'selected';
	}

	echo '>筛选&raquo;&nbsp;&nbsp;';
	echo $k[typename];
	echo '</option>' . "\r\n" . '        ';
}

echo '    </select>' . "\r\n" . '      &nbsp;&nbsp;' . "\r\n" . '      <input class="gray mini" type="button" onClick="location.href=\'faq.php?do=type\'" value="帮助主题分类">' . "\r\n" . '&nbsp;&nbsp;&nbsp;&nbsp;' . "\r\n" . '      <input class="mymps mini" type="button" onClick="location.href=\'faq.php?part=add\'" value="发布帮助主题">' . "\r\n\t" . '</ul>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?part=delall\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '<input name="url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="60"><input name="checkall" class="checkbox" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/>删?</td>' . "\r\n" . '      <td width="60">编号</td>' . "\r\n" . '      <td>帮助标题</td>' . "\r\n" . '      <td>所属分类</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '  <tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($faq as $faq ) {
	echo "\t" . '<tr bgcolor="white">' . "\r\n" . '   ' . "\t" . '  <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $faq[id];
	echo '\' id="';
	echo $faq[id];
	echo '" class=\'checkbox\'></td>' . "\r\n\t" . '  <td><label>';
	echo $faq[id];
	echo '</label></td>' . "\r\n\t" . '  <td align="left"><a href="../about.php?part=faq&id=';
	echo $faq[id];
	echo '" target="_blank">';
	echo $faq[title];
	echo '</a></td>' . "\r\n" . '      <td align="left"><a href="?typeid=';
	echo $faq[typeid];
	echo '">';
	echo $faq[typename];
	echo '</a></td>' . "\r\n\t" . '  <td align="center"><a href="faq.php?part=edit&id=';
	echo $faq[id];
	echo '">编辑</a> / <a href="faq.php?part=delete&id=';
	echo $faq[id];
	echo '" onClick="if(!confirm(\'确定要删除吗？\\n\\n此操作不可以恢复！\'))return false;">删除</a>' . "\r\n\t" . '  </td>' . "\r\n\t" . '</tr>' . "\r\n\t";
}

echo "\t" . '</tbody>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" onClick="if(!confirm(\'确定要操作吗？\\n\\n此操作不可以恢复！\'))return false;" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>  ' . "\r\n";
mymps_admin_tpl_global_foot();

?>

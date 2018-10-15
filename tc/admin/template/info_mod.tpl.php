<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript">' . "\r\n" . 'function copyoption(s1, s2) {' . "\r\n\t" . 'var s1 = $(s1);' . "\r\n\t" . 'var s2 = $(s2);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'if(op.selected == true && !optionexists(s2, op.value)) {' . "\r\n\t\t\t" . 'o = op.cloneNode(true);' . "\r\n\t\t\t" . 's2.appendChild(o);' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n\r\n" . 'function optionexists(s1, value) {' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t\t" . 'if(s1.options[i].value == value) {' . "\r\n\t\t\t\t" . 'return true;' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t" . 'return false;' . "\r\n" . '}' . "\r\n\r\n" . 'function removeoption(s1) {' . "\r\n\t" . 'var s1 = $(s1);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=s1.options.length - 1; i>-1; i--) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'if(op.selected && op.selected == true) {' . "\r\n\t\t\t" . 's1.removeChild(op);' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return false;' . "\r\n" . '}' . "\r\n\r\n" . 'function selectalloption(s1) {' . "\r\n\t" . 'var s1 = $(s1);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=s1.options.length - 1; i>-1; i--) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'op.selected = true;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?part=mod&action=delall\'>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '   ' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="50"><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/>删?</td>' . "\r\n" . '      <td width="50">编号</td>' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($mod as $k => $value ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '      <td><input type=\'checkbox\' class="checkbox" name=\'id[]\' value=\'';
	echo $value[id];
	echo '\' ';

	if ($value[type] == '1') {
		echo 'disabled';
	}

	echo '/></td>' . "\r\n" . '      <td>';
	echo $value[id];
	echo '</td>' . "\r\n" . '      <td>';
	echo $value[name];
	echo '</td>' . "\r\n" . '      <td>';
	echo $value[displayorder];
	echo '</td>' . "\r\n" . '      <td><a href="?part=mod&action=edit&id=';
	echo $value[id];
	echo '">详情</a></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo "\t" . '</tbody>' . "\r\n\t" . '</table>' . "\r\n\t" . '</div>' . "\r\n" . '<center><input type="submit" onClick="if(!confirm(\'确定要删除该模型吗？\\n\\n此操作不可以恢复！\'))return false;" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="clearfix"></div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n" . '<div class="clear" style="height:10px;"></div>' . "\r\n" . '<form action="?part=mod&action=insert" method="post" name="form2">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="2">新增模型</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td width="15%"><b>模型名称</b></td>' . "\r\n" . '      <td><input name="name" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td><b>显示顺序</b></td>' . "\r\n" . '      <td><input name="displayorder" type="text" class="text" value="0"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

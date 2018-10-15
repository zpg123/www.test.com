<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript">' . "\r\n" . 'function copyoption(s1, s2) {' . "\r\n\t" . 'var s1 = $obj(s1);' . "\r\n\t" . 'var s2 = $obj(s2);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'if(op.selected == true && !optionexists(s2, op.value)) {' . "\r\n\t\t\t" . 'o = op.cloneNode(true);' . "\r\n\t\t\t" . 's2.appendChild(o);' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n\r\n" . 'function optionexists(s1, value) {' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t\t" . 'if(s1.options[i].value == value) {' . "\r\n\t\t\t\t" . 'return true;' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t" . 'return false;' . "\r\n" . '}' . "\r\n\r\n" . 'function removeoption(s1) {' . "\r\n\t" . 'var s1 = $obj(s1);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=s1.options.length - 1; i>-1; i--) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'if(op.selected && op.selected == true) {' . "\r\n\t\t\t" . 's1.removeChild(op);' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n\t" . 'return false;' . "\r\n" . '}' . "\r\n\r\n" . 'function selectalloption(s1) {' . "\r\n\t" . 'var s1 = $obj(s1);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=s1.options.length - 1; i>-1; i--) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'op.selected = true;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n\r\n" . 'function moveUp(selectObj) ' . "\r\n" . '{ ' . "\r\n" . '    var theObjOptions=selectObj.options;' . "\r\n" . '    for(var i=1;i<theObjOptions.length;i++) {' . "\r\n" . '        if( theObjOptions[i].selected && !theObjOptions[i-1].selected ) {' . "\r\n" . '            swapOptionProperties(theObjOptions[i],theObjOptions[i-1]);' . "\r\n" . '        }' . "\r\n" . '    }' . "\r\n" . '} ' . "\r\n\r\n" . 'function moveDown(selectObj) ' . "\r\n" . '{ ' . "\r\n" . '    var theObjOptions=selectObj.options;' . "\r\n" . '    for(var i=theObjOptions.length-2;i>-1;i--) {' . "\r\n" . '        if( theObjOptions[i].selected && !theObjOptions[i+1].selected ) {' . "\r\n" . '            swapOptionProperties(theObjOptions[i],theObjOptions[i+1]);' . "\r\n" . '        }' . "\r\n" . '    }' . "\r\n" . '} ' . "\r\n\r\n" . 'function move(index,to) {' . "\r\n\t" . 'var list = document.form1.moptselect;' . "\r\n\t" . 'var total = list.options.length-1;' . "\r\n\t" . 'if (index == -1) return false;' . "\r\n\t" . 'if (to == +1 && index == total) return false;' . "\r\n\t" . 'if (to == -1 && index == 0) return false;' . "\r\n\t" . 'var items = new Array;' . "\r\n\t" . 'var values = new Array;' . "\r\n\t" . 'for (i = total; i >= 0; i--) {' . "\r\n\t\t" . 'items[i] = list.options[i].text;' . "\r\n\t\t" . 'values[i] = list.options[i].value;' . "\r\n\t" . '}' . "\r\n\t" . 'for (i = total; i >= 0; i--) {' . "\r\n\t" . 'if (index == i) {' . "\r\n\t\t" . 'list.options[i + to] = new Option(items[i],values[i + to], 0, 1);' . "\r\n\t\t" . 'list.options[i] = new Option(items[i + to], values[i]);' . "\r\n\t\t" . 'i--;' . "\r\n\t" . '} else {' . "\r\n\t\t" . 'list.options[i] = new Option(items[i], values[i]);' . "\r\n\t" . '   }' . "\r\n\t" . '}' . "\r\n\t" . 'list.focus();' . "\r\n" . '}' . "\r\n\r\n" . 'function swapOptionProperties(option1,option2){' . "\r\n" . '    //option1.swapNode(option2);' . "\r\n" . '    var tempStr=option1.value;' . "\r\n" . '    option1.value=option2.value;' . "\r\n" . '    option2.value=tempStr;' . "\r\n" . '    tempStr=option1.text;' . "\r\n" . '    option1.text=option2.text;' . "\r\n" . '    option2.text=tempStr;' . "\r\n" . '    tempStr=option1.selected;' . "\r\n" . '    option1.selected=option2.selected;' . "\r\n" . '    option2.selected=tempStr;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method="post" name="form1" action="?part=mod&action=update" onsubmit="selectalloption(\'moptselect\');">' . "\r\n" . '<input name="id" value="';
echo $edit['id'];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="2">分类选项基本设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td width="15%">模型名称</td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="name" value="';
echo $edit['name'];
echo '" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td width="15%">显示顺序</td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="displayorder" value="';
echo $edit['displayorder'];
echo '" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="3">模型选项设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td width="15%" bgcolor="#f5fbff"><b>';
echo $edit['name'];
echo '<br>使用的字段：</b></td>' . "\r\n" . '    <td bgcolor="#f5fbff" width="300">' . "\r\n" . '    <select name="options[]" size="10" multiple="multiple" style="width: 300px; border:2px #26C67F solid;" id="moptselect">' . "\r\n" . '    ';

if (is_array($options)) {
	foreach ($options as $k => $value ) {
		$get = $db->getRow('SELECT optionid,title,type,identifier FROM `' . $db_mymps . 'info_typeoptions` WHERE optionid = \'' . $value . '\'');
		echo '        <option value="';
		echo $value;
		echo '">';
		echo $get[title];
		echo ' / ';
		echo $get[identifier];
		echo ' / ';
		echo $get[type];
		echo '</option>' . "\r\n\t";
	}
}

echo '    </select><br /><a href="###" onclick="removeoption(\'moptselect\')">[删除]</a>    </td>' . "\r\n" . '    <td bgcolor="#f5fbff" title="left">' . "\r\n\t" . '<input type="button" value="↑" ' . "\r\n" . 'onClick="moveUp(this.form.moptselect)"><br><br>' . "\r\n" . '<input type="button" value="↓"' . "\r\n" . 'onClick="moveDown(this.form.moptselect)">' . "\r\n\t" . '</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td width="15%" bgcolor="#f5fbff"><b>可添加的系统字段：</b></td>' . "\r\n" . '    <td colspan="2" bgcolor="#f5fbff">' . "\r\n" . '    <select name="" size="20" multiple="multiple" style="width: 300px" id="coptselect">' . "\r\n" . '    ';
echo $opt;
echo '    </select>' . "\r\n" . '    <br /><a href="###" onclick="copyoption(\'coptselect\', \'moptselect\')">[添加到';
echo $edit['name'];
echo '中]</a>    </td></tr>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" ';

if ($edit['id'] == 1) {
	echo 'disabled';
}

echo '/>　' . "\r\n" . '<input type="button" onclick="location.href=\'?part=mod&action=list\';" value="返 回" class="gray large">' . "\r\n" . '</center>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

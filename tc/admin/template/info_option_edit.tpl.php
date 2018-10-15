<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '            <li><a href="?part=option_type" ';

if ($part == 'option_type') {
	echo 'class="current"';
}

echo '>类别管理</a></li>' . "\r\n" . '            ';

foreach ($options as $k => $value ) {
	echo '                <li><a href="?classid=';
	echo $value[optionid];
	echo '" ';

	if ($edit[classid] == $value[optionid]) {
		echo 'class="current"';
	}

	echo '>';
	echo $value[title];
	echo '</a></li>' . "\r\n" . '            ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?part=option_edit&action=update&optionid=';
echo $edit[optionid];
echo '\'>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="6">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'1\')">分类选项基本设置</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tbody id="menu_1">' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="title" value="';
echo $edit['title'];
echo '" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>变量名</td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="identifier" value="';
echo $edit['identifier'];
echo '" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>类型</td>' . "\r\n" . '      <td><select name="typenew" onchange="var styles, key;styles=new Array(\'text\',\'textarea\',\'radio\',\'checkbox\',\'select\',\'number\'); for(key in styles) {var obj=$obj(\'style_\'+styles[key]); obj.style.display=styles[key]==this.options[this.selectedIndex].value?\'\':\'none\';}">' . "\r\n" . '        ';
echo get_type_option($edit[type]);
echo '      </select>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>所属分类</td>' . "\r\n" . '      <td bgcolor="#f5fbff">' . "\r\n" . '      <select name="classid">' . "\r\n" . '      ';

foreach ($class_option as $k => $value ) {
	echo '        <option value="';
	echo $value[optionid];
	echo '" ';
	echo $edit[classid] == $value[optionid] ? 'selected' : '';
	echo '>';
	echo $value[title];
	echo '</option>' . "\r\n" . '      ';
}

echo '      </select> ' . "\r\n" . '      [<a href="?part=option_type">类别管理</a>]' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>排列顺序</td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="displayorder" value="';
echo $edit['displayorder'];
echo '" type="text" class="text"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>其他属性</td>' . "\r\n" . '      <td bgcolor="#f5fbff">' . "\r\n" . '      <label for="available"><input name="available" type="checkbox" id="available" ';

if ($edit['available'] == 'on') {
	echo 'checked';
}

echo ' class=checkbox>可用</label> ' . "\r\n" . '      <label for="required"><input name="required" type="checkbox" id="required" ';

if ($edit['required'] == 'on') {
	echo 'checked';
}

echo ' class=checkbox>必填</label>' . "\r\n" . '      <label for="search"><input name="search" type="checkbox" id="search" ';

if ($edit['search'] == 'on') {
	echo 'checked';
}

echo ' class=checkbox>作为筛选条件</label>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff" width="45%">' . "\r\n" . '      <td>简短说明<br />（可不填写）</td>' . "\r\n" . '      <td><textarea rows="10" cols="70" name="description">';
echo $edit[description];
echo '</textarea></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n\r\n";
echo get_mymps_admin_info_type();
echo "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="保存修改" class="mymps mini"/> <input type="button" onclick="location.href=\'?classid=';
echo $edit[classid];
echo '\';" value="返 回" class="mymps mini"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

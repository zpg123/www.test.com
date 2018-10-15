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

	if ($classid == $value[optionid]) {
		echo 'class="current"';
	}

	echo '>';
	echo $value[title];
	echo '</a></li>' . "\r\n" . '            ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?\'>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  ' . "\t" . '<input name="part" value="option_delall" type="hidden">' . "\r\n" . '    <input name="url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="7"><b>';
echo $detail['title'];
echo '</b> 分类信息字段管理</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ' . "\r\n" . '    <tr style="font-weight:bold; height:24px; background-color:#f1f5f8">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/>删?</td>' . "\r\n" . '      <td>模型ID</td>' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td>变量名</td>' . "\r\n" . '      <td>类型</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($option as $k => $value ) {
	echo '    <tr bgcolor="white">' . "\r\n" . '      <td><input ';

	if ($value[optionid] == 1) {
		echo 'disabled';
	}

	echo ' class="checkbox" type=\'checkbox\' name=\'id[]\' value=\'';
	echo $value[optionid];
	echo '\' id="';
	echo $value[optionid];
	echo '"></td>' . "\r\n" . '      <td>';
	echo $value[optionid];
	echo '</td>' . "\r\n" . '      <td>';
	echo $value[title];
	echo '</td>' . "\r\n" . '      <td>';
	echo $value[identifier];
	echo '</td>' . "\r\n" . '      <td>';
	echo $var_type[$value[type]];
	echo '(';
	echo $value[type];
	echo ')</td>' . "\r\n" . '      <td>';
	echo $value[displayorder];
	echo '</td>' . "\r\n" . '      <td><a href="?part=option_edit&optionid=';
	echo $value[optionid];
	echo '">详情</a></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '    </tbody>' . "\r\n\t" . '</table>' . "\r\n\t" . '</div>' . "\r\n\t" . '<center><input type="submit" onClick="if(!confirm(\'确定要操作吗？\\n\\n此操作不可以恢复！\'))return false;" value="提 交" class="mymps large" name="deloption"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="clear" style="height:10px"></div>' . "\r\n" . '<form action="?part=option_add" method="post" name="form2">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">';
echo $detail['title'];
echo ' 新增模型字段</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:15%;">字段名称</td>' . "\r\n" . '    <td><input name="title" type="text" class="text"> <br /><i style="color:#555; margin-top:3px;">中文名称如“价格”</i></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">变量名</td>' . "\r\n" . '    <td><input name="identifier" type="text" class="text"> <br /><i style="color:#555; margin-top:3px;">可用字段名称的拼音全拼或首字母</i></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">类型</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<select name="type">' . "\r\n\t\t";
echo get_type_option();
echo '    </select>' . "\r\n\t" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">其它属性</td>' . "\r\n" . '    <td>' . "\r\n" . '<label for="available"><input name="available" type="checkbox" id="available" class="checkbox" checked>可用</label> ' . "\r\n" . '<label for="required"><input name="required" type="checkbox" id="required" class="checkbox">必填</label>' . "\r\n" . '<label for="search"><input name="search" type="checkbox" id="search" class="checkbox">作为筛选条件</label>' . "\r\n\t" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8;">显示顺序</td>' . "\r\n" . '    <td><input name="displayorder" type="text" class="text" value="0"></td>' . "\r\n" . '</tr>' . "\r\n" . '    <input name="classid" value="';
echo $detail[optionid];
echo '" type="hidden" />' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提交" class="mymps large" name="optionnew"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

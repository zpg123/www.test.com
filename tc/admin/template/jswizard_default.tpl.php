<?php

include mymps_tpl('inc_head');
echo "\r\n" . '<style>' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?part=settings">基本设置</a></li>' . "\r\n" . '                <li><a href="?" class="current">调用项目管理</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <form method="get" action="?">' . "\r\n" . '    <input name="part" value="add" type="hidden">' . "\r\n" . '    <tr class="firstr"><td colspan="2">添加数据调用</td></tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td class="altbg1" width="160">自定义标签名<br><font color="gray">请输入一个便于记忆的能代表此数据调用脚本作用的标识，建议用英文或数字表示</font></td>' . "\r\n" . '    <td><input type="text" name="flag" value="';
echo $randam;
echo '" class="text" style="line-height:18px"/></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td class="altbg1">调用类型</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="customtype">' . "\r\n" . '    ';

foreach ($customtypearr as $k => $v ) {
	echo '    <option value="';
	echo $k;
	echo '">';
	echo $v;
	echo '</option>' . "\r\n\t";
}

echo '    </select>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    <td>' . "\r\n" . '    </td>' . "\r\n" . '    <td>' . "\r\n" . '    <input type="submit" value="添加调用项目" class="mymps large"/>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<input name="part" value="';
echo $part;
echo '" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td width="5%"><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/>删?</td>' . "\r\n" . '<td width="15%">标签名</td>' . "\r\n" . '<td>调用类型</td>' . "\r\n" . '<td width="15%">添加时间</td>' . "\r\n" . '<td width="15%">调用代码</td>' . "\r\n" . '</tr>' . "\r\n\r\n";

if (is_array($jswizard)) {
	foreach ($jswizard as $key => $val ) {
		echo '<tr bgcolor="white">' . "\r\n" . '  <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
		echo $val[id];
		echo '\' id="';
		echo $val[id];
		echo '"></td>' . "\r\n" . '  <td><a href="?part=detail&id=';
		echo $val['id'];
		echo '">';
		echo $val['flag'];
		echo '</a></td>' . "\r\n" . '  <td>';
		echo $customtypearr[$val['customtype']] ? $customtypearr[$val['customtype']] : '分类信息';
		echo '</td>' . "\r\n" . '  <td>';
		echo GetTime($val['edittime']);
		echo '</td>' . "\r\n" . '  <td>' . "\r\n" . '  <a href="javascript:void(0);" onclick="setbg(\'站内调用\',550,110,\'../box.php?part=custom&flag=';
		echo $val[flag];

		if ($val['jscharset'] == 1) {
			echo '&jscharset=1';
		}

		echo '\')">站内调用</a> ' . "\r\n" . '  &nbsp;&nbsp;' . "\r\n" . '  <a href="javascript:void(0);" onclick="setbg(\'站外调用\',550,110,\'../box.php?part=jswizard&flag=';
		echo $val[flag];

		if ($val['jscharset'] == 1) {
			echo '&jscharset=1';
		}

		echo '\')">站外调用</a></td>' . "\r\n" . '</tr>' . "\r\n";
	}
}

echo "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

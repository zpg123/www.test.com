<?php

echo mymps_admin_tpl_global_head();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '            <li><a href="?part=report" ';

if ($report_type == '') {
	echo 'class="current"';
}

echo '>全部举报记录</a></li>' . "\r\n" . '            ';

foreach ($report_type_arr as $k => $v ) {
	echo '                <li><a href="?part=report&report_type=';
	echo $k;
	echo '" ';

	if ($report_type == $k) {
		echo 'class="current"';
	}

	echo '>';
	echo $v;
	echo '</a></li>' . "\r\n" . '            ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?part=';
echo $part;
echo '\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<input name="action" type="hidden" value="delall">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="60"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/>删?</td>' . "\r\n" . '      <td width="30">编号</td>' . "\r\n" . '   ' . "\t" . '  <td>举报对象</td>' . "\r\n" . '      <td>附加描述</td>' . "\r\n" . '      <td>举报时间</td>' . "\r\n" . '      <td>举报IP</td>' . "\r\n" . '      <td>相关操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($report as $v ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '      <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $v[id];
	echo '\' id="';
	echo $v[id];
	echo '" class="checkbox"></td>' . "\r\n" . '      <td>';
	echo $v[id];
	echo '</td>' . "\r\n" . '      <td><a href="../information.php?id=';
	echo $v[infoid];
	echo '" target="_blank">';
	echo $v[infotitle];
	echo '</a>&nbsp;</td>' . "\r\n\t" . '  <td>';
	echo $v[content];
	echo '&nbsp;</td>' . "\r\n" . '      <td><em>';
	echo $v[pubtime];
	echo '</em></td>' . "\r\n" . '      <td>';
	echo $v[ip];
	echo '</td>' . "\r\n" . '      <td><a href="?keywords=';
	echo $v[infoid];
	echo '&show=idno">查看该信息</a></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" onClick="if(!confirm(\'确定要提交吗？\'))return false;" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

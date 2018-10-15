<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="friendlink.php?part=list" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>已增加友情链接</a></li>' . "\r\n" . '                <li><a href="friendlink.php?part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加友情链接</a></li>' . "\r\n" . '                <li><a href="friendlink.php?do=type" ';

if ($do == 'type') {
	echo 'class="current"';
}

echo '>网站类型管理</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<div class="clearfix"></div>' . "\r\n" . '<div class="small-section">' . "\r\n\t" . '<a href="?"  ';
if (empty($ifindex) && empty($catid)) {
	echo 'class="current"';
}

echo '>全部</a>' . "\r\n\t" . '<a href="friendlink.php?ifindex=2" ';

if ($ifindex == 2) {
	echo 'class="current"';
}

echo '>首页</a>' . "\r\n\t";

foreach ($cats as $k => $v ) {
	echo "\t" . '<a href="friendlink.php?catid=';
	echo $v['catid'];
	echo '" ';

	if ($catid == $v['catid']) {
		echo 'class="current"';
	}

	echo '>';
	echo $v['catname'];
	echo '</a>' . "\r\n\t";
}

echo '</div>' . "\r\n" . '<div class="clearfix"></div>' . "\r\n" . '<form method=\'post\' action=\'?part=doall\'>' . "\r\n" . '<input name="return_url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="30">选择</td>' . "\r\n" . '      <td width="40">状态</td>' . "\r\n\t" . '  <td width="80">顺序</td>' . "\r\n" . '      <td width="140">网站名称</td>' . "\r\n" . '      <td>网站地址</td>' . "\r\n\t" . '  ';

if (!$catid) {
	echo '      <td>网站logo</td>' . "\r\n\t" . '  ';
}

echo '      <td>添加时间</td>' . "\r\n" . '      <td width="100">管理</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($links as $row ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '      <td><input type=\'checkbox\' name=\'ids[]\' value=\'';
	echo $row[id];
	echo '\' class="checkbox" id="';
	echo $row[id];
	echo '"></td>' . "\r\n\t" . '  <td>';

	if ($row[ischeck] == '1') {
		echo '<font color=red>待审</font>';
	}
	else if ($row[ischeck] == '2') {
		echo '<font color=green>正常</font>';
	}

	echo '</td>' . "\r\n" . '      <td><input name="ordernumber[';
	echo $row[id];
	echo ']" value="';
	echo $row[ordernumber];
	echo '" class="txt"/></td>' . "\r\n" . '      <td>';
	echo $row[webname];
	echo '</td>' . "\r\n" . '      <td align="left"><a href="';
	echo $row[url];
	echo '" target="_blank" style="text-decoration:underline;">';
	echo $row[url];
	echo '</a></td>' . "\r\n\t" . '  ';

	if (!$catid) {
		echo '      <td>';

		if (!empty($row[weblogo])) {
			echo '<a href="';
			echo $row[weblogo];
			echo '"><img src="';
			echo $row[weblogo];
			echo '" width="85" height="35" border="0" alt="点击查看图片完整大小"/></a>';
		}
		else {
			echo '无';
		}

		echo '</td>' . "\r\n\t" . '  ';
	}

	echo '      <td><em>';
	echo GetTime($row[createtime]);
	echo '</em></td>' . "\r\n" . '      <td><a href=\'friendlink.php?id=';
	echo $row[id];
	echo '&part=edit\'>更改</a> / <a href=\'friendlink.php?id=';
	echo $row[id];
	echo '&part=delete\' onClick="return confirm(\'您确定要删除该链接吗，如不确定请点取消\')">删除</a> </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n\t" . '<b>转为-></b> ' . "\r\n\t" . '<label for="index"><input name="do_action" class="radio" id="index" value="index" type="radio">首页显示</label> ' . "\r\n\t" . '<label for="inside"><input name="do_action" class="radio" id="inside" value="inside" type="radio">取消首页显示</label>' . "\r\n\t" . '<label for="check2"><input name="do_action" class="radio" id="check2" value="check2" type="radio">正常</label>' . "\r\n\t" . '<label for="check1"><input name="do_action" class="radio" id="check1" value="check1" type="radio">待审</label>' . "\r\n\t" . '<hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n\t" . '<b>删除-></b> ' . "\r\n\t" . '<label for="del"><input name="do_action" class="radio" id="del" value="del" type="radio">删除</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center style=\'margin:10px\'><input type="submit" value="提 交"  class="mymps large"/> </center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>  ' . "\r\n";
mymps_admin_tpl_global_foot();

?>

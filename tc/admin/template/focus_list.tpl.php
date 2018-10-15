<?php

include mymps_tpl('inc_head');
echo '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '    <li><a href="?typename=网站首页" ';

if ($typename == '网站首页') {
	echo 'class="current"';
}

echo '>网站首页</a></li>' . "\r\n" . '    <li><a href="?typename=新闻首页" ';

if ($typename == '新闻首页') {
	echo 'class="current"';
}

echo '>新闻首页</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form method=\'post\' action=\'?part=';
echo $part;
echo '\'>' . "\r\n" . '<input name="typename" value="';
echo $typename;
echo '" type="hidden" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="50"><input name="checkall" type="checkbox" class="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '    <td align="center">幻灯片路径</td>' . "\r\n" . '    <td width="160" align="center">说明文字</td>' . "\r\n" . '    <td align="center">添加时间</td>' . "\r\n" . '    <td width="100" align="center">顺序</td>' . "\r\n" . '    <td align="center">编辑</td>' . "\r\n" . '  </tr>' . "\r\n";

foreach ($row as $row ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '    <td><input type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $row[id];
	echo '\' class="checkbox" id="';
	echo $row[id];
	echo '"></td>' . "\r\n" . '    <td><a href=\'javascript:blocknone("pm_';
	echo $row[id];
	echo '");\'>';
	echo $row[pre_image];
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $row[words];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo GetTime($row[pubdate]);
	echo '</em></td>' . "\r\n" . '    <td><input name="displayorder[';
	echo $row[id];
	echo ']" value="';
	echo $row[focusorder];
	echo '" class="txt"/></td>' . "\r\n" . '    <td>' . "\r\n\t" . '  <a href=\'?part=edit&id=';
	echo $row[id];
	echo '\'>详情</a>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr style="background-color:white; display:none" id="pm_';
	echo $row[id];
	echo '">' . "\r\n" . '    <td>&nbsp;</td>' . "\r\n" . '    <td colspan="5"><img src="';
	echo $row[pre_image];
	echo '" style="height:150px;"/></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center style=\'margin:10px\'><input type="submit" value="提 交"  class="mymps large" name="focus_submit"/> </center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

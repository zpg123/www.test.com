<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a title="已添加的新闻类别" href="channel.php" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>已添加的新闻类别</a></li>' . "\r\n" . '                <li><a title="新增新闻类别" href="channel.php?part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>新增新闻类别</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<form name="form_mymps" action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40">编号</td>' . "\r\n" . '      <td width="40">启用?</td>' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td width="80">排列顺序</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($f_cat as $cat ) {
	echo "\t" . '  <tr ';

	if ($cat[level] == 0) {
		echo 'bgcolor="#f5fbff" ';
	}
	else {
		echo '  bgcolor="#ffffff" ';
	}

	echo '>' . "\r\n\t" . '  <td width="40">';
	echo $cat[catid];
	echo '</td>' . "\r\n" . '      <td><input name="if_viewids[]" value="';
	echo $cat[catid];
	echo '" type="checkbox" ';

	if ($cat[if_view] == 2) {
		echo 'checked';
	}

	echo ' class="checkbox"/></td>' . "\r\n" . '  <td><li style="margin-left:';
	echo 1 < $cat['level'] ? $cat[level] * 3 : $cat[level];
	echo 'em;" ';

	if ($cat['parentid'] != '0') {
		echo 'class="son"';
	}

	echo '><a ';

	if ($cat[level] == 0) {
		echo 'style="font-weight:bold" ';
	}

	echo ' href="../news.php?catid=';
	echo $cat[catid];
	echo '" target="_blank">';
	echo $cat[catname];
	echo '</a></li></td>' . "\r\n" . '      <td width="80"><input name="catorder[';
	echo $cat[catid];
	echo ']" value="';
	echo $cat[catorder];
	echo '" class="txt"/></td>' . "\r\n\t" . '  <td><a href="channel.php?part=edit&catid=';
	echo $cat[catid];
	echo '">编辑</a> / <a href="channel.php?part=del&catid=';
	echo $cat[catid];
	echo '" onClick="if(!confirm(\'确定要删除该新闻栏目吗？\\n\\n该操作将删除隶属该栏目的子栏目以及新闻文章！\'))return false;">删除</a></td>' . "\r\n" . '      <td width="30"><a onclick="window.scrollTo(0,0);" style="cursor:pointer" title="至页面顶端">TOP</a></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

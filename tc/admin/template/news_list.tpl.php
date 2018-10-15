<?php

include mymps_tpl('inc_head');
echo "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="news.php" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>新闻列表</a></li>' . "\r\n\t\t\t\t" . '<li><a href="news.php?part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>添加新闻</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t\t" . '<ul style="float:right; margin-right:10px">' . "\r\n\t\t\t" . '<form action="?" method="get">' . "\r\n" . '<input name="cityid" value="';
echo $cityid;
echo '" type="hidden">' . "\r\n" . '<input name="title" type="input" value="';
echo $title;
echo '" class="text" style="width:120px;"/>' . "\r\n" . '<select name="catid">' . "\r\n" . '<option value="">请选择所属分类</option>' . "\r\n";
echo cat_list('channel', 0, $catid);
echo '</select> ' . "\r\n" . '<input type="submit" class="gray mini" value="检索新闻"> ' . "\r\n" . '</form>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="60"><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/>删?</td>' . "\r\n" . '    <td>ID</td>' . "\r\n" . '    <td>新闻标题</td>' . "\r\n" . '    <td width="100">发布人</td>' . "\r\n" . '    <td width="100">来源</td>' . "\r\n" . '    <td>所属类别</td>' . "\r\n" . '    <td>新闻状态</td>' . "\r\n" . '    <td>浏览次数</td>' . "\r\n" . '    <td>发布时间</td>' . "\r\n" . '    <td>管理项</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($news as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'delids[]\' value="';
	echo $row['id'];
	echo '" class=\'checkbox\' id="';
	echo $row['id'];
	echo '"></td>' . "\r\n" . '    <td>';
	echo $row['id'];
	echo '</td>' . "\r\n" . '    <td align="left"  width="120"><a href="../news.php?id=';
	echo $row[id];
	echo '" target="_blank" title="';
	echo $row['title'];
	echo '">';
	echo substring($row['title'], 0, 15);
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $row['author'];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row['source'];
	echo '</td>' . "\r\n" . '    <td><a href="../news.php?catid=';
	echo $row['catid'];
	echo '">';
	echo $row['catname'];
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $iscommend_arr[$row['iscommend']];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row['hit'];
	echo ' 次</td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['begintime']);
	echo '</em></td>' . "\r\n" . '    <td>' . "\r\n" . '     <a href="?part=edit&id=';
	echo $row['id'];
	echo '">编辑</a>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="news_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

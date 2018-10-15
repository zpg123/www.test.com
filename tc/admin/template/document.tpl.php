<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="document.php?do=document" ';

if ($do == 'document') {
	echo 'class="current"';
}

echo '>已发布文档</a></li>' . "\r\n\t\t\t\t" . '<li><a href="document.php" ';

if ($do == 'type') {
	echo 'class="current"';
}

echo '>文档模型管理</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<form action="document.php" method="post">' . "\r\n" . '<input name="forward_url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<input name="do" type="hidden" value="docu">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '    <td width="50"><input name="checkall" type="checkbox" id="checkall" onclick="CheckAll(this.form)" class="checkbox"/>删?</td>' . "\r\n" . '    <td>ID</td>' . "\r\n" . '    <td>文档标题</td>' . "\r\n" . '    <td width="100">会员名</td>' . "\r\n" . '    <td width="100">作者</td>' . "\r\n" . '    <td>来源</td>' . "\r\n" . '    <td>文档状态</td>' . "\r\n" . '    <td>发布时间</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($docu as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $row[id];
	echo '\' class=\'checkbox\' id="';
	echo $row[id];
	echo '"></td>' . "\r\n" . '    <td>';
	echo $row[id];
	echo '</td>' . "\r\n" . '    <td align="left"  width="120"><a href="../store.php?user=';
	echo $row[userid];
	echo '&part=document&id=';
	echo $row[id];
	echo '" target="_blank" title="';
	echo $row[title];
	echo '">';
	echo substring($row[title], 0, 15);
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $row[userid];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row[author];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row[source];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row[if_check];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo GetTime($row[pubtime]);
	echo '</em></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="document_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

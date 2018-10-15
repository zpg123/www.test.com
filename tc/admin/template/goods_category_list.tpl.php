<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?part=list" class="current">商品分类</a></li>' . "\r\n" . '                <li><a href="?part=add">增加分类</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form name="form_mymps" action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td>编号</td>' . "\r\n" . '      <td width="40">启用?</td>' . "\r\n" . '      <td>分类名称</td>' . "\r\n" . '      <td width="80">排列顺序</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($f_cat as $cat ) {
	echo '  <tr ';

	if ($cat['level'] == 0) {
		echo 'bgcolor="#f5fbff" ';
	}
	else {
		echo '  bgcolor="#ffffff" ';
	}

	echo '>' . "\r\n" . '  <td width="40">';
	echo $cat[catid];
	echo '</td>' . "\r\n" . '  <td><input class="checkbox" name="if_viewids[]" value="';
	echo $cat[catid];
	echo '" type="checkbox" ';

	if ($cat[if_view] == 2) {
		echo 'checked';
	}

	echo ' /></td>' . "\r\n" . '  <td><li style="margin-left:';
	echo $cat['level'];
	echo 'em!important; color:';
	echo $cat['color'];
	echo '" ';

	if ($cat['parentid'] != '0') {
		echo 'class="son"';
	}

	echo '><a href="../goods.php?catid=';
	echo $cat[catid];
	echo ' "';

	if ($cat['level'] == 0) {
		echo 'style="font-weight:bold" ';
	}

	echo ' target="_blank">';
	echo $cat[catname];
	echo '</a></li></td>' . "\r\n" . '  <td width="80"><input name="catorder[';
	echo $cat[catid];
	echo ']" value="';
	echo $cat[catorder];
	echo '" class="txt" type="text"/></td>' . "\r\n" . '  <td><a href="goods_category.php?part=edit&catid=';
	echo $cat[catid];
	echo '">编辑</a> / <a href="goods_category.php?part=del&catid=';
	echo $cat[catid];
	echo '" onClick="if(!confirm(\'确定要删除分类吗？\\n\\n该操作将删除隶属该分类的子分类以及商品！\'))return false;">删除</a>      </td>' . "\r\n" . '  <td width="30">&nbsp;';

	if ($cat['level'] == 0) {
		echo '<a onclick="window.scrollTo(0,0);" style="cursor:pointer" title="至页面顶端">TOP</a>';
	}

	echo '</td>' . "\r\n" . '</tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

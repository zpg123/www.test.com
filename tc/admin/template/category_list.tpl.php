<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript">' . "\r\n" . 'function showchildren(i){' . "\r\n\t" . 'var c = document.getElementById(\'children_\'+i);' . "\r\n\t" . 'var g = document.getElementById(\'img_\'+i);' . "\r\n\t" . 'c.style.display = c.style.display == \'none\' ? \'\' : \'none\';' . "\r\n\t" . 'g.style.src=g.style.src==\'template/images/menu_add.gif\'?\'template/images/menu_reduce.gif\':\'template/images/menu_add.gif\';' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.categorybox{ border-left:1px #c5d8e8 solid;border-bottom:1px #c5d8e8 solid;border-right:1px #c5d8e8 solid; height:auto;}' . "\r\n" . '.categorybox .first{font-weight:700; color:#069; background-color:#eaf7ff!important;}' . "\r\n" . '.categoryli{ height:auto; overflow:auto;}' . "\r\n" . '.categoryli ul{border-bottom:1px #c5d8e8 solid;}' . "\r\n" . '.categoryli ul li{ display:block; text-align:left;padding:12px 0 12px 15px;}' . "\r\n" . '.categoryli ul .column1{ width:80px; float:left;}' . "\r\n" . '.categoryli ul .column2{ width:300px; float:left;}' . "\r\n" . '.categoryli ul .column3{ width:200px; float:right;}' . "\r\n" . '</style>' . "\r\n" . '<form name="form_mymps" action="category.php?part=list" method="post">' . "\r\n" . '<div class="categorybox">' . "\r\n" . '<div class="categoryli first">' . "\r\n\t" . '<ul>' . "\r\n" . '        <li class="column1">编号</li>' . "\r\n" . '        <li class="column1"><input name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'if_viewids\')" class="checkbox"/>启用?</li>' . "\r\n" . '        <li class="column2">名称</li>' . "\r\n" . '        <li class="column3">操作</li>' . "\r\n" . '        <li class="column1">排列顺序</li>' . "\r\n" . '    </ul>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear" style="height:0px!important;"></div>' . "\r\n";
$i = $t = 1;

foreach ($f_cat as $cat ) {
	if ($i == 1) {
		$k = $cat['catid'];
	}
	else {
		if ((1 < $i) && ($cat['level'] == 0)) {
			$k = $cat[catid];
		}
	}

	if ($cat['level'] == 0) {
		$t = 1;
	}

	if ((1 < $i) && ($cat['level'] == 0)) {
		echo '</div>';
	}

	if ($t == 2) {
		echo '<div id="children_';
		echo $k;
		echo '" style="display:none;">';
	}

	echo '<div class="categoryli" ';
	echo $cat[level] == 0 ? 'style ="background-color:#f5fbff"' : '';
	echo '>' . "\r\n" . '  <ul>' . "\r\n" . '  <li class="column1">';
	echo $cat[catid];
	echo '</li>' . "\r\n" . '  <li class="column1"><input id="';
	echo $cat[catid];
	echo '" class="checkbox" name="if_viewids[]" value="';
	echo $cat[catid];
	echo '" type="checkbox" ';

	if ($cat[if_view] == 2) {
		echo 'checked';
	}

	echo ' /></li>' . "\r\n" . '  <li class="column2"><span class="margin';
	echo $cat['level'];
	echo ' ';

	if ($cat['parentid'] != '0') {
		echo 'son';
	}

	echo '" style="color:';
	echo $cat['color'];
	echo '">';

	if ($cat[level] == 0) {
		echo '<a href="javascript:void(0);" onclick="showchildren(';
		echo $k;
		echo ');" style="font-weight:bold"><img id="img_';
		echo $cat[catid];
		echo '" src="template/images/menu_add.gif" align="absmiddle"> ';
		echo $cat[catname];
		echo '</a>';
	}
	else {
		echo '<a href="?part=edit&catid=';
		echo $cat[catid];
		echo '">';
		echo $cat[catname];
		echo '</a>';
	}

	echo '</span></li>' . "\r\n" . '  <li class="column3"><a href="category.php?part=edit&catid=';
	echo $cat[catid];
	echo '">编辑</a> / <a href="category.php?part=del&catid=';
	echo $cat[catid];
	echo '" onClick="if(!confirm(\'确定要删除栏目吗？\\n\\n该操作将删除隶属该栏目的子栏目以及分类信息！\'))return false;">删除</a>      </li>' . "\r\n" . '  <li class="column1"><input name="catorder[';
	echo $cat[catid];
	echo ']" value="';
	echo $cat[catorder];
	echo '" class="txt" type="text"/></li>' . "\r\n" . '  </ul>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear" style="height:0px!important;"></div>' . "\r\n";
	$i++;
	$t++;
}

echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

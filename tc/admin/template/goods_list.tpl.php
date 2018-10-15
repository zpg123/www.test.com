<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<form action="?" method="get">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的商品</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">商品名称</td>' . "\r\n" . '    <td>&nbsp;<input name="goodsname" class="text" value="';
echo $goodsname;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">用户名(UserID)</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属分类</td>' . "\r\n\t" . '<td>&nbsp;<select name="catid">' . "\r\n\t" . '<option value="">==选择商品所属的分类==</option>' . "\r\n\t";
echo goods_cat_list(0, $catid);
echo "\t" . '</select></td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t" . '<li><a href="?part=list" ';

if ($type == '') {
	echo 'class="current"';
}

echo '>全部</a></li>' . "\r\n\t\t";

foreach ($goodslevel as $k => $v ) {
	echo "\t\t\t" . '<li><a href="?part=list&type=';
	echo $k;
	echo '" ';

	if ($type == $k) {
		echo 'class="current"';
	}

	echo '>';
	echo $v;
	echo '</a></li>' . "\r\n\t\t";
}

echo "\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">&nbsp;</td>' . "\r\n" . '    <td>商品名称</td>' . "\r\n" . '    <td width="100">商品分类</td>' . "\r\n\t" . '<td width="100">供货商家</td>' . "\r\n" . '    <td>发布时间</td>' . "\r\n" . '    <td>状态</td>' . "\r\n" . '    <td>操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($goods as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'selectedids[]\' value="';
	echo $row['goodsid'];
	echo '" class=\'checkbox\' id="';
	echo $row['goodsid'];
	echo '"></td>' . "\r\n" . '    <td><a href="../goods.php?id=';
	echo $row[goodsid];
	echo '" target="_blank">';
	echo $row['goodsname'];
	echo '</a>' . "\r\n\t";

	if ($row['tuijian'] == 1) {
		echo '<img src="../../plugin/goods/template/images/tuijian.gif" align="absmiddle">';
	}

	echo "\t";

	if ($row['remai'] == 1) {
		echo '<img src="../../plugin/goods/template/images/remai.gif" align="absmiddle">';
	}

	echo "\t";

	if ($row['cuxiao'] == 1) {
		echo '<img src="../../plugin/goods/template/images/cuxiao.gif" align="absmiddle">';
	}

	echo "\t" . '</td>' . "\r\n" . '    <td><a href="../goods.php?catid=';
	echo $row[catid];
	echo '" target="_blank">';
	echo $row[catname];
	echo '</a></td>' . "\r\n" . '    <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[userid];
	echo '</a></td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['dateline']);
	echo '</em></td>' . "\r\n" . '    <td>' . "\r\n" . '    ';
	echo $goodslevel[$row['onsale']];
	echo '</td>' . "\r\n" . '    <td><a href="?part=edit&id=';
	echo $row[goodsid];
	echo '">编辑</a></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    ';

foreach ($goodslevel as $k => $v ) {
	echo "\t" . '<label for="goodslevel';
	echo $k;
	echo '"><input type="radio" value="goodslevel';
	echo $k;
	echo '" id="goodslevel';
	echo $k;
	echo '" name="action" class="radio">转为';
	echo $v;
	echo '</label> ' . "\r\n" . '    ';
}

echo '     <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '     <label for="delall"><input type="radio" value="delall" id="delall" name="action" class="radio">批量删除</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="goods_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

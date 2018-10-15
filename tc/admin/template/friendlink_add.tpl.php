<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n" . 'function CheckSubmit()' . "\r\n" . '{' . "\r\n\t" . 'if(document.form1.url.value=="http://"||document.form1.url.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.url.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("网址不能为空！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.webname.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.webname.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("网站名称不能为空！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
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

echo '>网站类型管理</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<form action="friendlink.php?part=insert" method="post" enctype="multipart/form-data" name="form1" onSubmit="return CheckSubmit();";>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<input type="hidden" name="createtime" value="';
echo date('Y-m-d H:i:s', time());
echo '">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">网站概况</td>' . "\r\n" . '</tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="19%" height="25">网址：</td>' . "\r\n" . '    <td width="81%">' . "\r\n" . '        <input name="url" type=text class=text id="url" value="#" size="30" />' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">网站名称：</td>' . "\r\n" . '    <td>' . "\r\n" . '        <input name="webname" type=text class=text id="webname" size="30" />' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">网站LOGO：</td>' . "\r\n" . '    <td>' . "\r\n" . '        <input name="weblogo" type=text class=text id="weblogo" size="30"/> <br />尺寸80*35<br />' . "\r\n" . '若显示文字链接则不需添加logo地址<br />' . "\r\n" . 'logo不显示在分类页面' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr class="firstr"><td colspan="2">显示位置</td></tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">显示在网站首页？</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="ifindex" id="ifindex">' . "\r\n" . '    <option value="2">是</option>' . "\r\n\t" . '<option value="1">否</option>' . "\r\n" . '    </select> ' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">显示在该分类下：</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<select name="catid">' . "\r\n\t" . '<option value="0">不在分类显示</option>' . "\r\n\t";
echo cat_list('category', 0, 0, true, 1);
echo '  </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr class="firstr"><td colspan="2">链接类型</td></tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">网站类型：</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="typeid" id="typeid">' . "\r\n";

foreach ($links as $row ) {
	echo '    <option value="';
	echo $row[id];
	echo '">';
	echo $row[typename];
	echo '</option>' . "\r\n";
}

echo '    </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="19%" height="25">排列位置：</td>' . "\r\n" . '    <td width="81%">' . "\r\n" . '    <input name="ordernumber" type=text class=txt id="order" size="10" />' . "\r\n" . '    (数值越小，排列越靠前)' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">链接状态：</td>' . "\r\n" . '    <td>' . "\r\n" . '    <label for="1"><input type=\'radio\' name=\'ischeck\' value="1" id="1" class="radio"/> 待审</label>' . "\r\n" . '    <label for="2"><input type=\'radio\' name=\'ischeck\' value="2" checked id="2" class="radio"/> 正常</label>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="Submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

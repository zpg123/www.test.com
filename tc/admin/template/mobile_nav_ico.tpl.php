<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.vtop{ background-color:#ffffff}' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8; width:45%;}' . "\r\n" . '.ico{ width:28px; height:28px;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?">基本设置</a></li>' . "\r\n" . '                <li><a href="?type=nav">文字导航设置</a></li>' . "\r\n" . '                <li><a href="?type=nav_ico" class="current">图标导航设置(首页)</a></li>' . "\r\n" . '                <li><a href="?type=gg">幻灯片广告设置</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n\r\n";

if ($type == 'nav_ico') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>图标导航显示在首页文字主导航下方，以图标形式展示，图标尺寸建议44×44</li>' . "\r\n" . '  <li>您可以<a href="?type=restore" style="color:red; text-decoration:underline; font-weight:bold; font-size:18px">点此恢复默认图标导航&raquo;</a></li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

echo "\r\n" . '<form method="post" action="?">' . "\r\n" . '<input type="hidden" name="type" value="';
echo $type;
echo '">' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="8"><b>手机版导航设置</b></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="font-weight:bold; background-color:#F5F8FF">' . "\r\n" . '      <td width="50"><input class="checkbox" name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'delids\')"/> 删?</td>' . "\r\n" . '      <td>启用</td>' . "\r\n" . '      <td>图标路径(<font color="red">*</font>)</td>' . "\r\n" . '      <td>文字(<font color="red">*</font>)</td>' . "\r\n" . '      <td>文字颜色</td>' . "\r\n" . '      <td>链接地址(<font color="red">*</font>)</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

if (!$rows_num) {
	echo '    <tr bgcolor="#ffffff">' . "\r\n" . '         <td colspan="9"><br />目前并无手机图标导航，<a href="?type=restore" style="text-decoration:underline">点此应用默认手机图标导航&raquo;</a><br /><br /></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}
else {
	foreach ($url as $k => $value ) {
		echo "\t\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '          <td bgcolor="white"><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
		echo $value[id];
		echo '\' id="';
		echo $value[id];
		echo '"></td>' . "\r\n" . '          <td bgcolor="white" width="60px">' . "\r\n" . '          <input name="isviewids[';
		echo $value[id];
		echo ']" value="2" type="checkbox" class="checkbox" ';

		if ($value['isview'] == '2') {
			echo 'checked';
		}

		echo '></td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n";

		if ($value[ico]) {
			echo '<img class="ico" src="';
			echo $mymps_global[SiteUrl];
			echo $value[ico];
			echo '"> ';
		}

		echo '<input name="navico[';
		echo $value[id];
		echo ']" value="';
		echo $value[ico];
		echo '" type="text" class="text" style="width:280px"/>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n\t\t" . '  <input name="navtitle[';
		echo $value[id];
		echo ']" value="';
		echo $value[title];
		echo '" type="text" class="text" style="width:80px"/>' . "\r\n" . '          </td>' . "\r\n" . '          ' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '            <select name="showcolor[';
		echo $value[id];
		echo ']">' . "\r\n" . '            <option value="">默认颜色</option>' . "\r\n" . '            ';
		echo get_color_options($value[color]);
		echo '            </select>  ' . "\r\n" . '          </td>' . "\r\n" . '          ' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '<input name="navurl[';
		echo $value[id];
		echo ']" value="';
		echo $value[url];
		echo '" type="text" class="text" style="width:200px"/>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white"><input name="displayorder[';
		echo $value[id];
		echo ']" value="';
		echo $value[displayorder] ? $value[displayorder] : 0;
		echo '" type="text" class="txt"/></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
	}
}

echo '    <tbody id="secqaabody" bgcolor="white">' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td bgcolor="white" align="center">新增<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newico[]" value="" type="text" class="text" style="width:280px"></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor[]">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options();
echo '        </select>  ' . "\r\n" . '        </td>' . "\r\n" . '        ' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:200px"/></td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      ' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '    <tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center" bgcolor="white">&nbsp;</td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newico[]" value="" type="text" class="text" style="width:280px"></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options($navurl[color]);
echo '        </select>  ' . "\r\n" . '      </td>' . "\r\n" . '      ' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:200px"/></td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      ' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

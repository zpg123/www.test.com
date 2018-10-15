<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.vtop{ background-color:#ffffff}' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8; width:45%;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?">基本设置</a></li>' . "\r\n" . '                <li><a href="?type=nav" class="current">文字导航设置</a></li>' . "\r\n" . '                <li><a href="?type=nav_ico">图标导航设置(首页)</a></li>' . "\r\n" . '                <li><a href="?type=gg">幻灯片广告设置</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form method="post" action="?">' . "\r\n" . '<input type="hidden" name="type" value="';
echo $type;
echo '">' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="10"><b>手机版导航设置</b></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="font-weight:bold; background-color:#F5F8FF">' . "\r\n" . '      <td width="50"><input class="checkbox" name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'delids\')"/> 删?</td>' . "\r\n" . '      <td>启用</td>' . "\r\n" . '      <td>文字(<font color="red">*</font>)</td>' . "\r\n" . '      <td>窗口打开形式</td>' . "\r\n" . '      <td>文字颜色</td>' . "\r\n" . '      <td>链接地址(<font color="red">*</font>)</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>标识</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

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

	echo '></td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '<input name="navtitle[';
	echo $value[id];
	echo ']" value="';
	echo $value[title];
	echo '" type="text" class="text" style="width:80px"/>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">  ' . "\r\n" . '            <select name="target[';
	echo $value[id];
	echo ']">' . "\r\n" . '            ';
	echo get_target_options($value[target]);
	echo '            </select>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '            <select name="showcolor[';
	echo $value[id];
	echo ']">' . "\r\n" . '            <option value="">默认颜色</option>' . "\r\n" . '            ';
	echo get_color_options($value[color]);
	echo '            </select>  ' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '<input name="navurl[';
	echo $value[id];
	echo ']" value="';
	echo $value[url];
	echo '" type="text" class="text" style="width:150px"/>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white"><input name="displayorder[';
	echo $value[id];
	echo ']" value="';
	echo $value[displayorder] ? $value[displayorder] : 0;
	echo '" type="text" class="txt"/></td>' . "\r\n" . '          <td bgcolor="white"><input name="flag[';
	echo $value[id];
	echo ']" value="';
	echo $value[flag] ? $value[flag] : 'outlink';
	echo '" type="text" class="txt"/>&nbsp;</td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '    <tbody id="secqaabody" bgcolor="white">' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td bgcolor="white" align="center">新增<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '        <td bgcolor="white">  ' . "\r\n" . '        <select name="newtarget[]">' . "\r\n" . '        ';
echo get_target_options();
echo '        </select>' . "\r\n" . '        </td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor[]">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options();
echo '        </select>  ' . "\r\n" . '        </td>' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:150px"/></td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td bgcolor="white" colspan="2"><input name="newflag[]" value="outlink" type="text" class="txt"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '    <tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center" bgcolor="white">&nbsp;</td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '      <td bgcolor="white">  ' . "\r\n" . '        <select name="newtarget">' . "\r\n" . '        ';
echo get_target_options($navurl[target]);
echo '        </select>' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options($navurl[color]);
echo '        </select>  ' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:150px"/></td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td bgcolor="white" colspan="2"><input name="newflag[]" value="outlink" type="text" class="txt"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

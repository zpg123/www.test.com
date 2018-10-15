<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '            ';

foreach ($nav_type as $navtype => $v ) {
	echo '                <li><a href="?typeid=';
	echo $navtype;
	echo '" ';

	if ($typeid == $navtype) {
		echo 'class="current"';
	}

	echo '>';
	echo $v;
	echo '</a></li>' . "\r\n" . '            ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n";

if ($typeid == '2') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>尾部导航文字链接显示在页面底部</li>' . "\r\n" . '  <li>您可以<a href="?part=restorefooter" style="color:red; text-decoration:underline; font-weight:bold; font-size:18px">点此恢复默认尾部导航链接&raquo;</a></li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($typeid == '1') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>副导航文字链接显示在主导航栏目的下端</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($typeid == '3') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>主导航文字链接只显示10个链接，您可以调整显示顺序以及启用状态来达到最佳显示效果</li>' . "\r\n" . '  <li>如是外部链接地址，请务必加上 <font color="#006acd">http://</font>， 标识填写 <font color="#006acd">outlink</font></li>' . "\r\n" . '  <li>您也可以<a href="?part=restore" style="color:red; text-decoration:underline; font-weight:bold; font-size:18px">点此恢复默认主导航链接&raquo;</a></li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

echo '<form name=\'form1\' method=\'post\' action=\'navurl.php\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="10"><b>';
echo $nav_type[$typeid];
echo '</b></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="font-weight:bold; background-color:#F5F8FF">' . "\r\n" . '      <td width="50"><input class="checkbox" name="chkall" type="checkbox" onclick="AllCheck(\'prefix\', this.form, \'delids\')"/> 删?</td>' . "\r\n" . '      <td>启用</td>' . "\r\n" . '      <td>文字(<font color="red">*</font>)</td>' . "\r\n" . '      <td>图标</td>' . "\r\n" . '      <td>窗口打开形式</td>' . "\r\n" . '      <td>文字颜色</td>' . "\r\n" . '      <td>链接地址(<font color="red">*</font>)</td>' . "\r\n" . '      <td>类型</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      ';

if ($typeid != '3') {
	echo '<td>&nbsp;</td>';
}

echo '      ';

if ($typeid == '3') {
	echo '<td>标识</td>';
}

echo '    </tr>' . "\r\n" . '    ';
if (($typeid == 3) && empty($rows_num)) {
	echo '     <tr bgcolor="#ffffff">' . "\r\n" . '          <td colspan="9"><br />目前并无主导航文字链接，<a href="?part=restore">点此应用默认导航文字链接&raquo;</a><br />' . "\r\n" . '<br />' . "\r\n" . '</td>' . "\r\n" . '      </tr>' . "\r\n" . '  ';
}
else {
	if (($typeid == 2) && empty($rows_num)) {
		echo '     <tr bgcolor="#ffffff">' . "\r\n" . '          <td colspan="9"><br />目前并无尾部导航文字链接，<a href="?part=restorefooter">点此应用默认导航文字链接&raquo;</a><br /><br />' . "\r\n" . '</td>' . "\r\n" . '      </tr>' . "\r\n" . '  ';
	}
	else {
		foreach ($url as $k => $value ) {
			echo '        <tr bgcolor="#ffffff">' . "\r\n" . '          <td bgcolor="white"><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
			echo $value[id];
			echo '\' id="';
			echo $value[id];
			echo '"></td>' . "\r\n" . '          <td bgcolor="white" width="60px">' . "\r\n" . '          <input name="isviewids[';
			echo $value[id];
			echo ']" value="2" type="checkbox" class="checkbox" ';

			if ($value['isview'] == '2') {
				echo 'checked';
			}

			echo '></td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '          ';

			if ($typeid == '3') {
				echo '<input name="navtitle[';
				echo $value[id];
				echo ']" value="';
				echo $value[title];
				echo '" type="text" class="text" style="width:80px"/>' . "\r\n" . '          ';
			}
			else {
				echo '          <input name="navtitle[';
				echo $value[id];
				echo ']" value="';
				echo $value[title] ? $value[title] : $value[name];
				echo '" type="text" class="text" style="width:80px"/>' . "\r\n" . '          ';
			}

			echo '          </td>' . "\r\n" . '          <td bgcolor="white">  ' . "\r\n" . '          <select name="icoids[';
			echo $value[id];
			echo ']">' . "\r\n" . '          ' . "\t" . '<option value="" ';

			if ($value['ico'] == '') {
				echo 'selected';
			}

			echo '>无</option>' . "\r\n" . '            <option value="re" ';

			if ($value['ico'] == 're') {
				echo 'selected';
			}

			echo '>热</option>' . "\r\n" . '            <option value="xin" ';

			if ($value['ico'] == 'xin') {
				echo 'selected';
			}

			echo '>新</option>' . "\r\n" . '            <option value="qiang" ';

			if ($value['ico'] == 'qiang') {
				echo 'selected';
			}

			echo '>抢</option>' . "\r\n" . '          </select>    ' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">  ' . "\r\n" . '            <select name="target[';
			echo $value[id];
			echo ']">' . "\r\n" . '            ';
			echo get_target_options($value[target]);
			echo '            </select>' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '            <select name="showcolor[';
			echo $value[id];
			echo ']">' . "\r\n" . '            <option value="">默认颜色</option>' . "\r\n" . '            ';
			echo get_color_options($value[color]);
			echo '            </select>  ' . "\r\n" . '          </td>' . "\r\n" . '          <td bgcolor="white">' . "\r\n" . '          ';

			if ($typeid == '3') {
				echo '<input name="navurl[';
				echo $value[id];
				echo ']" value="';
				echo $value[url];
				echo '" type="text" class="text" style="width:150px"/>' . "\r\n" . '          ';
			}
			else {
				echo '          ' . "\t" . '<input name="navurl[';
				echo $value[id];
				echo ']" value="';
				echo $value[url] ? $value[url] : $value[uri];
				echo '" type="text" class="text" style="width:150px"/>' . "\r\n" . '          ';
			}

			echo '          </td>' . "\r\n" . '          <td bgcolor="white">';
			echo $nav_type[$typeid];
			echo '</td>' . "\r\n" . '          <td bgcolor="white"><input name="displayorder[';
			echo $value[id];
			echo ']" value="';
			echo $value[displayorder] ? $value[displayorder] : 0;
			echo '" type="text" class="txt"/></td>' . "\r\n" . '          ';

			if ($typeid == '3') {
				echo '<td bgcolor="white"><input name="flag[';
				echo $value[id];
				echo ']" value="';
				echo $value[flag] ? $value[flag] : 'outlink';
				echo '" type="text" class="txt"/>&nbsp;</td>';
			}

			echo '          ';

			if ($typeid != '3') {
				echo '<td bgcolor="white">&nbsp;</td>';
			}

			echo '        </tr>' . "\r\n" . '    ';
		}
	}
}

echo "\r\n" . '    <tbody id="secqaabody" bgcolor="white">' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td bgcolor="white" align="center">新增<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newico[]">' . "\r\n" . '        <option value="" >无</option>' . "\r\n" . '        <option value="re" >热</option>' . "\r\n" . '        <option value="xin" >新</option>' . "\r\n" . '        <option value="qiang" >抢</option>' . "\r\n" . '        </select>    ' . "\r\n" . '      </td>' . "\r\n" . '        <td bgcolor="white">  ' . "\r\n" . '        <select name="newtarget[]">' . "\r\n" . '        ';
echo get_target_options();
echo '        </select>' . "\r\n" . '        </td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor[]">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options();
echo '        </select>  ' . "\r\n" . '        </td>' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:150px"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '      ';
echo $nav_type[$typeid];
echo '      <input name="newtypeid[]" value="';
echo $typeid;
echo '" type="hidden" />' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td bgcolor="white" colspan="2"><input name="newflag[]" value="outlink" type="text" class="txt"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '    <tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center" bgcolor="white">&nbsp;</td>' . "\r\n" . '      <td bgcolor="white"><select name="newisview[]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '      <td bgcolor="white"><input name="newtitle[]" value="" type="text" class="text" style="width:80px;"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '      <select name="newico[]">' . "\r\n" . '        <option value="" >无</option>' . "\r\n" . '        <option value="re" >热</option>' . "\r\n" . '        <option value="xin" >新</option>' . "\r\n" . '        <option value="qiang" >抢</option>' . "\r\n" . '        </select>  ' . "\r\n" . '      </td>' . "\r\n" . '    <td bgcolor="white">  ' . "\r\n" . '        <select name="newtarget">' . "\r\n" . '        ';
echo get_target_options($navurl[target]);
echo '        </select>' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '        <select name="newshowcolor">' . "\r\n" . '        <option value="">默认颜色</option>' . "\r\n" . '        ';
echo get_color_options($navurl[color]);
echo '        </select>  ' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white"><input name="newurl[]" value="" type="text" class="text" style="width:150px"/></td>' . "\r\n" . '      <td bgcolor="white">' . "\r\n" . '      ';
echo $nav_type[$typeid];
echo '      <input name="newtypeid[]" value="';
echo $typeid;
echo '" type="hidden" />' . "\r\n" . '      </td>' . "\r\n" . '      <td bgcolor="white"><input name="newdisplayorder[]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td bgcolor="white" colspan="2"><input name="newflag[]" value="outlink" type="text" class="txt"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="navurl_submit"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

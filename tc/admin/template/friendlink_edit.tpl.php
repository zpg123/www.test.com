<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="friendlink.php?part=list">已增加友情链接</a></li>' . "\r\n" . '                <li><a href="friendlink.php?part=add">增加友情链接</a></li>' . "\r\n" . '                <li><a href="friendlink.php?do=type">网站类型管理</a></li>' . "\r\n\t\t\t\t" . '<li><a href="friendlink.php?part=edit&id=';
echo $id;
echo '" class="current">编辑链接</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form action="friendlink.php?part=update&id=';
echo $link[id];
echo '" method="post" enctype="multipart/form-data" name="form1" onSubmit="return CheckSubmit();";>' . "\r\n" . '    <input type="hidden" name="createtime" value="';
echo date('Y-m-d H:i:s', time());
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '        <td colspan="5">' . "\r\n" . '        <div class="left"><a href="javascript:collapse_change(\'1\')">网站概况</a></div>' . "\r\n" . '        <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tbody id="menu_1">' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">网址：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="url" type=text class=text id="url" value="';
echo $link[url];
echo '" size="30" />        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">网站名称：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="webname" type=text class=text id="webname" size="30" value="';
echo $link[webname];
echo '"/>        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">网站LOGO：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="weblogo" type=text class=text id="webname" size="30" value="';
echo $link[weblogo];
echo '"/> <br />尺寸80*35<br />' . "\r\n" . '若显示文字链接则不需添加logo地址<br />' . "\r\n" . 'logo不显示在分类页面</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">PR值</td>' . "\r\n" . '        <td>' . "\r\n\t\t";
echo apply_flink_pr($link[pr]);
echo "\t\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">日IP</td>' . "\r\n" . '        <td>' . "\r\n" . '        ';
echo apply_flink_dayip($link[dayip]);
echo "\t" . '    ' . "\r\n\t\t" . '</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">网站简况：</td>' . "\r\n" . '        <td><textarea name="msg" cols="50" rows="5" id="msg">';
echo de_textarea_post_change($link[msg]);
echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n" . '      </tbody>' . "\r\n" . '      </table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      <td colspan="3">' . "\r\n" . '        <div class="left"><a href="javascript:collapse_change(\'2\')">联系方式</a></div>' . "\r\n" . '        <div class="right"><a href="javascript:collapse_change(\'2\')"><img id="menuimg_2" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '       </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tbody id="menu_2">' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25" width="19%">站长姓名：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="name" type=text class=text id="name" size="30"  value="';
echo $link[name];
echo '"/>        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">站长QQ：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="qq" type=text class=text id="qq" size="30"  value="';
echo $link[qq];
echo '"/>        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">站长Email：</td>' . "\r\n" . '        <td>' . "\r\n" . '        ' . "\t" . '<input name="email" type=text class=text id="email" size="30"  value="';
echo $link[email];
echo '"/>        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      </tbody>' . "\r\n" . '      </table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '     <tr class="firstr">' . "\r\n" . '        <td colspan="3">' . "\r\n" . '         <div class="left"><a href="javascript:collapse_change(\'3\')">其他属性</a></div>' . "\r\n" . '         <div class="right"><a href="javascript:collapse_change(\'3\')"><img id="menuimg_3" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tbody id="menu_3">' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">网站类型：</td>' . "\r\n" . '        <td>' . "\r\n" . '        <select name="typeid" id="typeid">' . "\r\n\t\t";
echo webtype_option($link[typeid]);
echo '        </select>' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">链接状态：</td>' . "\r\n" . '        <td>' . "\r\n" . '        <label><input class="radio" type=\'radio\' name=\'ischeck\' value="1" ';

if ($link[ischeck] == '1') {
	echo 'checked=\'checked\'';
}

echo '> 待审</label>' . "\r\n" . '        <label><input type=\'radio\' class="radio" name=\'ischeck\' value="2" ';

if ($link[ischeck] == '2') {
	echo 'checked=\'checked\'';
}

echo '> 正常</label>' . "\r\n" . '                </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">排列序号：</td>' . "\r\n" . '        <td>' . "\r\n" . '<input name="ordernumber" type=text class=txt id="order" value="';
echo $link[ordernumber];
echo '"/>        ' . "\r\n" . '(由小到大排列)        ' . "\r\n\t\t" . '</td>' . "\r\n" . '      </tr>' . "\r\n" . '</tbody>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">显示位置</td></tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="19%" height="25">显示在网站首页？</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="ifindex" id="ifindex">' . "\r\n" . '    <option value="2" ';

if ($link[ifindex] == 2) {
	echo 'selected';
}

echo '>是</option>' . "\r\n\t" . '<option value="1" ';

if ($link[ifindex] == 1) {
	echo 'selected';
}

echo '>否</option>' . "\r\n" . '    </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="25">显示在该分类下：</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<select name="catid">' . "\r\n\t" . '<option value="0" ';

if ($link[catid] == 0) {
	echo 'selected';
}

echo '>不在分类显示</option>' . "\r\n\t";
echo cat_list('category', 0, $link['catid'], true, 3);
echo '  </select>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '      </tbody>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

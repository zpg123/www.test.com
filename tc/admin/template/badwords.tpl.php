<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=imgcode" ';

if ($part == 'imgcode') {
	echo 'class="current"';
}

echo '>验证码控制</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=checkask" ';

if ($part == 'checkask') {
	echo 'class="current"';
}

echo '>验证问答设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=badwords" ';

if ($part == 'badwords') {
	echo 'class="current"';
}

echo '>过滤设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=commentsettings" ';

if ($part == 'commentsettings') {
	echo 'class="current"';
}

echo '>评论点评设置</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=badwords" method="post" name="form1">' . "\r\n" . '<input name="action" value="dopost" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="5">' . "\r\n" . '<a name="#禁止词语过滤设置"></a>' . "\r\n" . '    <div class="left">' . "\r\n" . '    <a href="javascript:collapse_change(\'10\')">脏话，禁止词语过滤设置</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'10\')"><img id="menuimg_10" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n\t" . '<tbody id="menu_10" style="display:">' . "\r\n" . '    <tr bgcolor="#f5fbff" >' . "\r\n" . '      <td style="width:100px; line-height:22px">' . "\r\n" . '      信息中禁止出现的词语，用","分开 </td>' . "\r\n" . '      <td colspan="2">' . "\r\n" . '      <textarea name="cfg_badwords0" style=" width:350px; height:120px">';
echo $filter[words];
echo '</textarea>' . "\r\n" . '      </td>' . "\r\n\r\n" . '    </tr>' . "\r\n" . '   <tr bgcolor="#f5fbff" >' . "\r\n" . '   <td style="width:100px; line-height:22px">' . "\r\n" . '      禁止词语的替代词语' . "\r\n" . '      </td>' . "\r\n" . '      <td colspan="2">' . "\r\n" . '       <input name="cfg_badwords1" value="';
echo $filter[view];
echo '" class="text" type="text"/>' . "\r\n" . '      </td>' . "\r\n" . '   </tr>' . "\r\n" . '<tr bgcolor="#f5fbff" >' . "\r\n" . '   <td style="width:35%; line-height:22px">' . "\r\n" . '      当出现违禁词语时，是否自动转为待审核状态<br />（包括分类信息、分类信息评论、网站留言等等）<br />' . "\r\n" . '<i style="color:red">注意：该设置在您关闭了信息审核和评论审核的功能下生效 </i>     </td>' . "\r\n" . '      <td colspan="2">' . "\r\n" . '      <select name="cfg_badwords2" />' . "\r\n" . '      ' . "\t" . '<option value="1" ';

if ($filter[ifcheck] == 1) {
	echo 'style=\'background-color:#6EB00C;color:white\' selected';
}

echo '>是/开启</option>' . "\r\n" . '        <option value="0" ';

if ($filter[ifcheck] == 0) {
	echo 'style=\'background-color:#6EB00C;color:white\' selected';
}

echo '>否/关闭</option>' . "\r\n" . '      </select>' . "\r\n" . '      </td> ' . "\r\n" . '   </tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" type="submit" > ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

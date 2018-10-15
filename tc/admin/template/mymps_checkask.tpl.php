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

echo '>评论点评设置</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>验证问题应该言简意赅，没有歧义，正常人都能够正确作答。请经常更新验证问答的问题及答案以防止被猜测！</li>' . "\r\n" . ' <li>验证问答功能要求会员必须正确回答系统<font color=red>随机抽取</font>的问题才能继续操作，可以避免恶意注册或发布信息，请选择需要打开验证问答的操作。</li>' . "\r\n" . ' <li>注意: 启用该功能会使得部分操作变得繁琐，建议仅在必需时打开</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<form action="?part=checkask" method="post">' . "\r\n" . '<input name="action" type="hidden" value="do_post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    ' . "\t" . '<td colspan="2">验证问答设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '        <td width="45%"><b>启用验证问答:</td>' . "\r\n" . '        <td><label for="whenregister"><input class="checkbox" type="checkbox" name="whenregister" id="whenregister" value="1" ';

if ($when['whenregister'] == '1') {
	echo 'checked';
}

echo '> 新用户注册</label> <label for="whenpost"><input class="checkbox" type="checkbox" name="whenpost" value="1" ';

if ($when['whenpost'] == '1') {
	echo 'checked';
}

echo ' id="whenpost"> 发布分类信息</label></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="3">验证问答及答案设置</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5f8ff" style="font-weight:bold">' . "\r\n" . '      <td>删？</td>' . "\r\n" . '      <td>问题</td>' . "\r\n" . '      <td>答案</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($c as $key => $val ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '        <td><input class="checkbox" type="checkbox" name="delete[]" value="';
	echo $val['id'];
	echo '"></td>' . "\r\n" . '        <td><textarea name="question[';
	echo $val['id'];
	echo ']" rows="3" cols="60">';
	echo $val['question'];
	echo '</textarea></td>' . "\r\n" . '        <td><input type="text" name="answer[';
	echo $val['id'];
	echo ']" size="30" maxlength="50" value="';
	echo $val['answer'];
	echo '"></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '   <tbody id="secqaabody" bgcolor="white">' . "\r\n" . '   <tr align="center">' . "\r\n" . '       <td>新增:<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '       <td><textarea name="newquestion[]" rows="3" cols="60"></textarea></td>' . "\r\n" . '       <td><input type="text" name="newanswer[]" size="30" maxlength="50"></td>' . "\r\n" . '   </tr>' . "\r\n" . '   </tbody>' . "\r\n" . '   ' . "\r\n" . '   <tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '       <tr align="center" bgcolor="white">' . "\r\n" . '       <td>&nbsp;</td>' . "\r\n" . '       <td><textarea name="newquestion[]" rows="3" cols="60"></textarea></td>' . "\r\n" . '       <td><input type="text" name="newanswer[]" size="30" maxlength="50"></td>' . "\r\n" . '       </tr>' . "\r\n" . '   </tbody>' . "\r\n" . '   ' . "\r\n" . '   <tr bgcolor="#f5f8ff">' . "\r\n" . '   <td colspan=3>建议您设置 10 个以上验证问题及答案，验证问题越多，验证问答防止恶意注册或发布信息的效果越明显。问题支持 HTML 代码，答案长度不超过 50 字节</td>' . "\r\n" . '   </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" type="submit" > &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

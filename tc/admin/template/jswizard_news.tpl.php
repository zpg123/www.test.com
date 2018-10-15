<?php

include mymps_tpl('inc_head');
echo '<script language="javascript">' . "\r\n" . 'function isUndefined(variable) {' . "\r\n\t" . 'return typeof variable == \'undefined\' ? true : false;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit(text) {' . "\r\n\t" . '$obj(\'jstemplate\').focus();' . "\r\n\t" . 'if(!isUndefined($obj(\'jstemplate\').selectionStart)) {' . "\r\n\t\t" . 'var opn = $obj(\'jstemplate\').selectionStart + 0;' . "\r\n\t\t" . '$obj(\'jstemplate\').value = $obj(\'jstemplate\').value.substr(0, $obj(\'jstemplate\').selectionStart) + text + $obj(\'jstemplate\').value.substr($obj(\'jstemplate\').selectionEnd);' . "\r\n\t" . '} else if(document.selection && document.selection.createRange) {' . "\r\n\t\t" . 'var sel = document.selection.createRange();' . "\r\n\t\t" . 'sel.text = text.replace(/\\r?\\n/g, \'\\r\\n\');' . "\r\n\t\t" . 'sel.moveStart(\'character\', -strlen(text));' . "\r\n\t" . '} else {' . "\r\n\t\t" . '$obj(\'jstemplate\').value += text;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.jswizard{ padding:10px 0; line-height:22px}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?part=settings">基本设置</a></li>' . "\r\n" . '                <li><a href="?" class="current">调用项目管理</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n";

if ($id) {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr"><td>预览</td></tr>' . "\r\n\t" . '<tbody style="display: yes; background-color:white">' . "\r\n\t" . '<tr><td><div class="jswizard"><script language="javascript" src="../javascript.php?flag=';
	echo $flag;
	echo '" ';

	if ($parameter['jscharset'] == 1) {
		echo 'charset="utf-8"';
	}

	echo '></script></div>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

echo '<form action="?" method="post">' . "\r\n" . '<input name="customtype" value="news" type="hidden">' . "\r\n" . '<input name="id" value="';
echo $id;
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr"><td colspan="3">网站新闻数据调用模板</td></tr>' . "\r\n" . '    <tbody>' . "\r\n" . '    <tr>' . "\r\n" . '    <td><a href="###" title="含链接" onclick="insertunit(\'{title}\')">{title}</a>，<a href="###" title="不含链接" onclick="insertunit(\'{title_nolink}\')">{title_nolink}</a> 代表新闻标题</td>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{imgpath}\')">{imgpath}</a> 代表新闻缩略图地址</td>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{introduce}\')">{introduce}</a> 代表新闻简短内容</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{catname}\')">{catname}</a> 代表新闻所在栏目的名称</td>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{begintime}\')">{begintime}</a> 代表新闻发布时间</td>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{link}\')">{link}</a> 代表新闻链接</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td><a href="###" onclick="insertunit(\'{hit}\')">{hit}</a> 代表阅读数</td>' . "\r\n" . '    <td>&nbsp;</td>' . "\r\n" . '    <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '    <td colspan="3">' . "\r\n" . '    <textarea cols="100" rows="5" id="jstemplate" name="parameter[jstemplate]" style="width: 95%;">';
echo $parameter['jstemplate'] ? $parameter['jstemplate'] : '<li>{title}</li>';
echo '</textarea>' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">主题列表</td></tr>' . "\r\n" . '<tbody id="menu_4d4985d65fe805ed" style="display: yes; background-color:white">' . "\r\n" . '<tr><td width="45%" class="altbg1" ><b>标签名/数据调用唯一标识:</b><br /><span class="smalltxt">请输入一个便于记忆的能代表此数据调用脚本作用的标识，建议用英文及数字表示</span></td><td class="altbg2"><input type="text" class="text" size="50" name="flag" value="';
echo $flag;
echo '" >' . "\r\n" . '</td></tr>' . "\r\n" . '<tr>' . "\r\n" . '<td width="45%" class="altbg1" ><b>所在栏目:</b><br /><span class="smalltxt">设置允许参与新帖调用的版块，可以按住 CTRL 多选，全选或全不选均为不做限制</span>' . "\r\n" . '</td>' . "\r\n" . '<td class="altbg2">' . "\r\n" . '<select name="parameter[catid]">' . "\r\n" . '<option value="" >&nbsp;> 全部新闻栏目</option>' . "\r\n";
echo cat_list('channel', 0, $parameter[catid], true);
echo '</select>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr><td width="45%" class="altbg1" ><b>显示新闻条数:</b><br /><span class="smalltxt">设置一次显示的新闻条数，请设置为大于 0 的整数</span></td><td class="altbg2"><input type="text" class="text" size="50" name="parameter[items]" value="';
echo $parameter[items];
echo '" >' . "\r\n" . '</td></tr><tr><td width="45%" class="altbg1" ><b>标题最大字节数:</b><br /><span class="smalltxt">设置当标题长度超过本设定时，是否将标题自动缩减到本设定中的字节数，0 为不自动缩减</span></td><td class="altbg2"><input type="text" class="text" size="50" name="parameter[maxlength]" value="';
echo $parameter[maxlength];
echo '" >' . "\r\n" . '</td></tr>' . "\r\n" . '<tr><td width="45%" class="altbg1" ><b>只显示指定类型新闻主题:</b><br /><span class="smalltxt">设置特定的主题范围，注意: 全选或全不选均为不进行任何过滤</span></td>' . "\r\n" . '<td class="altbg2">' . "\r\n";
echo get_special_news($parameter['special']);
echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr><td width="45%" class="altbg1" ><b>链接打开位置:</b><br /><span class="smalltxt">设置链接开启的位置</span></td><td class="altbg2"><label for="_self"><input class="radio" type="radio" name="parameter[newwindow]" value="0" id="_self" ';

if ($parameter[newwindow] == 0) {
	echo 'checked';
}

echo '> 在当前窗口打开</label><br /><label for="_target"><input class="radio" type="radio" name="parameter[newwindow]" value="1" id="_target" ';

if ($parameter[newwindow] == 1) {
	echo 'checked';
}

echo '> 在新窗口打开</label></td></tr><tr><td width="45%" class="altbg1" ><b>新闻排序方式:</b><br /><span class="smalltxt">设置以哪一字段对主题进行排序</span></td><td class="altbg2"><label for="dateline"><input class="radio" type="radio" name="parameter[orderby]" value="dateline" id="dateline" ';
if (($parameter[orderby] == 'dateline') || !$parameter) {
	echo 'checked';
}

echo '> 按发布时间倒序排序</label><br /><label for="views"><input class="radio" type="radio" name="parameter[orderby]" value="views" id="views" ';

if ($parameter[orderby] == 'views') {
	echo 'checked';
}

echo '> 按浏览次数倒序排序</label></td></tr>' . "\r\n" . '<tr><td width="45%" class="altbg1" ><b>强制字符转换:</b><br /><span class="smalltxt">强制转换数据调用输出的文字为 UTF-8 编码</span></td><td class="altbg2"><label for="jacharset"><input class="radio" type="radio" name="parameter[jscharset]" value="1" ';

if ($parameter[jscharset] == 1) {
	echo 'checked';
}

echo ' id="jscharset"> 是</label> &nbsp; &nbsp; ' . "\r\n" . '<label for="no_jscharset"><input class="radio" type="radio" name="parameter[jscharset]" value="0" id="no_jscharset" ';

if ($parameter[jscharset] == 0) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n" . '</td></tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="提 交"><input name="preview" type="hidden" value="1"></center></form><br /></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

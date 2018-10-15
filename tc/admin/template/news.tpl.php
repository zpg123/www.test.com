<?php

include mymps_tpl('inc_head');
echo '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'function do_copy(){' . "\r\n" . '  ff = document.form1;' . "\r\n" . '  ff.keywords.value=document.getElementById("title").value;' . "\r\n" . '}' . "\r\n" . 'function NewsAdd(){' . "\r\n\t" . 'if(document.form1.title.value==""){' . "\r\n\t\t" . 'alert(\'请填写新闻标题！\');' . "\r\n\t\t" . 'document.form1.title.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.catid.value==""){' . "\r\n\t\t" . 'alert(\'请选择所属栏目！\');' . "\r\n\t\t" . 'document.form1.catid.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form.catname.value.length<2){' . "\r\n\t\t" . 'alert(\'栏目标题请控制在2个字节以上!\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<title>';
echo $part == 'edit' ? '修改文章' : '增加文章';
echo '</title>' . "\r\n" . '</head>' . "\r\n" . '<body ';

if ($row[isjump] == 1) {
	echo 'onload=\'HidUrlTr()\'';
}

echo '>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="news.php" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>新闻列表</a></li>' . "\r\n\t\t\t\t" . '<li><a href="news.php?part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>添加新闻</a></li>' . "\r\n\t\t\t\t\r\n\t\t\t\t";
if (($part == 'edit') && $row[id]) {
	echo '<li><a href="news.php?part=edit&id=';
	echo $row[id];
	echo '" class="current">编辑新闻</a></li>';
}

echo "\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>若选择了幻灯片轮显，请务必上传或指定缩略图路径，否则将无法成功发布新闻</li>' . "\r\n" . '  <li>注意：正文内容添加时(特殊情况外)请勿直接从word拷贝！！！</li>' . "\r\n" . '  <li>分段，文章的段首空两格，与传统格式保持一致，因网上看文章较费眼睛，段与段之间空一行可以使文章更清晰易看。</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name="form1" action="?part=';
echo $part;
echo '" method="post" onSubmit="return NewsAdd();">' . "\r\n" . '<input type="hidden" name="id" value="';
echo $row[id];
echo '">' . "\r\n" . '<input type="hidden" name="html_path" value="';
echo $row[html_path] == '/html/news' ? '' : $row['html_path'];
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">常规内容</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style=" background-color:#FFF">' . "\r\n" . '  <td width="135">&nbsp;文章标题：</td>' . "\r\n" . '  <td><input name="title" type="text" class="text" id="title" style="width:300px" value="';
echo $row[title];
echo '"/>    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr style=" background-color:#FFF">' . "\r\n" . '  <td width="135" height="20">&nbsp;文章主栏目：</td>' . "\r\n" . '  <td>' . "\r\n" . '  <select name=\'catid\' style=\'width:300px\'>' . "\r\n" . '  <option value=\'\'>请选择主分类...</option>' . "\r\n" . '  ';
echo cat_list('channel', 0, $row[catid]);
echo '</select></td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr style="background-color:#FFF;" >' . "\r\n" . '  <td width="135">&nbsp;作者：</td>' . "\r\n" . '  <td colspan="2"><input name="author" type="text" class="text" value="';
echo $row[author] ? $row[author] : $admin_uname;
echo '" style="width:300px"/>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#FFF;" >' . "\r\n" . '  <td width="135">&nbsp;来源：</td>' . "\r\n" . '  <td colspan="2"><input name="from" type="text" class="text" value="';
echo $row[source] ? $row[source] : $mymps_global[SiteName];
echo '" style="width:300px"/>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style=" background-color:#FFF"> ' . "\r\n" . '<td width="135">&nbsp;关键词：</td>' . "\r\n" . '<td>' . "\r\n" . '  <input name="keywords" type="text" class="text" id="keywords" style="width:300px" value="';
echo $row[keywords];
echo '">      若与标题相同请<a href="javascript:do_copy();">点此复制</a>(多个词用,分开)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">附加设置</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#FFF;">' . "\r\n" . '  <td width="135">&nbsp;附加参数：</td>' . "\r\n" . '  <td colspan="2">' . "\r\n" . '    <label for="iscommend"><input name="iscommend" type="checkbox" class="checkbox" id="iscommend" value="1"  ';

if ($row[iscommend] == 1) {
	echo 'checked';
}

echo '/>推荐</label>' . "\r\n" . '    <label for="isbold"><input name="isbold" type="checkbox" class="checkbox" id="isbold" value="1" ';

if ($row[isbold] == 1) {
	echo 'checked';
}

echo '/>加粗</label>' . "\r\n" . '    <label for="isjump"><input name="isjump" type="checkbox" class="checkbox" id="isjump" value="1" onClick="ShowUrlTr()" ';

if ($row[isjump] == 1) {
	echo 'checked';
}

echo '/>跳转网址</label>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#FFF;">' . "\r\n" . '  <td width="135">&nbsp;幻灯片轮显：</td>' . "\r\n" . '  <td colspan="2">' . "\r\n" . '    <label for="indexfocus"><input name="isfocus[]" type="checkbox" class="checkbox" id="indexfocus" value="index"  ';

if ($row[isfocus] == 'index') {
	echo 'checked';
}

echo '/>首页</label>' . "\r\n" . '    <label for="newsfocus"><input name="isfocus[]" type="checkbox" class="checkbox" id="newsfocus" value="news"  ';

if ($row[isfocus] == 'news') {
	echo 'checked';
}

echo '/>新闻页</label>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n";

if ($part == 'add') {
	echo '<tr id="pictable" style=" background-color:#FFF">' . "\r\n" . '    <td width="135" height="81">&nbsp;缩略图路径：</td>' . "\r\n" . '    <td>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "none";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "none";' . "\r\n" . '        \' name="ifout" value="bodyimg" class="radio" checked="checked" />自动提取[提取文章第一张图片]</label>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "none";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "block";\' name="ifout" value="no" class="radio"/>远程图片</label>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "block";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "block";\' name="ifout" value="yes" class="radio"/>本地上传</label>' . "\r\n" . '        <input name=imgpath id="imgsrc" type="text" class="text" value="';
	echo $row[imgpath];
	echo '" style=" margin:10px 0; display:none; width:300px"/>' . "\r\n" . '         ' . "\r\n" . '        <iframe src="include/upfile.php?destination=news&watermark=0" width="450" frameborder="0" scrolling="no" onload="this.height=iFrame1.document.body.scrollHeight" id="iframe" style="display:none; margin-top:10px"></iframe>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n";
}
else {
	echo '<tr id="pictable" style=" background-color:#FFF">' . "\r\n" . '    <td width="135" height="81">&nbsp;缩略图路径：</td>' . "\r\n" . '    <td>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "none";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "none";' . "\r\n" . '        \' name="ifout" value="bodyimg" class="radio"/>自动提取[提取文章第一张图片]</label>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "none";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "block";\' name="ifout" value="no" class="radio"  checked="checked"/>远程图片</label>' . "\r\n" . '        <label><input type="radio" onclick=\'' . "\r\n" . '        document.getElementById("iframe").style.display = "block";' . "\r\n" . '        document.getElementById("imgsrc").style.display = "block";\' name="ifout" value="yes" class="radio"/>本地上传</label><br>' . "\r\n" . '        <input name=imgpath id=imgsrc type="text" class="text" value="';
	echo $row[imgpath];
	echo '" style=" margin:10px 0; width:300px"/>' . "\r\n" . '         ' . "\r\n" . '        <iframe src="include/upfile.php?destination=news&watermark=0" width="450" frameborder="0" scrolling="no" onload="this.height=iFrame1.document.body.scrollHeight" id="iframe" style="display:none; margin-top:10px"></iframe>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n";
}

echo '<tr style="background-color:#FFF; display:none" id="redirecturltr">' . "\r\n" . '  <td width="135">&nbsp;跳转网址：</td>' . "\r\n" . '  <td colspan="2"><input name="redirect_url" type="text" class="text" id="redirecturl" style="width:300px" value="';
echo $row[redirect_url];
echo '" />' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n\r\n" . '<tbody id="detail">' . "\r\n" . '<tr style="background-color:#FFF;" >' . "\r\n" . '  <td width="135">&nbsp;起始点击：</td>' . "\r\n" . '  <td colspan="2"><input name="hit" type="text" class="txt" value="';
echo $row[hit] ? $row[hit] : 0;
echo '" />' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#FFF;" >' . "\r\n" . '  <td width="135">&nbsp;浏览一次增加点击：</td>' . "\r\n" . '  <td colspan="2"><input name="perhit" type="text" class="txt" value="';
echo $row[perhit] ? $row[perhit] : 1;
echo '" />' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#FFF;">' . "\r\n\t" . '<td width="135">文章摘要（可不填写）：</td>' . "\r\n\t" . '<td colspan="2"><textarea name="introduction" style="width:500px; height:100px">';
echo $row['introduction'];
echo '</textarea></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px">' . "\r\n";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center style=\'margin-bottom:10px\'><input name="news_submit" value="';
echo $part == 'edit' ? '保存修改' : '提交发布';
echo '" type="submit" class="mymps"/>&nbsp;&nbsp;<input name="news_submit" value="返 回" type="button" onClick="location.href=\'?part=list\'" class="mymps"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

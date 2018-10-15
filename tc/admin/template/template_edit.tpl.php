<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript" src="js/mymps_tpl.js"></script>' . "\r\n" . '<div class="ccc2">' . "\r\n" . '    <ul>' . "\r\n" . '        <img src="../images/warn.gif" align="absmiddle"> 安全提示：当前在线编辑模板功能</span>：';
echo $cfg_if_tpledit;
echo '。建议您只有在十分必要的时候才开启它。您可以修改 /dat/config.inc.php 关闭此功能' . "\r\n" . '    </ul>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr" align="left">' . "\r\n" . '    <td>当前所在目录<b style="color:red">【';
echo $path;
echo '】</b></td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '  <tr align="center" bgcolor="#ffffff">' . "\r\n" . '    <td style="padding-bottom:10px">' . "\r\n" . '    <div align="left" style="border-bottom:#e1f2fc 1px solid; margin:5px 0 5px 0; padding:0 5px 10px 5px">' . "\r\n" . '    <a href="?path=';
echo $LastPath;
echo '">' . "\r\n" . '    <img src="template/images/file_topdir.gif" border="0" align="absmiddle">上级目录</a>' . "\r\n" . '    </div>' . "\r\n";
$fso = @opendir($path);

while ($file = @readdir($fso)) {
	$fullpath = $path . '/' . $file;
	$is_dir = @is_dir($fullpath);

	if ($is_dir == '0') {
		if (($file != '..') && ($file != '.')) {
			echo '        <li style="float:left; margin:5px;" ';

			if ($fullpath == $editfile) {
				echo 'class=on';
			}

			echo '><img src="';
			echo FileImage($fullpath);
			echo '" border="0" align="absmiddle"> <a href="?editfile=';
			echo $fullpath;
			echo '" >';
			echo $file;
			echo '</a>' . "\r\n" . '        </li>' . "\r\n" . '        ';
		}
	}
}

@closedir($fso);
echo '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form method="post" action="?editfile=';
echo $editfile;
echo '" onsubmit="return confirm(\'如果您没有html基础，不建议您在线编辑模板风格\\n否则可能造成页面排版错乱甚至无法显示！\\n您确定要提交修改该文件吗？\')">' . "\r\n" . '<input name="do" value="update" type="hidden">' . "\r\n" . '<input name="url" value="';
echo getUrl();
echo '" type="hidden">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '  <td colspan="4">在线编辑模板文件</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="80">当前修改： </td>' . "\r\n" . '  <td colspan="3">' . "\r\n\t" . '<b style="color:red">';
echo $editfile;
echo '</b>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="80">模板内容： </td>' . "\r\n" . '  <td colspan="3">' . "\r\n" . '  <div>' . "\r\n" . '  ';
echo $acontent;
echo '  </div>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="80">&nbsp;</td>' . "\r\n" . '  <td colspan="3">' . "\r\n" . '  <input name="search" type="text" class="text\' accesskey="t" size="20" onChange="n=0;" ';
echo $disabled;
echo '>' . "\r\n" . '    <input class="mymps mini" type="button" value="搜 索" accesskey="f" onClick="findInPage(this.form.content, this.form.search.value)">　' . "\r\n" . '    <input type="button" value="预 览" accesskey="p" onClick="displayHTML(this.form.content)" class="mymps mini">' . "\r\n" . '    <input type="button" value="复 制" accesskey="c" onClick="HighlightAll(this.form.content)" class="mymps mini">' . "\r\n" . ' </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff" >' . "\r\n\t" . '<td align="right">&nbsp;</td>' . "\r\n" . '    <td colspan="3">' . "\r\n" . '        <input type="submit" value="提交修改" class="mymps mini"/> ' . "\r\n" . '        <input type="reset" value="重 置" class="mymps mini"/> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

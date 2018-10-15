<?php

include mymps_tpl('inc_head');

if ($part == 'template') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="template.php">默认模板设置</a></li>' . "\r\n\t\t\t" . '<li><a href="file_manage.php" class="current">风格在线编辑</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

echo '<div class="ccc2">' . "\r\n" . '    <ul>' . "\r\n" . '        <img src="../images/warn.gif" align="absmiddle"> 安全提示：当前在线编辑模板功能</span>：';
echo $cfg_if_tpledit;
echo '。建议您只有在十分必要的时候才开启它。您可以修改 /data/config.inc.php 关闭此功能' . "\r\n" . '    </ul>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr" align="left">' . "\r\n" . '    <td>';
echo $mulu;
echo '<b style="color:red">【当前所在目录：';
echo $path;
echo '】</b></td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '  <tr align="center" bgcolor="#ffffff">' . "\r\n" . '    <td>' . "\r\n";
$fso = @opendir($path);

while ($file = @readdir($fso)) {
	$fullpath = $path . '/' . $file;
	$is_dir = @is_dir($fullpath);

	if ($is_dir == '1') {
		if (($file != '..') && ($file != '.')) {
			echo '        <li style="float:left; margin:10px"><a href="?part=';
			echo $part;
			echo '&path=';
			echo $fullpath;
			echo '"><img src="template/images/dir.gif" border="0" align="absmiddle"> ';
			echo $file;
			echo '</a></li>' . "\r\n" . '      ';
		}
		else {
			if (($file != '..') && ($path != $showdir)) {
				echo '                <div align="left" style="border-bottom:#e1f2fc 1px solid; padding:0 0 5px 0">' . "\r\n" . '                <a href="?part=';
				echo $part;
				echo '&path=';
				echo $LastPath;
				echo '">' . "\r\n" . '                <img src="template/images/file_topdir.gif" border="0" align="absmiddle">上级目录</a>' . "\r\n" . '                </div>' . "\r\n" . '            ';
			}
		}
	}
}

@closedir($fso);
echo '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr"> ' . "\r\n" . '        <td><b>文件名</b></td>' . "\r\n" . '        <td><b>修改日期</b></td>' . "\r\n" . '        <td><b>文件大小</b></td>' . "\r\n" . '        <td><b>操作</b></td>' . "\r\n" . '      </tr>' . "\r\n";
$fso = @opendir($path);

while ($file = @readdir($fso)) {
	$fullpath = $path . '/' . $file;
	$is_dir = @is_dir($fullpath);

	if ($is_dir == '0') {
		$size = @filesize($path . '/' . $file);
		$size = @getSize($size);
		$lastsave = @date('Y-n-d H:i:s', filemtime($path . '/' . $file));
		$image_uri = ($part == 'template' ? $mymps_global[SiteUrl] . '/' . $part . '/default' . str_replace($showdir, '', $fullpath) : $mymps_global[SiteUrl] . '/attachment' . str_replace($showdir, '', $fullpath));
		echo '    <tr bgcolor="white">' . "\r\n" . '    ';

		if (is_pic($file) == 'yes') {
			echo '    <td><a href="';
			echo $image_uri;
			echo '" target="_blank" onMouseOut="closediv(\'';
			echo $file;
			echo '\')"><img src="';
			echo FileImage($fullpath);
			echo '" border="0" align="absmiddle"> ';
			echo $file;
			echo '</a></td>' . "\r\n" . '    ';
		}
		else {
			echo '    <td bgcolor="white"><img src="';
			echo FileImage($fullpath);
			echo '" border="0" align="absmiddle"> ';
			echo $file;
			echo '</td>' . "\r\n" . '    ';
		}

		echo "\t" . '<td>';
		echo $lastsave;
		echo '</td>' . "\r\n" . '    <td bgcolor="white">';
		echo $size;
		echo '</td>' . "\r\n\t" . '<td align="center">' . "\r\n" . '    <a href="?downfile=';
		echo $fullpath;
		echo '">下载</a> / ' . "\r\n" . '    <a href="?editfile=';
		echo $fullpath;
		echo '">编辑</a> / ' . "\r\n" . '    <a href="?part=';
		echo $part;
		echo '&delfile=';
		echo $fullpath;
		echo '&url=';
		echo urlencode(getUrl());
		echo '" onClick="return confirm(\'如非必要，请不要在此删除该文件，您确定要删除吗？\')">删除</a> </td>' . "\r\n\t" . '</tr>' . "\r\n" . '    ';
	}
}

@closedir($fso);
echo '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head_jq');
echo '<script type="text/javascript" src="../include/datepicker/datepicker.js"></script>' . "\r\n" . '<link rel="stylesheet" href="../include/datepicker/ui.css">' . "\r\n" . '<script language=\'javascript\'>' . "\r\n" . '$(function(){' . "\r\n\t" . '$("#datepicker1").datepicker();' . "\r\n\t" . '$("#datepicker2").datepicker();' . "\r\n" . '});' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="5">' . "\r\n" . '    <div class="left">' . "\r\n" . '    <a href="javascript:collapse_change(\'tip\')">技巧提示</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'tip\')"><img id="menuimg_tip" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td id="menu_tip" bgcolor="white">' . "\r\n" . '    ';
echo $type ? $vbm_adv_type[$type][notice] : $vbm_adv_type[$edit[type]][notice];
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method="post" name="settings" action="adv.php?advid=';
echo $advid;
echo '">' . "\r\n" . '<input name="part" value="adv';
echo $part;
echo '" type="hidden"/>' . "\r\n" . '<input name="type" value="';
echo $type ? $type : $edit[type];
echo '" type="hidden"/>' . "\r\n";

if ($advid) {
	echo '<input name="forward_url" value="';
	echo GetUrl();
	echo '" type="hidden">' . "\r\n";
}

echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left">' . "\r\n" . '    <a href="javascript:collapse_change(\'float\')">';
echo $type ? $vbm_adv_type[$type][name] : $vbm_adv_type[$edit[type]][name];
echo '</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'float\')"><img id="menuimg_float" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n\r\n" . '<tbody id="menu_float" style="display: yes">' . "\r\n" . '<tr>' . "\r\n" . '<td width="45%" bgcolor="white" >展现方式:<br /><i style="color:#666">请选择所需的广告展现方式</i></td><td bgcolor="white">';
echo $style ? get_adv_style($style, 'advnew[style]') : get_adv_style($adv_style[style], 'advnew[style]');
echo '</td></tr>' . "\r\n" . '<tr><td width="45%" bgcolor="white" >广告标题(<font color="red">*必填</font>):<br /><i style="color:#666">注意: 广告标题只为识别辨认不同广告条目之用，并不在广告中显示</i></td><td bgcolor="white"><input class="text" type="text" size="50" name="advnew[title]" value="';
echo $title ? $title : $edit[title];
echo '" >' . "\r\n" . '</td></tr>' . "\r\n";
if (($type != 'normalad') && ($edit['type'] != 'normalad')) {
	echo '<tr><td width="45%" bgcolor="white" >广告投放范围(<font color="red">*必选</font>):<br /><i style="color:#666">设置本广告投放的页面或网站范围，可以按住 CTRL 多选，选择“全部”为不限制选择广告投放的范围</i></td><td bgcolor="white">' . "\r\n" . '<select name="advnew[targets][]" size="15" multiple="multiple">' . "\r\n";
	if (($type == 'infoad') || ($edit['type'] == 'infoad')) {
		echo cat_list('category', 0, $edit['targets'], true);
	}
	else {
		if (in_array($type, array('intercatad', 'interlistad')) || in_array($edit['type'], array('intercatad', 'interlistad'))) {
			$edit['targets'] = ($edit['targets'] ? $edit['targets'] : array());
			echo "\t" . '<option value="all" ';

			if (in_array('all', $edit['targets'])) {
				echo 'selected style="background-color:#6EB00C;color:white"';
			}

			echo '> > 全部</option>' . "\r\n" . '    <option value=""> </option>' . "\r\n";
		}
		else {
			if (($type == 'indexcatad') || ($edit['type'] == 'indexcatad')) {
				echo '<optgroup label="';
				echo MPS_SOFTNAME;
				echo '网站首页">' . "\r\n";
			}
			else {
				foreach ($adv_target as $kad => $vad ) {
					echo '<option value="';
					echo $vad;
					echo '" ';

					if (is_array($edit['targets'])) {
						if (in_array($vad, $edit['targets'])) {
							echo 'selected style="background-color:#6EB00C;color:white"';
						}
					}

					echo '>&nbsp;&nbsp;> ';
					echo $kad;
					echo '</option>' . "\r\n" . '<optgroup label="';
					echo MPS_SOFTNAME;
					echo '">' . "\r\n";
				}
			}
		}
	}

	echo "\r\n";
	if (($type == 'infoad') || ($edit['type'] == 'infoad')) {
	}
	else {
		if (($type == 'indexcatad') || ($edit['type'] == 'indexcatad')) {
			echo cat_list('category', 0, $edit['targets'], true, 1);
		}
		else {
			echo cat_list('category', 0, $edit['targets']);
		}
	}

	echo '</optgroup>' . "\r\n" . '</select>' . "\r\n\r\n" . '</td></tr>' . "\r\n";
}

if (($type == 'interlistad') || ($edit['type'] == 'interlistad')) {
	echo '<tr><td width="45%" bgcolor="#FFFFFF">展示位置(<font color="red">*必填</font>):<br /><i style="color:#666">将广告的展示位置设置在栏目页信息列表头部位置或者尾部位置</i></td><td bgcolor="white">' . "\r\n" . '<select name="advnew[position]" class="text">' . "\r\n" . '<option value="top" ';

	if ($adv_style['position'] != 'bottom') {
		echo 'selected';
	}

	echo '>头部</option>' . "\r\n" . '<option value="bottom" ';

	if ($adv_style['position'] == 'bottom') {
		echo 'selected';
	}

	echo '>尾部</option>' . "\r\n" . '</select>' . "\r\n" . '</td></tr>' . "\r\n";
}

if (($type == 'floatad') || ($edit['type'] == 'floatad')) {
	echo '<tr><td width="45%" bgcolor="#FFFFFF">漂浮高度(<font color="red">*必填</font>):<br /><i style="color:#666">漂浮广告距离页面底部的高度，请根据漂浮广告的高度进行适当的调节，允许范围在 40～600 之间，默认值 200</i></td><td bgcolor="white"><input type="text" name="advnew[floath]" value="';
	echo $adv_style['floath'] ? $adv_style['floath'] : '200';
	echo '" class="text">' . "\r\n" . '</td></tr>' . "\r\n";
}

echo '<tr><td width="45%" bgcolor="white" >广告起始时间(选填):<br /><i style="color:#666">设置广告起始生效的时间，格式 yyyy-mm-dd，留空为不限制起始时间</i></td><td bgcolor="white"><input type="text" id="datepicker1" name="advnew[starttime]" value="';
echo $edit[starttime] ? GetTime($edit[starttime]) : '';
echo '" class="text">' . "\r\n" . '</td></tr><tr><td width="45%" bgcolor="white" >广告结束时间(选填):<br /><i style="color:#666">设置广告广告结束的时间，格式 yyyy-mm-dd，留空为不限制结束时间</i></td><td bgcolor="white"><input id="datepicker2" type="text" name="advnew[endtime]" class="text" value="';
echo $edit[endtime] ? GetTime($edit[endtime]) : '';
echo '">' . "\r\n" . '</td></tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n\t";
echo $style ? get_style_forminput('', $style) : get_style_forminput($edit[code], $adv_style);
echo '</div>' . "\r\n" . '<center><input type="submit" name="';
echo CURSCRIPT;
echo '_submit" class="mymps large" value="提 交"/><br /><br /><a href="adv.php?type=';
echo $type ? type : $edit[type];
echo '" class="back">返回';
echo $type ? $vbm_adv_type[$type][name] : $vbm_adv_type[$edit[type]][name];
echo '管理</a><br />' . "\r\n" . '<br /><a href="adv.php" class="back">返回广告管理首页</a></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

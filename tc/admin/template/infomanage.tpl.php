<?php

include mymps_tpl('inc_head');
echo '<script type=\'text/javascript\' src=\'js/calendar.js\'></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'ifcheck = false;' . "\r\n" . '</script>' . "\r\n" . '<form action="infomanage.php?" method="get">' . "\r\n" . '<input name="action" value="viewresult" type="hidden"/>' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的信息主题</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">显示详细信息列表</td>' . "\r\n" . '    <td>&nbsp;<input type="checkbox" name="detail"  value="yes" class="checkbox" ';
if (($detail == 'yes') || empty($detail)) {
	echo 'checked';
}

echo '> <font color="red"><br />' . "\r\n" . '    如若不显示详细列表，那么所有匹配的数据将一次性执行操作，请谨慎！！！<br />' . "\r\n" . '    特别是进行删除操作时</font></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">是否游客发布:</td>' . "\r\n" . '    <td>&nbsp;<select name="ismember">' . "\r\n" . '    <option value="">>不限制</option>' . "\r\n" . '    <option value="no" ';

if ($ismember == 'no') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>游客发布</option>' . "\r\n" . '    <option value="yes" ';

if ($ismember == 'yes') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>会员发布</option>' . "\r\n" . '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">是否过期信息:</td>' . "\r\n" . '    <td>&nbsp;<select name="istimed">' . "\r\n" . '    <option value="">>不限制</option>' . "\r\n" . '    <option value="no" ';

if ($istimed == 'no') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>未过期信息</option>' . "\r\n" . '    <option value="yes" ';

if ($istimed == 'yes') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>过期信息</option>' . "\r\n" . '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">信息状态:</td>' . "\r\n" . '    <td>&nbsp;<select name="info_level">' . "\r\n" . '    <option value="">>不限制</option>' . "\r\n" . '    <option value="0" ';

if ($info_level == '0') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>待审</option>' . "\r\n" . '    <option value="1" ';

if ($info_level == '1') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>正常</option>' . "\r\n\t" . '<option value="2" ';

if ($info_level == '2') {
	echo 'selected="true" style="background-color:#6eb00c; color:white!important;"';
}

echo '>推荐</option>' . "\r\n" . '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所在分类</td>' . "\r\n" . '    <td>&nbsp;<select name="catid">' . "\r\n" . '    <option value="">>不限分类</option>' . "\r\n" . '    ';
echo cat_list('category', 0, $catid);
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属地区</td>' . "\r\n" . '    <td>&nbsp;<select name="areaid">' . "\r\n" . '    <option value="">>不限地区</option>' . "\r\n" . '    ';
echo cat_list('area', 0, $areaid);
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">发表时间范围(格式 yyyy-mm-dd，不限制请输入 0):</td>' . "\r\n" . '    <td>&nbsp;<input class="txt" style="width:100px" type="text" name="starttime" value="';
echo $starttime;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"> -' . "\r\n" . '<input class="txt" style="width:100px" type="text" name="endtime" value="';
echo $endtime;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">发布用户名(多用户名中间请用半角逗号 "," 分割):</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">联系电话(用户公布的联系电话):</td>' . "\r\n" . '    <td>&nbsp;<input name="tel" class="text" value="';
echo $tel;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">信息发布者的IP (通配符 "*" 如 "127.0.*.*"，不含引号):</td>' . "\r\n" . '    <td>&nbsp;<input name="ip" class="text" value="';
echo $ip;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">内容关键字(多关键字中间请用半角逗号 "," 分割，关键词可以用限定符 {x}):</td>' . "\r\n" . '    <td>&nbsp;<input name="keywords" class="text" value="';
echo $keywords;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">内容最小长度:(本功能会加重服务器负担)</td>' . "\r\n" . '    <td>&nbsp;<input name="lengthlimit" class="text" value="';
echo $lengthlimit;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff" id="searchresult" style="display:none">' . "\r\n" . '  ' . "\t" . '<td colspan="2">' . "\r\n" . '    ' . "\t" . '信息列表' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';

if ($action != 'viewresult') {
	echo '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">请选择你要进行的操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td colspan="2">' . "\r\n" . '    <label for="delinfo"><input name="part" value="delinfo" type="radio" class="radio" id="delinfo" ';

	if ($part == 'delinfo') {
		echo 'checked';
	}

	echo '/>删除信息</label> ' . "\t\r\n" . '    <label for="delcomment"><input name="part" value="delcomment" type="radio" class="radio" id="delcomment" ';

	if ($part == 'delcomment') {
		echo 'checked';
	}

	echo '/>删除信息评论</label>' . "\r\n" . '    <label for="delattach"><input name="part" value="delattach" type="radio" class="radio" id="delattach" ';

	if ($part == 'delattach') {
		echo 'checked';
	}

	echo '/>删除信息图片</label>' . "\r\n" . '    <label for="delhtml"><input name="part" value="delhtml" type="radio" class="radio" id="delhtml" ';

	if ($part == 'delhtml') {
		echo 'checked';
	}

	echo '/>删除信息HTML文件</label>' . "\r\n" . '    <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '    <label for="refresh1"><input name="part" value="refresh" type="radio" class="radio" id="refresh1" ';

	if ($part == 'refresh') {
		echo 'checked';
	}

	echo ' />刷新信息（将发布时间设为当前时间）</label>' . "\r\n" . '    <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '<label for="level0"><input name="part" value="level0" type="radio" class="radio" id="level0" ';

	if ($part == 'level0') {
		echo 'checked';
	}

	echo '/>转为待审</label>' . "\r\n" . '    <label for="level1"><input name="part" value="level1" type="radio" class="radio" id="level1" ';

	if ($part == 'level1') {
		echo 'checked';
	}

	echo '/>转为正常</label>' . "\r\n" . '    <label for="level2"><input name="part" value="level2" type="radio" class="radio" id="level2" ';

	if ($part == 'level2') {
		echo 'checked';
	}

	echo '/>转为推荐</label>' . "\r\n" . '    <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '<label for="ifred"><input name="part" value="ifred" type="radio" class="radio" id="ifred" ';

	if ($part == 'ifred') {
		echo 'checked';
	}

	echo '/>标题套红</label>' . "\r\n" . '    <label for="ifbold"><input name="part" value="ifbold" type="radio" class="radio" id="ifbold" ';

	if ($part == 'ifbold') {
		echo 'checked';
	}

	echo '/>标题加粗</label>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  ';
}
else {
	echo '  ' . "\t" . '<input name="part" value="';
	echo $part;
	echo '" type="hidden">' . "\r\n" . '  ';
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '</form>' . "\r\n";

if ($action == 'viewresult') {
	echo '<form action="infomanage.php?" method="post">' . "\r\n" . '<input name="step" value="submit" type="hidden">' . "\r\n" . '<input name="return_url" value="';
	echo GetUrl();
	echo '" type="hidden" />' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '<tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="8">请选择你要进行的操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td colspan="8">' . "\r\n" . '    <label for="delinfo"><input name="part" value="delinfo" type="radio" class="radio" id="delinfo" ';

	if ($part == 'delinfo') {
		echo 'checked';
	}

	echo '/>删除信息</label> ' . "\t\r\n" . '    <label for="delcomment"><input name="part" value="delcomment" type="radio" class="radio" id="delcomment" ';

	if ($part == 'delcomment') {
		echo 'checked';
	}

	echo '/>删除信息评论</label>' . "\r\n" . '    <label for="delattach"><input name="part" value="delattach" type="radio" class="radio" id="delattach" ';

	if ($part == 'delattach') {
		echo 'checked';
	}

	echo '/>删除信息图片</label>' . "\r\n" . '    <label for="delhtml"><input name="part" value="delhtml" type="radio" class="radio" id="delhtml" ';

	if ($part == 'delhtml') {
		echo 'checked';
	}

	echo '/>删除信息HTML文件</label>' . "\r\n" . '    <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '    <label for="refresh"><input name="part" value="refresh" type="radio" class="radio" id="refresh" ';

	if ($part == 'refresh') {
		echo 'checked';
	}

	echo '/>刷新信息（将发布时间设为当前时间）</label><hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '<label for="level0"><input name="part" value="level0" type="radio" class="radio" id="level0" ';

	if ($part == 'level0') {
		echo 'checked';
	}

	echo '/>转为待审</label>' . "\r\n" . '    <label for="level1"><input name="part" value="level1" type="radio" class="radio" id="level1" ';

	if ($part == 'level1') {
		echo 'checked';
	}

	echo '/>转为正常</label>' . "\r\n" . '    <label for="level2"><input name="part" value="level2" type="radio" class="radio" id="level2" ';

	if ($part == 'level2') {
		echo 'checked';
	}

	echo '/>转为推荐</label>' . "\r\n" . '    <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '<label for="ifred"><input name="part" value="ifred" type="radio" class="radio" id="ifred" ';

	if ($part == 'ifred') {
		echo 'checked';
	}

	echo '/>标题套红</label>' . "\r\n" . '    <label for="ifbold"><input name="part" value="ifbold" type="radio" class="radio" id="ifbold" ';

	if ($part == 'ifbold') {
		echo 'checked';
	}

	echo '/>标题加粗</label>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td style="width:5%"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox" checked="checked"/> </td>' . "\r\n" . '    <td style="width:6%">信息ID</td>' . "\r\n" . '    <td style="width:16%">信息标题</td>' . "\r\n" . '    <td style="width:30%">信息内容</td>' . "\r\n" . '    <td width="100">联系人</td>' . "\r\n" . '    <td width="100">信息状态</td>' . "\r\n" . '    <td>发布时间</td>' . "\r\n" . '    <td>过期时间</td>' . "\r\n" . '  </tr>' . "\r\n";

	foreach ($information as $row ) {
		echo '    <tr bgcolor="#ffffff" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'optionids[]\' value=\'';
		echo $row[id];
		echo '\' class=\'checkbox\' id="';
		echo $row[id];
		echo '" checked="checked"></td>' . "\r\n" . '    <td>';
		echo $row[id];
		echo '</td>' . "\r\n" . '    <td align="left" style="background:#ffffff"><a href="';
		echo Rewrite('info', array('id' => $row[id], 'catid' => $row[catid], 'html_path' => $row[html_path]));
		echo '" target="_blank" title="';
		echo $row[title];
		echo '" style="';

		if ($row['ifred'] == '1') {
			echo 'color:red;';
		}

		echo ' ';

		if ($row['ifbold'] == '1') {
			echo 'font-weight:bold;';
		}

		echo '">';
		echo substring($row[title], 0, 18);
		echo '</a></td>' . "\r\n" . '    <td align="left"><em>';
		echo substring(clear_html($row[content]), 0, 80);
		echo '...</em></td>' . "\r\n" . '    <td>';
		echo $row[contact_who] ? $row[contact_who] : '<em>' . $row[userid] . '</em>';
		echo '</td>' . "\r\n" . '    <td>';
		echo $information_level[$row[info_level]];
		echo '</td>' . "\r\n" . '    <td><em>';
		echo GetTime($row[begintime]);
		echo '</em></td>' . "\r\n" . '    <td><em>';
		echo empty($row[endtime]) ? '长期有效' : GetTime($row[endtime]);
		echo '</em></td>' . "\r\n" . '  </tr>' . "\r\n";
	}

	echo '</table>' . "\r\n" . '</div>' . "\r\n";

	if ($action == 'viewresult') {
		echo '<center><input type="submit" value="提 交" class="mymps large" name="';
		echo CURSCRIPT;
		echo '_submit" ';

		if ($rows_num == 0) {
			echo 'disabled';
		}

		echo '/></center>' . "\r\n" . '</form>' . "\r\n";
	}

	echo '<div class="pagination">';
	echo page2();
	echo '</div>' . "\r\n";
}

mymps_admin_tpl_global_foot();

?>

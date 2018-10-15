<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'js/calendar.js\'></script>' . "\r\n" . '<form action="?" method="get">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">搜索符合条件的优惠券</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">优惠券名称</td>' . "\r\n" . '    <td>&nbsp;<input name="title" class="text" value="';
echo $title;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">用户名(UserID)</td>' . "\r\n" . '    <td>&nbsp;<input name="userid" class="text" value="';
echo $userid;
echo '"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属分类</td>' . "\r\n" . '    <td>&nbsp;<select name="cate_id">' . "\r\n" . '    <option value="">>不限分类</option>' . "\r\n" . '    ';
echo get_couponclass_select('cate_id', $cate_id, 'no');
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8; width:40%">所属地区</td>' . "\r\n" . '    <td>&nbsp;<select name="areaid">' . "\r\n" . '    <option value="">>不限地区</option>' . "\r\n" . '    ';
echo cat_list('area', 0, $areaid);
echo '    </select></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td style="background-color:#f1f5f8">优惠期(书写格式：yy-mm-dd):</td>' . "\r\n" . '    <td>&nbsp;<input name="begindate" style="width:100px;" class="txt" value="';
echo $begindate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"> - <input name="enddate" style="width:100px;"  class="txt" value="';
echo $enddate;
echo '" onclick="popUpCalendar(this, this, &quot;yyyy-mm-dd&quot;)"></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '  ' . "\t" . '<td style="background:#f1f5f8">优惠券状态</td>' . "\r\n" . '    <td>' . "\r\n" . '    <label for="yes"><input class="radio" name="status" type="radio" value="yes" id="yes" ';
if (($status == 'yes') || empty($status)) {
	echo 'checked';
}

echo '>可用</label> <label for="no"><input name="status" class="radio" type="radio" value="no" id="no" ';

if ($status == 'no') {
	echo 'checked';
}

echo '>失效</label></td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '<div class="clear" style="margin-bottom:5px"></div>' . "\r\n" . '</form>' . "\r\n" . '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">&nbsp;</td>' . "\r\n" . '    <td>预览图</td>' . "\r\n" . '    <td>名称</td>' . "\r\n" . '    <td width="100">上传会员</td>' . "\r\n" . '    <td>上传时间</td>' . "\r\n" . '    <td>可用？</td>' . "\r\n" . '    <td>打印</td>' . "\r\n" . '    <td>人气</td>' . "\r\n" . '    <td>状态</td>' . "\r\n" . '    <td>操作</td>' . "\r\n" . '  </tr>' . "\r\n" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n";

foreach ($coupon as $row ) {
	echo '    <tr bgcolor="white" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'selectedids[]\' value="';
	echo $row['id'];
	echo '" class=\'checkbox\' id="';
	echo $row['id'];
	echo '"></td>' . "\r\n" . '    <td><img src="';
	echo $mymps_global['SiteUrl'] . $row['pre_picture'];
	echo '" width="60"></td>' . "\r\n" . '    <td><a href="../coupon.php?id=';
	echo $row[id];
	echo '" target="_blank">';
	echo $row['title'];
	echo '</a></td>' . "\r\n" . '    <td><a href="javascript:void(0);" onclick="' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[userid];
	echo '</a></td>' . "\r\n" . '    <td><em>';
	echo GetTime($row['dateline']);
	echo '</em></td>' . "\r\n" . '    <td>';
	echo $row['status'] == 1 ? '<font color=green>可用</font>' : '<font color=red>失效</font>';
	echo '</td>' . "\r\n" . '    <td>';
	echo $row['prints'];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row['hit'];
	echo '</td>' . "\r\n" . '    <td>' . "\r\n" . '    ';

	if ($row['grade'] == 0) {
		echo '<font color=red>待审</font>';
	}
	else if ($row['grade'] == 1) {
		echo '<font color=#006acd>正常</font>';
	}
	else if ($row['grade'] == 2) {
		echo '<font color=green>推荐</font>';
	}

	echo '</td>' . "\r\n" . '    <td><a href="?part=edit&id=';
	echo $row[id];
	echo '">编辑</a></td>' . "\r\n" . '  </tr>' . "\r\n";
}

echo '</tbody>' . "\r\n" . '<tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n\t" . '<label for="grade0"><input type="radio" value="grade0" id="grade0" name="action" class="radio">转<font color=red>待审</font></label> ' . "\r\n" . '    <label for="grade1"><input type="radio" value="grade1" id="grade1" name="action" class="radio">转<font color=#006acd>正常</font></label> ' . "\r\n" . '    <label for="grade2"><input type="radio" value="grade2" id="grade2" name="action" class="radio">转<font color=green>推荐</font></label> ' . "\r\n" . '     <hr style="height:1px; border:1px #c5d8e8 solid;"/>' . "\r\n" . '     <label for="delall"><input type="radio" value="delall" id="delall" name="action" class="radio">批量删除</label> ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="coupon_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

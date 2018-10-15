<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.start0 { background:url(\'images/review_start.gif\') no-repeat 0 -1px;  width:58px; height:15px; }' . "\r\n" . '.start1 { background:url(\'images/review_start.gif\') no-repeat 0 -15px; width:58px; height:15px; }' . "\r\n" . '.start2 { background:url(\'images/review_start.gif\') no-repeat 0 -29px; width:58px; height:15px; }' . "\r\n" . '.start3 { background:url(\'images/review_start.gif\') no-repeat 0 -43px; width:58px; height:15px; }' . "\r\n" . '.start4 { background:url(\'images/review_start.gif\') no-repeat 0 -57px; width:58px; height:15px; }' . "\r\n" . '.start5 { background:url(\'images/review_start.gif\') no-repeat 0 -71px; width:58px; height:15px; }' . "\r\n" . '</style>' . "\r\n" . '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<script type="text/javascript" src="js/vbm.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="member_tpl.php">空间模板</a></li>' . "\r\n\t\t\t\t" . '<li><a href="member_comment.php" class="current">空间点评</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="ccc2">' . "\r\n\t" . '<ul>' . "\r\n" . '    <form action="?part=list" method="get">' . "\r\n" . '    <select name="commentlevel">' . "\r\n" . '    <option value="">审核状态</option>' . "\r\n" . '    <option value="0" ';

if ($_GET[commentlevel] == 0) {
	echo 'selected';
}

echo '>待审</option>' . "\r\n" . '    <option value="1" ';

if ($_GET[commentlevel] == 1) {
	echo 'selected';
}

echo '>正常</option>' . "\r\n" . '    </select>' . "\r\n" . '    <input name="keywords" type="text" class=\'text\' value="';
echo $keywords;
echo '">' . "\r\n" . '     &nbsp;&nbsp;<input type="submit" value="检索点评" class="gray mini">&nbsp;&nbsp; ' . "\r\n" . '    </form>' . "\r\n\t" . '</ul>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?\'>' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40">选择</td>' . "\r\n" . '        <td>来自</td>' . "\r\n" . '        <td>质量</td>' . "\r\n" . '        <td>服务</td>' . "\r\n" . '        <td>环境</td>' . "\r\n" . '        <td>性价比</td>' . "\r\n" . '        <td>点评的空间</td>' . "\r\n" . '        <td>状态</td>' . "\r\n" . '        <td>点评时间</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($comment as $list ) {
	echo '    <tr align="center" bgcolor="#f5fbff" >' . "\r\n" . '      <td><input type=\'checkbox\' name=\'ids[]\' id=\'';
	echo $list[id];
	echo '\' value=\'';
	echo $list[id];
	echo '\' class=\'checkbox\'></td>' . "\r\n" . '      <td><a href="javascript:blocknone(\'pm_';
	echo $list[id];
	echo '\');">';
	echo $list[fromuser];
	echo '+</a></td>' . "\r\n" . '        <td><div class="start';
	echo $list[quality];
	echo '"></div></td>' . "\r\n" . '        <td><div class="start';
	echo $list[service];
	echo '"></div></td>' . "\r\n" . '        <td><div class="start';
	echo $list[environment];
	echo '"></div></td>' . "\r\n" . '        <td><div class="start';
	echo $list[price];
	echo '"></div></td>' . "\r\n" . '        <td><a href="javascript:setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $list[userid];
	echo '\')">';
	echo $list[userid];
	echo '</a></td>' . "\r\n" . '        <td>' . "\r\n" . '        ';

	if (empty($list['commentlevel'])) {
		echo '<font color=red>待审</font>';
	}
	else {
		echo '<font color=green>正常</font>';
	}

	echo '        </td>' . "\r\n" . '      <td>' . "\r\n" . '      ';
	echo GetTime($list[pubtime]);
	echo '</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="background-color:white; display:none" id="pm_';
	echo $list[id];
	echo '">' . "\r\n" . '        <td>&nbsp;</td>' . "\r\n" . '        <td colspan="8">' . "\r\n" . '        <div class="pm_view">' . "\r\n" . '        ';
	echo $list[content];
	echo '        </div>' . "\r\n" . '        <div style="margin:0 5px 10px 5px; padding:10px; background-color:#f2f2f2"><b>喜欢程度：</b>' . "\r\n" . '            ';

	if ($list[enjoy] == '0') {
		echo '不喜欢';
	}
	else if ($list[enjoy] == '1') {
		echo '无所谓';
	}
	else if ($list[enjoy] == '2') {
		echo '喜欢';
	}
	else if ($list[enjoy] == '3') {
		echo '很喜欢';
	}

	echo '            <hr style="height:1px; color:#dedede"/>' . "\r\n" . '            ';

	if ($list[reply]) {
		echo '            <div style="margin:0 5px 10px 5px; padding:10px; background-color:#f2f2f2">' . "\r\n" . '            <b>回复内容：</b>';
		echo $list[reply];
		echo '<hr style="height:1px; color:#dedede"/><b>回复时间：</b>';
		echo GetTime($list[retime]);
		echo '            </div>' . "\r\n" . '            ';
	}

	echo '        </div>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" class=\'checkbox\' id="checkall" onClick="CheckAll(this.form)"/></td>' . "\r\n" . '    <td colspan="9">' . "\r\n" . '    <label for="delall"><input type="radio" value="delall" id="delall" name="part" class="radio">批量删除</label>' . "\r\n" . '    ';

foreach ($mlevel as $k => $v ) {
	echo '    <label for="level';
	echo $k;
	echo '"><input type="radio" value="level.';
	echo $k;
	echo '" id="level';
	echo $k;
	echo '" name="part" class="radio">转为';
	echo $v;
	echo '</label> ' . "\r\n" . '    ';
}

echo '　' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="member_comment_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

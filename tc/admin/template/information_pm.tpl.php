<?php

include mymps_tpl('inc_head');
echo "\r\n" . '<form action="?" name="form1" method="post">' . "\r\n" . '<input name="url" value="';
echo $url;
echo '" type="hidden">' . "\r\n" . '<input name="action" value="';
echo $do_action;
echo '" type="hidden">' . "\r\n" . '<input name="id" value="';
echo $id;
echo '" type="hidden">' . "\r\n" . '<input name="typeid" value="';
echo $typeid;
echo '" type="hidden">' . "\r\n" . '<input name="userid" value="';
echo $userid;
echo '" type="hidden">' . "\r\n" . '<input name="page" value="';
echo $page;
echo '" type="hidden">' . "\r\n" . '<input name="part" value="sendpm" type="hidden" />' . "\r\n";

if (in_array($do_action, array('upgrade_index', 'upgrade', 'upgrade_list'))) {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td class="h" style="text-align:right">置顶时间</td><td class="h">&nbsp;</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="20%" style="text-align:right;">您选择的置顶类型：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <font color="red">';
	echo $do_action == 'upgrade_index' ? '首页置顶' : ($do_action == 'upgrade_list' ? '小类置顶' : '大类置顶');
	echo '</font>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="20%" style="text-align:right;">请选择置顶时间：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    ';
	echo GetUpgradeTime();
	echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

if (in_array($do_action, array('ifred'))) {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="20%" style="text-align:right;">信息标题是否套红：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '        <select name="ifred">' . "\r\n" . '            <option value="1">套红</option>' . "\r\n" . '            <option value="0">取消套红</option>' . "\r\n" . '        </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

if (in_array($do_action, array('ifbold'))) {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="20%" style="text-align:right;">信息标题是否加粗：</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '        <select name="ifbold">' . "\r\n" . '            <option value="1">加粗</option>' . "\r\n" . '            <option value="0">取消加粗</option>' . "\r\n" . '        </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td class="h" style="text-align:right">管理选项</td><td class="h">&nbsp;</td></tr>' . "\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n\t\t" . '<td width="20%" style="text-align:right;">金币处理：</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n\t\t\t" . '<input type="radio" class="radio" name="if_money" value="1" onClick="this.form.money_num.disabled=false"/>是' . "\r\n\t\t\t" . '<input type="radio" class="radio" name="if_money" value="0" checked onClick="this.form.money_num.disabled=true"/>否' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    ' . "\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n\t\t" . '<td width="20%" style="text-align:right;">金币变化：</td>' . "\r\n" . '        <td bgcolor="white">' . "\r\n" . '            <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle">' . "\r\n" . '            <input name="money_num" disabled="disabled" value="';
echo $nummoney ? $nummoney : '+2';
echo '" style="width:40px; margin-top:5px">(增加金币为+，扣除金币为-)' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n\t\t" . '<td width="20%" style="text-align:right;">短消息通知：</td>' . "\r\n\t\t" . '<td bgcolor="white">' . "\r\n\t\t\t" . '<input type="radio" class="radio" name="if_pm" value="1" onClick="this.form.because.disabled=false;this.form.msg.disabled=false;this.form.title.disabled=false"/>是' . "\r\n\t\t\t" . '<input type="radio" class="radio" name="if_pm" value="0" checked onClick="this.form.because.disabled=true;this.form.msg.disabled=true;this.form.title.disabled=true"/>否' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    ' . "\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n\t\t" . '<td width="20%" style="text-align:right;">通知标题：</td>' . "\r\n\t\t" . '<td>' . "\r\n\t\t\t" . '<input name="title" value="';
echo $title;
echo '" id="title" class="text" style="width:300px"/>' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    ' . "\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n\t\t" . '<td style="text-align:right;">通知内容：</td>' . "\r\n\t\t" . '<td bgcolor="white">' . "\r\n" . '        <select name="because" disabled="disabled" size="10" multiple onchange="this.form.msg.value=this.value">' . "\r\n" . '            <option value="">自定义</option>' . "\r\n" . '            ';

foreach ($info_do_type as $k => $v ) {
	echo '            ' . "\t" . '<optgroup label="';
	echo $k;
	echo '">';
	echo $k;
	echo '</optgroup>' . "\r\n" . '                ';

	foreach ($v as $w => $m ) {
		echo '                ' . "\t" . '<option value="';
		echo $m;
		echo '">';
		echo $m;
		echo '</option>' . "\r\n" . '                ';
	}

	echo '            ';
}

echo '        </select>&nbsp;&nbsp;' . "\r\n" . '        <textarea name="msg" disabled="disabled" rows="10" cols="80"></textarea>' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    ' . "\r\n\t" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td>&nbsp;</td>' . "\r\n" . '    <td bgcolor="white">' . "\r\n" . '    <input type="submit" value="提 交" style="margin-left:5px;" class="mymps mini" name="';
echo CURSCRIPT;
echo '_submit"/>&nbsp;&nbsp;' . "\r\n" . '    <input type="button" onclick="javascript:history.go(-1)" class="mymps mini" value="返 回"/>' . "\r\n\t" . '</td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

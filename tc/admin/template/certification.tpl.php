<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '            ';

foreach ($certify_arr as $k => $v ) {
	echo '                <li><a href="?typeid=';
	echo $k;
	echo '" ';

	if ($typeid == $k) {
		echo 'class="current"';
	}

	echo '>';
	echo $v;
	echo '</a></li>' . "\r\n" . '            ';
}

echo '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'certification.php\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td colspan="6"><b>';
echo $certify_arr[$typeid];
echo '认证提交记录</b></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr style="font-weight:bold; background-color:#f5f8ff">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>申请人</td>' . "\r\n" . '      <td>相关图片</td>' . "\r\n" . '      <td>会员名</td>' . "\r\n" . '      <td>类型</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($certification as $k => $value ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[id];
	echo '\' id="';
	echo $value[id];
	echo '"></td>' . "\r\n" . '          <td>';
	echo $typeid == 1 ? $value[tname] : $value[cname];
	echo '</td>' . "\r\n" . '          <td><a href=\'javascript:blocknone("pm_';
	echo $value[id];
	echo '");\'>';
	echo $value[img_path];
	echo '</a></td>' . "\r\n" . '          <td><a href="' . "\r\n" . 'javascript:setbg(\'Mymps会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $value[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $value[userid];
	echo '</a>' . "\r\n" . '<div class="clear"></div>' . "\r\n";

	if ($value[per_certify] == '1') {
		echo '        <img src="../images/person1.gif" alt="已通过身份证认证"/>' . "\r\n" . '        ';
	}
	else {
		echo '        <img src="../images/person0.gif" alt="未通过身份证认证"/>' . "\r\n" . '        ';
	}

	echo '        ';

	if ($value[com_certify] == '1') {
		echo '        <img src="../images/company1.gif" alt="已通过营业执照认证"/>' . "\r\n" . '        ';
	}
	else {
		echo '        <img src="../images/company0.gif" alt="未通过营业执照认证"/>' . "\r\n" . '        ';
	}

	echo '</td>' . "\r\n" . '          <td>';
	echo $certify_arr[$value[typeid]];
	echo '</td>' . "\r\n" . '          <td><a href="?part=yes&userid=';
	echo $value[userid];
	echo '&typeid=';
	echo $typeid;
	echo '&page=';
	echo $page;
	echo '">通过审核</a> | <a href="?part=no&userid=';
	echo $value[userid];
	echo '&typeid=';
	echo $typeid;
	echo '&page=';
	echo $page;
	echo '">注销审核</a></td>' . "\r\n" . '        </tr>' . "\r\n" . '        <tr style="background-color:white; display:none" id="pm_';
	echo $value[id];
	echo '">' . "\r\n" . '            <td>&nbsp;</td>' . "\r\n" . '            <td colspan="6"><a href="';
	echo $value[img_path];
	echo '" target="_blank"><img style="max-width:450px; max-height:300px;" src="';
	echo $value[img_path];
	echo '" height="200"/></a></td>' . "\r\n" . '            </tr>' . "\r\n" . '    ';
}

echo '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="certification_submit"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

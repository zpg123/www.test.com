<?php

include mymps_tpl('inc_head');
echo '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<script type="text/javascript">' . "\r\n" . 'function simplevalue(){' . "\r\n\t" . '$Obj(\'banmian_simple\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_portal\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_classic\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_simple\').className=\'txt checked\';' . "\r\n\t" . '$Obj(\'indextopinfo\').value=\'';
echo $defaultset[simple][indextopinfo];
echo '\';' . "\r\n\t" . '$Obj(\'newinfo\').value=\'';
echo $defaultset[simple][newinfo];
echo '\';' . "\r\n\t" . '$Obj(\'announce\').value=\'';
echo $defaultset[simple][announce];
echo '\';' . "\r\n\t" . '$Obj(\'faq\').value=\'';
echo $defaultset[simple][faq];
echo '\';' . "\r\n\t" . '$Obj(\'lifebox\').value=\'';
echo $defaultset[simple][lifebox];
echo '\';' . "\r\n\t" . '$Obj(\'telephone\').value=\'';
echo $defaultset[simple][telephone];
echo '\';' . "\r\n\t" . '$Obj(\'goods\').value=\'';
echo $defaultset[simple][goods];
echo '\';' . "\r\n\t" . '$Obj(\'foreachinfo\').value=\'';
echo $defaultset[simple][foreachinfo];
echo '\';' . "\r\n\t" . '$Obj(\'news\').value=\'';
echo $defaultset[simple][news];
echo '\';' . "\r\n" . '}' . "\r\n\r\n" . 'function portalvalue(){' . "\r\n\t" . '$Obj(\'banmian_simple\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_portal\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_classic\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_portal\').className=\'txt checked\';' . "\r\n\t" . '$Obj(\'indextopinfo\').value=\'';
echo $defaultset[portal][indextopinfo];
echo '\';' . "\r\n\t" . '$Obj(\'newinfo\').value=\'';
echo $defaultset[portal][newinfo];
echo '\';' . "\r\n\t" . '$Obj(\'announce\').value=\'';
echo $defaultset[portal][announce];
echo '\';' . "\r\n\t" . '$Obj(\'faq\').value=\'';
echo $defaultset[portal][faq];
echo '\';' . "\r\n\t" . '$Obj(\'lifebox\').value=\'';
echo $defaultset[portal][lifebox];
echo '\';' . "\r\n\t" . '$Obj(\'telephone\').value=\'';
echo $defaultset[portal][telephone];
echo '\';' . "\r\n\t" . '$Obj(\'goods\').value=\'';
echo $defaultset[portal][goods];
echo '\';' . "\r\n\t" . '$Obj(\'foreachinfo\').value=\'';
echo $defaultset[portal][foreachinfo];
echo '\';' . "\r\n\t" . '$Obj(\'news\').value=\'';
echo $defaultset[portal][news];
echo '\';' . "\r\n" . '}' . "\r\n\r\n" . 'function classicvalue(){' . "\r\n\t" . '$Obj(\'banmian_simple\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_portal\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_classic\').className=\'txt\';' . "\r\n\t" . '$Obj(\'banmian_classic\').className=\'txt checked\';' . "\r\n\t" . '$Obj(\'indextopinfo\').value=\'';
echo $defaultset[classic][indextopinfo];
echo '\';' . "\r\n\t" . '$Obj(\'newinfo\').value=\'';
echo $defaultset[classic][newinfo];
echo '\';' . "\r\n\t" . '$Obj(\'announce\').value=\'';
echo $defaultset[classic][announce];
echo '\';' . "\r\n\t" . '$Obj(\'faq\').value=\'';
echo $defaultset[classic][faq];
echo '\';' . "\r\n\t" . '$Obj(\'lifebox\').value=\'';
echo $defaultset[classic][lifebox];
echo '\';' . "\r\n\t" . '$Obj(\'telephone\').value=\'';
echo $defaultset[classic][telephone];
echo '\';' . "\r\n\t" . '$Obj(\'goods\').value=\'';
echo $defaultset[classic][goods];
echo '\';' . "\r\n\t" . '$Obj(\'foreachinfo\').value=\'';
echo $defaultset[classic][foreachinfo];
echo '\';' . "\r\n\t" . '$Obj(\'news\').value=\'';
echo $defaultset[classic][news];
echo '\';' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n\r\n" . '.blue{ width:70px; height:30px; display:block; background-color:#3592E2; padding-right:10px;}' . "\r\n" . '.green{ width:70px; height:30px; display:block; background-color:#42B712; padding-right:10px;}' . "\r\n" . '.orange{ width:70px; height:30px; display:block; background-color:#F78015; padding-right:10px;}' . "\r\n" . '.red{ width:70px; height:30px; display:block; background-color:#C40000; padding-right:10px;}' . "\r\n\r\n" . '.showtpl1{display:block; height:90px; float:left; text-align:center; margin:10px}' . "\r\n" . '.showtpl1 a{ display:block; width:116px; float:left; height:184px;}' . "\r\n" . '.showtpl1 a.checked img{ border:4px #F90 solid;}' . "\r\n" . '.showtpl1 .txt{ margin-top:5px; float:left;}' . "\r\n\r\n\r\n" . '.showtpl2{display:block; height:90px; float:left; text-align:center; margin:10px 10px 20px 10px;}' . "\r\n" . '.showtpl2 .txt{ margin-top:5px; float:left; border:1px #ddd solid; padding:10px 0;}' . "\r\n" . '.checked{ border:2px #FFB38C solid!important; background-color:#FFF6F0; padding:5px 0 10px 5px;}' . "\r\n\r\n" . '.showtpl1 label,.showtpl2 label{ cursor:pointer;}' . "\r\n\r\n" . '.showtpl a:hover,.showindex a:hover{ text-decoration:none; cursor:pointer}</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="template.php" class="current">默认模板设置</a></li>' . "\r\n\t\t\t" . '<li><a href="file_manage.php">风格在线编辑</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form method="post" action="?">' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<input name="head_style" value="new" type="hidden">' . "\r\n" . '<input name="screen_index" value="full" type="hidden">' . "\r\n" . '<input name="screen_cat" value="full" type="hidden">' . "\r\n" . '<input name="screen_info" value="full" type="hidden">' . "\r\n" . '<input name="screen_search" value="full" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '<tr class="firstr"><td colspan="2">网站模板应用设置</td></tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n\t\t" . '<td width="20%" class="altbg1" ><b>网站使用模板风格</b><br /><span class="smalltxt"></span></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t";

foreach ($template['fengge']['flag'] as $k => $v ) {
	echo "\t\t\t" . '<div id="index_';
	echo $k;
	echo '" class="showtpl1 ';

	if ($mymps_global['cfg_tpl_dir'] == $k) {
		echo 'checked';
	}

	echo '">' . "\r\n\t\t\t" . '<label for="';
	echo $k;
	echo '">' . "\r\n\t\t\t" . '<div class="txt"><span class="';
	echo $k;
	echo '"></span><div class="clearfix"></div><input onclick="$Obj(\'index_blue\').className=\'showtpl1\';$Obj(\'index_green\').className=\'showtpl1\';$Obj(\'index_orange\').className=\'showtpl1\';$Obj(\'index_red\').className=\'showtpl1\';$Obj(\'index_';
	echo $k;
	echo '\').className=\'showtpl1 checked\';';

	if ($k == 'red') {
		echo '$Obj(\'style_normal\').disabled=true;$Obj(\'style_standard\').checked=true';
	}
	else {
		echo '$Obj(\'style_normal\').disabled=false;';
	}

	echo '" id="';
	echo $k;
	echo '" name="cfg_tpl_dir" type="radio" class="radio" value="';
	echo $k;
	echo '" ';

	if ($mymps_global['cfg_tpl_dir'] == $k) {
		echo 'checked="checked"';
	}

	echo '>';
	echo $v;
	echo ' <br /><font color="#666">(';
	echo $k;
	echo ')</font></div>' . "\r\n\t\t\t" . '</label>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t";
}

echo "\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n\t\t" . '<td width="20%" class="altbg1" ><b>模板是否显示背景图</b><br /><span class="smalltxt"></span></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t" . ' ' . "\t" . '<label for="bodybg_1"><input id="bodybg_1" name="bodybg" type="radio" value="1" ';

if ($mymps_global['bodybg'] == '1') {
	echo ' checked="checked" ';
}

echo '> 是</label>' . "\r\n\t\t\t" . '<label for="bodybg_0"><input id="bodybg_0" name="bodybg" type="radio" value="0" ';

if ($mymps_global['bodybg'] == '0') {
	echo 'checked="checked"';
}

echo '> 否</label>' . "\r\n\t\t" . '</td>' . "\r\n\t" . '</tr>' . "\r\n" . '    <tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>首页版面使用:</b><br /><span class="smalltxt"></span></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t";

foreach ($template['banmian']['flag'] as $k => $v ) {
	if ($k == 'simple') {
		$obj = 'onclick="simplevalue();$Obj(\'simple_tpl\').style.display=\'\';$Obj(\'classic_tpl\').style.display=\'none\';$Obj(\'portal_tpl\').style.display=\'none\';"';
	}
	else if ($k == 'portal') {
		$obj = 'onclick="portalvalue();$Obj(\'simple_tpl\').style.display=\'none\';$Obj(\'classic_tpl\').style.display=\'none\';$Obj(\'portal_tpl\').style.display=\'\';"';
	}
	else if ($k == 'classic') {
		$obj = 'onclick="classicvalue();$Obj(\'simple_tpl\').style.display=\'none\';$Obj(\'classic_tpl\').style.display=\'\';$Obj(\'portal_tpl\').style.display=\'none\';"';
	}

	echo "\t\t\t" . '<div class="showtpl2">' . "\r\n\t\t\t" . '<label for="';
	echo $k;
	echo '" title="';
	echo $k == 'simple' ? '适合分类信息为主的站长使用' : ($k == 'portal' ? '适合地方门户的站长使用' : '适合其他行业信息的站长使用');
	echo '">' . "\r\n\t\t\t" . '<!--<div class="img"><img src="../images/tpl_preview/';
	echo $k;
	echo '.gif"></div>-->' . "\r\n\t\t\t" . '<div id="banmian_';
	echo $k;
	echo '" style="padding:15px;" class="txt ';

	if ($tpl_index[banmian] == $k) {
		echo 'checked';
	}

	echo '">';
	echo $v;
	echo ' <input  ';
	echo $obj;
	echo ' id="';
	echo $k;
	echo '" name="tpl_index[banmian]" type="radio" class="radio" value="';
	echo $k;
	echo '" ';

	if ($tpl_index[banmian] == $k) {
		echo 'checked="checked"';
	}

	echo '><br /><font color="#666">模板文件路径<br />/template/default/index_<font style="color:#cd0000;">';
	echo $k;
	echo '</font>.html</font></div>' . "\r\n\t\t\t" . '</label>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t";
}

echo "\t\t" . '<div class="clear"></div>' . "\r\n\t\t" . '<div id="simple_tpl" style="display:';

if ($tpl_index[banmian] != 'simple') {
	echo 'none';
}

echo ';">' . "\r\n\t\t\t" . '<div class="simple_tpl_bg">' . "\r\n\t\t\t\t" . '<div class="hd">' . "\r\n\t\t\t\t\t" . '首页分类布局设置(可按住ctrl键多选)' . "\r\n\t\t\t\t" . '</div>' . "\r\n\t\t\t\t" . '<div class="bd">' . "\r\n\t\t\t\t\t" . '<div class="first">' . "\r\n\t\t\t\t\t\t" . '<select name="tpl_index[smp_cats][first][]" multiple="multiple">' . "\r\n\t\t\t\t\t\t\t";

foreach ($cat as $k => $v ) {
	echo "\t\t\t\t\t\t\t" . '<option value="';
	echo $v[catid];
	echo '" ';

	if (in_array($v[catid], $tpl_index[smp_cats][first])) {
		echo 'selected';
	}

	echo '>';
	echo $v[catname];
	echo '</option>' . "\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t" . '</select><br /><br />' . "\r\n\t\r\n\t" . '第一列' . "\r\n\t\t\t\t\t" . '</div>' . "\r\n\t\t\t\t\t" . '<div class="second">' . "\r\n\t\t\t\t\t\t" . '<select name="tpl_index[smp_cats][second][]" multiple="multiple">' . "\r\n\t\t\t\t\t\t\t";

foreach ($cat as $k => $v ) {
	echo "\t\t\t\t\t\t\t" . '<option value="';
	echo $v[catid];
	echo '" ';

	if (in_array($v[catid], $tpl_index[smp_cats][second])) {
		echo 'selected';
	}

	echo '>';
	echo $v[catname];
	echo '</option>' . "\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t" . '</select><br /><br />' . "\r\n\t\r\n\t" . '第二列' . "\r\n\t\t\t\t\t" . '</div>' . "\r\n\t\t\t\t\t" . '<div class="third">' . "\r\n\t\t\t\t\t\t" . '<select name="tpl_index[smp_cats][third][]" multiple="multiple">' . "\r\n\t\t\t\t\t\t\t";

foreach ($cat as $k => $v ) {
	echo "\t\t\t\t\t\t\t" . '<option value="';
	echo $v[catid];
	echo '"';

	if (in_array($v[catid], $tpl_index[smp_cats][third])) {
		echo 'selected';
	}

	echo '>';
	echo $v[catname];
	echo '</option>' . "\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t" . '</select><br /><br />' . "\r\n\t\r\n\t" . '第三列' . "\r\n\t\t\t\t\t" . '</div>' . "\r\n\t\t\t\t\t" . '<div class="fourth">' . "\r\n\t\t\t\t\t\t" . '<select name="tpl_index[smp_cats][fourth][]" multiple="multiple">' . "\r\n\t\t\t\t\t\t\t";

foreach ($cat as $k => $v ) {
	echo "\t\t\t\t\t\t\t" . '<option value="';
	echo $v[catid];
	echo '"';

	if (in_array($v[catid], $tpl_index[smp_cats][fourth])) {
		echo 'selected';
	}

	echo '>';
	echo $v[catname];
	echo '</option>' . "\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t" . '</select><br /><br />' . "\r\n\t\r\n\t" . '第四列' . "\r\n\t\t\t\t\t" . '</div>' . "\r\n\t\t\t\t" . '</div>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t\t" . '<div class="clear"></div>' . "\r\n\t\t\t" . '<div class="simple_tpl_bg2">' . "\r\n\t\t\t\t" . '<div class="hd">' . "\r\n\t\t\t\t\t" . '子类显示方式' . "\r\n\t\t\t\t" . '</div>' . "\r\n\t\t\t\t" . '<div class="bd">' . "\r\n\t\t\t\t\t";

foreach ($cat as $k => $v ) {
	echo "\t\t\t\t\t\t" . '<ul>' . "\r\n\t\t\t\t\t\t" . '<li class="catname">';
	echo $v[catname];
	echo '</li> ' . "\r\n\t\t\t\t\t\t" . '<li class="rad">' . "\r\n\t\t\t\t\t\t" . '<select name="tpl_index[showstyle][';
	echo $v[catid];
	echo ']">' . "\r\n\t\t\t\t\t\t\t" . '<option value="1" ';

	if ($tpl_index[showstyle][$v[catid]] == 1) {
		echo 'selected';
	}

	echo '>单列</option> ' . "\r\n\t\t\t\t\t\t\t" . '<option value="2" ';

	if ($tpl_index[showstyle][$v[catid]] == 2) {
		echo 'selected';
	}

	echo '>双列</option>' . "\r\n\t\t\t\t\t\t\t" . '<option value="3" ';

	if ($tpl_index[showstyle][$v[catid]] == 3) {
		echo 'selected';
	}

	echo '>三列</option>' . "\r\n\t\t\t\t\t\t" . '</select>' . "\r\n\t\t\t\t\t\t" . '</li>' . "\r\n\t\t\t\t\t\t" . '</ul>' . "\r\n\t\t\t\t\t";
}

echo "\t\t\t\t" . '</div>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t" . '</div>' . "\r\n" . '        <div id="classic_tpl" style="display:';

if ($tpl_index[banmian] != 'classic') {
	echo 'none';
}

echo ';">' . "\r\n" . '            <div class="simple_tpl_bg">' . "\r\n" . '                <div class="bd">' . "\r\n" . '                    <table cellpadding="0" cellspacing="0">' . "\r\n" . '                        <tr>' . "\r\n" . '                            <td>首页展示分类栏目至多数量</td>' . "\r\n" . '                            <td><input name="tpl_index[classic][cats]" type="txt" class="txt" value="';
echo $tpl_index[classic][cats];
echo '"></td>' . "\r\n" . '                        </tr>' . "\r\n" . '                    </table>' . "\r\n" . '                </div>' . "\r\n" . '            </div>' . "\r\n" . '        </div>' . "\r\n\t\t" . '<div id="portal_tpl" style="display:';

if ($tpl_index[banmian] != 'portal') {
	echo 'none';
}

echo ';">' . "\r\n\t\t\t" . '<div class="simple_tpl_bg">' . "\r\n\t\t\t\t" . '<div class="hd">板块ID指定（以适应自行修改过分类后，模板模块不对应）</div>' . "\r\n\t\t\t\t" . '<div class="bd">' . "\r\n\t\t\t\t\t" . '<table cellpadding="0" cellspacing="0">' . "\r\n\t\t\t\t\t\t" . '<tr><td>当前 <span>二手转让</span>栏目ID（默认1）</td><td><input name="tpl_index[portal][ershou]" type="txt" class="txt" value="';
echo $tpl_index[portal][ershou];
echo '"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;模型ID（默认2）<input name="tpl_index[portal][ershoumod]" type="txt" class="txt" value="';
echo $tpl_index[portal][ershoumod];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td>当前 <span>出租房</span>栏目ID（默认41）</td><td><input name="tpl_index[portal][zufang]" type="text" class="txt" value="';
echo $tpl_index[portal][zufang];
echo '"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;模型ID（默认23）<input name="tpl_index[portal][zufangmod]" type="txt" class="txt" value="';
echo $tpl_index[portal][zufangmod];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td>当前 <span>二手房</span>栏目ID（默认43）</td><td><input name="tpl_index[portal][ershoufang]" type="txt" class="txt" value="';
echo $tpl_index[portal][ershoufang];
echo '"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;模型ID（默认22）<input name="tpl_index[portal][ershoufangmod]" type="txt" class="txt" value="';
echo $tpl_index[portal][ershoufangmod];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td>当前 <span>招聘</span>栏目ID（默认4）</td><td><input name="tpl_index[portal][zhaopin]" type="text" class="txt" value="';
echo $tpl_index[portal][zhaopin];
echo '"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;模型ID（默认7）<input name="tpl_index[portal][zhaopinmod]" type="txt" class="txt" value="';
echo $tpl_index[portal][zhaopinmod];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td>当前 <span>求职简历</span>栏目ID（默认6）</td><td><input name="tpl_index[portal][jianli]" type="text" class="txt" value="';
echo $tpl_index[portal][jianli];
echo '"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;模型ID（默认9）<input name="tpl_index[portal][jianlimod]" type="txt" class="txt" value="';
echo $tpl_index[portal][jianlimod];
echo '"></td></tr>' . "\r\n\t\t\t\t\t" . '</table>' . "\r\n\t\t\t\t" . '</div>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t\t" . '<div class="clear"></div>' . "\r\n\t\t\t" . '<div class="simple_tpl_bg" style="margin-top:5px;">' . "\r\n\t\t\t\t" . '<div class="hd">各分类选项名（以适应自行修改过选项名后，首页模板选项值不显示 <a href="info_type.php?classid=2" target="_blank">查看选项名</a>）</div>' . "\r\n\t\t\t\t" . '<div class="bd">' . "\r\n\t\t\t\t\t" . '<table cellpadding="0" cellspacing="0">' . "\r\n\t\t\t\t\t\t" . '<tr><td><span>二手房</span>面积选项名（默认acreage）</td><td><input style="width:100px;" name="tpl_index[portali][acreage]" type="txt" class="text" value="';
echo $tpl_index[portali][acreage];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td><span>二手房</span>房价选项名（默认prices）</td><td><input style="width:100px;" name="tpl_index[portali][prices]" type="txt" class="text" value="';
echo $tpl_index[portali][prices];
echo '"></td></tr>' . "\r\n\t\t\t\t\t\t" . '<tr><td><span>招聘</span>公司名选项名（默认company）</td><td><input style="width:100px;" name="tpl_index[portali][company]" type="txt" class="text" value="';
echo $tpl_index[portali][company];
echo '"></td></tr>' . "\r\n\t\t\t\t\t" . '</table>' . "\r\n\t\t\t\t" . '</div>' . "\r\n\t\t\t" . '</div>' . "\r\n\t\t" . '</div>' . "\r\n\t\t" . '</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr class="firstr">' . "\r\n" . '        <td colspan="2">首页调用数详细设置</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>首页置顶信息至多显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="indextopinfo" name="tpl_index[indextopinfo]" value="';
echo $tpl_index[indextopinfo];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>最新发布信息至多显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="newinfo" name="tpl_index[newinfo]" value="';
echo $tpl_index[newinfo];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>网站公告至多显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="announce" name="tpl_index[announce]" value="';
echo $tpl_index[announce];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>帮助中心至多显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="faq" name="tpl_index[faq]" value="';
echo $tpl_index[faq];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>网站新闻至多显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="news" name="tpl_index[news]" value="';
echo $tpl_index[news];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>各个栏目下的信息显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="foreachinfo" name="tpl_index[foreachinfo]" value="';
echo $tpl_index[foreachinfo];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>商品显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="goods" name="tpl_index[goods]" value="';
echo $tpl_index[goods];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>便民电话显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="telephone" name="tpl_index[telephone]" value="';
echo $tpl_index[telephone];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="white">' . "\r\n" . '        <td width="20%" class="altbg1" ><b>生活百宝箱显示数量:</b></td>' . "\r\n\t\t" . '<td class="altbg2">' . "\r\n\t\t\t" . '<input id="lifebox" name="tpl_index[lifebox]" value="';
echo $tpl_index[lifebox];
echo '" type="text" class="txt">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input class="mymps large" value="提 交" name="';
echo CURSCRIPT;
echo '_submit" type="submit"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

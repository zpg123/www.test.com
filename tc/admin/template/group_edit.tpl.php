<?php

include mymps_tpl('inc_head');
echo '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'function check_sub(){' . "\r\n\t" . 'if (document.form1.gname.value=="") {' . "\r\n\t\t" . 'alert(\'请填写活动标题\');' . "\r\n\t\t" . 'document.form1.gname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.userid.value=="") {' . "\r\n\t\t" . 'alert(\'请填写发起活动的会员用户名\');' . "\r\n\t\t" . 'document.form1.userid.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.gaddress.value=="") {' . "\r\n\t\t" . 'alert(\'请填写活动地点！\');' . "\r\n\t\t" . 'document.form1.gaddress.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.meetdate.value=="") {' . "\r\n\t\t" . 'alert(\'请选择集合时间！\');' . "\r\n\t\t" . 'document.form1.meetdate.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.enddate.value=="") {' . "\r\n\t\t" . 'alert(\'请选择结束时间！\');' . "\r\n\t\t" . 'document.form1.enddate.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.des.value=="") {' . "\r\n\t\t" . 'alert(\'请填写简短说明！\');' . "\r\n\t\t" . 'document.form1.des.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.vbm tr{ background:#ffffff}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n" . '</style>' . "\r\n" . '<form action="?part=edit&id=';
echo $id;
echo '" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check_sub();">' . "\r\n" . '<input name="pre_picture" value="';
echo $edit['pre_picture'];
echo '" type="hidden">' . "\r\n" . '<input name="picture" value="';
echo $edit['picture'];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">基本信息</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">团购名称:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <input type="text" name="gname" value="';
echo $edit['gname'];
echo '" class="text" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">发起商家用户名:<font color="red">*</font></td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="userid" id="userid" value="';
echo $edit['userid'];
echo '" class="text" style="background-color:#eee"/> <font color=red>非必要，请勿修改</font>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">团购分类:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        ';
echo get_groupclass_select('cate_id', $edit['cate_id']);
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">所属地区:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <select name="areaid">' . "\r\n" . '        ';
echo cat_list('area', 0, $edit['areaid']);
echo '        </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">活动地点:<font color="red">*</font></td>' . "\r\n" . '    <td><input type="text" name="gaddress" value="';
echo $edit['gaddress'];
echo '" class="text" /></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">集合时间:<font color="red">*</font></td>' . "\r\n" . '    <td><input type="text" name="meetdate" value="';
echo $meetdate;
echo '" class="text" style="width:80px"/>(YYYY-MM-DD)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">结束时间:<font color="red">*</font></td>' . "\r\n" . '    <td><input type="text" name="enddate" value="';
echo $enddate;
echo '" class="text" style="width:80px"/>(YYYY-MM-DD)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">活动简介:<font color="red">*</font></td>' . "\r\n" . '    <td><textarea name="des" style="height:60px; width:500px;">';
echo de_textarea_post_change($edit['des']);
echo '</textarea></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">预览图片</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">团购图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    ';
echo '<img src=' . $mymps_global[SiteUrl] . '' . $edit[pre_picture] . ' style=\'_margin-top:expression(( 180 - this.height ) / 2);\' />' . "\r\n";
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">更新图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <input type="file" name="group_image" size="30" id="litpic" onChange="SeePic(document.picview,document.form1.litpic);">' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">预览:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <img src="template/images/mpview.gif" width="150" id="picview" name="picview" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">附加信息</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n\t" . '<td class="altbg1">排列顺序</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input name="displayorder" class="txt" value="';
echo $edit['displayorder'];
echo '">' . "\r\n" . '    <br><br>' . "\r\n" . '    数值越大，排列越靠前' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n\t" . '<td class="altbg1">报名人数</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input name="signintotal" class="txt" value="';
echo $edit['signintotal'];
echo '">' . "\r\n" . '    <br><br>' . "\r\n" . '    更改活动报名人数的显示，可帮您提高虚拟人气，新报名数字将在此基础上累加' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n\t" . '<td class="altbg1">状态设置</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="glevel">' . "\r\n" . '    ' . "\t";

foreach ($glevel as $k => $v ) {
	echo '    ' . "\t" . '<option value="';
	echo $k;
	echo '" ';

	if ($edit['glevel'] == $k) {
		echo 'selected style=\'background-color:#6eb00c; color:white!important;\'';
	}

	echo '>';
	echo $v;
	echo '</option>' . "\r\n" . '        ';
}

echo '    </select><br><br>' . "\r\n" . '    审核通过，组团中均开启报名；待审核，活动流产，活动结束则隐藏报名' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">带队团长:</td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="mastername" id="mastername" value="';
echo $edit['mastername'];
echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">团长QQ:</td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="masterqq" id="masterqq" value="';
echo $edit['masterqq'];
echo '" class="text"/><br>' . "\r\n" . '<br>供活动详情页面，团长旁边的在线QQ调用' . "\r\n\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">讨论地址:</td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="commenturl" value="';
echo $edit['commenturl'];
echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">与此次活动的商家关系:</td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="biztype" value="';
echo $edit['biztype'];
echo '" class="text"/> 例如：合作，非合作' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">备注说明:</td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <textarea name="othercontent" style="width:300px; height:100px;">';
echo $edit['othercontent'];
echo '</textarea>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">' . "\r\n";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="group_submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

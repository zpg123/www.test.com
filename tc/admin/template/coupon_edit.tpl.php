<?php

include mymps_tpl('inc_head');
echo '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'function check_sub(){' . "\r\n\t" . 'if (document.form1.title.value=="") {' . "\r\n\t\t" . 'alert(\'请填写优惠券名称\');' . "\r\n\t\t" . 'document.form1.title.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.userid.value=="") {' . "\r\n\t\t" . 'alert(\'请填写发布商家会员用户名\');' . "\r\n\t\t" . 'document.form1.userid.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.des.value=="") {' . "\r\n\t\t" . 'alert(\'请填写简短说明！\');' . "\r\n\t\t" . 'document.form1.des.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.vbm tr{ background:#ffffff}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n" . '</style>' . "\r\n" . '<form action="?part=edit&id=';
echo $id;
echo '" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check_sub();">' . "\r\n" . '<input name="pre_picture" value="';
echo $edit['pre_picture'];
echo '" type="hidden">' . "\r\n" . '<input name="picture" value="';
echo $edit['picture'];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">基本信息</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠券名称:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <input type="text" name="title" value="';
echo $edit['title'];
echo '" class="text" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">发布商家:<font color="red">*</font></td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="userid" id="userid" value="';
echo $edit['userid'];
echo '" class="text" style="background-color:#eee"/> <font color=red>非必要，请勿修改</font>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠券分类:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        ';
echo get_couponclass_select('cate_id', $edit['cate_id']);
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">所属地区:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <select name="areaid">' . "\r\n" . '        ';
echo cat_list('area', 0, $edit['areaid']);
echo '        </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">有效期:</td>' . "\r\n" . '    <td><input type="text" name="begindate" value="';
echo $begindate;
echo '" class="text" style="width:80px"/> - <input type="text" name="enddate" value="';
echo $enddate;
echo '" class="text" style="width:80px" />&nbsp;(YYYY-MM-DD)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠说明:<font color="red">*</font></td>' . "\r\n" . '    <td><textarea name="des" style="height:60px; width:500px;">';
echo de_textarea_post_change($edit['des']);
echo '</textarea></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠券类型:</td>' . "\r\n" . '    <td>' . "\r\n" . '         <label for="1"><input name="ctype" type="radio" id="1" onclick=\'$("sup").style.display = "";\' class="radio" ';
if (($edit['ctype'] == '折扣券') || empty($edit['ctype'])) {
	echo 'checked';
}

echo '>折扣券</label> <label for="2"><input name="ctype" class="radio" onclick=\'$("sup").style.display = "none";\' value="2" id="2" type="radio" ';

if ($edit['ctype'] == '抵价券') {
	echo 'checked';
}

echo '>抵价券</label>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr id="sup" ';

if ($edit['sup'] == '抵价券') {
	echo 'style="display:none"';
}

echo '>' . "\r\n\t" . '<td class="altbg1">折扣</td>' . "\r\n" . '    <td><input name="sup" class="txt" value="';
echo $edit['sup'];
echo '"> 折</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">可用:</td>' . "\r\n" . '    <td>' . "\r\n" . '        <input type="radio" name="status" value="1" id="radio_status_1"  checked="checked" class="radio"/><label for="radio_status_1">可用</label>&nbsp;<input type="radio" name="status" value="2" id="radio_status_2" class="radio"/><label for="radio_status_2">失效</label>                </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n\t" . '<td class="altbg1">状态</td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="grade">' . "\r\n" . '    ' . "\t" . '<option value="0" ';

if ($edit['grade'] == 0) {
	echo 'selected style=\'background-color:#6eb00c; color:white!important;\'';
}

echo '>待审</option>' . "\r\n" . '        <option value="1" ';

if ($edit['grade'] == 1) {
	echo 'selected style=\'background-color:#6eb00c; color:white!important;\'';
}

echo '>正常</option>' . "\r\n" . '        <option value="2" ';

if ($edit['grade'] == 2) {
	echo 'selected style=\'background-color:#6eb00c; color:white!important;\'';
}

echo '>推荐</option>' . "\r\n" . '    </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">预览图片</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠券图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    ';
echo '<img src=' . $mymps_global[SiteUrl] . '' . $edit[pre_picture] . ' style=\'_margin-top:expression(( 180 - this.height ) / 2);\' />' . "\r\n";
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">更新图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <input type="file" name="coupon_image" size="30" id="litpic" onChange="SeePic(document.picview,document.form1.litpic);">' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">预览:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <img src="template/images/mpview.gif" width="150" id="picview" name="picview" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">' . "\r\n";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="coupon_submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

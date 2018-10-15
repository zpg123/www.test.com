<?php

include mymps_tpl('inc_head');
echo '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'function check_sub(){' . "\r\n\t" . 'if (document.form1.goodsname.value=="") {' . "\r\n\t\t" . 'alert(\'请填写商品名称\');' . "\r\n\t\t" . 'document.form1.goodsname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.userid.value=="") {' . "\r\n\t\t" . 'alert(\'请填写发起商品的会员用户名\');' . "\r\n\t\t" . 'document.form1.userid.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.form1.content.value=="") {' . "\r\n\t\t" . 'alert(\'请填写商品详细介绍！\');' . "\r\n\t\t" . 'document.form1.content.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<style>' . "\r\n" . '.vbm tr{ background:#ffffff}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n" . '</style>' . "\r\n" . '<form name="form1" action="?part=edit&id=';
echo $id;
echo '" method="post" enctype="multipart/form-data" onSubmit="return check_sub();">' . "\r\n" . '<input name="pre_picture" value="';
echo $edit['pre_picture'];
echo '" type="hidden">' . "\r\n" . '<input name="picture" value="';
echo $edit['picture'];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">基本信息</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">商品名称:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <input type="text" name="goodsname" value="';
echo $edit['goodsname'];
echo '" class="text" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1" width="15%">供货商家用户名:<font color="red">*</font></td>' . "\r\n" . '    <td width="75%">' . "\r\n" . '        <input type="text" name="userid" id="userid" value="';
echo $edit['userid'];
echo '" class="text" style="background-color:#eee"/> <font color=red>非必要，请勿修改</font>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">市场价格:</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<input name="oldprice" value="';
echo $edit['oldprice'];
echo '" type="text" class="text" style="width:50px"/> ';
echo $moneytype;
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">优惠价格:</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<input name="nowprice" value="';
echo $edit['nowprice'];
echo '" type="text" class="text" style="width:50px"/> ';
echo $moneytype;
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">商品分类:<font color="red">*</font></td>' . "\r\n" . '    <td>' . "\r\n" . '        <select name="catid">' . "\r\n\t" . '<option value="">==选择商品所属的分类==</option>' . "\r\n\t";
echo goods_cat_list(0, $edit['catid']);
echo "\t" . '</select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">预览图片</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">商品图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    ';
echo '<img src=' . $mymps_global[SiteUrl] . '' . $edit[pre_picture] . ' style=\'_margin-top:expression(( 180 - this.height ) / 2);\' />' . "\r\n";
echo '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">更新图片:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <input type="file" name="goods_image" size="30" id="litpic" onChange="SeePic(document.picview,document.form1.litpic);">' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">预览:</td>' . "\r\n" . '    <td> ' . "\r\n" . '    <img src="template/images/mpview.gif" width="150" id="picview" name="picview" />' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr class="firstr">' . "\r\n\t" . '<td colspan="2">附加信息</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">赠送礼品:</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<input name="gift" value="';

if ($edit['gift'] == '') {
	echo '本商品没有赠送礼品';
}
else {
	echo $edit['gift'];
}

echo '" class="text">' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">货源情况:</td>' . "\r\n" . '    <td>' . "\r\n\t" . '<input name="huoyuan" type="radio" class="radio" value="1" ';
if (($edit['huoyuan'] == 1) || !$id) {
	echo 'checked';
}

echo '>有货' . "\r\n\t" . '<input name="huoyuan" type="radio" class="radio" value="2" ';

if ($edit['huoyuan'] != 1) {
	echo 'checked';
}

echo '>缺货' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">商品属性:</td>' . "\r\n" . '    <td>' . "\r\n\t\t" . '<input name="rushi" type="checkbox" class="radio" value="1" ';
if (($edit['rushi'] == 1) || !$id) {
	echo 'checked';
}

echo '>如实描述' . "\r\n\t\t" . '<input name="tuihuan" type="checkbox" class="radio" value="1" ';
if (($edit['tuihuan'] == 1) || !$id) {
	echo 'checked';
}

echo '>七天退换' . "\r\n\t\t" . '<input name="jiayi" type="checkbox" class="radio" value="1" ';
if (($edit['jiayi'] == 1) || !$id) {
	echo 'checked';
}

echo '>假一赔三' . "\r\n\t\t" . '<input name="weixiu" type="checkbox" class="radio" value="1" ';

if ($edit['weixiu'] == 1) {
	echo 'checked';
}

echo '>30天维修' . "\r\n\t\t" . '<input name="fahuo" type="checkbox" class="radio" value="1" ';
if (($edit['fahuo'] == 1) || !$id) {
	echo 'checked';
}

echo '>闪电发货' . "\r\n\t\t" . '<input name="zhengpin" type="checkbox" class="radio" value="1" ';
if (($edit['zhengpin'] == 1) || !$id) {
	echo 'checked';
}

echo '>正品保障' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr>' . "\r\n" . '    <td class="altbg1">商品状态:</td>' . "\r\n" . '    <td>' . "\r\n\t\t" . '<input name="onsale" type="checkbox" class="radio" value="1" ';

if ($edit['onsale'] == 1) {
	echo 'checked';
}

echo '>上架' . "\r\n\t\t" . '<input name="tuijian" type="checkbox" class="radio" value="1" ';

if ($edit['tuijian'] == 1) {
	echo 'checked';
}

echo '>推荐' . "\r\n\t\t" . '<input name="remai" type="checkbox" class="radio" value="1" ';

if ($edit['remai'] == 1) {
	echo 'checked';
}

echo '>热卖' . "\r\n\t\t" . '<input name="cuxiao" type="checkbox" class="radio" value="1" ';

if ($edit['cuxiao'] == 1) {
	echo 'checked';
}

echo '>促销' . "\r\n\t\t" . '<input name="baozhang" type="checkbox" class="radio" value="1" ';
if (($edit['baozhang'] == 1) || !$id) {
	echo 'checked';
}

echo '>加入消费者保障计划' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">';
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<div style="padding-left:18%; padding-top:10px; padding-bottom:10px;">' . "\r\n" . '<input type="submit" name="goods_submit" value="提 交" class="mymps large" style="margin-right:15px"/>' . "\r\n" . '<input type="button" onclick="history.back();" value="返回" class="mymps large" />' . "\r\n" . '</div>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

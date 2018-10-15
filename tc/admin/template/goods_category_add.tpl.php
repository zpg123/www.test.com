<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.catname.value==""){' . "\r\n\t\t" . 'alert(\'请输入分类标题！\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form.catname.value.length<2){' . "\r\n\t\t" . 'alert(\'分类标题请控制在2个字节以上!\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function do_copy(){' . "\r\n" . '  ff = document.form1;' . "\r\n" . '  ff.title.value=document.getElementById("catname").value;' . "\r\n" . '  ff.keywords.value=document.getElementById("catname").value;' . "\r\n" . '}' . "\r\n\r\n" . 'function isUndefined(variable) {' . "\r\n\t" . 'return typeof variable == \'undefined\' ? true : false;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit(text) {' . "\r\n\t" . '$(\'jstemplate\').focus();' . "\r\n\t" . '$(\'jstemplate\').value=text;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?part=list">商品分类</a></li>' . "\r\n" . '                <li><a href="?part=add" class="current">增加分类</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=add">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'1\')">分类基本信息</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_1">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">分类名称： </td>' . "\r\n" . '  <td><textarea rows="5" name="catname" cols="50"></textarea><br />' . "\r\n" . '<div style="margin-top:3px">支持商品分类批量添加，多个分类以 | 隔开 <br />' . "\r\n" . '<font color="red">范例：分类1|分类2|分类3|分类4|分类5</font></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">隶属分类： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根分类...</option>' . "\r\n\t";
echo goods_cat_list(1, 0, true, 1);
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">分类排序： </td>' . "\r\n" . '  <td><input name="catorder" type="text" id="catorder" value="';
echo $maxorder;
echo '" class="txt"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">是否启用： </td>' . "\r\n" . '  <td><select name="isview">' . "\r\n" . '      ';
echo get_ifview_options();
echo '      </select></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="确认提交" name="';
echo CURSCRIPT;
echo '_submit" class="mymps mini" />　' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

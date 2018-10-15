<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n\t" . 'function CheckSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.focusorder.value==""){' . "\r\n\t" . '     alert("幻灯片顺序不能为空！");' . "\r\n\t" . '     document.form1.focusorder.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.words.value==""){' . "\r\n\t" . '     alert("图片说明不能为空！");' . "\r\n\t" . '     document.form1.words.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.url.value==""){' . "\r\n\t" . '     alert("跳转网址不能为空！");' . "\r\n\t" . '     document.form1.url.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.vbm_img.value==""){' . "\r\n\t" . '     alert("请上传图片！");' . "\r\n\t" . '     document.form1.vbm_img.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<form method="post" name="form1" action="focus.php?part=';
echo $part;
echo '" enctype="multipart/form-data"  onSubmit="return CheckSubmit();">' . "\r\n" . '<input name="image" value="';
echo $row[image];
echo '" type="hidden">' . "\r\n" . '<input name="pre_image" value="';
echo $row[pre_image];
echo '" type="hidden">' . "\r\n" . '<input name=id type=hidden value="';
echo $row[id];
echo '"/>' . "\r\n" . '<input name="typename" value="';
echo $row[typename];
echo '" type="hidden" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '            <tbody>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%">图片源地址：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=image type=text class="text" style=\'background-color:#CCCCCC\' value="';
echo $row[image];
echo '" readonly="readonly"/> 不可更改' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%">原图片：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <img src="';
echo $row[pre_image];
echo '"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '            <tr bgcolor="#f5fbff">' . "\r\n" . '                <td align="right" valign="top">选择上传的图片：</td>' . "\r\n" . '                <td><input type="file" name="mymps_focus" size="45" id="litpic"><br /><br />' . "\r\n" . '                  支持上传的类型：';
echo $mymps_global[cfg_upimg_type];
echo '<br />' . "\r\n" . '网站首页幻灯片尺寸：';
echo $mymps_mymps[cfg_focus_limit][$tpl_index[banmian]][index][width];
echo ' * ';
echo $mymps_mymps[cfg_focus_limit][$tpl_index[banmian]][index][height];
echo '<br />' . "\r\n" . '新闻首页幻灯片尺寸：';
echo $mymps_mymps[cfg_focus_limit][news][width];
echo ' * ';
echo $mymps_mymps[cfg_focus_limit][news][height];
echo '<br />' . "\r\n" . '</td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%">图片顺序：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=focusorder type=text class="text" value="';
echo $row[focusorder];
echo '"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%">图片说明：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=words type=text class="text" value="';
echo $row[words];
echo '"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%">跳转网址：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=url type=text size=35 style=\'width:250px\' value="';
echo $row[url];
echo '"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '            </tbody>' . "\r\n" . '            <tfoot>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td height="45">&nbsp;</td>' . "\r\n" . '                <td height="45">' . "\r\n" . '                <input value="更 新" type="submit" class="mymps mini" name="';
echo CURSCRIPT;
echo '_submit">　' . "\r\n" . '                <input type="reset" onClick=history.back() value="返 回" class="mymps mini">' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '            </tfoot>' . "\r\n" . '          </table>' . "\r\n" . '</div>           ' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

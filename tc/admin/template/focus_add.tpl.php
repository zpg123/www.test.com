<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n\t" . 'function CheckSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.focusorder.value==""){' . "\r\n\t" . '     alert("幻灯片顺序不能为空！");' . "\r\n\t" . '     document.form1.focusorder.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.words.value==""){' . "\r\n\t" . '     alert("图片说明不能为空！");' . "\r\n\t" . '     document.form1.words.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.url.value==""){' . "\r\n\t" . '     alert("跳转网址不能为空！");' . "\r\n\t" . '     document.form1.url.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.mymps_focus.value==""){' . "\r\n\t" . '     alert("请上传图片！");' . "\r\n\t" . '     document.form1.mymps_focus.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<form method="post" name="form1" action="?part=add" enctype="multipart/form-data" onSubmit="return CheckSubmit();">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '            <tbody>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%" align="right" valign="top">选择位置：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <select name="typename">' . "\r\n" . '                ' . "\t" . '<option value="网站首页">网站首页</option>' . "\r\n" . '                    <option value="新闻首页">新闻首页</option>' . "\r\n" . '                </select>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%" align="right" valign="top">图片顺序：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=focusorder type=text class="text" value="';
echo $maxorder;
echo '"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%" align="right" valign="top">图片说明：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=words type=text class="text" />' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td width="15%" align="right" valign="top">跳转网址：</td>' . "\r\n" . '                <td>' . "\r\n" . '                <input name=url type=text class="text" value="http://"/>' . "\r\n" . '                </td>' . "\r\n" . '              </tr>' . "\r\n" . '              <tr bgcolor="#f5fbff" >' . "\r\n" . '                <td align="right" valign="top">选择上传的图片：</td>' . "\r\n" . '                <td><input type="file" name="mymps_focus" size="45" id="litpic"><br /><br />' . "\r\n" . '                  支持上传的类型：';
echo $mymps_global[cfg_upimg_type];
echo '<br />' . "\r\n" . '网站首页幻灯片尺寸：';
echo $mymps_mymps[cfg_focus_limit][$tpl_index[banmian]][index][width];
echo ' * ';
echo $mymps_mymps[cfg_focus_limit][$tpl_index[banmian]][index][height];
echo '<br />' . "\r\n" . '新闻首页幻灯片尺寸：';
echo $mymps_mymps[cfg_focus_limit][news][width];
echo ' * ';
echo $mymps_mymps[cfg_focus_limit][news][height];
echo '<br />' . "\r\n" . '</td>' . "\r\n" . '              </tr>' . "\r\n" . '            </tbody>' . "\r\n" . '          </table>' . "\r\n" . '</div> ' . "\r\n" . '<center><input class="mymps large" type="submit" value="上 传" name="focus_submit"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

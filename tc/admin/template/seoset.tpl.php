<?php

include mymps_tpl('inc_head');
echo '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<form action="seoset.php" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">SEO基本设置</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">网站标题，显示于title标签中网站名称之后，适当出现关键词</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="seo_sitename" value="';
echo $seo['seo_sitename'];
echo '" class="text"/></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">网站关键词，多个关键词以“,”分隔开</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="seo_keywords" value="';
echo $seo['seo_keywords'];
echo '" class="text"/></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">网站描述，不超过255个字符</td>' . "\r\n" . ' <td bgcolor="#ffffff"><textarea name="seo_description" style="height:100px; width:205px">';
echo $seo['seo_description'];
echo '</textarea></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">SEO详细设置</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#f5f8ff" style="font-weight:bold">' . "\r\n" . '      <td>针对页面</td>' . "\r\n" . '      <td>显示方式</td>' . "\r\n" . '    </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%">站务/about.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_about], 'seo_force_about');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >分类/category.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_category], 'seo_force_category');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >信息/info.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_info], 'seo_force_info');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >新闻/news.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_news], 'seo_force_news');
echo '</td>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >空间/space.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_space], 'seo_force_space');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >店铺/store.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_store], 'seo_force_store');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '   <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td >商品/goods.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_goods], 'seo_force_goods');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . '  <td>商家黄页/corp.php</td>' . "\r\n" . ' <td bgcolor="#ffffff">';
echo GetSeoType($seo[seo_force_yp], 'seo_force_yp');
echo '</td>' . "\r\n" . ' </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="seoset_submit" value="提 交" class="mymps large" type="submit"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

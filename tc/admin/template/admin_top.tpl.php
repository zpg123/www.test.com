<?php

echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link href="template/css/head.css" rel="stylesheet" type="text/css"><title>Mymps Administrator\'s Control Panel - powered by mymps</title><script type="text/javascript" src="js/menu.js"></script><script>var menus = new Array(\'index\',\'info\', \'member\', \'category\', \'news\', \'siteabout\', \'sitesys\',\'plugin\',\'extend\');function togglemenu(id) {if(parent.framLeft) {for(k in menus) {if(parent.framLeft.document.getElementById(menus[k])) {parent.framLeft.document.getElementById(menus[k]).style.display = menus[k] == id ? \'\' : \'none\';}}}}function sethighlight(n) {var lis = document.getElementsByTagName(\'li\');for(var i = 0; i < lis.length; i++) {lis[i].id = \'\';}lis[n].id = \'menuon\';}var framRight=window.parent.window.document.getElementById("framRight"); </script><style>body {background-color:#EAF7FF;margin:0;padding:0;overflow:visible;}.nav{font-size:14px;}img{ padding:0; margin:0}li{ list-style:none;}</style></head><body class="top" onLoad="sethighlight(\'0\')"><div class="logonav"><div class="logo"><img style="width:100%;height:100%" src="template/images/3_01.png" border="0" alt="蚂蚁分类"/></div><div class="nav">';
echo $mymps_admin_menu;
echo '<li class="more"><a href="javascript:;" onClick="framRight.contentWindow.setbg(\'';
echo MPS_SOFTNAME;
echo '功能菜单\',670,545,\'../box.php?part=adminmenu&admindir=';
echo $admindir;
echo '\');">全 部&nbsp;</a></li></div></div><div class="afterlogonav"><div class="left1"><a href="../" target="_blank">网站首页</a></div><div class="left2"><a href="#" onClick="parent.framRight.location=\'?do=manage&part=right\'">后台首页</a></div><div class="left3"><span>您好! <font color="#FF6600">';
echo $admin_name;
echo '</font>。您的IP是：<font color="#FF6600">';
echo GetIP();
echo '</font>，管理员级别是<font color="#FF6600">';
echo $level;
echo '</font>，管理员帐号是<font color="#FF6600">';
echo $admin_id;
echo '</font> [<a target="framRight" href="admin.php?do=user&part=edit&userid=';
echo $admin_id;
echo '" style="text-decoration:underline;">改密</a>，<a href="index.php?part=out" style="text-decoration:underline;" target="_top">注销</a>]</span></div></div></body></html>';

?>

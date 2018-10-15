<?php

echo '<html><head><meta http-equiv=\'Content-Type\' content=\'text/html; charset=utf-8\'><link rel="stylesheet" type="text/css" href="template/css/menu.css" /><script type="text/javascript" src="js/ShowLeft.js"></script><script type="text/javascript" src="js/mymps_noerr.js"></script><script type="text/javascript">function sethighlight(n) {var lis = document.getElementsByTagName(\'a\');for(var i = 0; i < lis.length; i++) {lis[i].className = \'\';}lis[n].className = \'hover\';}</script></head><body style="background-color:#2f2b2b;"><div id="my_menu" class="';
echo MPS_SOFTNAME;
echo '">';
echo $mymps_admin_menu;
echo '</div></body></html>';

?>

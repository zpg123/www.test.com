<?php

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\r\n" . '<html>' . "\r\n" . '<head>' . "\r\n" . '<meta http-equiv=\'Content-Type\' content=\'text/html; charset=utf-8\'>' . "\r\n" . '<title>';
echo $here;
echo '  - powered by ';
echo MPS_SOFTNAME;
echo '</title>' . "\r\n" . '<link href=\'template/css/';
echo MPS_SOFTNAME;
echo '.css\' rel=\'stylesheet\' type=\'text/css\'>' . "\r\n" . '<style>' . "\r\n" . 'body{ font-family:Arial, Helvetica, sans-serif!important;}' . "\r\n" . '</style>' . "\r\n" . '<script type=\'text/javascript\' src=\'../template/global/mymps.js\'></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'../template/global/noerr.js\'></script>' . "\r\n" . '<script type=\'text/javascript\' src=\'js/loading.js\'></script>' . "\r\n" . '<script language="javascript">' . "\r\n" . 'var current_domain = \'';
echo $mymps_global[SiteUrl];
echo '\';' . "\r\n" . 'function $$(obj){' . "\r\n\t" . 'return parent.document.getElementById(obj);' . "\r\n" . '}' . "\r\n" . 'function ascreen(){' . "\r\n\t" . 'if($$(\'adminheader\').style.display==\'\'){' . "\r\n\t\t" . 'fullscreen();' . "\r\n\t" . '} else if($$(\'adminheader\').style.display==\'none\'){' . "\r\n\t\t" . 'wrapscreen();' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function fullscreen(){' . "\r\n\t" . '$$(\'adminheader\').style.display=\'none\';' . "\r\n\t" . '$$(\'adminlefter\').style.display=\'none\';' . "\r\n\t" . '$obj(\'href\').href=\'javascript:wrapscreen();\';' . "\r\n" . '}' . "\r\n" . 'function wrapscreen(){' . "\r\n\t" . '$$(\'adminheader\').style.display=\'\';' . "\r\n\t" . '$$(\'adminlefter\').style.display=\'\';' . "\r\n\t" . '$obj(\'href\').href=\'javascript:fullscreen();\';' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '</head>' . "\r\n" . '<body ';

if ($_GET['go'] == 'mymps_config') {
	echo 'onLoad="parent.framRight.location=\'config.php\'"';
}

echo '>' . "\r\n" . '<div class=\'bodytitle\'>' . "\r\n" . '    <div class=\'bodytitleleft\'></div>' . "\r\n" . '    <div class=\'bodytitletxt\'>';
echo $here;
echo '</div>' . "\r\n" . '    <div class=\'bodytitleright\'></div>' . "\r\n" . '    ';

if ($part != 'phpinfo') {
	echo '    <div class=\'iicon\'>' . "\r\n" . '    <a href=\'javascript:window.location.reload();\'>刷新</a>' . "\r\n" . '    <a href=\'javascript:history.back();\'>后退</a>' . "\r\n" . '    <a href=\'javascript:history.go(1);\'>前进</a>' . "\r\n\t" . '<a href=\'javascript:ascreen();\' id="href">全屏</a>' . "\r\n" . '    </div>' . "\r\n" . '    ';
}

echo '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n" . '<div style="margin-left:10px; margin-top:5px;margin-right:10px;">' . "\r\n";



?>

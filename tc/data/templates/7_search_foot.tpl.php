<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<div id="footer"><div id="copyright"><span><font id="fonts">Powered by <a href="<?=MPS_WWW?>"><?=MPS_SOFTNAME?></a> <a href="<?=MPS_BBS?>"><?=MPS_VERSION?></a></font> <?php $mtime = explode(' ', microtime());$totaltime = number_format(($mtime['1'] + $mtime['0'] - $mymps_starttime), 6); echo 'Processed in '.$totaltime.' second(s) , '.$db->query_num.' queries'; ?></span> <?=$mymps_global['SiteStat']?></div></div><script type="text/javascript">loadDefault(['search','show_tab']);</script>
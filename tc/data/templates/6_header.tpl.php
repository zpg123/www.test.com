<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/spaces/store/js/common.js"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<div class="bartop">
<div class="barcenter">
<div class="barleft">
<ul><a target="_blank" href="<?=$mymps_global['SiteUrl']?>"><?=$mymps_global['SiteName']?>首页</a></ul>
<ul class="line"><u></u></ul>
            <ul><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=store">机构注册</a></ul>

</div>
<div class="barright">
        	
            <ul><a href="#" onClick="AddFavorite('<?=$uri['index']?>','<?=$store['tname']?>')">收藏</a></ul>
            <ul class="line"><u></u></ul>
            <ul><a href="<?=$uri['index']?>"><?=$uri['index']?></a></ul>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="head1">
<ul>
<div class="head1_left">
        	
            <div class="hright">
                <span class="storename"><?=$store['tname']?></span>
            </div>
</div>
<div class="head1_right">
<? if($store['tel']) { ?>咨询热线：<span><?=$store['tel']?></span><?php } ?>
        </div>
</ul>
</div>
<div class="clearfix"></div>
<div class="navigation">
<ul>
<li><a href="<?=$uri['index']?>" <? if($part == 'index') { ?>class="current"<?php } ?>>首页</a></li>
<li><a href="<?=$uri['about']?>" <? if($part == 'about') { ?>class="current"<?php } ?>>机构简介</a></li>
<li><a href="<?=$uri['info']?>" <? if($part == 'info') { ?>class="current"<?php } ?>>分类信息</a></li>
        <li><a href="<?=$uri['goods']?>" <? if($part == 'goods') { ?>class="current"<?php } ?>>商品展示</a></li>
        <?php $docunav = get_member_docunav(); ?><?php if(is_array($docunav)){foreach($docunav as $mymps) { ?><li><a <? if($mymps['typeid'] == $typeid || $mymps['typeid'] == $docu['typeid']) { ?>class="current"<?php } ?> href="<?=$mymps['uri']?>" ><?=$mymps['typename']?></a></li> <?php }} ?>
<li><a href="<?=$uri['comment']?>"<? if($part == 'comment') { ?>class="current"<?php } ?>>留言点评</a></li>
<li><a href="<?=$uri['album']?>"<? if($part == 'album') { ?>class="current"<?php } ?>>机构相册</a></li>
<li><a href="<?=$uri['contactus']?>"<? if($part == 'contactus') { ?>class="current"<?php } ?>>联系我们</a></li>
</ul>
</div>
<div class="clear"></div>
<div class="banner"><img src="<? if(!$store['banner']) { ?><?=$mymps_global['SiteUrl']?>/template/spaces/store/images/banner.gif<?php } else { ?><?=$mymps_global['SiteUrl']?><?=$store['banner']?><?php } ?>"></div>
<div class="clear"></div>
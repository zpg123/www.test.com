<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<? if($action == 'index' && $store['banner']) { ?><div class="gbanner" style='background-image:url("<?=$mymps_global['SiteUrl']?><?=$store['banner']?>")'></div><?php } ?>
<div class="infobox">
    <div class="infoboximg"   pageTitle="商家相册">
        <a href="javascript:void(0)"><img src='<?=$store['prelogo']?>' onerror="this.src='<?=$mymps_global['SiteUrl']?>/images/nophoto.jpg'"/></a>
    </div>
       
    <ul class="gsmc">
        <li><b><? echo $store['tname'] ? $store['tname'] : $store['userid'];; ?></b></li> 
        <li>
           <span class="dp_xx"><img src="<?=$mymps_global['SiteUrl']?>/images/credit/<?=$store['credits']?>.gif"></span>
        </li>
        <li>
        <? if($store['per_certify'] == 1) { ?>实名已认证<span class="smrz"></span><?php } else { ?>实名未认证<span class="nosmrz"></span><?php } ?>&nbsp;&nbsp;
<? if($store['com_certify'] == 1) { ?>执照已认证<span class="yyzz"></span><?php } else { ?>执照未认证<span class="noyyzz"></span><?php } ?>
        </li> 
    </ul>
</div>

<div class="clearfix"></div>

<ul class="infoitembox">
    <li>
    <i class="icon tel_ico"></i>
    <a style="text-decoration: none; color: #282828;" href="tel:<?=$store['tel']?>"><? echo $store['tel'] ? $store['tel'] : '暂无数据'; ?></a>
    </li>
    <li onclick="javascript:window.location.href='index.php?mod=store&id=<?=$store['id']?>&action=contact'" pageTitle="机构地址">
    <a href="javascript:void(0)">
    <i class="icon db_ico"></i><? echo $store['address'] ? $store['address'] : '暂无数据'; ?><i class="icon arr1"></i>
    </a>
    </li>
</ul>

<div class="select_01" id="wrapper2">
    <ul class="tab-hd" id="scroller2">
        <?php if(is_array($navi)){foreach($navi as $k => $mymps) { ?>        <li id="ele_<?=$k?>" class="item <? if($action == $k) { ?>current<?php } ?>"><a href="index.php?mod=store&id=<?=$store['id']?>&action=<?=$k?>"><?=$mymps?></a></li>
        <?php }} ?>
    </ul>
</div>
<div class="clear"></div>
<script type="text/javascript" src="template/js/iscroll-probe.js"></script>
<script>
(function($){
    var w_w = $(window).width();
    $('#scroller2').css('width',(90*$('#scroller2').find('li').length)+40+'px'); 
    window['myScroll2'] = new IScroll('#wrapper2', {
        scrollX: true,
        scrollY: false,
        click:true,
        keyBindings: true
    });
})(jQuery);
</script>
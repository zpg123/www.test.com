<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?><?php $navigation = get_mobile_nav(); ?><div class="select_01" id="wrapper2">
    <ul class="tab-hd" id="scroller2">
        <?php if(is_array($navigation)){foreach($navigation as $mymps) { ?>        <li class="item <? if($mymps['flag'] == 'index') { ?>current<?php } ?>"><a style="color:<?=$mymps['color']?>;" target="<?=$mymps['target']?>" href="<?=$mymps['url']?>"><?=$mymps['title']?></a></li>
        <?php }} ?>
    </ul>
</div>
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
<div class="clearfix"></div>
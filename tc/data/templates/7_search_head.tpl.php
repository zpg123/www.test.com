<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<?php include mymps_tpl('search_header'); ?>
<div class="s_logo">
    <div class="logo"><a href="<?=$mymps_global['SiteUrl']?>"><img src="<?=$mymps_global['SiteLogo']?>" alt="<?=$mymps_global['SiteName']?>"></a></div>
    <div class="s_info">
    <form action="search.php?" method="get" />
        <div class="s_ulA" id="searchType">
            <ul>
                <li name="s8" id="s8_information" onclick="show_tab('information');" <? if($mod == 'information') { ?>class="current"<?php } ?>><a href="#">信息</a></li>
<? if($mymps_global['cfg_if_corp'] == 1) { ?><li name="s8" id="s8_store" onclick="show_tab('store');" <? if($mod == 'store') { ?>class="current"<?php } ?>><a href="#">商家</a></li><?php } ?><?php if(is_array($allowplugin)){foreach($allowplugin as $plugin) { ?>                <li name="s8" id="s8_<?=$plugin['flag']?>" onclick="show_tab('<?=$plugin['flag']?>');" <? if($mod == $plugin['flag']) { ?>class="current"<?php } ?>><a href="#"><?=$plugin['name']?></a></li>
<?php }} ?>
            </ul>
        </div>
        <div class="s_enter cc">
        	<input type="hidden" id="searchtype" name="mod" value="<?=$mod?>"/>
            <input type="hidden" name="catid" value="<?=$catid?>">
            <input type="hidden" name="areaid" value="<?=$areaid?>">
            <input placeholder="请输入关键词或分类名" value="<?=$keywords?>" class="s_input" type="text" name="keywords" >
            <button class="s_btn" type="submit">搜 索</button>
        </div>
        </form>
    </div>
</div>
<div class="cc"></div>
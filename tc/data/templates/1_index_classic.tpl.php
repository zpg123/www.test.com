<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?=$mymps_global['SiteUrl']?>/m/index.php");</script>
<title><?=$page_title?></title>
<meta name="keywords" content="<?=$mymps_global['seo_keywords']?>"/>
<meta name="description" content="<?=$mymps_global['seo_description']?>"/>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/index.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery-1.11.min.js" type="text/javascript"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?> full bodybg<?=$mymps_global['cfg_tpl_dir']?><?=$mymps_global['bodybg']?>"><script type="text/javascript">var current_domain="<?=$mymps_global['SiteUrl']?>"; </script>
<div class="bartop">
<div class="barcenter">
<div class="barleft">
<ul class="barcity">欢迎来到<?=$mymps_global['SiteName']?>！</ul> 
<ul class="line"><u></u></ul>
            <ul class="barcang"><a href="<?=$mymps_global['SiteUrl']?>/desktop.php" target="_blank" title="点击右键，选择“目标另存为”，将此快捷方式保存到桌面即可">保存到桌面</a></ul>
<ul class="line"><u></u></ul>
<ul class="barpost"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>">快速发布信息</a></ul>
<ul class="line"><u></u></ul>
<ul class="bardel"><a href="<?=$mymps_global['SiteUrl']?>/delinfo.php" rel="nofollow">修改/删除信息</a></ul>
<ul class="line"><u></u></ul>
<ul class="barwap"><a href="<?=$mymps_global['SiteUrl']?>/mobile.php">手机浏览</a></ul>
</div>
<div class="barright" id="iflogin"><img src="<?=$mymps_global['SiteUrl']?>/images/loading.gif" border="0" align="absmiddle"></div>
</div>
</div>
<div class="clear"></div>
<!--顶部横幅广告开始-->
<div id="ad_topbanner"></div>
<!--顶部横幅广告结束-->
<div class="clearfix"></div>
<div class="logosearchtel">
<div class="weblogo"><a href="<?=$mymps_global['SiteUrl']?>"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>" border="0"/></a></div>
    <!--<div class="webcity">
    	<span><? if($city['cityname']) { echo cutstr($city['cityname'],8,'...'); ?><?php } else { ?>总站<?php } ?></span><br><a>切换分站</a>
    </div>-->
    
    <div class="postedit">
<a class="post" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?catid=<?=$catid?>">免费发布信息</a>
</div>
<div class="websearch">
    	<div class="s_ulA" id="searchType">
            <ul>
                <li name="s8" id="s8_information" onclick="show_tab('information');" class="current"><a href="javascript:void(0);">信息</a></li>
<li name="s8" id="s8_store" onclick="show_tab('store');" ><a href="javascript:void(0);">商家</a></li>
                <li name="s8" id="s8_news" onclick="show_tab('news');" ><a href="javascript:void(0);">资讯</a></li>
                <li name="s8" id="s8_goods" onclick="show_tab('goods');" ><a href="javascript:void(0);">商品</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
<div class="sch_t_frm">
<form method="get" action="<?=$mymps_global['SiteUrl']?>/search.php?" id="searchForm" target="_blank">
            <input type="hidden" id="searchtype" name="mod" value="information"/>
<div class="sch_ct">
<input type="text" class="topsearchinput" value="请输入关键词或分类名" name="keywords" id="searchheader" onmouseover="if(this.value==='请输入关键词或分类名'){this.value='';}" x-webkit-speech lang="zh-CN"/>
</div>
<div>
<input type="submit" value="搜 索" class="btn-normal"/>
</div>
</form>
</div>
        <div class="clearfix"></div>
        <? if($navurl_head = mymps_get_navurl('head',20)) { ?>
        <div class="s_ulC">
        <ul>
        <?php if(is_array($navurl_head)){foreach($navurl_head as $k => $mymps) { ?>        <li><a href="<?=$mymps['url']?>" style="color:<?=$mymps['color']?>" target="<?=$mymps['target']?>" title="<?=$mymps['title']?>"><?=$mymps['title']?><sup class="<?=$mymps['ico']?>"></sup></a></li>
        <?php }} ?>
        </ul>
        </div>
        <?php } ?>
</div>
</div>
<div class="clear"></div><div class="bodybgcolor">
<div class="body1000">
    <div id="ad_header"></div>
<div class="clearfix"></div>
<div class="wrapper">
        <div class="focushead">
            <div class="categories">
                <dl id="infomenu">
                    <dt class="titup"><b>信息分类</b></dt>
                    <dd class="cont">
                    <ul>
                    <?php $i =1; ?>                    <?php if(is_array($index_cat)){foreach($index_cat as $mymps) { ?>                    <? if($i < 11) { ?>
                        <li>
                            <em><a href="<?=$mymps['uri']?>" style="color:<?=$mymps['color']?>" target="_blank"><?=$mymps['catname']?></a></em>
                            <dl>
                                <dt><b></b></dt>
                                <dd>
                                <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $w) { ?>                                <a href="<?=$w['uri']?>" style="color:<?=$w['color']?>" target="_blank" title="<?=$w['catname']?>"><?=$w['catname']?></a>
                                <?php }} ?>
                                </dd>
                            </dl>
                        </li>
                    <?php } ?>
                    <?php $i=$i+1; ?>                    <?php }} ?>
                    </ul>
                    </dd>
                </dl>
            </div>
<div class="focushead_right">
                <div class="daohang indexdh">
                    <ul>
                        <li><a href="<?=$mymps_global['SiteUrl']?>" id="index">首页</a></li>
                        <?php $navurl_header = mymps_get_navurl('header',15); ?>                        <?php if(is_array($navurl_header)){foreach($navurl_header as $k => $mymps) { ?>                        <li><a <? if($mymps['flag'] == $cat['catid'] || $mymps['flag'] == $cat['parentid']) { ?>class="current"<?php } ?> target="<?=$mymps['target']?>" id="<?=$mymps['flag']?>" href="<? if($mymps['flag'] != 'outlink' && $mymps['flag'] != 'corp') { ?><?php } ?><?=$mymps['url']?>"><font color="<?=$mymps['color']?>"><?=$mymps['title']?></font><sup class="<?=$mymps['ico']?>"></sup></a></li>
                        <?php }} ?>
                    </ul>
                </div>
                
                
                <div class="focuscorp">
                    <div class="focustop">
                        <?php $focus = mymps_get_focus('index',3); ?>                        <div class="banner">
                        <ul class="slide">
                        <?php if(is_array($focus)){foreach($focus as $k) { ?>                        <li>
                        <div class="wnum auto">
                        <a href="<?=$k['url']?>" class="sel" rel="nofollow"><img  src="<?=$k['image']?>" alt="<?=$k['words']?>" data-color=""/></a>
                        </div>
                        </li>
                        <?php }} ?>
                        </ul>
                        <div class="wnum auto">
                        	<ul class="num sel" style="left:-195px;">
                                <li class="active"></li>
                                <li class=""></li>
                                <li class=""></li>
                            </ul>
                        </div>
                        <ul class="arrow sel"><li class="prev"></li><li class="next"></li></ul>
                        </div>
                        
                    </div>
                    <div class="announcepost">
                        <div class="announcecorp">
                            <div id="tab1">
                                <ul>
                                    <li onmouseover="setTab(1,0)" class="now">首页置顶</li>
                                    <li onmouseover="setTab(1,1)">热点资讯</li>
                                    <li onmouseover="setTab(1,2)">网站公告</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div id="tablist1">
                            	<div class="tablist block course">
                                    <ul>
                                    <?php $index_topinfo = mymps_get_infos(7,NULL,3,NULL,NULL,NULL,NULL,NULL); ?>                                    <?php if(is_array($index_topinfo)){foreach($index_topinfo as $mymps) { ?>                                    <li><span class="title"><a target="_blank" href="<?=$mymps['uri']?>" title="<?=$mymps['title']?>" style="<? if($mymps['ifred'] ==1) { ?>color:red<?php } ?> <? if($mymps['ifbold'] ==1) { ?>font-weight:bold;<?php } ?>"><? echo cutstr($mymps['title'],42); ?></a></span><span class="money" title="<?=$mymps['catname']?>"><?=$mymps['catname']?></span></li>
                                    <?php }} else {{ ?>
                                    <div class="nodata">暂无相关记录！</div>
                                    <?php }} ?>
                                    </ul>
                                </div>
                                <div class="tablist none corp">
                                    <ul>
                                    <?php if(ifplugin('news')) $news = mymps_get_news(7); ?>                                    <?php if(is_array($news)){foreach($news as $mymps) { ?>                                    <li><span class="title"><a target="_blank" href="<?=$mymps['uri']?>" title="<?=$mymps['title']?>" <? if($mymps['iscommend'] ==1) { ?>style="color:red"<?php } ?>><? echo cutstr($mymps['title'],42); ?></a></span><span class="time">[<? echo GetTime($mymps['begintime'],'m-d'); ?>]</span></li>
                                    <?php }} else {{ ?>
                                    <div class="nodata">暂无相关记录！</div>
                                    <?php }} ?>
                                    </ul>
                                </div>
                                <div class="tablist none announce">
                                    <ul>
                                    <?php $announce = mymps_get_announce(7); ?>                                    <?php if(is_array($announce)){foreach($announce as $k => $mymps) { ?>                                    <li><span class="announcetitle"><a style="color:<?=$mymps['titlecolor']?>" title="<?=$mymps['title']?>" href="<?=$mymps['uri']?>" target="_blank"><?=$mymps['title']?></a></span><span class="announcetime">[<? echo GetTime($mymps['pubdate'],'m-d'); ?>]</span></li>
                                    <?php }} else {{ ?>
                                    <div class="nodata">暂无相关记录！</div>
                                    <?php }} ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="courseschool">
                                <a class="postinfo" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>" target="_blank">免费发布信息</a>
                                <a class="postmember" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=store" target="_blank">免费开通店铺</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <?php $members = mymps_get_members(14,NULL,NULL,NULL,2); ?>        <? if($members) { ?>
        <div class="clear5"></div>
<div class="hotschool">
<div class="rollBox">
            	<a href="javascript:;" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()" class="img1" hidefocus="true"></a>
                <div class="Cont" id="ISL_Cont">
                    <div class="ScrCont">
                        <div id="List1">
                        <?php if(is_array($members)){foreach($members as $k) { ?>                        <div class="pic">
                        <a href="<?=$k['uri']?>" target="_blank" ><img src="<?=$mymps_global['SiteUrl']?><?=$k['prelogo']?>"  alt="<?=$k['tname']?>"/></a> 
                        <span class="schoolname cfix"><a href="<?=$k['uri']?>" target="_blank" title="<?=$k['tname']?>"><? echo cutstr($k['tname'],20); ?></a></span>
                        <span class="seecourse"><a href="<?=$k['uri']?>" target="_blank" class="red">查看店铺</a></span>
                        </div>
                        <?php }} ?>
                        </div>
                        <div id="List2"></div>
                    </div>
                </div>
            	<a href="javascript:;"  onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()" class="img2" hidefocus="true"></a>
            </div>
</div>
        <?php } ?>

        <div class="clearfix"></div>
<div class="infolist">
        <?php $i=1; ?>        <?php if(is_array($index_cat)){foreach($index_cat as $fcat) { ?>        <? if($i < $tpl_index['classic']['cats']) { ?>
        <? if($i%2 != 0) { ?><div id="ad_indexcatad_<?=$fcat['catid']?>"></div><?php } ?>
        <div class="showbox <? if($i%2 != 0) { ?>sleft<?php } else { ?>sright<?php } ?>">
            <div class="hd">
                <div class="cattitle"><? if($fcat['icon']) { ?><img alt="<?=$fcat['catname']?>" src="<?=$mymps_global['SiteUrl']?><?=$fcat['icon']?>" align="absmiddle"/>&nbsp;&nbsp;<?php } ?><?=$fcat['catname']?>信息</div>
                <div class="postinfo"></div>
                <div class="moreinfo"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?catid=<?=$fcat['catid']?>" target="_blank">发信息</a> | <a href="<?=$fcat['uri']?>" target="_blank">更多</a></div>
            </div>
            <div class="bd">
                <ul>
                    <?php if(is_array($fcat['information'])){foreach($fcat['information'] as $info) { ?>                    <li>
                    <span class="time">[<? echo GetTime($info['begintime'],'m-d'); ?>]</span>
                    <span class="info"><a href="<?=$mymps_global['SiteUrl']?><?=$info['uri']?>" target="_blank" title="<?=$info['title']?>" style="<? if($info['ifred']==1) { ?>color:red;<?php } ?> <? if($info['ifbold'] == 1) { ?>font-weight:bold;<?php } ?>"><?=$info['title']?></a></span>
                    <span class="catname"><a href="<?=$info['caturi']?>" target="_blank"><?=$info['catname']?></a></span>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
        <? if($i%2 == 0) { ?><div id="ad_indexcatad_<?=$fcat['catid']?>"></div><?php } ?>
        <?php } ?>
        <?php $i++; ?>        <?php }} ?>
</div><?php if(ifplugin('goods')){$goods = mymps_get_goods($tpl_index['goods'],1); ?>        <div class="clearfix"></div>
<div class="goods">
        	<div class="ul">
<div class="hd">
<span class="hdleft">商品网购</span>
<span class="more"><a href="<?=$mymps_global['SiteUrl']?>/goods.php" target="_blank">更多</a></span>
</div>
<div class="bd">
<ul>
                <?php if(is_array($goods)){foreach($goods as $mymps) { ?><li>
<a href="<?=$mymps['uri']?>"  target=_blank><img src="<?=$mymps_global['SiteUrl']?>/<?=$mymps['pre_picture']?>" title="<?=$mymps['goodsname']?>"/>
<h3><?=$mymps['goodsname']?></h3>
</a>
<span class="price"><?=$mymps['nowprice']?></span>
</li>
                <?php }} ?>
              	</ul>
</div>
            </div>
</div>
<?php } ?>
        
        <?php $lifebox = mymps_get_lifebox($tpl_index['lifebox']); ?>        <?php $telephone = mymps_get_telephone($tpl_index['telephone']); ?>    	<? if($telephone) { ?>
        <div class="clear"></div>
<div class="telephone">
        	<div class="ul">
            <div class="hd" id="tab2">
                <ul>
                    <li onmouseover="setTab(2,0)" class="now">便民电话</li>
                    <? if($lifebox) { ?><li onmouseover="setTab(2,1)">生活助手</li><?php } ?>
                </ul>
            </div>
<div class="clearfix"></div>
            <div id="tablist2">
            	<div class="tablist telebd block">
                    <ul>
                        <?php if(is_array($telephone)){foreach($telephone as $k => $mymps) { ?>                        <li><font style="color:<?=$mymps['color']?>;<? if($mymps['if_bold'] == 1) { ?>font-weight:bold<?php } ?>"><?=$mymps['telname']?><br /><?=$mymps['telnumber']?></font></li>
                        <?php }} ?>
                    </ul>
                </div>
                
                <div class="tablist lifebd none">
                    <ul>
                    <?php if(is_array($lifebox)){foreach($lifebox as $k => $mymps) { ?>                    <li><a rel="nofollow" href="<?=$mymps_global['SiteUrl']?>/lifebox.php?id=<?=$mymps['id']?>" target="_blank"><?=$mymps['lifename']?></a></li>
                    <?php }} ?>
                    </ul>
                </div>
                
            </div>
            </div>
</div>
<?php } ?>
        
        <?php $friendlink = mymps_get_links(); ?><div class="clear"></div>
<div class="flink">
        <div class="ul">
        <div class="hd"><span class="hdleft">友情链接</span><span class="hd2"><a href="<?=$about['friendlink_uri']?>">我要申请</a></span></div>
        <div class="bd">
<? if($friendlink['img']) { ?>
<ul class="image"><?php if(is_array($friendlink['img'])){foreach($friendlink['img'] as $mymps) { ?><li><a href="<?=$mymps['url']?>" target="_blank" title="<?=$mymps['name']?>"><img src="<?=$mymps['logo']?>" border="0" /></a></li>
<?php }} ?>
</ul>
<?php } ?>
        <? if($friendlink['txt']) { ?>
<ul class="text"><?php if(is_array($friendlink['txt'])){foreach($friendlink['txt'] as $mymps) { ?><li><a href="<?=$mymps['url']?>" target="_blank" title="<?=$mymps['name']?>"><?=$mymps['name']?></a></li>
<?php }} ?>
</ul>
        <?php } ?>
        </div>
        </div>
</div>
<div class="clear"></div><div id="ad_footerbanner"></div>
<? if($advertisement['type']['floatad'] || $advertisement['type']['couplead']) { ?>
<div align="left"  style="clear: both;">
<script src="<?=$mymps_global['SiteUrl']?>/template/global/floatadv.js" type="text/javascript"></script>
<? if($advertisement['type']['couplead']) { ?>
<script type="text/javascript">
<?=$adveritems[$advertisement['type']['couplead']['0']]?>theFloaters.play();
</script>
<?php } if($advertisement['type']['floatad']) { ?>
<script type="text/javascript">
<?=$adveritems[$advertisement['type']['floatad']['0']]?>theFloaters.play();
</script>
<?php } ?>
</div>
<?php } ?>
<div style="display: none" id="ad_none">
<? if($advertisement['type']['headerbanner']) { ?>
<div class="header" id="ad_header_none"><?php $countheaderbanner = count($advertisement['type']['headerbanner']);$i=1; ?><?php if(is_array($advertisement['type']['headerbanner'])){foreach($advertisement['type']['headerbanner'] as $mymps) { if($adveritems[$mymps]) { ?><div class="headerbanner" <? if($countheaderbanner == $i) { ?>style="margin-right:0;"<?php } ?>><?=$adveritems[$mymps]?></div><?php } ?><?php $i=$i+1; ?><?php }} ?>
</div>
<?php } ?><?php if(is_array($advertisement['type']['indexcatad'])){foreach($advertisement['type']['indexcatad'] as $k => $mymps) { ?><div class="indexcatad" id="ad_indexcatad_<?=$k?>_none"><?=$adveritems[$mymps['0']]?></div>
<?php }} if($advertisement['type']['interlistad']['top']) { ?>
<div id="ad_interlistad_top_none">
<ul class="interlistdiv"><?php if(is_array($advertisement['type']['interlistad']['top'])){foreach($advertisement['type']['interlistad']['top'] as $mymps) { if($adveritems[$mymps]) { ?><li class="hover"><?=$adveritems[$mymps]?></li><?php } ?>
<?php }} ?>
</ul>
</div>
<?php } if($advertisement['type']['interlistad']['bottom']) { ?>
<div id="ad_interlistad_bottom_none">
<ul class="interlistdiv"><?php if(is_array($advertisement['type']['interlistad']['bottom'])){foreach($advertisement['type']['interlistad']['bottom'] as $mymps) { if($adveritems[$mymps]) { ?><li class="hover"><?=$adveritems[$mymps]?></li><?php } ?>
<?php }} ?>
</ul>
</div>
<?php } if($advertisement['type']['intercatad']) { ?>
<div class="intercatdiv" id="ad_intercatdiv_none"><?php if(is_array($advertisement['type']['intercatad'])){foreach($advertisement['type']['intercatad'] as $mymps) { ?><div class="intercatad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } if($advertisement['type']['topbanner']) { ?>
<div class="topbanner" id="ad_topbanner_none"><?php if(is_array($advertisement['type']['topbanner'])){foreach($advertisement['type']['topbanner'] as $mymps) { ?><div class="topbannerad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } if($advertisement['type']['footerbanner']) { ?>
<div class="footerbanner" id="ad_footerbanner_none"><?php if(is_array($advertisement['type']['footerbanner'])){foreach($advertisement['type']['footerbanner'] as $mymps) { ?><div class="footerbannerad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } ?>
</div>
<div class="footer_new">
    <div class="foot_new">
        <div class="foot_box">
        	<div class="hd">信息管理</div>
            <div class="bd">
            	<ul>
                	<li><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>">免费发布信息</a></li>
                    <li><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/delinfo.php" rel="nofollow">修改/删除信息</a></li>
                    <li><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/search.php" rel="nofollow">信息快速搜索</a></li>
                </ul>
            </div>
        </div>
       <!-- <div class="foot_box" id="sjfw">
        	<div class="hd">商家服务</div>
            <div class="bd">
            	<ul>
                	<li><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=store">商家入驻</a></li>
                    <li><a target="_blank" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>">商家登录</a></li>
                </ul>
            </div>
        </div>-->
        <div class="foot_box">
        	<div class="hd">关于我们</div>
            <div class="bd">
            	<ul>
                <?php $navurl_foot = mymps_get_navurl('foot',30); ?>                    <?php if(is_array($navurl_foot)){foreach($navurl_foot as $k => $mymps) { ?>                	<li><a href="<?=$mymps['url']?>" style="color:<?=$mymps['color']?>" target="<?=$mymps['target']?>"><?=$mymps['title']?><sup class="<?=$mymps['ico']?>"></sup></a></li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
        <div class="foot_wx">
        	<div class="hd">扫一扫，访问手机站</div>
            <div class="bd">
            	<ul>
                	<img alt="<?=$mymps_global['SiteName']?>手机版" src="<?=$mymps_global['SiteUrl']?>/qrcode.php?value=<?=$mymps_global['SiteUrl']?>/m/index.php&size=4.7">
                </ul>
            </div>
        </div>
        <div class="foot_wx" id="gzh">
        	<div class="hd">关注微信公众号</div>
            <div class="bd">
            	<ul>
                	<img alt="<?=$mymps_global['SiteName']?>微信公众号" src="<?=$mymps_global['SiteUrl']?>/erweima.gif">
                </ul>
            </div>
        </div>
        <div class="foot_mobile">
        	<ul>
            <? if($mymps_global['SiteTel']) { ?><div class="h1"><font><?=$mymps_global['SiteTel']?></font></div><?php } ?>
            <? if($mymps_global['SiteQQ']) { ?><div class="h2">客服QQ：<font><a class="_chat" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$mymps_global['SiteQQ']?>&site=qq&menu=yes" title="点击交谈" rel="nofollow" target="_blank"><?=$mymps_global['SiteQQ']?></a></font></div><?php } ?>
            <? if($mymps_global['SiteEmail']) { ?><div class="h3">邮箱：<font><?=$mymps_global['SiteEmail']?></font></div><?php } ?>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="foot_powered">
    	Copyright &copy; <?=$mymps_global['SiteName']?>版权所有 <a href="http://www.vwshijie.com">微网世界</a><a href="http://www.vwshijie.com"><?=$mymps_global['SiteBeian']?></a><font id="foots">Powered by <a href="http://www.vwshijie.com">vwshijie</a> <a href="http://www.vwshijie.com"><?=MPS_VERSION?></a></font><?=$mymps_global['SiteStat']?> <? if($cachetime) { ?>This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } else { ?><font class="none_<?=$mymps_mymps['debuginfo']?>"><?php $mtime = explode(' ', microtime());$totaltime = number_format(($mtime['1'] + $mtime['0']-$mymps_starttime), 6); echo ' , Processed in '.$totaltime.' second(s) , '.$db->query_num.' queries'; ?></font><?php } ?>
    </div>
</div>
<p id="back-to-top"><a href="#top"><span></span></a></p>
<script type="text/javascript">loadDefault(["addiv","iflogin","show_tab","scrolltop"]);</script></div>
</div>
</body>
</html>
<script type="text/javascript">loadDefault(['category','bannerslide','hotStore','setTab']);</script>
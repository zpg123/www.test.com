<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$page_title?></title>
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.head_<?=$mymps_global['head_style']?>.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/goods.head_<?=$mymps_global['head_style']?>.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/view.css" />
<script language="javascript">
var current_domain = '<?=$mymps_global['SiteUrl']?>';
</script>
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/global/messagebox.js"></script>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/goods.js"></script>
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
<div class="clear"></div><div class="body1000">
<div class="daohang_con">
    <div class="categories">
        <dl id="infomenu">
        <dt class="titup"><b>信息分类</b></dt>
        <dd class="cont" style="display:none;">
        <ul>
        <!--<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/data/caches/cats_js.php"></script>-->
        <?php $global_cat = get_categories_tree(0,'category'); ?>        <?php if(is_array($global_cat)){foreach($global_cat as $mymps) { ?>        <li>
        <em><a href="<?=$mymps['uri']?>" style="color:<?=$mymps['color']?>" target="_blank"><?=$mymps['catname']?></a></em>
        <dl>
        <dt><b></b></dt>
        <dd>
        <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $w) { ?>        <a href="<?=$w['uri']?>" style="color:<?=$w['color']?>" target="_blank" title="<?=$w['catname']?>"><?=$w['catname']?></a>
        <?php }} ?>
        </dd>
        </dl>
        </li>
        <?php }} ?>
        </ul>
        </dd>
        </dl>
    </div>
    <div class="daohang">
        <ul>
            <li><a href="<?=$mymps_global['SiteUrl']?>" id="index">首页</a></li>
            <?php $navurl_header = mymps_get_navurl('header',15); ?>            <?php if(is_array($navurl_header)){foreach($navurl_header as $k => $mymps) { ?>            <li><a <? if($mymps['flag'] == $cat['catid'] || $mymps['flag'] == $cat['parentid']) { ?>class="current"<?php } ?> target="<?=$mymps['target']?>" id="<?=$mymps['flag']?>" href="<? if($mymps['flag'] != 'outlink' && $mymps['flag'] != 'corp') { ?><?php } ?><?=$mymps['url']?>"><font color="<?=$mymps['color']?>"><?=$mymps['title']?></font><sup class="<?=$mymps['ico']?>"></sup></a></li>
            <?php }} ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<!--头部通栏广告开始-->
<div id="ad_header"></div>
<!--头部通栏广告结束-->
<div class="clearfix"></div>
<script>loadDefault(['category','category_select'])</script><div class="body1000">
<div class="clear"></div>
<div class="location"><?=$location?></div>
<div class="clear"></div>
<div class="indexcontent mt5" style="overflow:hidden">
<div class="cfix"> 
<div class="pro_mainPic">
<img src="<?=$mymps_global['SiteUrl']?><?=$goods['picture']?>" width="280" height="260" alt="" />
</div>
<div class="pro_mainInfo">
<div class="hd cfix">
<h2 title="<?=$goods['goodsname']?>"><? echo cutstr($goods['goodsname'],46); ?><img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/remai.gif" alt=""  style="display:<? if($goods['remai'] != 1) { ?>none<?php } ?>"/>
<img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/tuijian.gif" alt=""  style="display:<? if($goods['tuijian'] != 1) { ?>none<?php } ?>"/>
<img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/cuxiao.gif" alt=""   style="display:<? if($goods['cuxiao'] != 1) { ?>none<?php } ?>"/>
</h2>
<span class="right"><b><?=$goods['hit']?></b>人浏览过了</span>
<div class="clear"></div>
<div class="info cfix">
<div class="left">
                            <? if($goods['rushi'] == 1) { ?><span class="miaosu">如实描述</span><?php } if($goods['tuihuan'] == 1) { ?><span class="tuihuan">七天退换</span><?php } if($goods['jiayi'] == 1) { ?><span class="peisan">假一赔三</span><?php } if($goods['baozhang'] == 1) { ?><span class="baozhang">正品保障</span><?php } ?>
</div>
<div class="right" style="display:<? if($goods['baozhang'] != 1) { ?>none<?php } ?>">消费者保障计划</div>
</div>
</div>
<div class="bd">
<ul class="cfix">
<li>商品编号：<?=$goods['goodsbh']?></li>
<li>是否促销：<? echo $goods['cuxiao'] == 1 ? '是' : '否'; ?></li>
<li class="cfix"><span class="shangjia_name">供货商家：<a target="_blank" href='<?=$goods['tname_uri']?>'><?=$goods['tname']?></a></span><span class="shangjia"><img src="../template/default/images/pro_show_25.gif" alt="" style="display:none"/></span></li>
<li>货源：<? if($goods['huoyuan'] == 1) { ?><span class="youhuo">有货</span><?php } else { ?><span class="quehuo">无货</span><?php } ?></li>
</ul>
<div class="price">
<span class="title">市场价格：<del><?=$goods['oldprice']?></del>　我们价格：<b><?=$goods['nowprice']?></b></span>
</div>
<div class="presentation cfix"><a href="javascript:window.external.AddFavorite(window.location.href,document.title)" class="fav_pro">收藏此商品</a>赠送礼品：<?=$goods['gift']?></div>

<div class="push_button">
<div class="buy"><img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/pro_show_24.png" alt=""  style="cursor:pointer" onclick="setbg('购买商品',510,480,'<?=$mymps_global['SiteUrl']?>/box.php?part=goodsorder&id=<?=$goods['goodsid']?>');"  /></div>
<!--<div class="alipay"><img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/pro_show_26.png" alt="" /></div>-->
<div class="service cfix"> 
<ul>
<li class="pic"><a href="tencent://message/?uin=<?=$goods['oicq']?>&Site=&Menu=yes"  target="_blank "><img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/qq_online2.gif" alt="" border="0"/></a></li>
</ul> 
</div> 

</div>
</div>
</div>
</div>
<!-- 商品详情 -->
<div class="pro_info cfix">
                <div class="hd">
                <ul class="subtab cfix">
                <li name="s1" class="selected" id="s1_jieshao" onclick="showtab('jieshao');"><a href="javascript:;">商品介绍</a></li>
                <li name="s1" id="s1_quhuo" onclick="showtab('quhuo');"><a href="javascript:;">配送与取货</a></li>
                <li name="s1" id="s1_fukuan" onclick="showtab('fukuan');"><a href="javascript:;">付款方式</a></li>
                <li name="s1" id="s1_service" onclick="showtab('service');"><a href="javascript:;">售后服务</a></li>
                </ul>
                </div>


<div id="desc">
<ul class="bd" id="jieshao">
<?=$goods['content']?>
</ul>
<ul class="bd" id="quhuo" style="display:none">
<?=$goods['quhuo']?>
</ul>
<ul class="bd" id="fukuan" style="display:none">
<?=$goods['fukuan']?>
</ul>
<ul class="bd" id="service" style="display:none">
<?=$goods['service']?>
</ul>
</div>


</div>
<!-- 同类商品 -->
<div class="bl_module cfix">
<span class="tp_rc"></span>
<div class="bd">
<h3 class="yellow">同类商品推荐</h3>
<span class="line_yellow"></span>
<div class="cont_proList">
<ul class="cfix">
                        <?php if(is_array($relategoods)){foreach($relategoods as $relate) { ?><li> <b><a href="<?=$relate['uri']?>" target=_blank><img src="<?=$mymps_global['SiteUrl']?><?=$relate['picture']?>" alt=""  width="130" height="120"/></a></b> <span class="price"><?=$relate['nowprice']?><del>￥<?=$relate['old_price']?></del></span> <span class="title"><a href="<?=$relate['uri']?>"  target=_blank><? echo cutstr($relate['goodsname'],20); ?></a></span> </li>
<?php }} ?>
</ul>
</div>
</div>
<div class="ft"><a href="#top"><img src="<?=$mymps_global['SiteUrl']?>/plugin/goods/template/images/returnTop_08.gif" alt="top" /></a></div>
<span class="ft_rc"></span>
</div>
<!-- 主体 结束 -->
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
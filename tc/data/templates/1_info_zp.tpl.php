<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?=$mymps_global['SiteUrl']?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?=$mymps_global['SiteUrl']?>/m/index.php?mod=information&id=<?=$info['id']?>");</script>
<title><?=$page_title?></title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico">
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css">
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css">
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/information_zp.css">
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/information_comment.css">
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<meta name="keywords" content="<? if($info['extra']) { ?><?php if(is_array($info['extra'])){foreach($info['extra'] as $mymps) { if($mymps['value']) { ?><?=$mymps['title']?><?=$mymps['value']?>,<?php } ?><?php }} ?><?php } ?><?=$info['title']?>"
<meta name="description" content="<? echo cutstr(clear_html($info['content']),200); ?>"/>
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
<script>loadDefault(['category','category_select'])</script><div class="bodybgcolor">
<div class="body1000">
<div class="clear"></div>
<div class="location">
<?=$location?>
</div>
<div class="clear"></div>
<div class="wrapper">
<div class="information_bd">
<div class="bd_left <? if($info['upgrade_type_index'] == 2) { ?>sy_zhiding<?php } elseif($info['upgrade_type'] == 2) { ?>dl_zhiding<?php } elseif($info['upgrade_type_list'] == 2) { ?>xl_zhiding<?php } elseif($info['info_level'] == 2) { ?>tuijian<?php } ?>">
           	<div class="bd_lefter">
            <div class="information_hd ">
                <ul>
                    <div class="information_title"><?=$info['title']?></div>
                    <div class="clearfix"></div>
                    <div class="information_time">
                       <span class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享</a> &nbsp;|</span>
                       <span><? echo get_format_time($info['begintime']); ?>发布</span> 
                       <span><font id="hit"><img src="<?=$mymps_global['SiteUrl']?>/images/loading.gif" border="0" align="absmiddle"></font>次浏览</span>
                       <span>信息编号：<?=$info['id']?></span>
                       <span class="editor">
                        <li><a href="javascript:void(0);" onclick="setbg('置顶信息',538,248,'<?=$mymps_global['SiteUrl']?>/box.php?part=upgrade&id=<?=$info['id']?>');" style="color:red">置顶</a></li>
<li><a rel="nofollow" href="javascript:void(0);" onclick="setbg('收藏信息',538,270,'<?=$mymps_global['SiteUrl']?>/box.php?part=shoucang&infoid=<?=$info['id']?>')">收藏</a> &nbsp;| </li>
<li><a rel="nofollow" href="javascript:void(0);" onclick="setbg('删除信息',538,270,'<?=$mymps_global['SiteUrl']?>/box.php?part=delinfo&id=<?=$info['id']?>')" title="一旦删除将不能恢复！">删除</a> &nbsp;| </li>
<li><a rel="nofollow" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?action=edit&id=<?=$info['id']?>" target="_blank">修改</a> &nbsp;| </li>
<li><a class="report" href="javascript:void(0);" onclick="setbg('举报信息',470,300,'<?=$mymps_global['SiteUrl']?>/box.php?part=report&id=<?=$info['id']?>&infotitle=<?=$info['title']?>');">举报</a> &nbsp;| </li>
                        
                       </span>
                    </div>
                </ul>
            </div>
            <div class="clear"></div>
<div class="extra_contact">
            <div class="contact">
                <ul>
                	<div class="zhaopiner">
                    <?php if(is_array($info['extra'])){foreach($info['extra'] as $mymps) { ?>                        <? if($mymps['value']) { ?>
                        <li style="<? if(in_array($mymps['title'],array('价格','租金'))) { ?>color:red;<?php } ?>"><span><?=$mymps['title']?>：</span><? if(in_array($mymps['title'],array('0元','0万元'))) { ?>电询<?php } else { ?><?=$mymps['value']?><?php } ?></li>
                        <?php } ?>
                        <?php }} ?>
                        <? if($info['areaname']) { ?><li><span>地址：</span><?=$info['areaname']?> <? if($info['ip2area'] == 'wap') { ?><font class="font" color="green">手机发布</font><?php } else { ?><font class="font"><?=$info['ip']?></font> <font class="font" color="green"><?=$info['ip2area']?></font><?php } ?></li><?php } ?>
                    </div>
                    <div class="clear"></div>
                    <ul class="contacter">
                    <? if($info['usecoin'] < 0) { ?>
                    <div class="clear5"></div>
                    <div class="notice"><ul>该信息联系方式已被隐藏，登录后方可查看!</ul></div>
                    <?php } else { ?>
                    <? if($info['contactview'] == 1) { ?>
                    <? if($info['qq']) { ?><li><span>Q Q：</span><font class="tel"><?=$info['qqnum']?></font><a class="_chat" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$info['qq']?>&site=qq&menu=yes">QQ在线交谈</a></li><?php } ?>
                    <? if($info['email']) { ?><li><span>邮箱：</span><font class="tel"><?=$info['email']?></font></li><?php } ?>
                    <li class="qqbm"><span>电话：</span><font class="tel red"><?=$info['telephone']?></font> <a rel="nofollow" href="javascript:void(0);" onclick="setbg('查看完整电话',420,520,'<?=$mymps_global['SiteUrl']?>/box.php?part=seecontact_tel&id=<?=$info['id']?>&tel_base64=<?=$info['tel_base64']?>')" class="_qq">点击查看完整号码</a></li>
                    <!--<div class="clear"></div>
                    <li class="qqbm"><span>&nbsp;</span><a href="" class="_bm">申请该职位</a></li>-->
                    <div class="clear"></div>
                    <div class="notice"><ul><strong><?=$mymps_global['SiteName']?>提醒您：</strong>在签订合同之前，以各种理由收取非正规费用（押金、服装费、报名费、体检费、要求购买充值卡等）均有骗子嫌疑，请提高警惕。</ul></div>
                    <?php } else { ?>
                    <div class="clear5"></div>
                    <div class="notice"><ul>该信息已过期，联系方式已被隐藏!</ul></div>
                    <?php } ?>
                    <?php } ?>
                    </ul>
                    <div class="clear"></div>
                    
                </ul>
            </div>
</div>
<div class="clearfix"></div>
<div class="view_hd">
            	<ul>
                	<li class="now">职位描述</li>
                </ul>
</div>
            <div class="clearfix"></div>
<div class="view_bd">
                <div class="tablist">
                    <div class="maincon cfix">
                    <? if($advertisement['type']['infoad']) { ?>
                    <div class="infoaddiv">
                    <?php if(is_array($advertisement['type']['infoad'])){foreach($advertisement['type']['infoad'] as $mymps) { ?>                    <div class="infoad"><?=$adveritems[$mymps]?></div>
                    <?php }} ?>
                    </div>
                    <?php } ?>
                    <?=$info['content']?>
                    <br>
                    联系我时，请说是在<?=$mymps_global['SiteName']?>看到的，谢谢！
                    </div>
                    <div class="clearfix"></div>
                    <? if($info['image']) { ?>
                    <div class="bd">
                    <p>
                    <?php if(is_array($info['image'])){foreach($info['image'] as $mymps) { ?><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['path']?>" class="imginfo" title="<?=$info['title']?>" alt="<?=$info['title']?>"><br><?php }} ?>
                    </p>
                    </div>
                    <div class="clear"></div>
                    <?php } ?>
                </div>
                <? if($info['mappoint']) { ?>
                <div class="tablist">
                    <div class="bd">
                        <p>
                        <iframe src="<?=$mymps_global['SiteUrl']?>/map.php?title=<?=$info['title']?>&isshow=1&p=<?=$info['mappoint']?>&width=800&height=360" height="380" width="800" frameborder="0" scrolling="no"></iframe>
                        </p>
                    </div>
                </div>
                <?php } ?>
                <div class="tablist">
                    <div class="bd">
                        <p>
                        <div id="ajaxcomment"></div>
                        </p>
                    </div>
                </div>
</div>
            </div>
            <div class="clear"></div>
            <div class="bd_left_foot">
            	<ul>小贴士：该职位信息由用户及第三方发布，真实性、合法性由发布人负责，请仔细甄别。</ul>
            </div>
</div>
<div class="bd_right">
        
        	<div class="boxx">
            <div class="con"> 
                <ul class="school_logo" style="text-align:center; margin-bottom:5px;">
                    <img class="userlogo" src="<? echo $member['logo'] ? $member['logo'] : $mymps_global['SiteUrl'].'/images/nophoto.jpg'; ?>"/>
                    <? if($info['usecoin'] >= 0 || $info['contactview'] != 1) { ?>
                    <div class="clear"></div>
                    <div class="username"><?=$info['userid']?></div>
                    <?php } ?>
                    <div class="clear"></div>
                    <? if($info['ismember'] ==1) { ?><div class="regtime">注册时间：<? echo GetTime($member['jointime'],'Y-m-d'); ?></div><?php } ?>
                    <? if($member['if_corp'] == 1) { ?>
                    <div class="clear"></div><div class="certify"><img style="border:none;" src="<?=$mymps_global['SiteUrl']?>/template/default/images/user2.gif" align="absmiddle" title="商家"/></div><?php } ?>
                </ul>
                
<? if($info['ismember'] ==1) { ?>
                <div class="clearfix"></div>
                <ul class="jibie">
                   <li>用户级别：<span class="vip"><?=$group['levelname']?></span></li> 
                   <li>信用等级：<img align="absmiddle" src="<?=$mymps_global['SiteUrl']?>/images/credit/<?=$member['credits']?>.gif" alt="信用值:<?=$member['credit']?>" /></li> 
                </ul>
                <div class="clear"></div>
                <ul class="renzheng Identity">
                <? if($member['per_certify'] ==1) { ?><p><img src="<?=$mymps_global['SiteUrl']?>/images/person1.gif" alt="已通过身份证认证"/> 已通过身份证认证  </p> <?php } else { ?><p><img src="<?=$mymps_global['SiteUrl']?>/images/person0.gif" alt="未上传身份证认证"/> 未上传身份证认证  </p><?php } ?>
                <? if($member['com_certify'] ==1) { ?><p><img src="<?=$mymps_global['SiteUrl']?>/images/company1.gif" alt="已通过营业执照认证"/> 已通过营业执照认证  </p> <?php } else { ?><p><img src="<?=$mymps_global['SiteUrl']?>/images/company0.gif" alt="未上传营业执照认证"/> 未上传营业执照认证  </p><?php } ?>
                </ul>
                 <?php } ?>
                
              </div>
              
            </div>
            
            <div class="boxer cfix topborder">
                <div class="boxer_hd cfix"><span>相关职位</span></div>
                <div class="boxer_bd cfix">
                    <ul>
                    <?php $latest_info = mymps_get_infos(10,'','','',$info['catid']); ?>                        <?php if(is_array($latest_info)){foreach($latest_info as $mymps) { ?>                        <? if($mymps['id'] != $info['id']) { ?>
                        <li><a style="<? if($mymps['ifred'] == 1) { ?>color:red;<?php } ?> <? if($mymps['ifbold'] == 1) { ?>font-weight:bold;<?php } ?>" href="<?=$mymps['uri']?>" target="_blank" title="<?=$mymps['title']?>"><? if($mymps['img_path']) { ?><font color=green>[图]</font> <?php } ?><?=$mymps['title']?></a></li>
                        <?php } ?>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
            
            <div class="boxer cfix">
                <div class="boxer_hd cfix"><span>相关分类</span></div>
                <div class="boxer_bd cfix short">
                    <ul>
                    <?php $relate_cat = get_categories_tree($info['parentid']); ?>                        <?php if(is_array($relate_cat)){foreach($relate_cat as $mymps) { ?>                        <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $w) { ?>                        <li><a target="_blank" href="<?=$w['uri']?>" title="<?=$city['cityname']?><?=$w['catname']?>"><?=$w['catname']?></a></li>
                        <?php }} ?>
                        <?php }} ?>
                    </ul>
                </div>
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
<script src="<?=$mymps_global['SiteUrl']?>/template/global/messagebox.js" type="text/javascript"></script>
<script type="text/javascript">var bdsize='16';var infoid='<?=$info['id']?>';loadDefault(['slider','baidushare','info']);</script>
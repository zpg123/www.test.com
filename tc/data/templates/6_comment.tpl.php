<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言点评-<?=$store['tname']?>-<?=$mymps_global['SiteName']?></title>
<link href="<?=$mymps_global['SiteUrl']?>/template/spaces/store/css/<?=$store['template']?>.css" type="text/css" rel="stylesheet" />
<script src="<?=$mymps_global['SiteUrl']?>/template/spaces/store/js/StoreComment.js" type="text/javascript"></script> 
</head>
<body>
<?php include mymps_tpl('header'); ?>
<div class="content">
<?php include mymps_tpl('sider'); ?>
<div class="cright">
    <div class="box">
        <div class="dpRight">
                <div class="commentpage">
                    <div class="pageSelect">
                    <ul class="cfix">
                        <li id="cur1" <? if(!$type) { ?>class="selected"<?php } ?>><em><a href="<?=$uri['comment']?>">全部评价(<?=$store['all_comment']?>)</a></em></li>
                        <li id="cur2" <? if($type=='good') { ?>class="selected"<?php } ?>><em><a href="<?=$uri['good_comment']?>">好评(<?=$store['good_comment']?>)</a></em></li>
                        <li id="cur3" <? if($type=='soso') { ?>class="selected"<?php } ?>><em><a href="<?=$uri['soso_comment']?>">中评(<?=$store['soso_comment']?>)</a></em></li>
                        <li id="cur4" <? if($type=='bad') { ?>class="selected"<?php } ?>><em><a href="<?=$uri['bad_comment']?>">差评(<?=$store['bad_comment']?>)</a></em></li>
                    </ul>
                </div>
        
                    <div class="selectBd cfix">
        
                        <div class="left">
        
                            <div class="tongji commentTj">
        
                        <ul class="dpScore"> 
                        <li><span class="tits">好评 <small>(<?=$store['good_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['good_comment_per']?>px;"></div></div></li> 
                        <li><span class="tits">中评 <small>(<?=$store['soso_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['soso_comment_per']?>px;"></div></div></li> 
                        <li><span class="tits">差评 <small>(<?=$store['bad_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['bad_comment_per']?>px;"></div></div></li> 
                        </ul> 
        
                            </div>
        
                        </div>
        
                        <div class="middle">被点评：<em><?=$store['all_comment']?></em>次</div>
        
                        <div class="right"><a href="#comment" class="pjMenu">我要留言</a></div>
        
                    </div>
        			
                    <?php if(is_array($comment)){foreach($comment as $mymps) { ?>                    <div class="clear"></div>
                    <div class="comment cfix">
                    <div class="bd">
                        <div class="dpContent cfix">
                            <div class="pic"><img src="<?=$mymps_global['SiteUrl']?>/images/<?=$mymps['enjoy']?>.gif"></div>
                            <div class="textt">
                                <div class="ut"><?=$mymps['content']?> <span class="time">[网友发表于 <?=$mymps['pubtime']?>]</span></div>
                            </div>
                        </div>
                        <? if($mymps['reply']) { ?><div class="clearfix"></div><div class="huip"><em>老师回复：</em><?=$mymps['reply']?><span class="time">[回复于 <?=$mymps['retime']?>]</span></div><?php } ?>
                    </div>
                    </div>
                    <?php }} ?>
        			<div class="clear"></div>
                    <div class="pagination" style="margin-left:0!important;"><?=$pageview?></div>
                    
                </div>
        
        </div>
    </div>
    
    <? if($store['commentsettings']) { ?>
    <div class="box mt10" >

        <div class="tit"><span><a name="comment"></a>留言/点评</span></div>

        <div class="mbk-send cfix" style="border-top:0;">

        <form method="post" action="<?=$mymps_global['SiteUrl']?>/store.php?" name="StoreCommentForm" onsubmit="return StoreCommentFormCheck();">
        <input type="hidden" name="part" value="comment" />
        <input type="hidden" name="user" value="<?=$store['userid']?>" />
        <input type="hidden" name="action" value="dopost" />
        
        <div class="like">

        <input type="radio" name="enjoy" value="0" class="radio">不喜欢 <input type="radio" name="enjoy" value="1" class="radio">无所谓 <input type="radio" name="enjoy" checked="checked" value="2" class="radio">喜欢 <input type="radio" name="enjoy" value="3" class="radio">很喜欢

        </div>



        <input type="hidden" name="total_score" value="1" />

        <textarea id="txt" name="content"></textarea>

        <div class="cfix comment_login">
        <span class="left">
        <span class="left"><?=$store['loginlimit']?></span>
        </span>
        <span class="left"><input name="comment_submit" class="send" value="&nbsp;&nbsp;" type="submit" /> 
        （您还可以输入<span id="word">200</span>字）</span>
        </div>

        </form>

        </div>

        </div>
    <?php } ?>
</div>
</div>
<div class="clear15"></div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
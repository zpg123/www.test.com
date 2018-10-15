<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<div class="cleft"> 
<div class="box"> 
<div class="tit">机构档案</div> 
<div class="con"> 
<ul class="store_logo" style="text-align:center; margin-bottom:15px;"><a title="<?=$store['tname']?>"><img src="<?=$store['logo']?>" onload="if(this.width > 160) this.width = 160"/></a></ul>
<!--机构基本信息--> 
<ul class="mb5"> 
   <li>机构级别：<span class="vip"><?=$store['levelname']?></span></li> 
   <li>信用等级：<img align="absmiddle" src="<?=$mymps_global['SiteUrl']?>/images/credit/<?=$store['credits']?>.gif" title="信用值:<?=$store['credit']?>" /></li> 
</ul> 
<!--机构基本信息-->
        
        <div class="clearfix"></div>

<!--个人信息--> 
<dl class="pInfor"> 
        <? if($store['qq']) { ?>
<p class="qq" align="left">在线交谈：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$store['qq']?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?=$store['qq']?>:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p> 
<?php } ?>
        <p class="tel">咨询热线：<em><?=$store['tel']?></em></p> 
</dl> 
<!--个人信息--> 
        
        <div class="clearfix"></div>

<!--能力评价--> 
<div class="pingjia"> 
 <h3>机构点评<font style="font-weight:100">(<a href="<?=$uri['comment']?>" style="text-decoration:underline; font-size:12px">我要提问/点评</a>)</font></h3> 
 <ul class="Identity"> 
   <li>机构被点评：<span class="orange"><?=$store['all_comment']?></span> 次</li> 
 </ul>
  <div class="clearfix"></div>
 <ul class="dpScore">
  <li><span class="tits">好评<small>(<?=$store['good_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['good_comment_per']?>px;"></div></div></li> 
  <li><span class="tits">中评<small>(<?=$store['soso_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['soso_comment_per']?>px;"></div></div></li> 
  <li><span class="tits">差评<small>(<?=$store['bad_comment_per']?>%)</small></span><div class="kBg"><div class="hBg" style="width:<?=$store['bad_comment_per']?>px;"></div></div></li> 
  </ul> 
</div>
        
        <div class="clearfix"></div>

<!--身份及认证--> 
 <h3 class="mt10 cfix">资料认证</h3> 
 <ul class="renzheng Identity"> 
 <p><? if($store['per_certify'] == '1') { ?><img src="<?=$mymps_global['SiteUrl']?>/images/person1.gif" alt="已通过身份证认证"/> 已通过身份证认证<?php } else { ?><img src="<?=$mymps_global['SiteUrl']?>/images/person0.gif" alt="未通过身份证认证"/> 未通过身份证认证<?php } ?></p> 
 <p><? if($store['com_certify'] == '1') { ?><img src="<?=$mymps_global['SiteUrl']?>/images/company1.gif" alt="已通过营业执照认证"/> 已通过营业执照认证<?php } else { ?><img src="<?=$mymps_global['SiteUrl']?>/images/company0.gif" alt="未通过营业执照认证"/> 未通过营业执照认证<?php } ?></p> 
 </ul> 
<!--身份及认证--> 
        
        <div class="clear"></div>
        
        <div class="viewhit">
        <ul>
            <li>浏览人次：<span class="hit" id="hit"><img src="<?=$mymps_global['SiteUrl']?>/images/loading.gif" border="0"></span>次</li>
            <li>加盟时间：<span class="time"><? echo GetTime($store['jointime'],'Y年m月d日');; ?></span></li>
        </ul>
        </div>

  </div> 
      
</div>
<div>
        <div class="cfix bdshare">
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
        </div>
    </div>
 </div>
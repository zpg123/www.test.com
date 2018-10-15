<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>在线充值 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/member_new.css">
    <script>window['current'] = '在线充值';</script>
<script>
    function do_post(){
        alert('在后台配置好参数接口后可以正常使用该功能');
        return false;
    }
</script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
<div class="dl_nav">
<span>
<a href="index.php">首页</a>&gt;<a href="index.php?mod=member">会员中心</a>&gt;<a href="index.php?mod=member&action=pay">在线充值</a>
</span>
</div>


<div class="inner_html tips">
<div class="hd">温馨提示</div>
<div class="bd">1，<font color="red">1<?=$moneytype?></font>可以购买<font color="red"><?=$mymps_global['cfg_coin_fee']?>个</font>金币
            <br>2，一次最少需要充值<font color="red"><? echo $mymps_global['cfg_pay_min'] ? $mymps_global['cfg_pay_min'] : 1; ?>个</font>金币
            </div>
</div>
<div class="order_inner">
<form name="form1" id="form1" method="get" action="index.php?" onSubmit="return do_post();">
            <input name="action" value="pay" type="hidden">
            <input name="mod" value="member" type="hidden">
            <input name="dopost" value="1" type="hidden">
            <input name="s_uid" value="<?=$s_uid?>" type="hidden">
            <input name="uid" value="<?=$uid?>" type="hidden">
<div id="payact" style="">
 	<div class="table_hd">支付方式</div>
<div class="table_p">	
<ul class="zhifu">
                    <?php if(is_array($mobilepay)){foreach($mobilepay as $mymps) { ?>                    <li><input id="radio<?=$mymps['payid']?>" onClick="return clickRadio('<?=$mymps['payid']?>');" type="radio" name="payid" value="<?=$mymps['payid']?>">&nbsp;<img src='template/images/payimg<?=$mymps['payid']?>.png'></li>
                    <?php }} ?>
</ul>
</div>

</div>
<div class="table">
<p class="p number">
                <em id="shu_title">购买金币：</em>
                <input type="text" onBlur="minPay()" id="money" name="money" class="ipt" value="<? echo $money?$money:$mymps_global['cfg_pay_min']; ?>" maxlength="10" placeholder="输入整数" style="width:140px; text-align:left; padding-left:4px;" />个
                </p>
                <p class="p number">
                <em id="shu_title">实际应付：</em>
                <font id="mustpay" color="red"><? echo ($money?$money:$mymps_global['cfg_pay_min'])/$mymps_global['cfg_coin_fee']; ?></font><?=$moneytype?>
                </p>
<script>
$(function() {
if (is_wxclient()) {
$('#radio5').attr('checked', 'true')
} else {
$('#radio4').attr('checked', 'true')
}
})
$('#money').bind('input propertychange',function(){
var data = $("#money").val();
$("#mustpay").html(Math.ceil(data/<?=$mymps_global['cfg_coin_fee']?>))
}
);
function minPay() {
if ($("#money").val() < <?=$mymps_global['cfg_pay_min']?>) {
alert('最少要购买<?=$mymps_global['cfg_pay_min']?>个金币');
$("#money").val(<?=$mymps_global['cfg_pay_min']?>);
$("#mustpay").html(Math.ceil(<?=$mymps_global['cfg_pay_min']?>/<?=$mymps_global['cfg_coin_fee']?>));
return false;
}}function clickRadio(payid){

alert('在后台配置好参数接口后可以正常使用该功能');
return false;

if(!is_wxclient()&&payid=='5'){
alert('请在微信客户端中使用该支付方式');
return false;
}
}
                </script>
</div>
<button type="submit" class="save">立即支付</button>
</form>
            <div class="clear"></div>
</div>
</div>
</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
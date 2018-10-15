<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t" . '<li><a href="score.php" class="current">积分增减设置</a></li>' . "\r\n\t\t" . '<li><a href="credit.php">信用值增减设置</a></li>' . "\r\n\t\t" . '<li><a href="credit_set.php">信用等级管理</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>扣除请在前面加“-”，如扣除1点积分请填写“-1” </li>' . "\r\n" . ' <li>增加请在前面加“+”，如增加1点积分请填写“+1” </li>' . "\r\n" . ' <li>所有的积分操作都是在整个过程完成之后，如认证增加积分，是要后台审核通过后才会增加 </li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">会员积分设置管理</td>' . "\r\n" . '  </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">注册成功</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][register]" value="';
echo $score[rank]['register'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+10</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">登录签到</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][login]" value="';
echo $score[rank]['login'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+2</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">发布分类信息</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][information]" value="';
echo $score[rank]['information'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+2</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">发布优惠券</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][coupon]" value="';
echo $score[rank]['coupon'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+2</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">发起团购</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][group]" value="';
echo $score[rank]['group'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+2</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . ' <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">发布商品</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][goods]" value="';
echo $score[rank]['goods'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+2</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">营业执照认证</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][com_certify]" value="';
echo $score[rank]['com_certify'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+10</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . '  <tr bgcolor="#f1f5f8">' . "\r\n" . ' <td style="width:35%; line-height:22px">个人身份证认证</td>' . "\r\n" . ' <td bgcolor="#ffffff"><input name="score_new[rank][per_certify]" value="';
echo $score[rank]['per_certify'];
echo '" class="txt"/>' . "\r\n" . ' <i> 初始值:<font color="red">+10</font></i></td>' . "\r\n" . ' </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="seoset_submit" value="提 交" class="mymps large" type="submit"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

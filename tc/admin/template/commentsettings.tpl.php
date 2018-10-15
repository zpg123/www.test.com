<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.vbm td li{ margin:10px 0!important;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=imgcode" ';

if ($part == 'imgcode') {
	echo 'class="current"';
}

echo '>验证码控制</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=checkask" ';

if ($part == 'checkask') {
	echo 'class="current"';
}

echo '>验证问答设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=badwords" ';

if ($part == 'badwords') {
	echo 'class="current"';
}

echo '>过滤设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=commentsettings" ';

if ($part == 'commentsettings') {
	echo 'class="current"';
}

echo '>评论点评设置</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?config.php?" method="post">' . "\r\n" . '<input name="part" type="hidden" value="commentsettings">' . "\r\n" . '<input name="action" type="hidden" value="do_post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="2" align="left">评论/点评设置</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left" class="altbg1" width="250">' . "\r\n" . '      信息评论/information' . "\r\n" . '       </td>' . "\r\n" . '      <td align="left" valign="top" style="line-height:25px;">' . "\r\n\t\t" . '<label for="information_0"><input type="radio" name="comment[information]" id="information_0" class="checkbox" value="0" ';

if ($comment['information'] == 0) {
	echo 'checked';
}

echo '>关闭评论</label><br />' . "\r\n\t\t" . '<label for="information_1"><input type="radio" name="comment[information]" id="information_1" class="checkbox" value="1" ';

if ($comment['information'] == 1) {
	echo 'checked';
}

echo '>开启匿名评论</label><br />' . "\r\n\t\t" . '<label for="information_2"><input name="comment[information]" type="radio" id="information_2" class="checkbox" value="2" ';

if ($comment['information'] == 2) {
	echo 'checked';
}

echo '>开启会员评论</label>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left" class="altbg1">' . "\r\n" . '      新闻评论/news' . "\r\n" . '       </td>' . "\r\n" . '      <td align="left" valign="top" style="line-height:25px;">' . "\r\n\t\t" . '<label for="news_0"><input type="radio" name="comment[news]" id="news_0" class="checkbox" value="0" ';

if ($comment['news'] == 0) {
	echo 'checked';
}

echo '>关闭评论</label><br />' . "\r\n\t\t" . '<label for="news_1"><input type="radio" name="comment[news]" id="news_1" class="checkbox" value="1" ';

if ($comment['news'] == 1) {
	echo 'checked';
}

echo '>开启匿名评论</label><br />' . "\r\n\t\t" . '<label for="news_2"><input name="comment[news]" type="radio" id="news_2" class="checkbox" value="2" ';

if ($comment['news'] == 2) {
	echo 'checked';
}

echo '>开启会员评论</label>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left" class="altbg1">' . "\r\n" . '      商铺点评/store' . "\r\n" . '       </td>' . "\r\n" . '      <td align="left" valign="top" style="line-height:25px;">' . "\r\n\t\t" . '<label for="store_0"><input type="radio" name="comment[store]" id="store_0" class="checkbox" value="0" ';

if ($comment['store'] == 0) {
	echo 'checked';
}

echo '>关闭评论</label><br />' . "\r\n\t\t" . '<label for="store_1"><input type="radio" name="comment[store]" id="store_1" class="checkbox" value="1" ';

if ($comment['store'] == 1) {
	echo 'checked';
}

echo '>开启匿名点评</label><br />' . "\r\n\t\t" . '<label for="store_2"><input name="comment[store]" type="radio" id="store_2" class="checkbox" value="2" ';

if ($comment['store'] == 2) {
	echo 'checked';
}

echo '>开启会员点评</label>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n\r\n" . '<center>' . "\r\n" . '<input class="mymps large" name="';
echo CURSCRIPT;
echo '_submit" value="提 交" type="submit" > &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

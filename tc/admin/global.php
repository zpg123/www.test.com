<?php define('IN_MYMPS', true);
define('IN_MANAGE', true);
require_once dirname(__FILE__) . '/../include/global.php';
require_once dirname(__FILE__) . '/../data/config.php';
require_once MYMPS_DATA . '/config.inc.php';
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/admin.class.php';
if(!$mymps_admin -> mymps_admin_chk_getinfo()){
     write_msg("", 'index.php?do=login&url=' . urlencode(GetUrl()));
    }else{
     define('IN_ADMIN' , true);
    }
function get_member_level_label(){
     global $db, $db_mymps;
     $zym_52 = $db -> getAll("SELECT id,levelname FROM `{$db_mymps}member_level`");
     foreach($zym_52 as $zym_51 => $zym_54){
         $zym_55 .= '<label for=' . $zym_54[id] . '><input name=do_action value=' . $zym_54[id] . ' type=radio class=radio id=' . $zym_54[id] . "";
         $zym_55 .= ($zym_57 == $zym_54[id])?' checked':"";
         $zym_55 .= '>' . $zym_54[levelname] . '</label>';
         }
     return $zym_55;
    }
function get_member_level($zym_57 = '', $zym_56 = 'levelid'){
     global $db, $db_mymps;
     $zym_52 = $db -> getAll("SELECT id,levelname FROM `{$db_mymps}member_level`");
     $zym_55 .= '<select name="' . $zym_56 . '">';
     $zym_55 .= '<option value=\'\'>>不限组别</option>';
     foreach($zym_52 as $zym_51 => $zym_54){
         $zym_55 .= '<option value=' . $zym_54[id] . "";
         $zym_55 .= ($zym_57 == $zym_54[id])?' selected style="background-color:#6EB00C;color:white"':"";
         $zym_55 .= '>' . $zym_54[levelname] . '</option>';
         }
     $zym_55 .= '</select>';
     return $zym_55;
    }
function show_message($zym_50 = '', $zym_49 = '', $zym_43 = ''){
     global $here;
     write_admin_record($zym_49);
     $here = MPS_SOFTNAME . '操作提示窗口';
     include mymps_tpl('showmessage');
    }
function sizeunit($zym_42){
     if($zym_42 >= 1073741824){
         $zym_42 = round($zym_42 / 1073741824 * 100) / 100 . ' GB';
         }elseif($zym_42 >= 1048576){
         $zym_42 = round($zym_42 / 1048576 * 100) / 100 . ' MB';
         }elseif($zym_42 >= 1024){
         $zym_42 = round($zym_42 / 1024 * 100) / 100 . ' KB';
         }else{
         $zym_42 = $zym_42 . ' bytes';
         }
     return $zym_42;
    }
function write_file($zym_41, $zym_44, $zym_45){
     $zym_48 = true;
     if(!@$zym_47 = fopen($zym_44 . $zym_45, 'w+')){
         $zym_48 = false;
         echo '打开文件失败';
         }
     if(!@fwrite($zym_47, $zym_41)){
         $zym_48 = false;
         echo '写文件失败';
         }
     if(!@fclose($zym_47)){
         $zym_48 = false;
         echo '关闭文件失败';
         }
     return $zym_48;
    }
function bb($zym_46){
     if (empty($zym_58)){
         if (myget('HTTP_HOST')){
             $zym_58 = myget('HTTP_HOST');
             }else{
             $zym_58 = '';
             }
         }
     $zym_46 = '.127.0.0.1|localhost|' . $zym_46;
     $zym_59 = getRd(htmlspecialchars($zym_58));
     $zym_59 = str_replace('.www.', '', $zym_59);
     if (!in_array($zym_59, explode('|', $zym_46))){
         exit;
         }
    }
function myget($zym_72){
     if (isset($_SERVER[$zym_72])){
         return $_SERVER[$zym_72];
         }
     if (isset($_ENV[$zym_72])){
         return $_ENV[$zym_72];
         }
     if (getenv($zym_72)){
         return getenv($zym_72);
         }
     if (function_exists('apache_getenv') && apache_getenv($zym_72, true)){
         return apache_getenv($zym_72, true);
         }
     return '';
    }
function getRd($zym_71){
     $zym_70 = array('wang', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'an', 'ao', 'aq', 'ar', 'as', 'at', 'au', 'aw', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn', 'bo', 'br', 'bs', 'bt', 'bv', 'bw', 'by', 'bz', 'ca', 'cc', 'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cq', 'cr', 'cu', 'cv', 'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'ec', 'ee', 'eg', 'eh', 'es', 'et', 'ev', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gr', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il', 'in', 'io', 'iq', 'ir', 'is', 'it', 'jm', 'jo', 'jp', 'ke', 'kg', 'kh', 'ki', 'km', 'kn', 'kp', 'kr', 'kw', 'ky', 'kz', 'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'mg', 'mh', 'ml', 'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mv', 'mw', 'mx', 'my', 'mz', 'na', 'nc', 'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nt', 'nu', 'nz', 'om', 'qa', 'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 'pr', 'pt', 'pw', 'py', 're', 'ro', 'ru', 'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si', 'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'st', 'su', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 'tj', 'tk', 'tm', 'tn', 'to', 'tp', 'tr', 'tt', 'tv', 'tw', 'tz', 'ua', 'ug', 'uk', 'us', 'uy', 'va', 'vc', 've', 'vg', 'vn', 'vu', 'wf', 'ws', 'ye', 'yu', 'za', 'zm', 'zr', 'zw', 'com', 'edu', 'gov', 'int', 'mil', 'net', 'org');
     $zym_74 = explode('.', $zym_71);
     $zym_77 = count($zym_74);
     $zym_76 = 0;
     for($zym_75 = 0;$zym_75 < $zym_77;$zym_75++){
         if(in_array($zym_74[$zym_75], $zym_70)){
             $zym_76 = $zym_75;
             break;
             }
         }
     $zym_73 = '';
     for($zym_75 = $zym_76;$zym_75 < $zym_77;$zym_75++){
         $zym_73 .= '.' . $zym_74[$zym_75];
         }
     return $zym_74[$zym_76-1] . $zym_73;
    }
function down_file($zym_41, $zym_45){
     ob_end_clean();
     header('Content-Encoding: none');
     header('Content-Type: ' . (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
     header('Content-Disposition: ' . (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ') . 'filename=' . $zym_45);
     header('Content-Length: ' . strlen($zym_41));
     header('Pragma: no-cache');
     header('Expires: 0');
     echo $zym_41;
     $zym_69 = ob_get_contents();
     ob_end_clean();
    }
function writeable($zym_62){
     if(!is_dir($zym_62)){
         @mkdir($zym_62, 0777);
         }
     if(is_dir($zym_62)){
         if(is_writable($zym_62)){
             $zym_61 = 1;
             }else{
             $zym_61 = 0;
             }
         }
     return $zym_61;
    }
function make_header($zym_60){
     global $d;
     $zym_41 = 'DROP TABLE IF EXISTS ' . $zym_60 . '' . "\xa" . '';
     $d -> query('show create table ' . $zym_60);
     $d -> nextrecord();
     $zym_63 = preg_replace('/' . "\xa" . '/', "", $d -> f('Create Table'));
     $zym_41 .= $zym_63 . '' . "\xa" . '';
     return $zym_41;
    }
function make_record($zym_60, $zym_64){
     global $d;
     $zym_67 = "";
     $zym_41 .= 'INSERT INTO ' . $zym_60 . ' VALUES(';
     for($zym_75 = 0; $zym_75 < $zym_64; $zym_75++){
         $zym_41 .= ($zym_67 . '\'' . mysql_escape_string($d -> record[$zym_75]) . '\'');
         $zym_67 = ',';
         }
     $zym_41 .= ')' . "\xa" . '';
     return $zym_41;
    }
function import($zym_66){
     global $d;
     $zym_65 = file($zym_66);
     foreach($zym_65 as $zym_41){
         str_replace('' . "\xd" . '', "", $zym_41);
         str_replace('' . "\xa" . '', "", $zym_41);
         $d -> query(trim($zym_41));
         }
     return true;
    }
function chk_admin_purview($zym_40){
     global $admin_uname;
     if(!$GLOBALS['admin_id']) write_msg('您还没有登录，请登录后再进行后续操作！');
     $zym_39 = read_static_cache('admin');
     if($zym_39 === false){
         $zym_13 = $GLOBALS['db'] -> query("SELECT a.*,b.purviews,b.typename,b.ifsystem FROM `{$GLOBALS['db_mymps']}admin` AS a LEFT JOIN `{$GLOBALS['db_mymps']}admin_type` AS b ON a.typeid = b.id");
         while($zym_12 = $GLOBALS['db'] -> fetchRow($zym_13)){
             $zym_11[$zym_12['userid']]['typename'] = $zym_12['typename'];
             $zym_11[$zym_12['userid']]['ifsystem'] = $zym_12['ifsystem'];
             $zym_11[$zym_12['userid']]['purviews'] = $zym_12['purviews'];
             $zym_11[$zym_12['userid']]['uname'] = $zym_12['uname'];
             }
         write_static_cache('admin', $zym_11);
         $zym_39 = $zym_11;
         }
     $admin_uname = $zym_39[$GLOBALS['admin_id']]['uname'];
     !in_array($zym_40, explode(',', $zym_39[$GLOBALS['admin_id']]['purviews'])) && write_msg('很抱歉，您所在会员组没有 <strong><font color=red>' . str_replace('purview_', '', $zym_40) . '</font></strong> 的操作权限！');
    }
function get_admin_type(){
     if(!$GLOBALS['admin_id']) write_msg('未知管理员帐号！');
     $zym_39 = read_static_cache('admin');
     return $zym_39[$GLOBALS['admin_id']]['typename'];
    }
function mymps_admin_tpl_global_head($zym_14 = ''){
     global $here, $charset;
     include mymps_tpl('inc_head');
    }
function mymps_admin_tpl_global_foot(){
     global $mymps_starttime, $mtime, $db;
     $mtime = explode(' ', microtime());
     $zym_15 = number_format(($mtime[1] + $mtime[0] - $mymps_starttime), 6);
     $zym_18 = 'Processed in ' . $zym_15 . ' second(s) , ' . $db -> query_num . ' queries';
     echo '<div class="clear" style="height:10px"></div><div class="copyright">大白网络</div></div></div></body></html>';
    }
function FileImage($zym_17){
     $zym_16 = FileExt($zym_17);
     if($zym_16 == 'html' || $zym_16 == 'htm'){
         $zym_10 = 'template/images/file_html.gif';
         }elseif($zym_16 == 'gif' || $zym_16 == 'png'){
         $zym_10 = 'template/images/file_gif.gif';
         }elseif($zym_16 == 'bmp'){
         $zym_10 = 'template/images/file_bmp.gif';
         }elseif($zym_16 == 'jpg' || $zym_16 == 'jpeg'){
         $zym_10 = 'template/images/file_jpg.gif';
         }elseif($zym_16 == 'swf'){
         $zym_10 = 'template/images/file_swf.gif';
         }elseif($zym_16 == 'js'){
         $zym_10 = 'template/images/file_script.gif';
         }elseif($zym_16 == 'css'){
         $zym_10 = 'template/images/file_css.gif';
         }elseif($zym_16 == 'txt'){
         $zym_10 = 'template/images/file_txt.gif';
         }else{
         $zym_10 = 'template/images/file_unknow.gif';
         }
     return $zym_10;
    }
function is_pic($zym_17){
     $zym_16 = FileExt($zym_17);
     if($zym_16 == 'gif' || $zym_16 == 'jpg' || $zym_16 == 'jpeg' || $zym_16 == 'png' || $zym_16 == 'bmp'){
         return 'yes';
         exit;
         }
     return 'no';
    }
function getSize($zym_9){
     if($zym_9 < 1024){
         return $zym_9 . 'Byte';
         }elseif($zym_9 >= 1024 && $zym_9 < 1024 * 1024){
         return @number_format($zym_9 / 1024, 3) . ' KB';
         }elseif($zym_9 >= 1024 * 1024 && $zym_9 < 1024 * 1024 * 1024){
         return @number_format($zym_9 / 1024 * 1024, 3) . ' M';
         }elseif($zym_9 >= 1024 * 1024 * 1024){
         return @number_format($zym_9 / 1024 * 1024 * 1024, 3) . ' G';
         }
    }
function mymps_admin_menu($zym_3 = 'top', $zym_2 = 'siteabout'){
     global $admin_menu;
     $zym_75 = -1;
     foreach($admin_menu as $zym_1 => $zym_4){
         if($zym_3 == 'top'){
             $zym_75 = $zym_75 + 1;
             $zym_5 = !$zym_4[url]?'#':$zym_4[url];
             $zym_8 = !$zym_4[url]?'onclick=sethighlight(\'' . $zym_75 . '\');togglemenu(\'' . $zym_1 . '\');return false;':'$w[url]';
             $zym_7 = $zym_4[target]?$zym_4[target]:'';
             $zym_6 .= "<li class=\"$zym_4[style]\"><a href=\"" . $zym_5 . '"' . $zym_8 . ' target=' . $zym_7 . '>' . $zym_4[name] . '</a></li>';
             }elseif($zym_3 == 'left'){
             if(is_array($zym_4[group])){
                 foreach($zym_4[group] as $zym_69 => $zym_19){
                     $zym_20 = ($zym_1 != $zym_2)?'style="display:none"':"";
                     $zym_6 .= '<dl id="' . $zym_1 . '" ' . $zym_20 . '>';
                     $zym_6 .= '<span class="wname">' . $zym_4[name] . '</span>';
                     foreach ($zym_4[group][$zym_69] as $zym_19 => $zym_33){
                         if(is_array($zym_33)){
                             $zym_6 .= '<div><span>' . $zym_19 . '</span>';
                             foreach ($zym_4[group][$zym_69][$zym_19] as $zym_32 => $zym_31){
                                 $zym_75 = $zym_75 + 1;
                                 $zym_6 .= '<a  ' . "\xd\xa\x9\x9\x9\x9\x9\x9\x9\x9\x9" . 'href="javascript:void(0);" onClick="sethighlight(\'' . $zym_75 . '\');parent.framRight.location=\'' . $zym_31 . '\';"  >' . $zym_32 . '</a>';
                                 }
                             $zym_6 .= '</div>';
                             }
                         }
                     $zym_6 .= '</dl>';
                     }
                 }
             }
         }
     $zym_75 = NULL;
     return $zym_6;
    }
function mymps_admin_purview($zym_40 = ''){
     global $admin_menu;
     foreach($admin_menu as $zym_51 => $zym_34){
         if ($zym_51 != 'logout'){
             $zym_35 .= '<tr style="font-weight:bold; background-color:#dff6ff"><td colspan="2">' . $zym_34[name] . '</td></tr>';
             foreach($zym_34[group][element] as $zym_38 => $zym_69){
                 if ($zym_38 != '系统帮助'){
                     $zym_35 .= '<tr bgcolor="#f5fbff"><td>' . $zym_38 . '</td><td>';
                     foreach($zym_69 as $zym_4 => $zym_32){
                         $zym_35 .= '<label for="purview_' . $zym_4 . '" style="width:110px"><input type="checkbox" class="checkbox" name="purview[]" id="purview_' . $zym_4 . '" value="purview_' . $zym_4 . '"';
                         $zym_35 .= ((is_array($zym_40) && in_array('purview_' . $zym_4, $zym_40)) || empty($zym_40))? 'checked':"";
                         $zym_35 .= '>' . $zym_4 . '</label> ';
                         }
                     }
                 }
             $zym_35 .= '</td></tr>';
             }
         }
     return $zym_35;
    }
function get_mymps_config_menu(){
     global $admin_global_class;
     $zym_75 = 0;
     foreach($admin_global_class as $zym_51 => $zym_54){
         $zym_55 .= '<li><a id="i' . $zym_75 . '" href="javascript:noneblock(\'h' . $zym_75 . '\',\'i' . $zym_75 . '\')"';
         $zym_55 .= $zym_75 == 0 ? 'class="current"' : '';
         $zym_55 .= '>';
         $zym_55 .= $zym_54;
         $zym_55 .= '</a></li>';
         $zym_75 ++;
         }
     return $zym_55;
    }
function get_waterimg_position($zym_54 = ''){
     $zym_55 .= '<input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="0" ';
     $zym_55 .= $zym_54 == 0 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          随机位置' . "\xd\xa\x9" . '<table width="300" border="1" cellspacing="0" cellpadding="0">' . "\xd\xa" . '      <tr>' . "\xd\xa" . '        <td width="33%"><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="1"';
     $zym_55 .= $zym_54 == 1 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          顶部居左</td>' . "\xd\xa" . '        <td width="33%"><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="4"';
     $zym_55 .= $zym_54 == 4 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          顶部居中</td>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="7"';
     $zym_55 .= $zym_54 == 7 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          顶部居右</td>' . "\xd\xa" . '      </tr>' . "\xd\xa" . '      <tr>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="2"';
     $zym_55 .= $zym_54 == 2 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          左边居中</td>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="5"';
     $zym_55 .= $zym_54 == 5 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          图片中心</td>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="8"';
     $zym_55 .= $zym_54 == 8 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          右边居中</td>' . "\xd\xa" . '      </tr>' . "\xd\xa" . '      <tr>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="3"';
     $zym_55 .= $zym_54 == 3 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          底部居左</td>' . "\xd\xa" . '        <td><input type="radio" class="radio" name = "cfg_upimg_watermark_position"  value="6"';
     $zym_55 .= $zym_54 == 6 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          底部居中</td>' . "\xd\xa" . '        <td><input name = "cfg_upimg_watermark_position" type="radio" class="radio"   value="9"';
     $zym_55 .= $zym_54 == 9 ? 'checked': '';
     $zym_55 .= '>' . "\xd\xa" . '          底部居右</td>' . "\xd\xa" . '      </tr>' . "\xd\xa" . '    </table>';
     return $zym_55;
    }
function get_mymps_config_input(){
     global $admin_global, $admin_global_class, $config_global;
     $zym_75 = 0;
     foreach($admin_global_class as $zym_51 => $zym_37){
         $zym_55 .= '<div id="h' . $zym_75 . '" class="mytable"';
         $zym_55 .= ($zym_75 == 0)?' ':' style=\'display:none\'';
         $zym_55 .= '><table border="0" cellspacing="0" cellpadding="0" class="vbm"><tr class="firstr"><td colspan="5"><div class="left"><a href="javascript:collapse_change(\'' . $zym_75 . '\')">' . $zym_37 . '</a></div><div class="right"><a href="javascript:collapse_change(\'' . $zym_75 . '\')"><img id="menuimg_' . $zym_75 . '" src="template/images/menu_reduce.gif"/></a></div></td></tr><tbody id="menu_' . $zym_75 . '" style="display:"><tr style="font-weight:bold; height:24px; background-color:#f1f5f8"><td>相关说明</td><td>值</td><td>模板调用代码</td></tr>';
         foreach ($admin_global as $zym_51 => $zym_38){
             if ($zym_38['class'] == $zym_37){
                 $zym_55 .= '<tr bgcolor="#ffffff"><td style="width:35%; line-height:22px">' . $zym_38['des'] . '</td><td>';
                 if(in_array($zym_51, array('SiteDescription', 'SiteStat', 'cfg_forbidden_post_ip', 'cfg_forbidden_reg_ip', 'cfg_member_regplace', 'cfg_member_reg_content', 'cfg_site_open_reason', 'cfg_disallow_post_tel', 'cfg_allow_post_area'))){
                     $zym_55 .= '<textarea name="' . $zym_51 . '" style="height:100px; width:205px">' . $config_global[$zym_51] . '</textarea>';
                     }elseif($zym_51 == 'cfg_mappoint'){
                     $zym_55 .= '<input name="' . $zym_51 . '" value="' . $config_global[$zym_51] . '" class="text" id="mappoint"/>';
                     $zym_55 .= '<input type="button" class="gray mini" value="我要标注" onclick="javascript:setbg(\'地图标注\',500,250,\'../map.php?action=markpoint&width=500&height=250&title=default_map_point&p=' . $zym_36['cfg_mappoint'] . '\')"/>';
                     }elseif($zym_51 == 'SiteLogo'){
                     $zym_55 .= '<img src="' . $zym_36['SiteUrl'] . $config_global[$zym_51] . '" class="noborder"/><br /><br />';
                     $zym_55 .= '<input name="' . $zym_51 . '" value="' . $config_global[$zym_51] . '" class="text"/>';
                     }elseif($zym_51 == 'cfg_upimg_watermark_img'){
                     $zym_55 .= '<img src="' . $config_global[$zym_51] . '" class="noborder"/><br /><br />';
                     $zym_55 .= '<input name="' . $zym_51 . '" value="' . $config_global[$zym_51] . '" class="text" id="imgsrc"/>';
                     $zym_55 .= '<label><input type="radio" class="radio" onclick=\'document.getElementById("f' . $zym_51 . '").style.display = "none";\' name="ifout" value="no" checked="checked" class="radio"/>远程图片</label>' . "\xd\xa" . '<label><input type="radio" class="radio" onclick=\'document.getElementById("f' . $zym_51 . '").style.display = "block";\' name="ifout" value="yes" class="radio"/>本地上传</label>' . "\xd\xa" . '<iframe src="include/upfile.php?watermark=0" width="450" frameborder="0" scrolling="no" onload="this.height=iFrame1.document.body.scrollHeight" id="f' . $zym_51 . '" style="display:none; margin-top:10px"></iframe>';
                     }elseif($zym_51 == 'cfg_member_verify'){
                     $zym_55 .= '<label for=\'verify1\'><input ';
                     $zym_55 .= $config_global['cfg_member_verify'] == '1' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verify1\' type="radio" class="radio" value="1" name="cfg_member_verify">不审核</label>&nbsp;&nbsp;';
                     $zym_55 .= '<label for=\'verify2\'><input ';
                     $zym_55 .= $config_global['cfg_member_verify'] == '2' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verify2\' type="radio" class="radio" value="2" name="cfg_member_verify">人工审核</label>&nbsp;&nbsp;';
                     $zym_55 .= '<label for=\'verify3\'><input ';
                     $zym_55 .= $config_global['cfg_member_verify'] == '3' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verify3\' type="radio" class="radio" value="3" name="cfg_member_verify">邮件审核</label>&nbsp;&nbsp;';
                     $zym_55 .= '<label for=\'verify4\'><input ';
                     $zym_55 .= $config_global['cfg_member_verify'] == '4' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verify4\' type="radio" class="radio" value="4" name="cfg_member_verify">短信验证审核</label>&nbsp;&nbsp;';
                     }elseif($zym_51 == 'cfg_if_info_verify'){
                     $zym_55 .= '<label for=\'verifyy1\'><input ';
                     $zym_55 .= $config_global['cfg_if_info_verify'] == '0' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verifyy1\' type="radio" class="radio" value="0" name="cfg_if_info_verify">不审核</label>&nbsp;&nbsp;';
                     $zym_55 .= '<label for=\'verifyy2\'><input ';
                     $zym_55 .= $config_global['cfg_if_info_verify'] == '1' ? ' checked ' : '';
                     $zym_55 .= ' id=\'verifyy2\' type="radio" class="radio" value="1" name="cfg_if_info_verify">人工审核</label>';
                     }elseif($zym_51 == 'cfg_upimg_watermark_position'){
                     $zym_55 .= get_waterimg_position($config_global[$zym_51]);
                     }else{
                     if($zym_38['type'] == '布尔型'){
                         $zym_55 .= '<select name="' . $zym_51 . '"/>';
                         $zym_55 .= '<option value="1"';
                         $zym_55 .= ($config_global[$zym_51] == 1)?' selected=\'selected\' style=\'background-color:#6eb00c; color:white!important;\'':"";
                         $zym_55 .= '>是/开启</option>';
                         $zym_55 .= '<option value="0"';
                         $zym_55 .= ($config_global[$zym_51] == 0)?' selected=\'selected\' style=\'background-color:#6eb00c; color:white!important;\'':"";
                         $zym_55 .= '>否/关闭</option>';
                         $zym_55 .= '</select>';
                         }else{
                         $zym_55 .= '<input name="' . $zym_51 . '" value="' . $config_global[$zym_51] . '" class="text"/>';
                         }
                     }
                 $zym_55 .= ($zym_38['type'] == '布尔型')?'</td><td width=30%>&nbsp;</td></tr>':'</td><td width=30%>{$mymps_global[' . $zym_51 . ']}</td></tr>';
                 }
             }
         $zym_55 .= '</tbody></table></div>';
         $zym_75 = $zym_75 + 1;
         }
     return $zym_55;
    }
function iszero($zym_30){
     return $zym_30 == 0 ? 1 : $zym_30;
    }
function getcwdOL(){
     $zym_29 = $_SERVER[PHP_SELF];
     $zym_17 = explode('/', $zym_29);
     $zym_17 = $zym_17[sizeof($zym_17)-1];
     return substr($zym_29, 0, strlen($zym_29) - strlen($zym_17)-1);
    }
function fetchtablelist($zym_23 = ''){
     global $db;
     $zym_22 = explode('.', $zym_23);
     $zym_21 = $zym_22[1] ? $zym_22[0] : '';
     $zym_23 = str_replace('_', '\_', $zym_23);
     $zym_24 = $zym_21 ? " FROM $zym_21 LIKE '$zym_22[1]%'" : "LIKE '$zym_23%'";
     $zym_25 = $zym_60 = array();
     $zym_13 = $db -> query("SHOW TABLE STATUS $zym_24");
     while($zym_60 = $db -> fetch_array($zym_13)){
         $zym_60['Name'] = ($zym_21 ? "$zym_21." : '') . $zym_60['Name'];
         $zym_25[] = $zym_60;
         }
     return $zym_25;
    }
function get_timezone_select($zym_56 = 'cfg_timezone', $zym_54 = ''){
     $zym_28 = array('-12' => '(GMT -12:00) 埃尼威托克岛, 夸贾林环..', '-11' => '(GMT -11:00) 中途岛, 萨摩亚群岛', '-10' => '(GMT -10:00) 夏威夷', '-9' => '(GMT -09:00) 阿拉斯加', '-8' => '(GMT -08:00) 太平洋时间(美国和加拿..', '-7' => '(GMT -07:00) 山区时间(美国和加拿大..', '-6' => '(GMT -06:00) 中部时间(美国和加拿大..', '-5' => '(GMT -05:00) 东部时间(美国和加拿大..', '-4' => '(GMT -04:00) 大西洋时间(加拿大), 加..', '-3.5' => '(GMT -03:30) 纽芬兰', '-3' => '(GMT -03:00) 巴西利亚, 布宜诺斯艾利..', '-2' => '(GMT -02:00) 中大西洋, 阿森松群岛,..', '-1' => '(GMT -01:00) 亚速群岛, 佛得角群岛 ..', '0' => '(GMT) 卡萨布兰卡, 都柏林, 爱丁堡, ..', '1' => '(GMT +01:00) 柏林, 布鲁塞尔, 哥本哈..', '2' => '(GMT +02:00) 赫尔辛基, 加里宁格勒,..', '3' => '(GMT +03:00) 巴格达, 利雅得, 莫斯科..', '3.5' => '(GMT +03:30) 德黑兰', '4' => '(GMT +04:00) 阿布扎比, 巴库, 马斯喀..', '4.5' => '(GMT +04:30) 坎布尔', '5' => '(GMT +05:00) 叶卡特琳堡, 伊斯兰堡,..', '5.5' => '(GMT +05:30) 孟买, 加尔各答, 马德拉..', '5.75' => '(GMT +05:45) 加德满都', '6' => '(GMT +06:00) 阿拉木图, 科伦坡, 达卡..', '6.5' => '(GMT +06:30) 仰光', '7' => '(GMT +07:00) 曼谷, 河内, 雅加达', '8' => '(GMT +08:00) 北京, 香港, 帕斯, 新加..', '9' => '(GMT +09:00) 大阪, 札幌, 首尔, 东京..', '9.5' => '(GMT +09:30) 阿德莱德, 达尔文', '10' => '(GMT +10:00) 堪培拉, 关岛, 墨尔本,..', '11' => '(GMT +11:00) 马加丹, 新喀里多尼亚,..', '12' => '(GMT +12:00) 奥克兰, 惠灵顿, 斐济,..',);
     $zym_54 = empty($zym_54) ? '8' : $zym_54;
     $zym_27 .= '<select name=' . $zym_56 . '>';
     foreach($zym_28 as $zym_76 => $zym_26){
         $zym_27 .= '<option value=' . $zym_76 . ' ' . ($zym_54 == $zym_76 ? 'selected' : "") . '>';
         $zym_27 .= $zym_26;
         $zym_27 .= '</option>';
         }
     $zym_27 .= '</select>';
     return $zym_27;
    }
?>
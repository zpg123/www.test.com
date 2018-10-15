<?php
 !defined('WAP') && exit('FORBIDDEN');
require_once MYMPS_DATA . '/moneytype.inc.php';
require_once MYMPS_ROOT . '/member/include/common.func.php';
if(!in_array($action, array('upface', 'editbase', 'editpwd', 'pay', 'mypost', 'shoucang', 'docu', 'goods', 'qiandao', 'upgradecorp'))) $action = 'index';
if($iflogin != 1){
    if($action == 'pay'){
    }else{
        echo mymps_goto('index.php?mod=login');
    }
}elseif($action == 'index'){
    $row = $db -> getRow("SELECT * FROM `{$db_mymps}member` WHERE userid = '$s_uid'");
    $total['info'] = mymps_count('information', "WHERE userid = '$s_uid'");
    $total['shoucang'] = mymps_count('shoucang', "WHERE userid = '$s_uid'");
    if($row['if_corp'] == 1){
        $total['docu'] = mymps_count('member_docu', "WHERE userid = '$s_uid'");
        $total['goods'] = mymps_count('goods', "WHERE userid = '$s_uid'");
    }
    include mymps_tpl('member');
    exit;
}
if($dopost == 1){
    switch($action){
    case 'upface': require_once MYMPS_INC . '/upfile.fun.php';
        $name_file = 'mymps_member_logo';
        if ($_FILES[$name_file]['name']){
            check_upimage($name_file);
            $destination = '/face/' . date('Ym') . '/';
            $mymps_image = start_upload($name_file, $destination, 0, $mymps_mymps['cfg_memberlogo_limit']['width'], $mymps_mymps['cfg_memberlogo_limit']['height']);
            @unlink(MYMPS_ROOT . $face);
            @unlink(MYMPS_ROOT . $normalface);
            $db -> query("UPDATE `{$db_mymps}member` SET logo='$mymps_image[0]',prelogo='$mymps_image[1]' WHERE userid = '$s_uid'");
            unset($mymps_mymps, $destination, $name_file, $mymps_image);
            redirectmsg('图片上传成功！', 'index.php?mod=member');
        }else{
            redirectmsg('图片上传失败，请换一张图片试试！', 'javascript:history.back();');
        }
        break;
    case 'editbase': if($if_corp == 1){
            empty($tname) && redirectmsg('请填写机构名称', 'javascript:history.back();');
            empty($tel) && redirectmsg('请填写固话号码', 'javascript:history.back();');
            empty($address) && redirectmsg('请填写联系地址', 'javascript:history.back();');
            empty($introduce) && redirectmsg('请填写机构简介', 'javascript:history.back();');
            if(is_array($catid)){
                mymps_delete('member_category', "WHERE userid = '$s_uid'");
                foreach($catid as $kids => $vids){
                    $db -> query("INSERT `{$db_mymps}member_category` (userid,catid)VALUES('$s_uid','$vids')");
                }
                $catids = implode(',', $catid);
            }else{
                redirectmsg('请选择所属分类', 'javascript:history.back();');
            }
            $introduce = textarea_post_change($introduce);
            $tname = ($com_certify != 1 && $tname) ? ",tname='$tname'" : "";
            $cname = $cname ? ",cname='$cname'":"";
            $db -> query("UPDATE `{$db_mymps}member` SET mobile='$mobile',email='$email',qq='$qq',tel='$tel',address='$address',catid='$catids',areaid='$areaid'{$tname}{$cname} WHERE userid = '$s_uid'");
            if($type == 'reg'){
                redirectmsg('机构资料提交成功！', 'index.php?mod=member');
                exit;
            }
        }else{
            empty($mobile) && redirectmsg('请填写手机号码', 'javascript:history.back();');
            $cname = ($per_certify != 1 && $cname) ? ",cname='$cname'" : "";
            $db -> query("UPDATE `{$db_mymps}member` SET mobile='$mobile',email='$email',qq='$qq'{$cname} WHERE userid = '$s_uid'");
        }
        redirectmsg('资料更新成功！', 'index.php?mod=member&action=editbase');
        break;
    case 'editpwd': empty($userpwd) && redirectmsg('请输入新密码！', 'index.php?mod=member&action=editpwd');
        if(strlen($userpwd) < 6 || strlen($userpwd) > 15) redirectmsg('密码不能小于6位或超过15位！', 'index.php?mod=member&action=editpwd');
        if($reuserpwd != $userpwd) redirectmsg('两次密码输入不相同！', 'index.php?mod=member&action=editpwd');
        if(PASSPORT_TYPE == 'phpwind'){
            require MYMPS_ROOT . '/pw_client/uc_client.php';
            $pw_user = uc_user_get($s_uid);
            $result = uc_user_edit($pw_user['uid'], $pw_user['username'], '', md5($userpwd), '');
        }elseif(PASSPORT_TYPE == 'ucenter'){
            require MYMPS_ROOT . '/uc_client/client.php';
            $result = uc_user_edit($s_uid, $userpwd, $userpwd, $email, 1);
        }
        $db -> query("UPDATE `{$db_mymps}member` SET userpwd = '" . md5($userpwd) . "' WHERE userid = '$s_uid'");
        redirectmsg('密码修改成功，请用新密码重新登录！', 'index.php?mod=member');
        break;
    case 'pay': include MYMPS_INC . '/pay.fun.php';
        if($money){
            $money = (float)$money;
            $money = ceil($money / $mymps_global['cfg_coin_fee']);
            if($money < 1) redirectmsg('充值的数量不能小于1', 'javascript:history.back();');
            $payid = (int)$payid;
            if(!$payid) redirectmsg('请选择支付接口', 'javascript:history.back();');
            $payr = $db -> getRow("SELECT * FROM {$db_mymps}payapi WHERE payid='$payid' AND isclose=0");
            if(!$payr['payid']) redirectmsg('该支付接口未开启', 'javascript:history.back();');
            $ddno = $timestamp;
            $pay_type = 'PayToMoney';
            $productname = '金币充值';
            msetcookie('pay_type', $pay_type);
            $PayReturnUrlQz = $mymps_global['SiteUrl'];
            include MYMPS_INC . '/payment/' . $payr['paytype'] . '/to_pay.php';
        }
        break;
    case 'mypost': $row = $db -> getRow("SELECT money_own FROM `{$db_mymps}member` WHERE userid = '$s_uid'");
        if($act == 'refreshid'){
            if(!$id){
                echo '该信息不存在！';
            }else{
                if(mgetcookie('refreshed' . $id) == 1){
                    echo '该信息已经刷新过了，请不要重复刷新';
                    exit;
                }
                $delmoney = $mymps_global['cfg_member_info_refresh'];
                if($delmoney > $row['money_own']){
                    echo '余额不足';
                    exit;
                }
                $activetime = $db -> getOne("SELECT activetime FROM `{$db_mymps}information` WHERE id = '$id'");
                $endtime = $activetime == 0 ? 0 : $activetime * 3600 * 24 + $timestamp;
                $db -> query("UPDATE `{$db_mymps}information` SET begintime = '$timestamp',endtime='$endtime' WHERE id ='$id'");
                msetcookie('refreshed' . $id, 1);
                if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' WHERE userid = '$s_uid'");
                write_money_use("编号为 $id 的信息主题被执行 <font color=red>刷新</font> 操作", '<font color=red>扣除金币 ' . $delmoney . ' </font>');
                echo 'success';
            }
        }elseif($act == 'boldid'){
            if(!$id){
                echo '该信息不存在！';
            }else{
                $delmoney = $mymps_global['cfg_member_info_bold'];
                if($delmoney > $row['money_own']){
                    echo '余额不足';
                    exit;
                }
                $ifbold = $db -> getOne("SELECT ifbold FROM `{$db_mymps}information` WHERE id = '$id'");
                if($ifbold == 1){
                    echo '操作失败，该信息标题已是加粗状态了';
                    exit;
                }
                $db -> query("UPDATE `{$db_mymps}information` SET ifbold = '1' WHERE id ='$id'");
                if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' WHERE userid = '$s_uid'");
                write_money_use("编号为 $id 的信息主题被执行 <font color=red>加粗</font> 操作", '<font color=red>扣除金币 ' . $delmoney . ' </font>');
                echo 'success';
            }
        }elseif($act == 'redid'){
            if(!$id){
                echo '该信息不存在！';
            }else{
                $delmoney = $mymps_global['cfg_member_info_red'];
                if($delmoney > $row['money_own']){
                    echo '余额不足';
                    exit;
                }
                $ifred = $db -> getOne("SELECT ifred FROM `{$db_mymps}information` WHERE id = '$id'");
                if($ifred == 1){
                    echo '操作失败，该信息标题已是套红状态了';
                    exit;
                }
                $db -> query("UPDATE `{$db_mymps}information` SET ifred = '1' WHERE id ='$id'");
                if($delmoney) $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$delmoney' WHERE userid = '$s_uid'");
                write_money_use("编号为 $id 的信息主题被执行 <font color=red>套红</font> 操作", '<font color=red>扣除金币 ' . $delmoney . ' </font>');
                echo 'success';
            }
        }elseif($act == 'deleteid'){
            if(!$id){
                echo '该信息不存在！';
            }else{
                $r = $db -> getRow("SELECT a.*,b.modid FROM `{$db_mymps}information` AS a LEFT JOIN `{$db_mymps}category` AS b ON a.catid = b.catid {$wherea} AND a.id =" . $id);
                if(!empty($r['img_path'])){
                    $del = $db -> getAll("SELECT path,prepath FROM `{$db_mymps}info_img` WHERE infoid='$id'");
                    foreach ($del as $k => $v){
                        if($v['path']) @unlink(MYMPS_ROOT . $v['path']) ;
                        if($v['prepath']) @unlink(MYMPS_ROOT . $v['prepath']);
                    }
                    mymps_delete('info_img', "WHERE infoid = '$id'");
                }
                mymps_delete('comment', "WHERE type = 'information' AND typeid = '$id'");
                if($r[modid] > 1) mymps_delete('information_' . $r[modid], "WHERE id = '$id'");
                $db -> query("DELETE FROM `{$db_mymps}information` WHERE id = " . $id);
                echo 'success';
            }
        }elseif($act == 'upgrade'){
            if(!$id){
                echo '请先指定需要置顶的信息主题!';
                exit;
            }
            if(!$info = $db -> getRow("SELECT  title,id,upgrade_type,upgrade_type_list,upgrade_type_index FROM `{$db_mymps}information` WHERE id = '$id'")){
                echo '您置顶的信息主体不存在或已被删除!';
                exit;
            }
            $need = $mymps_global[$upgrade_type] * $upgrade_time;
            if($row['money_own'] < $need){
                $money = $need - $row['money_own'];
                $money = (float)$money;
                redirectmsg('金币余额不足，请先充值', 'index.php?mod=member&action=pay&money=' . $money);
            }else{
                $upgrade_time = ($upgrade_time * 3600 * 24) + $timestamp;
                if($upgrade_type == 'cfg_member_upgrade_top'){
                    $actionstr = '大类置顶';
                    if($info['upgrade_type'] == 2){
                        redirectmsg('操作失败！该信息主题已处于大类置顶状态！', 'index.php?mod=member&action=mypost&act=upgrade&id=' . $id);
                    }
                    $db -> query("UPDATE `{$db_mymps}information` SET upgrade_type = '2' , upgrade_time = '$upgrade_time' WHERE id = '$id'");
                }elseif($upgrade_type == 'cfg_member_upgrade_list_top'){
                    $actionstr = '小类置顶';
                    if($info['upgrade_type_list'] == 2){
                        redirectmsg('操作失败！该信息主题已处于小类置顶状态！', 'index.php?mod=member&action=mypost&act=upgrade&id=' . $id);
                    }
                    $db -> query("UPDATE `{$db_mymps}information` SET upgrade_type_list = '2' , upgrade_time_list = '$upgrade_time' WHERE id = '$id'");
                }elseif($upgrade_type == 'cfg_member_upgrade_index_top'){
                    $actionstr = '首页置顶';
                    if($info['upgrade_type_index'] == 2){
                        redirectmsg('操作失败！该信息主题已处于首页置顶状态！', 'index.php?mod=member&action=mypost&act=upgrade&id=' . $id);
                    }
                    $db -> query("UPDATE `{$db_mymps}information` SET upgrade_type_index = '2' , upgrade_time_index = '$upgrade_time' WHERE id = '$id'");
                }
                $db -> query("UPDATE `{$db_mymps}member` SET money_own = money_own - '$need' WHERE userid = '$s_uid'");
                $caozuo = $upgrade_type == 'cfg_member_upgrade_index_top' ? '首页置顶' : ($upgrade_type == 'cfg_member_upgrade_top' ? '大类置顶' : '小类置顶');
                write_money_use("编号为 $id 的信息主题被执行 <font color=red>" . $caozuo . '</font> 操作', '<font color=red>扣除金币 ' . $need . ' </font>');
                redirectmsg('操作成功！该信息主题已被' . $actionstr . '！', 'index.php?mod=member&action=mypost');
            }
        }
        break;
    }
    exit;
}else{
    if(in_array($action, array('upface', 'editbase', 'editpwd', 'qiandao', 'upgrade_type', 'upface'))){
        $row = $db -> getRow("SELECT * FROM `{$db_mymps}member` WHERE userid = '$s_uid'");
    }
    switch($action){
    case 'upface': include mymps_tpl('member_upface');
        break;
    case 'editbase': include mymps_tpl('member_editbase');
        break;
    case 'editpwd': include mymps_tpl('member_editpwd');
        break;
    case 'pay': $uid = $db -> getOne("SELECT id FROM `{$db_mymps}member` WHERE userid = '$s_uid'");
        $mobilepay = $db -> getAll("SELECT * FROM `{$db_mymps}payapi` WHERE isclose='0' AND (paytype='alipay_h5' OR paytype='wxpay')");
        include mymps_tpl('member_pay');
        break;
    case 'mypost': require_once MYMPS_DATA . '/info.level.inc.php';
        unset($information_level, $news_level);
        if($act == 'upgrade'){
            if(empty($id)) redirectmsg('请选择需要置顶的信息主题');
            $info = $db -> getRow("SELECT * FROM `{$db_mymps}information` WHERE id = '$id'");
            $info[gname] = $db -> getOne("SELECT catname FROM `{$db_mymps}category` WHERE catid = '$info[gid]'");
            include mymps_tpl('member_mypost_upgrade');
        }else{
            $where = " WHERE userid = '$s_uid' AND (info_level = 1 OR info_level = 2)";
            $perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
            $param = setparams(array('mod', 'userid', 'action'));
            $rows_num = $db -> getOne("SELECT COUNT(id) FROM `{$db_mymps}information` $where");
            $totalpage = ceil($rows_num / $perpage);
            $num = intval($page-1) * $perpage;
            $info_list = page1("SELECT * FROM `{$db_mymps}information` $where ORDER BY begintime DESC", $perpage);
            $pageview = pager();
            include mymps_tpl('member_mypost');
        }
        break;
    case 'shoucang': $sql = "SELECT a.*,b.id,b.catname FROM {$db_mymps}shoucang AS a LEFT JOIN {$db_mymps}information AS b ON a.infoid = b.id WHERE a.userid = '$s_uid' ORDER BY a.id DESC";
        $list = array();
        foreach(page1($sql) as $k => $row){
            $arr['id'] = $row['id'];
            $arr['catname'] = $row['catname'];
            $arr['infoid'] = $row['infoid'];
            $arr['title'] = SpHtml2Text($row['title']);
            $arr['intime'] = get_format_time($row['intime']);
            $arr['url'] = 'index.php?mod=information&id=' . $row['infoid'];
            $list[] = $arr;
        }
        include mymps_tpl('member_shoucang');
        break;
    case 'docu': $row = $db -> getRow("SELECT id FROM `{$db_mymps}member` WHERE userid = '$s_uid'");
        $where = " WHERE userid = '$s_uid'";
        $perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
        $param = setparams(array('mod', 'userid', 'action'));
        $rows_num = $db -> getOne("SELECT COUNT(id) FROM `{$db_mymps}member_docu` $where");
        $totalpage = ceil($rows_num / $perpage);
        $num = intval($page-1) * $perpage;
        $list = page1("SELECT * FROM `{$db_mymps}member_docu` $where ORDER BY id DESC", $perpage);
        $pageview = pager();
        include mymps_tpl('member_docu');
        break;
    case 'goods': $where = " WHERE userid = '$s_uid'";
        $perpage = $mobile_settings['mobiletopicperpage'] ? $mobile_settings['mobiletopicperpage'] : 10;
        $param = setparams(array('mod', 'userid', 'action'));
        $rows_num = $db -> getOne("SELECT COUNT(goodsid) FROM `{$db_mymps}goods` $where");
        $totalpage = ceil($rows_num / $perpage);
        $num = intval($page-1) * $perpage;
        $list = page1("SELECT * FROM `{$db_mymps}goods` $where ORDER BY goodsid DESC", $perpage);
        $pageview = pager();
        include mymps_tpl('member_goods');
        break;
    case 'qiandao': $score_change = get_credit_score();
        $score_changer = $score_change['score']['rank']['login'];
        if(!empty($score_changer)){
            $qdtime = GetTime($row['qdtime'], 'ymd');
            $nowtime = GetTime($timestamp, 'ymd');
            if($qdtime != $nowtime){
                if(!empty($score_changer)){
                    $db -> query("UPDATE `{$db_mymps}member` SET score = score" . $score_changer . ",qdtime='$timestamp' WHERE userid = '$s_uid'");
                }
                echo '签到成功！您的积分值已' . $score_changer;
            }else{
                echo '今天您已经签到过了，明天再来吧！';
            }
        }
        break;
    case 'upgradecorp': if($row['if_corp'] == 1){
            redirectmsg('您已经是机构会员了', 'index.php?mod=member&action=editbase');
        }else{
            $db -> query("UPDATE `{$db_mymps}member` SET if_corp = 1,status = 0 WHERE userid = '$s_uid'");
            redirectmsg('您已成为机构会员，请完善机构信息以通过审核', 'index.php?mod=member&action=editbase');
        }
        break;
    }
    exit;
}
?>
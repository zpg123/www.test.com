<?php
 define('CURSCRIPT', 'sms');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!in_array($part, array('setting', 'sendlist')) || !$part) && $part = 'setting';
if(!submit_check(CURSCRIPT . '_submit')){
    switch($part){
    case 'setting': chk_admin_purview('purview_短信接口');
        $here = '短信供应商设置';
        $res = $db -> query("SELECT description,value FROM {$db_mymps}config WHERE type='sms'");
        while($row = $db -> fetchRow($res)){
            $sms_config[$row['description']] = $row['value'];
        }
        break;
    case 'sendlist': chk_admin_purview('purview_短信发送记录');
        $here = 'M_ymps短信发送记录';
        $sql = "SELECT * FROM `{$db_mymps}sms_sendlist` ORDER BY id DESC";
        $rows_num = mymps_count('sms_sendlist');
        $param = setParam(array('part'));
        $list = page1($sql);
        break;
    default: break;
    }
    include(mymps_tpl(CURSCRIPT . '_' . $part));
}else{
    if($part == 'setting'){
        $des = array('sms_user', 'sms_pwd', 'sms_service', 'sms_regtpl', 'sms_pwdtpl');
        mymps_delete('config', 'WHERE type = \'sms\'');
        foreach($des as $key){
            $db -> query("INSERT {$db_mymps}config (description,value,type) VALUES ('$key','" . trim(${$key}) . '\',\'sms\')');
        }
        clear_cache_files('sms_config');
        write_msg('短信配置设置成功！', '?part=' . $part, 'WriteRecord');
    }elseif($part == 'sendlist'){
        $return_url = '?part=sendlist';
        if(is_array($delids)){
            foreach ($delids as $kids => $vids){
                mymps_delete('sms_sendlist', 'WHERE id = ' . $vids);
            }
        }
        write_msg('成功删除短信发送记录！', $return_url, 'write_record');
    }elseif($part == 'template'){
    }
}
is_object($db) && $db -> Close();
$mymps_global = $db = $db_mymps = $part = NULL;
?>
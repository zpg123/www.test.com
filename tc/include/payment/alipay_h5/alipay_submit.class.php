<?php
 require_once('alipay_core.function.php');
require_once('alipay_md5.function.php');
class AlipaySubmit{
    var $alipay_config;
    var $alipay_gateway_new = 'https://mapi.alipay.com/gateway.do?';
    function __construct($zym_13){
        $this -> alipay_config = $zym_13;
    }
    function AlipaySubmit($zym_13){
        $this -> __construct($zym_13);
    }
    function buildRequestMysign($zym_12){
        $zym_15 = createLinkstring($zym_12);
        $zym_16 = "";
        switch (strtoupper(trim($this -> alipay_config['sign_type']))){
        case 'MD5' : $zym_16 = md5Sign($zym_15, $this -> alipay_config['key']);
            break;
        default : $zym_16 = "";
        }
        return $zym_16;
    }
    function buildRequestPara($zym_20){
        $zym_19 = paraFilter($zym_20);
        $zym_12 = argSort($zym_19);
        $zym_16 = $this -> buildRequestMysign($zym_12);
        $zym_12['sign'] = $zym_16;
        $zym_12['sign_type'] = strtoupper(trim($this -> alipay_config['sign_type']));
        return $zym_12;
    }
    function buildRequestParaToString($zym_20){
        $zym_17 = $this -> buildRequestPara($zym_20);
        $zym_11 = createLinkstringUrlencode($zym_17);
        return $zym_11;
    }
    function buildRequestForm($zym_20, $zym_10, $zym_4){
        $zym_17 = $this -> buildRequestPara($zym_20);
        $zym_3 = '<form id=\'alipaysubmit\' name=\'alipaysubmit\' action=\'' . $this -> alipay_gateway_new . '_input_charset=' . trim(strtolower($this -> alipay_config['input_charset'])) . '\' method=\'' . $zym_10 . '\'>';
        while (list ($zym_2, $zym_1) = each($zym_17)){
            $zym_3 .= '<input type=\'hidden\' name=\'' . $zym_2 . '\' value=\'' . $zym_1 . '\'/>';
        }
        $zym_3 = $zym_3 . '<input type=\'submit\'  value=\'' . $zym_4 . '\' style=\'display:none;\'></form>';
        $zym_3 = $zym_3 . '<script>document.forms[\'alipaysubmit\'].submit();</script>';
        return $zym_3;
    }
    function query_timestamp(){
        $zym_5 = $this -> alipay_gateway_new . 'service=query_timestamp&partner=' . trim(strtolower($this -> alipay_config['partner'])) . '&_input_charset=' . trim(strtolower($this -> alipay_config['input_charset']));
        $zym_6 = "";
        $zym_9 = new DOMDocument();
        $zym_9 -> load($zym_5);
        $zym_8 = $zym_9 -> getElementsByTagName('encrypt_key');
        $zym_6 = $zym_8 -> item(0) -> nodeValue;
        return $zym_6;
    }
    function getHtml($zym_20){
        $zym_17 = $this -> buildRequestPara($zym_20);
        $zym_7 = '';
        while (list ($zym_2, $zym_1) = each($zym_17)){
            $zym_7 .= '&' . $zym_2 . '=' . urlencode($zym_1);
        }
        $zym_7 = $this -> alipay_gateway_new . '_input_charset=' . trim(strtolower($this -> alipay_config['input_charset'])) . $zym_7;
        return $zym_7;
    }
}
?>
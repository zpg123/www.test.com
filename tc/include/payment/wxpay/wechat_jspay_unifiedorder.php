<?php

!defined('IN_MYMPS') && exit('ACCESS DENIED!');
class wechat_jspay_unifiedorder
{
	public $appid;
	public $mch_id;
	public $key;
	public $notify_url;
	public $request_url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
	public $sign;
	public $nonce_str;

	public function __construct($conf)
	{
		$this->appid = $conf['appid'];
		$this->mch_id = $conf['payuser'];
		$this->key = $conf['paykey'];
	}

	public function requestOrder($attach, $body, $nonce_str, $out_trade_no, $total_fee, $trade_type, $notify_url, $openid, $sign = '')
	{
		$param['appid'] = $this->appid;
		$param['attach'] = $attach;
		$param['body'] = $body;
		$param['mch_id'] = $this->mch_id;
		$param['nonce_str'] = $nonce_str;
		$param['notify_url'] = $notify_url;
		$param['out_trade_no'] = $out_trade_no;
		$param['total_fee'] = $total_fee;
		$param['trade_type'] = $trade_type;
		$param['openid'] = $openid;
		$sign = $this->getSign($param);
		$this->sign = $sign;
		$this->nonce_str = $nonce_str;
		$param['sign'] = $sign;
		$data = $this->getXml($param);
		return $this->postXml($data);
	}

	public function postXml($data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->request_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$return = curl_exec($ch);
		curl_close($ch);
		return $return;
	}

	public function getSign($array)
	{
		ksort($array);
		$strArr = array();

		foreach ($array as $key => $val ) {
			array_push($strArr, $key . '=' . $val);
		}

		$string = implode('&', $strArr);
		$sign = $string . '&key=' . $this->key;
		return md5($sign);
	}

	public function getXml($array)
	{
		$string = '';

		foreach ($array as $key => $val ) {
			$string .= '<' . $key . '>' . $val . '</' . $key . '>';
		}

		return '<xml>' . $string . '</xml>';
	}
}


?>

<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
$db = new mysql($db_host, $db_user, $db_pass, $db_name);
$db_host = $db_user = $db_pass = NULL;
class mysql
{
	public $query_num = 0;
	public $link;

	public function mysql($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0)
	{
		$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	}

	public function connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0)
	{
		global $dbcharset;
		$func = (empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect');

		if (!$this->link = @$func($dbhost, $dbuser, $dbpw, 1)) {
			$this->halt('Can not connect to MySQL server');
		}

		if ('4.1' < $this->server_info()) {
			if ($dbcharset != 'latin1') {
				mysql_query('SET character_set_connection=' . $dbcharset . ', character_set_results=' . $dbcharset . ', character_set_client=binary', $this->link);
			}

			if ('5.0.1' < $this->server_info()) {
				mysql_query('SET sql_mode=\'\'', $this->link);
			}
		}

		if ($dbname) {
			if (!@mysql_select_db($dbname, $this->link)) {
				$this->halt('Cannot use database ' . $dbname);
			}
		}
	}

	public function select_db($dbname)
	{
		$this->dbname = $dbname;

		if (!@mysql_select_db($dbname, $this->link)) {
			$this->halt('Cannot use database ' . $dbname);
		}
	}

	public function server_info()
	{
		return mysql_get_server_info();
	}

	public function version()
	{
		return mysql_get_server_info();
	}

	public function fetchRow($query)
	{
		return mysql_fetch_assoc($query);
	}

	public function fetch_first($sql)
	{
		return $this->fetch_array($this->query($sql));
	}

	public function query($SQL, $method = '')
	{
		if (($method == 'unbuffer') && function_exists('mysql_unbuffered_query')) {
			$query = mysql_unbuffered_query($SQL, $this->link);
		}
		else {
			$query = mysql_query($SQL, $this->link);
		}

		if (!$query && ($method != 'SILENT')) {
			$this->halt('MySQL Query Error: ' . $SQL);
		}

		$this->query_num++;
		return $query;
	}

	public function getOne($sql, $limited = false)
	{
		if ($limited == true) {
			$sql = trim($sql . ' LIMIT 1');
		}

		$res = $this->query($sql);

		if ($res !== false) {
			$row = mysql_fetch_row($res);

			if ($row !== false) {
				return $row[0];
			}
			else {
				return '';
			}
		}
		else {
			return false;
		}
	}

	public function get_one($sql, $result_type = MYSQL_ASSOC)
	{
		$result = $this->query($sql);
		$record = $this->fetch_array($result, $result_type);
		return $record;
	}

	public function get_value($sql, $result_type = MYSQL_NUM, $field = 0)
	{
		$result_set = $this->query($sql);
		$rt = &$this->fetch_array($result_set, $result_type);
		return isset($rt[$field]) ? $rt[$field] : false;
	}

	public function escape($s)
	{
		if (function_exists('mysql_real_escape_string')) {
			return htmlspecialchars(mysql_real_escape_string($s, $this->link));
		}

		return htmlspecialchars(addslashes($s));
	}

	public function query_unbuffered($sql)
	{
		$s = $this->query($sql, 'UNBUFFERED');
		return $s;
	}

	public function getCol($sql)
	{
		$res = $this->query($sql);

		if ($res !== false) {
			$arr = array();

			while ($row = mysql_fetch_row($res)) {
				$arr[] = $row[0];
			}

			return $arr;
		}
		else {
			return false;
		}
	}

	public function getAll($sql)
	{
		$res = $this->query($sql);

		if ($res !== false) {
			$arr = array();

			while ($row = mysql_fetch_array($res)) {
				$arr[] = $row;
			}

			return $arr;
		}
		else {
			return false;
		}
	}

	public function getRow($sql, $limited = false)
	{
		if ($limited == true) {
			$sql = trim($sql . ' LIMIT 1');
		}

		$res = $this->query($sql);

		if ($res !== false) {
			return mysql_fetch_assoc($res);
		}
		else {
			return false;
		}
	}

	public function fetch_array($query, $result_type = MYSQL_ASSOC)
	{
		return mysql_fetch_array($query, $result_type);
	}

	public function affected_rows()
	{
		return mysql_affected_rows($this->link);
	}

	public function fetch_row($query)
	{
		return mysql_fetch_row($query);
	}

	public function num_rows($query)
	{
		return mysql_num_rows($query);
	}

	public function num_fields($query)
	{
		return mysql_num_fields($query);
	}

	public function result($query, $row)
	{
		$query = mysql_result($query, $row);
		return $query;
	}

	public function free_result($query)
	{
		return mysql_free_result($query);
	}

	public function insert_id()
	{
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	public function Close()
	{
		return mysql_close($this->link);
	}

	public function error()
	{
		return $this->link ? mysql_error($this->link) : mysql_error();
	}

	public function errno()
	{
		return intval($this->link ? mysql_errno($this->link) : mysql_errno());
	}

	public function halt($msg = '')
	{
		global $charset;
		$msg = '<html>' . "\n" . '<head>' . "\n";
		$msg .= '<meta content="text/html; charset=utf-8" http-equiv="Content-Type">' . "\n";
		$msg .= '<style type="text/css">' . "\n";
		$msg .= 'body,p,pre {' . "\n";
		$msg .= 'font:12px Verdana;' . "\n";
		$msg .= '}' . "\n";
		$msg .= '</style>' . "\n";
		$msg .= '</head>' . "\n";
		$msg .= '<body bgcolor="#FFFFFF" text="#000000" link="#006699" vlink="#5493B4">' . "\n";
		$msg .= '<b>Mymps error</b>: ' . htmlspecialchars($this->error()) . "\n" . '<br />';
		$msg .= '<b>error number</b>: ' . $this->errno() . "\n" . '<br />';
		$msg .= '<b>Date</b>: ' . date('Y-m-d @ H:i') . "\n" . '<br />';
		$msg .= '<b>Script</b>: http://' . $_SERVER['HTTP_HOST'] . getenv('REQUEST_URI') . "\n" . '<br />';
		$msg .= '</body>' . "\n" . '</html>';
		echo $msg;
		exit();
	}
}


?>

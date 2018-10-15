<?php

if (!defined('IN_MYMPS')) {
	exit('FORBIDDEN');
}
function inject_check($sql_str)
{
	return eregi('select|insert|update|delete|\'|\\/\\*|\\*|\\.\\.\\/|\\.\\/|union|into|load_file|outfile', $sql_str);
}

function verify($id = NULL, $type)
{
	if (inject_check($id)) {
		write_msg('', $global[SiteUrl] . '/index.php');
	}

	$id = intval($id);
	$id = ($id ? $id : $type);
	return $id;
}

function mymps_str_check($str)
{
	$str = trim($str);

	if (!get_magic_quotes_gpc()) {
		$str = addslashes($str);
	}

	$str = str_replace('%', '\\%', $str);
	return $str;
}

function mymps_post_check($post)
{
	if (!get_magic_quotes_gpc()) {
		$post = addslashes($post);
	}

	$post = str_replace('_', '\\_', $post);
	$post = str_replace('%', '\\%', $post);
	$post = htmlspecialchars($post);
	$post = str_replace("\n", '<br>', str_replace(' ', '&nbsp;', $post));
	return $post;
}


?>

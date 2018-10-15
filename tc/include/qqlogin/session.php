<?php

$_GET['mod'] = (isset($_GET['mod']) ? $_GET['mod'] : '');
$_GET['mod'] = ($_GET['mod'] ? htmlspecialchars(trim($_GET['mod'])) : 'pc');
session_save_path(dirname(__FILE__) . '/../../data/sessions');
session_start();

?>

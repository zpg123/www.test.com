<?php

$if_view = array(2 => '<font color=green>启用</font>', 1 => '<font color=red>不启用</font>');
function get_ifview_options($isview = '')
{
	global $if_view;

	foreach ($if_view as $key => $value ) {
		$mymps .= '<option value=' . $key;
		$mymps .= ($isview == $key ? ' style = "background-color:#6EB00C;color:white" selected>' : '>');
		$mymps .= $value . '</option>';
	}

	return $mymps;
}


?>

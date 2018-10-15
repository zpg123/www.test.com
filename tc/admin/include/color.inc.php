<?php

$color = array('#ff0000', '#006ffd', '#444444', '#000000', '#46a200', '#ff9900', '#ffffff');
function get_color_options($tcolor = '')
{
	global $color;

	foreach ($color as $k ) {
		$mymps .= '<option value=' . $k . ' style=background-color:' . $k;

		if ($k == $tcolor) {
			$mymps .= ' selected';
		}

		$mymps .= '></option>';
	}

	return $mymps;
}


?>

<?php

function GetMympsVerify($type = 'engber', $noise = '12', $line = '1', $distort = '6', $incline = '30', $return = true, $close = '0', $number = '4')
{
	global $timestamp;

	if ($type == 'plus') {
		$str1 = GetMympsRand('number', GetRand(array(1, 2)));
		$str2 = GetMympsRand('number', 1);
		$text = $str1 . '+' . $str2 . '=';
	}
	else {
		$text = GetMympsRand($type, $number);
	}

	$time = $timestamp + 600;
	$im_x = 195;
	$im_y = 52;
	$im = imagecreatetruecolor($im_x, $im_y);
	$text_c = ImageColorAllocate($im, mt_rand(1, 120), mt_rand(1, 120), mt_rand(1, 120));
	$tmpC0 = mt_rand(200, 255);
	$tmpC1 = mt_rand(230, 255);
	$tmpC2 = mt_rand(240, 255);
	$nx = 0;

	switch ($close) {
	case '0':
		$nxx = '1.7';
		break;

	case '1':
		$nxx = '1.6';
		break;

	case '2':
		$nxx = '1.5';
		break;

	case '3':
		$nxx = '1.4';
		break;

	case '4':
		$nxx = '1.3';
		break;

	case '5':
		$nxx = '1.2';
		break;

	case '6':
		$nxx = '1.1';
		break;

	case '7':
		$nxx = '1';
		break;

	case '8':
		$nxx = '0.9';
		break;
	}

	$buttum_c = ImageColorAllocate($im, $tmpC0, $tmpC1, $tmpC2);
	imagefill($im, 16, 13, $buttum_c);
	$font = MYMPS_DATA . '/ttf/mymps' . mt_rand(1, 6) . '.ttf';

	if ($noise) {
		for ($i = 0; $i < $noise; $i++) {
			$noiseColor = imagecolorallocate($im, mt_rand(150, 225), mt_rand(150, 225), mt_rand(150, 225));

			for ($j = 0; $j < 3; $j++) {
				imagestring($im, 5, mt_rand(-10, $im_x), mt_rand(-10, $im_y), GetMympsRand('engber', 1), $noiseColor);
			}
		}
	}

	for ($i = 0; $i < strlen($text); $i++) {
		$tmp = substr($text, $i, 1);
		$array = array(-1, 1);
		$p = array_rand($array);
		$an = $array[$p] * mt_rand(-$incline, $incline);
		$size = 26;
		imagettftext($im, $size, $an, $nx, $size * 1.5, $text_c, $font, $tmp);
		$nx += mt_rand($size * $nxx, $size * $nxx);
	}

	$distortion_im = imagecreatetruecolor($im_x, $im_y);
	imagefill($distortion_im, 16, 13, $buttum_c);

	for ($i = 0; $i < $im_x; $i++) {
		for ($j = 0; $j < $im_y; $j++) {
			$rgb = imagecolorat($im, $i, $j);
			if (((int) $i + 20 + (sin(($j / $im_y) * 2 * M_PI) * 10) <= imagesx($distortion_im)) && (0 <= (int) $i + 20 + (sin(($j / $im_y) * 2 * M_PI) * 10))) {
				imagesetpixel($distortion_im, (int) $i + 10 + (sin((($j / $im_y) * 2.5 * M_PI) - (M_PI * 0.10000000000000001)) * $distort), $j, $rgb);
			}
		}
	}

	if ($line) {
		for ($i = 0; $i < $line; $i++) {
			$rand = mt_rand(7, 38);
			$rand1 = mt_rand(15, 25);
			$rand2 = mt_rand(5, 10);

			for ($yy = $rand; $yy <= +$rand + 2; $yy++) {
				for ($px = -100; $px <= 95; $px = $px + 0.1) {
					$x = $px / $rand1;

					if ($x != 0) {
						$y = sin($x);
					}

					$py = $y * $rand2;
					imagesetpixel($distortion_im, $px + 100, $py + $yy, $text_c);
				}
			}
		}
	}

	Header('Content-type: image/JPEG');
	ImagePNG($distortion_im);
	ImageDestroy($distortion_im);
	ImageDestroy($im);
	$text = ($type == 'plus' ? $str1 + $str2 : $text);

	if ($return) {
		return array('code' => $text, 'time' => $time);
	}
}

function GetMympsRand($type = 'engber', $number = 4)
{
	$hash = '';

	if ($type == 'number') {
		$chars = '456789';
	}
	else if ($type == 'english') {
		$chars = 'abcdefghjklmnpqrstuvwxy';
	}
	else if ($type == 'engber') {
		$chars = '3456789abcdefghjklmnpqrstuvwxy';
	}

	$max = strlen($chars) - 1;
	mt_srand((double) microtime() * 1000000);

	for ($i = 0; $i < $number; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}

	$max = $chars = $type = NULL;
	$hash = strtoupper($hash);
	return $hash;
}

function GetRand($nxarray)
{
	$nxarray = ($nxarray ? $nxarray : array(0, 5, 10));
	$nxarr = rand(0, count($nxarray) - 1);
	return $nxarray[$nxarr];
}


?>

<?php

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

// Returns Array ( [0] => 204 [1] => 204 [2] => 0 )

global $_GET;

// Width
if(isset($_GET['w']) && $_GET['w'] != '') $width = $_GET['w'];
else $width = 510;

// Height
if(isset($_GET['h']) && $_GET['h'] != '') $height = $_GET['h'];
else $height = 320;

// Text
if(isset($_GET['text']) && $_GET['text'] != '') $text = $_GET['text'];
else $text = $width.' x '.$height;

// Create a image
$im = imagecreatetruecolor($width, $height);

// Colors
if(isset($_GET['bg']) && $_GET['bg'] != '')
{
	$bg = hex2rgb($_GET['bg']);
	$bg = imagecolorallocate($im, $bg[0], $bg[1], $bg[2]);
}
else $bg = imagecolorallocate($im, 204, 204, 204);

// Text color
if(isset($_GET['fc']) && $_GET['fc'] != '')
{
	$textcolor = hex2rgb($_GET['fc']);
	$textcolor = imagecolorallocate($im, $textcolor[0], $textcolor[1], $textcolor[2]);
}
else $textcolor = imagecolorallocate($im, 144, 144, 144);

// Make the background
imagefilledrectangle($im, 0, 0, $width, $height, $bg);

// Path to font file

// Fonts: bebas, yanone, lobster, museo
$font_file = './fonts/lobster.otf';

// Calc font size
if($width >= $height) $fontsize = $height/100*15;
else $fontsize = $width/100*15;

// Calc the text to be in the center
$pos = imagettfbbox($fontsize, 0, $font_file, $text);

$textwidth = abs(abs($pos[2]) - abs($pos[0]));

$x = (int)$width/2 - (int)$textwidth/2;

// Draw text
imagefttext($im, $fontsize, 0, $x, (int)$height/2+5, $textcolor, $font_file, $text);
// (int)$width/2+5

// Output image to the browser
header('Content-Type: image/png');

imagepng($im);

imagedestroy($im);

?>
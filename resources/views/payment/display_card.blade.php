<?php
$type = $_GET['t'];
if ($type == '3' || $type == '7') {
    $image = 'back-lte.png';
    $x_s = 343; $y_s = 83;
    $x_p = 120; $y_p = 58;
}
else {
    $image = 'back.png';
    $x_s = 343; $y_s = 83;
    $x_p = 100; $y_p = 65;
}
$im = ImageCreateFromPNG(URL::to('assets/img/reload/').$image);
$black = ImageColorAllocate($im, 0, 0, 0);
$font = 'assets/fonts/Digit.ttf';
ImageTTFText($im, 17, 0, $x_s, $y_s, $black, $font, $_GET['s']);
ImageTTFText($im, 17, 0, $x_p, $y_p, $black, $font, $_GET['p']);
$background = imagecolorallocate($im, 255, 255, 255);
imagecolortransparent($im, $background);
imagealphablending($im, false);
imagesavealpha($im, true);
header('Content-Type: image/png');
ImagePNG($im);
ImageDestroy($im);
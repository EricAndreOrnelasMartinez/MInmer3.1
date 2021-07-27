<?php
header("Content-Type: image/png");
echo "this works";
$im = @imagecreate(110, 20);
$color_fondo = imagecolorallocate($im, 0, 0, 0);
$color_texto = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  "A Simple Text String", $color_texto);
imagepng($im);
imagedestroy($im);
?>
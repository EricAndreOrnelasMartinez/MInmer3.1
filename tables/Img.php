<?php 

header("Content-Type: image/png");

$txt = "Holaaaaaa!!!, funcionaaaa!!";

$img = @imagecreate(500, 500) or die("no se puede inicializar la cadena");
$backgroud = imagecolorallocate($img, 220, 109, 0);
$textcolor = imagecolorallocate($img, 255,255,255);
imagestring($img, 10,0,0,$txt, $textcolor);
imagepng($img);
imagedestroy($img);

?>

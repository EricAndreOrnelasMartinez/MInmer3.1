<?php 

require_once('../PHP/dbcon.php');
header('Content-type: image/png');

$id = $_GET['id'];
$city = $_GET['city'];
$txt = "Holaaaaaa!!!, funcionaaaa!!";

$img = @imagecreate(500, 500);
$backgroud = imagecolorallocate($img, 220, 109, 0);
$textcolor = imagecolorallocate($img, 255,255,255);
imagestring($img, 10,0,0,$txt, $textcolor);
imagepng($img);
imagedestroy($img);

?>

<?php
header("Content-Type: image/png");
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
$txt = '';
$city = $_GET['city'];
$op = $_GET['op'];
$sql = "SELECT * FROM $city WHERE Operador='$op'";
$res = mysqli_query($con, $sql);
if($res){
    $he = 5;
    while($show = mysqli_fetch_array($res)){
        $txt = "Zona: ".$show['Zona']."  Fecha de carga: ".$show['FechaC']."  Hora de carga: ".$show['HoraC']."  Fecha de entrega: ".$show['FechaE']."  Hora de entrega: ".$show['HoraE']."  Dirección de entrega: ".$show['DireccionE']."  Razón social: ".$show['RazonS']."  Datos del contacto: ".$show['DatosC']."  SO: ".$show['SO']."  Factura: ".$show['Factura']."  Número de piezas: ".$show['NumeroP']."  Número de cajas: ".$show['NumeroC']."  Número de tarimas: ".$show['NumeroT']."  Tipo de unidad: ".$show['TipoT']."  Placas: ".$show['Placas']."  Operador: ".$show['Operador']."  Maniobrista: ".$show['Maniobrista']."  Custodia: ".$show['Custodia']."  Hora de salida con custodia: ".$show['HoraSCC']."  Observaciones: ".$show['Observaciones'];    
        $he = $he + 50;
        $im = @imagecreate(4000, 40);
        $color_fondo = imagecolorallocate($im, 0, 0, 0);
        $color_texto = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 30, $he, 5, $txt , $color_texto);
        imagepng($im);
        imagedestroy($im);
    }
}else{
    $im = @imagecreate(110, 20);
    $color_fondo = imagecolorallocate($im, 0, 0, 0);
    $color_texto = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 1, 5, 5, "Data base error" , $color_texto);
    imagepng($im);
    imagedestroy($im);
}
?>
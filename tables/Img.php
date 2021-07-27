<?php
header("Content-Type: image/png");
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
$txt = '';
$city = $_GET['city'];
$op = $_GET['op'];
$sql = "SELECT * FROM $city WHERE Operador='$op'";
$res = mysqli_query($con, $sql);
if($res){
    $he = 400;
    while($show = mysqli_fetch_array($res)){
        $txt = $txt + "Zona: $show['Zona']"."\n"."Fecha de carga: $show['FechaC']"."\n"."Hora de carga: $show['HoraC']"."\n"."Fecha de entrega: $show['FechaE']"."\n"."Hora de entrega: $show['HoraE']"."\n"."Dirección de entrega: $show['DireccionE']"."\n"."Razón social: $show['RazonS']"."\n"."Datos del contacto: $show['DatosC']"."\n"."SO: $show['SO']"."\n"."Factura: $show['Factura']"."\n"."Número de piezas: $show['NumeroP']"."\n"."Número de cajas: $show['NumeroC']"."\n"."Número de tarimas: $show['NumeroT']"."\n"."Tipo de unidad: $show['TipoT']"."\n"."Placas: $show['Placas']"."\n"."Operador: $show['Operador']"."\n"."Maniobrista: $show['Maniobrista']"."\n"."Custodia: $show['Custodia']"."\n"."Hora de salida con custodia: $show['HoraSCC']"."\n"."Observaciones: $show['Observaciones']";    
        $he = $he + 50;
    }
    $im = @imagecreate(400, $he);
    $color_fondo = imagecolorallocate($im, 0, 0, 0);
    $color_texto = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 25, 5, 5, $txt , $color_texto);
    imagepng($im);
    imagedestroy($im);
}else{
    $im = @imagecreate(110, 20);
    $color_fondo = imagecolorallocate($im, 0, 0, 0);
    $color_texto = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 1, 5, 5, "Data base error" , $color_texto);
    imagepng($im);
    imagedestroy($im);
}
?>
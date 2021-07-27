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
        $txt = $txt + "Zona: ".$show['Zona'].PHP_EOL."Fecha de carga: ".$show['FechaC'].PHP_EOL."Hora de carga: ".$show['HoraC'].PHP_EOL."Fecha de entrega: ".$show['FechaE'].PHP_EOL."Hora de entrega: ".$show['HoraE'].PHP_EOL."Dirección de entrega: ".$show['DireccionE'].PHP_EOL."Razón social: ".$show['RazonS'].PHP_EOL."Datos del contacto: ".$show['DatosC'].PHP_EOL."SO: ".$show['SO'].PHP_EOL."Factura: ".$show['Factura'].PHP_EOL."Número de piezas: ".$show['NumeroP'].PHP_EOL."Número de cajas: ".$show['NumeroC'].PHP_EOL."Número de tarimas: ".$show['NumeroT'].PHP_EOL."Tipo de unidad: ".$show['TipoT'].PHP_EOL."Placas: ".$show['Placas'].PHP_EOL."Operador: ".$show['Operador'].PHP_EOL."Maniobrista: ".$show['Maniobrista'].PHP_EOL."Custodia: ".$show['Custodia'].PHP_EOL."Hora de salida con custodia: ".$show['HoraSCC'].PHP_EOL."Observaciones: ".$show['Observaciones'];    
        $he = $he + 50;
        $im = @imagecreate(400, 400);
        $color_fondo = imagecolorallocate($im, 0, 0, 0);
        $color_texto = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 25, 5, 5, "Zona: ".$show['Zona'] , $color_texto);
        imagestring($im, 25, 5, 450, "Fecha de carga: ".$show['FechaC'] , $color_texto);
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
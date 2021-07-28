<?php
header("Content-Type: image/png");
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
$txt = '';
$city = $_GET['city'];
$id = $_GET['ID_SQL'];
$sql = "SELECT * FROM $city WHERE ID_SQL='$id'";
$res = mysqli_query($con, $sql);
if($res){
    $he = 400;
    while($show = mysqli_fetch_array($res)){
        $im = @imagecreate(2300, 100);
        $color_fondo = imagecolorallocate($im, 0, 0, 0);
        $color_texto = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 800, 5, 20, "Zona: ".$show['Zona']." Fecha de carga: ".$show['FechaC']." Hora de carga: ".$show['HoraC']." Fecha de entrega: ".$show['FechaE']." Hora de entrega: ".$show['HoraE']." Direccion de entrega: ".$show['DireccionE']." Datos de contacto: ".$show['DatosC']." Factura: ".$show['Factura'] , $color_texto);
        imagepng($im);
        imagedestroy($im);
    }
    //zona, fechahoraE dire con fact
}else{
    $im = @imagecreate(110, 20);
    $color_fondo = imagecolorallocate($im, 0, 0, 0);
    $color_texto = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 1, 5, 5, "Data base error" , $color_texto);
    imagepng($im);
    imagedestroy($im);
}
?>
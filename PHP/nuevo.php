<?php 
require_once('dbcon.php');
$Zona = $_POST['Zona'];
$FechaC = $_POST['FechaC'];
$HoraC = $_POST['HoraC'];
$FechaE = $_POST['FechaE'];
$HoraE = $_POST['HoraE'];
$DireccionE = $_POST['DireccionE'];
$RazonS = $_POST['RazonS'];
$DatosC = $_POST['DatosC'];
$SO = $_POST['SO'];
$Factura = $_POST['Factura'];
$NumeroP = $_POST['NumeroP'];
$NumeroC = $_POST['NumeroC'];
$Pension = $_POST['Pension'];
$NumeroT = $_POST['NumeroT'];
$TipoT = $_POST['TipoT'];
$Placas = $_POST['pla'];
$Operador = $_POST['Operador'];
$Maniobrista  = $_POST['Maniobrista'];
$Custodia = $_POST['Custodia'];
$HoraSCC = $_POST['HoraSCC']; 
$Observaciones = $_POST['Observaciones'];
$sql = "INSERT INTO $Zona(Zona,FechaC,HoraC,FechaE,HoraE,DireccionE,RazonS,DatosC,SO,Factura,NumeroP,NumeroC,NumeroT,TipoT,Placas,Operador,Maniobrista,Custodia,HoraSCC,Observaciones,Terminado,Pension) VALUE('$Zona','$FechaC','$HoraC','$FechaE','$HoraE','$DireccionE','$RazonS','$DatosC','$SO','$Factura','$NumeroP','$NumeroC','$NumeroT','$TipoT','$Placas','$Operador','$Maniobrista','$Custodia','$HoraSCC','$Observaciones',0,'$Pension')";
$res = mysqli_query($con,$sql);
if($res){
    echo json_encode('1');
}else{
    echo json_encode(mysqli_error($con));
}
?>
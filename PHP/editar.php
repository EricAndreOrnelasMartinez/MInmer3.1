<?php 
session_start();
$mail = $_SESSION['mail'];
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
$NumeroT = $_POST['NumeroT'];
$TipoT = $_POST['TipoT'];
$Placas = $_POST['pla'];
$Operador = $_POST['Operador'];
$Maniobrista  = $_POST['Maniobrista'];
$Custodia = $_POST['Custodia'];
$HoraSCC = $_POST['HoraSCC']; 
$Observaciones = $_POST['Observaciones'];
$sqlUpdate = "UPDATE $Zona SET Zona='$Zona',FechaC='$FechaC',HoraC='$HoraC',FechaE='$FechaE',HoraE='$HoraE',DireccionE='$DireccionE',RazonS='$RazonS',DatosC='$DatosC',SO='$SO',Factura='$Factura',NumeroP='$NumeroP',NumeroC='$NumeroC',NumeroT='$NumeroT',TipoT='$TipoT',Placas='$Placas',Operador='$Operador',Maniobrista='$Maniobrista',Custodia='$Custodia',HoraSCC='$HoraSCC',Observaciones='$Observaciones' WHERE ID_SQL=$id";
$resulupdate = mysqli_query($con,$sqlUpdate) or die(mysqli_error($con2));
$sqlInsert = "INSERT INTO Modifications(Mail,Hour,Day,City,RowN,Description) VALUE('$mail',current_time(),current_date(),'$city',$id,'Editado');";
$query = mysqli_query($con,$sqlInsert);
if($resulupdate){
    echo json_encode('1');
}else {
    echo json_encode('0');
}
?>
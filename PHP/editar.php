<?php 
session_start();
$mail = $_SESSION['mail'];
$id = $_POST['ID_SQL'];
$Zona = $_POST['Zona'];
require_once('dbcon.php');
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
$Placas = $_POST['Placas'];
$Operador = $_POST['Operador'];
$Maniobrista  = $_POST['Maniobrista'];
$Custodia = $_POST['Custodia'];
$Pension = $_POST['Pension'];
$HoraSCC = $_POST['HoraSCC']; 
$Observaciones = $_POST['Observaciones'];
$sqlUpdate = "UPDATE $Zona SET FechaC='$FechaC',HoraC='$HoraC',FechaE='$FechaE',HoraE='$HoraE',DireccionE='$DireccionE',RazonS='$RazonS',DatosC='$DatosC',SO='$SO',Factura='$Factura',NumeroP='$NumeroP',NumeroC='$NumeroC',NumeroT='$NumeroT',TipoT='$TipoT',Placas='$Placas',Operador='$Operador',Maniobrista='$Maniobrista',Custodia='$Custodia',HoraSCC='$HoraSCC',Observaciones='$Observaciones', Pension='$Pension' WHERE ID_SQL=$id";
$resulupdate = mysqli_query($con,$sqlUpdate);
$sqlInsert = "INSERT INTO Modifications(Mail,Hour,Day,City,RowN,Description) VALUE('$mail',current_time(),current_date(),'$city',$id,'Editado');";
$query = mysqli_query($con,$sqlInsert);
if($resulupdate){
    echo json_encode('1');
}else {
    echo json_encode(mysqli_error($con));
}
?>
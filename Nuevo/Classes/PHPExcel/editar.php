<?php 
session_start();
$mail = $_SESSION['mail'];
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
$city = $_POST['city'];
$id = $_POST['id'];
$FechaC1 = $_POST['FechaC'];
$FechaE1 = $_POST['FechaE'];
$Operador1 = $_POST['Operador'];
$Placas1 = $_POST['Placas'];
$ID1 = $_POST['ID'];
$SO1 = $_POST['SO'];
$Factura1 = $_POST['Factura'];
$Cliente1 = $_POST['Cliente'];
$PZS1 = $_POST['PZS'];
$Cajas1 = $_POST['Caja'];
$Subtotal1 = $_POST['Subtotal'];
$Horario1 = $_POST['Horario'];
$Direccion1 = $_POST['Direccion'];
$Destino1 = $_POST['Destino'];
$Concepto1 = $_POST['Concepto'];
$Capacidad1 = $_POST['Capacidad'];
$Observaciones1 = $_POST['Observaciones'];
$OE1 = $_POST['OE'];
$Custodia1 = $_POST['Custodia'];
$sqlUpdate = "UPDATE $city SET FechaC='$FechaC1',FechaE='$FechaE1',Operador='$Operador1',Placas='$Placas1',ID='$ID1',SO='$SO1',Factura='$Factura1',Cliente='$Cliente1',PZS='$PZS1',Caja='$Cajas1',Subtotal='$Subtotal1',Horario='$Horario1',Direccion='$Direccion1',Destino='$Destino1',Concepto='$Concepto1',Capacidad='$Capacidad1',Observaciones='$Observaciones1',OE='$OE1',Custodia='$Custodia1' WHERE ID_SQL=$id;";
$resulupdate = mysqli_query($con,$sqlUpdate) or die(mysqli_error($con2));
$sqlInsert = "INSERT INTO Modifications(Mail,Hour,Day,City,RowN,Description) VALUE('$mail',current_time(),current_date(),'$city',$id,'Editado');";
$query = mysqli_query($con,$sqlInsert);
if($resulupdate){
    echo json_encode('1');
}else {
    echo json_encode('0');
}
?>
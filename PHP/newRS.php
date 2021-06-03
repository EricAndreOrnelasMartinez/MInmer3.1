<?php 
require_once('dbcon.php');
$city = $_POST['city'];
$id = $_POST['id'];
$FechaC = $_POST['FechaC'];
$FechaE = $_POST['FechaE'];
$Operador = $_POST['Operador'];
$Placas = $_POST['Placas'];
$ID = $_POST['ID'];
$SO = $_POST['SO'];
$Factura = $_POST['Factura'];
$Cliente = $_POST['Cliente'];
$PZS = $_POST['PZS'];
$Cajas = $_POST['Caja'];
$Subtotal = $_POST['Subtotal'];
$Horario = $_POST['Horario'];
$Direccion = $_POST['Direccion'];
$Destino = $_POST['Destino'];
$Concepto = $_POST['Concepto'];
$Capacidad = $_POST['Capacidad'];
$Observaciones = $_POST['Observaciones'];
$OE = $_POST['OE'];
$Custodia = $_POST['Custodia'];
$sql = "INSERT INTO subP(ID_SQL,City,FechaC,FechaE,Operador,Placas,ID,SO,Factura,Cliente,PZS,Caja,Subtotal,Horario,Direccion,Destino,Concepto,Capacidad,Observaciones,OE,Custodia,Terminado) VALUES($id,'$city','$FechaC','$FechaE','$Operador','$Placas','$ID','$SO','$Factura','$Cliente','$PZS','$Cajas','$Subtotal','$Horario','$Direccion','$Destino','$Concepto','$Capacidad','$Observaciones','$OE','$Custodia',false);";
$res = mysqli_query($con,$sql);
if($res){
    echo json_encode('1');
}else{
    echo json_encode('0');
}
?>
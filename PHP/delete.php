<?php 
require_once('dbcon.php');
session_start();
$mail = $_SESSION['mail'];
$id = $_POST['id'];
$city = $_POST['city'];
$sql = "DELETE FROM $city WHERE ID_SQL=$id"; 
$res = mysqli_query($con, $sql);
if($res){
    $sqlInsert = "INSERT INTO Modifications(Mail,Hour,Day,City,RowN,Description) VALUE('$mail',current_time(),current_date(),'$city',$id,'Eliminado');";
    $query = mysqli_query($con,$sqlInsert);
    echo json_encode('1');
}else{
    echo json_encode('0');
}

?>
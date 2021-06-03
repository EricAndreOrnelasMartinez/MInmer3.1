<?php 
require_once('dbcon.php');
session_start();
$mail = $_SESSION['mail'];
$id = $_POST['id'];
$total = $_POST['total'];
$city = $_POST['city'];
$sql = "UPDATE $city SET Terminado=1 WHERE ID_SQL=$id";
if($total === '97'){
    $resSQL = mysqli_query($con, $sql);
    if($resSQL){
        $sqlInsert = "INSERT INTO Modifications(Mail,Hour,Day,City,RowN,Description) VALUE('$mail',current_time(),current_date(),'$city',$id,'Terminado');";
        $query = mysqli_query($con,$sqlInsert);
        echo json_encode('1');
    }else{
        echo json_encode('0');
    }
}else{
    echo json_encode('2');
}
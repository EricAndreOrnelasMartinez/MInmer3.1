<?php 
require_once('dbcon.php');
session_start();
$mail = $_SESSION['mail'];
$sql = "SELECT Mail,Nombre,Apellido,Nivel,rowN FROM users WHERE Mail='$mail'";
$res = mysqli_query($con, $sql);
if($res){
    echo json_encode(mysqli_fetch_all($res, MYSQLI_ASSOC));
}else{
    echo json_encode('0');
}
?>
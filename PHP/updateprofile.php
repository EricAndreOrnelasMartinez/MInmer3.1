<?php 
require_once('dbcon.php');
session_start();
$mailB = $_SESSION['mail'];
$mail = $_POST['mail'];
$name = $_POST['nombre'];
$last = $_POST['apellido'];
$Moth = $_POST['Moth'];
$MothT = $_POST['MothT'];
$sql = "UPDATE users SET Mail='$mail',Nombre='$name',Apellido='$last',Moth=$Moth, MothT=$MothT WHERE Mail='$mailB'";
$res = mysqli_query($con, $sql);
if($res){
    $_SESSION['mail'] = $mail;
    $_SESSION['rowN'] = $rowN;
    echo json_encode('1');
}else{
    echo json_encode('0');
}
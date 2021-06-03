<?php 
require_once('dbcon.php');
session_start();
$mail = $_SESSION['mail'];
$now = $_POST['now'];
$new = $_POST['new'];
$nowpass = "SELECT Contrasena FROM users WHERE Mail='$mail'";
$resnowpass = mysqli_query($con, $nowpass);
if($now === implode(mysqli_fetch_assoc($resnowpass))){
    $sql = "UPDATE users SET Contrasena='$new' WHERE Mail='$mail'";
    $updres = mysqli_query($con,$sql);
    if($updres){
        echo json_encode('1');
    }else{
        echo json_encode('0');
    }
}else{
    echo json_encode('2');
}
?>
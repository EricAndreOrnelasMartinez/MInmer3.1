<?php 
require_once('dbcon.php');

$mail = $_POST['mail'];
$pass = $_POST['pass'];
if(!empty($mail) && !empty($pass)){
    $sqlcon = "SELECT Contrasena FROM users WHERE Mail='$mail'";
    $rescon = mysqli_query($con,$sqlcon);
    if($rescon){
        if($pass === implode(mysqli_fetch_assoc($rescon))){
            session_set_cookie_params(60*30);
            session_start();
            $sqlnivel = "SELECT Nivel FROM users WHERE Mail='$mail'";
            $resnivel = mysqli_query($con, $sqlnivel);
            $sqlrow = "SELECT rowN FROM users WHERE Mail='$mail'";
            $resRow = mysqli_query($con, $sqlrow);
            $_SESSION['nivel'] = implode(mysqli_fetch_assoc($resnivel));
            $_SESSION['rowN'] = implode(mysqli_fetch_assoc($resRow));
            $_SESSION['mail'] = $mail;
            echo json_encode('1');
        }else{
            echo json_encode('0');
        }
    }else{
        echo json_encode('0');
    }
}else{
    echo json_encode('2');
}


?>
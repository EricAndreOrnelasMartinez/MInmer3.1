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
            $sqlmoth = "SELECT Moth FROM users WHERE Mail='$mail'";
            $resmoth = mysqli_query($con, $sqlmoth);
            $sqlmothT = "SELECT MothT FROM users WHERE Mail='$mail'";
            $resmothT = mysqli_query($con, $sqlmothT);
            $_SESSION['nivel'] = implode(mysqli_fetch_assoc($resnivel));
            $_SESSION['Moth'] = implode(mysqli_fetch_assoc($resmoth));
            $_SESSION['MothT'] = implode(mysqli_fetch_assoc($resmothT));
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
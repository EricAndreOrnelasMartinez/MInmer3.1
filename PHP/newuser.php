<?php 
require_once('dbcon.php');
$mail = $_POST['mail'];
$name = $_POST['name'];
$last = $_POST['last'];
$pass = $_POST['pass1'];
$nivel = $_POST['nivel'];
if(!empty($mail) && !empty($name) && !empty($last) && !empty($pass) && !empty($nivel)){
    $aux = intval($nivel);
    $sql = "INSERT INTO users(Mail,Nombre,Apellido,Contrasena,Nivel,rowN) VALUES('$mail','$name','$last','$pass',$aux, 50)";
    $res = mysqli_query($con,$sql);
    if($res){
        echo json_encode('1');
    }else{
        echo json_encode('0');
    }
}else{
    echo json_encode('2');
}
?>
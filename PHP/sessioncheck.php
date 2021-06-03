<?php 
session_start();
$aux = $_SESSION['mail'];
if(isset($aux)){
    echo json_encode('1');
}else{
    echo json_encode('0');
}

?>
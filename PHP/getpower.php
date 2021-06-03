<?php 
session_start();
$aux = $_SESSION['nivel'];
echo json_encode($aux)
?>
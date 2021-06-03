<?php 
require_once('dbcon.php');
$city = $_POST['city'];
$artibute = $_POST['atribute'];
$query = $_POST['query'];
$query2 = $_POST['query2'];
    if($artibute === 'FechaC' || $artibute === 'FechaE'){
        $sql = "SELECT * FROM  $city WHERE $artibute BETWEEN '$query' AND '$query2'";
        $resSQL = mysqli_query($con, $sql);
        echo json_encode(mysqli_fetch_all($resSQL, MYSQLI_ASSOC));
    }else{
        $sql = "SELECT * FROM $city WHERE $artibute='$query'";
        $ans = mysqli_query($con, $sql);
        echo json_encode(mysqli_fetch_all($ans, MYSQLI_ASSOC));
    }

?>

<?php 
$city = $_POST['city'];
$artibute = $_POST['atribute'];
$query = $_POST['query'];
$query2 = $_POST['query2'];
if($artibute === 'FechaC' || $artibute === 'FechaE'){
    echo json_encode('./getexcel.php?city='.$city.'&atribute='.$artibute.'&query='.$query.'&query2='.$query2);
}else{
    echo json_encode('./getexcel.php?city='.$city.'&atribute='.$artibute.'&query='.$query);
}
<?php 
$city = $_GET['city'];
$id = $_GET['ID_SQL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen</title>
</head>
<body>
    <img src="./Img.php?ID_SQL=<?php echo $op ?>&city=<?php echo $city ?>">
</body>
</html>
<?php 
$city = $_GET['city'];
    foreach($_FILES['archivo']['tmp_name'] as $key => $tmp_name){
        if($_FILES['archivo']['tmp_name'][$key]){
            $source = $_FILES['archivo']['tmp_name'][$key];
            $destination = __DIR__.'/'.$city.'/'.$_FILES['archivo']['name'][$key];
            if(move_uploaded_file($source, $destination)){
                //echo "Los archivos fueron subidos con exito!";

            }else{
                echo "hubo un error al subir los archivos";
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <title>Completado!!</title>
</head>
<body>
    <h3>¡Los archivos se han subido con éxito!</h3>
    <a href="../?city=CDMX"><button type="button">Volver</button></a>
</body>
</html>
  
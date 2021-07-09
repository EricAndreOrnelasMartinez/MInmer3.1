<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Upload</title>
</head>
<body>
<form enctype="multipart/form-data" method="post">
<h4>El nombre la evidencia debe ser el número de factura</h4>    
    Subir Evidencia PDF: <input type="file" name="archivo">
        <input type="submit" value="Subir">
        <a href="../?city=CDMX"><button type="button">Volver</button></a>
    </form>
</body>
<script src="../JS/session.js"></script>
<script src="../JS/secuereacces.js"></script>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
$city = $_GET['city'];
    for($_FILES['archivo']['tmp_name'] as $key => $tmp_name){
        if($_FILES['archivo']['tmp_name'][$key]){
            $source = $_FILES['myfile']['tmp_name'];
            $destination = __DIR__.'/'."$city".'/'.$_FILES['myfile']['name'];
            if(move_uploaded_file($source, $destination)){
                echo "Los archivos fueron subidos con exito!";
            }else{
                echo "hubo un error al subir los archivos";
            }
        }
    }

}
   
?>
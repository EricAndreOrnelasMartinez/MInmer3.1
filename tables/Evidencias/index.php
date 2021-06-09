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
    Subir Evidencia PDF: <input type="file" name="myfile">
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
if(isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])){
    if(!is_uploaded_file($_FILES['myfile']['tmp_name'])){
        echo "Error: el fichero no fue procesado correctamente";
    }

    $source = $_FILES['myfile']['tmp_name'];
    $destination = __DIR__.'/'."$city".'/'.$_FILES['myfile']['name'];

    if( is_file($destination)){
        echo "Error: fichero existente";
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
    if( ! @move_uploaded_file($source, $destination)){
        echo "Error: el fichero no se pudo mover a la carpeta destino ||   ".$destination;
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
}
   
?>
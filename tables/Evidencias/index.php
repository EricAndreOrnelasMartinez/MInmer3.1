<?php 
$city = $_GET['city'];
?>
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
<form enctype="multipart/form-data" method="post" action="files.php?city=<?php echo $city ?>">
<h4>El nombre la evidencia debe ser el número de factura</h4>    
    Subir Evidencia PDF: <input type="file" name="archivo[]" id="archivo[]" multiple="">
        <input type="submit" value="Subir">
        <a href="../?city=CDMX"><button type="button">Volver</button></a>
    </form>
</body>
<script src="../JS/session.js"></script>
<script src="../JS/secuereacces.js"></script>
</html>

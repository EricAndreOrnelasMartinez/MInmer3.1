<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

session_start();
if(!(isset($_SESSION['mail']))){
    header('Location:../');
}
function hasA($string){
    $prove = false;//explode
    $arr = explode(" ",$string);
    foreach($arr as $indexL){
        if($indexL === "a" || $indexL === "A"){
            $prove = true;
            break;
        }
    }
    return $prove;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Nuevo</title>
</head>
<body>
    <form id="data">
    Ciudad: <select class="option" name="city">
        <option value="CDMX">CDMX</option>
        <option value="GDL">GDL</option>
        <option value="MTY">MTY</option>
        <option value="CUN">CUN</option>
        <option value="SJD">SJD</option>
        <option value="QRO">QRO</option>
    </select><br>
    Fecha de carga: <input type="date" name="FechaC">
    Fecha de entrega: <input type="date" name="FechaE">
    Operador: <input type="text" name="Operador">
    Placas: <input type="text" name="Placas">
    ID: <input type="text" name="ID">
    SO: <input type="text" name="SO">
    Factura: <input type="text" name="Factura">
    Cliente: <input type="text" name="Cliente">
    PZS: <input type="text" name="PZS" >
    Cajas: <input type="text" name="Caja">
    Subtotal: <input type="text" name="Subtotal">
    Horario: <input type="text" name="Horario">
    Direccion: <input type="text" name="Direccion">
    Destino: <input type="text" name="Destino" >
    Concepto: <input type="text" name="Concepto">
    Capacidad: <input type="text" name="Capacidad">
    Observaciones: <input type="text" name="Observaciones">
    OE: <input type="text" name="OE">
    Custodia: <input type="text" name="Custodia">
    <input type="submit" value="Guardar">
    <a href="../tables/?city=CDMX"><button type="button">Regresar</button></a>
    <h3 id="res"></h3>
    </form>
    <form enctype="multipart/form-data" method="post">
        Subir registro exel: <input type="file" name="myfile">
        <input type="submit" value="Subir">
    </form>
</body>
<script src="nuevo.js"></script>
<script src="secureacces.js"></script>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
if(isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])){
    if(!is_uploaded_file($_FILES['myfile']['tmp_name'])){
        echo "Error: el fichero no fue procesado correctamente";
    }

    $source = $_FILES['myfile']['tmp_name'];
    $destination = __DIR__.'/uploads/'.$_FILES['myfile']['name'];

    if( is_file($destination)){
        echo "Error: fichero existente";
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
    if( ! @move_uploaded_file($source, $destination)){
        echo "Error: el fichero no se pudo mover a la carpeta destino ".$destination;
        @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
        exit;
    }
   

    echo "Se completo correctamente!! ||";
    echo $_FILES['myfile']['name'];
    include('XLSX.php');
    readAndC($_FILES['myfile']['name']);
    //header('Location:../tables/?city=CDMX');
}
?>
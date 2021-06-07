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
    Zona: <select class="option" name="Zona">
        <option value="CDMX">CDMX</option>
        <option value="GDL">GDL</option>
        <option value="MTY">MTY</option>
        <option value="CUN">CUN</option>
        <option value="SJD">SJD</option>
        <option value="QRO">QRO</option>
    </select><br>
    <label>Fecha de carga</label><input type="date" name="FechaC">
    <label>Hora de carga</label><input type="text" name="HoraC">
    <label>Fecha de entrega</label><input type="date" name="FechaE">
    <label>Hora de entrega</label><input type="text" name="HoraE">
    <label>Dirección de entrega</label><input type="text" name="DireccionE">
    <label>Razón social</label><input type="text" name="RazonS">
    <label>Datos de contacto</label><input type="text" name="DatosC">
    <label>SO</label><input type="text" name="SO">
    <label>Factura</label><input type="text" name="Factura">
    <label>Numero de piezas</label><input type="text" name="NumeroP">
    <label>Numero de cajas</label><input type="text" name="NumeroC">
    <label>Numero de Tarimas</label><input type="text" name="NumeroT">
    <label>Tipo de transporte</label><input type="text" name="TipoT">
    <label>Placas</label><input type="text" name="Placas">
    <label>Operador</label><input type="text" name="Operador">
    <label>Maniobrista</label><input type="text" name="Maniobrista">
    <label>Custodia</label><input type="text" name="Custodia">
    <label>Hora de salida con custodia</label><input type="text" name="HoraSCC">
    <label>Observaciones</label><input type="text" name="Observaciones">
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
// error_reporting(E_ALL);
// ini_set('display_errors','1');
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
    header('Location:../tables/?city=CDMX');
}
?>
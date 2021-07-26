<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

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
    <div class="info"><label>Fecha de carga</label><input type="date" name="FechaC"></div>
    <div class="info"><label>Hora de carga</label><input type="text" name="HoraC"></div>
    <div class="info"><label>Fecha de entrega</label><input type="date" name="FechaE"></div>
    <div class="info"><label>Hora de entrega</label><input type="text" name="HoraE"></div>
    <div class="info"><label>Dirección de entrega</label><input type="text" name="DireccionE"></div>
    <div class="info"><label>Razón social</label><input type="text" name="RazonS"></div>
    <div class="info"><label>Datos de contacto</label><input type="text" name="DatosC"></div>
    <div class="info"><label>SO</label><br><input type="text" name="SO"></div>
    <div class="info"><label>Factura</label><br><input type="text" name="Factura"></div>
    <div class="info"><label>Numero de piezas</label><input type="text" name="NumeroP"></div>
    <div class="info"><label>Numero de cajas</label><input type="text" name="NumeroC"></div>
    <div class="info"><label>Numero de Tarimas</label><input type="text" name="NumeroT"></div>
    <div class="info"><label>Tipo de transporte</label><input type="text" name="TipoT"></div>
    <div class="info"><label>Placas</label><br><input type="text" name="pla"></div>
    <div class="info"><label>Operador</label><br><input type="text" name="Operador"></div>
    <div class="info"><label>Maniobrista</label><input type="text" name="Maniobrista"></div>
    <div class="info"><label>Custodia</label><br><input type="text" name="Custodia"></div>
    <div class="info"><label>Hora de salida con custodia</label><input type="text" name="HoraSCC"></div>
    <div class="info"><label>Observaciones</label><input type="text" name="Observaciones"></div>
    <div class="info"><input type="submit" value="Guardar"></div>
    <div class="info"><button type="button" id="volver">Volver</button></div>
    <div class="info"><button type="button" id="duplicate">Duplicar</button></div>
    <h3 id="res"></h3>
    </form>
    <section id="main">
    </section>
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
    if(headers_sent()){
        foreach(headers_list() as $header){
            header_remove($header);
        }
        header("Location:../CDMX/?city=CDMX");
    }
}
?>
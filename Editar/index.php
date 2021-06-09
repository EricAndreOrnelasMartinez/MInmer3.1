<?php
    $con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
    $id = round($_GET['ids']);
    $city = $_GET['city'];
    session_start();
    $nivel = $_SESSION['nivel'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Editar</title>
</head>
<body>
    <h3>Editar</h3>
    <form id="data">
    <?php 
    $sql = "SELECT * FROM $city WHERE ID_SQL=$id"; 
    $res = mysqli_query($con,$sql);
    $sqlT = "SELECT Terminado FROM $city WHERE ID_SQL=$id";
    $resT = mysqli_query($con,$sqlT);
    $terminado = implode(mysqli_fetch_assoc($resT));
    while($show = mysqli_fetch_array($res)){
    ?>
    <label>Fecha de carga</label><input type="date" name="FechaC" value="<?php echo $show['FechaC'] ?>">
    <label>Hora de carga</label><input type="text" name="HoraC" value="<?php echo $show['HoraC'] ?>">
    <label>Fecha de entrega</label><input type="date" name="FechaE" value="<?php echo $show['FechaC'] ?>">
    <label>Hora de entrega</label><input type="text" name="HoraE" value="<?php echo $show['HoraE'] ?>">
    <label>Dirección de entrega</label><input type="text" name="DireccionE" value="<?php echo $show['DireccionE']?>">
    <label>Razón social</label><input type="text" name="RazonS" value="<?php echo $show['RazonS'] ?>">
    <label>Datos de contacto</label><input type="text" name="DatosC" value="<?php echo $show['DatosC'] ?>">
    <label>SO</label><input type="text" name="SO" value="<?php echo $show['SO'] ?>">
    <label>Factura</label><input type="text" name="Factura" value="<?php echo $show['Factura'] ?>">
    <label>Numero de piezas</label><input type="text" name="NumeroP" value="<?php echo $show['NumeroP']?>">
    <label>Numero de cajas</label><input type="text" name="NumeroC" value="<?php echo $show['NumeroC']?>">
    <label>Numero de Tarimas</label><input type="text" name="NumeroT" value="<?php echo $show['NumeroT']?>">
    <label>Tipo de transporte</label><input type="text" name="TipoT" value="<?php echo $show['TipoT']?>">
    <label>Placas</label><input type="text" name="Placas" value="<?php echo $show['Placas']?>">
    <label>Operador</label><input type="text" name="Operador" value="<?php echo $show['Operador']?>">
    <label>Maniobrista</label><input type="text" name="Maniobrista" value="<?php echo $show['Maniobrista']?>">
    <label>Custodia</label><input type="text" name="Custodia" value="<?php echo $show['Custodia']?>">
    <label>Hora de salida con custodia</label><input type="text" name="HoraSCC" value="<?php echo $show['HoraSCC']?>">
    <label>Observaciones</label><input type="text" name="Observaciones" value="<?php echo $show['Observaciones']?>">
    <input type="hidden" name="id" value="<?php echo $tem_id ?>">
    <input type="hidden" name="Zona" value="<?php echo $city ?>">
    <?php 
    }
    if($terminado === 0){
    ?>
    <input type="submit" value="Guardar">
    <?php 
    }else{
    ?>
    <?php 
    if($nivel > 5){
    ?>
    <input type="submit" value="Guardar">
    <?php }}?>
    <a href="../tables/?city=CDMX"><button type="button">Volver</button></a>  
    <h3 id="res"></h3>
</form>
<script src="editar.js"></script>
<script src="secureacces.js"></script>
</body>
</html>
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
    <link rel="stylesheet" href="../CSS/styleNC.css">
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
    <div class="info"><label>Fecha de carga</label><input type="date" name="FechaC" value="<?php echo $show['FechaC'] ?>"></div>
    <div class="info"><label>Hora de carga</label><input type="text" name="HoraC" value="<?php echo $show['HoraC'] ?>"></div>
    <div class="info"><label>Fecha de entrega</label><input type="date" name="FechaE" value="<?php echo $show['FechaC'] ?>"></div>
    <div class="info"><label>Hora de entrega</label><input type="text" name="HoraE" value="<?php echo $show['HoraE'] ?>"></div>
    <div class="info"><label>Dirección de entrega</label><input type="text" name="DireccionE" value="<?php echo $show['DireccionE']?>"></div>
    <div class="info"><label>Razón social</label><input type="text" name="RazonS" value="<?php echo $show['RazonS'] ?>"></div>
    <div class="info"><label>Datos de contacto</label><input type="text" name="DatosC" value="<?php echo $show['DatosC'] ?>"></div>
    <div class="info"><label>SO</label><br><input type="text" name="SO" value="<?php echo $show['SO'] ?>"></div>
    <div class="info"><label>Factura</label><br><input type="text" name="Factura" value="<?php echo $show['Factura'] ?>"></div>
    <div class="info"><label>Numero de piezas</label><input type="text" name="NumeroP" value="<?php echo $show['NumeroP']?>"></div>
    <div class="info"><label>Numero de cajas</label><input type="text" name="NumeroC" value="<?php echo $show['NumeroC']?>"></div>
    <div class="info"><label>Numero de Tarimas</label><input type="text" name="NumeroT" value="<?php echo $show['NumeroT']?>"></div>
    <div class="info"><label>Tipo de transporte</label><input type="text" name="TipoT" value="<?php echo $show['TipoT']?>"></div>
    <div class="info"><label>Placas</label><br><input type="text" name="Placas" value="<?php echo $show['Placas']?>"></div>
    <div class="info"><label>Operador</label><br><input type="text" name="Operador" value="<?php echo $show['Operador']?>"></div>
    <div class="info"><label>Maniobrista</label><input type="text" name="Maniobrista" value="<?php echo $show['Maniobrista']?>"></div>
    <div class="info"><label>Custodia</label><br><input type="text" name="Custodia" value="<?php echo $show['Custodia']?>"></div>
    <div class="info"><label>Hora de salida con custodia</label><input type="text" name="HoraSCC" value="<?php echo $show['HoraSCC']?>"></div>
    <div class="info"><label>Observaciones</label><input type="text" name="Observaciones" value="<?php echo $show['Observaciones']?>"></div>
    <div class="info"><input type="hidden" name="id" value="<?php echo $id ?>"></div>
    <div class="info"><input type="hidden" name="Zona" value="<?php echo $city ?>"></div>
    <?php 
    }
    if($terminado === 0){
    ?>
    <div class="info"><input type="submit" value="Guardar"></div>
    <?php 
    }else{
    ?>
    <?php 
    if($nivel > 5){
    ?>
    <div class="info"><input type="submit" value="Guardar"></div>
    <?php }}?>
    <div class="info"><button type="button" id="volver">Volver</button></div> 
    <h3 id="res"></h3>
</form>
<script src="editar.js"></script>
<script src="secureacces.js"></script>
</body>
</html>
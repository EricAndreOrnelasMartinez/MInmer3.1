<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$con = mysqli_connect('localhost','root','Lasric.2018','Minmer2');
$city = $_GET['city'];
$artibute = $_GET['atribute'];
$query = $_GET['query'];
$query2 = $_GET['query2'];
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$query.'.xls');
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=20>Planeación</th>'; 
echo '</tr>';
echo '<tr>
<th>Zona</th>
<th>Fecha de carga</th>
<th>Hora de carga</th>
<th>Fecha de entrega</th>
<th>Hora de entrega</th>
<th>Dirección de entrega</th>
<th>Razón Social</th>
<th>Datos de contacto</th>
<th>SO</th>
<th>Factura</th>
<th>Número de piezas</th>
<th>Número de cajas</th>
<th>Número de tarimas</th>
<th>Tipo de trasporte</th>
<th>Placas</th>
<th>Operador</th>
<th>Maniobrista</th>
<th>Custodia</th>
<th>Hora salida con Custodia</th>
<th>Observaciones</th>
</tr>';
if($artibute === 'FechaC' || $artibute === 'FechaE'){
    $sql = "SELECT * FROM  $city WHERE $artibute BETWEEN '$query' AND '$query2'";
    $resSQL = mysqli_query($con, $sql);
    while($show=mysqli_fetch_array($resSQL)){
        echo '<tr>'; 
        echo '<td>'.$show['Zona'].'</td>';
        echo '<td>'.$show['FechaC'].'</td>';
        echo '<td>'.$show['HoraC'].'</td>';
        echo '<td>'.$show['FechaE'].'</td>';
        echo '<td>'.$show['HoraE'].'</td>';
        echo '<td>'.$show['DireccionE'].'</td>';
        echo '<td>'.$show['RazonS'].'</td>';
        echo '<td>'.$show['DatosC'].'</td>';
        echo '<td>'.$show['SO'].'</td>';
        echo '<td>'.$show['Factura'].'</td>';
        echo '<td>'.$show['NumeroP'].'</td>';
        echo '<td>'.$show['NumeroC'].'</td>';
        echo '<td>'.$show['NumeroT'].'</td>';
        echo '<td>'.$show['TipoT'].'</td>';
        echo '<td>'.$show['Placas'].'</td>';
        echo '<td>'.$show['Operador'].'</td>';
        echo '<td>'.$show['Maniobrista'].'</td>';
        echo '<td>'.$show['Custodia'].'</td>';
        echo '<td>'.$show['HoraSCC'].'</td>';
        echo '<td>'.$show['Observaciones'].'</td>';
        echo '</tr>';
    }
}else{
    $sql = "SELECT * FROM $city WHERE $artibute='$query'";
    $ans = mysqli_query($con, $sql);
    while($show=mysqli_fetch_array($ans)){
        echo '<tr>'; 
        echo '<td>'.$show['Zona'].'</td>';
        echo '<td>'.$show['FechaC'].'</td>';
        echo '<td>'.$show['HoraC'].'</td>';
        echo '<td>'.$show['FechaE'].'</td>';
        echo '<td>'.$show['HoraE'].'</td>';
        echo '<td>'.$show['DireccionE'].'</td>';
        echo '<td>'.$show['RazonS'].'</td>';
        echo '<td>'.$show['DatosC'].'</td>';
        echo '<td>'.$show['SO'].'</td>';
        echo '<td>'.$show['Factura'].'</td>';
        echo '<td>'.$show['NumeroP'].'</td>';
        echo '<td>'.$show['NumeroC'].'</td>';
        echo '<td>'.$show['NumeroT'].'</td>';
        echo '<td>'.$show['TipoT'].'</td>';
        echo '<td>'.$show['Placas'].'</td>';
        echo '<td>'.$show['Operador'].'</td>';
        echo '<td>'.$show['Maniobrista'].'</td>';
        echo '<td>'.$show['Custodia'].'</td>';
        echo '<td>'.$show['HoraSCC'].'</td>';
        echo '<td>'.$show['Observaciones'].'</td>';
        echo '</tr>';
    }
}

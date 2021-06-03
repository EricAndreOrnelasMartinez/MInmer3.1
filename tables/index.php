<?php 
$city = $_GET['city'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $city ?></title>
</head>
<body>
<header>
    <nav class="menu">
        <ul id="menu">
            <?php
            session_start();
            $aux = $_SESSION['nivel'];
            $rowN = $_SESSION['rowN'];
            if($aux >= 5){
                ?>
                <li><a href="../Perfil">Perfil</a></li>
                <li><a href="./?city=CDMX">CDMX</a></li>
                <li><a href="./?city=GDL">GDL</a></li>
                <li><a href="./?city=MTY">MTY</a></li>
                <li><a href="./?city=CUN">CUN</a></li>
                <li><a href="./?city=SJD">SJD</a></li>
                <li><a href="./?city=QRO">QRO</a></li>
                <li><a href="../Modificaciones/">Modificaciones</a></li>
                <li><a href="../Buscar/">Buscar</a></li>
                <li><a href="../Newuser/">Nuevo usuario</a></li>
                <li><a href="../logout.php">Log out</a></li>
                <?php
            }else if($aux <= 5 && $aux >= 3){
                ?>
                <li><a href="../Perfil">Perfil</a></li>
                <li><a href="./?city=CDMX">CDMX</a></li>
                <li><a href="./?city=GDL">GDL</a></li>
                <li><a href="./?city=MTY">MTY</a></li>
                <li><a href="./?city=CUN">CUN</a></li>
                <li><a href="./?city=SJD">SJD</a></li>
                <li><a href="./?city=QRO">QRO</a></li>
                <li><a href="../Buscar/">Buscar</a></li>
                <li><a href="../logout.php">Log out</a></li>
                <?php
            }else{
                header("Location:../Buscar/");
            }
            ?>
        </ul>
    </nav>
    </header>
    <section>
        <table class="main">
            <thead>
                <tr>
                    <td>Progreso</td>
                    <td>Zona</td>
                    <td>Fecha de carga</td>
                    <td>Hora de carga</td>
                    <td>Fecha de entrega</td>
                    <td>Hora de entrega</td>
                    <td>Dirección de entrega</td>
                    <td>Razón Social</td>
                    <td>Datos de contacto</td>
                    <td>SO</td>
                    <td>Factura</td>
                    <td>Número de piezas</td>
                    <td>Número de cajas</td>
                    <td>Número de tarimas</td>
                    <td>Tipo de trasporte</td>
                    <td>Placas</td>
                    <td>Operador</td>
                    <td>Maniobrista</td>
                    <td>Custodia</td>
                    <td>Hora salida con Custodia</td>
                    <td>Observaciones</td>
                    <td>Evidencia</td>
                    <td>Terminado</td>
                    <?php 
                    $aux = $_SESSION['nivel'];
                    if($aux > 3){
                        ?>
                        <td><a href="../Nuevo/"><button type="button">Nuevo</button></a></td>
                        <td><a href="./Evidencias/?city=<?php echo $city ?>">Subir Evidencia</a></td>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <?php
        function validation($var){
            return !empty($var);
        }
        $sql = "SELECT * FROM $city ORDER BY ID_SQL DESC LIMIT $rowN";
        $ans = mysqli_query($con,$sql);
        while($show = mysqli_fetch_array($ans)){
            $total = 0;
            if(validation($show['ID_SQL'])){
                $total = $total + 4.5;
            }
            if(validation($show['Zona'])){
                $total = $total + 4.5;
            }
            if(validation($show['FechaC'])){
                $total = $total + 4.5;
            }
            if(validation($show['HoraC'])){
                $total = $total + 4.5;
            }
            if(validation($show['FechaE'])){
                $total = $total + 4.5;
            }
            if(validation($show['HoraE'])){
                $total = $total + 4.5;
            }
            if(validation($show['DireccionE'])){
                $total = $total + 4.5;
            }
            if(validation($show['RazonS'])){
                $total = $total + 4.5;
            }
            if(validation($show['DatosC'])){
                $total = $total + 4.5;
            }
            if(validation($show['SO'])){
                $total = $total + 4.5;
            }
            if(validation($show['Factura'])){
                $total = $total + 4.5;
            }
            if(validation($show['NumeroP'])){
                $total = $total + 4.5;
            }
            if(validation($show['NumeroC'])){
                $total = $total + 4.5;
            }
            if(validation($show['NumeroT'])){
                $total = $total + 4.5;
            }
            if(validation($show['TipoT'])){
                $total = $total + 4.5;
            }
            if(validation($show['Placas'])){
                $total = $total + 4.5;
            }
            if(validation($show['Operador'])){
                $total = $total + 4.5;
            }
            if(validation($show['Maniobrista'])){
                $total = $total + 4.5;
            }
            if(validation($show['Custodia'])){
                $total = $total + 4.5;
            }
            if(validation($show['HoraSCC'])){
                $total = $total + 4.5;
            }
            if(validation($show['Observaciones'])){
                $total = $total + 4.5;
            }
            if($show['Terminado'] === 1){
                $total = $total + 5.5;
            }
            $color = "red";
            if ( $total < 80 ){
                $color = "red";
            } elseif ($total < 99){
                $color = "yellow";
            } elseif ($total === 100){
                $color = "green";
            }
        ?>
    <tr class="<?php echo $color ?>">
            <td><?php echo $total ?>%</td>
            <td><?php echo $show['Zona'] ?></td>
            <td><?php echo $show['FechaC'] ?></td>
            <td><?php echo $show['HoraC'] ?></td>
            <td><?php echo $show['FechaE'] ?></td>
            <td><?php echo $show['HoraE'] ?></td>
            <td><?php echo $show['DireccionE'] ?></td>
            <td><?php echo $show['RazonS'] ?></td>
            <td><?php echo $show['DatosC'] ?></td>
            <td><?php echo $show['SO'] ?></td>
            <td><?php echo $show['Factura'] ?></td>
            <td><?php echo $show['NumeroP'] ?></td>
            <td><?php echo $show['NumeroC'] ?></td>
            <td><?php echo $show['NumeroT'] ?></td>
            <td><?php echo $show['TipoT'] ?></td>
            <td><?php echo $show['Placas'] ?></td>
            <td><?php echo $show['Operador'] ?></td>
            <td><?php echo $show['Maniobrista'] ?></td>
            <td><?php echo $show['Custodia'] ?></td>
            <td><?php echo $show['HoraSCC'] ?></td>
            <td><?php echo $show['Observaciones'] ?></td>
            <td>Evidencia</td>
            <td><?php echo $show['Terminado'] ?></td>
            <?php
            $aux = $_SESSION['nivel'];
            if($aux >= 3){ 
            ?>
             <td><a href="../Editar/?ids=<?php echo $show['ID_SQL']; ?>&city=<?php echo $city ?>"><button type="button" class="btn btn-succes">Modificar</button></a></td>
             <td><button type="button" onclick="deleteP(<?php echo $show['ID_SQL'] ?>)">Eliminar</button> <form id="<?php echo $show['ID_SQL'] ?>">
             <input type="hidden" name="id" value="<?php echo $show['ID_SQL']?>">
             <input type="hidden" name="city" value="<?php echo $city ?>">
             </form> </td>
             <td><button type="button" onclick="finishP('<?php echo $show['ID_SQL'] ?>T')">Terminar</button><form id="<?php  echo $show['ID_SQL']?>T">
             <input type="hidden" name="id" value="<?php echo $show['ID_SQL']?>">
             <input type="hidden" name="city" value="<?php echo $city ?>">
             <input type="hidden" name="total" value="<?php echo $total?>">
             </form></td>
            <?php
            }else{
                continue;
            }
            ?>  
    </tr>
        <?php }?>
        </table>
    </section>
</body>
<script src="tables.js"></script>
</html>
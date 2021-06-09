<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cssforcitis.css">
    <title>Modificaciones</title>
    <?php  
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    session_start();
    $rowN = $_SESSION['rowN'];
    $con = mysqli_connect("localhost","root","Lasric.2018","Minmer2"); ?>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Email</td>
                <td>Hora</td>
                <td>Fecha</td>
                <td>Ciudad</td>
                <td>ID de Operación</td>
                <td>Acción</td>
            </tr>
        </thead>
        <?php 
            $sql = "SELECT * FROM Modifications ORDER BY Day DESC LIMIT $rowN";
            $ans = mysqli_query($con,$sql);
            while($show = mysqli_fetch_array($ans)){
            ?>
        <tr>
            <td><?php echo $show['Mail']; ?></td>
            <td><?php echo $show['Hour']; ?></td>
            <td><?php echo $show['Day']; ?></td>
            <td><?php echo $show['City']; ?></td>
            <td><?php echo $show['RowN']; ?></td>
            <td><?php echo $show['Description']; ?></td>
        </tr>
        <?php } ?>
        <a href="../tables/?city=CDMX"><button type="button">Volver</button></a>
    </table>
</body>
<script src="secureacces.js"></script>
</html>
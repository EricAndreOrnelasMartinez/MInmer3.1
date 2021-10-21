<?php
require('../fpdf.php');
$city = $_GET['city'];
$artibute = $_GET['atribute'];
$query = $_GET['query'];
$query2 = $_GET['query2'];
$con = mysqli_connect('localhost','root','Lasric.2018','Minmer2');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->setXY(6,130);
if($artibute === 'FechaC' || $artibute === 'FechaE'){
    $sql = "SELECT * FROM  $city WHERE $artibute BETWEEN '$query' AND '$query2'";
    $resSQL = mysqli_query($con, $sql);
    while($show=mysqli_fetch_array($resSQL)){
        $pdf->Cell(90,10,utf8_decode($show['Zona']), 0, 1, 'R', 0);
        $pdf->Cell(90,10,'Fecha de entrega: '.utf8_decode($show['FechaE']), 0, 1, 'C', 0);
        $pdf->Cell(90,10,'Hora de entrega: '.utf8_decode($show['HoraE']), 0, 1, 'C', 0);
        $pdf->MultiCell(90,10, utf8_decode('Dirección de entrega: ').utf8_decode($show['DireccionE']), 0, 'C');
        $pdf->MultiCell(90,10, utf8_decode('Datos de contacto: ').utf8_decode($show['DatosC']), 0, 'C');
        $pdf->Cell(90,10, utf8_decode('Razón social: ').utf8_decode($show['RazonS']), 0, 1, 'C', 0);
        $pdf->Cell(90,10, utf8_decode('Factura: ').utf8_decode($show['Factura']), 0, 1, 'C', 0);
        $pdf->MultiCell(90,10, utf8_decode('Observaciones: ').utf8_decode($show['Observaciones']), 0, 'C');
    }
}else{
    $sql = "SELECT * FROM $city WHERE $artibute='$query'";
    $ans = mysqli_query($con, $sql);
    while($show=mysqli_fetch_array($ans)){
        $pdf->Cell(90,10,utf8_decode($show['Zona']), 0, 1, 'C', 0);
        $pdf->Cell(90,10,'Fecha de entrega: '.utf8_decode($show['FechaE']), 0, 1, 'C', 0);
        $pdf->Cell(90,10,'Hora de entrega: '.utf8_decode($show['HoraE']), 0, 1, 'C', 0);
        $pdf->MultiCell(90,10, utf8_decode('Dirección de entrega: ').utf8_decode($show['DireccionE']), 0, 'C');
        $pdf->MultiCell(90,10, utf8_decode('Datos de contacto: ').utf8_decode($show['DatosC']), 0, 'C');
        $pdf->Cell(90,10, utf8_decode('Razón social: ').utf8_decode($show['RazonS']), 0, 1, 'C', 0);
        $pdf->Cell(90,10, utf8_decode('Factura: ').utf8_decode($show['Factura']), 0, 1, 'C', 0);
        $pdf->MultiCell(90,10, utf8_decode('Observaciones: ').utf8_decode($show['Observaciones']), 0,'C');
    }
}
$pdf->Output();
?>
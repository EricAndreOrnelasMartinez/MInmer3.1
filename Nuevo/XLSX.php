<?php 
require_once 'Classes/PHPExcel.php';
$file = '/home/andre/PLANEACION 2021 MINMER.xlsx';

function readAndC($file){
$inputFileType = PHPExcel_IOFactory::identify($file);
$obReader = PHPExcel_IOFactory::createReader($inputFileType);
$obPHPE = $obReader->load($file);
$sheet = $obPHPE->getSheet(0);
$highesRow = $sheet->getHighestRow();
for($row = 2; $row <= $highesRow; $row++){
    echo "".$sheet->getCell("A".$row)->getValue();
    echo "<br>";
}
}
?>
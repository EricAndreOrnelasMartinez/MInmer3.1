<?php 
require_once 'Classes/PHPExcel.php';
function hasAA($string){
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
function hasWeird($string){
    $prove = false;
    $arr = explode("",$string);
    foreach($arr as $indexL){
        if($indexL === "*"){
            $prove = true;
            break;
        }
    }
}
function newString($string){
    $news = "";
    $arr = str_split($string);
    $size = sizeof($arr);
    for($i = 1; $i <= $size; $i++){
        if($arr[$i] != "*"){
            $news = $news.$arr[$i];
            return $news;
        }
    }
    }
function readAndC($fileI, $moth, $year){
$wasuploaded = true;
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
$sqlgetrow = "SELECT fRow FROM fileuploaded WHERE Moth='$moth' AND Year='$year'";
$resrow = mysqli_query($con, $sqlgetrow);
$resultrow = mysqli_fetch_assoc($resrow);
if(empty($resultrow)){
    $wasuploaded = false;
    $resultrow = 2;
}
$file = __DIR__."/uploads/".$fileI;
$inputFileType = PHPExcel_IOFactory::identify($file);
$obReader = PHPExcel_IOFactory::createReader($inputFileType);
$rowsR = 0;
$obPHPE = $obReader->load($file);
$sheet = $obPHPE->getSheet(0);
$highesRow = $sheet->getHighestRow();
for($row = $resultrow; $row <= $highesRow; $row++){
    $HoraE = "ERROR:500";
    $FechaCB =  $sheet->getCell("A".$row)->getCalculatedValue();
    $FechaC = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($FechaCB));
    $FechaEB = $sheet->getCell("B".$row)->getCalculatedValue();
    $FechaE = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($FechaEB));
    $ZonaB = $sheet->getCell("C".$row)->getCalculatedValue();
    $Zona = str_replace("*","",$ZonaB);
    $DireccionE = $sheet->getCell("D".$row)->getCalculatedValue();
    $RazonS = $sheet->getCell("E".$row)->getCalculatedValue();
    $HoraEB = $sheet->getCell("F".$row)->getCalculatedValue();
    if(!empty($HoraEB)){
        if(!hasAA($HoraEB)){
            $HoraE = $HoraEB * 24;
            $HoraE = $HoraE.":00";
        }else{
            $HoraE = $HoraEB;
        }
    }else{
        $HoraE = 'PENDIENTE';
    }
    $SO = $sheet->getCell("G".$row)->getCalculatedValue();
    $Factura = $sheet->getCell("H".$row)->getCalculatedValue();
    $NumeroP = $sheet->getCell("I".$row)->getCalculatedValue();
    $NumeroC = $sheet->getCell("J".$row)->getCalculatedValue();
    $TipoT = $sheet->getCell("K".$row)->getCalculatedValue();
    $Operador = $sheet->getCell("M".$row)->getCalculatedValue();
    $Placas = $sheet->getCell("N".$row)->getCalculatedValue();
    $sql = "INSERT INTO $Zona(Zona,FechaC,HoraC,FechaE,HoraE,DireccionE,RazonS,DatosC,SO,Factura,NumeroP,NumeroC,NumeroT,TipoT,Placas,Operador,Maniobrista,Custodia,HoraSCC,Observaciones,Terminado,Pension) VALUE('$Zona','$FechaC','','$FechaE','$HoraE','$DireccionE','','','$SO','$Factura','$NumeroP','$NumeroC','','$TipoT','$Placas','$Operador','','','','',0,'')";
    $res = mysqli_query($con,$sql);
    if($res){
        $rowsR = $row;
        echo "Completado"."<br>";
    }else{
        echo "Error 500, }"."<br>";
    }
    echo mysqli_error($con);
}
if($wasuploaded){
    $resultrowT = mysqli_fetch_assoc($resrow); 
    $suma = $resultrowT + $rowsR;
    $sqlupdate = "UPDATE fileuploaded SET fRow=$suma WHERE Moth='$moth' AND Year='$year'";
    $queryfileupdate = mysqli_query($con, $sqlupdate);  
}else{
    $sqlnewfile = "INSERT INTO fileuploaded(Moth,Year,fRow) VALUES('$moth','$year',$rowsR)"; 
    $queryfile = mysqli_query($con, $sqlnewfile);
}
}
?>
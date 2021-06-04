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
function readAndC($fileI){
$file = __DIR__."/uploads/".$fileI;
$inputFileType = PHPExcel_IOFactory::identify($file);
$obReader = PHPExcel_IOFactory::createReader($inputFileType);
$obPHPE = $obReader->load($file);
$sheet = $obPHPE->getSheet(0);
$highesRow = $sheet->getHighestRow();
$con = mysqli_connect("localhost","root","Lasric.2018","Minmer2");
for($row = 2; $row <= $highesRow; $row++){
    $HoraE = "ERROR:500";
    $FechaCB =  $sheet->getCell("A".$row)->getCalculatedValue();
    $FechaC = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($FechaCB));
    $FechaEB = $sheet->getCell("B".$row)->getCalculatedValue();
    $FechaE = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($FechaEB));
    $ZonaB = $sheet->getCell("C".$row)->getCalculatedValue();
    $Zona = newString($ZonaB);
    echo $Zona;
    $DireccionE = $sheet->getCell("D".$row)->getCalculatedValue();
    $RazonS = $sheet->getCell("E".$row)->getCalculatedValue();
    $HoraEB = $sheet->getCell("F".$row)->getCalculatedValue();
    if(gettype($HoraEB) != NULL){
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
    $sql = "INSERT INTO $Zona(Zona,FechaC,HoraC,FechaE,HoraE,DireccionE,RazonS,DatosC,SO,Factura,NumeroP,NumeroC,NumeroT,TipoT,Placas,Operador,Maniobrista,Custodia,HoraSCC,Observaciones,Terminado) VALUE('$Zona',$FechaC,'',$FechaE,'$HoraE','$DireccionE','','','$SO','$Factura','$NumeroP','$NumeroC','','$TipoT','$Placas','$Operador','','','','',0)";
    echo $sql."<br>";
    //$res = mysqli_query($con,$sql);
    //if($res){
        //echo "Completado"."<br>";
    //}else{
        //echo "Error 500, tonto"."<br>";
    //}
    //echo mysqli_error($con);
}
}
?>
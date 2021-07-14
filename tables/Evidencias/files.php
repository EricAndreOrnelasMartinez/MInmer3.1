<?php 
echo "todo bien";
$city = $_GET['city'];
if(isset($_FILES['archivo']['tmp_name'])){
    for($_FILES['archivo']['tmp_name'] as $key => $tmp_name){
        if($_FILES['archivo']['tmp_name'][$key]){
            $source = $_FILES['myfile']['tmp_name'];
            $destination = __DIR__.'/'.$city.'/'.$_FILES['myfile']['name'];
            if(move_uploaded_file($source, $destination)){
                echo "Los archivos fueron subidos con exito!";
            }else{
                echo "hubo un error al subir los archivos";
            }
        }
    }

}
  
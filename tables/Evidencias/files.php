<?php 
echo "todo bien";
$city = $_GET['city'];
    foreach($_FILES['archivo']['tmp_name'] as $key => $tmp_name){
        if($_FILES['archivo']['tmp_name'][$key]){
            $source = $_FILES['archivo']['tmp_name'][$key];
            $destination = __DIR__.'/'.$city.'/'.$_FILES['archivo']['name'][$key];
            if(move_uploaded_file($source, $destination)){
                echo "Los archivos fueron subidos con exito!";
            }else{
                echo "hubo un error al subir los archivos";
            }
        }
    }

  
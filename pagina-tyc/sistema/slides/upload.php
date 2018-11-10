<?php

    if(!empty($_FILES)){
    
        require '../ImageResizeGD.php';

        $ruta="../../img/slides";
        if (is_dir($ruta)){
            $gestor = opendir($ruta);
            while (($archivo = readdir($gestor)) !== false)  {
                if ($archivo != "." && $archivo != ".."){
                    $array = explode(".", $archivo);
                    $number = explode("_",$array[0]);
                    $numbers[] = $number[1];
                }
            }
            closedir($gestor);
        }

        natsort($numbers);
        $imagenes = array_reverse($numbers);
        $total_img = $imagenes[0];
        //numero actual de imagen
        $total_img++;
        //Obtenemos la extension de la imagen subida
        $array = explode(".", $_FILES['p_imagen']['name']);
        $ext = end($array);
        //Guardado de imagen en el servidor
        $directorio = '../../img/slides/';
        $subir_archivo = $directorio.'temporalin.'.$ext;
        move_uploaded_file($_FILES['p_imagen']['tmp_name'],$subir_archivo);

        $image = new ImageResizeGD($subir_archivo);
        $image->resizeByWidth(847);
        $compress = $image->saveImageFile($directorio.'img_'.$total_img, IMAGETYPE_JPEG, 70, '000000');
        unlink($subir_archivo);
    }

    header("Location: ../transition",TRUE,303);
?>
<?php

    if(!empty($_FILES)){
        $ruta="./file/";
        $ruta_final="./pdf_actual/";
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
        $pdfs = array_reverse($numbers);
        $total_pdfs = $pdfs[0];
        //numero actual de imagen
        $total_pdfs++;
        //Obtenemos la extension de la imagen subida
        $array = explode(".", $_FILES['p_pdf']['name']);
        $ext= "pdf";
        // $ext = end($array);
        //Guardado de imagen en el servidor
        $subir_archivo = $ruta."pdf_".$total_pdfs.".".$ext;
        $actual = $ruta."pdf_0.".$ext;
        $actual_final = $ruta_final."parodi-preview.".$ext;
        move_uploaded_file($_FILES['p_pdf']['tmp_name'],$subir_archivo);
        copy($subir_archivo,$actual_final);
        // move_uploaded_file($_FILES['p_pdf']['tmp_name'],$actual);
        // $image = new ImageResizeGD($subir_archivo);
        // $image->resizeByWidth(847);
        // $compress = $image->saveImageFile($ruta.'img_'.$total_pdfs, IMAGETYPE_JPEG, 70, '000000');
        // unlink($subir_archivo);
    }

    header("Location: ./",TRUE,303);
?>
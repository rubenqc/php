<?php
    $ruta="./file/";
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
    $ultimo = $pdfs[0];
    $penultimo = $pdfs[1];

    $actual = $ruta."pdf_".$ultimo.".pdf";
    $reasignado = $ruta."pdf_".$penultimo.".pdf";
    $temporal = "pdf_temporal.pdf";

    if (!copy($actual, $temporal)) {
        echo "Error al copiar temporal $fichero...\n";
    }
    if (!copy($reasignado, $actual)) {
        echo "Error al copiar reasignado $fichero...\n";
    }
    if (!copy($temporal, $reasignado)) {
        echo "Error al copiar reasignado $fichero...\n";
    }
    copy($actual,"./pdf_actual/parodi-preview.pdf");
    unlink($temporal);
    header("Location: ./",TRUE,303);
?>

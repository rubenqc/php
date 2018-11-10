<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    function obtener_estructura_directorios($ruta){
        // Se comprueba que realmente sea la ruta de un directorio
        if (is_dir($ruta)){
            // Abre un gestor de directorios para la ruta indicada
            $gestor = opendir($ruta);
            echo "<ul>";
    
            // Recorre todos los elementos del directorio
            while (($archivo = readdir($gestor)) !== false)  {
                    
                $ruta_completa = $ruta . "/" . $archivo;
    
                // Se muestran todos los archivos y carpetas excepto "." y ".."
                if ($archivo != "." && $archivo != "..") {
                    // Si es un directorio se recorre recursivamente
                    if (is_dir($ruta_completa)) {
                        echo "<li>" . $archivo . "</li>";
                        obtener_estructura_directorios($ruta_completa);
                    } else {
                        echo "<li>" . $archivo . "</li>";
                    }
                }
            }
            
            // Cierra el gestor de directorios
            closedir($gestor);
            echo "</ul>";
        } else {
            echo "No es una ruta de directorio valida<br/>";
        }
    }
    function mostrar_imagenes($ruta){
        // Se comprueba que realmente sea la ruta de un directorio
        if (is_dir($ruta)){
            // Abre un gestor de directorios para la ruta indicada
            $gestor = opendir($ruta);
    
            // Recorre todos los archivos del directorio
            while (($archivo = readdir($gestor)) !== false)  {
                // Solo buscamos archivos sin entrar en subdirectorios
                if (is_file($ruta."/".$archivo)) {
                    echo "<img src='".$ruta."/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";
                }            
            }
    
            // Cierra el gestor de directorios
            closedir($gestor);
        } else {
            echo "No es una ruta de directorio valida<br/>";
        }
    }
    mostrar_imagenes("img/");
?>
</body>
</html>


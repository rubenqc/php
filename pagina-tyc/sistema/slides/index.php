<?php
    function elem_img($ruta){
        if (is_dir($ruta)){
            $gestor = opendir($ruta);
            while (($archivo = readdir($gestor)) !== false)  {
                if(is_file($ruta."/".$archivo))
                    $files[] = $archivo;
            }
            echo "<div class= 'row justify-content-md-center no-gutters'>";
            //Ordenar los elementos de un array por nombres teniendo en cuenta los numeros.
            natsort($files);

            foreach ($files as $i=>$archivo)  {
                if (is_file($ruta."/".$archivo)) {
                    $nombre = explode(".",$archivo,2);
                    echo "
                    <div class='col-lg-4 col-sm-6'>
                    	<input type='checkbox' class='my-auto mr-3 col existe' name='".$nombre[0]."' value='".$archivo."' >
                        <div class='text-center'> 
                            <img class='mt-sm-3 img-fluid' src='".$ruta."/".$archivo."'>
                        </div>
                        <h6 class='text-center mt-2'>Slide ".($i+1)."</h6>
                    </div>
                    ";
                }
            }
            echo "</div>";
            closedir($gestor);
        } else {
            echo "No es una ruta de directorio valida<br/>";
        }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador de Slides</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{background-color: #4c839e;}
        img{max-width: 200px !important;}
    </style>
<body>
    <br>
    <div class="container m-auto text-center" style="background-color:white; border-radius:10px;">
        <br>
        <h1>Administrador de Slides</h1>
        <hr>
        <div>
            <form class="form-inline d-block" method="POST" enctype="multipart/form-data" action="upload.php">
                <label for="p_imagen" class="d-inline">Agregar Slide: </label>
                <input type="file" accept="image/*" name="p_imagen" id="p_imagen" class="btn" required>
                <input type="submit" class="btn btn-primary" value="Subir">
                <input type="hidden" name="ancho" id="ancho">
                <input type="submit" class="btn btn-danger" value="Eliminar" form="filas" id="elimina">
            </form>
            <br>
            <ul class="d-inline-block text-left">
                <li><small><i>La proporciones de la imagen deben estar entre de 3/4 y 5/7 (ancho/alto)</i></small></li>
                <li><small><i>Tamaño máximo de imagen 4.5 MB</i></small></li>
				<li><small><i>Dimensiones mínimas 630 x 830 px</i></small></li>
			</ul>
            <br><br>
            <h3>Slides Actuales</h3>
            <form action="delete.php" id="filas" method="POST">
                <?php
                    elem_img("../../img/slides");
                ?>
            </form>
        </div>
        <br>
        <br>
    </div>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function(){

        	var _URL = window.URL || window.webkitURL;

            if($(".existe").length == 1){
                $("#elimina").hide();
                $(".existe").hide();
            }

            $("#elimina").get(0).setCustomValidity("Seleccione almenos una casilla de imagenes para eliminar");

            $(".existe").change(function(){
                $(this).toggleClass("borrar");

                if($(this).hasClass("borrar")){
                    $("#elimina").get(0).setCustomValidity("");
                }
                else{
                    $("#elimina").get(0).setCustomValidity("Seleccione almenos una casilla de imagenes para eliminar"); 
                }
            });

            $("#p_imagen").change(function(e) {

				var image, file;

			    if ((file = this.files[0])) {
			        image = new Image();

			        var tam = file.size;

			        image.onload = function() {

			        	if(this.width>=630 && this.height>=830 && this.width/this.height<0.76 && this.width/this.height>0.7 && tam<=4718592){
			        		$("#ancho").val(this.width);
			        	}
			        	else{
			        		$("form").get(0).reset();
			        		alert("Ha seleccionado una imagen no válida, asegúrese de que cumpla con las especificaciones");
			        	}   
			        };
			        image.src = _URL.createObjectURL(file);
			    }
			});
            
        });
    </script>
</body>
</html>
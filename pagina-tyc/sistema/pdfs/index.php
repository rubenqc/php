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
     $penultimo = $pdfs[1];
     $ultimo = $pdfs[0];

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
    </style>
<body>
    <br>
    <div class="container m-auto text-center" style="background-color:white; border-radius:10px;">
        <br>
        <h1>Administrador de PDFs</h1>
        <hr>
        <div>
            <form class="form-inline d-block" method="POST" enctype="multipart/form-data" action="upload.php">
                <label for="p_pdf" class="d-inline">Agregar PDF: </label>
                <input type="file" accept="application/pdf" name="p_pdf" id="p_pdf" class="btn" required>
                <input type="submit" class="btn btn-success" value="Cambiar">
                <input type="hidden" name="ancho" id="ancho">
                <div class="upload-btn-wrapper">
				</div>
            </form>
            <br>
        </div>
        
		<div class="row">
			<div class="col-6 offset-2">
                <p style="margin-left:25%;">PDF Actual</p>  
                <?php
                    echo "<iframe src='http://docs.google.com/gview?url=http://grupotyc.com/conoce-iqparodi/k6f96ripvh73/pdfs/file/pdf_".$ultimo.".pdf&embedded=true' style='width:700px; height:300px;' frameborder='0'> </iframe>"
                ?>
            </div>
        </div>
        <br>
        <div class="row">
			<div class="col-6 offset-2">
                <div>
                    <p style="margin-left:25%;">
                    PDF Anterior:&nbsp;
                    <a href="./reasignar.php" class="btn btn-success btn-sm" id="reasign"><span class="icon-retweet"></span>Reasignar</a>
                <?php
                    echo "<a href='http://grupotyc.com/conoce-iqparodi/k6f96ripvh73/pdfs/file/pdf_".$ultimo.".pdf' download class='btn btn-info btn-sm'><span class='icon-download'></span> Descargar</a>";
                ?>
                    </p>
                </div>
                <?php
                    echo "<iframe src='http://docs.google.com/gview?url=http://grupotyc.com/conoce-iqparodi/k6f96ripvh73/pdfs/file/pdf_".$penultimo.".pdf&embedded=true' style='width:700px; height:300px;' frameborder='0'> </iframe>"
                ?>
            </div>
		</div>
        <br>
    </div>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function(){

        });
    </script>
</body>
</html>
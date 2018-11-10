<?php

$url = preg_replace("(^https?://w?w?w?\.?)", "", getenv("HTTP_REFERER"));

if($url == 'grupotyc.com/conoce-iqparodi/gracias.php' || $url='grupotyc.com/conoce-iqparodi/registrado.php'){

	header("Content-type:application/pdf");
	// It will be called downloaded.pdf
	header("Content-Disposition:attachment;filename='parodi-preview.pdf'");
	// The PDF source is in original.pdf
	readfile("./k6f96ripvh73/pdfs/pdf_actual/parodi-preview.pdf");

}
else{
	header("Location: /conoce-iqparodi",TRUE,303);
}

?>
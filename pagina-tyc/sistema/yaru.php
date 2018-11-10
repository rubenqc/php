<?php 

	require 'ImageResizeGD.php';

	$image = new ImageResizeGD('../img/bg/bgfull.jpg');

	$image->resizeByWidth(1600);

	$compress = $image->saveImageFile('../img/bg/bg', IMAGETYPE_JPEG, 65, '000000');

	unlink('../img/bg/bgfull.jpg');

?>
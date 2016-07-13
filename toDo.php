<!DOCTYPE html>
 
<html lang="es">
 
<head>
	<meta charset="utf-8" />

	<!-- TITULO -->
	<title>Face Jumper</title>
	<link rel="shortcut icon" href="assets/media/icons/tab_icon.png">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- JAVASCRIPT -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 	<script src="assets/js/bootstrap.min.js"></script>


</head>

<body>

	<?php 
        include_once("header.php");
    ?>


    <div class="toDO text-center">

		<?php

			echo nl2br("- No se pueden registrar varios users de forma seguida (hay que loguearse y luego salirse). "."\n");
			echo nl2br("- Tampoco se puede loguear con un usuario distinto del que se registro. Y si se loguea no funciona correctamente."."\n");
			echo nl2br("x Las LEADERBOARDS funcionan mal. Por cada cambio de profile Pic, se añade de nuevo a la tabla, en vez de actualizarse.       [CORREGIDO]"."\n");
			echo nl2br("- Hacer otro update procedure para que al cambiar la imagen de perfil no se actualicen las LEADERBOARDS. "."\n");
			echo nl2br("x Las LEADERBOARDS no se ordenan en la web, pero si en la DB.       [CORREGIDO] "."\n");
			echo nl2br("- Cambiar el ancho de la columna RANK en las LEADERBOARDS, ponerlo mas pequeno. "."\n");
			echo nl2br(" "."\n");
		?>
	</div>	

</boddy>

</head>

</html>





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
			echo nl2br("x Hacer otro update procedure para que al cambiar la imagen de perfil no se actualicen las LEADERBOARDS.       [CORREGIDO] "."\n");
			echo nl2br("x Las LEADERBOARDS no se ordenan en la web, pero si en la DB.       [CORREGIDO] "."\n");
			echo nl2br("- Cambiar el ancho de la columna RANK en las LEADERBOARDS, ponerlo mas pequeno. "."\n");
			echo nl2br("- Cambiar Account por userName en la web. "."\n");
			echo nl2br("- Controlar a que sitios se puede acceder sin haber pasado por otros antes. "."\n");
			echo nl2br("- Hacer que haya que pasar por el index antes de las LEADERBOARDS. "."\n");
			echo nl2br("x El ranking no cambia con la paginacion. Hacer que no sobren filas.       [CORREGIDO] "."\n");
			echo nl2br("- Hacer todas las comprobaciones de los formularios con JS. "."\n");
			echo nl2br("x Cambiar la encriptacion de las contrasenas por una propia (no md5). Usar HASH.       [CORREGIDO] "."\n");
			echo nl2br("x Poner boton para cambiar la contrasena.       [CORREGIDO] "."\n");
			echo nl2br("- Comprobar que en todas las pags se cierra y abre sesion. "."\n");
			echo nl2br("- Mostrar bien los errores. "."\n");
			echo nl2br("- En el registro no se comprueba que las contrasenas coincidan. "."\n");
			echo nl2br("- Poner un mensaje cuando SESSION['modifiedPassword'] es igual a 1. "."\n");
			echo nl2br(" "."\n");
		?>
	</div>	


	<div class="text-center top-buffer top-buffer">
		<h2> PRUEBAS </h2>
		<div class="top-buffer">

			<h4></h4>
			<?php 
				
				

	

			?>	

		</div>	
		<div class="top-buffer"></div>
	</div>



</boddy>

</head>

</html>





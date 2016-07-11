<?php 
	session_start();
	
	$error = $_SESSION["errors"];
	unset($_SESSION["errors"]);
		
?>


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


    <?php
    	foreach($error as $key => $value){
  			nl2br($key." has the value ". $value ."\n");
		}
	?>

</body>

</html>

<?php
	echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

 ?>  
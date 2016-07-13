<?php
	session_start();
	require_once("gestionBD.php");
	require_once("functions.php");

	if(isset($_SESSION["registerForm"])){
		$registerForm=$_SESSION["registerForm"];
		unset($_SESSION["registerForm"]);
		unset($_SESSION["errors"]);
		unset($_SESSION["user"]);
	}else{
		Header("Location:registro.php");

	}

	$connection=createConnectionDB();

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

    <div class="container text-center">

    	<?php 
    		$registerAccount = $registerForm["registerAccount"];
			$registerPassword = $registerForm["registerPassword"];
			$encryptedPassword = md5($registerPassword);
    		$newUser = newUser($registerAccount, $encryptedPassword);
    	?>
    	<h2>Successfully registered. Press <a href="index.php">here</a> to log in.</h2>
    </div>


  <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    ?> 



</body>
</html>    


<?php    
    closeConnectionBD($connection);

?>	
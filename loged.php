<?php
	session_start();
	require_once("gestionBD.php");  

	if(isset($_SESSION["loginForm"])){
		$connection = createConnectionDB();
		$loginForm = $_SESSION["loginForm"];

		$_SESSION["user"]["userAcc"] = $loginForm["loginAccount"];
		$_SESSION["user"]["userPass"] = $loginForm["loginPassword"];

		$userQuery = mysql_query("SELECT * FROM USERS WHERE user_account ='" . $_SESSION["user"]["userAcc"] = $loginForm["loginAccount"] . "'");
		$userData = mysql_fetch_assoc($userQuery);

		$_SESSION["user"]["userID"] = $userData["user_id"];
		$_SESSION["user"]["userAcc"] = $userData["user_account"];
		$_SESSION["user"]["userPass"] = $userData["user_password"];
		$_SESSION["user"]["userPic"] = $userData["user_picture"];
        $_SESSION["user"]["userScore"] = $userData["user_record"];
        $_SESSION["user"]["userDeaths"] = $userData["user_deaths"];
        $_SESSION["user"]["userJumps"] = $userData["user_jumps"];
		
		$_SESSION["changedPassword"]=0;

		unset($_SESSION["loginForm"]);
		unset($_SESSION["registerForm"]);	
		unset($_SESSION["errors"]);

	}else{

	Header("Location:index.php");
	}

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

	<div class="row">
  		<h1 class="text-center"> Connected successfully </h1>
	</div>

	<div class="row top-buffer">
		<div class="col-sm-6">
	 		<p> Go to <a href="profile.php">your profile </a> to upload a picture of your face and become a part of the game! </p>
		</div>
	</div>


	<div class="row" id="instructions">
		<div class="col-sm-6">
			<h2> Instructions </h2>
		</div>
	</div>	

	<div class="row top-buffer">
		<div class="col-sm-6">
	 		<p> To play FaceJumper you just have to go to your profile and press Play! or click Play on navigation bar.
	 		Before playing, you must upload a picture of your face at your profile, where you will find a picture editor to
	 		adjust your face to the model.
	 		Once you are in the game, the goal is get as far as you can dodging the appearing obstacles with the space bar.</p>
		</div>
	</div>






</body>

</html>


<?php
	echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

    
    closeConnectionBD($connection);

?>		
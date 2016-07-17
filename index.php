<?php
    session_start();

	require_once("gestionBD.php");

	$connection = createConnectionDB();

    if (!isset($_SESSION["user"])) {

            $registerForm["account"] = "";
            $registerForm["password"] = "";
            $registerForm["picture"] = "";

            $_SESSION["registerForm"] = $registerForm;

            $loginForm["account"] = "";
            $loginForm["password"] = "";

            $_SESSION["loginForm"] = $loginForm;

            $user["userID"] = 0;
            $user["userAcc"] = "";
            $user["userPass"] = "";
            $user["userPic"] = "";
            $user["userScore"] = 0;
            $user["userDeaths"] = 0;
            $user["userJumps"] = 0;
            $user["rank"] = 0;

            $_SESSION["user"] = $user;
    }

    if(isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];
    }

     if (!isset($_SESSION["pagination"])) {
            $pagination["score"] = 1;
            $pagination["deaths"] = 1;
            $pagination["jumps"] = 1;

            $_SESSION["pagination"] = $pagination;
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

    <div id="errores">
        <?php 
            if(isset($errors)){
                foreach ($errors as $error) {
                    print("<div class='error'>");
                    print("$error");
                    print("</div>");
                }
            }
            unset($_SESSION["errors"]);
        ?> 
    </div>       
	
	<div class="row">
    	<div>
			<img id= "backgroundImage" class="center-block" src="assets/media/img/videoBackground.png">
			<a href="#register"> <img id="parallaxButton" class="center-block" src="assets/media/icons/button_icon.png" height="32" width="35"></a>
    	</div>
	</div>
    <?php if(isset($_SESSION["login"])){?>

        

    <?php }else{ ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-4" id="loginBox" style="background-color: yellow;">
                    <div id="login">
                        <form role="form" action="loginManagement.php" method="post">
                            <div class="form-group">
                                <h1> LOG IN </h1>
                                <label for="loginAccount">Account name:</label>
                                <input type="text" name="loginAccount" class="account form-control" id="loginAccount">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password:</label>
                                <input type="password" name="loginPassword" class="password form-control" id="loginPassword">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div> 
                </div>  
        
                <div class="col-sm-4" id="registerBox" style="background-color: green; margin-bottom: 35px;">
                    <div id="register">
                        <form role="form" action="registerManagement.php" method="post">
                            <div class="form-group">
                                <h1> REGISTER </h1>
                                <label for="registerAccount">Account Name:</label>
                                <input type="text" name="registerAccount" class="form-control" id="registerAccount">
                            </div>
                            <div class="form-group">
                                <label for="registerPassword">Password:</label>
                                <input type="password" name="registerPassword" class="form-control" id="registerPassword">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm password:</label>
                                <input type="password" class="form-control" id="confirmPassword"> 
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div> 
                </div>  
            </div>
        </div>

        <div id="registerText">
            <p class="text-center">
                FaceJumper is an innovative web browser game in wich you can upload your own photo to become a part of the game. <br>
                Register to access the game and advanced features such as join the rankings and upload the character's face picture. <br>
                Based on T-Rex Google's game, FaceJumper provides a fun filled unique experience you will enjoy. <br>
                <img src="assets/media/img/gifweb3.gif">
            </p>
        </div>
    
	<?php } ?>


    <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    ?>     	



<?php 
    closeConnectionBD($connection);
?>

</body>

</html>
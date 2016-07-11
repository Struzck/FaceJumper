<?php

	session_start();

	require_once("gestionBD.php");
	require_once ("functions.php");

	$connection = createConnectionDB();



	if ($_FILES["file-input"]["error"] > 0){
  		echo "Error: " . $_FILES["file-input"]["error"] . "<br>";
  	}else{
  	}

 	$temp = explode(".", $_FILES["file-input"]["name"]);
 	$newfilename = $_SESSION["user"]["userAcc"]. ".png";
 	$image_dir= "assets/media/profilePics/";
 	move_uploaded_file($_FILES["file-input"]["tmp_name"], $image_dir . $newfilename);

  	$image = $image_dir . $newfilename;

  	$update = updatePicture($image);

  	$_SESSION["user"]["userPic"] = $image;

  	Header("Location:profile.php");



	closeConnectionBD($connection);

?> 
<?php
	session_start();
	require_once ("functions.php");
	require_once ("gestionBD.php");

	if(isset($_SESSION["registerForm"])){
		$registerForm["registerAccount"]=$_REQUEST["registerAccount"];
		$registerForm["registerPassword"]=$_REQUEST["registerPassword"];

		$_SESSION["registerForm"]=$registerForm;

	}else{
		Header("Location:index.php");
	}

	$errors=checkLogin($registerForm);

	if (count ($errors)>0){
		$_SESSION["errors"]=$errors;
		Header("Location:error.php");  

	}else{
		Header("Location:registered.php");
	}


	function checkLogin ($registerForm){
		unset($_SESSION["errors"]);
		$connection = createConnectionDB();

		$errors = array();
		$registerAccount = $registerForm["registerAccount"];
		$registerPassword = $registerForm["registerPassword"];

		if(empty($registerAccount)){
			$errors[]="Account name can't be empty.";
		}

		$accountQuery = mysql_query("SELECT COUNT(*) as count FROM USERS WHERE user_account ='" . $registerAccount . "'");
		$checkCount = mysql_fetch_assoc($accountQuery);
		$countAccount = $checkCount["count"];

		if($countAccount > 0){
			$errors[]="Account name is already used.";
		}

		if(empty($registerPassword)){
			$errors[]="Password can't be empty.";
		}

		closeConnectionBD($connection);
		return $errors;
	
	}





	echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';


?>
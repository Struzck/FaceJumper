<?php
	session_start();
	require_once ("gestionBD.php");
	require_once ("functions.php");

	if(isset($_POST["changePass"])){		
		$Pass=$_POST["changePass"];
		$verifyPass=$_POST["verifyPass"];
	}else{
	 	Header("Location:profile.php");
	}


	$errors=checkPass($Pass, $verifyPass);

	if (count ($errors)>0){
		$_SESSION["errors"]=$errors;
		#Header("Location:error.php");  
		echo $_SESSION["errors"];

	}else{
		Header("Location:profile.php");

	}

	function checkPass ($Pass, $verifyPass){
		require_once("gestionBD.php");

		if(empty($Pass)){
			$errors[]="New password can't be empty.";
		}
		if(empty($verifyPass)){
			$errors[]="Repeat your new password.";
		}

		if (strcmp($Pass, $verifyPass) !== 0){
			$errors[]="Passwords are different.";
		}

		$connection = createConnectionDB();

		$hashPassword = password_hash($Pass, PASSWORD_BCRYPT);
		$userAcc = $_SESSION["user"]["userAcc"];
		$modify = updatePassword($userAcc, $hashPassword);
		$_SESSION["user"]["userPass"] = $hashPassword;
		$_SESSION["modifiedPassword"] = 1;
	}



?>
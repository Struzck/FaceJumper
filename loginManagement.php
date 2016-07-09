<?php
	session_start();

	require_once("gestionBD.php");

	if(isset($_SESSION["loginForm"])){
		$loginForm["loginAccount"]=$_REQUEST["loginAccount"];
		$loginForm["loginPassword"]=$_REQUEST["loginPassword"];

		$_SESSION["loginForm"]=$loginForm;

	}else{
	 	Header("Location:index.php");
	}


	$errors=checkLogin($loginForm);

	if (count ($errors)>0){
		$_SESSION["login"]="";
		$_SESSION["errors"]=$errors;
		#Header("Location:error.php");  

	}else{
		$_SESSION["login"]="true";
		Header("Location:loged.php");
	}

	function checkLogin ($loginForm){
		require_once("gestionBD.php");

		if(empty($loginForm["loginAccount"])){
			$errors[]="Account name can't be empty.";
		}
		if(empty($loginForm["loginPassword"])){
			$errors[]="Password can't be empty.";
		}

		$connection = createConnectionDB();

		$account = $loginForm["loginAccount"];
		$password = $loginForm["loginPassword"];
		$md5Password = md5($password);
		$accountQuery = mysql_query("SELECT user_account FROM USERS WHERE user_account ='" . $account . "'");
		$passwordQuery = mysql_query("SELECT user_password FROM USERS WHERE user_password='" . $md5Password . "'");

		$checkAccount = mysql_fetch_assoc($accountQuery);
		$userAccount = $checkAccount["user_account"];
		$checkPassword = mysql_fetch_assoc($passwordQuery);
		$userPassword = $checkPassword["user_password"];

		if(strcmp($userAccount, $account) == 0){
			echo $md5Password;
			echo " aaa ";
			echo $userPassword;
			if(strcmp($userPassword, $md5Password) !== 0){
				$errors[]="Wrong password.";
			}
		}else{
			$errors[]="Wrong Account.";
		}

		closeConnectionBD($connection);
		return $errors;
	}

        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
   

?>
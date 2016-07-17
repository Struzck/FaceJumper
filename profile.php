<?php

    session_start();

	require_once("gestionBD.php");

	$connection = createConnectionDB();

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
    	<div class="text-center" id="profile">
    		<h1> PROFILE </h1>
    	</div>
    </div>	

    <div class="container">
            <div class="row">
                <div class="col-sm-2" id="profile-image">
                    <form action="upload.php" method="post" enctype="multipart/form-data" runat="server">
                        <div class="image-upload">
                            <label for="file-input">
                                <div id="profile-User-image-edit">
                                    <img src="<?=$_SESSION["user"]["userPic"] ?>" id="profile-User-image" style="height:150px; width:150px;"/>
                                </div>    
                            </label>
                            <input id="file-input" name="file-input" type="file" accept="image/*">                            
                        </div>
                        <input type="submit" value="Update" name="submit">
                    </form>

                    <?php 

                        $dataQuery = mysql_query("SELECT * FROM USERS ORDER BY user_record DESC");
                        $countQuery = mysql_query("SELECT count(*) as total FROM USERS;");
                        $rows = mysql_fetch_assoc($countQuery);
                        $totalRows =  $rows["total"];

                        for($i = 1; $i <= $totalRows; $i++){
                            $data = mysql_fetch_assoc($dataQuery);
                            $name = $data["user_account"];
                            if($name == $_SESSION["user"]["userAcc"]){
                                $_SESSION["user"]["rank"] =  $i;                           
                            }
                        } 
                            
                    ?>

                    Rank: <?php echo $_SESSION["user"]["rank"] ?> 
                </div>                  
                    

                <div class="col-sm-8" id="loginBox" style="background-color: grey;">
                    <div id="data"> 
                        <h2 class="h2Profile"> Account Name: <?php echo $_SESSION["user"]["userAcc"]    ?></h2>
                        <h2 class="h2Profile"> Account password: <?php echo $_SESSION["user"]["userPass"]   ?></h2>
                        <h2 class="h2Profile"> User Picture: <?php echo $_SESSION["user"]["userPic"]    ?></h2>
                        <h2 class="h2Profile"> Score record: <?php echo $_SESSION["user"]["userScore"]  ?></h2>
                        <h2 class="h2Profile"> Total deaths: <?php echo $_SESSION["user"]["userDeaths"] ?></h2>
                        <h2 class="h2Profile"> Total jumps: <?php echo $_SESSION["user"]["userJumps"]   ?></h2>
                    </div>
                </div>
            </div>  
    </div>         

    <div class="container">
            <div class="row">
                <div id="play" class="text-center top-buffer">
                    <form action="game.php">
                        <input type="submit" value="Play!">
                    </form>
                </div>
            </div>
    </div>




    <!-- JAVASCRIPT -->
    <script src="assets/js/scripts.js"></script>



<?php 
    closeConnectionBD($connection);
?>

</body>
</html>

<?php
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
?> 
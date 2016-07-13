<?php
    session_start();

	require_once("gestionBD.php");

	$connection = createConnectionDB();

	if(isset($_SESSION["errors"])){
        $errors=$_SESSION["errors"];
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
    	<div class="text-center" id="profile">
    		<h1> Score Leaderboard </h1>
    	</div>
    </div>


    <?php
    	$freeRows = 10;
    	$countQuery = mysql_query("SELECT count(*) as total FROM USERS;");
		$rows = mysql_fetch_assoc($countQuery);
    	$LogRows = $rows["total"];
    	$dataQuery = mysql_query("SELECT * FROM USERS ORDER BY user_record DESC");

    ?>

    <div class="col-sm-6 top-buffer" style="margin-left: 325px;">
  		<table class="leaderboardTable">
    		<thead>
      			<tr>
                    <th>Rank</th>
        			<th>Name</th>
        			<th>Score</th>
      			</tr>
    		</thead>
    		<tbody>
    			<?php 
    				for($i = 0; $i < $LogRows; $i++){ 
    					$data = mysql_fetch_assoc($dataQuery);
    					$name = $data["user_account"];
    					$score = $data["user_record"]; 
    			?>
      					<tr>
                            <td><?php echo $i; ?> </td>
        					<td><?php echo $name;?> </td>
        					<td><?php echo $score;?> </td>
      					</tr>
      			<?php } ?>		
    		</tbody>
  		</table>
	</div>
				

	<?php 
		$query = "SELECT * FROM USERS"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['user_id'] ."----". "</td><td>" . $row['user_account'] ."---". "</td><td>" ."---". $row['user_record'] . "</td></tr>";  
}

echo "</table>"; //Close the table in HTML


	?>








</body>
</html>    

<?php    
    closeConnectionBD($connection);

?>	
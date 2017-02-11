<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require "connect.php";
		session_start();
		$query = "UPDATE Clients SET ";
		$ChosenClientID = $_SESSION['ChosenClientID']; 
		if ($result = $database->query ("SELECT * FROM Clients WHERE id=".$ChosenClientID))
      		{
				$columns = $result->fetch_fields(); 
				for ($i=1; $i < count($columns); $i++) 
						{
							$query = $query . $columns[$i]->name . "=\"". $_GET[$columns[$i]->name] . "\", ";
						}							
				$result->close();
				$query = rtrim($query,", ");
				$query = $query . " WHERE id=" . $ChosenClientID;
				//echo $query;
				 if ($database->query($query) === TRUE)
      				{
      					echo "Query succesfull";
      					header("Location: ../index.php");
      				}
      			else 
      				{
      					echo $database->error;
      				}
			}
		else 
			{
				echo "<br><br>", $database->error;
			}
		/*$query = rtrim($query,",");
		$query = $query . ");";
		echo $query;
		echo $_GET['firstname'], "</br>";
		echo $_GET['lastname'], "</br>";
		echo $_GET['email'], "</br>";
		echo $_GET['phone_number'], "</br>";
		echo $_GET['adress'], "</br>";
		echo $_GET['birthdate'], "</br>";
		echo $_GET['NIP'], "</br>";	*/

	?>
</body>
</html>
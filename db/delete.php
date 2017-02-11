<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
			require "connect.php";
			$ChosenClientID = $_GET['ChosenClient'];
			$query = "DELETE FROM Clients WHERE id =" . $ChosenClientID;
			if ($database->query($query) === TRUE)
      				{
      					echo "Query succesfull";
      					header("Location: ../index.php");
      				}
      			else 
      				{
      					echo $database->error;
      				}

	?>
</body>
</html>
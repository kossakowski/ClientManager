<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
			require "connect.php";
			session_start();
			$ChosenClientID = $_GET['ChosenClient'];
			$_SESSION['ChosenClientID'] = $ChosenClientID; 
			echo "<br><br>";
			if ($result = $database->query ("SELECT * FROM Clients WHERE id IN (".$ChosenClientID.")"))
				{
					$EditedClient = $result->fetch_array(MYSQLI_NUM);
					$Fields = $result->fetch_fields();
					echo "Updating Client: <br>", $EditedClient[1]," ", $EditedClient[2], "<br>";
					echo "<form action=\"update_user.php\">";
					echo "<br><table border='1'>"; 	
					for ($i=1; $i < count($EditedClient); $i++) { 
						echo "<tr>";
						echo "<td>",$Fields[$i]->name,"</td>","<td><input type=\"text\" name=\"",$Fields[$i]->name , "\" value=\"",$EditedClient[$i] , "\"/></td>";
						echo "</tr>";												
					}
					echo "</table>";
					echo "<input type=\"submit\" value=\"Update\" /> ";
					echo "</form> ";
					$result->close();
				}
			else {
				echo "<br><br>", $database->error;
			}

	?>
</body>
</html>
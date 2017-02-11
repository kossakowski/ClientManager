<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p> Please select the user u would like to perfom the operation: </p>
<table border=1>
<form action="update.php">
<?php
	require "connect.php";
	if ($result = $database->query ("SELECT * FROM Clients"))
		{

			if ($result->num_rows) 
				{

					// prints the columns of the SQL table Clients

					echo "<tr>";
					echo "<th> Select </th>";
					$columns = $result->fetch_fields(); 
					foreach ($columns as $column) 
						{
							echo "<th>", $column->name,"</th>";
						}
					echo "</tr>";
			
					// prints the content of the database SQL tabel Clients
			
						while ($client = $result->fetch_array(MYSQLI_NUM))
						{
						echo "<tr>";
						echo "<td> <input type='radio' name = 'ChosenClient' value ='",$client[0],"'></td>";
						foreach ($client as $cell) 
							{
								echo "<td>", $cell ,"</td>";
							}
						echo "</tr>";
						}
				}
		}
	else 
		{
			echo "<br><br>" , $database->error;
		}
?>
</table>
<table border=0>
	<tr>
    		<td><input type="submit" value="Update Choosen Client" /></td>
	</tr>
</table>
</form>

</body>
</html>



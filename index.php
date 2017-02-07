<html>
<head></head>
<body>
<p>Full list of Clients:</p><br><br>
<table border=1>

<?php
require "db/connect.php";

if ($result = $database->query ("SELECT * FROM Clients"))
	{

		if ($result->num_rows) 
			{

				// prints the columns of the SQL table Clients

				echo "<tr>";
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
					foreach ($client as $cell) 
						{
							echo "<td>", $cell ,"</td>";
						}
						echo "</tr>";
					}
			}
		$result->close();
	}
else 
	{
		echo "<br><br>" , $database->error;
	}

?>
</table>
<br><br>
<form action="db/add_client.php">
    <input type="submit" value="Add New Client" />
</form>
</body>
</html>
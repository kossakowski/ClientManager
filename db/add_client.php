<html>
<head></head>
<body>
<p>Add new Client (version without validation)</p><br><br>
	<form method="post" action="insert_client_to_db.php">
		<table border=1>
			<?php
				require "connect.php";
				if ($result = $database->query ("SELECT * FROM Clients"))
					{
						if ($result->num_rows) 
							{
								$columns = $result->fetch_fields(); 
								foreach ($columns as $column)
									{
										echo "<tr>";
										echo "<td>",$column->name,"</td>","<td><input type=\"text\" name=\"",$column->name,"\"/></td>";
										echo "</tr>";
									}			
							}
						$result->close();
					}
				else {
					echo "<br><br>", $database->error;
				}
			?>
		</table>
			<p><input type="submit" value="Add New Client" name="submit"/></p>
	</form>
</body>
</html>
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
								for ($i=1; $i < count($columns); $i++) { 
									echo "<tr>";
									echo "<td>",$columns[$i]->name,"</td>","<td><input type=\"text\" name=\"",$columns[$i]->name,"\"/></td>";
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
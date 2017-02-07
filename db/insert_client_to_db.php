<?php
require "connect.php";
	if(isset($_POST['submit'])) 
		{
      		$query = "INSERT INTO Clients VALUES(";
      		if ($result = $database->query ("SELECT * FROM Clients"))
      			{
					if ($result->num_rows) 
						{
							$columns = $result->fetch_fields(); 
							foreach ($columns as $column) 
								{
									
									$query = $query . "\"" . $_POST[$column->name] . "\",";
								}							}
					$result->close();
				}
			else 
				{
					echo "<br><br>", $database->error;
				}
			$query = rtrim($query,",");
			$query = $query . ");";
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
 			echo "Post not working!";
		}
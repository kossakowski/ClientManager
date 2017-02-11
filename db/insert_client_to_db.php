<?php
require "connect.php";
	if(isset($_POST['submit'])) 
		{
      		$query = "INSERT INTO Clients VALUES(null,";
      		if ($result = $database->query ("SELECT * FROM Clients"))
      			{
					if ($result->num_rows) 
						{
							$columns = $result->fetch_fields(); 
							for ($i=1; $i < count($columns); $i++) 
								{
									$query = $query . "\"" . $_POST[$columns[$i]->name] . "\",";
								}							}
					$result->close();
				}
			else 
				{
					echo "<br><br>", $database->error;
				}
			$query = rtrim($query,",");
			$query = $query . ");";
			echo $query;	
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
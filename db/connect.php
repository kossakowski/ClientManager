<?php
$database = new mysqli("localhost", "root", "lasipolesie123", "Chambers");


// Prints out errors related to datebase connections, if any
if ($database->connect_errno) {
	die ("The site is experiencing problems with connecting with the database. Please see the details below:<br><br>" . $database->connect_error . "<br> Error code: " . $database->connect_errno);
}
/* Prints out success message if successful
else {
	echo ("Connection ro database successful! <br> Client library version: " . $database->get_client_info());
}*/


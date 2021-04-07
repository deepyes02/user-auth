<?php
//setup database connection
$conn = new mysqli("localhost", "root", "736852", "learn_php");

//check if connection is sucessfull
if ($conn -> connect_error){
	die("failed to connect to the database: " . $conn->connect_error);
} else {
	echo "database connected<br>";
	$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(50) NOT NULL UNIQUE,
		password VARCHAR(255) NOT NULL,
		created_at DATETIME DEFAULT CURRENT_TIMESTAMP
	)
	";
	//EXECUTE AND CHECK IF QUERY IS SUCCESSFUL
	if($conn->query($sql) === TRUE) {
		echo "sql -> CREATE TABLE IF NOT EXISTS users";
	} else {
		//any error
		echo $conn->error;
	}
	//close the connection
	// $conn->close();
}
?>
<?php 
//create table trips_itinerary
$conn = new mysqli("localhost", "root", "736852", "learn_php");

if($conn -> connect_error){
	die("failed to connect to the database " . $conn->connect_error);
} else {
	// echo "Connection is working";
	$sql = "CREATE TABLE IF NOT EXISTS trip_itinerary (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		day_number INT NOT NULL,
		itinerary_title VARCHAR(50) NOT NULL,
		itinerary_description VARCHAR(500) NOT NULL,
		trip_id INT,
		created_at DATETIME DEFAULT CURRENT_TIMESTAMP
		)
	";
	//execute and check if the query is sucessful
	if($conn->query($sql) === TRUE) {
		echo "created table trip_itinerary";
		return;
	} else {
		echo $conn->error;
	}
	$conn->close();
}?>
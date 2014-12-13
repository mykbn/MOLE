<?php
//Initialize Database Connection
$conn = new mysqli("localhost", "root", "", "mole_database");

//Check Connection
if($conn->connect_error){
	die("Connection Failed:" .$conn->connect_error);
}
// echo "Connected Successfully To Database!";
?>
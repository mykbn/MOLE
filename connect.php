<?php
//Initialize Database Connection
// $checkconn = new mysqli("localhost", "root", "", "");
$conn = new mysqli("localhost", "root", NULL, "mole_database");

//Check Connection
if($conn->connect_error){
	die("Connection Failed:" .$conn->connect_error);
}
// echo "Connected Successfully To Database!";
?>
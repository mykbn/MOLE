<?php

$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];

//Initialize Database Connection
$conn = new mysqli("localhost", "root", "", "ceumoodle_database");

//Check Connection
if($conn->connect_error){
	die("Connection Failed:" .$conn->connect_error);
}
// echo "Connected Successfully To Database!";

//Username
$queryUsername = "SELECT * FROM users WHERE '$inputUsername' = Username";
$resultUsername = mysqli_query($conn,$queryUsername)
	or die("Error: ".mysqli_error($conn));
$rowUser = mysqli_fetch_array($resultUsername);
$serverUser = $rowUser["Username"];

//Password
$queryPassword = "SELECT * FROM users WHERE '$inputPassword' = Password";
$resultPassword = mysqli_query($conn,$queryPassword)
	or die("Error: ".mysqli_error($conn));
$rowPassword = mysqli_fetch_array($resultPassword);
$serverPassword = $rowPassword["Password"];

//Check if login credentials are correct
if($inputUsername == $serverUser && $inputPassword == $serverPassword){
	// echo "<br/>Correct Credentials!";
	header("Location: homepage.htm");
}else{
	// echo "<br/>Incorrect Login Information";
	// header("Location: login.htm");
	readfile("login.htm");
	// echo '<head>';
 //    echo ' <link rel="stylesheet" href="login.css" type="text/css">';
	// echo '</head>';
	echo '<p id="invalid"> Invalid Login </p>';
}


mysqli_close($conn);



?>

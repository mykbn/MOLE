<?php


include "connect.php";
// include "CreateDatabase.php";

$inputUsername = $_POST['emailTxt'];
$inputPassword = $_POST['passTxt'];


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

//Position
$queryPosition = "SELECT Position FROM users WHERE '$inputUsername' = Username";
$resultPosition = mysqli_query($conn,$queryPosition)
	or die("Error: ".mysqli_error($conn));
$rowPosition = mysqli_fetch_array($resultPosition);
$serverPosition = $rowPosition["Position"];

//Check if login credentials are correct
if($inputUsername == $serverUser && $inputPassword == $serverPassword && $serverPosition == "student"){
	// echo "<br/>Correct Credentials!";
	header("Location: Homepage.html");
}else if($inputUsername == $serverUser && $inputPassword == $serverPassword && $serverPosition == "professor"){
	readfile("Homepage.html");
	echo '<a id=add-classes href="addclasses.htm">Create a Class</p>';
}else{
	// echo "<br/>Incorrect Login Information";
	// header("Location: login.htm");
	readfile("Login.html");
	// echo '<head>';
    // echo ' <link rel="stylesheet" href="login.css" type="text/css">';
	// echo '</head>';
	echo '<p id="invalid"> Invalid Login </p>';
}


mysqli_close($conn);



?>

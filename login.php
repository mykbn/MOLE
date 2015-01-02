<?php

include "connect.php";
// include "CheckDatabase.php";
// include "CreateDatabase.php";

$inputUsername = $_POST['emailTxt'];
$inputPassword = $_POST['passTxt'];

//GET FIRSTNAME AND LASTNAME FOR HOMEPAGE
$queryFirstLast = "SELECT Firstname, Lastname FROM users WHERE '$inputUsername' = Username";
$resultFirstLast = mysqli_query($conn, $queryFirstLast)
	or die ("Error: ".mysqli_error($conn));
$rowFirstLast = mysqli_fetch_array($resultFirstLast);
// $serverFirstLast = $rowFirstLast["Firstname"]["Lastname"];
Print ($rowFirstLast[0]);
Print ($rowFirstLast[1]);
// foreach ($rowFirstLast as $item) {
//     var_dump($item);
// }
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
if($inputUsername == $serverUser && $inputPassword == $serverPassword && $serverPosition == "Student"){
	// echo "<br/>Correct Credentials!";
	header("Location: Student-Homepage.html");
}else if($inputUsername == $serverUser && $inputPassword == $serverPassword && $serverPosition == "Professor"){
	header("Location: Homepage.html");
	// echo "<br>";
	// echo '<a id="add-classes" href="addclasses.html">Create a Class</a>';
}else{
	readfile("Login.html");
	echo '<label id="invalid"> Invalid Login </label>';
}


mysqli_close($conn);



?>

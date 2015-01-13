<?php

include "connect.php";
session_start('user_credentials');
// include "CheckDatabase.php";
// include "CreateDatabase.php";

$inputUsername = $_POST['emailTxt'];
$inputPassword = $_POST['passTxt'];
$_SESSION['UNAME'] = $inputUsername;

$Position = '';
//Position
$queryPosition = "SELECT Position FROM professors WHERE '$inputUsername' = Username";
$resultPosition = mysqli_query($conn,$queryPosition)
	or die("Error: ".mysqli_error($conn));
// $rowPosition = mysqli_fetch_array($resultPosition);
// $serverPosition = $rowPosition["Position"];
$count = mysqli_num_rows($resultPosition);

//Check if student or professor
if($count == 0){
	$Position = 'Student';
}else{
	$Position = 'Professor';
}

//GET ID. NO
//$queryID = "SELECT Student_No. FROM users WHERE '$inputUsername' = Username"
if ($Position == 'Professor'){
	//Username
	$queryUsername = "SELECT * FROM professors WHERE '$inputUsername' = Username";
	$resultUsername = mysqli_query($conn,$queryUsername)
		or die("Error: ".mysqli_error($conn));
	$rowUser = mysqli_fetch_array($resultUsername);
	$serverUser = $rowUser["Username"];

	//Password
	$queryPassword = "SELECT * FROM professors WHERE '$inputPassword' = Password";
	$resultPassword = mysqli_query($conn,$queryPassword)
		or die("Error: ".mysqli_error($conn));
	$rowPassword = mysqli_fetch_array($resultPassword);
	$serverPassword = $rowPassword["Password"];

	//Check if login credentials are correct
	if($inputUsername == $serverUser && $inputPassword == $serverPassword){
		header("Location:homepage.php");
	}else{
		readfile("index.html");
		echo '<label id="invalid"> Invalid Login </label>';
	}
}else if ($Position == 'Student'){
	//Username
	$queryUsername = "SELECT * FROM students WHERE '$inputUsername' = Username";
	$resultUsername = mysqli_query($conn,$queryUsername)
		or die("Error: ".mysqli_error($conn));
	$rowUser = mysqli_fetch_array($resultUsername);
	$serverUser = $rowUser["Username"];

	//Password
	$queryPassword = "SELECT * FROM students WHERE '$inputPassword' = Password";
	$resultPassword = mysqli_query($conn,$queryPassword)
		or die("Error: ".mysqli_error($conn));
	$rowPassword = mysqli_fetch_array($resultPassword);
	$serverPassword = $rowPassword["Password"];

	//Check if login credentials are correct
	if($inputUsername == $serverUser && $inputPassword == $serverPassword){
		readfile("Student-Homepage.html");
	}else{
		readfile("index.html");
		echo '<label id="invalid"> Invalid Login </label>';
	}
}

mysqli_close($conn);

?>

<?php

include "connect.php";
session_start('user_credentials');
// include "CheckDatabase.php";
// include "CreateDatabase.php";

$inputUsername = $_POST['emailTxt'];
$inputPassword = $_POST['passTxt'];
$_SESSION['UNAME'] = $inputUsername;
$_SESSION['ID'] = '';
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

	//GET ID. NO
	$queryID = "SELECT ID_No FROM professors WHERE '$inputUsername' = Username";
	$resultID = mysqli_query($conn,$queryID)
		or die("Error: ".mysqli_error($conn));
	$rowID = mysqli_fetch_array($resultID);
	$serverID = $rowID["ID"];
	$_SESSION['ID'] = $rowID[0];

	//Check if login credentials are correct
	if($inputUsername == $serverUser && $inputPassword == $serverPassword){
		header("Location:homepage.php?p=professor");
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

	//GET ID. NO
	$queryID = "SELECT ID_No FROM students WHERE '$inputUsername' = Username";
	$resultID = mysqli_query($conn,$queryID)
		or die("Error: ".mysqli_error($conn));
	$rowID = mysqli_fetch_array($resultID);
	$serverID = $rowID["ID"];
	$_SESSION['ID'] = $rowID[0];

	//Check if login credentials are correct
	if($inputUsername == $serverUser && $inputPassword == $serverPassword){
		header("Location:homepage.php?p=student");
	}else{
		readfile("index.html");
		echo '<label id="invalid"> Invalid Login </label>';
	}
}

mysqli_close($conn);

?>

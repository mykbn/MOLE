<?php

include "connect.php";
// execute_query("query", $conn);

$inputSignUpUsername = $_POST['signup-username'];
$inputPassword = $_POST['signup-password'];
$inputRePassword = $_POST['signup-retype-password'];
$position = $_POST['position'];

//Username
$queryUsername = "SELECT * FROM users WHERE '$inputSignUpUsername' = Username";
$resultUsername = mysqli_query($conn,$queryUsername)
	or die("Error: ".mysqli_error($conn));
$rowUser = mysqli_fetch_array($resultUsername);
$serverUser = $rowUser["Username"];

//Username already taken
if($inputSignUpUsername == $serverUser && $inputPassword == $inputRePassword){
	readfile("signup.htm");
	echo '<p class="invalid">Username Already Taken</p>';
}

//Check if password fields are equal
else if($inputPassword != $inputRePassword && $inputSignUpUsername != $serverUser){
	readfile("signup.htm");
	echo '<p class="invalid">Passwords do not match</p>';
}

else if($inputSignUpUsername == $serverUser && $inputPassword != $inputRePassword){
	readfile("signup.htm");
	echo '<p class="invalid">Username Already Taken</p>';
	echo '<br/><p class="invalid">Passwords do not match</p>';
}

else{
	$sql = "INSERT INTO users (`ID`, `Username`, `Password`, `Position`)VALUES (NULL, '$inputSignUpUsername', '$inputPassword', '$position')";
	if (mysqli_query($conn, $sql)) {
		readfile("login.htm");
	    echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
mysqli_close($conn);

?>
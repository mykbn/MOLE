<?php

include "connect.php";

// execute_query("query", $conn);
$inputStudNo = $_POST['studentnoText'];
$inputfName = $_POST['firstnameText'];
$inputlName = $_POST['lastnameText'];
$inputUsername = $_POST['usernameText'];
$inputPassword = $_POST['passwordText'];
$inputConfirm = $_POST['confirmText'];
$inputEmail = $_POST['emailText'];
$inputSchoolCollege = $_POST['school/college'];
$inputPosition = $_POST['position'];

//Username
$queryUsername = "SELECT * FROM users WHERE '$inputUsername' = Username";
$resultUsername = mysqli_query($conn,$queryUsername)
	or die("Error: ".mysqli_error($conn));
$rowUser = mysqli_fetch_array($resultUsername);
$serverUser = $rowUser["Username"];

//Username already taken
if($inputUsername == $serverUser && $inputPassword == $inputConfirm){
	readfile("Create.html");
	echo '<label class="invalid">Username Already Taken</label>';
}

//Check if password fields are equal
else if($inputPassword != $inputConfirm && $inputUsername != $serverUser){
	readfile("Create.html");
	echo '<label class="invalid">Passwords do not match</label>';
}

else if($inputUsername == $serverUser && $inputPassword != $inputConfirm){
	readfile("Create.html");
	echo '<p class="invalid">Username Already Taken</p>';
	echo '<br/><p class="invalid">Passwords do not match</p>';
}

else{
	$sql = "INSERT INTO users (`ID`, `Student No.`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`)
			VALUES (NULL, '$inputStudNo', '$inputfName', '$inputlName', '$inputUsername', '$inputPassword', '$inputEmail', '$inputSchoolCollege', '$inputPosition')";
	if (mysqli_query($conn, $sql)) {
		readfile("Login.html");
	    echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
mysqli_close($conn);

?>
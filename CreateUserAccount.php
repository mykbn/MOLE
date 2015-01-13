<?php

include "connect.php";

$inputStudNo = $_POST['idnoText'];
$inputfName = $_POST['firstnameText'];
$inputlName = $_POST['lastnameText'];
$inputUsername = $_POST['usernameText'];
$inputPassword = $_POST['passwordText'];
$inputConfirm = $_POST['confirmText'];
$inputEmail = $_POST['emailText'];
$inputSchoolCollege = $_POST['school/college'];
$inputPosition = $_POST['position'];

//Professor Username
$queryProfUsername = "SELECT * FROM professors WHERE '$inputUsername' = Username";
$resultProfUsername = mysqli_query($conn,$queryProfUsername)
	or die("Error: ".mysqli_error($conn));
$rowProfUser = mysqli_fetch_array($resultProfUsername);
$serverProfUser = $rowProfUser["Username"];

//Student Username
$queryStudUsername = "SELECT * FROM students WHERE '$inputUsername' = Username";
$resultStudUsername = mysqli_query($conn,$queryStudUsername)
	or die("Error: ".mysqli_error($conn));
$rowStudUser = mysqli_fetch_array($resultStudUsername);
$serverStudUser = $rowStudUser["Username"];

//Username already taken
if($inputUsername == $serverProfUser && $inputPassword == $inputConfirm || $inputUsername == $serverStudUser && $inputPassword == $inputConfirm){
	readfile("CreateUserAccount.html");
	echo '<label class="invalid">Username Already Taken</label>';
}
//Check if password fields are equal
else if($inputPassword != $inputConfirm && $inputUsername != $serverProfUser || $inputPassword != $inputConfirm && $inputUsername != $serverStudUser){
	readfile("CreateUserAccount.html");
	echo '<label class="invalid">Passwords do not match</label>';
}else if($inputUsername == $serverProfUser && $inputPassword != $inputConfirm || $inputUsername == $serverStudUser && $inputPassword != $inputConfirm ){
		readfile("CreateUserAccount.html");
		echo '<p class="invalid">Username Already Taken</p>';
		echo '<br/><p class="invalid">Passwords do not match</p>';
}else{
	//If User is Professor
	if($inputPosition == "Professor"){
		
		$insert_to_users = "INSERT INTO professors (`ID_No`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`) VALUES ('$inputStudNo', '$inputfName', '$inputlName', '$inputUsername', '$inputPassword', '$inputEmail', '$inputSchoolCollege', '$inputPosition')";
		if (mysqli_query($conn, $insert_to_users)) {
			readfile("Index.html");
			echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
			}else {
			    echo "Error: " . $insert_to_users . "<br>" . mysqli_error($conn);
			}

			
	}//END PROFESSOR IF

	else if($inputPosition == "Student"){

		$insert_to_users = "INSERT INTO students (`ID_No`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`) VALUES ('$inputStudNo', '$inputfName', '$inputlName', '$inputUsername', '$inputPassword', '$inputEmail', '$inputSchoolCollege', '$inputPosition')";
		if (mysqli_query($conn, $insert_to_users)) {
			readfile("Index.html");
			echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
			}else {
			    echo "Error: " . $insert_to_users . "<br>" . mysqli_error($conn);
			}

	}//END STUDENT IF


}//END ELSE




		
mysqli_close($conn);

?>
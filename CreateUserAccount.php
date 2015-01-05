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
	readfile("CreateUserAccount.html");
	echo '<label class="invalid">Username Already Taken</label>';
}

//Check if password fields are equal
else if($inputPassword != $inputConfirm && $inputUsername != $serverUser){
	readfile("CreateUserAccount.html");
	echo '<label class="invalid">Passwords do not match</label>';
}

else if($inputUsername == $serverUser && $inputPassword != $inputConfirm){
	readfile("CreateUserAccount.html");
	echo '<p class="invalid">Username Already Taken</p>';
	echo '<br/><p class="invalid">Passwords do not match</p>';
}

else{
	// $create_user_table =
	// 	"CREATE TABLE IF NOT EXISTS `$inputUsername` 
	// 	(
	// 		ID INT NOT NULL AUTO_INCREMENT,
	// 	    Student_No VARCHAR(10) NOT NULL,
	// 	    Firstname TEXT(50) NOT NULL,
	// 	    Lastname TEXT(50) NOT NULL,
	// 	    Email VARCHAR(50) NOT NULL,
	// 	    School_College TEXT(50) NOT NULL,
	// 	    Position TEXT(50) NOT NULL,
	// 	    Classes_Enrolled VARCHAR (50),
	// 	    PRIMARY KEY(id)
	// 	)";
	// 	$create_tbl = $conn->query($create_user_table);
	// if (mysqli_query($conn, $create_user_table)) {
		$insert_to_users = "INSERT INTO users (`Student_No`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `School_College`, `Position`)
			VALUES ('$inputStudNo', '$inputfName', '$inputlName', '$inputUsername', '$inputPassword', '$inputEmail', '$inputSchoolCollege', '$inputPosition')";
		
		if (mysqli_query($conn, $insert_to_users)) {
			// $insert_to_new_table = "INSERT INTO `$inputUsername` (`ID`, `Student_No`, `Firstname`, `Lastname`, `Email`, `School_College`, `Position`, `Classes_Enrolled`)
			// VALUES (NULL, '$inputStudNo', '$inputfName', '$inputlName', '$inputEmail', '$inputSchoolCollege', '$inputPosition', NULL)";
			readfile("Index.html");
			echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
			// if (mysqli_query($conn, $insert_to_new_table)) {
			// 	readfile("Index.html");
			//     echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
			}else {
			    echo "Error: " . $insert_to_users . "<br>" . mysqli_error($conn);
			}

		} 
		// else {
		//     echo "Error: " . $insert_to_users . "<br>" . mysqli_error($conn);
		// }

	// }else {
	//     echo "Error: " . $create_tbl . "<br>" . mysqli_error($conn);
	// }

	
// }
mysqli_close($conn);

?>
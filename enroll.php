<?php
session_start('user_credentials');
include "connect.php";
$subject = $_POST['subject'];
$ID = $_SESSION['ID'];
$password = $_POST['classpass'];

$alter = "ALTER TABLE enrollment ADD `".$_SESSION['ID']."` VARCHAR(50) NOT NULL" ;
if (mysqli_query($conn, $alter)) {
	 // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
} 
// else {
// 	 echo "Error: " . $alter . "<br>" . mysqli_error($conn);
// }

// GET PASSWORD FROM DB
$queryPass = "SELECT Password FROM Classes WHERE `Classes` = '$subject'";
$resultPass = mysqli_query($conn, $queryPass) 
	or die ("Error: " .mysqli_error($conn));
$rowPass = mysqli_fetch_array($resultPass);
$serverPass = $rowPass["Password"];
// echo($serverPass);

//CHECK IF ALREADY ENROLLED
$query = "SELECT * FROM enrollment WHERE `".$_SESSION['ID']."` = '$subject'";
$result = mysqli_query($conn, $query) 
	or die ("Error: " .mysqli_error($conn));
$row = mysqli_num_rows($result);
// $server = $row["".$_SESSION['ID'].""];


// echo "<script> 
// 	alert('".$row."');
// 	window.location.href='homepage.php';
// 	</script>";

// INSERT ID NO TO CLASS TABLE
if ($row >= 1){
	echo "You are already enrolled in ".$subject."!";
}else if($password != $serverPass){
	echo "The Password Incorrect!";
}else{
	$queryEnroll = "INSERT INTO enrollment (`$ID`) VALUES ('$subject')";
	if (mysqli_query($conn, $queryEnroll)) {
		// echo "inserted successfully!";
		echo "Enrolled successfully!";
	}else {
		    echo "Error: " . $queryEnroll . "<br>" . mysqli_error($conn);
	}
}	

// echo($subject);
mysqli_close($conn);
?>
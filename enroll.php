<?php
session_start('user_credentials');
include "connect.php";
$subject = $_GET['subject'];
$ID = $_SESSION['ID'];

$alter = "ALTER TABLE enrollment ADD `".$_SESSION['ID']."` VARCHAR(50) NOT NULL" ;
if (mysqli_query($conn, $alter)) {
	 // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
} 
// else {
// 	 echo "Error: " . $alter . "<br>" . mysqli_error($conn);
// }

//INSERT ID NO TO CLASS TABLE
$queryEnroll = "INSERT INTO enrollment (`$ID`) VALUES ('$subject')";
if (mysqli_query($conn, $queryEnroll)) {
	// echo "inserted successfully!";
	echo "<script> 
	alert('Enrolled Successfully!');
	window.location.href='homepage.php';
	</script>";
}else {
	    echo "Error: " . $queryEnroll . "<br>" . mysqli_error($conn);
}
// echo($subject);
mysqli_close($conn);
?>
<?php
session_start('user_credentials');
include "connect.php";
$subject = $_GET['subject'];

//INSERT ID NO TO CLASS TABLE
$queryEnroll = "INSERT INTO `$subject` (`ID_No`) VALUES (".$_SESSION['ID'].")";
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
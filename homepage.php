<?php
	include "connect.php";
	
	$name = $_GET["user"];
// // readfile("homepage.html");
// $inputUsername = $_POST['emailTxt'];
// $inputPassword = $_POST['passTxt'];

// //GET FIRSTNAME AND LASTNAME FOR HOMEPAGE
// $queryFirstLast = "SELECT Firstname, Lastname FROM users WHERE '$inputUsername' = Username";
// $resultFirstLast = mysqli_query($conn, $queryFirstLast)
// 	or die ("Error: ".mysqli_error($conn));
// $rowFirstLast = mysqli_fetch_array($resultFirstLast);

// $name = $rowFirstLast[0];
echo ($name);
// mysqli_close($conn);
?>
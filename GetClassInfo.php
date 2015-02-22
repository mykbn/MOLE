<?php

include "connect.php";
session_start("user_credentials");

$subj = $_POST['subj'];
// $_SESSION['CURRENTSUBJPROF'] = '';


$getAuthor = "SELECT Created_By from Classes WHERE Classes = '$subj'";
$getAuthorResult = mysqli_query($conn,$getAuthor)
	or die("Error: ".mysqli_error($conn));
$rowAuthor = mysqli_fetch_array($getAuthorResult);
$serverAuthor = $rowAuthor["Created_By"];
$_SESSION['CURRENTSUBJPROF'] = $rowAuthor["Created_By"];;
echo ($serverAuthor);
mysqli_close($conn);
?>
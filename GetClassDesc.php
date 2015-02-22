<?php

include "connect.php";
session_start("user_credentials");

$subj = $_POST['subj'];
// $_SESSION['CURRENTSUBJPROF'] = '';


$getDesc = "SELECT Class_Description from Classes WHERE Classes = '$subj'";
$getDescResult = mysqli_query($conn,$getDesc)
	or die("Error: ".mysqli_error($conn));
$rowDesc = mysqli_fetch_array($getDescResult);
$serverDesc = $rowDesc["Class_Description"];
// $_SESSION['CURRENTSUBJPROF'] = $rowDesc["Class_Description"];;
echo ($serverDesc);
mysqli_close($conn);
?>
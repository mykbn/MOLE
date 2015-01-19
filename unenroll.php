<?php
session_start('user credentials');
include "connect.php";

$subj = $_POST['classV'];
//DELETE CLASS
$queryDeleteClass = "DELETE FROM enrollment WHERE `".$_SESSION['ID']."` = '$subj' ";
$resultDeleteClass = mysqli_query($conn,$queryDeleteClass)
	or die("Error: ".mysqli_error($conn));
// $serverDeleteClass = $rowDeleteClass["Classes"];

if(mysqli_query($conn,$queryDeleteClass)){
	echo "Record Deleted!";
}else{
	 echo "Error: " . $queryDeleteClass . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
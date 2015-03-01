<?php

// session_start('user credentials');
include "connect.php";

$subj = $_POST['subj'];
$card = $_POST['cardTitle'];

//DELETE CLASS
$queryDeleteCard = "DELETE FROM ".$subj."_cards WHERE `CardTitle` = '$card' ";
$resultDeleteCard = mysqli_query($conn,$queryDeleteCard)
	or die("Error: ".mysqli_error($conn));
// $serverDeleteClass = $rowDeleteClass["Classes"];
// echo ($queryDeleteCard);
if(mysqli_query($conn,$queryDeleteCard)){
	echo "Card Deleted!";
}else{
	 echo "Error: " . $queryDeleteCard . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php

include "connect.php";

$subj = $_GET['subj'];
$listName = $_GET['list'];

// $addColumn = "ALTER TABLE ".$subj." ADD `".$list."` VARCHAR(100) NOT NULL" ;
// if (mysqli_query($conn, $addColumn)) {
// 	 echo "ALTER SUCCESSFUL!";
// } else{
// 	echo "Error: " . $addColumn . "<br>" . mysqli_error($conn);
// }

$insertNewList = "INSERT INTO ".$subj." (`ID`, `Lists`) VALUES (NULL, '$listName')";
if(mysqli_query($conn, $insertNewList)){
	echo "NEW LIST CREATED!";
}else{
	echo "Error: ".$insertNewList."<br>".mysqli_error($conn);
}


// echo($subj);
// echo($listName);

mysqli_close($conn);
?>
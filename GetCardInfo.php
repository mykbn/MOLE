<?php

include 'connect.php';

$subj = $_POST['subj'];
$card = $_POST['cardTitle'];

//GET CARD INFO
$query = "SELECT * FROM ".$subj."_cards WHERE `CardTitle` = '$card'";
$result = mysqli_query($conn,$query)
	or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);

$title = $row["CardTitle"];
$desc = $row["Description"];
$createdBy = $row["Created_By"];
$date = $row["Date_Created"];

echo ( json_encode(array("titlee" => "$title", "descriptionn" => "$desc", "createdby" => "$createdBy", 
		"datecreated" => "$date")) );

mysqli_close($conn);
?>
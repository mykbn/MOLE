<?php

include 'connect.php';

$item_num = $_POST['num'];
$subj = $_POST['subj'];
$quiz_title = $_POST['title'];

// echo ("QUESTIONNN!");

//GET Question
$queryQuestion = "SELECT Question FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
$resultQuestion = mysqli_query($conn,$queryQuestion)
	or die("Error: ".mysqli_error($conn));
$rowQuestion = mysqli_fetch_array($resultQuestion);
$serverQuestion = $rowQuestion["Question"];

//GET Type
$queryType = "SELECT Type FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
$resultType = mysqli_query($conn,$queryType)
	or die("Error: ".mysqli_error($conn));
$rowType = mysqli_fetch_array($resultType);
$serverType = $rowType["Type"];

//GET Type
$queryNum = "SELECT Num_Of_Choices FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
$resultNum = mysqli_query($conn,$queryNum)
	or die("Error: ".mysqli_error($conn));
$rowNum = mysqli_fetch_array($resultNum);
$serverNum = $rowNum["Num_Of_Choices"];

echo ( json_encode(array("question" => "$serverQuestion", "type_of_choice" => "$serverType", "num_of_choices" => "$serverNum")) );
?>
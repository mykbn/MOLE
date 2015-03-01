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

//GET Number Of Choices
$queryNum = "SELECT Num_Of_Choices FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
$resultNum = mysqli_query($conn,$queryNum)
	or die("Error: ".mysqli_error($conn));
$rowNum = mysqli_fetch_array($resultNum);
$serverNum = $rowNum["Num_Of_Choices"];

if ($serverNum == '1'){
	//GET Choice A
	$queryA = "SELECT A FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultA = mysqli_query($conn,$queryA)
		or die("Error: ".mysqli_error($conn));
	$rowA = mysqli_fetch_array($resultA);
	$serverA = $rowA["A"];

	echo ( json_encode(array("question" => "$serverQuestion", "type_of_choice" => "$serverType", "num_of_choices" => "$serverNum", 
		"A" => "$serverA")) );

}else if($serverNum == '2'){
	//GET Choice A
	$queryA = "SELECT A FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultA = mysqli_query($conn,$queryA)
		or die("Error: ".mysqli_error($conn));
	$rowA = mysqli_fetch_array($resultA);
	$serverA = $rowA["A"];
	//GET Choice B
	$queryB = "SELECT B FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultB = mysqli_query($conn,$queryB)
		or die("Error: ".mysqli_error($conn));
	$rowB = mysqli_fetch_array($resultB);
	$serverB = $rowB["B"];

	echo ( json_encode(array("question" => "$serverQuestion", "type_of_choice" => "$serverType", "num_of_choices" => "$serverNum", 
		"A" => "$serverA", "B" => "$serverB")) );
	
}else if($serverNum == '3'){
	//GET Choice A
	$queryA = "SELECT A FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultA = mysqli_query($conn,$queryA)
		or die("Error: ".mysqli_error($conn));
	$rowA = mysqli_fetch_array($resultA);
	$serverA = $rowA["A"];
	//GET Choice B
	$queryB = "SELECT B FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultB = mysqli_query($conn,$queryB)
		or die("Error: ".mysqli_error($conn));
	$rowB = mysqli_fetch_array($resultB);
	$serverB = $rowB["B"];
	//GET Choice C
	$queryC = "SELECT C FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultC = mysqli_query($conn,$queryC)
		or die("Error: ".mysqli_error($conn));
	$rowC = mysqli_fetch_array($resultC);
	$serverC = $rowC["C"];

	echo ( json_encode(array("question" => "$serverQuestion", "type_of_choice" => "$serverType", "num_of_choices" => "$serverNum", 
		"A" => "$serverA", "B" => "$serverB", "C" => "$serverC")) );

}else if($serverNum == '4'){
	//GET Choice A
	$queryA = "SELECT A FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultA = mysqli_query($conn,$queryA)
		or die("Error: ".mysqli_error($conn));
	$rowA = mysqli_fetch_array($resultA);
	$serverA = $rowA["A"];
	//GET Choice B
	$queryB = "SELECT B FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultB = mysqli_query($conn,$queryB)
		or die("Error: ".mysqli_error($conn));
	$rowB = mysqli_fetch_array($resultB);
	$serverB = $rowB["B"];
	//GET Choice C
	$queryC = "SELECT C FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultC = mysqli_query($conn,$queryC)
		or die("Error: ".mysqli_error($conn));
	$rowC = mysqli_fetch_array($resultC);
	$serverC = $rowC["C"];
	//GET Choice D
	$queryD = "SELECT D FROM `".$subj."_quiz_".$quiz_title."` WHERE '$item_num' = ID";
	$resultD = mysqli_query($conn,$queryD)
		or die("Error: ".mysqli_error($conn));
	$rowD = mysqli_fetch_array($resultD);
	$serverD = $rowD["D"];

	echo ( json_encode(array("question" => "$serverQuestion", "type_of_choice" => "$serverType", "num_of_choices" => "$serverNum", 
		"A" => "$serverA", "B" => "$serverB", "C" => "$serverC", "D" => "$serverD")) );
}


?>
<?php

session_start('user_credentials');
include 'connect.php';

$subj = $_GET['subj'];
$quizTitle = $_GET['title'];
$score = 0;
$id = $_SESSION['ID'];

$getCorrect = "SELECT * FROM ".$subj."_quiz_".$quizTitle."_answers";
$resultCorrect = mysqli_query($conn, $getCorrect) or die ("Error: ".mysqli_error($conn));
// $rowCorrect = mysqli_fetch_array($resultCorrect);


while ($row = mysqli_fetch_array($resultCorrect)){
	if($row['Correct_Answer'] == $row[''.$id.'']){
		$score = $score + 1;
	}
	
	
}

echo ("Your Score is: ".$score);



?>
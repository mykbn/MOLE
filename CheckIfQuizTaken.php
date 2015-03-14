<?php

session_start('user_credentials');
include 'connect.php';

$subj = $_POST['subj'];
$quizTitle = $_POST['quizTitle'];

// $check_column = "SHOW COLUMNS FROM ".$subj."_quiz_".$quizTitle."_answers LIKE ".$_SESSION['ID'];
$check_column = "SELECT ".$_SESSION['ID']." FROM".$subj."_quiz_".$quizTitle."_answers";
$result = mysqli_query($conn, $check_column);
$exists = (mysqli_num_rows($result));
if($exists == 0) {
   // do your stuff
	echo "FALSE";
}else{
	echo "TRUE";
}

mysqli_close($conn);
?>
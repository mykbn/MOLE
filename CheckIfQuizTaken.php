<?php

session_start('user_credentials');
include 'connect.php';

$subj = $_POST['subj'];
$quizTitle = $_POST['quizTitle'];

// $check_column = "SHOW COLUMNS FROM ".$subj."_quiz_".$quizTitle."_answers LIKE ".$_SESSION['ID'];
$check_column = "SELECT `".$_SESSION['ID']."` FROM ".$subj."_quiz_".$quizTitle."_answers WHERE `ID`=1";
if($result = mysqli_query($conn, $check_column)){
	echo "TRUE";
}else{
	echo "FALSE";
}
// $exists = mysqli_fetch_array($result);
// $exists = (mysqli_num_rows($result));
// echo ($check_column);
// if($exists == 0) {
//    // do your stuff
// 	echo "FALSE";
// }else{
// 	echo "TRUE";
// }

mysqli_close($conn);
?>
<?php
session_start('user_credentials');
include 'connect.php';

$subj = $_POST['subj'];
$quizTitle = $_POST['title'];

$query = "SELECT * FROM ".$subj."_quiz_".$quizTitle."_answers WHERE `ID` = 1";
$execute = mysqli_query($conn, $query) or die ("ERROR: ".mysqli_error($conn));
$result = mysqli_fetch_array($execute);
$time = $result['Time_Limit'];

echo ($time * 60);

mysqli_close($conn);
?>
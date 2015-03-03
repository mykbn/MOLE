<?php
session_start('user_credentials');
include 'connect.php';

$num = $_POST['num'];
$ans = $_POST['ans'];
$subj = $_GET['subj'];
$quizTitle = $_GET['quiz'];

$alter = "ALTER TABLE `".$subj."_quiz_".$quizTitle."_answers` ADD `".$_SESSION['ID']."` VARCHAR(50) NOT NULL" ;
if (mysqli_query($conn, $alter)) {
	echo ($alter);
	 // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
} 

?>
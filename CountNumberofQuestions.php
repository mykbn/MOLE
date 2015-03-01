<?php
include 'connect.php';

$s = $_POST['subj'];
$cardsTitle = $_POST['title'];

// GET NUMBER OF QUESTIONS
$askDataBase = "SELECT * FROM ".$s."_quiz_".$cardsTitle."";
 
?>
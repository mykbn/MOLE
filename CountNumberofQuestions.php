<?php
include 'connect.php';

$subj = $_POST['subj'];
$quizTitle = $_POST['quiz'];
$option = '';
// GET NUMBER OF QUESTIONS
$askDataBase = "SELECT * FROM ".$subj."_quiz_".$quizTitle."";
$getResult = mysqli_query($conn, $askDataBase) 
	or die ("Error: " .mysqli_error($conn));

$number = mysqli_num_rows($getResult);
// echo($number);
$count = 1;
while($count <= $number){
	$option .= '<option value = "'.$count.'">'.$count.'</option>';
	$count = $count + 1;   
}
echo($option);

mysqli_close($conn);
 
?>
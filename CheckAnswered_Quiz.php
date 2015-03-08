<?php

session_start('user_credentials');
include 'connect.php';

$subj = $_GET['subj'];
$quizTitle = $_GET['title'];

$getAnswers = "SELECT * FROM `".$subj."_quiz_".$quizTitle."_answers`";
$query = mysqli_query($conn, $getAnswers) or die ("Error: ".mysqli_error($conn));

// echo $getAnswers;
echo "<table border='solid 1px'>";
echo "<th>Number</th>";
echo "<th>Status</th>";
while ($row = mysqli_fetch_array($query)){
	echo "<tr><td>";
	echo $row['ID'];
	echo "</td><td>";
	if ($row[''.$_SESSION["ID"].''] != ''){
		echo "ANSWERED";
		echo "</td>";	
	}else{
		echo "NOT ANSWERED";
		echo "</td>";
	}
	
}

echo "<input type='submit' value='Submit'>";
mysqli_close($conn);
?>
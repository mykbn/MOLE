<?php

session_start('user_credentials');
include 'connect.php';
echo "lalalalalalal";
if($_SESSION['POSITION'] == "Student"){
	echo "<p>Grades:</p>";
	$get_grades = "SELECT * FROM `grades_".$_SESSION['ID']."`";
	$execute_query = mysqli_query($conn, $get_grades) or die ("Error: ".mysqli_error($conn));
	echo "<table class='table-fill' border='solid 1px'>";
	echo "<th class='text-left'>Quiz Title</th>";
	echo "<th class='text-right'>Grade</th>";
	while ($row = mysqli_fetch_array($execute_query)){
	  echo "<tr><td class='text-left'>";
	  echo $row['Quiz_Title'];
	  echo "</td><td class='text-right'>";
	  echo $row['Grade'];
	  echo "</td></tr>";
	}
	echo "</table>";
	}else{
	echo "<p>Students Grades:</p>";


}
mysqli_close($conn);
?>
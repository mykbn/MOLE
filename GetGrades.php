<?php

session_start('user credentials');
include 'connect.php';
$subj = $_POST['subj'];

$query = "SELECT * FROM grades_".$subj."";
$execute = mysqli_query($conn, $query);
echo "<h1>".$subj." Grades</h1>";
echo "<center>";
echo "<table border='solid 1px' id='gradestable'>";
echo "<tr><th>Quiz Title</th><th>Student Name</th><th>Grade</th></tr>";
while ($row = mysqli_fetch_array($execute)){
	
	echo "<tr>";
	echo "<td>".$row['Quiz_Title']."</td>";
	echo "<td>".$row['Student_Name']."</td>";
	echo "<td>".$row['Grade']."</td>";
	echo "</tr>";
	
}
echo "</table>";
echo "</center>";
mysqli_close($conn);
?>
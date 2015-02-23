<?php

include 'connect.php';

$subj = $_POST['subject'];
$quizTitle = $_POST['title'];
$question = $_POST['question'];
// echo($subj);
// echo($quizTitle);

$create_quiz_table =
"CREATE TABLE IF NOT EXISTS `".$subj."_quiz_".$quizTitle."`
(
    ID INT NOT NULL AUTO_INCREMENT,
    Question VARCHAR(500) NOT NULL,
    A VARCHAR(200) NOT NULL,
    B VARCHAR(200) NOT NULL,
    C VARCHAR(200) NOT NULL,
    D VARCHAR(200) NOT NULL,
    Correct_Answer VARCHAR(200) NOT NULL,
    PRIMARY KEY(ID)
)";
$create_quiz = $conn->query($create_quiz_table);

$insert_quiz_item = "INSERT INTO `".$subj."_quiz_".$quizTitle."` (`Question`) VALUES ('$question')";
if(mysqli_query($conn,$insert_quiz_item)){
	echo "SUCCESS!";
}else{
    echo "Error: " . $insert_quiz_item . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
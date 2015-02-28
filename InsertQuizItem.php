<?php

include 'connect.php';

$subj = $_POST['subject'];
$quizTitle = $_POST['title'];
$question = $_POST['question'];
$type = $_POST['type'];
$num_of_choices = $_POST['num_of_choices'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$answer = $_POST['ans'];
// echo($subj);
// echo($quizTitle);

$create_quiz_table =
"CREATE TABLE IF NOT EXISTS `".$subj."_quiz_".$quizTitle."`
(
    ID INT NOT NULL AUTO_INCREMENT,
    Question VARCHAR(500) NOT NULL,
    Type TEXT(50) NOT NULL,
    Num_Of_Choices INT NOT NULL,
    A VARCHAR(200) NOT NULL,
    B VARCHAR(200) NOT NULL,
    C VARCHAR(200) NOT NULL,
    D VARCHAR(200) NOT NULL,
    Correct_Answer VARCHAR(200) NOT NULL,
    PRIMARY KEY(ID)
)";
$create_quiz = $conn->query($create_quiz_table);

$insert_quiz_item = "INSERT INTO `".$subj."_quiz_".$quizTitle."` (`Question`, `Type`, `Num_Of_Choices`, `A`, `B`, `C`, `D`,`Correct_Answer`) 
                    VALUES ('$question', '$type', '$num_of_choices','$a','$b','$c','$d','$answer')";
if(mysqli_query($conn,$insert_quiz_item)){
	echo "SUCCESS!";
}else{
    echo "Error: " . $insert_quiz_item . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
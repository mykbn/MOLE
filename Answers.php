<?php	
	include "connect.php";
	session_start('user_credentials');
	// session_start("class_info");
	$status = $_SESSION['POSITION'];
	$title = $_GET['title'];

?>
<html lang = "en">
<head>
<link type="text/css" rel="stylesheet" href="quiz.css">
<link type="text/css" rel="stylesheet" href="homepage.css">

<meta charset="utf-8"/>
<title>Answers</title>
<meta name="viewport" content="initial-scale=1.0;
	maximum-scale=1.0; width=device-width;">

<script type="text/javascript">
function ChangeProfileName(){
	// alert (<?php echo json_encode($_SESSION['PROFILEPIC']); ?>);
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
   	// var quiz_title = document.getElementById('quiztitle');
   	// quiz_title.value = <?php echo json_encode($title) ?>;

}
function GetScore(){
	var subj = <?php echo json_encode($_GET['subj']); ?>;
	var quizTitle = <?php echo json_encode($_GET['title']); ?>;
	if(confirm("You are about to submit your answers") == true){
		window.location.href = "ComputeScore.php?subj="+subj+"&title="+quizTitle;
	}
}
</script>
</head>

<body onload="ChangeProfileName()">
	<div id="main">

<!-- HEADER -->
	<div id = "header" onclick="Hide()">
		<div id = "logo-mole"><a href = "Homepage.php">
			<img id = "logo" src = "_assets/Logo.png">
			<img id = "mole" src = "_assets/Mole.png">
		</a></div>
		<div id = "profilepic-div">
			<img id = "profilepicture" src="_assets/Profile-icon.jpg">
		</div>
		<!-- <input id = "class" type = "submit" value = "Classes" name = "classBtn" 
			onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv)"> -->
		<input id = "profilename" type = "button"  name = "profilename" 
			onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" 
			onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
	</div>

<div class="table-title">
<h3>Quiz</h3>
</div>
<?php

// session_start('user_credentials');
// include 'connect.php';

$subj = $_GET['subj'];
$quizTitle = $_GET['title'];

$getAnswers = "SELECT * FROM `".$subj."_quiz_".$quizTitle."_answers`";
$query = mysqli_query($conn, $getAnswers) or die ("Error: ".mysqli_error($conn));

// echo $getAnswers;
echo "<table class='table-fill'>";
echo "<th class='text-left'>Item</th>";
echo "<th class='text-right'>Status</th>";
while ($row = mysqli_fetch_array($query)){
	echo "<tr><td class='text-left'>";
	echo $row['ID'];
	echo "</td><td class='text-right'>";
	if ($row[''.$_SESSION["ID"].''] != ''){
		echo "ANSWERED";
		echo "</td></tr>";	
	}else{
		echo "NOT ANSWERED";
		echo "</td></tr>";
	}
	
}

echo "<tr><td><input type='button' value='Go Back'></td><td><input type='submit' value='Submit' onclick='GetScore()'></td></tr>";
echo "</table>";
mysqli_close($conn);
?>

</body>
</html>

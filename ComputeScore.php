<?php

	session_start('user_credentials');
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="homepage.css">
<link type="text/css" rel="stylesheet" href="results.css">
	<title>Quiz Score</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript">
function ChangeProfileName(){
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;


}
function GoBackToClass(){
	var subj = <?php echo json_encode($_GET['subj']); ?>;
	window.location.href = "CardsContainer.php?subj="+subj;
}
</script>
</head>
<body onload="ChangeProfileName()">
	<!-- HEADER -->
	<div id = "header" onclick="Hide()">
		<div id = "logo-mole"><a href = "Homepage.php">
			<img id = "logo" src = "_assets/Logo.png">
			<img id = "mole" src = "_assets/Mole.png">
		</a></div>
		<div id = "profilepic-div">
			<img id = "profilepicture" src="_assets/Profile-icon.jpg">
		</div>
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" 
			onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv)">
		<input id = "profilename" type = "button"  name = "profilename" 
			onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" 
			onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
	</div>

	<div id = "mainpage">
		<div class="table-title">
			<center><h3>Summary of your previous attempt:</h3></center>
		</div>
		<div id='scorecontainer'>
			<table class="table-fill">
				<thead>
					<tr>
					<th class="text-left">Marks</th>
					<th class="text-right">Grade /100</th>
					</tr>
					<tbody class="table-hover">
					<tr>
			<?php
				// session_start('user_credentials');
				include 'connect.php';

				$subj = $_GET['subj'];
				$quizTitle = $_GET['title'];
				$score = 0;
				$id = $_SESSION['ID'];

				$getCorrect = "SELECT * FROM ".$subj."_quiz_".$quizTitle."_answers";
				$resultCorrect = mysqli_query($conn, $getCorrect) or die ("Error: ".mysqli_error($conn));
				// $rowCorrect = mysqli_fetch_array($resultCorrect);
				$numberOfQuestions = mysqli_num_rows($resultCorrect);

				while ($row = mysqli_fetch_array($resultCorrect)){
					if($row['Correct_Answer'] == $row[''.$id.'']){
						$score = $score + 1;
					}	
				}

				$computed_score = ($score/$numberOfQuestions)*100;
				echo '<td class="text-left">'.$score.'</td>';
				echo '<td class="text-right">'.number_format($computed_score).'</td>';
				echo '</tr></tr>';
				echo '<center><h3>Your final grade for this quiz is '.number_format($computed_score).' / 100</h3></center>';

				$create_grade_table =
				"CREATE TABLE IF NOT EXISTS `grades_".$_SESSION['ID']."`
				(
				    ID_No INT(8) NOT NULL AUTO_INCREMENT,
				    Subject VARCHAR(100) NOT NULL,
				    Quiz_Title VARCHAR(100) NOT NULL,
				    Grade INT(100) NOT NULL,
				    PRIMARY KEY(ID_No)
				)";
				$create_table = $conn->query($create_grade_table);

				$insert_grade = "INSERT INTO `grades_".$_SESSION['ID']."` (`Subject`, `Quiz_Title`, `Grade`) VALUES ('$subj', '$quizTitle', '".number_format($computed_score)."')";
				if (mysqli_query($conn, $insert_grade)) {
					// echo "Enrolled successfully!";
				}else {
					    echo "Error: " . $insert_grade . "<br>" . mysqli_error($conn);
				}
						?>
			<!-- <tr><td>
			
			</td></tr> -->
			</table>
			<center><input type = "button" value="Continue" onclick="GoBackToClass()"></center>
			
		</div>
<!-- NOTIFICATIONSIDE -->
		<div id = "notificationdiv" class = "notificationdiv">
		</div>

<!-- NAMEDROPDOWN -->
		<div id = "namedropdown">
			<form action="userprofile.php">
				<input id = "viewprofile" class = "namedropdown" type = "submit" value = "View Profile">
			</form>
			<form action="index.php"> 
				<input id = "logout" class = "namedropdown" type = "submit" value = "Logout">
			</form>
		</div>

<!-- CLASS DROPDOWN -->
<!-- FOR PROFESSOR -->
		<div id = "dropdowndivPROF">
			<input id = "createclass" class = "dropdowncontent" type = "submit" value = "Create Class" name = "createclassBtn" 
				onclick = "toggle_visibility('creatediv'); Hide(editclassdiv); Hide(deleteclassdiv)">
			<input id = "editclass" class = "dropdowncontent" type = "submit" value = "Edit Class" 
				onclick = "toggle_visibility('editclassdiv'); Hide(creatediv); Hide(deleteclassdiv)">
			<input id = "deleteclass-dropdowncontent" class = "dropdowncontent" type = "submit" value = "Delete Class" 
				onclick = "toggle_visibility('deleteclassdiv'); Hide(creatediv); Hide(editclassdiv)">
		</div>
		<!-- EDIT CLASS SLIDESIDE DIV -->
		<div id = "editclassdiv">

			<!-- <div id = "editdropdowncards" class = "cards"> -->
				<!-- <label id = "editdropdowncardsclassname">Capstone</label>
				<input id = "editdropdowndeletebutton" type = "submit" value = "x"> -->
			<!-- </div> -->
		</div>
		<!-- DELETE CLASS SLIDESIDE DIC -->
		<div id = "deleteclassdiv">
			
		</div>

		<!-- CREATE CLASS SLIDESIDE DIV -->
		<div id = "creatediv">
			<form id = "create-class-form" method = "post" action = "CreateClasses.php">
                <input id = "classname" class = "form-textbox" type = "text" name = "classname" placeholder = "Classname"> 
        		<input id = "password" class = "form-textbox" type = "password" name = "password" placeholder = "Password">
        		<input id = "confirmationpassword" class = "form-textbox" type = "password" 
        		name = "confirmationpassword" placeholder = "Confirmation Password">
                <textarea id = "classdescription" name = "classdescription" placeholder = "Class Description"></textarea> 
                <input class = "create-cancel" type = "submit" value = "Create"> 
			</form>
			<input id = "cancel" class = "create-cancel" type = "submit" value = "Cancel" 
			onclick = "toggle_visibility('creatediv'); toggle_visibility('dropdowndiv')">
		</div>

<!-- FOR STUDENT -->
		<div id = "dropdowndivSTUDENT">
			<div id = "dropdowncards" class = "cards">
				<label id = "dropdowncardsclassname">Capstone</label>
				<input id = "dropdowndeletebutton" type = "submit" value = "x">
			</div>
		</div>
</div>
</body>
</html>
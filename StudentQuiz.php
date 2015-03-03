<?php	
	include "connect.php";
	session_start('user_credentials');
	// $subj = $_GET['subj'];
	$status = $_SESSION['POSITION'];
	$quizTitle = $_GET['quiz'];
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "StudentQuiz.css">
<link type = "text/css" rel = "stylesheet" href = "homepage.css">
<title>Quiz Time!</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<!-- <script type = "text/javascript" src="slimscroll.js"></script> -->
<script type = "text/javascript" src="jquery.blockUI.js"></script>
<script type = "text/javascript">
//GET SUBJECT
var subject = <?php echo json_encode($_GET['subj']);?>;
var quizTitle = <?php echo json_encode($quizTitle);?>;
function ChangeProfileName(){
	// alert("LALALALALA");
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME'])?>;

}
function Stud_Prof_Dropdowns(){
	var studDrop = document.getElementById('dropdowndivSTUDENT');
	var profDrop = document.getElementById('dropdowndivPROF');
	var status = <?php echo json_encode ($status); ?>;
	if (status == "Professor"){
		 if(profDrop.style.display == 'block'){
		          profDrop.style.display = 'none';
		      }else{
		          profDrop.style.display = 'block';
		      }
	}else if(status == "Student"){
		if(studDrop.style.display == 'block'){
		          studDrop.style.display = 'none';
		      }else{
		          studDrop.style.display = 'block';
		      }
	}
}
function LoadClassesForDropDown(){
	$(document).ready(function(){
		$.get( "checkclassesfordropdown.php", function(data) {
		  $( "#dropdowndivSTUDENT" ).html(data);
		});
	});
}

function LoadTitleAndNumberOfQuestions(){
	var title = document.getElementById('studentquiztitle');
	title.value = <?php echo json_encode($quizTitle)?>;
	var questions = document.getElementById('studentquestions');
	$.post("CountNumberofQuestions.php", {subj:subject, quiz:quizTitle}, function(data){
		$('#studentquestions').append(data);
		LoadQuestion();
	});
}


function LoadQuestion(){
	var questionsDropDown = document.getElementById('studentquestions');

	var radio_a = document.getElementById('radio_a');
	var radio_b = document.getElementById('radio_b');
	var text_a = document.getElementById('textarea_a');
	var text_b = document.getElementById('textarea_b');
	var radio_c = document.getElementById('radio_c');
	var radio_d = document.getElementById('radio_d');
	var text_c = document.getElementById('textarea_c');
	var text_d = document.getElementById('textarea_d');
	// var choice = questionsDropDown.getAttribute('value');
	// alert(questionsDropDown.value);
	radio_a.style.display = 'none';
	text_a.style.display = 'none';
	radio_b.style.display = 'none';
	text_b.style.display = 'none';
	radio_c.style.display = 'none';
	text_c.style.display = 'none';
	radio_d.style.display = 'none';
	text_d.style.display = 'none';
	text_a.disabled = true;
	text_a.value = "";
	text_a.placeholder ="";

	$.post("Get_Quiz_Question.php", {num:questionsDropDown.value, subj:subject, title:quizTitle}, function(data){
		data = jQuery.parseJSON(data);
		$('#studentquestionnumber').html(questionsDropDown.value+".");
		$('#studentquestion').val(data.question);
		var counter = data.num_of_choices;
		
		if (counter == 1){
			if(data.type_of_choice == "text"){
				text_a.style.display = 'block';
				text_a.disabled = false;
				text_a.value = "";
				text_a.placeholder ="Type answer here";
			}else{
				radio_a.style.display = 'block';
				text_a.style.display = 'block';
				radio_a.value = data.A;
				text_a.value = data.A;
			}
			
		}else if (counter == 2){
			radio_a.style.display = 'block';
			text_a.style.display = 'block';
			radio_b.style.display = 'block';
			text_b.style.display = 'block';
			radio_a.value = data.A;
			text_a.value = data.A;
			radio_b.value = data.B;
			text_b.value = data.B;

			radio_a.value = data.A;
			text_a.value = data.A;
			radio_b.value = data.B;
			text_b.value = data.B;
		}else if (counter == 3){
			radio_a.style.display = 'block';
			text_a.style.display = 'block';
			radio_b.style.display = 'block';
			text_b.style.display = 'block';
			radio_c.style.display = 'block';
			text_c.style.display = 'block';

			radio_a.value = data.A;
			text_a.value = data.A;
			radio_b.value = data.B;
			text_b.value = data.B;
			radio_c.value = data.C;
			text_c.value = data.C;
		}else if (counter == 4){
			radio_a.style.display = 'block';
			text_a.style.display = 'block';
			radio_b.style.display = 'block';
			text_b.style.display = 'block';
			radio_c.style.display = 'block';
			text_c.style.display = 'block';
			radio_d.style.display = 'block';
			text_d.style.display = 'block';

			radio_a.value = data.A;
			text_a.value = data.A;
			radio_b.value = data.B;
			text_b.value = data.B;
			radio_c.value = data.C;
			text_c.value = data.C;
			radio_d.value = data.D;
			text_d.value = data.D;
		}

	});
}

function GoBackToClass(){
	if (confirm('Are you sure? \nGoing back will forfiet your current attempt') == true) {
		window.location.href = "CardsContainer.php?subj="+subject;
    } else {
    }
}

function SubmitAnswer(){
	var radio_a = document.getElementById('radio_a');
	var text_a = document.getElementById('textarea_a');
	var radio_b = document.getElementById('radio_b');
	var text_b = document.getElementById('textarea_b');
	var radio_c = document.getElementById('radio_c');
	var text_c = document.getElementById('textarea_c');
	var radio_d = document.getElementById('radio_d');
	var text_d = document.getElementById('textarea_d');

	var dropDown = document.getElementById('studentquestions');
	var answer = $('input[name=choicecontainer]:checked', '#choicecontainer').val()
	alert(answer);
	$.post("SubmitQuizAnswer.php", {num:dropDown.value, ans:answer}, function(data){
		alert(answer);
		$('#header').html(data);
		// alert('SUBMITTED!');
	});
}

</script>
</head>
<body onload="ChangeProfileName(); LoadClassesForDropDown(); LoadTitleAndNumberOfQuestions();">
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
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" 
			onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv); Hide(deleteclassdiv)">
		<input id = "profilename" type = "button"  name = "profilename" 
			onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" 
			onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
	</div>

	<div id = "mainpage" onclick="Hide(notificationdiv); Hide(namedropdown);">
		<input id = "backbutton" type="button" value="<<" onclick = "GoBackToClass()">

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

<!-- ENROLL DESCRIPTION -->
		<form id = "classviewdiv" style="display:none">
			<div id = "classviewtitle"></div>
			<div id = "classviewprofessor"></div>
			<textarea id = "classviewdescription" value = "classviewdescription" disabled readonly></textarea>
			<input id = "classviewpassword" name = "classpass" type = "password" placeholder = "Password">
			<input id = "enrollbutton" type="button" value = "Enroll" class = "Enroll" onclick="Enroll()">
			<input id = "messagebox" type="text" disabled>
		</form>

<!-- TAKE QUIZ -->
		<div id = "takequizpopupdiv">
			<div id = "studentquiz">
				<div id = "questiondiv">
					<input id = "studentquiztitle" type = "text" value = "">
					<select id = "studentquestions" placeholder = "Quiz Number" onchange="LoadQuestion()">
						<!-- <option value = "1">1</option> -->
					</select>
				</div>
				<div id = "studentquiestionandanswer">
					<label id = "studentquestionnumber">1.</label>
					<textarea id = "studentquestion" type = "text" disabled></textarea>

					<form id="choicecontainer" name="choicecontainer">
						<input id = "radio_a" class = "radiobutt" type="radio" name="a" value="a" name="choicecontainer"> <input id="textarea_a" class = "studentanswerchoices" disabled><br>
						<input id = "radio_b" class = "radiobutt" type="radio" name="a" value="b" name="choicecontainer"> <input id="textarea_b" class = "studentanswerchoices" disabled><br>
						<input id = "radio_c" class = "radiobutt" type="radio" name="a" value="c" name="choicecontainer"> <input id="textarea_c" class = "studentanswerchoices" disabled><br>
						<input id = "radio_d" class = "radiobutt" type="radio" name="a" value="d" name="choicecontainer"> <input id="textarea_d" class = "studentanswerchoices" disabled><br>
						<input id = "nextbutton" type = "button" value = "Next" onclick="SubmitAnswer()">
					</form>
					
				</div>
			</div>
		</div>

	</div>
</div>
</body>
</html>
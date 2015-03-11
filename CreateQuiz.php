<?php	
	include "connect.php";
	session_start('user_credentials');
	// session_start("class_info");
	$status = $_SESSION['POSITION'];
	$title = $_GET['title'];

?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "CreateQuiz.css">
<title>Create A Quiz</title>
<script type="text/javascript" src="jquery_min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript" src="jquery.blockUI.js"></script>
<script type = "text/javascript">
// GET DATE
	var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = dd+'/'+mm+'/'+yyyy;
// END GET DATE
function ChangeProfileName(){
	// alert (<?php echo json_encode($_SESSION['PROFILEPIC']); ?>);
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
   	var quiz_title = document.getElementById('quiztitle');
   	quiz_title.value = <?php echo json_encode($title) ?>;
   	var time = document.getElementById('timelimit');
   	time.value = <?php echo json_encode('Time Limit: '.$_GET['time'].' min/s')?>;

}
function LoadClassesForEdit(){
	var userName = <?php echo json_encode($_SESSION['REALNAME']); ?>;
	$(document).ready(function(){
		$.post( "CheckCreatedClasses.php", {user:userName}, function(cards) {
			// alert ("LOADED");
		  $( "#editclassdiv" ).html(cards);
		});
	});
}
// function LoadClassesForDelete(){
// 	var userName = <?php echo json_encode($_SESSION['REALNAME']); ?>;
// 	$(document).ready(function(){
// 		$.post( "CheckCreatedClassesForDelete.php", {user:userName}, function(cards) {
// 			alert ("LOADED");
// 		  $( "#editclassdiv" ).html(cards);
// 		});
// 	});
// }
function LoadClasses(){
	$(document).ready(function(){
		$.get( "checkclasses.php", function(data) {
		  $( "#form-div" ).html(data);
		});
	});
}

function GetClassValue(classV){ 
		// alert(classV);	
		var enrollDiv = document.getElementById('classviewdiv');
		enrollDiv.action = "enroll.php?subject=" + classV;
		$('#classviewtitle').html(classV);
		$(document).ready(function(){
			$.post("GetClassInfo.php", {subj:classV}, function(author){
				$('#classviewprofessor').html(author);
			});
			$.post("GetClassDesc.php", {subj:classV}, function(desc){
				$('#classviewdescription').html('"' +desc+'"');
			});
			$.blockUI({ 
				message: $('#classviewdiv'),	
				css: {  display: 'block', 
						height: '70%', 
						width: '30%', 
						position: 'absolute', 
						top: '15%', 
						left: '35%', 
						border: 'none', 
						cursor: 'default',
						'background-color': 'rgba(0,0,0,0)',
						'-webkit-border-radius': '5px', 
			            '-moz-border-radius': '5px', }
			});  
			$('.blockOverlay').attr('title','Click to unblock').click($.unblockUI); 
		});
		
		var enrollButt = document.getElementById('Enroll');
		// enrollButt.style.visibility = 'visible';
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
function BlurNumberOfChoices(){
	var choicesComboBox = document.getElementById('checkchoices');
	var numberOfChoicesCB = document.getElementById('numberchoices');
	// alert (choicesComboBox.value);
	if (choicesComboBox.value == "text"){
		numberOfChoicesCB.disabled = true;
		numberOfChoicesCB.value = 1;
		$('#rightanswerlabel').html('Type the right answer:');
	}else{
		$('#rightanswerlabel').html('Select the right answer:');
		numberOfChoicesCB.disabled = false;
	}
}

function CreateChoices(){
	// var radiobuttons =  document.getElementsByClassName('radiobutt');
	// var radios = Array.prototype.slice.call(radiobuttons);
	var numberOfChoicesCB = document.getElementById('numberchoices');
	var choicesComboBox = document.getElementById('checkchoices');
	var type = choicesComboBox.value;
	var num = numberOfChoicesCB.value;
	$.post("CreateChoices.php", {numOfChoices:num, typeOfChoice:type},function(choices){
		$('#answerchoicesform').html(choices);
	});
}

function CreateNextQuestion(){
	var choice = document.getElementById('checkchoices');
	var choiceType = choice.value;

	var subj = <?php echo json_encode($_GET['subj']); ?>;
	var quiz_title = document.getElementById('quiztitle');
	var quiz_question = document.getElementById('questiontext');
	var no_of_choices = document.getElementById('numberchoices');
	var time = <?php echo json_encode($_GET['time'])?>;

	if (choiceType == "text"){
		var quiz_choice_0 = document.getElementById('answer_0');
		$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, 
										question:quiz_question.value, ans:quiz_choice_0.value, timeLimit:time},
				 function(data){
				 	Clear();
		});
	}else if(choiceType == "checkbox"){
		if(no_of_choices.value == "1"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value, ans:answer, timeLimit:time},
					 function(data){
					 	Clear();
			});
		}else if(no_of_choices.value == "2"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}else if(no_of_choices.value == "3"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var quiz_choice_2 = document.getElementById('answer_2');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, c:quiz_choice_2.value, ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}else if(no_of_choices.value == "4"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var quiz_choice_2 = document.getElementById('answer_2');
			var quiz_choice_3 = document.getElementById('answer_3');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, c:quiz_choice_2.value, d:quiz_choice_3.value,
										 ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}
	}else if(choiceType == "radio"){
		if(no_of_choices.value == "1"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value, ans:answer, timeLimit:time},
					 function(data){
					 	Clear();
			});
		}else if(no_of_choices.value == "2"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}else if(no_of_choices.value == "3"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var quiz_choice_2 = document.getElementById('answer_2');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, c:quiz_choice_2.value, ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}else if(no_of_choices.value == "4"){
			var quiz_choice_0 = document.getElementById('answer_0');
			var quiz_choice_1 = document.getElementById('answer_1');
			var quiz_choice_2 = document.getElementById('answer_2');
			var quiz_choice_3 = document.getElementById('answer_3');
			var answer = $('input[name=answerchoicesform]:checked', '#answerchoicesform').val()
			$.post("InsertQuizItem.php", {num_of_choices:no_of_choices.value, type:choiceType, title:quiz_title.value, subject:subj, question:quiz_question.value,
										a:quiz_choice_0.value, b:quiz_choice_1.value, c:quiz_choice_2.value, d:quiz_choice_3.value,
										 ans:answer, timeLimit:time},
				 function(data){
				 	Clear();
			});
		}
	}
	
} 
var counter = 1;
function Clear(){
	// alert('Clear!');
	counter = counter + 1;
	$('#questionnumber').html(counter + ".");
	// $(':input').not(":button").val('');
	$('#questiontext').val(" ");
	var questions = document.getElementById('questiontext');
	questions.placeholder = "Question";
	$('#checkchoices').val('text');
	$('#numberchoices').val('1');
	$('#questioncreated').append('<option value = "'+counter+'">'+counter+'</option>');
	$('#questioncreated').val(''+counter+'');
	// BlurNumberOfChoices();	
	CreateChoices();
}
function ChangeRadioButtonValue(text, choice){
	var radio = document.getElementById('radio_'+choice);
	radio.value = text;
}
function JumpToQuestion(){
	var subject = <?php echo json_encode($_GET['subj']); ?>;
	var questionDropDown = document.getElementById('questioncreated');
	var quizTitle = document.getElementById('quiztitle');
	// alert("jump to class!");
	$.post("Get_Quiz_Question.php", {num: questionDropDown.value, subj:subject, title:quizTitle.value},function(data){
		data = jQuery.parseJSON(data);
		// alert(data.a);
		$('#questiontext').val(data.question);
		$('#checkchoices').val(data.type_of_choice);
		$('#numberchoices').val(data.num_of_choices);
		$('#questionnumber').html(data.num +".");
		// alert(data.A);
		CreateChoicesForJumping(data.A, data.B, data.C, data.D, data.Ans);
		// alert(data.C);
		// $('#answer_0').val("data.A");
	});
}
function CreateChoicesForJumping(A,B,C,D,Ans){
	// var radiobuttons =  document.getElementsByClassName('radiobutt');
	// var radios = Array.prototype.slice.call(radiobuttons);
	var numberOfChoicesCB = document.getElementById('numberchoices');
	var choicesComboBox = document.getElementById('checkchoices');
	var type = choicesComboBox.value;
	var num = numberOfChoicesCB.value;
	$.post("CreateChoices.php", {numOfChoices:num, typeOfChoice:type},function(choices){
		$('#answerchoicesform').html(choices);
		$('#answer_0').val(A);
		$('#answer_1').val(B);
		$('#answer_2').val(C);
		$('#answer_3').val(D);
		// var form = document.getElementById('answerchoicesform');
		// $('#answerchoicesform').val(Ans);
		// form.value = Ans;
	});
}
function CreateCard(){
	// alert ("PASOK!");
	var className = <?php echo json_encode($_GET['subj']); ?>;
	var quizTitle = <?php echo json_encode($_GET['title']); ?>;
	var listName = <?php echo json_encode($_GET['list']); ?>;
	$(document).ready(function(){
		$.post("add_quiz_as_card.php?subj=" + className +"&list=" + listName +"", {quizName:quizTitle}, function(card){
			// alert(quizTitle);
	// 		// $("body").html(card);
	// 		alert ("Quiz Created!");
			window.location.href = "CardsContainer.php?subj="+className;
		});
	});
	
}
</script>
</head>
<body  onload="ChangeProfileName(); LoadClasses(); LoadClassesForEdit(); BlurNumberOfChoices();CreateChoices(); ">
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
			onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv)">
		<input id = "profilename" type = "button"  name = "profilename" 
			onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" 
			onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
	</div>
	<div id = "mainpage" onclick="Hide(notificationdiv); Hide(namedropdown);">

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
			<div id = "editdropdowncards" class = "cards">
				<label id = "editdropdowncardsclassname">Capstone</label>
				<input id = "editdropdowndeletebutton" type = "submit" value = "x">
			</div>
		</div>

		<!-- DELETE CLASS SLIDESIDE DIC -->
		<div id = "deleteclassdiv">
			<div id = "deletedropdowncards">
				<label id = "deletedropdowncardsclassname" class = "deletedropdowncardsclassname">Capstone</label>
				<input id = "deletedropdowndeletebutton" class = "deletedropdowndeletebutton" type = "submit" value = "x">
			</div>
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

	<!-- CREATE QUIZ -->
	<div id = "createquizdiv">
		<form id = "questiondiv">
			<input id = "quiztitle" type = "text" placeholder = "Title" disabled>
			<input id = "timelimit" type = "text" placeholder = "asdasd" disabled>
			<select id = "questioncreated" placeholder = "Quiz Number" onchange="JumpToQuestion()">
				<option value = "1">1</option>
			</select>

			<label id = "questionnumber">1.</label>
			<textarea id = "questiontext" name="questiontext" type = "text" placeholder = "Question"></textarea>
			
			<select id = "checkchoices" placeholder = "Choices" onchange="BlurNumberOfChoices();CreateChoices()">			
				<option value="text">Text Box</option>
				<!-- <option value="checkbox">Check Box</option> -->
				<option value="radio">Radio Button</option>
			</select>

			<select id = "numberchoices" placeholder = "Number Choices" onchange="CreateChoices();"  disabled>			
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>

		</form>
		<div id = "questionchoicesdiv">
			<label id = "rightanswerlabel">Select the right answer:</label>
			<form id = "answerchoicesform" name="answerchoicesform">
				<!-- <input id = "radio" class = "radiobutt" type="radio" name="a" value="a" >
				<input id = "answer" class = "answerchoicestext" type = "text"><br> -->
<!-- 
				<input id = "radio_b" class = "radiobutt" type="radio" name="b" value="b" >
				<input id = "answer_b" class = "answerchoicestext" type = "text"><br>

				<input id = "radio_c" class = "radiobutt" type="radio" name="c" value="c" >
				<input id = "answer_c" class = "answerchoicestext" type = "text"><br>

				<input id = "radio_d" class = "radiobutt" type="radio" name="d" value="d" >
				<input id = "answer_d" class = "answerchoicestext" type = "text"> -->
			</form> 
			<form id = "buttonsform">
				<!-- <input id = "clearbutton" type = "submit" value = "Clear"> -->
				<input id = "nextbutton" type = "button" value = "Next" onclick="CreateNextQuestion()">
				<input id = "publishbutton" type="button" value = "Publish" onclick="CreateCard()">
			</form>
		</div>
	</div>


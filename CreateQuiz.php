<?php	
	include "connect.php";
	session_start('user_credentials');
	// session_start("class_info");
	$status = $_SESSION['POSITION'];
	

?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "CreateQuiz.css">
<title>Home</title>
<script type="text/javascript" src="jquery_min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript" src="jquery.blockUI.js"></script>
<script type = "text/javascript">
function ChangeProfileName(){
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
}
function LoadClassesForEdit(){
	var userName = <?php echo json_encode($_SESSION['REALNAME']); ?>;
	$(document).ready(function(){
		$.post( "CheckCreatedClasses.php", {user:userName}, function(cards) {
			alert ("LOADED");
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
function UnEnroll(value){
	// alert(value);
	if(confirm('Unenroll from this class?')){
		$.post("unenroll.php",{classV:value},function(classdata){
		// $("#form-div").html(classdata);
		window.location.href = "homepage.php";
	});
	}else{
		window.location.href = "homepage.php";
	}
	

}
function GoToClass(classV){
	// alert ("Go To "+ classV);
	window.location.href = "CardsContainer.php?subj=" + classV;
}

</script>
</head>
<body  onload="ChangeProfileName(); LoadClasses(); LoadClassesForEdit(); LoadClassesForDelete()">
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
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv)">
		<input id = "profilename" type = "button"  name = "profilename" onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
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
			<form action="index.html"> 
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
			<input id = "quiztitle" type = "text" placeholder = "Title">
			<label id = "questionnumber">1.</label>
			<textarea id = "questiontext" type = "text" placeholder = "Question"></textarea>
			<select id = "checkchoices" placeholder = "Choices">			
				<option value="textbox">Text Box</option>
				<option value="checkbox">Check Box</option>
				<option value="radiobutton">Radio Button</option>
			</select>
			<select id = "numberchoices" placeholder = "Number Choices">			
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="4">4</option>
			</select>
		</form>
		<div id = "questionchoicesdiv">
			<label id = "rightanswerlabel">Select the right answer.</label>
			<form id = "answerchoicesform">
				<input id = "checkbox" class = "checkbox" type="radio" name="blue" value="blue" checked>
				<input id = "answerchoicestext" class = "answerchoicestext" type = "text">
				<input id = "checkbox" class = "checkbox" type="radio" name="blue" value="blue" checked>
				<input id = "answerchoicestext" class = "answerchoicestext" type = "text">
			</form> 
			<form id = "buttonsform">
				<input id = "clearbutton" type = "submit" value = "Clear">
				<input id = "nextbutton" type = "submit" value = "Next">
				<input id = "publishbutton" type = "submit" value = "Publish">
			</form>
		</div>
	</div>


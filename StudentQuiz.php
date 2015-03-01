<?php	
	include "connect.php";
	session_start('user_credentials');
	// session_start("class_info");
	$status = $_SESSION['POSITION'];

?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "StudentQuiz.css">
<title>Home</title>
<script type="text/javascript" src="jquery_min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript" src="jquery.blockUI.js"></script>
<script type = "text/javascript">
function ChangeProfileName(){
	// alert (<?php echo json_encode($_SESSION['PROFILEPIC']); ?>);
	var no_classes_enrolled_text = document.getElementById('text');
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
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
function EditClass(classV){
	alert(classV.id);
}
function LoadClassesForDelete(){
	var userName = <?php echo json_encode($_SESSION['REALNAME']); ?>;
	$(document).ready(function(){
		$.post( "CheckCreatedClassesForDelete.php", {user:userName}, function(cards) {
			// alert ("LOADED");
		  $( "#deleteclassdiv" ).html(cards);
		});
	});
}
function LoadClasses(){
	$(document).ready(function(){
		$.get( "checkclasses.php", function(data) {
		  $( "#form-div" ).html(data);
		  var classes_enrolled = document.getElementsByClassName('count');
		  var classes = Array.prototype.slice.call(classes_enrolled);
		  // alert (classes.length);
		  if (classes.length == 0){
		     $('#text').html('You are not yet enrolled in any class.');
		  }else{
			$('#text').html('');		
		  }
		});
	});
}

function GetClassValue(classV){ 
		var messagebox = document.getElementById('messagebox');
		var passText = document.getElementById('classviewpassword');
		passText.value = "";
		messagebox.value = "";
		var title = document.getElementById("classviewtitle");
		title.value = classV;
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
		
		// var enrollButt = document.getElementById('Enroll');
		// enrollButt.style.visibility = 'visible';
}

function Enroll(){
	var title = document.getElementById("classviewtitle");
	var realTitle = title.value;
	var passText = document.getElementById("classviewpassword");
	var messagebox = document.getElementById('messagebox');
	passInput = passText.value;
	// alert(title.value);
		$.post("enroll.php", {subject:realTitle, classpass:passInput}, function(message){
			messagebox.value = message;
			if (message == "Enrolled successfully!"){
				window.location.replace("homepage.php");
			}
			
		});

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
function LoadQuestions(){
	var messagebox = document.getElementById('studentquiztitle');
	var messagebox = document.getElementById('studentquestions');
}
function GetNumberofQuestions(){
	var subject = <?php echo json_encode($_GET['Subj'])?>;
	var messagebox = document.getElementById('studentquestions');
	// alert(subject);
	$.post("CountNumberofQuestions.php", {subj:subject, title:'finals'}, function(data){
		alert(data);
	});
}


</script>
</head>
<body  onload="ChangeProfileName(); LoadClasses(); LoadClassesForEdit(); LoadClassesForDelete(); LoadQuestions(); GetNumberofQuestions()">
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
					<input id = "studentquiztitle" type = "text" value = "Quiz 1">
					<select id = "studentquestions" placeholder = "Quiz Number" onchange="JumpToQuestion()">
						<option value = "1">1</option>
					</select>
				</div>
				<div id = "studentquiestionandanswer">
					<label id = "studentquestionnumber">1.</label>
					<textarea id = "studentquestion" type = "text" disabled>Why did Ferdinand Marcos declare Martial Law?</textarea>
					<input id = "radio" class = "radiobutt" type="radio" name="a" value="a" >
					<textarea id = "studentanswerchoices" disabled>Ewan</textarea>
					<input id = "nextbutton" type = "submit" value = "Next">
				</div?
			</div>
		</div>

	</div>
</div>
</body>
</html>
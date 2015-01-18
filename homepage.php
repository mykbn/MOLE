<?php	
	include "connect.php";
	session_start('user_credentials');
	$status = $_SESSION['POSITION'];
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "Homepage.css">
<title>Home</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript" src="jquery.blockUI.js"></script>
<script type = "text/javascript">
function ChangeProfileName(){
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
}
function LoadClasses(){
	$(document).ready(function(){
		$.get( "checkclasses.php", function(data) {
		  $( "#form-div" ).html(data);
		});
	});
}
function GetClassValue(classV){ 	
		var enrollDiv = document.getElementById('classviewdiv');
		enrollDiv.action = "enroll.php?subject=" + classV;
		$(document).ready(function(){
			$.blockUI({ 
				message: $('#classviewdiv'),	
				css: {  display: 'block', 
						height: '60%', 
						width: '40%', 
						position: 'absolute', 
						top: '15%', 
						left: '30%', 
						border: 'none', 
						'-webkit-border-radius': '5px', 
			            '-moz-border-radius': '5px', }
			});  
			$('.blockOverlay').attr('title','Click to unblock').click($.unblockUI); 
		});
		
		var enrollButt = document.getElementById('Enroll');
		enrollButt.style.visibility = 'visible';
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
	alert(value);

}
function GoToClass(classV){
	// alert ("Go To "+ classV);
	window.location.href = "CardsContainer.php?subj=" + classV;
}

</script>
</head>
<body  onload="ChangeProfileName(); LoadClasses()">
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
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" onclick = "Stud_Prof_Dropdowns()">
		<input id = "profilename" type = "button"  name = "profilename" onclick = "toggle_visibility('namedropdown')">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" onclick = "toggle_visibility('notificationdiv')">
	</div>

	<div id = "mainpage">
<!-- NOTIFICATIONSIDE -->
		<div id = "notificationdiv" class = "notificationdiv">
		</div>

<!-- NAMEDROPDOWN -->
		<div id = "namedropdown">
			<input id = "viewprofile" class = "namedropdown" type = "submit" value = "View Profile">
			<form action="index.html"> 
				<input id = "logout" class = "namedropdown" type = "submit" value = "Logout">
			</form>
		</div>

<!-- SEARCH -->
		<div id = "searchbar">
			<img id = "searchicon" src = "_assets/SearchIcon.png">
			<form method ="post" action = "Homepage.html" id = "searchform">
				<input id = "enrollme" type = "textbox" placeholder = "Search" name = "searchTxt" onkeydown = "searchq()">	
				<select id ="output" size = "5" style = "display:none" name = "output"></select>		
			</form>	
		</div>
		<p id = "classes">My Classes</p>
			<div id = "form-div">
			</div>

<!-- CLASS DROPDOWN -->
<!-- FOR PROFESSOR -->
		<div id = "dropdowndivPROF">
			<input id = "createclass" class = "dropdowncontent" type = "submit" value = "Create Class" = name = "createclassBtn" 
				onclick = "toggle_visibility('creatediv')">
			<input id = "editclass" class = "dropdowncontent" type = "submit" value = "Edit Class">
			<input id = "deleteclass-dropdowncontent" class = "dropdowncontent" type = "submit" value = "Delete Class">
		</div>
		<div id = "creatediv">
			<form id = "create-class-form" method = "post" action = "CreateClasses.php">
                <input id = "classname" class = "form-textbox" type = "text" name = "classname" placeholder = "Classname"> 
        		<input id = "password" class = "form-textbox" type = "password" name = "password" placeholder = "Password">
        		<input id = "confirmationpassword" class = "form-textbox" type = "password" name = "confirmationpassword" placeholder = "Confirmation Password">
                <textarea id = "classdescription" name = "classdescription" placeholder = "Class Description"></textarea> 
                <input class = "create-cancel" type = "submit" value = "Create"> 
			</form>
			<input id = "cancel" class = "create-cancel" type = "submit" value = "Cancel" onclick = "toggle_visibility('creatediv'); toggle_visibility('dropdowndiv')">
		</div>

<!-- FOR STUDENT -->
		<div id = "dropdowndivSTUDENT">
			<div id = "dropdowncards" class = "cards">
				<label id = "dropdowncardsclassname"><center>Capstone</center></label>
			</div>
		</div>

<!-- POP-UP -->
		<form id = "classviewdiv" method="POST"  style="display:none">
			<input id = "Enroll" type="submit" value = "Enroll" class="Enroll">
		</form>

	</div>
</div>
</body>
</html>
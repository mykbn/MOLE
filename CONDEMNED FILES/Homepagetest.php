<?php	
	session_start();
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "Homepage.css">
<title>Home</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript">
function CHANGE(){
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['UNAME']); ?>;
}
  
</script>
</head>
<body  onload="CHANGE()">
<div id="main">
	<div id = "header" onclick="Hide()">
		<div id = "logo-mole">
			<img id = "logo" src = "_assets/Logo.png">
			<img id = "mole" src = "_assets/Mole.png">
		</div>

		<div id = "profilepic-div">
			<img id = "profilepicture" src="_assets/ProfilePicture.png">
		</div>

		<input id = "class" type = "submit" value = "Classes" name = "classBtn" onclick = "toggle_visibility('dropdowndiv')">
		<input id = "profilename" type = "button"  name = "profilename">
		<form id = "class-form" method = "post">
			<input id = "notification" type = "submit" value = "" name = "notificationBtn">
		</form>

		<div id = "dropdowndiv">
			<input id = "createclass" type = "submit" value = "Create Class" = name = "createclassBtn" 
				onclick = "toggle_visibility('creatediv')">
		</div>

		<div id = "creatediv">
			<form id = "create-class-form" method = "post" action = "CreateClasses.php">
	                <input id = "classname" class = "form-textbox" type = "text" name = "classname" placeholder = "Classname"> 
	        		<input id = "password" class = "form-textbox" type = "password" name = "password" placeholder = "Password">
	        		<input id = "confirmationpassword" class = "form-textbox" type = "password" name = "confirmationpassword" placeholder = "Confirmation Password">
	                <textarea id = "classdescription" name = "classdescription" placeholder = "Class Description"></textarea> 
	                <input class = "create-cancel" type = "submit" value = "Create"> 
	                
			</form>
			<input class = "create-cancel" type = "submit" value = "Cancel" onclick = "toggle_visibility('creatediv'); toggle_visibility('dropdowndiv')">
		</div>

	</div>

	<div id = "mainpage">
		<div id = "searchbar">
				<img id = "searchicon" src = "_assets/SearchIcon.png">
				<form method ="post" action = "Homepage.html" id = "searchform">
					<input id = "enrollme" type = "textbox" placeholder = "Search" name = "searchTxt" onkeydown = "searchq()">	
					<select id ="output" size = "5" style = "display:none" name = "output">
					</select>		
				</form>	
		</div>

		<p id = "classes">My Classes</p>
			<form id = "form-div">
				<p id = "capstone">Capstone</p>
				<p id = "montero">	Montero</p>
				<input id = "cards" type = "submit" value = "" name = "cardsBtn">
			</form>

		<div id = "class-div">
		</div>

	</div>
</div>
</body>
</html>
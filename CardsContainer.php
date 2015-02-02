<?php	
	include "connect.php";
	session_start('user_credentials');
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "CardsContainer.css">
<title>Home</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript">
function ChangeProfileName(){
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
}
function ChangeClassName(){
	var className = document.getElementById('classname');
	className.value = <?php echo json_encode($_GET['subj']); ?>;
}
</script>

</head>
<body onload = "ChangeProfileName(); ChangeClassName()">
<!-- HEADER -->
	<div id = "header" onclick="Hide()">
		<div id = "logo-mole">
			<img id = "logo" src = "_assets/Logo.png">
			<img id = "mole" src = "_assets/Mole.png">
		</div>
		<div id = "profilepic-div">
			<img id = "profilepicture" src="_assets/ProfilePicture.png">
		</div>
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" onclick = "toggle_visibility('dropdowndiv')">
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
		
<!-- CARDSCONTAINER -->
		<input id = "classname" type="text" value="" readonly>

		<div id = "cards-container-div">
			<input id = "containertitle" type = "text" name = "containertitle" placeholder = "Container Title">
			<input id = "cardtitle" type = "textbox" placeholder = "Card Title">
				<div id = "buttondiv">
					<input id = "addcard" class = "addbutton" type = "submit" value = "Add">
				</div>
			<div id = "card">
			</div>
		</div>
		<input id = "addcontainer" type = "textbox" placeholder = "Add List">
					<input id = "addbuttoncontainer" class = "addbutton" type = "submit" value = "Add">
				</div>
	</div>
</div>
</body>
</html>
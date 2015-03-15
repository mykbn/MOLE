<?php
	include 'connect.php';
	include 'CreateUserTable.php';
	
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "login.css">
<title>Welcome to MOLE!</title>
</head>
<script type="text/javascript">
	window.onload = function(){
		var logintextbox = document.getElementById('emailTxt');
		logintextbox.value = "";
		logintextbox.setAttribute("autocomplete", "off");
		var passtextbox = document.getElementById('passTxt');
		passtextbox.value = "";
		passtextbox.setAttribute("autocomplete", "off");
	}
</script>
<body>
	<div id = "main">
		<img src="_assets/Logo.png" class="centered-image">
		<form id = "create-form" method = "post" action="CreateUserAccount.html">
			<input id = "create" type = "submit" value = "Create" name = "createBtn">
		</form>
		<div id = "form" class = "centered">
			<form id = "login-form" method = "POST" action="login.php" name = "login-form" autocomplete="off">
				<input id = "emailTxt" type = "textbox" placeholder = "Username" name = "emailTxt" class = "emailtextbox" autocomplete="off">
				<input id = "passTxt" type = "password" placeholder = "Password" name="passTxt" class="passtextbox" autocomplete="off">
				<input id = "loginbutton" type = "submit" value = "Login" name = "loginBtn">
			</form>
		</div>	
	</div>
</body>
</html>
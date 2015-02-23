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
// window.onload = function(){
// 	// window.location.href = "CreateUserTable.php";
// 	$.get("CreateUserTable.php", function(){

// 	});
// }
	// function FirstLastName(){
	// 	$.post('login.php', {user: login-form.emailTxt.value},
	// 		function(name){
	// 			$("#profilename").html(name);
	// 		});
	// }
</script>
<body>
	<div id = "main">
		<img src="_assets/Logo.png" class="centered-image">
		<form id = "create-form" method = "post" action="CreateUserAccount.html">
			<input id = "create" type = "submit" value = "Create" name = "createBtn">
		</form>
		<div id = "form" class = "centered">
			<form id = "login-form" method = "post" action="login.php" name = "login-form">
				<input id = "emailTxt" type = "textbox" placeholder = "Username" name = "emailTxt" class = "emailtextbox">
				<input id = "passTxt" type = "password" placeholder = "Password" name="passTxt" class="passtextbox">
				<input id = "loginbutton" type = "submit" value = "Login" name = "loginBtn">
			</form>
		</div>	
	</div>
</body>
</html>
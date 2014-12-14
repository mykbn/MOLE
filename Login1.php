<?php
include "connect.php";
$create_users =
"CREATE TABLE IF NOT EXISTS users
(
    ID INT NOT NULL AUTO_INCREMENT,
    Student No. INT(8) NOT NULL,
    Firstname TEXT(50) NOT NULL,
    Lastname TEXT(50) NOT NULL,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    School_College TEXT(50) NOT NULL,
    Position TEXT(50) NOT NULL,
    PRIMARY KEY(ID)
)";
$create_tbl = $conn->query($create_users);
// echo"USERS CREATED";
mysqli_close($conn);
?>

<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "login.css">
<title></title>
</head>
<script type="text/javascript">
	function ClearEmailOnFocus(){
		var userNameTextBox = document.getElementById("emailTxt");
		var passWordTextBox = document.getElementById("passTxt");
		if(userNameTextBox.value=='Username'){
			userNameTextBox.value='';	
		} 
		if (passWordTextBox.value == ''){
			passWordTextBox.value = 'Password';
			passWordTextBox.type = "text";
		}
	}
	function ClearPassOnFocus(){
		var userNameTextBox = document.getElementById("emailTxt");
		var passWordTextBox = document.getElementById("passTxt");
		if(passWordTextBox.value == 'Password'){
			passWordTextBox.value = '';	
			passWordTextBox.type = "password";
		} 
		if (userNameTextBox.value == ''){
			userNameTextBox.value = 'Username';
		}
	}
</script>
<body>
	<div id = "main">
		<img src="_assets/Logo.png" class="centered-image">
		<form id = "create-form" method = "post" action="Create.html">
			<input id = "create" type = "submit" value = "Create" name = "createBtn">
		</form>
		<div id = "form" class = "centered">
			<form id = "login-form" method = "post" action="login.php">
				<input id = "emailTxt" type = "textbox" value = "Username" name = "emailTxt" class = "emailtextbox" onfocus = "ClearEmailOnFocus()">
				<input id = "passTxt" type = "text" value = "Password" name = "passTxt" class = "passtextbox" onfocus = "ClearPassOnFocus()">
				<input id = "loginbutton" type = "submit" value = "Login" name = "loginBtn">
			</form>
		</div>	
	</div>
</body>
</html>
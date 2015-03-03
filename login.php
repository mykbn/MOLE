<?php

include "connect.php";
session_start('user_credentials');
// include "CheckDatabase.php";
// include "CreateDatabase.php";

$inputUsername = $_POST['emailTxt'];
$inputPassword = $_POST['passTxt'];
$_SESSION['UNAME'] = $inputUsername;
$_SESSION['ID'] = '';
$_SESSION['POSITION'] = '';
$Position = '';
 $_SESSION['PROFILEPIC'] = '';
 $_SESSION['STATUS'] = '';
//Position
$queryPosition = "SELECT Position FROM professors WHERE '$inputUsername' = Username";
$resultPosition = mysqli_query($conn,$queryPosition)
	or die("Error: ".mysqli_error($conn));
// $rowPosition = mysqli_fetch_array($resultPosition);
// $serverPosition = $rowPosition["Position"];
$count = mysqli_num_rows($resultPosition);

//Admin
$queryAdmin = "SELECT Position FROM admin WHERE '$inputUsername' = Username";
$resultAdmin = mysqli_query($conn,$queryAdmin)
	or die("Error: ".mysqli_error($conn));
$adminCount = mysqli_num_rows($resultAdmin);

if ($adminCount >= 1){
	header("Location:admin.php");
}else{
	//Check if student or professor
	if($count == 0){
		$Position = 'Student';
	}else{
		$Position = 'Professor';
	}

	if ($Position == 'Professor'){
		$_SESSION['POSITION'] = 'Professor';

		//GET FIRSTNAME
		$queryFName = "SELECT Firstname FROM professors WHERE '$inputUsername' = Username";
		$resultFName = mysqli_query($conn,$queryFName)
			or die("Error: ".mysqli_error($conn));
		$rowFName = mysqli_fetch_array($resultFName);
		$serverFName = $rowFName["Firstname"];

		//GET LASTNAME
		$queryLName = "SELECT Lastname FROM professors WHERE '$inputUsername' = Username";
		$resultLName = mysqli_query($conn,$queryLName)
			or die("Error: ".mysqli_error($conn));
		$rowLName = mysqli_fetch_array($resultLName);
		$serverLName = $rowLName["Lastname"];

		$_SESSION['REALNAME'] = $serverFName." ".$serverLName;
		
		//Username
		$queryUsername = "SELECT * FROM professors WHERE '$inputUsername' = Username";
		$resultUsername = mysqli_query($conn,$queryUsername)
			or die("Error: ".mysqli_error($conn));
		$rowUser = mysqli_fetch_array($resultUsername);
		$serverUser = $rowUser["Username"];

		//Password
		$queryPassword = "SELECT * FROM professors WHERE '$inputPassword' = Password";
		$resultPassword = mysqli_query($conn,$queryPassword)
			or die("Error: ".mysqli_error($conn));
		$rowPassword = mysqli_fetch_array($resultPassword);
		$serverPassword = $rowPassword["Password"];

		//GET ID. NO
		$queryID = "SELECT ID_No FROM professors WHERE '$inputUsername' = Username";
		$resultID = mysqli_query($conn,$queryID)
			or die("Error: ".mysqli_error($conn));
		$rowID = mysqli_fetch_array($resultID);
		$serverID = $rowID["ID"];
		$_SESSION['ID'] = $rowID[0];

		//profile
		$queryprofile = "SELECT Profile FROM professors WHERE '$inputUsername' = Username";
		$resultprofile = mysqli_query($conn,$queryprofile)
			or die("Error: ".mysqli_error($conn));
		$rowprofile = mysqli_fetch_array($resultprofile);
		$serverprofile = $rowID["Profile"];
		if ($rowprofile[0] == ''){
			$_SESSION['PROFILEPIC'] = "images\profile\default.jpg";
		}else{
			$_SESSION['PROFILEPIC'] = $rowprofile[0];
		}

		//Verified?
		$queryStat = "SELECT Status FROM professors WHERE '$inputUsername' = Username";
		$resultStat = mysqli_query($conn,$queryStat)
			or die("Error: ".mysqli_error($conn));
		$rowStat = mysqli_fetch_array($resultStat);
		$serverStat = $rowStat["Status"];
		$_SESSION['STATUS'] = $serverStat;
		

		//Check if login credentials are correct
		if($inputUsername == $serverUser && $inputPassword == $serverPassword){
			header("Location:homepage.php?p=professor");
		}else{
			readfile("index.php");
			echo '<label id="invalid"> Invalid Login </label>';
		}
	}else if ($Position == 'Student'){
		$_SESSION['POSITION'] = 'Student';
		
		//GET FIRSTNAME
		$queryFName = "SELECT Firstname FROM students WHERE '$inputUsername' = Username";
		$resultFName = mysqli_query($conn,$queryFName)
			or die("Error: ".mysqli_error($conn));
		$rowFName = mysqli_fetch_array($resultFName);
		$serverFName = $rowFName["Firstname"];

		//GET LASTNAME
		$queryLName = "SELECT Lastname FROM students WHERE '$inputUsername' = Username";
		$resultLName = mysqli_query($conn,$queryLName)
			or die("Error: ".mysqli_error($conn));
		$rowLName = mysqli_fetch_array($resultLName);
		$serverLName = $rowLName["Lastname"];

		$_SESSION['REALNAME'] = $serverFName." ".$serverLName;

		//Username
		$queryUsername = "SELECT * FROM students WHERE '$inputUsername' = Username";
		$resultUsername = mysqli_query($conn,$queryUsername)
			or die("Error: ".mysqli_error($conn));
		$rowUser = mysqli_fetch_array($resultUsername);
		$serverUser = $rowUser["Username"];

		//Password
		$queryPassword = "SELECT * FROM students WHERE '$inputPassword' = Password";
		$resultPassword = mysqli_query($conn,$queryPassword)
			or die("Error: ".mysqli_error($conn));
		$rowPassword = mysqli_fetch_array($resultPassword);
		$serverPassword = $rowPassword["Password"];

		//GET ID. NO
		$queryID = "SELECT ID_No FROM students WHERE '$inputUsername' = Username";
		$resultID = mysqli_query($conn,$queryID)
			or die("Error: ".mysqli_error($conn));
		$rowID = mysqli_fetch_array($resultID);
		$serverID = $rowID["ID"];
		$_SESSION['ID'] = $rowID[0];

		//profile
		$queryprofile = "SELECT Profile FROM students WHERE '$inputUsername' = Username";
		$resultprofile = mysqli_query($conn,$queryprofile)
			or die("Error: ".mysqli_error($conn));
		$rowprofile = mysqli_fetch_array($resultprofile);
		$serverprofile = $rowID["Profile"];
		if ($rowprofile[0] == ''){
			$_SESSION['PROFILEPIC'] = "images\profile\default.jpg";
		}else{
			$_SESSION['PROFILEPIC'] = $rowprofile[0];
		}

		//Check if login credentials are correct
		if($inputUsername == $serverUser && $inputPassword == $serverPassword){
			header("Location:homepage.php?p=student");
		}else{
			readfile("index.php");
			echo '<label id="invalid"> Invalid Login </label>';
		}
	}
}


mysqli_close($conn);

?>

<?php
session_start();
include "connect.php";
$inputClassName = $_POST['classname'];
$inputPassword = $_POST['password'];
$inputConfirmationPassword = $_POST['confirmationpassword'];
$inputClassDescription = $_POST['classdescription'];
$user = $_SESSION['UNAME'];

$create_classes =
"CREATE TABLE IF NOT EXISTS classes
(
    ID INT NOT NULL AUTO_INCREMENT,
    Classes VARCHAR(100) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Class_Description VARCHAR(200) NOT NULL,
    Created_By VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
)";
$create_class = $conn->query($create_classes);

//CREATE CLASS TABLE
$create_table =
"CREATE TABLE IF NOT EXISTS enrollment 
(
	ID INT(10) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id)
)";
$create_tbl = $conn->query($create_table);

//GET CLASS NAME
$queryClassName = "SELECT * FROM classes WHERE '$inputClassName' = Classes";
$resultClassName = mysqli_query($conn,$queryClassName)
	or die("Error: ".mysqli_error($conn));
$rowClassName = mysqli_fetch_array($resultClassName);
$serverClassName = $rowClassName["Classes"];

//CHECK IF CLASSNAME IS UNIQUE
if($inputClassName == $serverClassName && $inputPassword == $inputConfirmationPassword){
	echo "<script> 
		alert('Class Already Exists!');
		window.location.href='homepage.php';
		</script>";
}else if($inputClassName != $serverClassName && $inputPassword != $inputConfirmationPassword){
	echo "<script> 
		alert('Passwords Do Not Match!');
		window.location.href='homepage.php';
		</script>";
}else if($inputClassName == $serverClassName && $inputPassword != $inputConfirmationPassword){
	echo "<script> 
		alert('Class Already Exists And Passwords Do Not Match!');
		window.location.href='homepage.php';
		</script>";
}else if($inputClassName != $serverClassName && $inputPassword == $inputConfirmationPassword){
	//CREATE DATABASE ENTRY
	$queryCreateEntry = "INSERT INTO classes (`ID`, `Classes`, `Password`, `Class_Description`, `Created_By`)VALUES (NULL, '$inputClassName', '$inputPassword', '$inputClassDescription', '$user')";
	if (mysqli_query($conn, $queryCreateEntry)) {
			echo "<script> 
			alert('Class Successfully Created!');
			window.location.href='homepage.php';
			</script>";
		} else {
		    echo "Error: " . $queryCreateEntry . "<br>" . mysqli_error($conn);
		}
}




mysqli_close($conn);
?>
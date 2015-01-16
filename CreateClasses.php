<?php
// session_start();
include "connect.php";
$inputClassName = $_POST['classname'];
$inputPassword = $_POST['password'];
$inputConfirmationPassword = $_POST['confirmationpassword'];
$inputClassDescription = $_POST['classdescription'];

$create_classes =
"CREATE TABLE IF NOT EXISTS classes
(
    ID INT NOT NULL AUTO_INCREMENT,
    Classes VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)";
$create_class = $conn->query($create_classes);

//CREATE DATABASE ENTRY
$queryCreateEntry = "INSERT INTO classes (`ID`, `Classes`)VALUES (NULL, '$inputClassName')";
if (mysqli_query($conn, $queryCreateEntry)) {
		echo "<script> 
		alert('Class Successfully Created!');
		window.location.href='homepage.php';
		</script>";
	} else {
	    echo "Error: " . $queryCreateEntry . "<br>" . mysqli_error($conn);
	}

//CREATE CLASS TABLE
$create_table =
"CREATE TABLE IF NOT EXISTS enrollment 
(
	ID INT(10) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id)
)";
$create_tbl = $conn->query($create_table);

//INSERT VALUES
// $alter = "ALTER TABLE enrollment ADD `$inputClassName` VARCHAR(8) NOT NULL" ;
// if (mysqli_query($conn, $alter)) {
// 	    // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
// 	} else {
// 	    echo "Error: " . $alter . "<br>" . mysqli_error($conn);
// 	}
	
// $sql = "INSERT INTO enrollment (`ID`, `ID_No`, `Class_Name`, `Password`, `Class_Description`)
// 		VALUES (NULL, NULL, '$inputClassName', '$inputPassword', '$inputClassDescription')";
// if (mysqli_query($conn, $sql)) {
// 	    // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
// 	} else {
// 	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// 	}

mysqli_close($conn);
?>
<?php

include "connect.php";
$inputClassName = $_POST['classname'];
$inputPassword = $_POST['password'];
$inputConfirmationPassword = $_POST['confirmationpassword'];
$inputClassDescription = $_POST['classdescription'];

//CREATE DATABASE ENTRY
$queryCreateEntry = "INSERT INTO classes (`ID`, `Classes`)VALUES (NULL, '$inputClassName')"; ;
if (mysqli_query($conn, $queryCreateEntry)) {
		readfile("Homepage.html");
	    echo "<p>New class created successfully</p>";
	    echo '<a id="add-classes" href="addclasses.html" align="right">Create a Class</a>';
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

//CREATE CLASS TABLE
$create_table =
"CREATE TABLE IF NOT EXISTS `$inputClassName` 
(
    ID INT NOT NULL AUTO_INCREMENT,
    Class_Name VARCHAR(200) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Class_Description VARCHAR(300) NOT NULL,
    PRIMARY KEY(id)
)";
$create_tbl = $conn->query($create_table);

//INSERT VALUES
$sql = "INSERT INTO `$inputClassName` (`ID`, `Class_Name`, `Password`, `Class_Description`)
		VALUES (NULL, '$inputClassName', '$inputPassword', '$inputClassDescription')";
if (mysqli_query($conn, $sql)) {
	    // echo "<p id='invalid'> New user created successfully, Try logging in now </p>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

mysqli_close($conn);
?>
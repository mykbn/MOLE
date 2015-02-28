<?php

$create_prof_table =
	"CREATE TABLE IF NOT EXISTS `professors`
	(
	    ID_No INT(8) NOT NULL AUTO_INCREMENT,
	    Firstname TEXT(50) NOT NULL,
	    Lastname TEXT(50) NOT NULL,
	    Username VARCHAR(50) NOT NULL,
	    Password VARCHAR(50) NOT NULL,
	    Email VARCHAR(50) NOT NULL,
	    School_College TEXT(50) NOT NULL,
	    Position TEXT(50) NOT NULL,
	    Profile VARCHAR(200) NOT NULL,
	    Status TEXT(50) NOT NULL,
	    PRIMARY KEY(ID_No)
	)";
	$create_stud = $conn->query($create_prof_table);
	// $create_prof = mysqli_query($conn, $create_prof_table) or die ("Error: ".mysqli_error($conn));
// echo "RAN!";
	$create_stud_table =
	"CREATE TABLE IF NOT EXISTS `students`
	(
	    ID_No INT(8) NOT NULL AUTO_INCREMENT,
	    Firstname TEXT(50) NOT NULL,
	    Lastname TEXT(50) NOT NULL,
	    Username VARCHAR(50) NOT NULL,
	    Password VARCHAR(50) NOT NULL,
	    Email VARCHAR(50) NOT NULL,
	    School_College TEXT(50) NOT NULL,
	    Position TEXT(50) NOT NULL,
	    Profile VARCHAR(200) NOT NULL,
	    PRIMARY KEY(ID_No)
	)";
	$create_stud = $conn->query($create_stud_table);
	// $create_prof = mysqli_query($conn, $create_stud_table) or die ("Error: ".mysqli_error($conn));

	$create_admin_table =
	"CREATE TABLE IF NOT EXISTS `admin`
	(
	    ID_No INT(8) NOT NULL AUTO_INCREMENT,
	    Firstname TEXT(50) NOT NULL,
	    Lastname TEXT(50) NOT NULL,
	    Username VARCHAR(50) NOT NULL,
	    Password VARCHAR(50) NOT NULL,
	    Email VARCHAR(50) NOT NULL,
	    School_College TEXT(50) NOT NULL,
	    Position TEXT(50) NOT NULL,
	    Profile VARCHAR(200) NOT NULL,
	    PRIMARY KEY(ID_No)
	)";
	$create_admin = $conn->query($create_admin_table);
	// $create_prof = mysqli_query($conn, $create_stud_table) or die ("Error: ".mysqli_error($conn));
	
	
	mysqli_close($conn);

	?>
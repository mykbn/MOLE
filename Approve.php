<?php

include 'connect.php';

$toApprove = $_POST['toApprove'];
$username = $_POST['username'];


if ($toApprove == 'true'){
	$update_table = "UPDATE professors SET Status = 'verified' WHERE Username = '$username'";
	if(mysqli_query($conn, $update_table)){
		echo "Verified!";
	}else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}else{
	$update_table = "UPDATE professors SET Status = 'pending' WHERE Username = '$username'";
	if(mysqli_query($conn, $update_table)){
		echo "User Unauthorized!";
	}else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>
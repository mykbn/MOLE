<?php

session_start('user_credentials');
include 'connect.php';
$subj = $_GET['subj'];
$list = $_GET['list'];

if(isset($_FILES['file']) === true){
	if (empty($_FILES['file']['name']) === true){
		// $file_path = 'files/incompatible cat.docx';
		// output_file($file_path, 'incompatible cat.docx', 'text/plain');
		echo '<script>alert("please chooose a file!");
		window.location.href = "CardsContainer.php?subj='.$subj.'";</script>';		
	 } 
	 else {
	 	$allowed = array('doc', 'docx', 'pdf', 'pptx');
	 	$file_name = $_FILES['file']['name'];
	 	$file_extn = strtolower(end(explode('.', $file_name)));
	 	$file_temp = $_FILES['file']['tmp_name'];
	 
	 if (in_array($file_extn, $allowed) === true){
	 	move_uploaded_file($file_temp, "files/$file_name");
	 	$insert_as_card = "INSERT INTO ".$subj."_cards (`List`, `CardTitle`, `Description`, `Created_By`)
	 						VALUES ('$list', '$file_name', 'FILE', '".$_SESSION['REALNAME']."')";
	 	if (mysqli_query($conn, $insert_as_card)) {
			echo '<script>alert("File Uploaded!");
			window.location.href = "CardsContainer.php?subj='.$subj.'";</script>';
			}else {
			    echo "Error: " . $insert_as_card . "<br>" . mysqli_error($conn);
			}
	 	

	 }	else {
	 	echo '<script>alert("Incorrect file type. Allowed file types: '.implode(', ', $allowed).'")
	 	window.location.href = "CardsContainer.php?subj='.$subj.'";</script>';
	 	// echo implode(', ', $allowed);
	 	}
	}
}

?>
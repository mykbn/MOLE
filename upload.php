<!DOCTYPE html>
<html>
<body>

<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="file">
	<input type="submit">
</form> -->
<?php
// echo("LALALALALAL");
if(isset($_FILES['file']) === true){
	if (empty($_FILES['file']['name']) === true){
		echo 'please chooose a file"';		
	 } 
	 else {
	 	$allowed = array('doc', 'docx', 'pdf', 'pptx');
	 	$file_name = $_FILES['file']['name'];
	 	$file_extn = strtolower(end(explode('.', $file_name)));
	 	$file_temp = $_FILES['file']['tmp_name'];
	 
	 if (in_array($file_extn, $allowed) === true){
	 	move_uploaded_file($file_temp, "files/$file_name");
	 }	else {
	 	echo 'Incorrect file type. Allowed file types: ';
	 	echo implode(', ', $allowed);
	 	}
	}
}





// 	 $file_name = $_FILES['fileToUpload']['name'];
// 	 $file_type = $_FILES['fileToUpload']['type'];
// 	 $file_size = $_FILES['fileToUpload']['size'];
// 	 $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];

// 	if ($file_name==''){
// 		echo "<script>alert('Please select a file!')</script>";
// 		exit();
// 	}else{
// 		$allowed = array ('docx', 'doc', 'pdf', 'pptx')
// 		move_uploaded_file($file_tmp_name, "files/$file_name");
// 		echo "file uploaded successfully!";
// 	}		
// }
?>

</body>
</html>
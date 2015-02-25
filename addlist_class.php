<?php

include "connect.php";

$subj = $_GET['subj'];
$listName = $_POST['listLabel'];
// $listConvert = str_replace(' ', '_', $listName);

$list = '';
// $addColumn = "ALTER TABLE ".$subj." ADD `".$list."` VARCHAR(100) NOT NULL" ;
// if (mysqli_query($conn, $addColumn)) {
// 	 echo "ALTER SUCCESSFUL!";
// } else{
// 	echo "Error: " . $addColumn . "<br>" . mysqli_error($conn);
// }

if ($listName == ''){
    echo "<script> 
            alert('Please enter a List title!');
            window.location.href='CardsContainer.php?subj=$subj';
            </script>";
}else{
	$insertNewList = "INSERT INTO ".$subj." (`ID`, `Lists`) VALUES (NULL, '$listName')";
	if(mysqli_query($conn, $insertNewList)){
		echo "<script> 
		alert('List Created!');
		window.location.href='CardsContainer.php?subj=".$subj."';
		</script>";
	}else{
		echo "Error: ".$insertNewList."<br>".mysqli_error($conn);
	}
}




echo($list);
mysqli_close($conn);
?>
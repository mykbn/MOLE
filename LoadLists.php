<?php
	
	include "connect.php";
	session_start("user_credentials");

	$subj = $_POST['subj'];
	$list = '';

	//Do the query
	$query = "SELECT Lists FROM `$subj`";
	$result = mysqli_query($conn,$query)
		or die("");
	//iterate over all the rows
	while($row = mysqli_fetch_assoc($result)){
	    //iterate over all the fields
	    foreach($row as $key => $val){
	        //generate output
	        if($val != ""){
	   //      	$queryAuthor = "SELECT `Created_By` FROM classes WHERE '$val' = Classes";
	   //      	$resultAuthor = mysqli_query($conn,$queryAuthor)
				// 		or die("");
				// $rowAuthor = mysqli_fetch_array($resultAuthor);
				// $serverAuthor = $rowAuthor["Created_By"];

	        	$list .= '<div id = "cards-container-div">
							<input id = "containertitle" type = "text" name = "containertitle" placeholder = '.$val.' readonly>
							<input id = "cardtitle" type = "textbox" placeholder = "Card Title">
							<div id = "buttondiv">
							 	<input id = "addcard" class = "addbutton" type = "submit" value = "Add">
							 </div>
						 </div>';

	        }
	    }
	}

	echo ($list);
	mysqli_close($conn);
?>
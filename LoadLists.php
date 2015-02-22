<?php
	
	include "connect.php";
	session_start("user_credentials");

	$subj = $_POST['subj'];
	$list = '';
	// $counter = 0;
	// $name = '';

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
	        	// $name = str_replace(' ', '_', $val);
	        	// $counter = $counter + 1;
	        	// $name = "cardtitle".$counter;
	        	$list .= '<div class = "cards-container-div" id="'.$val.'">
							<input id = "containertitle" type = "text" name = "containertitle" value = "'.$val.'" readonly>
							<input id = "cardtitle" name="'.$val.'" type = "textbox" placeholder = "Card Title" >
							<div id = "buttondiv">
							 	<input id = "addcard" class = "addbutton" type = "submit" value = "Add" name ="'.$val.'" 
							 	onclick="AddCard(this.name)">
							 </div>

							 <div class = "cardcontainer" id="cardcontainer_'.$val.'"></div>
						 </div>';

	        }
	    }
	}

	echo ($list);
	mysqli_close($conn);
?>
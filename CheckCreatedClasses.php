<?php	
	include "connect.php";
	session_start('user_credentials');
	$class = '';

	// $author = $_SESSION['REALNAME']

	//Do the query
	$query = "SELECT `Created_By` FROM classes WHERE `Created_By` = ".$_SESSION['REALNAME'];
	$result = mysqli_query($conn,$query)
		or die("");
	// $row = mysqli_fetch_array($result);
	// $server = $row["Created_By"];
	// iterate over all the rows
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

	        	$class .=  '<div id = "editdropdowncards" class = "cards">
							<label id = "editdropdowncardsclassname">Capstone</label>
							<input id = "editdropdowndeletebutton" type = "submit" value = "x">
							</div>';

								
				    
	        }
	        
	       
	    }
	}
 echo ($query);
 mysqli_close($conn);
?>
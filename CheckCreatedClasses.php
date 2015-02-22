<?php	
	include "connect.php";
	session_start('user_credentials');

	$user = $_POST['user'];
	
	$class = '';

	// // $author = $_SESSION['REALNAME']

	//Do the query
	$query = "SELECT Classes FROM classes WHERE `Created_By` = '$user'";
	$result = mysqli_query($conn,$query)
		or die("");
	echo ("<p>Classes ".$user." Created:</p>");
	// $row = mysqli_fetch_array($result);
	// $server = $row["Created_By"];
	// // iterate over all the rows
	while($row = mysqli_fetch_assoc($result)){
	    //iterate over all the fields
	    foreach($row as $key => $val){
	        //generate output
	        if($val != ""){
	        	$class .=  '<div id = "editdropdowncards" class = "cards">
							<label id = "editdropdowncardsclassname">'.$val.'</label>
							</div>';

								
				    
	        }
	        
	       
	    }
	}
 // echo ($query);
echo ($class);
 mysqli_close($conn);
?>
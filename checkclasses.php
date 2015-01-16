<?php	
	include "connect.php";
	session_start('user_credentials');
	$class = '';
	//Do the query
	$query = "SELECT `".$_SESSION['ID']."` FROM enrollment";
	$result = mysqli_query($conn,$query)
		or die("");
	//iterate over all the rows
	while($row = mysqli_fetch_assoc($result)){
	    //iterate over all the fields
	    foreach($row as $key => $val){
	        //generate output
	        if($val != ""){
	        	$class .= '<input id = "cards" type = "submit" value = "'. $val .'" name = "cardsBtn">';
	        }
	        
	       
	    }
	}
 echo ($class);
 mysqli_close($conn);
?>
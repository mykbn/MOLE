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
	        	$class .=  '<div id = "cards" name = "cardsBtn">
								<label id = "classname-label" class = "classname">Class Name:</label>
								<label id = "classname" class = "classname">Capstone</label>
								<label id = "author-label" class = "classname">Author:</label>
								<label id = "author" class = "classname">Mrs. Montero</label>
				        	</div>';
	        }
	        
	       
	    }
	}
 echo ($class);
 mysqli_close($conn);
?>
<?php	
	include "connect.php";
	session_start('user_credentials');
	$class = '';

	// $author = $_SESSION['REALNAME']

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
	        	$queryAuthor = "SELECT `Created_By` FROM classes WHERE '$val' = Classes";
	        	$resultAuthor = mysqli_query($conn,$queryAuthor)
						or die("");
				$rowAuthor = mysqli_fetch_array($resultAuthor);
				$serverAuthor = $rowAuthor["Created_By"];

	        	$class .=  "<div id = 'cards' name = 'cardsBtn'>
		        				<span id = ".$val." onclick='GoToClass(this.id)' style='display:block; position:absolute; width:100%'>
									<label id = 'classname-label' class = 'classname'>Class Name:</label>
									<label id = 'classname' class = 'classname'>".$val."</label>
									<label id = 'author-label' class = 'classname'>Author:</label>
									<label id = 'author' class = 'classname'>".$serverAuthor."</label>
								</span>
								<input id = 'deleteclass' type='button' value = 'x' name=".$val." onclick='UnEnroll(this.name)'>
							
				        	</div>";

								
				    
	        }
	        
	       
	    }
	}
 echo ($class);
 mysqli_close($conn);
?>
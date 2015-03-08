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

				// <input id = 'attachfilebutton' type = 'file' name='file' value = 'Attach File'>

	        	if($_SESSION['POSITION'] == "Professor"){
	        		$list .= "<div class = 'list' id = 'list_".$val."'>
							<input id = 'listtitle' type = 'text' value = '".$val."' disabled>
							<input name = '".$val."' id = 'addcardbutton' type='button' value = '+' onclick='toggle_visible(this.name)'>
						  </div>
						  <div id = '".($val)."' class = 'addcardcontent' style='display:none;'>
							<input id = 'cardstitle' name = cardstitle_".$val." type = 'text' placeholder = 'Card Title'>
							<input id = 'createquizbutton' type = 'submit' name=$val value = 'Quiz' onclick='GoToQuiz(this.name)'>
							<input id = 'attachfilebutton' type = 'button' value = 'Attach File' onclick='Upload()'>
							<input id = 'createbutton' type = 'submit' name=$val value = 'Create' onclick='AddCard(this.name)'>
							<input id = 'cancelbutton' name = '".$val."' type = 'submit' value = 'Cancel' onclick='toggle_visibility(this.name)'>
						</div>";
					}else if($_SESSION['POSITION'] == "Student"){
						$list .= "<div class = 'list' id = 'list_".$val."'>
							<input id = 'listtitle' type = 'text' value = '".$val."' disabled>
							<input name = $val id = 'addcardbutton' type='button' value = '+' onclick='toggle_visible(this.name)'>
						  </div>
						  <div id = '".$val."' class = 'addcardcontent' style='display:none;'>
							<input id = 'cardstitle' name = cardstitle_".$val." type = 'text' placeholder = 'Card Title'>
							<input id = 'attachfilebutton' type = 'submit' value = 'Attach File' onclick='Upload()'>
							<input id = 'createbutton' type = 'submit' name=$val value = 'Create' onclick='AddCard(this.name)'>
							<input id = 'cancelbutton' name = '".$val."' type = 'submit' value = 'Cancel' onclick='toggle_visibility(this.name)'>
						</div>";
					}
	        	
						// echo ($val);

	        }
	    }
	}

	echo ($list);
	mysqli_close($conn);
?>
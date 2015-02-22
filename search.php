<?php

include "connect.php";

$output = '';
//COLLECT
if(isset($_POST['searchVal'])){
	$searchq = $_POST['searchVal'];
	$query =  "SELECT `Classes` FROM classes WHERE `Classes` LIKE '%$searchq%'";
	$result = mysqli_query($conn, $query)
		or die("Error: ".mysqli_error($conn));

	$count = mysqli_num_rows($result);

	if($count == 0){
		$output = '<p id="no_results">There are no <br>classes named <br><i>"'.$searchq.'"<i> </p>';
	}else{
		while($row = mysqli_fetch_array($result)){
			$classes = $row['Classes'];

			$output .= '<p id= "'.$classes.'" value="'.$classes.'" class="class-option" onclick="GetClassValue(this.id)"> '.$classes.'</p>';
		}
	}

}
echo ($output);
mysqli_close($conn);

?>
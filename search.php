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
		$output = 'There was no search results';
	}else{
		while($row = mysqli_fetch_array($result)){
			$classes = $row['Classes'];

			$output .= '<option value='.$classes.' class="class-option" onclick="GetClassValue(output.value)"> '.$classes.'</option>';
		}
	}

}
echo ($output);
mysqli_close($conn);

?>
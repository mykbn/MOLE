<?php

include "connect.php";

$queryClasses = "SELECT Classes FROM classes";


// run query
$query = mysqli_query($conn, $queryClasses)
		or die("Error: ".mysqli_error($conn));

// set array
$array = array();

// look through query
while($row = mysqli_fetch_assoc($query)){
  $array[] = $row;
  echo $row['Classes']. "<br>"; 
}

?>
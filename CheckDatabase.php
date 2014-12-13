<?php
// statement to execute
$sql = 'SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMATA.SCHEMA_NAME="mole_database"';

// execute the statement
$query = $conn->query($sql);
if ($query == false) {
    throw new Exception($conn->error, $conn->errno);
    echo "NO DATABASE ";
}else if($query == true){
	echo"YES DATABASE ";
} 
?>
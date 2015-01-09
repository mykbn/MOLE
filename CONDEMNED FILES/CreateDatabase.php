<?php
	// $queryDatabase = "SHOW DATABASES";
	// $resultDatabase = mysqli_query($conn,$queryDatabase)
	// or die("Error: ".mysqli_error($conn));
	// $rowDatabase = mysqli_fetch_array($resultDatabase);
	// $serverDatabase = $rowDatabase["DATABASES"];
$res = mysql_query("SHOW DATABASES");
while ($row = mysql_fetch_assoc($res)) {
    echo $row['Database'] . "\n";
}
?>
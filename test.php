<?php

include "connect.php";

//Do the query
$query = "SELECT `1101373` FROM enrollment";
$result = mysqli_query($conn,$query);
//iterate over all the rows
while($row = mysqli_fetch_assoc($result)){
    //iterate over all the fields
    foreach($row as $key => $val){
        //generate output
        echo $val . "<BR />";
    }
}
?>
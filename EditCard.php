<?php

include 'connect.php';

$subj = $_POST['subj'];
$desc = $_POST['desc'];
$card = $_POST['cardTitle'];

$updateCardDescription = "UPDATE ".$subj."_cards SET Description='$desc' WHERE CardTitle = '$card' ";

if (mysqli_query($conn, $updateCardDescription)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php

include 'connect.php';

$subj = $_GET['subj'];
$cardName = $_POST['cardName'];
// $createCard = '';
// $createCard .= "<div id='card'></div>";
echo ($cardName);
// echo($createCard);





mysqli_close($conn);
?>
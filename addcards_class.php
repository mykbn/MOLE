<?php
session_start ('user_credentials');
include 'connect.php';

$list = $_POST['listName'];
$subj = $_GET['subj'];
$cardName = $_POST['cardName'];
$date = $_POST['date'];
// $createCard = '';
// $createCard .= "<div id='card'></div>";

// echo ($list);
$create_cards_table =
"CREATE TABLE IF NOT EXISTS `".$subj."_cards`
(
    ID INT NOT NULL AUTO_INCREMENT,
    List VARCHAR(100) NOT NULL,
    CardTitle VARCHAR(100) NOT NULL,
    Description VARCHAR(50) NOT NULL,
    Created_By VARCHAR(200) NOT NULL,
    Date_Created VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
)";
$create_table = $conn->query($create_cards_table);


$create_card_query = "INSERT INTO `".$subj."_cards` (ID, List, CardTitle, Created_By, Date_Created) VALUES (NULL, '$list', '$cardName', '".$_SESSION['REALNAME']."', '$date')";

if(mysqli_query($conn, $create_card_query)){
	echo "<script> 
		alert('Card Created!');
		window.location.href='CardsContainer.php?subj=$subj';
		</script>";
}else{
	echo "Error:".$create_card_query."<br>". mysqli_error($conn);
}
mysqli_close($conn);
?>
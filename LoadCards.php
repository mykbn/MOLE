<?php

include "connect.php";
session_start("user_credentials");

$subj = $_POST['subj'];
$card = ''; 

$getCards = "SELECT CardTitle FROM `".$subj."_cards`";
$resultCards = mysqli_query($conn, $getCards) or die ("");



while($row = mysqli_fetch_assoc($resultCards)){
	    //iterate over all the fields
	    foreach($row as $key => $val){
	        //generate output
	        if($val != ""){
	        	$getList = "SELECT List From `".$subj."_cards` WHERE `CardTitle` = '".$val."'";
				$resultList = mysqli_query($conn, $getList);
				$rowList = mysqli_fetch_array($resultList);
				$serverList = $rowList["List"];

				$getDesc = "SELECT Description From `".$subj."_cards` WHERE `CardTitle` = '".$val."'";
				$resultDesc = mysqli_query($conn, $getDesc);
				$rowDesc = mysqli_fetch_array($resultDesc);
				$serverDesc = $rowDesc["Description"];

				$card .= '<div class = "card" id="cards_'.$serverList.'" name="'.$serverList.'" value="'.$val.'" onclick = "ShowPopUp(this)">
								<label id = "createdcardtitle">'.$val.'</label>
								<br>
								<label id = "cardcreateddescription">'.$serverDesc.'</label>
							</div>';

	        }
	    }
	}
	echo ($card);
	mysqli_close($conn);
?>
<?php

include "connect.php";
session_start("user_credentials");

$subj = $_POST['subj'];
// echo ($subj);
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

	      //   	$card .= '<div id = "'.$serverList.'" class="card" name="'.$serverList.'" onclick="GoToQuiz()"> '.$val.'
							// </div>';

				$card .= '<div class = "card" id="'.$serverList.'" name="cards_'.$serverList.'" onclick="GoToQuiz()">
								<label id = "createdcardtitle">'.$val.'</label>
								<input id = "deletecardbutton" type = "submit" value = "x"><br>
								<label id = "cardcreateddescription">Quiz</label>
							</div>';

	        }
	    }
	}
	echo ($card);
	// echo("POSITION");
	mysqli_close($conn);
?>
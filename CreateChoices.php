<?php

$numOfChoices = $_POST['numOfChoices'];
$typeOfChoice = $_POST['typeOfChoice'];
$choice ='';
if ($typeOfChoice != "text"){
	for ($i = 0; $i < $numOfChoices; $i++){
		$choice .= '<input id = "radio_'.$i.'" class = "radiobutt" type="'.$typeOfChoice.'" name="answerchoicesform" value="value">
				<input id = "answer_'.$i.'" class = "answerchoicestext" type = "text" onkeydown="ChangeRadioButtonValue(this.value, '.$i.')" onblur="ChangeRadioButtonValue(this.value, '.$i.')"><br>';
	}
}else{
	$choice .= '<input id = "answer_0" class = "answerchoicestext" type = "text" placeholder="Answer"><br>';
}

echo($choice);
?>
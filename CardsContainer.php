<?php	
	include "connect.php";
	session_start('user_credentials');

	$subj = $_GET['subj'];
	$author = '';
	$queryAuthor = "SELECT `Created_By` FROM classes WHERE '$subj' = Classes";
	$resultAuthor = mysqli_query($conn,$queryAuthor)
			or die("");
	$rowAuthor = mysqli_fetch_array($resultAuthor);
	$serverAuthor = $rowAuthor["Created_By"];
?>
<html>
<head>
<link type = "text/css" rel = "stylesheet" href = "CardsContainer.css">
<link type = "text/css" rel = "stylesheet" href = "homepage.css">
<title><?php echo ($_GET['subj'] ); echo " Home"; ?> </title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type = "text/javascript" src="jQuery.js"></script>
<script type = "text/javascript" src="slimscroll.js"></script>
<script type = "text/javascript">
window.onload = function(){
	var element = document.getElementsByClassName('cardcontainer');
	var e = Array.prototype.slice.call(element);
	// alert (e[0]);
	scroll.useSlimScroll(e[0]);
}
function GoToQuiz(){
	// alert("LALALALALALA");
	$(document).ready(function(){
		var subj = <?php echo json_encode($_GET['subj']); ?>;
		window.location.href = "CreateQuiz.php?subj=" + subj;
		// $.get("CreateQuiz.php",function(){

		// });
	});
}
function LoadLists(){
	var getSubj = <?php echo json_encode($_GET['subj']); ?>;
	var className = document.getElementById('classname');
		$.post( "LoadLists.php", {subj:getSubj}, function(list) {
		  $( "#lists-container").html(list);
		});
	// });
}
function ChangeProfileName(){
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
}
function ChangeClassName(){
	var className = document.getElementById('classname');
	className.value = <?php echo json_encode($_GET['subj']); ?>;
}
function AddList(){
	var className = document.getElementById('classname');
	var listName = $("input[name='listName']").val();
	$.post("addlist_class.php?subj=" + className.value, {listLabel:listName}, function(list){
		$("#lists-container").html(list);
	});
}
function CheckAuthor(){
	var addListTextBox = document.getElementById('add-lists-container')
	var author = <?php echo json_encode($serverAuthor); ?>;
	var currentUser = <?php echo json_encode($_SESSION['REALNAME']); ?>;
	if (author == currentUser){
		addListTextBox.style.display = 'block';
	}else{
		addListTextBox.style.display = 'none';
	}

}

function AddCard(listname){
	var className = document.getElementById('classname');
	var cardtitle = $("input[name='"+listname+"']").val();
	$(document).ready(function(){
		$.post("addcards_class.php?subj=" + className.value +"&list=" + listname, {cardName:cardtitle}, function(card){
			$("body").html(card);
		});
	});
	
}


function LoadCards(){
	var getSubj = <?php echo json_encode($_GET['subj']); ?>;
	$(document).ready(function(){
		$.post( "LoadCards.php", {subj:getSubj}, function(cards) {
		  $( "#namedropdown").html(cards);
		  ChangeCardPosition();
		  // alert (getCards);
		});
	});
}

function ChangeCardPosition(){
	var getCards = document.getElementsByClassName('card');
	var cards = Array.prototype.slice.call(getCards);
	// alert (cards[1].id);
	$(document).ready(function(){
		for (i = 0; i < cards.length; i++) {
		var theCard = document.getElementById(cards[i].id);
		$("#cardcontainer_"+cards[i].id).append(theCard);
		// alert(theCard.id);
		}	
	});
}
</script>

</head>
<body onload = "ChangeProfileName(); ChangeClassName(); LoadLists(); CheckAuthor();LoadCards(); ">
<div id="main">

<!-- HEADER -->
	<div id = "header" onclick="Hide()">
		<div id = "logo-mole"><a href = "Homepage.php">
			<img id = "logo" src = "_assets/Logo.png">
			<img id = "mole" src = "_assets/Mole.png">
		</a></div>
		<div id = "profilepic-div">
			<img id = "profilepicture" src="_assets/Profile-icon.jpg">
		</div>
		<input id = "class" type = "submit" value = "Classes" name = "classBtn" 
			onclick = "Stud_Prof_Dropdowns(); Hide(editclassdiv); Hide(creatediv); Hide(deleteclassdiv)">
		<input id = "profilename" type = "button"  name = "profilename" 
			onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
		<input id = "notification" type = "submit" value = "" name = "notificationBtn" 
			onclick = "toggle_visibility('notificationdiv'); Hide(namedropdown)">
	</div>


	<div id = "mainpage" onclick="Hide(notificationdiv); Hide(namedropdown);">
<!-- NOTIFICATIONSIDE -->
		<div id = "notificationdiv" class = "notificationdiv">
		</div>

<!-- NAMEDROPDOWN -->
		<div id = "namedropdown">
			<form action="userprofile.php">
				<input id = "viewprofile" class = "namedropdown" type = "submit" value = "View Profile">
			</form>
			<form action="index.html"> 
				<input id = "logout" class = "namedropdown" type = "submit" value = "Logout">
			</form>
		</div>

<!-- CLASS DROPDOWN -->
<!-- FOR PROFESSOR -->
		<div id = "dropdowndivPROF">
			<input id = "createclass" class = "dropdowncontent" type = "submit" value = "Create Class" name = "createclassBtn" 
				onclick = "toggle_visibility('creatediv'); Hide(editclassdiv); Hide(deleteclassdiv)">
			<input id = "editclass" class = "dropdowncontent" type = "submit" value = "Edit Class" 
				onclick = "toggle_visibility('editclassdiv'); Hide(creatediv); Hide(deleteclassdiv)">
			<input id = "deleteclass-dropdowncontent" class = "dropdowncontent" type = "submit" value = "Delete Class" 
				onclick = "toggle_visibility('deleteclassdiv'); Hide(creatediv); Hide(editclassdiv)">
		</div>
		<!-- EDIT CLASS SLIDESIDE DIV -->
		<div id = "editclassdiv">

			<!-- <div id = "editdropdowncards" class = "cards"> -->
				<!-- <label id = "editdropdowncardsclassname">Capstone</label>
				<input id = "editdropdowndeletebutton" type = "submit" value = "x"> -->
			<!-- </div> -->
		</div>
		<!-- DELETE CLASS SLIDESIDE DIC -->
		<div id = "deleteclassdiv">
			
		</div>

		<!-- CREATE CLASS SLIDESIDE DIV -->
		<div id = "creatediv">
			<form id = "create-class-form" method = "post" action = "CreateClasses.php">
                <input id = "classname" class = "form-textbox" type = "text" name = "classname" placeholder = "Classname"> 
        		<input id = "password" class = "form-textbox" type = "password" name = "password" placeholder = "Password">
        		<input id = "confirmationpassword" class = "form-textbox" type = "password" 
        		name = "confirmationpassword" placeholder = "Confirmation Password">
                <textarea id = "classdescription" name = "classdescription" placeholder = "Class Description"></textarea> 
                <input class = "create-cancel" type = "submit" value = "Create"> 
			</form>
			<input id = "cancel" class = "create-cancel" type = "submit" value = "Cancel" 
			onclick = "toggle_visibility('creatediv'); toggle_visibility('dropdowndiv')">
		</div>

<!-- FOR STUDENT -->
		<div id = "dropdowndivSTUDENT">
			<div id = "dropdowncards" class = "cards">
				<label id = "dropdowncardsclassname">Capstone</label>
				<input id = "dropdowndeletebutton" type = "submit" value = "x">
			</div>
		</div>

<!-- INSIDE CLASS -->
		<div id = "insideclass">
			<div id = "classtitle-addlist">
				<label id = "classtitle">Class Title</label>
				<input id = "addlist" type = "text" placeholder = "Add List">
				<input id = "addlistbutton" type = "submit" value = "Add">
			</div>
			<div id = "listframe">
				<div id = "list">
					<input id = "listtitle" type = "text" placeholder = "List Title">
					<input id = "addcardbutton" type = "submit" value = "+">
					<div id = "card">
					</div>
				</div>
				<div id = "addcardcontent">
					<input id = "cardstitle" type = "text" placeholder = "Card Title">
					<input id = "createquizbutton" type = "submit" value = "Create Quiz">
					<input id = "attachfilebutton" type = "submit" value = "Attach File">
					<input id = "createbutton" type = "submit" value = "Create">
					<input id = "cancelbutton" type = "submit" value = "Cancel">
				</div>
			</div>
		</div>


	</div>
</div>
</body>
</html>
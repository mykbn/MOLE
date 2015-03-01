<?php	
	include "connect.php";
	session_start('user_credentials');

	$subj = $_GET['subj'];
	$status = $_SESSION['POSITION'];
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
// window.onload = function(){
// 	var element = document.getElementsByClassName('cardcontainer');
// 	var e = Array.prototype.slice.call(element);
// 	// alert (e[0]);
// 	scroll.useSlimScroll(e[0]);
// }
function GoToQuiz(name){
	// alert(name);
	var cardtitle = $("input[name='cardstitle_"+name+"']").val();
	// alert (cardtitle);
	$(document).ready(function(){
		var subj = <?php echo json_encode($_GET['subj']); ?>;
		window.location.href = "CreateQuiz.php?subj=" + subj+"&title="+cardtitle+"&list="+name;
		// $.get("CreateQuiz.php",function(){

		// });
	});
}
function LoadLists(){
	var getSubj = <?php echo json_encode($_GET['subj']); ?>;
	var className = document.getElementById('classname');
		$.post( "LoadLists.php", {subj:getSubj}, function(list) {
		  $( "#listframe").html(list);
		  LoadCards();
		});
	// });
}
function ChangeProfileName(){
	var pic = document.getElementById('profilepicture');
	pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
	var profile = document.getElementById('profilename');
   	profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
}
function ChangeClassName(){
	var className = document.getElementById('classtitle');
	className.value = <?php echo json_encode($_GET['subj']); ?>;
	$('#classtitle').html(<?php echo json_encode($_GET['subj']); ?>)
}
function AddList(){
	var className = document.getElementById('classtitle');
	var listName = $("input[name='listName']").val();
	$.post("addlist_class.php?subj=" + <?php echo json_encode($_GET['subj']); ?>, {listLabel:listName}, function(list){
		$("#listframe").html(list);
	});
}


function AddCard(list){
	// alert (list);
	var className = <?php echo json_encode($_GET['subj']); ?>;
	var cardtitle = $("input[name='cardstitle_"+list+"']").val();
	// alert(cardtitle);
	$(document).ready(function(){
		$.post("addcards_class.php?subj=" + className +"&list=" + list, {cardName:cardtitle}, function(card){
			$("body").html(card);
		});
	});
	
}

function LoadCards(){
	var getSubj = <?php echo json_encode($_GET['subj']); ?>;
	$(document).ready(function(){
		$.post( "LoadCards.php", {subj:getSubj}, function(cards) {
		  $( "#notificationdiv").html(cards);
		  ChangeCardPosition();
		  // alert (getCards);
		});
	});
}

function ChangeCardPosition(){
	var getCards = document.getElementsByClassName('card');
	var cards = Array.prototype.slice.call(getCards);
	// alert (cards.length);
	// alert (cards[1].id);
	$(document).ready(function(){
		for (i = 0; i < cards.length; i++) {
			var theCard = document.getElementById("cards_"+cards[i].getAttribute('name'));
			// alert("cards_"+cards[i].getAttribute('name'));
			$("#list_"+cards[i].getAttribute('name')).append(theCard);
			// alert(theCard.id);
		}	
	});
}
function Stud_Prof_Dropdowns(){
	var studDrop = document.getElementById('dropdowndivSTUDENT');
	var profDrop = document.getElementById('dropdowndivPROF');
	var status = <?php echo json_encode ($status); ?>;
	if (status == "Professor"){
		 if(profDrop.style.display == 'block'){
		          profDrop.style.display = 'none';
		      }else{
		          profDrop.style.display = 'block';
		      }
	}else if(status == "Student"){
		if(studDrop.style.display == 'block'){
		          studDrop.style.display = 'none';
		      }else{
		          studDrop.style.display = 'block';
		      }
	}
}
function DeleteCard(card){
	var getSubj = <?php echo json_encode($_GET['subj']); ?>;
	$.post("DeleteCard.php", {cardTitle:card, subj:getSubj}, function(data){
		// $('#header').html(data);
		window.location.href = "CardsContainer.php?subj="+getSubj;
	});
}
</script>

</head>
<body onload = "ChangeProfileName(); ChangeClassName(); LoadLists();">
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
			<form action="index.php"> 
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
				<label id = "classtitle" value="value">Class Title</label>
				<input id = "addlist" type = "text" placeholder = "Add List" name="listName">
				<input id = "addlistbutton" type="button" value = "Add" onclick="AddList()">
			</div>
			<div id = "listframe">
				<!-- <div id = "list">
					<input id = "listtitle" type = "text" placeholder = "List Title">
					<input id = "addcardbutton" type = "submit" value = "+" onclick="toggle_visibility('addcardcontent')">
					<div id = "card">
						<label id = "createdcardtitle">Your Card</label>
						<input id = "deletecardbutton" type = "submit" value = "x"><br>
						<label id = "cardcreateddescription">Quiz</label>
					</div>
				</div>
				<div id = "addcardcontent">
					<input id = "cardstitle" type = "text" placeholder = "Card Title">
					<input id = "createquizbutton" type = "submit" value = "Create Quiz">
					<input id = "attachfilebutton" type = "submit" value = "Attach File">
					<input id = "createbutton" type = "submit" value = "Create">
					<input id = "cancelbutton" type = "submit" value = "Cancel">
				</div>
			</div> -->
		</div>

<!-- TAKE QUIZ -->
		<!-- <div id = "takequizpopupdiv">
			<div id = "studentquiz">
				<div id = "questiondiv">
					<label id = "studentquiztitle">Quiz 1</label>
				</div>
				<label id = "studentquestionnumber">1.</label>
			</div>
		</div>
 -->

	</div>
</div>
</body>
</html>
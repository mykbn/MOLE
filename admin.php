<html>
<head>
  <link type="text/css" rel="stylesheet" href="admin.css">
  <link type="text/css" rel="stylesheet" href="userprofile.css">
  <link type="text/css" rel="stylesheet" href="homepage.css">

<title>Admin Tool</title>
<script type = "text/javascript" src="jQuery.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type = "text/javascript" src="Homepage.js"></script>
<script type="text/javascript">

  function Approve(user) {
    if (confirm('Do you allow her/him to be a course creator?') == true) {
      $.post('Approve.php', {toApprove: 'true', username:user}, function(){
            window.location.href = "admin.php";
      });
    } else {

    }

  }

  function Deny(user) {
    if (confirm("Unauthorize this user?") == true) {
      $.post('Approve.php', {toApprove: 'false', username:user}, function(){
            window.location.href = "admin.php";
      });
    } else {

    }

  }

  function getData(){
    $.post("getUsers.php", {variable:'lala'},function(data){
      $('#table').append(data);
    });
  }
</script>
</head>

<body onload="getData()">
  <div id = "header" onclick="Hide()">
      <div id = "logo-mole">
        <img id = "logo" src = "_assets/Logo.png">
        <img id = "mole" src = "_assets/Mole.png">
      </div>
      <div id = "profilepic-div">
        <img id = "profilepicture" src="_assets/Profile-icon.jpg">
      </div>
      <input id = "profilename" type = "button"  name = "profilename" value = "ADMIN"
      onclick = "toggle_visibility('namedropdown'); Hide(notificationdiv)">
  </div>

  <div id = "mainpage" onclick="Hide(namedropdown);">

  <!-- NAMEDROPDOWN -->
    <div id = "namedropdown">
      <form action="index.php"> 
        <input id = "logout" class = "namedropdown" type = "submit" value = "Logout">
      </form>
    </div>


<table id = "table" class="flatTable">
  <tr class="titleTr">
    <td class="titleTd">ADMIN TOOL</td>
  



</div>
</body>
</html>
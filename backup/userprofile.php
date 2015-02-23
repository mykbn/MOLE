<?php 
  include "connect.php";
  session_start('user_credentials');
  $status = $_SESSION['POSITION'];
?>
<html>
<head>
  <title>User Profile</title>
    <meta charset="utf-8" />
    <title>CEU-MOLE</title>
    <script type="text/javascript" src="tabber.js"></script>
    <link rel ="stylesheet" href="userprofile.css" type="text/css" media="screen">
    <script type = "text/javascript" src="Homepage.js"></script>
</head>
 
<body>
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
    <input id = "class" type = "submit" value = "Classes" name = "classBtn" onclick = "Stud_Prof_Dropdowns()">
    <input id = "profilename" type = "button"  name = "profilename" onclick = "toggle_visibility('namedropdown')">
    <input id = "notification" type = "submit" value = "" name = "notificationBtn" onclick = "toggle_visibility('notificationdiv')">
  </div>
<!-- END HEADER -->

<div id = "mainpage">

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


<!-- GAWA NI STEPH -->
	<div id="content">
    <div id="aboutholder">
      <div id="aboutstudent">
        <p class="name"> STEPHANIE MACARAEG </p>
          <p class="studentnum"> 11-00574 </p>   

  </div>
    <div id="userphoto"><img src="_assets/Profile-icon.jpg" alt="default avatar">
      </div>  
        </div>
          </div>   
   
  <div class="tabber">
    <div class="tabbertab">
      <h2>Activity</h2>
        <div>
      <p>Most recent actions:</p>
       
      <p class="activity">@10:15PM - Submitted homework</p>
       
      <p class="activity">@9:50PM - Submitted homework</p>
       
      <p class="activity">@8:15PM - Downloaded lecture101</p>
       
      <p class="activity">@12:30PM - Submitted an essay</p>
        </div>
      </div>

      <div class="tabbertab">
        <h2>Settings</h2>
        <div>
        <!--<p>Lorem ipsum<p>-->

        <div id="settings">
        <!--<tr>
          <th>-->
            <label for="my_file"><p class="changedp">Change display photo</p></label>
          <!--</th>
        <td>-->
          <div id="dpbutton">
          <input type="file" name="logo.png" data-max-width="500" data-max-height="300"/>
        <!--</td>
      </tr>-->
          </div>
      </div> 
        </div>
      </div>  

    </div>
</div>
  </div>  
</div> 



</div>
</body>
</html>


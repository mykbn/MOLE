<?php 
  include "connect.php";
  session_start('user_credentials');
  $status = $_SESSION['POSITION'];
 

?>
<html>
<head>
    <link rel ="stylesheet" href="userprofile.css" type="text/css" media="screen">
    <link rel ="stylesheet" href="homepage.css" type="text/css" media="screen">
    <link type="text/css" rel="stylesheet" href="user_quiz.css">
    <title>User Profile</title>
    <meta charset="utf-8" />
    <!-- <title>CEU-MOLE</title> -->
    <script type="text/javascript" src="tabber.js"></script>
    <script type = "text/javascript" src="jQuery.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type = "text/javascript" src="Homepage.js"></script>
    <script type = "text/javascript">
      function ChangeProfileName(){
        var pic = document.getElementById('profilepicture');
        pic.src = <?php echo json_encode($_SESSION['PROFILEPIC']); ?>;
        var profile = document.getElementById('profilename');
        profile.value = <?php echo json_encode($_SESSION['REALNAME']); ?>;
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

      // function DisplayGrades(){
      //   var a = "asdasdsad";
      //   $.post("DisplayGradesForProfile.php", {b:a}, function(data){
      //     ("#tabber").html(data);
      //     alert (data);
      //   });
      // }
    </script>
</head>
 
<body onload = "ChangeProfileName()">
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

    <!-- GAWA NI STEPH -->
  	<div id="content">
      <div id="aboutholder">

        <div id="aboutstudent">
          <p class="name"> <?php echo json_encode($_SESSION['REALNAME']); ?> </p>
          <p class="studentnum"> <?php echo json_encode($_SESSION['ID']); ?> </p>   
        </div>

        <div id="userphoto">
          <?php
            function change_profile_image($user_id, $file_temp, $file_extn){
              include 'connect.php';
              // echo ($file_temp);
              $file_path = 'images/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
              echo ($file_path);
              move_uploaded_file($file_temp, $file_path);

              $query = "UPDATE professors SET `profile` = '" . mysql_real_escape_string($file_path) . "' WHERE `ID_No` = " . (int)$_SESSION['ID'];
              
              if($insertPath = mysqli_query($conn, $query)){
                echo "Uploaded Successfullyyyyyyy!";
                $_SESSION['PROFILEPIC'] = $file_path;
              }else{
                echo "Error: " . mysqli_error($conn);
              }
            }

            if (empty($_SESSION['PROFILEPIC']) === false){
              echo '<img id = "profilepic" src="', $_SESSION['PROFILEPIC'], '" alt="', $_SESSION['Firstname'] , '\'s Profile Image">';
            }
          ?>
        </div>  

      </div>

    </div>   
     
    <div class="tabber">
      <div class="tabbertab">
        <h2>Activity</h2>
          <div id="gradecontainer">
            <!-- <p id = 'gradescontainer'>asdasdasdas</p> -->
            <?php
              if($_SESSION['POSITION'] == "Student"){
              echo "<p>Grades:</p>";
              $get_grades = "SELECT * FROM `grades_".$_SESSION['ID']."`";
              $execute_query = mysqli_query($conn, $get_grades) or die ("Error: ".mysqli_error($conn));
              echo "<table class='table-fill' border='solid 1px'>";
              echo "<th class='text-left'>Quiz Title</th>";
              echo "<th class='text-right'>Grade</th>";
              while ($row = mysqli_fetch_array($execute_query)){
                echo "<tr><td class='text-left'>";
                echo $row['Quiz_Title'];
                echo "</td><td class='text-right'>";
                echo $row['Grade'];
                echo "</td></tr>";
              }
              echo "</table>";
              }else{
                $check_created_classes = "SELECT `Classes` From classes WHERE `Created_By` = ".$_SESSION['REALNAME'];
                $run_query = mysqli_query($conn, $check_created_classes)or die ("Error: ".mysqli_error($conn));
                echo "<p>Students Grades:</p>";


            }
            ?>
          </div>
        </div>

        <div class="tabbertab">
          <h2>Settings</h2>
          <div>
            <div id="settings">
              <div class="profile"> 
                <?php
                  if (isset($_FILES['profile']) === true){

                    if (empty ($_FILES['profile']['name']) === true){

                      echo 'please choose a file';
                    } else {

                      $allowed = array('jpg', 'jpeg', 'gif', 'png');

                      $file_name = $_FILES['profile']['name'];
                      $file_extn = strtolower(end(explode('.', $file_name)));
                      $file_temp = $_FILES['profile']['tmp_name'];

                      if (in_array($file_extn, $allowed) === true){
                        change_profile_image($_SESSION['ID'], $file_temp, $file_extn);
                      } else {
                        echo 'Incorrect file type you stupid bitch! Allowed file types:';
                        echo implode(', ', $allowed);
                      
                      }
                    }
                  }
                ?>

              <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="profile"> <input type="submit">
              </form>

              </div>
            </div> 
          </div>
        </div>  
    </div>

  </div>
  <!-- END MAINPAGE -->

</div> 
<!-- END MAIN  -->
</body>
</html>


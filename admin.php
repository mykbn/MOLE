<html>
<head>
  <link type="text/css" rel="stylesheet" href="admin.css">
  <link type="text/css" rel="stylesheet" href="userprofile.css">
<title>Admin Tool</title>
<script type = "text/javascript" src="jQuery.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

  function myFunction() {
  var x;
    if (confirm('Do you allow her/him to be a course creator?') == true) {
        x = 'You allowed this professor!';
    } else {

    }
      alert(x);
    // document.getElementById('demo').innerHTML = x;
  }

  function myFunction2() {
  var x;
    if (confirm("You don't allow her/him to be a course creator?") == true) {
        x = "You denied her/him to be a course creator.";
    } else {

    }
    alert(x);
    // document.getElementById("demo1").innerHTML = x;
  }

  function getData(){
    $.post("getUsers.php", {variable:'lala'},function(data){
      // alert ('HAHAHAHAHAH');
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
  </div>


<table id = "table" class="flatTable">
  <tr class="titleTr">
    <td class="titleTd">ADMIN TOOL</td>
    <!-- <td colspan="4"></td> -->
    <!-- <td class="plusTd button"></td> -->
  </tr>
<!--   <tr class="headingTr">
    <td>ID NO</td>
    <td>LAST NAME</td>
    <td>FULL NAME</td>
    <td>COLLEGE/SCHOOL</td>
    <td>STATUS</td>
    <td></td>
  </tr>
  
  <tr>
    <td>24334324</td>
    <td>Feb 21,2013</td>
    <td>White Out</td>
    <td>$2,000</td>
    <td>Paid</td>
    <td class="controlTd">
      <div class="settingsIcons">
        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
      </div>  
    </td>
  </tr>
  
  <tr>
    <td>#2331212</td>
    <td>Feb 21,2013</td>
    <td>White Out</td>
    <td>$2,000</td>
    <td>Paid</td>
    <td class="controlTd">
      <div class="settingsIcons">
        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
      </div> 
    </td>
  </tr>
  
  <tr>
    <td>#2331212</td>
    <td>Feb 21,2013</td>
    <td>White Out</td>
    <td>$2,000</td>
    <td>Paid</td>
    <td class="controlTd">      
      <div class="settingsIcons">
        <span class="settingsIcon"><img src="http://i.imgur.com/nnzONel.png" alt="X" /></span>
        <span class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></span>
        <div class="settingsIcon"><img src="http://i.imgur.com/UAdSFIg.png" alt="placeholder icon" /></div>
      </div>    
     </td>
  </tr>

</table> -->
</body>
</html>



</div>
</body>
</html>
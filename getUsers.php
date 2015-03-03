<?php
include 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM professors") 
  or die (mysqli_error($conn));


while ($row = mysqli_fetch_array($query)){
  echo "<tr class='headingTr'><th>Firstname</th><th>Lastname</th><th>Username</th><th>Email</th><th>School/College</th><th>Course Creator</th><th>Status</th></tr> ";
  echo "<tr><td class='data'>";
  echo $row['Firstname'];
  echo "</td><td class='data'>";
  echo $row['Lastname'];
  echo "</td><td class='data'>";
  echo $row['Username'];
  echo "</td><td class='data'>";
  echo $row['Email'];
  echo "</td><td class='data'>";
  echo $row['School_College'];
  echo "</td>";

  //status
  if ($row['Status'] == 'pending'){

  echo "<td>";
  echo '<button id= "approvalButton" name ="'.$row['Username'].'" onclick="Approve(this.name)">Approve</button> ';
  echo "</td>";
  echo "<td class='data'>";
  echo "Not Yet Verified";
  echo "</td></tr>";

  }else if ($row['Status'] == 'verified'){

  echo "<td>";
  echo '<button id= "approvalButton" name ="'.$row['Username'].'" onclick="Deny(this.name)">Deny</button>';
  echo "</td>";
  echo "<td class='data'>";
  echo "Verified";
  echo "</td></tr>";

  }

}
// echo "</table>";

mysqli_close($conn);
?>
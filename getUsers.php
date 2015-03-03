<?php
include 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM professors") 
  or die (mysqli_error($conn));


while ($row = mysqli_fetch_array($query)){
  echo "<tr class='headingTr'><th>Firstname</th><th>Lastname</th><th>Username</th><th>Password</th><th>Email</th><th>School/College</th><th>Course Creator</th><th>Status</th></tr> ";
  echo "<tr><td class='data'>";
  echo $row['Firstname'];
  echo "</td><td class='data'>";
  echo $row['Lastname'];
  echo "</td><td class='data'>";
  echo $row['Username'];
  echo "</td><td class='data'>";
  echo $row['Password'];
  echo "</td><td class='data'>";
  echo $row['Email'];
  echo "</td><td class='data'>";
  echo $row['School_College'];
  echo "</td>";

  //status
  if ($row['Status'] == 'pending'){

  echo "<td>";
  echo '<button onclick="myFunction()">Approve</button> ';
  echo "</td>";
  echo "<td>";
  echo "Not Yet Verified";
  echo "</td></tr>";

  }else if ($row['Status'] == 'Verified'){

  echo "<td>";
  echo '<button onclick="myFunction2()">Deny</button>';
  echo "</td>";
  echo "<td>";
  echo "Verified";
  echo "</td></tr>";

  }

}
// echo "</table>";

mysqli_close($conn);
?>
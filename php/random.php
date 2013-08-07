<?php
$con=mysqli_connect("localhost","saverlogin","remember","ideasaver");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM ideas ORDER BY RAND() LIMIT 1");
//$resultarray = mysql_fetch_array($result);
//if (mysql_num_rows($resultarray) == 0) {
 //   echo "No ideas yet, add some over there -> and start seing things here!";
//} else {
while($row = mysqli_fetch_array($result))
  {
  echo $row['content'];
  echo "<div id='ideanumber'>Idea<span id='ideaid'>" . $row['id'] . "</span></div>";
  };
//};


mysqli_close($con);
?>
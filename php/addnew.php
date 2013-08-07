<?php 
$newentry = $_POST['ideabox'];

$con=mysqli_connect("localhost","saverlogin","remember","ideasaver");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//add to 
$sql= "INSERT INTO ideas (content) VALUES('".$_POST['ideabox']."')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "Added:" . $_POST['ideabox'];

mysqli_close($con);
?>
<? //forget
$rowtodelete = $_GET['inputideanumber'];
$con=mysqli_connect('localhost','saverlogin','remember','ideasaver');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="DELETE FROM ideas WHERE id='".$rowtodelete."'";
mysqli_query($con, $sql)or die(mysql_error());
echo "Idea number " . $rowtodelete . " deleted!";
?>
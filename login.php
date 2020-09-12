	<?php
	session_start();
	$username = $password = "";
	if(isset($_POST['submit'])) {
			$username = $_POST["username"]; 
		    $password = $_POST["password"];
		}
require('config.php');
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM Users_table WHERE username='$username' and password='$password'";
$result = $conn->query($sql);
if (!$row=$result->fetch_assoc()) {
	  header("Location:error.php");
}
  		else { 
			  $_SESSION['name'] = $_POST['$username'];
			  header("Location:dashboard.php");

		  }
   
	
$conn->close();
	?>

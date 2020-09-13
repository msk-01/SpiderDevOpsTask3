	<?php
	session_start();
require('config.php');
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username = $password = "";

	if(isset($_POST['submit'])) {
//Username
		if (empty($_POST["username"])) {
			header("Location: error1.html");
		  } 
		  else {
			$username = test_input($_POST["username"]);
			// check if name only contains letters 
			if (!preg_match("/^[A-Za-z]+$/",$username)) { 
			  header("Location: error1.html");
			}
			else{
				$username = mysqli_real_escape_string($conn, $_POST["username"]); // to prevent sql injection
			}
		}

//Password
		if (empty($_POST["password"])) {
			header("Location:error1.html");
		  } 
		  else {
			$password = test_input($_POST["password"]);
			// check if name only contains letters and whitespace
			if(strlen($password) >= 8)
			{
				if (!preg_match("/^(?=.*?[0-9])(?=.*?[A-Za-z]).+/",$password)) {
					header("Location: error1.html");
			}
			else{
				$password = mysqli_real_escape_string($conn, $_POST["password"]); // to prevent sql injection
			}}
			else{
				header("Location:error1.html");
			}	  
		}
	}

//Remember me	
if(!empty($_POST["remember"])) {
	setcookie ("uname",$_POST["username"],time()+ (24 * 60 * 60)); //cookie set for 1 day
} else {
	if(isset($_COOKIE["uname"])) {
		setcookie ("uname","");
	}
} 

function test_input($data)
{
	$data = trim($data); //removes whitespaces from end and start
	$data = stripslashes($data); //removes backslashes
	$data = htmlspecialchars($data); //protection from xss attack
	return $data;
}
	
  

$sql = "SELECT username, password FROM users_table";
$result = $conn->query($sql);
if (!$row=$result->fetch_assoc()) {
	  header("Location:error1.html");
}
  		else { if(isset($_POST["username"])){
			  $_SESSION["name"] = $_POST["username"];
			  header("Location: dashboard.php");
		  }}

	
$conn->close();
	?>

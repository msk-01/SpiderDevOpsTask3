<?php
     require('config.php');
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$username = $password = "";
	//Username
	if(isset($_POST['submit'])) {

		if (empty($_POST["username"])) {
			header("Location: error.html");
		  } 
		  else {
			$username = test_input($_POST["username"]);
			// check if name only contains letters 
			if (!preg_match("/^[A-Za-z]+$/",$username)) { 
			  header("Location: error.html");
			}
			else{
				$username = mysqli_real_escape_string($conn, $_POST["username"]); // to prevent sql injection
			}
		}

//Password
		if (empty($_POST["password"])) {
			header("Location:error.html");
		  } 
		  else {
			$password = test_input($_POST["password"]);
			// check if name only contains letters and whitespace
			if(strlen($password) >= 8)
			{
				if (!preg_match("/^(?=.*?[0-9])(?=.*?[A-Za-z]).+/",$password)) {
					header("Location: error.html");
			}
			else{
				$password = mysqli_real_escape_string($conn, $_POST["password"]); // to prevent sql injection
			}}
			else{
				header("Location:error.html");
			}	  
		}
	}

function test_input($data)
{
	$data = trim($data); //removes whitespaces from end and start
	$data = stripslashes($data); //removes backslashes
	$data = htmlspecialchars($data); //protection from xss attack
	return $data;
}

$query = "INSERT INTO Users_table(username, password)
VALUES('$username', '$password')";
if (mysqli_query($conn, $query)) {
	$link = 'http://localhost/phptestspider/login.html';
	echo "Account has been created successfully";
	echo "<br>";
	echo "<a href='$link'>Click here to login</a>";
}

else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
	?>



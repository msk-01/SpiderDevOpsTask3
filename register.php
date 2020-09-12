<?php

	$username = $password = "";
	if(isset($_POST['submit'])) {
			$username = $_POST["username"]; 
		    $password = $_POST["password"];
		}

     require('config.php');
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$query = "INSERT INTO Users_table(username, password)
VALUES('$username', '$password')";
if (mysqli_query($conn, $query)) {
  echo "Your account has been created successfully!!";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
	?>



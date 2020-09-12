<?php
require('config.php');
// sql to create table
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check Connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}

$table1 = "CREATE TABLE Users_table(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL)";

$table2 = "CREATE TABLE Updates_table(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
receiver_id INT(6) UNSIGNED NOT NULL,
message VARCHAR(30) NOT NULL,
datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
if (mysqli_query($conn, $table1)) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
if (mysqli_query($conn, $table2)) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

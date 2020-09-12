<?php

session_start();
include 'config.php';
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$message = $_POST['message'];
$name = $_SESSION['name'];

$sql="INSERT INTO Updates_table(name, message) values('$name', '$message')";
$result=$conn->query($sql);


header("Location:dashboard.php");
?>

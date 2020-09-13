<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
    <?php
    session_start();
    require("config.php");
     ?>
    <div id="main">
    <h1 style= "background-color: GreenYellow";
                    color: white;"><?php echo $_SESSION['name']?> Online</h1>
    <div class= "output" style="background-color: AliceBlue;
                                box-shadow: 0px 1px 1px #000;
                                height: 250px;
                                margin-bottom: 20px;
                                overflow: scroll">
<?php
 // Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * FROM updates_table";
 $result = $conn->query($sql);
 if($result->num_rows > 0) {
     while($row = $result->fetch_assoc())
     {
         echo "" . $row["name"]. " " .":: " . $row["message"]." -" .$row["datetime"]. "<br>";
         echo "<br>";
     }
 }
 else {
     echo "0 results";
 }
 $conn->close();
?>
    </div>
    <form action="send.php" method:"post">
        <textarea name="message" placeholder="Type to send message" class="form-control"></textarea><br>
        <input type="submit" value="Send">
    </form><br>    
</body>
</html>

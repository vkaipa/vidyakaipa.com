<?php include('./config/credentials.php'); ?>

<?php
$servername = $MYSQL_SERVER;
$username = $MYSQL_USER;
$password = $MYSQL_PASSWORD;
$dbname = $DBNAME;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "SELECT * FROM `resources` where resources.skill_id = 2 or resources.skill_id = 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Read " . $row["title"]. " by: " . $row["author"]. " accessible at " . $row["url"]. "<br>";
  }
} else {
  echo "Sorry, no results";
}

// Close connection
$conn->close();
?>
















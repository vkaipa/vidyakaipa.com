
<?php
include('./config/credentials.php');
$requested_resources = [];

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

$sql = "SELECT resources.title, resources.author, resources.url, resources.skill_id, skills.skill, skills.category
FROM `resources` 
LEFT JOIN `skills` on skills.skill_id = resources.skill_id 
WHERE resources.skill_id = 2 or resources.skill_id = 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

	$book = [];
	$book["author"] = $row["author"];
	$book["url"] = $row["url"];
	$book["author"] = $row["title"];

	if ( $requested_resources[$row["skill_id"]] ) {
		array_push($requested_resources[$row["skill_id"]], $book);
	} else {
		$requested_resources[$row["skill_id"]] = [$book];
	}

	//echo json_encode($book);
  }
  echo json_encode($requested_resources);
  print_r($requested_resources);
} else {
  echo "Sorry, no results";
}

// Close connection
$conn->close();
?>
















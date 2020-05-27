<?php
header("Content-type: application/json");

include('./config/credentials.php');
$requested_resources = [];

$servername = $MYSQL_SERVER;
$username = $MYSQL_USER;
$password = $MYSQL_PASSWORD;
$dbname = $DBNAME;
//preg_replace('/[^0-9]/', '', $_GET['skills'])

$skill_ids = $_GET['skills'];

$skill_ids = explode(',', $skill_ids);

$skill_ids_mysql = "WHERE";

$i = 0;
foreach ($skill_ids as $s) {
    $i++;

    $skill_ids_mysql .= "
     resources.skill_id = ".$s;

    if ($i != count($skill_ids)) {
        $skill_ids_mysql .= " or ";
    }


}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "SELECT resources.title, resources.author, resources.url, resources.skill_id, skills.skill, skills.category
FROM `resources`
LEFT JOIN `skills` on skills.skill_id = resources.skill_id ".$skill_ids_mysql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $book = null;
	$book->author = htmlspecialchars($row['author']);
  $book->url = htmlspecialchars($row['url']);
	$book->title = htmlspecialchars($row['title']);
  $book->skill = htmlspecialchars($row['skill']);

	if ( $requested_resources[$row["skill_id"]] ) {
		array_push($requested_resources[$row["skill_id"]], $book);
	} else {
		$requested_resources[$row["skill_id"]] = [$book];
	}

	//echo json_encode($book);
  }
  echo json_encode($requested_resources, JSON_PRETTY_PRINT);
} else {
  echo "Sorry, no results";
}

// Close connection
$conn->close();
?>
















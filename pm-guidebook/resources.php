
<?php
include('./config/credentials.php');
$requested_resources = [];

$servername = $MYSQL_SERVER;
$username = $MYSQL_USER;
$password = $MYSQL_PASSWORD;
$dbname = $DBNAME;
//preg_replace('/[^0-9]/', '', $_GET['skills'])

$skill_ids = $_GET['skills'];

$skill_ids = explode(',', $skill_ids);

print_r($skill_ids);

$skill_ids_mysql = "";

$i = 0;
foreach ($skill_ids as $s) {
    $i++;

    $skill_ids_mysql .= "
    WHERE resources.skill_id = ".$s;

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

echo $sql;


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$book->author = $row["author"];
	$book->url = $row["url"];
	$book->title = $row["title"];

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
















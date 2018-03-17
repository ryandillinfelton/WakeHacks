<?php
$servername = "localhost";
$username = "web";
$password = "webpassword";
$dbname = "foodme";

// Get post values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $description = test_input($_POST["description"]);
  $foodPref = test_input($_POST["foodPref"]);
  $dietaryNeeds = test_input($_POST["dietaryNeeds"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get session userID
session_start();
if (!$userID = $_SESSION["userid"]) {
	echo "not logged in";
} else {
	$sql = "INSERT INTO requests (userID, Title, Description, FoodPref, DietaryNeeds) 
	VALUES('$userID', '$title', '$description', '$foodPref','$dietaryNeeds');";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	    header("Location: requests.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?> 
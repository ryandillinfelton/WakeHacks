<?php
$servername = "localhost";
$username = "web";
$password = "webpassword";
$dbname = "foodme";

$first = $last = $state = $city = $streetAddress = "";

// Get post values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first = test_input($_POST["email"]);
  $last = test_input($_POST["password"]);
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

$sql = "INSERT INTO users (FirstName, LastName, Country, State, City, StreetAddress)
VALUES ('$first', '$last', 'US', '$state', '$city', '$streetAddress')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
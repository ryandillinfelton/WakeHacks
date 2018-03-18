<?php
$servername = "localhost";
$username = "web";
$password = "webpassword";
$dbname = "foodme";

$bio = $email = $first = $last = $state = $city = $streetAddress = $userPassword = "";

// Get post values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $userPassword = test_input($_POST["password"]);
  $first = test_input($_POST["first"]);
  $last = test_input($_POST["last"]);
  $state = test_input($_POST["state"]);
  $city = test_input($_POST["city"]);
  $streetAddress = test_input($_POST["streetAddress"]);
  $bio = test_input($_POST["bio"]);
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

$sql = "INSERT INTO users (email, FirstName, LastName, Country, State, City, StreetAddress, Bio, Password)
VALUES ('$email', '$first', '$last', 'US', '$state', '$city', '$streetAddress', '$bio', '$userPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
<?php
$servername = "localhost";
$username = "web";
$password = "webpassword";
$dbname = "foodme";

$email = $userPassword = $retrievedPassword = "";

// Get post values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $userPassword = test_input($_POST["password"]);
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

$sql = "SELECT Password FROM users WHERE email = '$email';";
$result = "";

if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    $retrievedPassword = $row["Password"];
    if($retrievedPassword == $userPassword) {
      echo "LOGGED IN <br>";
    } else {
      echo "wrong password" . $retrievedPassword . "<br>";
    }
} else {
    echo $email . "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    echo $result . "<br>";
}

$conn->close();
?> 
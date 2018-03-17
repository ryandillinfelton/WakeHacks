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

$sql = "SELECT Password,ID FROM users WHERE email = '$email';";
$result = "";

if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    //get values out of result
    $retrievedPassword = $row["Password"];
    $userID = $row["ID"];
    //Successfull log in
    if($retrievedPassword == $userPassword) {
      echo "LOGGED IN <br>";
      //start the session to store user ID
      session_start();
      $_SESSION["userid"] = $userID;
      echo "UserID" . $_SESSION["userid"] . ".<br>";
      header("Location: account.php");
    } else {
      echo "<script type='text/javascript'>alert(\"WRONG PASSWORD\");</script>";
      header("Location: login.php");
    }
} else {
    echo $email . "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    echo $result . "<br>";
}

$conn->close();
?> 
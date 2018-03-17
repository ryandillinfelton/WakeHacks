<!DOCTYPE html>
<html>
<head>
	<title>FoodMe - account</title>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "web";
		$password = "webpassword";
		$dbname = "foodme";

		$fname = $lname = "";

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

			$sql = "SELECT * FROM users WHERE ID = '$userID';";
			$result = "";

			if ($result = $conn->query($sql)) {
				//get the first fetched row
			    $row = $result->fetch_assoc();

			    //set variables with result
			    $fname = $row["FirstName"];
			    $lname = $row["LastName"];
			    $country = $row["country"];
			    $state = $row["State"];
			    $city = $row["City"];

			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
			}
			$conn->close();

			//page content
			echo "<h1>Account page</h1></br>";
			echo "<h1>$fname $lname </h1></br>";
			echo "<h2>Location: $country, $state, $city</h2><br><br>";
		}
	?>
</body>
</html>
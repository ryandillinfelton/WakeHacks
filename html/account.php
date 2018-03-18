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

			//page content
			echo "<link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\">";
			echo "<div class=\"w3-content w3-padding\" style=\"max-width:1564px\">";

			echo "  <h2>Account</h2>";

			echo "  <div class=\"w3-row-padding w3-grayscale\">";
			echo "    <div class=\"w3-col l3 m6 w3-margin-bottom\">";
			echo "      <h3>$fname $lname</h3>";
			echo "      <p class=\"w3-opacity\">Voulenteer</p>";
			echo "    </div>";
			echo "  </div>";

			echo "  <br>";
			echo "  <br>";

			echo "  <div class=\"w3-row-padding w3-grayscale\">";
			echo "  	<div class=\"w3-col l3 m6 w3-margin-bottom\">";
			echo "		<h4>Location</h4>";
			echo "	  	<p class=\"w3-opacity\">$country, $state, $city</p>";
			echo "	</div>";
			echo "  </div>";

			echo "  <br>";
			echo "  <br>";

			echo "  <div class=\"w3-row-padding w3-grayscale\">";
			echo "  	<div class=\"w3-col l3 m6 w3-margin-bottom\">";
			echo "		<h4>Bio</h4>";
			echo "	  	<p class=\"w3-opacity\">I love giving back to the community!</p>";
			echo "	</div>";
			echo "  </div>";

			echo "</div>";
		}
	?>
</body>
</html>

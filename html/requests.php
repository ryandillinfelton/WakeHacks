<!DOCTYPE html>
<html>
<title>FoodMe - Requests</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body style="margin-top: 2em;">
	<?php
    	include("header.html");
		$servername = "localhost";
		$username = "web";
		$password = "webpassword";
		$dbname = "foodme";

		$userID;

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
			//header("Location: login.php");
		} else {
			$sql = "SELECT * FROM requests JOIN users ON requests.userID=users.ID;";
			$result = "";

			if ($result = $conn->query($sql)) {
				//get the first fetched row

				echo "<div class=\"w3-content w3-padding\" style=\"max-width:1564px\">";

			    while($row = $result->fetch_assoc()){
			    	//set variables with result
			    	$rid = $row["ID"];
				    $title = $row["Title"];
				    $description = $row["Description"];
				    $foodPref = $row["FoodPref"];
				    $dietaryNeeds = $row["DietaryNeeds"];
				    $fname = $row["FirstName"];
				    $lname = $row["LastName"];


					echo "<div class=\"w3-container w3-display-middle\" style=\"background-color: #e6faff; text-color: #020513; margin-top: 2.5em; border-radius: 15px;\">";
					echo "	<div class=\"w3-row-padding w3-grayscale\">";
					echo "      <div class=\"w3-col l3 m6 w3-margin-bottom\">";
					echo "        <h2>$title by $fname $lname</h2>";
					echo "		<br>";
					echo "		<p>$description</p>";
					echo "		<p>$foodPref</p>";
					echo "		<p>$dietaryNeeds</p>";
					echo "      </div>";
					echo "    </div>";
					echo "</div>";


			    }

				echo "</div>";

			    //set variables with result
			    $title = $row["Title"];
			    $description = $row["Description"];
			    $foodPref = $row["FoodPref"];
			    $dietaryNeeds = $row["DietaryNeeds"];

			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
			}
			$conn->close();
		}
	?>
</body>
</html>

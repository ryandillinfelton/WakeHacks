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
		$rid;

		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$rid = test_input($_GET["rid"]);
			echo $rid;
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
			//header("Location: login.php");
		} else {
			$sql = "SELECT * FROM requests JOIN users ON requests.userID=users.ID WHERE requests.ID = $rid;";
			$result = "";

			if ($result = $conn->query($sql)) {
				//get the first fetched row
			    while($row = $result->fetch_assoc()){
			    	//set variables with result
			    	$rid = $row["ID"];
				    $title = $row["Title"];
				    $description = $row["Description"];
				    $foodPref = $row["FoodPref"];
				    $dietaryNeeds = $row["DietaryNeeds"];
				    $fname = $row["FirstName"];
				    $lname = $row["LastName"];

					echo "<div class=\"w3-container w3-display-middle\" style=\"background-color: #e6faff; text-color: #020513;\">";
					echo "<h1 class=\"fs-title\" >Register Below<br></h1>";
				    echo "<a href=requestDetails.php?rid=$rid>";
				    echo "<div style=' margin: auto; width:60%;'>";
				    echo "<h1>$title by $fname $lname</h1><br>";
				    echo "<p>$description</p><br>";
				    echo "<p>$foodPref</p><br>";
				    echo "<p>$dietaryNeeds</p><br>";
				    echo "<a href='createResponse.php'>Reply</a>";
				    echo "</div>";

			    }

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

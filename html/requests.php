<!DOCTYPE html>
<html>
<title>FoodMe - Requests</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
	<?php
    	include("/path/to/file.html");
		$servername = "localhost";
		$username = "web";
		$password = "webpassword";
		$dbname = "foodme";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		//get session userID
		session_start();
		if (!$userID = $_SESSION["userID"]) {
			echo "not logged in";
			header("Location: login.php");
		} else {
			$sql = "SELECT * FROM requests JOIN users ON requests.userID=users.ID;";
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
				    echo "<div style='border:solid black; margin: auto; width:60%;'>";
				    echo "<h1>$title by $fname $lname</h1><br>";
				    echo "<p>$description</p><br>";
				    echo "<p>$foodPref</p><br>";
				    echo "<p>$dietaryNeeds</p><br>";
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

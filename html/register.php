<!DOCTYPE html>
<html>
<head>
	<title>FoodMe - Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background-color:#020513;">

	<div class="w3-container w3-display-middle" style="background-color: #e6faff; text-color: #020513; margin-top: 2.5em; border-radius: 15px;">
		<h1 class="fs-title" >Register Below<br></h1>
		<form action="registerAction.php" method="post">
			<p>Account Info<br></p>
			<p>Email:<br></p>
			<input type="text" name="email"><br>
			<p>Password:<br></p>
			<input type="password" name="password"><br>
			<p>First name:<br></p>
			<input type="text" name="first"><br>
			<p>Last name:<br></p>
			<input type="text" name="last"><br>
			<p>State:<br></p>
			<select name="state"><br>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select><br>
			<p>City<br></p>
			<input type="text" name="city"><br>
			<p>Street Address:<br></p>
			<input type="text" name="streetAddress"><br>
			<p>Bio:<br></p>
			<input type="textarea" name="bio"><br><br>
			<input type="submit">
			</form>
			<br>
			<br>
	</div>
</body>
</html>

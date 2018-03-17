<!DOCTYPE html>
<html>
<head>
	<title>FoodMe - Register</title>
</head>
<body>
	<h1>Register Below</h1>
	<form action="registerAction.php" method="post">
		First name:<br>
		<input type="text" name="first"><br>
		Last name:<br>
		<input type="text" name="last"><br>
		State:<br>
		<select name="state"><br>
  			<option value="NC">NC</option>
  			<option value="SC">SC</option>
  			<option value="VA">VA</option>
  			<option value="TN">TN</option>
		</select><br>
		City:<br>
		<input type="text" name="city"><br>
		Street Address:<br>
		<input type="text" name="streetAddress"><br>
		<input type="submit">
	</form>
</body>
</html>
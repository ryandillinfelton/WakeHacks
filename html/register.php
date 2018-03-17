<!DOCTYPE html>
<html>
<head>
	<title>FoodMe - Register</title>
</head>
<body>
	<h1>Register Below</h1>
	<form action="registerAction.php">
		First name:<br>
		<input type="text" name="first">
		Last name:<br>
		<input type="text" name="last">
		State:
		<select name="state">
  			<option value="NC">NC</option>
  			<option value="SC">SC</option>
  			<option value="VA">VA</option>
  			<option value="TN">TN</option>
		</select>
		<input type="text" name="city">
		<input type="text" name="streetAddress">
	</form>
</body>
</html>
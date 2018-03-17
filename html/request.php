<!DOCTYPE html>
<html>
	<head>
		<title>FoodMe - Request</title>
	</head>
	<body>
		<h1>Create a food request</h1>

		<form action="requestAction">
			When would you like your food?
			<input type="date" name="requestDate">
			<input type="time" name="requestTime">
			<br>
			Please enter your food preference:
			<input type="text" name="foodPref">
			Please list any dietary needs that apply:
			<input type="text" name="dietaryNeeds">
		</form>
	</body>
</html>

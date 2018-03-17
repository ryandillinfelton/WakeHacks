<!DOCTYPE html>
<html>
	<head>
		<title>FoodMe - Request</title>
	</head>
	<body>
		<h1>Create a food request</h1>

		<form action="requestAction">
			Please provide a brief explanation of your situation:
			<input type="textarea" name="requestContext">
			<br>
			When would you like your food?
			<input type="date" name="requestDate">
			<input type="time" name="requestTime">
			<br>
			Please enter your food preference:
			<input type="textarea" name="foodPref">
			Please list any dietary needs that apply:
			<input type="textarea" name="dietaryNeeds">
		</form>
	</body>
</html>

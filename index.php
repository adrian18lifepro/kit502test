<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home page</title>
</head>
<body>
	
	<h2>Welcome to E-shop</h2>
	<h3>You can create an account here here</h3>
	<div class="login">
	<form action="./php/insert.php" method="POST">
		<label>Username: </label>
		<input type="text" name="customer_name">
		<label>Password: </label>
		<input type="password" name="password">
		<input type="submit" name="submit" value="Submit">
	</form>
	<br />
	<h3>If you have an account, You can log in.</h3>
	<a href="./php/signin_form.php">Log In</a>


</body>
</html>
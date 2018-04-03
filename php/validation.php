<?php 


if(isset($_POST['submit'])) {
	$username = userValidate($_POST['username'], $_POST['password']);
	$_SESSION['user'] = $username;
} elseif(isset($_GET['logout'])) {
	session_destroy();
	header('location:index.php');
}

function userValidate($username, $password) {
	global $mysqli;
	$username = $mysqli->real_escape_string($username);
	$md5_password = md5($password);
	$query = "SELECT * FROM 'tb_customer' WHERE customer_id LIKE '$username' AND password='$md5_password' ";

	$result = $mysqli->query($query);

	if ($row = $result->fetch_array(MYSQL_ASSOC)) {
		return $username;
	} else {
		return "error";
	}
}


 ?>
<?php
$servername = "localhost";
$username = "root";
$password = "Bobly1891";
$dbname = "kit502";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['submit'])) {
	$name = $_POST['customer_name'];
	$pass = $_POST['password'];

	// password hash
	$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];
	$hashed_password = password_hash("$pass", PASSWORD_BCRYPT, $options);

	$sql = "INSERT INTO tb_customer (customer_name, password) VALUES ('$name', '$hashed_password')";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully, you can <a href='../index.php'>LOG IN</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
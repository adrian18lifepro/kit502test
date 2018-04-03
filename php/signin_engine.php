<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

//receive the username data from the form (in signin_form.php)
$user=$_POST['username'];
//receive the password data from the form (in signin_form.php)
$password=$_POST['password'];

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM tb_customer WHERE customer_name='$user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
$row=$result->fetch_array(MYSQLI_ASSOC);

// compare hashed password
// See the password_hash() example to see where this came from.
$hash = $row['password'];

// if (password_verify($password, $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
//if the username from table is not same as the username data from the form(from signin_form.php)
if($row['customer_name']!=$user || $user=="")
{
	//automatically go back to signin_form and pass the error message
	header('Location: ./signin_form.php?error=invalid_username');
}
//if the username is same as the username data from the form(from signin_form.php) 
else {
	//if the password from table is same as the password data from the form(from signin_form.php)
	// if($row['customer_name']==$password) {
	if (password_verify($password, $hash)) {
		//save the username in the session
		$session_user=$row['customer_name'];
		$_SESSION['session_user']=$session_user;
		//automatically go to signin_success.php
		header('Location: ./signin_success.php');
	}//if the password from table does not match with the password data from the signin form
	else{

		//automatically go back to signin_form and pass the error message
		header('Location: ./signin_form.php?error=invalid_password');
	}
}
?>
<?php
//include the file session.php
include("session.php");

//if the session for username has been set, automatically go to "signin_success.php"
if($session_user!="") {
	header('location: ./signin_success.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
}
?>
<html>
<head>
<title>Sign In</title>
</head>

<body>
	<!--heading-->
	<h1>Sign in</h1>
    <p>Please enter your username and password</p><br>
   
	<table>
	<!--when the submit button is clicked, the submitted data(username, password) will be sent to signin_engine.php -->
    <form action="./signin_engine.php" method="POST">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="username" type="text" id="username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="password" type="password" id="password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Sign in">
			<input type="reset" name="reset" value="Reset"></td>
      	</tr>
	</form>
	</table>
</body>
</html>


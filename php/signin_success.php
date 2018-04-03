<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

$res=mysqli_query($mysqli, "SELECT * FROM users WHERE username LIKE '$session_user'"); 
if ($res) $rs = mysqli_fetch_array($res);

//if the session for username has not been saved, automatically go back to signin_form.php
if ($session_user==""){
	header('Location: signin_form.php');
}
?>
<html>
<head>
<title>Success</title>
</head>

<body>
<b>You have successfully signed in.</b><br/>
Welcome!! <?php echo $session_user;?><br/>

	<!--if the user clicks "sign out" button, go to signout.php-->
	<form action="./signout.php" method="post">
		<input type="submit" name="submit" value="Sign out">
	</form>
	
	
	<?php 
	// display category
	function display_category() {
		global $mysqli;
		$query = "SELECT DISTINCT category FROM `tb_item`";
		$result = $mysqli->query($query);
		if ( $row_cnt = $result->num_rows >=1 ) {
			echo "Choose the category:<ul>";
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				echo "<li><a href=item.php?category=".$row['category'].">".$row['category']."</a></li>"; // what item.php mean? ; I add </a>;
			}
			echo "</ul>";
		} else {
			echo "Sorry, no items available.";
		}
	}

	 ?>
</body>
</html>
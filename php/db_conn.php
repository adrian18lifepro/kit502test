<?php
//mysql connection (hostname, username, password, dbname);
$mysqli = new mysqli('localhost', 'root', 'Bobly1891', 'kit502');

//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
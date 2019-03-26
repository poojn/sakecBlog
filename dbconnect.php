<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sakecblog";

//create connection
$conn = new mysqli($host, $user, $password, $db);

//check connection
if($conn->connect_error) {
	die('Connection Failed: '. $conn->connect_error);
}
// echo "hey";

?>
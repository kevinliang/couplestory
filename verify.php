<?php

require('includes/connect.php');

$token = $mysqli->real_escape_string($_GET['token']);
$user = $mysqli->real_escape_string(strtolower($_GET['username']));

$query_string = "SELECT email, confirmed_key FROM users WHERE email = '$user' LIMIT 1";
if($result = $mysqli->query($query_string)) {
	$row = $result->fetch_row();
	
	if($user == $row[0] && $row[1] == $token) {
		$query_string2 = "UPDATE users SET confirmed = '1' WHERE email='$user' AND confirmed_key='$token'";
		$mysqli->query($query_string2);
	}
	
	$_SESSION['user'] = $user;
}


?>
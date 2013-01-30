<?php

require('../includes/connect.php');
require('../lib/functions.php');

$email = $mysqli->real_escape_string($_POST['email']);
$pass = $mysqli->real_escape_string($_POST['pass']);
$retype = $mysqli->real_escape_string($_POST['retype']);

if(isset($_POST['submit'])) {
	if($pass != $retype) {
		echo "retype wrong";
	}
	else {
		
		$salt_length = 8;
		$salt = random_string($salt_length);
		
		$encrypted_pass = sha1($pass.$salt);
		
		$token_length = 20;		
		$token = random_string($token_length);

		$identifier_length = 40;
		$series_identifier = random_string($identifier_length);
		
		if($mysqli->query("INSERT INTO users (email, password, salt, confirmed_key, confirmed, series_identifier) VALUES ('$email', '$encrypted_pass', '$salt', '$token', '0', '$series_identifier')")) {
			send_email($email, "Please verify your email", SITE_URL."/verify/$email/$token");
		}
	
	}
}
?>
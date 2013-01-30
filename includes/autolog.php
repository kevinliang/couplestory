<?php
	if(isset($_COOKIE["user_cookie"]) && isset($_COOKIE["identifier"])  && isset($_COOKIE["token"])) {
		$query = "SELECT email, password, salt, confirmed, series_identifier, cookie_token FROM users WHERE email='".$_COOKIE['user_cookie']."' LIMIT 1";
		if($result=$mysqli->query($query)) {
			$row=$result->fetch_row();
			if($_COOKIE['identifier'] == $row[4] && $_COOKIE['token'] == $row[5]) {
				session_start();
				$_SESSION['user'] = $_COOKIE['user_cookie'];
				$new_token = random_string(20);
				setcookie('token', $new_token, time()+3600*24, '/');
				$query2 = "UPDATE users SET cookie_token='$new_token' WHERE email='$row[0]'";
				$mysqli->query($query2);
				return true;
			}
		}
	}
	return false;
?>
<?php 
require('../includes/connect.php');
require('../lib/functions.php');

$email = $mysqli->real_escape_string(strtolower($_POST['email']));
$pass = $mysqli->real_escape_string($_POST['password']);

if(isset($_POST['submit'])) {
	$query = "SELECT id, email, password, salt, confirmed, series_identifier FROM users WHERE email='$email'";
	
	if($result=$mysqli->query($query)) {
		if($result->num_rows == 1) {
			$row=$result->fetch_row();
		
			if(sha1($pass.$row[3]) == $row[2]) {
				session_start();
				ob_start();
			
				$token_length = 20;
				$cookie_token = random_string($token_length);
				
				if(isset($_POST['remember'])) {
					setcookie("uc", $row[0], time()+LOGIN_AUTH_TIME, '/');
					setcookie("i", $row[5], time()+LOGIN_AUTH_TIME, '/');
					setcookie("t", $cookie_token, time()+LOGIN_AUTH_TIME, '/');
					$query2 = "UPDATE users SET cookie_token='$cookie_token' WHERE id='$row[0]'";
					$mysqli->query($query2);
				}
				$_SESSION['user'] = $email;
				$_SESSION['uid'] = $row[0];
				header("Location: http://couplestory.snsdcentral.net");
			}
		
			else {
				echo "incorrect pass";
			}
		}
	}
}

?>
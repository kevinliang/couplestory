<?php

function delete_media($id, $uid, $file_name) {
	require('../includes/connect.php');
	$query = "SELECT id, uid FROM media WHERE uid='$uid' AND id='$id'";
	var_dump($query);
	if($result=$mysqli->query($query)) {
		if($result->num_rows == 1) {
			$query2 = "DELETE FROM media WHERE id='$id'";
			$mysqli->query($query2);
			unlink(IMG_PATH.$file_name);
		}
		else {
			echo "You are not authorized to delete this item";
		}
	}
}

function send_email($to, $subject, $body, $attach=false) {
	require_once('../lib/swift-mailer/swift_required.php');
	require_once('../lib/swift-mailer/swift_init.php');
	
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  	->setUsername('inserthere')
  	->setPassword('insertpasshere');
  
	$mailer = Swift_Mailer::newInstance($transport);
		
	$message = Swift_Message::newInstance($subject)
  	->setFrom(array('your email' => 'email name'))
  	->setTo(array($to => $to))
  	->setBody($body);
  
  $result = $mailer->send($message);
}

function random_string($num_chars) {
	return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $num_chars);
}

function auto_log() {
	require('includes/connect.php');
	if(isset($_COOKIE["uc"]) && isset($_COOKIE["i"])  && isset($_COOKIE["t"])) {
		$query = "SELECT email, password, salt, confirmed, series_identifier, cookie_token FROM users WHERE id='".$_COOKIE['uc']."'";
		if($result=$mysqli->query($query)) {
			$row=$result->fetch_row();
			if($_COOKIE['i'] == $row[4] && $_COOKIE['t'] == $row[5]) {
				session_start();
				$_SESSION['user'] = $row[0];
				$new_token = random_string(20);
				setcookie('uc', $_COOKIE['uc'], time()+LOGIN_AUTH_TIME, '/');
				setcookie('i', $_COOKIE['i'], time()+LOGIN_AUTH_TIME, '/');
				setcookie('t', $new_token, time()+LOGIN_AUTH_TIME, '/');
				$query2 = "UPDATE users SET cookie_token='$new_token' WHERE email='$row[0]'";
				$mysqli->query($query2);
				return true;
			}
		}
	}
	return false;
}
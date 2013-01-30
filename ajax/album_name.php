<?php
require('../includes/connect.php');
session_start();

$aName = $_REQUEST['aName'];
$name = $mysqli->real_escape_string($aName);
$query = "INSERT INTO albums (uid, name) VALUES('".$_SESSION['uid']."', '$name')";
$mysqli->query($query);

?>
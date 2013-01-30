<?php
require('../includes/connect.php');
require('../lib/functions.php');
session_start();
$id = $mysqli->real_escape_string($_POST['id']);
$file_name = $mysqli->real_escape_string($_POST['fileName']);
delete_media($id, $_SESSION['uid'], $file_name);
?>
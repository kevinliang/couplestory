<?php require('includes/connect.php'); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<?php require('lib/functions.php');?>
<?php require('includes/head.php'); ?>
<?php 
if(isset($_SESSION['user']) || auto_log()) { 
	include('main.php');
} else { 
	include('login.php');
}
?>
</body>
</html>
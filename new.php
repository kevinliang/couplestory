<? require('includes/connect.php'); ?>
<!doctype html>
<html>
<? require('includes/head.php');?>
<body>
	<form method="post" action="scripts/signup.php">
		<input type="email" name="email" id="email" placeholder="Email" required />
		<input type="password" name="pass" id="pass" placeholder="Password" required />
		<input type="password" name="retype" id="retype" placeholder="Retype Password" required />
		<input type="submit" name="submit" id="submit" value="Sign Up!" />
	</form>
</body>
</html>
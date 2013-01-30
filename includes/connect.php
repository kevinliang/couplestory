<?php

define('DB_NAME', 'inserthere');     // The name of the database
define('DB_USER', 'inserthere');     // Your MySQL username
define('DB_PASSWORD', 'inserthere'); // ...and password
define('DB_HOST', 'inserthere');     // ...and the server MySQL is running on

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

define('LOGIN_AUTH_TIME', 3600*24*30);
define('SITE_URL', 'couplestory.snsdcentral.net');
define('HOME_PATH', '/home/kevinliang91/couplestory.snsdcentral.net/');
define('IMG_PATH', HOME_PATH.'/img/');

?>
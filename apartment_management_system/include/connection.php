<?php
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ams_db');

($connection = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME)) or
    die(mysqli_connect_error());

?>

<?php
	include_once "config/setup.php";
	include_once "server/user.php";
	// include_once "utils/insert.php";

	echo "Hello World jojo !".PHP_EOL;
	echo date("Y/m/d");
	create_user($pdo, 'simon muran', 'maxgord77', 'flash-gordon77176@gmail.com');
?>

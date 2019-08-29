<?php

define('hostname', 'localhost');
define('user', 'root');
define('password', '');
define('databaseName', 'symsilvempty');

$connect = mysqli_connect(hostname, user, password, databaseName) or die(mysqli_error($connect));
?>
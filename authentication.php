<?php
$username = 'line';
$password = 'up';
if(!isset($_SERVER['PHP_AUTH_USER'])|| !isset($_SERVER['PHP_AUTH_PW'])|| ($_SERVER['PHP_AUTH_USER']!=$username)||($_SERVER['PHP_AUTH_PW']!=$password)) {
    header('HTTP/1.1401 Unathorized');
    header('WWW-Authenticate: Basic realm = "lineup');
    exit('<h2>Lineup</h2>Sorry, you must enter a valid username and password to' . 'access this page.');
}
?>
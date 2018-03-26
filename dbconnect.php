<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$production = isset($url["host"]);

$server = ($production) ? $url["host"] : 'localhost';
$username = ($production) ? $url["user"] : 'root';
$password = ($production) ? $url["pass"] : '';
$db = ($production) ? substr($url["path"], 1) : 'testdb';

$con = new mysqli($server, $username, $password, $db);
?>
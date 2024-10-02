<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "ujipekerja2";

$connection = new mysqli($servername, $username, $pass, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>

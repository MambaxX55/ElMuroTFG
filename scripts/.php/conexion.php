<?php

ini_set('display_errors',1);
$servername = "localhost";
$username = "tormund";
$password = "babygirl";
$dbname = "MasAllaDelMuro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>


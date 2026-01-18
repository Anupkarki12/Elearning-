<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "elearning";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed");
}
?>

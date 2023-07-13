<?php
$host = "http://217.21.84.103"; // Replace with your database host
$dbname = "u573160162_comonk"; // Replace with your database name
$username = "u573160162_sutharrsh"; // Replace with your database username
$password = "Harsh162$"; // Replace with your database password

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

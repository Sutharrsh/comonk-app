<?php
$host = "localhost"; // Replace with your database host
$dbname = "comonk-app"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

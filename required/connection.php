<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "17758_khalil";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully";
?>
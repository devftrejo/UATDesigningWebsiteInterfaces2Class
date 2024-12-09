<?php
$host = 'localhost:3306';
$username = 'root';
$password = '0710';
$dbname = 'mars_voyager';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
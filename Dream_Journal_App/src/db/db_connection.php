<?php
// Database connection parameters:
$host = 'localhost:3306';
$dbname = 'dream_journal';
$username = 'root';
$password = '0710';

// Connect to the database:
try {
    // Create a new PDO instance:
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception:
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { // Report the error!
    // Print a message:
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
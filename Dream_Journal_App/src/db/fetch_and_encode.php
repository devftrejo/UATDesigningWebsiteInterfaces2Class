<?php
require 'db_connection.php'; // Require database connection.

// Fetch dreams from the database:
$query = "SELECT title, description, date FROM dreams";
$result = $pdo->query($query);

// Store dreams in an array:
$dreams = []; // Initialize an empty array.
if ($result->rowCount() > 0) { // If there are dreams in the database.
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Loop through the dreams.
        $dreams[] = $row; // Add each dream to the array.
    }
}

// Encode the array into JSON format:
$jsonData = json_encode($dreams, JSON_PRETTY_PRINT);

// Serve the JSON as a downloadable file:
if (isset($_GET['download']) && $_GET['download'] === 'true') { // If the download parameter is set to true.
    header('Content-Type: application/json'); // Set the content type.
    header('Content-Disposition: attachment; filename="dreams.json"'); // Set the filename.
    echo $jsonData; // Output the JSON data.
    exit; // Exit the script.
}

// Default display for testing:
echo "<pre>$jsonData</pre>";
?>
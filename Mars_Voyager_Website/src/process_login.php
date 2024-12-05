<?php
// Retrieve data from POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = htmlspecialchars($_POST['user_id']);
    $password = htmlspecialchars($_POST['password']);

    // Basic response for now
    echo "<h1>Login Details</h1>";
    echo "<p><strong>User ID:</strong> $userId</p>";
    echo "<p><strong>Password:</strong> $password</p>";
} else {
    echo "Invalid request.";
}
?>
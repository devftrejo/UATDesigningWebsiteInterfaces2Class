<?php
session_start(); // Start the session
require 'config.php'; // Database connection

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = trim($_POST['user_id']);
    $password = trim($_POST['password']);
    $hashed_password = md5($password); // Hash for security

    if ($user_id && $password) {
        // Check credentials in the database
        $query = "SELECT * FROM employees WHERE user_id = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $user_id, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Valid user, set session variables
            $user = $result->fetch_assoc();
            $_SESSION['is_logged_in'] = true;
            $_SESSION['employee_name'] = $user['name'];
            $_SESSION['employee_position'] = $user['position'];
            header('Location: intranet.php'); // Redirect to intranet
            exit;
        } else {
            $error_message = "Invalid User ID or Password.";
        }
    } else {
        $error_message = "Both fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mars Voyager Tours</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <nav class="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="next_voyage.php">Next Voyage</a></li>
            <li><a class="active" href="login.php">Login</a></li>
        </ul>
    </nav>

    <main class="transparent-overlay">
        <h1>Login to Mars Voyager Tours</h1>
        <!-- Login Form -->
        <form id="loginForm" action="" method="POST">
            <!-- User ID Input -->
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" placeholder="Enter your User ID">

            <!-- Password Input -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password">

            <!-- Submit Button -->
            <input type="submit" class="button">
            <!-- Error Message -->
            <?php if ($error_message): ?>
                <p class="error-message"><?= $error_message ?></p>
            <?php endif; ?>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
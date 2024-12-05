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
        <form id="loginForm" action="./process_login.php" method="POST" novalidate>
            <!-- User ID Input -->
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" placeholder="Enter your User ID">

            <!-- Password Input -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password">

            <!-- Submit Button -->
            <input type="submit" class="button">
        </form>
        <p class="error-message" id="errorMessage"></p>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
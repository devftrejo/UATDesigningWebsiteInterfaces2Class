<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Application - Mars Voyager Tours</title>
    <link rel="stylesheet" href="./styles/index.css">
    <script src="./js/validation.js" defer></script>
</head>

<body>
    <nav class="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="next_voyage.php">Next Voyage</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main class="transparent-overlay">
        <h1>Pilot Application Form</h1>
        <!-- When user fills out and submits form, the data is sent via POST method for processing to a PHP file named "application_success". -->
        <form action="./application_success.php" method="POST" id="pilotForm">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="18" max="65" required>

            <label for="experience">Flight Experience (in hours):</label>
            <input type="number" id="experience" name="experience" min="0" required>

            <label for="reason">Why do you want to be a pilot?</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <label for="contact">Contact Email:</label>
            <input type="email" id="contact" name="contact" required>

            <input type="submit" class="button">
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
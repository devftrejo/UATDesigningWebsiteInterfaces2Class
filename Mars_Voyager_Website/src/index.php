<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Voyager Tours</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <nav class="nav-bar">
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="next_voyage.php">Next Voyage</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main class="transparent-overlay">
        <h1>Welcome to Mars Voyager Tours</h1>
        <p class="home-content-p">Your dream of exploring Mars starts here! At Mars Voyager Tours, we offer unparalleled
            experiences in space travel. Be part of the next generation of explorers and pilots.</p>
        <a href="./pilot_application.php" class="button">Apply to be a Pilot</a>
    </main>
    <?php include 'footer.php'; ?> <!-- Include the footer.php file -->
</body>

</html>
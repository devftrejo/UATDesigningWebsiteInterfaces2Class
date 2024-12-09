<?php
session_start();

// Redirect to login page if not authenticated
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Example data for intranet page
$tourists_booked = 45; // Example number of tourists
$liability_form_link = "mars_liability_form.pdf";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Intranet - Mars Voyager</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <header id="employee-data">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['employee_name']); ?></h1>
        <p>Position: <?= htmlspecialchars($_SESSION['employee_position']); ?></p>
    </header>
    <main class="transparent-overlay">
        <h2>Upcoming Mars Tours</h2>
        <p>Number of tourists booked: <?= $tourists_booked; ?></p>
        <h2>Employee Resources</h2>
        <ul id="employee-options">
            <li><a href="<?= $liability_form_link; ?>" target="_blank">Download Liability Form</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
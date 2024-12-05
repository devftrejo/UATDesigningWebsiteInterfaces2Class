<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
    <link rel="stylesheet" href="./styles/index.css">
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
        <h1>Thank You!</h1>
        <p>We have received your application. Here are the details you provided:</p>
        <ul>
            <!-- To display the submitted form data you simply echo all variables. Then use the htmlspecialchars function to replace any HTML special characters so that black hat attackers cannot inject HTML or JS code in the form (XSS Attack). -->
            <li><strong>Name:</strong> <?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'N/A'; ?>
            </li>
            <li><strong>Age:</strong> <?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : 'N/A'; ?></li>
            <li><strong>Experience:</strong>
                <?php echo isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : 'N/A'; ?> hours</li>
            <li><strong>Reason:</strong>
                <?php echo isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : 'N/A'; ?></li>
            <li><strong>Email:</strong>
                <?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : 'N/A'; ?></li>
        </ul>
        <p>Our team will review your application and get back to you soon!</p>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
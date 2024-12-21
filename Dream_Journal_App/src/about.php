<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Dream Journal</title>
    <!-- Link stylesheet -->
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    <!-- Navbar -->

    <?php include "./navbar.php"; ?>

    <!-- Main Content -->

    <div class="about-container">
        <div class="about-content">
            <h1>About Dream Journal</h1>
            <p>Dream Journal is a simple and intuitive web app designed to help you keep track of your dreams. Whether
                you want to reflect on recurring themes, analyze dream patterns, or just document your nightly
                adventures, this app provides an easy-to-use platform for storing your dreams securely.</p>
            <p>The Dream Journal was created to encourage mindfulness and self-discovery. Dreams can be powerful
                insights into our subconscious minds, and we hope this app inspires you to explore yours.</p>
            <p>Features of the app include:</p>
            <ul>
                <li>Simple dream logging and retrieval</li>
                <li>Export dreams in JSON format for personal use</li>
            </ul>
            <p>Thank you for using Dream Journal. Sweet dreams!</p>
        </div>
    </div>

    <!-- Scroll to Top Button -->

    <button id="scroll-to-top" title="Scroll to Top">↑</button>

    <!-- Footer -->

    <?php include "./footer.php"; ?>

    <!-- Main JS -->

    <script src="./js/scripts.js"></script>
</body>

</html>
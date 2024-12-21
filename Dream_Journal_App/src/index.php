<?php
// Include database connection file:
include './db/db_connection.php';

// Handle form submission to save a dream:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');  // Set current date.

    try {
        // Insert dream into database:
        $sql = "INSERT INTO dreams (title, description, date) VALUES (:title, :description, :date)";
        // Prepare the SQL statement:
        $stmt = $pdo->prepare($sql);
        // Bind parameters:
        $stmt->execute(['title' => $title, 'description' => $description, 'date' => $date]);
        // Output success message:
        echo "Dream saved successfully!";
    } catch (PDOException $e) { // Catch any errors.
        // Output error message:
        echo "Error: " . $e->getMessage();
    }
}

// Fetch all dreams from the database:
try {
    // Select all dreams from the database:
    $sql = "SELECT * FROM dreams";
    // Execute the SQL statement:
    $stmt = $pdo->query($sql);
    // Fetch all dreams as an associative array:
    $dreams = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) { // Catch any errors.
    // Output error message:
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Journal</title>
    <!-- Link stylesheet -->
    <link rel="stylesheet" href="./styles/styles.css">
    <!-- Link jQuery via CDN-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->

    <?php include "./navbar.php"; ?>

    <!-- Main Content -->

    <div class="content">
        <h1>Welcome to the Dream Journal</h1>
        <p>Record and explore your dreams.</p>
    </div>

    <!-- Add a new dream form -->

    <section>
        <h2>Add a New Dream</h2>
        <form action="" method="POST">
            <label for="title">Dream Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Dream Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button id="form-button" type="submit">Save Dream</button>
        </form>
    </section>

    <section>
        <!-- List all dreams -->

        <h2>My Dreams</h2>
        <ul>
            <!-- Loop through all dreams and display them -->
            <?php foreach ($dreams as $dream): ?>
                <li>
                    <!-- Display dream title and description -->
                    <strong>Title: <?php echo htmlspecialchars($dream['title']); ?></strong><br>
                    <strong>Date: </strong><?php echo htmlspecialchars($dream['date']); ?><br>
                    <strong>Description: </strong><?php echo htmlspecialchars(substr($dream['description'], 0, 1000)); ?>
                </li>
                <hr> <!-- Divider for each dream -->
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <!-- Download Dreams -->

        <div class="download-section">
            <h2>Download Dreams</h2>
            <button id="download-json">Download JSON</button>
        </div>
    </section>

    <!-- Scroll to Top Button -->

    <button id="scroll-to-top" title="Scroll to Top">↑</button>

    <!-- Footer -->

    <?php include "./footer.php"; ?>

    <!-- Main JS -->

    <script src="./js/scripts.js"></script>
</body>

</html>
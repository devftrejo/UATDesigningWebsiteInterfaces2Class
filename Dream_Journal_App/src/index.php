<?php
include './db/db_connection.php';

// Handle form submission to save a dream
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');  // Set current date

    try {
        // Insert dream into database
        $sql = "INSERT INTO dreams (title, description, date) VALUES (:title, :description, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'description' => $description, 'date' => $date]);
        echo "Dream saved successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch all dreams from the database
try {
    $sql = "SELECT * FROM dreams";
    $stmt = $pdo->query($sql);
    $dreams = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
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
    <header>
        <h1>Dream Journal</h1>
    </header>
    <!-- Add a new dream form -->
    <section>
        <h2>Add a New Dream</h2>
        <form action="" method="POST">
            <label for="title">Dream Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Dream Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Save Dream</button>
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
            <?php endforeach; ?>
        </ul>
    </section>

    <script>
        $(document).ready(function () {
            $('#dreamForm').on('submit', function () {
                // Clear the form fields after submission
                $(this).find('input[type="text"], textarea').val('');
            });
        });
    </script>
</body>

</html>
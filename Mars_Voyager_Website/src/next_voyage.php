<?php
// Calculate the next Mars voyage's departure timestamp (e.g., January 1st, 2025, @12:00 PM UTC):
$nextTrip = strtotime('2025-01-01 12:00:00');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Mars Tour</title>
    <link rel="stylesheet" href="./styles/index.css">
    <script>
        // JavaScript Countdown Timer:
        function startCountdown() { // Function to start the countdown
            const NEXT_TRIP_TIME = <?php echo $nextTrip * 1000; ?>; // PHP timestamp to JS (milliseconds)
            const COUNTDOWN_ELEMENT = document.getElementById("countdown"); // Get the countdown element
            const MESSAGE_ELEMENT = document.getElementById("message"); // Get the message element

            function updateCountdown() { // Function to update the countdown
                const NOW = new Date().getTime(); // Get the current time
                const TIME_LEFT = NEXT_TRIP_TIME - NOW; // Calculate the time left

                if (TIME_LEFT <= 0) { // If the trip has departed
                    COUNTDOWN_ELEMENT.innerText = "The trip has departed!"; // Display a message
                    MESSAGE_ELEMENT.innerText = "Check back for the next adventure!";
                    clearInterval(INTERVAL); // Stop the timer
                    return; // Exit the function
                }

                const DAYS = Math.floor(TIME_LEFT / (1000 * 60 * 60 * 24)); // Calculate days
                const HOURS = Math.floor((TIME_LEFT % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // Calculate hours
                const MINUTES = Math.floor((TIME_LEFT % (1000 * 60 * 60)) / (1000 * 60)); // Calculate minutes
                const SECONDS = Math.floor((TIME_LEFT % (1000 * 60)) / 1000); // Calculate seconds

                COUNTDOWN_ELEMENT.innerText = `${DAYS} days, ${HOURS} hours, ${MINUTES} minutes, ${SECONDS} seconds`; // Display the countdown

                // Update the message dynamically:
                if (TIME_LEFT <= 7 * 24 * 60 * 60 * 1000) { // If the trip is within a week
                    MESSAGE_ELEMENT.innerText = "Pack your bags! Departure is within a week.";
                } else if (TIME_LEFT <= 30 * 24 * 60 * 60 * 1000) { // If the trip is within a month
                    MESSAGE_ELEMENT.innerText = "Get ready! The trip is less than a month away.";
                } else { // If the trip is more than a month away
                    MESSAGE_ELEMENT.innerText = "The trip is scheduled. Start planning your adventure!";
                }
            }

            // Update countdown every second:
            const INTERVAL = setInterval(updateCountdown, 1000); // Update every second
            updateCountdown(); // Run once immediately
        }
    </script>
</head>

<body onload="startCountdown()"> <!-- Load the countdown when the page loads -->
    <nav class="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="next_voyage.php">Next Voyage</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <main class="transparent-overlay">
        <h1>Next Voyage to Mars</h1>
        <p><strong>Countdown:</strong> <span id="countdown">Loading...</span></p> <!-- Countdown timer -->
        <p id="message">Loading message...</p> <!-- Message based on the countdown -->
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
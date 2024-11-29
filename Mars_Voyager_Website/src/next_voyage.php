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
            const nextTripTime = <?php echo $nextTrip * 1000; ?>; // PHP timestamp to JS (milliseconds)
            const countdownElement = document.getElementById("countdown"); // Get the countdown element
            const messageElement = document.getElementById("message"); // Get the message element

            function updateCountdown() { // Function to update the countdown
                const now = new Date().getTime(); // Get the current time
                const timeLeft = nextTripTime - now; // Calculate the time left

                if (timeLeft <= 0) { // If the trip has departed
                    countdownElement.innerText = "The trip has departed!"; // Display a message
                    messageElement.innerText = "Check back for the next adventure!";
                    clearInterval(interval); // Stop the timer
                    return; // Exit the function
                }

                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24)); // Calculate days
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // Calculate hours
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60)); // Calculate minutes
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000); // Calculate seconds

                countdownElement.innerText = `${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`; // Display the countdown
                
                // Update the message dynamically:
                if (timeLeft <= 7 * 24 * 60 * 60 * 1000) { // If the trip is within a week
                    messageElement.innerText = "Pack your bags! Departure is within a week.";
                } else if (timeLeft <= 30 * 24 * 60 * 60 * 1000) { // If the trip is within a month
                    messageElement.innerText = "Get ready! The trip is less than a month away.";
                } else { // If the trip is more than a month away
                    messageElement.innerText = "The trip is scheduled. Start planning your adventure!";
                }
            }

            // Update countdown every second:
            const interval = setInterval(updateCountdown, 1000); // Update every second
            updateCountdown(); // Run once immediately
        }
    </script>
</head>
<body onload="startCountdown()"> <!-- Load the countdown when the page loads -->
    <nav class="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="next_voyage.php">Next Voyage</a></li>
        </ul>
    </nav>

    <main class="transparent-overlay">
        <h1>Next Voyage to Mars</h1>
        <p><strong>Countdown:</strong> <span id="countdown">Loading...</span></p> <!-- Countdown timer -->
        <p id="message">Loading message...</p> <!-- Message based on the countdown -->
    </main>

    <footer class="transparent-overlay">
        <p id="footer-text">&copy; 2024 Mars Voyager Tours. All rights reserved.</p>
    </footer>
</body>
</html>

// Function to validate the form before submission:

document.getElementById('pilotForm').addEventListener('submit', function (e) {

    // Get the values from the form fields:

    const name = document.getElementById('name').value.trim();
    const age = parseInt(document.getElementById('age').value, 10);
    const experience = parseInt(document.getElementById('experience').value, 10);
    const reason = document.getElementById('reason').value.trim();

    // Validate the form fields:

    if (name.length < 3) { // Check if the name is at least 3 characters long
        alert('Full Name must be at least 3 characters long.'); // Show an alert message
        e.preventDefault(); // Prevent the form from being submitted
        return; // Exit the function
    }
    if (isNaN(age) || age < 18 || age > 65) { // Check if the age is a number between 18 and 65
        alert('Age must be between 18 and 65.');
        e.preventDefault();
        return;
    }
    if (isNaN(experience) || experience < 0) { // Check if the experience is a positive number
        alert('Flight Experience must be a positive number.');
        e.preventDefault();
        return;
    }
    if (reason.length < 10) { // Check if the reason is at least 10 characters long
        alert('Please provide a longer explanation in the "Reason" field.');
        e.preventDefault();
        return;
    }
});

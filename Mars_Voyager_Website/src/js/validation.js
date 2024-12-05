/**
 * JavaScript validation for the pilot form:
 */

// Function to validate the form before submission:

document.getElementById("pilotForm").addEventListener("submit", function (e) {
  // Get the values from the form fields:

  const NAME = document.getElementById("name").value.trim();
  const AGE = parseInt(document.getElementById("age").value, 10);
  const EXPERIENCE = parseInt(document.getElementById("experience").value, 10);
  const REASON = document.getElementById("reason").value.trim();

  // Validate the form fields:

  if (NAME.length < 3) {
    // Check if the name is at least 3 characters long
    alert("Full Name must be at least 3 characters long."); // Show an alert message
    e.preventDefault(); // Prevent the form from being submitted
    return; // Exit the function
  }
  if (isNaN(AGE) || AGE < 18 || AGE > 65) {
    // Check if the age is a number between 18 and 65
    alert("Age must be between 18 and 65.");
    e.preventDefault();
    return;
  }
  if (isNaN(EXPERIENCE) || EXPERIENCE < 0) {
    // Check if the experience is a positive number
    alert("Flight Experience must be a positive number.");
    e.preventDefault();
    return;
  }
  if (REASON.length < 10) {
    // Check if the reason is at least 10 characters long
    alert('Please provide a longer explanation in the "Reason" field.');
    e.preventDefault();
    return;
  }
});

/**
 * JavaScript validation for the login form:
 */

// Function to validate the form before submission:

document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    // Get the values from the form fields:
    const USER_ID = document.getElementById("user_id").value.trim();
    const PASSWORD = document.getElementById("password").value.trim();
    const ERROR_MESSAGE = document.getElementById("errorMessage");

    // Clear any previous error messages
    ERROR_MESSAGE.textContent = "";

    // Validation
    if (!USER_ID) {
      // If no user ID
      ERROR_MESSAGE.textContent = "User ID is required."; // Display error message
      event.preventDefault(); // Prevent form submission
      return;
    }

    if (!PASSWORD) {
      // If no password
      ERROR_MESSAGE.textContent = "Password is required.";
      event.preventDefault();
      return;
    }
  });

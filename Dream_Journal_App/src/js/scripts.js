/**
 * This file contains the jQuery & JavaScript code for the Dream Journal project.
 */

// jQuery ready function waits for the document to be fully loaded before running the code:

$(document).ready(function () {
  //jQuery on function will listen for the submit event on the form:
  $("#dreamForm").on("submit", function () {
    // Clear the form fields after submission:
    $(this).find('input[type="text"], textarea').val("");
  });
});

// jQuery for handling the download button
$(document).ready(function () {
  $("#download-json").on("click", function () {
    // Redirect to fetch_and_encode.php with a download parameter
    window.location.href = "./db/fetch_and_encode.php?download=true";
  });
});

// Scroll to top (JS):

// 1. Get the button.
document.getElementById("scroll-to-top").addEventListener("click", function () {
  // 2. When the user clicks on the button, scroll to the top of the document.
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// script.js

document.addEventListener("DOMContentLoaded", function () {
  // Function to validate reservation form before submission
  function validateForm() {
    var restaurant = document.getElementById("restaurant").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    // Simple validation example (you can add more complex validation logic)
    if (
      restaurant === "" ||
      date === "" ||
      time === "" ||
      name === "" ||
      email === ""
    ) {
      alert("Please fill in all fields.");
      return false;
    }

    // You can add more validation logic here (e.g., validate email format, date, time, etc.)

    return true;
  }

  // Add event listener to reservation form for form submission
  var reservationForm = document.getElementById("reservationForm");
  if (reservationForm) {
    reservationForm.addEventListener("submit", function (event) {
      if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
      }
    });
  }
});

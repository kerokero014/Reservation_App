<?php
// process_reservation.php

// Include necessary files
require_once '../includes/db_config.php';
require_once '../includes/functions.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $restaurant_id = $_POST['restaurant'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    // Validate form data (you can add more validation as needed)

    // Call the add_reservation function
    if (add_reservation($customer_name, $customer_email, $restaurant_id, $date, $time, $guests)) {
        // Reservation successfully added
        header("Location: reservation_success.php");
        exit();
    } else {
        // Error occurred while adding reservation
        // You can handle the error here, e.g., redirect to an error page or display an error message
        header("Location: reservation_error.php");
        exit();
    }
} else {
    // If the form was not submitted, redirect user to the homepage or display an error message
    header("Location: index.php");
    exit();
}

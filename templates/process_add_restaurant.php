<?php
// process_add_restaurant.php

// Include necessary files
require_once '../includes/db_config.php';
require_once '../includes/functions.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data and sanitize inputs
    $restaurant_name = sanitize_input($_POST['restaurant_name']);
    $restaurant_location = sanitize_input($_POST['restaurant_location']);
    $restaurant_email = sanitize_input($_POST['restaurant_email']);
    $capacity = sanitize_input($_POST['capacity']);

    // Call add_restaurant function
    add_restaurant($restaurant_name, $restaurant_location, $restaurant_email, $capacity);

    // Redirect user to a success page or to another page
    header("Location: ./index.php");
    exit();
} else {
    // If the form was not submitted, redirect user to the homepage or an error page
    header("Location: ./index.php");
    exit();
}

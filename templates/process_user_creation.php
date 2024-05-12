<?php
// sign_up.php

// Include necessary files
require_once '../includes/db_config.php';
require_once '../includes/functions.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data and perform validation/formatting
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No need for sanitization here, as password_hash will handle it

    // Validate data
    if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL) && $password) {
        // Call the add_user function
        if (add_user($name, $email, $password)) {
            // User successfully added
            echo "<h1>User successfully added!</h1>";
            header("Location: ../index.php");
            exit();
        } else {
            // Error occurred while adding user
            echo "<h1>Error occurred while adding user!</h1>";
            header("Location: sign_up_error.php");
            exit();
        }
    } else {
        // Invalid input data, redirect to error page or display error message
        echo "<h1>Invalid input data!</h1>";
        header("Location: sign_up_error.php");
        exit();
    }
} else {
    // If the form was not submitted, redirect user to the homepage or display an error message
     echo "<h1>Form was not submitted!</h1>";
     header("Location: ../index.php");
    exit();
}

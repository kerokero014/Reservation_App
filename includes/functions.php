<?php
// functions.php

// Function to establish database connection
function connect_db()
{
    // Include database configuration
    require_once 'db_config.php';

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate date
function validate_date($date)
{
    return (bool)strtotime($date);
}

// Function to validate time
function validate_time($time)
{
    return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time);
}

// Function to handle image upload
function upload_image($image)
{
    // Check if image file is uploaded without errors
    if ($image['error'] === UPLOAD_ERR_OK) {
        // Read image file into a variable
        $imageData = file_get_contents($image['tmp_name']);
        return $imageData;
    } else {
        // Handle upload errors
        return false;
    }
}

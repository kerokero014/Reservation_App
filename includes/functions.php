<?php
// functions.php

/**
 * This file contains functions that interact with the database.
 * CRUD operations are performed in this file.
 * and Sanitization and validation of input data is also done in this file.
 */


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

// query to get all restaurants

function get_restaurants()
{
    //establish database connection
    $conn = connect_db();

    //prepare SQL query
    $sql = "SELECT * FROM reservation.restaurant";

    //initialize an empty array to store the result
    $restaurants = [];

    //execute the query
    if ($result = $conn->query($sql)) {
        //fetch the result as an associative array
        while ($row = $result->fetch_assoc()) {
            $restaurants[] = $row;
        }

        //free the result set
        $result->free();
    }

    //close the database connection
    $conn->close();

    return $restaurants;
}

//function to get all reservations
function get_reservations()
{

    //establish database connection
    $conn = connect_db();

    //prepare SQL query
    $sql = "SELECT * FROM reservation.reservation";

    //initialize an empty array to store the result
    $reservations = [];

    //execute the query
    if ($result = $conn->query($sql)) {
        //fetch the result as an associative array
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }

        //free the result set
        $result->free();
    }

    //close the database connection
    $conn->close();

    return $reservations;
}

// Function to add a new reservation
function add_reservation($customer_name, $customer_email, $restaurant_id, $date, $time, $guests)
{
    // Establish database connection
    $conn = connect_db();

    // Prepare SQL query
    $sql = "INSERT INTO reservation.reservation (customer_name, customer_email, restaurant_id, date, time, guests) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the SQL statement
    $stmt->bind_param("sssiissb", $customer_name, $customer_email, $restaurant_id, $date, $time, $guests);

    // Execute the SQL statement
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}


function get_all_restaurants()
{
    // Establish database connection
    $conn = connect_db();

    // SQL query to select all restaurants
    $sql = "SELECT restaurant_id, name FROM reservation.restaurant";

    // Execute the query
    $result = $conn->query($sql);

    // Array to store restaurant options
    $options = array();

    // Check if query was successful
    if ($result->num_rows > 0) {
        // Loop through each row and fetch restaurant details
        while ($row = $result->fetch_assoc()) {
            // Add restaurant details to options array
            $options[$row['restaurant_id']] = $row['name'];
        }
    }

    // Close database connection
    $conn->close();

    // Return restaurant options
    return $options;
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

<?php
//reservation process 

//include the database connection file
require_once 'includes/functions.php';

//initialize an empty array to store any validation errors
$errors = [];

//check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //sanitize input data
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $date = sanitize_input($_POST['date']);
    $time = sanitize_input($_POST['time']);
    $guests = sanitize_input($_POST['guests']);

    //validate email
    if (!validate_email($email)) {
        $errors['email'] = 'Invalid email address';
    }

    //validate date
    if (!validate_date($date)) {
        $errors['date'] = 'Invalid date';
    }

    //validate time
    if (!validate_time($time)) {
        $errors['time'] = 'Invalid time';
    }

    //check if there are no validation errors
    if (empty($errors)) {
        //establish database connection
        $conn = connect_db();

        //prepare SQL query
        $sql = "INSERT INTO reservation.reservations (custuomer_name, email, date, time, guests) VALUES (?, ?, ?, ?, ?)";

        //initialize a new statement
        $stmt = $conn->stmt_init();

        //prepare the SQL query
        if ($stmt->prepare($sql)) {
            //bind parameters to the query
            $stmt->bind_param('sssssis', $name, $email, $date, $time, $guests);

            //execute the statement
            if ($stmt->execute()) {
                //redirect to the reservation success page
                header('Location: reservation_success.php');
                exit;
            } else {
                //if the query is not executed successfully, display an error message
                $errors['db_error'] = 'Failed to process reservation';
            }
        } else {
            //if the query is not prepared successfully, display an error message
            $errors['db_error'] = 'Failed to process reservation';
        }

        //close the statement
        $stmt->close();

        //close the database connection
        $conn->close();
    }
}

//inlcude reservation form template
require 'templates/reservation_form.php';

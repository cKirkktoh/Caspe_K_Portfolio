<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'portfolio_d';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();

    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    if ($fname == NULL) {
        $errors[] = "First name field is empty.";
    }

    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    if ($lname == NULL) {
        $errors[] = "Last name field is empty.";
    }

    $email = $_POST['email'];
    if ($email == NULL) {
        $errors[] = "Email field is empty.";
    }

    $number = mysqli_real_escape_string($connection, $_POST['number']);
    if ($number == NULL) {
        $errors[] = "Number field is empty.";
    }

    $message = mysqli_real_escape_string($connection, $_POST['message']);
    if ($message == NULL) {
        $errors[] = "Message field is empty.";
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"" . $email . "\" is not a valid email address.";
    }


    if (count($errors) > 0) {
        echo json_encode(array("errors" => $errors));
    } else {

        $querystring = "INSERT INTO contacts (ContactID, fname, lname, email, number, message) 
                        VALUES (NULL, '$fname', '$lname', '$email', '$number', '$message')";

        $qpartner = mysqli_query($connection, $querystring);

        if ($qpartner) {
            echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
        } else {
            echo json_encode(array("errors" => array("Error saving data to the database.")));
        }
    }

    mysqli_close($connection);
?>

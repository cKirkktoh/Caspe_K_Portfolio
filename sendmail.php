<?php

require_once('includes/connect.php'); 

$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'];
$email = $_POST['email'] ?? '';
$number = $_POST['number'] ?? '';
$msg = $_POST['message'] ?? '';

$errors = [];

$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);


if (empty($fname)) {
    $errors['fname'] = 'First Name can\'t be empty';
}

if (empty($lname)) {
    $errors['lname'] = 'Last Name can\'t be empty';
}

if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if (empty($number)) {
    $errors['number'] = 'Number can\'t be empty';
}

if (empty($msg)) {
    $errors['message'] = 'Comment field can\'t be empty';
}

if (empty($errors)) {
    try {
        $query = "INSERT INTO contacts (firstname, lastname, email, number,  message) VALUES (:fname, :lname,  :email, :nmb :msg)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':msg', $msg);

        if ($stmt->execute()) {
            $to = 'k_caspe185622@fanshaweonline.ca';
            $subject = 'You Received a message from your Portfolio site! Check it out!';

            $message = "You have received a new contact form submission:\n\n";
            $message .= "Name: " . $fname . " " . $lname . "\n";
            $message .= "Email: " . $email . "\n\n";
            $message .= "Number: " . $number . "\n\n";
            $message .= "Message:\n" . $msg . "\n";

            if (mail($to, $subject, $message)) {
                header('Location: index.php');
                exit();
            } else {
                $errors['email_send'] = 'There was an issue sending the email. Please try again later.';
            }
        } else {
            $errors['db_insert'] = 'There was an issue saving your information. Please try again later.';
        }
    } catch (PDOException $e) {
        $errors['db_error'] = 'Database error: ' . $e->getMessage();
    }
} else {
    echo 'There were errors with your submission:';
    print_r($errors);
}

?>

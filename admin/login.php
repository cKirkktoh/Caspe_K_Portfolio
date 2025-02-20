<?php
session_start();
require_once('../includes/connect.php');

$query = 'SELECT * FROM user WHERE username=? AND password=?';
$stmt = $connect->prepare($query);
$stmt->bind_param('ss', $_POST['username'], $_POST['password']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    header('Location: project_list.php');
} else {
    header('Location: login_form.php');
}

$stmt->close();
?>

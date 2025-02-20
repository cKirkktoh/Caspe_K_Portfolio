<?php
require_once('../includes/connect.php');

$query = "INSERT INTO projects (proj_title, proj_desc, URL) VALUES (?, ?, ?)";
$stmt = $connect->prepare($query);

if (!$stmt) {
    die("Error preparing statement: " . $connect->error);
}

// Bind parameters
$stmt->bind_param("sss", $_POST['title'], $_POST['desc'], $_POST['thumb']);

$result = $stmt->execute();

if (!$result) {
    die("Error executing statement: " . $stmt->error);
}

$stmt->close(); // Close the statement
$connect->close(); // Close the connection

header('Location: project_list.php');
?>

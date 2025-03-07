<?php
require_once('../includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['desc']); 
    

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileType = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileType, $allowedExtensions)) {
        die("Invalid file type. Allowed: JPG, JPEG, PNG, GIF.");
    }

    if ($_FILES['img']['size'] > 500000) { // Limit: 500KB
        die("File size too large. Maximum: 500KB.");
    }


    $randomNum = rand(10000, 99999);
    $newFileName = 'image' . $randomNum . '.' . $fileType;
    $targetPath = '../images/' . $newFileName;

    if (!move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)) {
        die("File upload failed.");
    }

    try {
        $stmt = $connection->prepare("INSERT INTO projects (title, description, image_url) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $title, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $newFileName, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: project_list.php");
        exit;
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h2>Add New Project</h2>
    <form action="add_project.php" method="POST" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Description:</label>
        <textarea name="desc" required></textarea>

        <label>Project Image:</label>
        <input type="file" name="img" required>

        <button type="submit">Add Project</button>
    </form>
</body>
</html>

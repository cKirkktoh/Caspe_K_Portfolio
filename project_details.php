<?php
require_once('connect.php');

$ProjectID = isset($_GET['id']) ? $_GET['id'] : null;

if (!$ProjectID) {
    header("Location: index.php");
    exit();
}

try {
    $query = 'SELECT GROUP_CONCAT(image_filename) AS images, description, title 
              FROM projects 
              LEFT JOIN media ON projects.id = media.project_id 
              WHERE projects.id = :ProjectID';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':ProjectID', $ProjectID, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // If no project found, redirect to the home page
    if (!$row) {
        header("Location: index.php");
        exit();
    }

    // Explode images into an array
    $images = explode(",", $row['images']);
    $stmt = null;

} catch (PDOException $e) {
    // Error handling for database issues
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title><?php echo htmlspecialchars($row['title']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($row['title']); ?></h1>

    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>

    <section class="project-gallery">
        <?php 
        // Display each image in the project gallery
        foreach ($images as $image) {
            echo '<img class="portfolio-image" src="images/' . htmlspecialchars($image) . '" alt="Project Image">';
        }
        ?>
    </section>
</div>

</body>
</html>

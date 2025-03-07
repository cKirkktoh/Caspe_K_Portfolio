<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');

// Fetch projects
$stmt = $connection->prepare('SELECT ProjectID, proj_title, proj_desc, URL FROM projects ORDER BY proj_title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>

<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<section class="project-con">
            <h3>' . htmlspecialchars($row['proj_title']) . '</h3>
            <a href="project_details.php?id=' . $row['ProjectID'] . '">
                <img class="thumbnail" src="images/' . htmlspecialchars($row['URL']) . '" alt="' . htmlspecialchars($row['proj_title']) . ' Thumbnail">
            </a>
            <p>' . htmlspecialchars($row['proj_desc']) . '</p>
          </section>';
}

$stmt = null;
?> 

</body>
</html>

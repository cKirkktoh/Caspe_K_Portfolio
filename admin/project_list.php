<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');

$stmt = $connect->prepare('SELECT ProjectID, proj_title AS title FROM projects ORDER BY proj_title ASC');
if (!$stmt) {
    die("Prepare failed: (" . $connect->errno . ") " . $connect->error);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
<?php
// Check if the result set is not empty
if ($result->num_rows > 0) {
    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
      echo  '<p class="project-list">'.
        $row['title'].
        '<a href="edit_project_form.php?id='.$row['ProjectID'].'">edit</a>'.
        '<a href="delete_project.php?id='.$row['ProjectID'].'">delete</a></p>';

      
    }
} else {
    echo "No projects found.";
}
$stmt->close();
?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post">
    <label for="title">project title: </label>
    <input name="title" type="text" required><br><br>
    <label for="thumb">project thumbnail: </label>
    <input name="thumb" type="text" required><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
</body>
</html>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
    <link rel="stylesheet" href="css/main.css" type="text/css">

</head>

<h3>Upload an Image:</h3>
<body>
<form action="includes/upload.php" method="post" enctype="multipart/form-data">
    <label for="uploaded">Select an Image</label>
<input type="file" name="uploaded" id="uploaded"><br>
<input type="submit" value="upload">
</form>

<br><br><br>

<h3>Upload  Multiple Images:</h3>
<form action="includes/multi_upload.php" method="post" enctype="multipart/form-data">
  Upload Images:<br />
  <input name="uploaded[]" type="file"><br>
  <input name="uploaded[]" type="file"><br>
  <input type="submit" value="upload">
</form>


</section>

</body>
</html>

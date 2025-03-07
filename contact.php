<html>
<head>
</head>

<body>
<section>
<form method="post" action="sendmail.php">

    <label for="first_name">First Name: </label>
    <input type="text" name="firstname" id="firstname">

    <br><br>

    <label for="last_name">Last Name: </label>
    <input type="text" name="lastname" id="lastname">

    <br><br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email">

    <br><br>

    <label for="number">number: </label>
    <input type="text" name="number" id="number">

    <br><br>

    <label for="message">Message </label>
    <textarea name="message" id="comments">message here</textarea>

    <br><br>

    <input type="submit" value="send">
    <br><br>    <br><br>
</form>
</section>
<footer>
<?php 
echo date("F j, Y, g:i a"); 
?>

</footer>
</body>
</html>
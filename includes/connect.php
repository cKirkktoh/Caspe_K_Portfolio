<?php
$connect = new mysqli('localhost', 'root', '', 'portfolio_d');

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// You may add further error handling for preparing statements here if necessary

?>

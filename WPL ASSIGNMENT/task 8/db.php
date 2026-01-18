<?php
$database = mysqli_connect('localhost', 'root', '', 'ajax_crud');

if (!$database) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<?php
include 'db.php';

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($database, $query)) {
        echo "User added successfully!";
    } else {
        echo "Error: " . mysqli_error($database);
    }
}
?>
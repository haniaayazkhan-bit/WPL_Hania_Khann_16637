<?php
include 'db.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
    if (mysqli_query($database, $query)) {
        echo "User updated successfully!";
    } else {
        echo "Error: " . mysqli_error($database);
    }
}
?>
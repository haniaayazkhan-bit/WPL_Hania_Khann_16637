<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($database, $query)) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($database);
    }
}
?>
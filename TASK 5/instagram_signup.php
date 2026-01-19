<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup_db';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);

$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO instagram_users (email, fullname, username, password) VALUES ('$email', '$fullname', '$username', '$password')";

$conn->query($sql);

echo "Instagram signup successful!";
$conn->close();
?>

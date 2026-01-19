<?php
include 'db.php';

$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($database, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr id='user-".$row['id']."'>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>
                <button class='editBtn' data-id='".$row['id']."'>Edit</button>
                <button class='deleteBtn' data-id='".$row['id']."'>Delete</button>
            </td>
          </tr>";
}
?>
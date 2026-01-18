<html>
<body>

<form method="POST" actiom="lab5.php">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
$value = $POST['$fname']

if ($value = "") {
    break;
}else {
    echo $value;
}
?>

</body>
</html>

<form method="post">
    First Number: <input type="text" name="a"><br><br>
    Second Number: <input type="text" name="b"><br><br>
    Operation (+, -, *, /): <input type="text" name="op"><br><br>
    <input type="submit" value="Calculate">
</form>

<?php
$a = $_POST['a'];
$b = $_POST['b'];
$op = $_POST['op'];

if ($op == '+') {
    echo "Result = " . ($a + $b);
}
else if ($op == '-') {
    echo "Result = " . ($a - $b);
}
else if ($op == '*') {
    echo "Result = " . ($a * $b);
}
else if ($op == '/') {
    echo "Result = " . ($a / $b);
}
else  echo "invalid operation";
?>
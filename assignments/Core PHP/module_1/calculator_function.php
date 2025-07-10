<?php

echo "Question: Calculator: Create a calculator using user-defined functions. <br>";

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        return 'Error: Division by zero';
    }
    return $a / $b;
}


$result = '';
$num1 = '';
$num2 = '';
$operation = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'add':
            $result = add($num1, $num2);
            break;
        case 'subtract':
            $result = subtract($num1, $num2);
            break;
        case 'multiply':
            $result = multiply($num1, $num2);
            break;
        case 'divide':
            $result = divide($num1, $num2);
            break;
        default:
            $result = 'Invalid operation';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="post">
        <input type="number" name="num1" value="<?php echo ($num1); ?>" required>
        <select name="operation" required>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num2" value="<?php echo($num2); ?>" required>
        <input type="submit" value="Calculate">
    </form>

    <?php if ($result !== ''): ?>
        <h2>Result: <?php echo ($result); ?></h2>
    <?php endif; ?>
</body>
</html>

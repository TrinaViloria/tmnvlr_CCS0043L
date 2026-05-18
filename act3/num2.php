<?php
$numbers = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20];

$sum = array_sum($numbers);

$difference = $numbers[0];

$quotient = $numbers[0];
$product = 1;

for ($i = 0; $i < count($numbers); $i++) {
    $product *= $numbers[$i];
    if ($i > 0) {
        $difference -= $numbers[$i];
        if ($numbers[$i] != 0) {
            $quotient /= $numbers[$i];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array Operations</title>
    <style>
        table {
            width: 50%;
            margin: 30px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #fdb5e3;
            text-align: center;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th colspan="2">Array List: <?= implode(', ', $numbers); ?></th>
    </tr>
    <tr>
        <td><strong>Addition</strong></td>
        <td><?= $sum; ?></td>
    </tr>
    <tr>
        <td><strong>Subtraction</strong></td>
        <td><?= $difference; ?></td>
    </tr>
    <tr>
        <td><strong>Multiplication</strong></td>
        <td><?= $product; ?></td>
    </tr>
    <tr>
        <td><strong>Division</strong></td>
        <td><?= $quotient; ?></td>
    </tr>
</table>

</body>
</html>

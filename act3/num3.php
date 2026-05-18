<?php
function computeThree($p1, $p2, $p3) {
    $sum = $p1 + $p2 + $p3;
    $difference = $p1 - $p2 - $p3;
    $product = $p1 * $p2 * $p3;
    $quotient = ($p2 != 0 && $p3 != 0) ? ($p1 / $p2 / $p3) : "Undefined (Div by 0)";
    
    echo "
    <table>
        <tr>
            <th colspan='2'>My Parameter values: $p1, $p2, $p3</th>
        </tr>
        <tr>
            <td><strong>Addition</strong></td>
            <td>$sum</td>
        </tr>
        <tr>
            <td><strong>Subtraction</strong></td>
            <td>$difference</td>
        </tr>
        <tr>
            <td><strong>Multiplication</strong></td>
            <td>$product</td>
        </tr>
        <tr>
            <td><strong>Division</strong></td>
            <td>$quotient</td>
        </tr>
    </table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Function Operations</title>
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
;
            text-align: center;
        }
    </style>
</head>
<body>

<?php 
    computeThree(11, 9, 5); 
?>

</body>
</html>


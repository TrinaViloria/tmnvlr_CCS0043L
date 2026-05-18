<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trina's Multiplication Table</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
        }

        h1 {
            font-family: 'Georgia';
        }

        table {
            margin: auto;
            border-collapse: collapse;
            border: 3px solid black;
            border-radius: 10px;
            overflow: hidden;
        }

        td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 1px solid #555;
            font-weight: bold;
        }

        .pink {
            background-color: pink;
            color: black;
        }

        .black {
            background-color: black;
            color: white;
        }

    </style>


</head>
<body>
    <h1>Multiplication Table</h1>

    <table>
        <?php
            for ($i = 0; $i <= 10; $i++) {
                echo "<tr>";

                for ($j = 0; $j <= 10; $j++) {
                    $result = $i * $j;

                    if (($i + $j) % 2 == 0) {
                        echo "<td class='pink'>$result</td>";
                    } else {
                        echo "<td class='black'>$result</td>";
                    }
                }

                echo "</tr>";

            }
        ?>
    </table>
</body>
</html>